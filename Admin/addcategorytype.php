<?php  include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from categorytype where id=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select Category");
    $editrow = $editres->fetch_assoc();

	$CategoryTypeName = stripslashes($editrow['name']);
	$ImageName = stripslashes($editrow['ImageName']);
}
else
{
	$action = "A";
	$CategoryTypeName ='';
	$ImageName = '';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>
<?=$pgtitle?>
</title>
<!-- Link shortcut icon-->
<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" />
<?php  include('include_files.php'); ?>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<script language="javascript">
    function validate(form)
    {
		var extensions = new Array("jpg","jpeg","gif","png","bmp");
		if (form.CategoryTypeName.value == "")
        {
            alert("Please Enter Category Type Name")
            form.CategoryTypeName.focus();
            return false;
        }	
		if(form.ImageName.value == "")
 		{
	 		/*alert("Please Select Category Icon");
	 		return false; */
 		}
		else
		{
			var image_file = form.ImageName.value;
			var image_length = form.ImageName.value.length;
			var pos = image_file.lastIndexOf('.') + 1;
			var ext = image_file.substring(pos, image_length);
			var final_ext = ext.toLowerCase();
			if(extensions.indexOf(final_ext) == -1)
			{
				alert(" Select Icon Image of the following extensions: "+ extensions.join(', ') +".");
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
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> Add New Category Type </span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="categorytype.php" class="uibutton icon confirm answer" >Back</a></div>
        <form action="addcategorytypep.php?action=<?php  echo $action; ?>&editid=<?php  echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
          <div class="section ">
            <label> Category Type Name<small>Text</small></label>
            <div>
              <input type="text" class="large" name="CategoryTypeName"  id="CategoryTypeName" value="<?=$CategoryTypeName?>">
            </div>
          </div>
          <div class="section ">
            <label>Icon<small></small></label>
            <div>
              <?php  if( $ImageName != "")
									{ ?>
              <img src="<?=$frontpath?>/CategoryTypeIcon/<?=$ImageName?>?<?php  echo time(); ?>" alt="" /><br />
              <?php  } ?>
              <input type="file" class="fileupload" name="ImageName" id="ImageName" value="<?=$frontpath?>/CategoryIcon/<?=$ImageName?>" />
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
