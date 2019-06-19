<?php include "db.php";

 $ssql="select name from menu where id=".$_REQUEST['id'];
	$sr = mysqli_query($dbLink,$ssql) or die("can not select School");
	$srow=$sr->fetch_assoc();
	$menuname=$srow['name'];

	  $sql = "Select * from navigation where menuid=".$_REQUEST['id']." and parent=0 order by displayorder";
      $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
      $id = AssureSec($_GET['nid']);

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from navigation where id=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select degreemst");
    $editrow = $editres->fetch_assoc();
	$customlink= stripslashes($editrow['customlink']);
	if($customlink==0)
	{
		$title = stripslashes($editrow['title']);
		$parent = stripslashes($editrow['parent']);
		$displayorder = stripslashes($editrow['displayorder']);
	}
	else
	{
		$title1 = stripslashes($editrow['title']);
		$parent1 = stripslashes($editrow['parent']);
		$displayorder1 = stripslashes($editrow['displayorder']);
		$slug = stripslashes($editrow['slug']);
	}
}
else
{
	$action = "A";
}
function getinner($s,$id,$menu)
{
	$sql="select * from navigation where menuid=$menu and parent=".$id." order by displayorder";
	$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');
	if(mysqli_num_rows($res)>0)
	{
		while($d=$res->fetch_assoc())
		{
			?>
            	<tr>
                                    <td align="left"><?php  echo $s.$d['title']; ?></td>
                                    <td><?php  echo $d['slug']; ?></td>
                                    <td><?php  echo $d['parent']; ?></td>
                                    <td><?php  echo $d['displayorder']; ?></td>
                                    <td>
                                      <span class="tip" >
                                          <a  title="Edit" href="menusettings.php?id=<?=$menu?>&nid=<?php  echo $d['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      
                                      <span class="tip" >
                                          <a class="row_delete"  name="<?php  echo $d['title']; ?>_navigation" title="Delete"  onclick="if (confirm('Are You Sure To Delete?')) 
  window.location='menusettingsp.php?action=D&id=<?php  echo $menu; ?>&nid=<?=$d['id']?>';" >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> 
                                        </td>
                                  </tr>
                                  
            <?php 
            //echo $s."ID :".$d['id']." And Name :".$d['name']."<br>";
			$ss=$s."___";
			getinner($ss,$d['id'],$menu);
		}
	}
}
function getnav($p,$s,$id,$menu)
{
	$sql="select * from navigation where parent=".$id." and menuid=".$menu;
	$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');
	if(mysqli_num_rows($res)>0)
	{
		while($d=$res->fetch_assoc())
		{
			?>
            	<option <?php  if($p==$d['id']) { echo 'selected="selected"'; } ?> value="<?php  echo $d['id']; ?>"><?php  echo $s.$d['title']; ?></option>
                                  
            <?php 
            //echo $s."ID :".$d['id']." And Name :".$d['name']."<br>";
			$ss=$s."___";
			getnav($p,$ss,$d['id'],$menu);
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <title><?=$pgtitle?></title>
        <!-- Link shortcut icon-->
        <link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> 
        <!-- Link css-->
        <?php  include('include_files.php'); ?>   
    <script language="javascript" type="text/javascript" src="validation.js"></script>
    <script language="javascript">
    function validate(form)
    {
   		if (form.page.value == "")
        {
            alert("Please Select")
            form.page.focus();
            return false;
        }   
		if (form.displayorder.value == "")
        {
            alert("Please Enter Display Order")
            form.displayorder.focus();
            return false;
        }
		if(form.displayorder.value != "")
      	{
            if (chkNum(form.displayorder) == false)
            {
                alert("Please Enter only Numbers As Display Order..")
                form.displayorder.select();
                return false;
            }
         }   		
    }
	function validate1(form)
    {
   		if (form.linkname.value == "")
        {
            alert("Please Enter Navigation Title")
            form.linkname.focus();
            return false;
        }
		if (form.linkurl.value == "")
        {
            alert("Please Enter Navigation url")
            form.linkurl.focus();
            return false;
        }
		if (form.displayorder.value == "")
        {
            alert("Please Enter Display Order")
            form.displayorder.focus();
            return false;
        }
		if(form.displayorder.value != "")
      	{
            if (chkNum(form.displayorder) == false)
            {
                alert("Please Enter only Numbers As Display Order..")
                form.displayorder.select();
                return false;
            }
         }      		
    }
</script>
         
        </head>        
        <body class="dashborad">        
        <div id="alertMessage" class="error"></div> 
       <?php  include('inc_header.php'); ?>
			<div id="shadowhead"></div>
            <div id="hide_panel"> 
                  <a class="butAcc" rel="0" id="show_menu"></a>
                  <a class="butAcc" rel="1" id="hide_menu"></a>
                  <a class="butAcc" rel="0" id="show_menu_icon"></a>
                  <a class="butAcc" rel="1" id="hide_menu_icon"></a>
            </div>           
      
          <?php  include('inc_leftmenu.php'); ?>          

            
            <div id="content">
                <div class="inner">
					<?php  include('inc_toplogo.php'); ?>
                    <div class="clear"></div>

					<div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Settings For <font color="#009933"><?=$menuname?></font> Menu </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <div style="position:absolute;"><a href="managenavigation.php" class="uibutton icon confirm answer" >Back</a></div>
                    <form> 
					<div class="tableName">

                              <table class="display data_tablenavigation" id="">
                                <thead>
                                  <tr>
                                    <th align="left">Title</th>
                                    <th>Url</th>
                                    <th>Parent</th>
                                    <th>Display Order</th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                <?php 
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td align="left"><?php  echo $data['title']; ?></td>
                                    <td><?php  echo $data['slug']; ?></td>
                                    <td><?php  echo $data['parent']; ?></td>
                                    <td><?php  echo $data['displayorder']; ?></td>
                                    <td>
                                      <span class="tip" >
                                          <a  title="Edit" href="menusettings.php?id=<?=$_REQUEST['id']?>&nid=<?php  echo $data['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a class="row_delete"  onclick="if (confirm('Are You Sure To Delete?')) 
  window.location='menusettingsp.php?action=D&id=<?php  echo $_REQUEST['id']; ?>&nid=<?=$data['id']?>'; 
   return false" title="Delete"  >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> 
                                        </td>
                                  </tr>
                                  
                                  <?php  $str="___";
										getinner($str,$data['id'],$_REQUEST['id']);
                                  ?>
								<?php  } ?>
                              </tbody>
                              </table></div></form>


					</div>
					</div>
                    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Add New Page </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    
                            <form action="menusettingsp.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);"> 
                            
									<div class="section ">
                                    <label> Select Page<small>Add Page to Navigation</small></label>   
                                    <div> 
                                    <select data-placeholder="Choose a Page..." class="" name="page" id="page">
                                    <option value="">Select</option>
                                    <?php  $psql="select id,title from pagemgnt";
										  $pres=mysqli_query($dbLink,$psql) or die ('Could Not Select Page');
										  while($typedata=$pres->fetch_assoc())
										  { ?>
											  <option <?php  if($title==$typedata['title']) { echo 'selected="selected"'; } ?> value="<?php  echo $typedata['id']; ?>"><?php  echo $typedata['title']; ?></option>
										 <?php  }
								    ?>
                                    </select>
                                   
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Parent<small>Select</small></label>   
                                    <div> 
                                    <select data-placeholder="Choose a Page..." class="" name="parent" id="parent">
                                    <option value="">Select</option>
                                    <?php  $psql="select * from navigation where parent=0 and menuid=".$_REQUEST['id'];
										  $pres=mysqli_query($dbLink,$psql) or die ('Could Not Select Page');
										  while($typedata=$pres->fetch_assoc())
										  { ?>
											  <option <?php  if($parent==$typedata['id']) { echo 'selected="selected"'; } ?> value="<?php  echo $typedata['id']; ?>"><?php  echo $typedata['title']; ?></option>
										 <?php  
										 $str="__";
										 getnav($parent,$str,$typedata['id'],$_REQUEST['id']);
										 }
								    ?>
                                    </select>
                                   
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Display Order<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="displayorder"  id="displayorder" value="<?=$displayorder?>">
                                    </div>
                                    </div>
                                  
                                  <div class="section last">
                                    <div>
                                    <input type="hidden" name="menu" value="<?=$_REQUEST['id']?>" />
                                    <input type="hidden" value="0" name="customlink" />
                                    <input name="Submit" type="submit" class="uibutton submit_form icon confirm" value="Submit" />
                                     <!-- <a class="uibutton submit_form" >submitForm</a>-->
                                   </div>
                                   </div>
                              
                            </form>
                            <div class="clear"></div>


                        </div>


					</div>
                    
                    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Add Custom Link </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                   
                            <form action="menusettingsp.php?action=<?php  echo "custom"; ?>" method="post" name="form1" id="form1" onSubmit="return validate1(this);"> 
                            
									<div class="section ">
                                    <label>Link Title<small>Navigation Label</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="linkname"  id="linkname" value="<?=$title1?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Link URl<small>Navigation url</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="linkurl"  id="linkurl" value="<?=$slug?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Parent<small>Select</small></label>   
                                    <div> 
                                    <select data-placeholder="Choose a Page..." class="" name="parent" id="parent">
                                    <option value="">Select</option>
                                    <?php  $psql="select * from navigation where parent=0 and menuid=".$_REQUEST['id'];
										  $pres=mysqli_query($dbLink,$psql) or die ('Could Not Select Page');
										  while($typedata=$pres->fetch_assoc())
										  { ?>
											  <option <?php  if($parent1==$typedata['id']) { echo 'selected="selected"'; } ?> value="<?php  echo $typedata['id']; ?>"><?php  echo $typedata['title']; ?></option>
										 <?php  
										 $str="__";
										 getnav($parent1,$str,$typedata['id'],$_REQUEST['id']);
										 }
								    ?>
                                    </select>
                                   
                                    </div>
                                    </div>
                                  <div class="section ">
                                    <label> Display Order<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="displayorder"  id="displayorder" value="<?=$displayorder1?>">
                                    </div>
                                    </div>
                                  <div class="section last">
                                    <div>
                                    <input type="hidden" name="menu" value="<?=$_REQUEST['id']?>" />
                                    <input type="hidden" value="1" name="customlink" />
                                    <input type="hidden" value="<?=$id?>" name="nid" />
                                    <input name="Submit" type="submit" class="uibutton submit_form icon confirm" value="Submit" />
                                     <!-- <a class="uibutton submit_form" >submitForm</a>-->
                                   </div>
                                   </div>
                              
                            </form>
                            <div class="clear"></div>


                        </div>


					</div>
                    
                    
                    
					 <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
