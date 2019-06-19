<?php  include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }
	 //$id = $_GET['id'];

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from bannerposition where bannerpositionID=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select banner position");
    //$editrow = mysql_fetch_array($editres);
    $editrow = $editres->fetch_assoc();
	
	$bannerpositionID = stripslashes($editrow['bannerpositionID']);
	$bannerposition_title = stripslashes($editrow['bannerposition_title']);
	$bannerposition_des = stripslashes($editrow['bannerposition_des']);
	
}
else
{
	$action = "A";
	$bannerpositionID = '';
	$bannerposition_title = '';
	$bannerposition_des = '';
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
<script language="javascript">
    function validate(form)
    {
        var extensions = new Array("jpg","jpeg","gif","png","bmp");
		
		if (form.advertisebanner_title.value == "")
        {
            alert("Please Enter Advertise Banner Name")
            form.advertisebanner_title.focus();
            return false;
        }
        
        
		if(form.advertisebanner_image.value == "")
 		{
	 		/*alert("Please Select Category Icon");
	 		return false; */
 		}
		else
		{
			var image_file = form.advertisebanner_image.value;
			var image_length = form.advertisebanner_image.value.length;
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
        <div style="margin-bottom:10px;"><a href="bannerposition.php" class="uibutton icon confirm answer" >Back</a></div>
        <form action="addbannerpositionp.php?action=<?php  echo $action; ?>&editid=<?php  echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
        
        
        	
        
          <div class="section ">
            <label>Banner Position Name<small>Text</small></label>
            <div>
              <input type="text" class="large" name="bannerposition_title"  id="bannerposition_title" value="<?php echo $bannerposition_title;?>">
            </div>
          </div>
          
          <div class="section">
            <label>Banner position Description <small>Text custom</small></label>
            <div >
              <textarea name="bannerposition_des" id="editor"  class="editor"  cols="" rows=""><?php echo $bannerposition_des;?>
</textarea>
            </div>
          </div>
          
          <div class="section last">
            <div>
              <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
              <!-- <a class="uibutton submit_form" >submitForm</a>--> 
            </div>
          </div>
        </form>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
</body>
</html>
