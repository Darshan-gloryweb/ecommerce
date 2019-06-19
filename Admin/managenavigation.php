<?php include "db.php";

	$sql = "Select * from menu";
    $r = mysqli_query($dbLink,$sql) or die("can not select navigation");
 if(isset($_GET['id'])){ $id = $_GET['id']; }

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from menu where id=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select degreemst");
    $editrow = $editres->fetch_assoc();

	$menu = stripslashes($editrow['name']);
}
else
{
	$action = "A";
	$menu = '';
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
   		if (form.name.value == "")
        {
            alert("Please Enter Menu Name")
            form.name.focus();
            return false;
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
						
                    <?php 
					include("sec.php");
					 $right=user_right('managenavigation.php');
					 if($right==false)
					 {
						 ?>
                         <div class="onecolumn" >
                    	 <div class="header">
                    	 <span ><span class="ico  gray spreadsheet"></span>You Have No Right To Access This Page</span>
                    	 </div><!-- End header -->
                    <?php 
					 }
					 else
					 {			
					 ?>    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Menu List </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <form> 
					<div class="tableName">

                              <table class="display data_tablemenu" id="">
                                <thead>
                                  <tr>
                                    <th align="left">Menu</th>
                                    <th>Settings</th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td align="left"><?php  echo $data['name']; ?></td>
                                    <td><a href="menusettings.php?id=<?=$data['id']?>" >Settings</a></td>
                                    <td>
                                      <span class="tip" >
                                          <a  title="Edit" href="managenavigation.php?id=<?php  echo $data['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php  echo $data['id'];?>" class="row_delete"  name="<?php  echo $data['name']; ?>_menu" title="Delete"  >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> 
                                        </td>
                                  </tr>
								<?php  } ?>
                              </tbody>
                              </table></div></form>


					</div>
					</div>
                    
                    
                    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Add New Menu </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                            <form action="managenavigationp.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);"> 
                                    
                                    <div class="section ">
                                    <label>Menu Name<small>Name Of the Menu</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="name"  id="name" value="<?=$menu?>">
                                    </div>
                                    </div>
                                                                 
                                    <div class="section last">
                                    <div>
                                    <input name="Submit" type="submit" class="uibutton submit_form icon confirm" value="Submit" />
                                     <!-- <a class="uibutton submit_form" >submitForm</a>-->
                                   </div>
                                   </div>
                              
                            </form>
                            <div class="clear"></div>


                        </div>

					<?php  } ?>
					</div>
                    
					 <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
