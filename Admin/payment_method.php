<?php include "db.php";

/*	$sql = "Select * from pagemgnt";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");*/
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
<!-- Link css-->
<?php  include('include_files.php'); ?>
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
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> Select Payment Method </span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <form>
          <div class="tableName">
            <table class="display data_tablepage" id="">
              <thead>
                <tr>
                  <th align="left">Name</th>
                  <th align="left">Settings</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td align="left">Paypal Method</td>
                  <td align="left"><a href="paypal_method.php">Settings</a></td>
                </tr>
                <tr>
                  <td align="left">Credit Card Method</td>
                  <td align="left"><a href="creditcard_method.php">Settings</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
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
