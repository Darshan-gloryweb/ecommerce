<?php include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from feedback where id=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select feedback");
    $editrow = $editres->fetch_assoc();

	$firstname = stripslashes($editrow['firstname']);
	/*$lastname= stripslashes($editrow['lastname']);
	$city = stripslashes($editrow['city']);*/
	$message= stripslashes($editrow['message']);
	$contact = stripslashes($editrow['contact']);
	$email = stripslashes($editrow['email']);
	$createdon = stripslashes($editrow['createdon']);
	$status = stripslashes($editrow['status']);
	$ratings = stripslashes($editrow['ratings']);
	
}
else
{
	$action = "A";
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
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span>
        <?php  /*?><?php  if($action == "E"){?><?php  */?>
        View Feedback </span>

      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="feedback.php" class="uibutton icon confirm answer" >Back</a></div>
                <table align="center" cellspacing="20" cellpadding="10">
                                              <tr>
            <td><label > First Name</label></td>
            <td style="display:inline-block;width:200px;font-size:14px; line-height:20px;"><label style="font-weight:normal;">
                <?=$firstname?>
              </label></td>
          </tr>
                                     <!--         <tr>
            <td><label> Last Name</label></td>
            <td style="display:inline-block;width:200px ; font-size:14px;line-height:20px;"><label style="font-weight:normal;">
                <?=$lastname?>
              </label></td>
          </tr>
           </tr>
            <tr>
            <td><label>City</label></td>
            <td style="display:inline-block;width:200px ; font-size:14px;line-height:20px;"><label style="font-weight:normal;">
                <?=$city?>
              </label></td>
          </tr>-->
          <tr>
            <td><label>Contact</label></td>
            <td style="display:inline-block;width:200px ; font-size:14px;line-height:20px;"><label style="font-weight:normal;">
                <?=$contact?>
              </label></td>
          </tr>
                                              <tr>
            <td><label> email</label></td>
            <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;"><label style="font-weight:normal;">
              <a href="mailto:<?=$email?>" title="<?=$email?>"><?=$email?></a>
              </label></td>
          </tr>
           <tr>
            <td><label>Message</label></td>
            <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;"><label style="font-weight:normal;">
                <?=$message?>
              </label></td>
          </tr>
          
            </tr>
           <tr>
            <td><label>Ratings</label></td>
            <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;"><label style="font-weight:normal;">
                <?=$ratings?>
              </label></td>
          </tr>  
                                        
                                              <tr>
            <td><label>Created On</label></td>
            <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;"><label style="font-weight:normal;">
                <?php  echo date('d - M - Y ',strtotime($createdon)); ?>
              </label></td>
          </tr>
                                              <tr>
            <td><label> Status</label></td>
            <td style="display:inline-block;width:200px;font-size:14px;ine-height:20px;"><label style="font-weight:normal;">
                <?php  if ($status==1) { echo "Active"; } else if($status==0){ echo "Inactive"; } ?>
              </label></td>
          </tr>
                                            </table>
          
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
