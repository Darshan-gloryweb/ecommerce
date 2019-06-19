<?php  include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }
	
	 //$id = $_GET['id'];

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from advertisebanner where advertisebannerID=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select advertise banner");
    //$editrow = mysql_fetch_array($editres);
    $editrow = $editres->fetch_assoc();
	
	$advertisebannerID = stripslashes($editrow['advertisebannerID']);
	$bannerposition = stripslashes($editrow['bannerposition']);
	$advertisebanner_title = stripslashes($editrow['advertisebanner_title']);
	$advertisebanner_text = stripslashes($editrow['advertisebanner_text']);
	$advertisebanner_image = stripslashes($editrow['advertisebanner_image']);
	$advertisebanner_display_order = stripslashes($editrow['advertisebanner_display_order']);
	$advertisebanner_status = stripslashes($editrow['advertisebanner_status']);
	
	$sqledit1 = "Select * from advertiseimage where advertisebannerID=".$id;
    $editres1 = mysqli_query($dbLink,$sqledit1) or die("can not select advertise banner");
    $editrow1 = $editres1->fetch_assoc();
	
	
	
}
else
{
	$action = "A";
	$advertisebannerID = '';
	$advertisebanner_title ='';
	$advertisebanner_text ='';
	$advertisebanner_image = '';
	$advertisebanner_display_order = '';
	$advertisebanner_status ='';
	$bannerposition ='';
	$banner_img_url='';
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>
<?php echo $pgtitle;?>
</title>
<!-- Link shortcut icon-->
<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" />
<?php  include('include_files.php'); ?>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<script language="javascript" type="text/javascript">
    function validate(form)
    {
        var extensions = new Array("jpg","jpeg","gif","png","bmp");
		if (form.advertisebanner_title.value == "")
        {
            alert("Please Enter Advertise Banner Position")
            form.bannerposition.focus();
            return false;
        }
		if (form.advertisebanner_title.value == "")
        {
            alert("Please Enter Advertise Banner Name")
            form.advertisebanner_title.focus();
            return false;
        }
        
        
		
        		
    }
	function validategallery(form)
	{
		var extensions = new Array("jpg","jpeg","gif","png","bmp");
		//var imagename = $('#imagename').val();
		
		//alert(file123);
		
		
		
		if(form.imagename.value == "" )
 		{
	 		alert("Please Select Advertisebanner Image");
	 		return false; 
 		}
		else
		{
			var image_file = form.imagename.value;
			var image_length = form.imagename.value.length;
			var pos = image_file.lastIndexOf('.') + 1;
			var ext = image_file.substring(pos, image_length);
			var final_ext = ext.toLowerCase();
			if(extensions.indexOf(final_ext) == -1)
			{
				alert(" Select Icon Image of the following extensions: "+ extensions.join(', ') +".");
				return false;
			}
		}
		if (form.advertisebanner_display_order.value == "") {
            alert("Please Enter Display Order")
            form.advertisebanner_display_order.focus();
            return false;
        }
		
		if(form.advertisebanner_display_order.value != "")
      	{
            if (chkNum(form.advertisebanner_display_order) == false)
            {
                alert("Please Enter only Numbers As Display Order..")
                form.advertisebanner_display_order.select();
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
<div id="hide_panel"> <a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc" rel="1" id="hide_menu"></a> <a class="butAcc" rel="0" id="show_menu_icon"></a> <a class="butAcc" rel="1" id="hide_menu_icon"></a> </div>
<?php  include('inc_leftmenu.php'); ?>
<div id="content">
  <div class="inner">
    <?php  include('inc_toplogo.php'); ?>
    <div class="clear"></div>
    <div class="section ">
      <div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> Add New Advertise Banner </span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="advertisebanner.php" class="uibutton icon confirm answer" >Back</a></div>
        
        <div id="uploadTab">
          <ul class="tabs" >
            <li id="first"><a href="#tab1"  id="1"  > Advertise Banner Details </a></li>
            <li id="second"><a href="#tab2"  id="2"  > Gallery </a></li>
         
           
          </ul>
          <div class="tab_container" >
            <div id="tab1" class="tab_content">
              <form action="addadvertisebannerp.php?action=<?php  echo $action; ?>&editid=<?php  echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
        
            <div class="section ">
                <label> Banner Postion<small></small></label>
                <div>
                 <input type="text" class="large" name="bannerposition"  id="bannerposition" value="<?php echo $bannerposition;?>">
                  
                </div>
              </div>
        	
        
          <div class="section ">
            <label> Advertise Banner Name<small>Text</small></label>
            <div>
              <input type="text" class="large" name="advertisebanner_title"  id="advertisebanner_title" value="<?php echo $advertisebanner_title;?>">
            </div>
          </div>
          
          
          
          
          
          
          
          
          <div class="section ">
            <label> Status<small></small></label>
            <div>
              <select data-placeholder="Choose a Status..." class="" name="advertisebanner_status">
                <option value="1" <?php  if($advertisebanner_status !="" && $advertisebanner_status ==1) { echo 'selected="selected"'; } ?>>Active</option>
                <option value="0" <?php  if($advertisebanner_status !="" && $advertisebanner_status ==0) { echo 'selected="selected"'; } ?>>Inactive</option>
              </select>
            </div>
          </div>
          <div class="section last">
            <div>
              <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
              <!-- <a class="uibutton submit_form" >submitForm</a>--> 
            </div>
          </div>
        </form>
            </div>
            <!--tab1-->
            
            <div id="tab2" class="tab_content">
            <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Banner Gallery</span> </div>
                <!-- End header -->
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_btablegallery" id="advertisegalleryt">
                      <thead>
                        <tr> 
                          <!--  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>-->
                          <th>Image</th>
                          <th>Image Name</th>
                          <th>Url</th>
                          <th>Management</th>
                        </tr>
                      </thead>
                      <tbody>
                    	<?php  
						if(isset($_GET['img_id'])){ $img_id = $_GET['img_id'];}else{$img_id = '';} 
						
                      	if($img_id != ""){
						
						$action1 = "E";
						$sqledit1 = "Select * from advertiseimage where id=".$img_id;
						$editres1 = mysqli_query($dbLink,$sqledit1) or die("can not select advertise banner");
						//$editrow = mysql_fetch_array($editres);
						$editrow1 = $editres1->fetch_assoc();
						
						$advertisebannerID = stripslashes($editrow1['advertisebannerID']);
						$imagename = stripslashes($editrow1['imagename']);
						$banner_img_url = stripslashes($editrow1['banner_img_url']);
						$banner_img_status = stripslashes($editrow1['banner_img_status']);
						$advertisebanner_display_order =stripslashes($editrow1['advertisebanner_display_order']);
						
						
					}else{
						
						$action1 = "A";	
						$advertisebannerID = '';
						$imagename = '';
						$banner_img_url = '';
						$banner_img_status = '';
						$advertisebanner_display_order='';
					}
                        
						$pisql="select * from advertiseimage where advertisebannerID =".$id;
						$pires=mysqli_query($dbLink,$pisql) or die('could not select advertise image'); ?>
                        <?php 
						 	while($pidata=$pires->fetch_assoc())
								{ ?>
                        <tr>
                          <td><?php 
									if($pidata['imagename']=="")
									{ ?>
                            <img width="49" height="22" src="<?=$frontpath?>/images/noimg.jpg" alt="No Image"/>
                            <?php  } else { ?>
                            <img width="49" height="22" src="../AdvertiseGallery/<?php  echo $pidata['imagename']; ?>?<?php  echo time(); ?>" alt=""/>
                            <?php  } ?></td>
                          <td><?=$pidata['imagename']?></td>
                          <td><?=$pidata['banner_img_url']?></td>
                          <td>
                          <span class="tip" > 
                          	<a  title="Edit" href="add_advertisebanner.php?id=<?=$pidata['advertisebannerID']?>&img_id=<?php echo $pidata['id'];?>&tab=2"> <img src="images/icon/icon_edit.png" > </a> </span>
                          <span class="tip" >
                          
                          
                            
                          	<a id="<?php  echo $pidata['id'];?>" class="row_delete"  name="<?php  echo str_replace('_','-',$pidata['imagename']); ?>_advertisegallery" title="Delete" > 
                            <img src="images/icon/icon_delete.png" > 
                            </a>
                            
                             
                          <?php /*?>	<a id="<?php  echo $pidata['id'];?>" class="row_delete"  name="<?php  echo str_replace('_','-',$pidata['imagename']); ?>_advertisebanner" title="Delete" > <img src="images/icon/icon_delete.png" > </a><?php */?>
                            
                            
                             </span></td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                  </form>
                </div>
              </div>
              
              
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span>Add Advertise Image</span> </div>
                <!-- End header -->
                <div class=" clear"></div>
                <div class="content" >
                  <form id="advertisegallery" name="advertisegallery" enctype="multipart/form-data" action="addadvertiseimagep.php?action=<?php  echo $action1; ?>&editid=<?php echo $id;?>&img_id=<?php echo $img_id;?>" method="post" onsubmit="return validategallery(this);">
                    <div class="section ">
                      <label>Banner Image<small></small></label>
                      <div>
                        <input type="hidden" value="<?=$id?>" name="advertise" id="advertise" />
                        
                        
                        <?php if(!empty($imagename)){?>
                        	
                            <img width="100" height="100" src="<?=$frontpath?>/AdvertiseGallery/<?=$imagename?>" alt=""/><br /><br />
                            
						<?php }?>
                        
                        
                        <input type="file" class="fileupload " name="imagename" id="imagename" <?php if(!empty($imagename)){?> value="<?php echo $imagename;?>"<?php }else{?> value=""<?php } ?> />
                        
                      </div>
                    </div>
                    
                    <div class="section ">
                        <label> Image Url<small></small></label>
                        <div>
                         <input type="text" class="large" name="banner_img_url"  id="banner_img_url" value="<?php echo $banner_img_url;?>">
                          
                        </div>
                      </div>
                      <div class="section">
                        <label>Display Order<small>Text custom</small></label>
                        <div >
                          <input type="text" class="large" name="advertisebanner_display_order"  id="advertisebanner_display_order" value="<?php echo $advertisebanner_display_order;?>">
                        </div>
                      </div>
          
                    
                    <div class="section ">
                    <label> Status<small></small></label>
                    <div>
                      <select data-placeholder="Choose a Status..." class="" name="banner_img_status">
                        <option value="1" <?php  if($banner_img_status !="" && $banner_img_status ==1) { echo 'selected="selected"'; } ?>>Active</option>
                        <option value="0" <?php  if($banner_img_status !="" && $banner_img_status ==0) { echo 'selected="selected"'; } ?>>Inactive</option>
                      </select>
                    </div>
                  </div>
                    <div class="section last">
                      <div>
                        <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php  } ?>
            </div>
            <!--tab2-->
            
            
            <!--tab3--> 
            <!-- tab4-->
            
            <!-- tab4-->
          </div>
        </div>
        <div class="clear"></div>
        
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
<script type="text/javascript">
	  $(function () {
		  <?php  if($_REQUEST['tab']== '1' || !isset($_REQUEST['tab'])) { ?>
  document.getElementById("tab1").style.display = "block";
  $("#first").addClass("active");
  $("#second").removeClass("active");
  <?php  } else if($_REQUEST['tab']== '2') { ?>
  document.getElementById("tab2").style.display = "block";
 $("#second").addClass("active");
  $("#first").removeClass("active");
  document.getElementById("tab1").style.display = "none";
  <?php  } else if($_REQUEST['tab']== '3') { ?>
  document.getElementById("tab3").style.display = "block";
  $("#first").removeClass("active");
  $("#second").removeClass("active");
  document.getElementById("tab1").style.display = "none";
  <?php  }  ?>
   });
</script>

</body>
</html>
