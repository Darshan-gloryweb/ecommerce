<?php include "db.php";
if(isset($_GET['id'])){ $id = $_GET['id']; }

if($id != "")
{
	$action = "E";
    $sql = "Select * from homebanner where BannerID=".$id;
    $r = mysqli_query($dbLink,$sql) or die("can not select Image");
	$row=$r->fetch_assoc();
	$image=$row['ImagePath'];
	$bname=$row['BannerName'];
	$url=$row['BannerUrl'];
	$text=$row['BannerText'];
	$displayorder=$row['DisplayOrder'];
	$description=$row['BannerDescription'];
	$Status=$row['Status'];
}
else
{
	$action = "A";
	$image='';
	$bname='';
	$url='';
	$text='';
	$displayorder='';
	$description='';
	$Status='';
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
  function validate1()
  {
	  if(document.getElementById('name').value=="")
 {
	 alert("Please Enter Banner name");
	 document.getElementById('name').focus();
	 return false; 
 }
  if(document.getElementById('displayorder').value=="")
 	  {
	 	alert("Please Enter Display Order");
	 	return false; 
 	  }
 	  if(document.getElementById('displayorder').value != "")
      {
         if (chkNum(document.getElementById('displayorder')) == false)
         {
            alert("Please Enter only Numbers As Display Order..")
            document.getElementById('displayorder').select();
            return false;
         }
       }
  }
function validate()
{
	if(document.getElementById('name').value=="")
 {
	 alert("Please Enter Banner name");
	 document.getElementById('name').focus();
	 return false; 
 }
 
  if(document.getElementById('displayorder').value=="")
 	  {
	 	alert("Please Enter Display Order");
		document.getElementById('displayorder').focus();
	 	return false; 
 	  }
 	  if(document.getElementById('displayorder').value != "")
      {
         if (chkNum(document.getElementById('displayorder')) == false)
         {
            alert("Please Enter only Numbers As Display Order..")
            document.getElementById('displayorder').select();
            return false;
         }
       }
 
 
 if(document.getElementById('image_file').value=="")
 {
	 alert("Please Select Banner Image");
	 return false; 
 }
if(document.getElementById('image_file').value != "")
{ 
var extensions = new Array("jpg","jpeg","gif","png","bmp");
var image_file = document.getElementById('image_file').value;
var image_length = document.getElementById('image_file').value.length;
var pos = image_file.lastIndexOf('.') + 1;
var ext = image_file.substring(pos, image_length);
var final_ext = ext.toLowerCase();
if(extensions.indexOf(final_ext) == -1)
{
	alert(" Upload an Banner image file with one of the following extensions: "+ extensions.join(', ') +".");
	document.getElementById('image_file')
	return false;
}
}

}
</SCRIPT>

         
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
                    <?php  if($id=="")
					{ ?>
                    <div class="onecolumn" >
                        <div class="header"><span><span class="ico gray administrator"></span>Add Banner</span></div>
                        <div class="clear"></div>
                        
                        
                        
                        <div class="content" >
                        
                        <div style="margin-bottom:10px;"><a href="homebanner.php" class="uibutton icon confirm answer" >Back</a></div>
                            <form id="validation_demo" action="addhomebannerp.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" enctype="multipart/form-data" method="post" onSubmit="return validate();"> 
                           			 <div  class="grid3">
                            
                            		<div class="section ">
                                    <label>Banner Image<small>Text</small></label>   
                                    <div> 
                                    <input type="file" class="fileupload" name="image_file" id="image_file" />
                                    </div>
                                    </div>
                            
                            		
                                   
                                    
                            
                            		<div class="section ">
                                    <label>Banner Name<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="name"  id="name" value="<?=$bname?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Banner Text<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="text1"  id="text1" value="<?=$text?>">
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="section">
                                   <label>Description  <small>Text custom</small></label>   
                                  <div > <textarea name="Description" id="editor"  class="editor"  cols="" rows=""><?=$description?></textarea></div>      
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Url<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="url"  id="url" value="<?=$url?>">
                                    </div>
                                    </div>
                                    
                                     <div class="section ">
                                    <label> Status<small></small></label>   
                                    <div> 
                                    <select data-placeholder="Choose a Status..." class="" name="Status">
                                    <option value="1" <?php  if($Status!="" && $Status==1) { echo 'selected="selected"'; } ?>>Active</option>
                                    <option value="0" <?php  if($Status!="" && $Status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
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
                                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                                     
                                    </div>
									</div>
                                    </div>
                                    </form>
                                    <?php  } else { ?>
                                    <div class="onecolumn" >
                        <div class="header"><span><span class="ico gray administrator"></span>Change Banner Image</span></div>
                        <div class="clear"></div>
                        
                        
                        
                        <div class="content" >
                        
                        <div style="margin-bottom:10px;"><a href="homebanner.php" class="uibutton icon confirm answer" >Back</a></div>
                            <form id="validation_demo" action="addhomebannerp.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" onSubmit="return validate1();" enctype="multipart/form-data"> 
                                    <div  class="grid3">
                            		
                                    <div class="section ">
                                    <label>Banner Image<small>Text</small></label>   
                                    <div>
                                    <img src="<?=$frontpath?>/HomeBanner/<?php  echo $image; ?>?<?php  echo(time()); ?>"  height="100" width="100%" alt="Slider Image" id="icon_image" /> <br />
                                    <input type="file" class="fileupload" name="image_file" id="image_file" />
                                    </div>
                                    </div>
                            
                            		
                            
                            		<div class="section ">
                                    <label>Banner Name<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="name"  id="name" value="<?=$bname?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Banner Text<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="text1"  id="text1" value="<?=$text?>">
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="section">
                                   <label>Description  <small>Text custom</small></label>   
                                  <div > <textarea name="Description" id="editor"  class="editor"  cols="" rows=""><?=$description?></textarea></div>      
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Url<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="url"  id="url" value="<?=$url?>">
                                    </div>
                                    </div>
                                    
                                     <div class="section ">
                                    <label> Status<small></small></label>   
                                    <div> 
                                    <select data-placeholder="Choose a Status..." class="" name="Status">
                                    <option value="1" <?php  if($Status!="" && $Status==1) { echo 'selected="selected"'; } ?>>Active</option>
                                    <option value="0" <?php  if($Status!="" && $Status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
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
                                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                                     
                                    </div>
									</div>
                                    </div>
                                    </form>
                                    
                                    <?php  } ?>
                                 </div>                       
                            <div class="clear"></div>


                        </div>
                    </div>
                

                    <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
