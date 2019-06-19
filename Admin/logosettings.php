<?php include "db.php";

	if(isset($_POST['hsubmit']))
	{
		$htext = mysql_escape_string($_POST['htext']);
		
		$sql = "Select headertext from websetting";
    	$r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    	$row = $r->fetch_assoc();
    	$totrec = mysqli_num_rows($r);
    	if($totrec == "0")
    	{
        	$sql = "insert into websetting(headertext) values('$htext')";
	    	mysqli_query($dbLink,$sql) or die('could not insert..');
			$msg="Settings Updated Successfully";
    	}
    	else
    	{
        	$sql = "update websetting set headertext='$htext'";
			mysqli_query($dbLink,$sql) or die('could not update..');
			$msg="Settings Updated Successfully";
    	}
	}

    $sql = "Select logoimage,headertext from websetting";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
	$row=$r->fetch_assoc();
	$image=$row['logoimage'];
	$text=$row['headertext'];
	
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
  <script language="javascript">
function validate()
{

 if(document.getElementById('image_file').value=="")
 {
	 alert("Please Select Image");
	 return false; 
 }
else
{ 
var extensions = new Array("jpg","jpeg","gif","png","bmp");
var image_file = document.getElementById('image_file').value;
var image_length = document.getElementById('image_file').value.length;
var pos = image_file.lastIndexOf('.') + 1;
var ext = image_file.substring(pos, image_length);
var final_ext = ext.toLowerCase();
for (i = 0; i < extensions.length; i++)
{
if(extensions[i] == final_ext)
{
return true;
}
}
alert(" Upload an image file with one of the following extensions: "+ extensions.join(', ') +".");
return false;
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

<div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div></div>
<div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                    <div class="onecolumn" >
                        <div class="header"><span><span class="ico gray administrator"></span>Logo Settings</span></div>
                        <div class="clear"></div>
                        <div class="content" >
                        <div style="margin-bottom:10px;"><a href="webset.php" class="uibutton icon confirm answer " >Back</a></div>
                        
                            <form id="validation_demo" action="logosettingsp.php" enctype="multipart/form-data" method="post" onSubmit="return validate();"> 
                            <div  class="grid1">
                                    <div class="profileSetting" >
                                            <div class="avartar"><img src="../Logo/<?php  echo $image; ?>?<?php  echo(time()); ?>" width="200" height="200" alt="logo" id="icon_image" /></div>
                                           <div class="avartar">
                                           <input type="file" class="fileupload" name="image_file" id="image_file" />
                                            <input type="hidden" name="action" value="add" />
                                           </div>
                                    </div>
                            </div>
                            <div  class="grid3">
                            
                            		<div class="section">
                                    <label> Add Logo  <small>Add New Logo</small></label>
                                    <div>
                                    <input name="Submit" type="submit" class="uibutton submit_form icon confirm" value="Submit" />
                                     </form>
                                    </div>
									</div>
                                    
                                    
                                    <div class="section ">
                                    <label> Delete Icon<small>Remove Image</small></label>   
                                    <div> 
                                    
                                     <form action="logosettingsp.php" method="post">
                                    <input type="hidden" name="action" value="delete" />
                                     <input type="submit" class="uibutton submit_form icon confirm" value="Delete" />
                                     </form>
                                    </div>
                                    </div>
                                    
                                    <!--<div class="section ">
                                   
                                       
                                    <div> 
                                   
                                    </div>
                                    </form>
                                    </div>  -->
                                 </div>                       
                            <div class="clear"></div>


                        </div>
                    </div>
                <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Header Text Settings </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    
                            <form method="post"> 
                            
									<div class="section ">
                                    <label>Header Text<small></small></label>   
                                    <div> 
                                    <textarea name="htext" id="editor"  class="editor"  cols="" rows=""><?=$text?></textarea>
                                    </div>
                                    </div>
                                                                 
                                    <div class="section last">
                                    <div>
                                    <input name="hsubmit" type="submit" class="uibutton submit_form icon confirm" value="Submit" />
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
