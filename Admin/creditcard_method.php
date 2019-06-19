<?php include "db.php";

	if(isset($_POST['Submit']))
	{
		 $businessid = $_POST['businessid'];
   	$password= $_POST['password'];
	$signature= $_POST['signature'];
	$mode = $_POST['mode'];
   	$status =$_POST['status'];
	
		
		$sql = "Select * from creditcardpayment";
    	$r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    	$row = $r->fetch_assoc();
    	$totrec = mysqli_num_rows($r);
    	if($totrec == "0")
    	{
        $sql = "insert into creditcardpayment(businessid,password,signature,status,mode) values('$businessid','$password','$signature',$status)";
	 mysqli_query($dbLink,$sql) or die('could not insert Payment Method');
			$msg="Settings Updated Successfully";
    	}
    	else
    	{
        	 $sql = "update creditcardpayment set businessid='$businessid',password='$password',signature='$signature',status=$status,mode='$mode' ";
	 mysqli_query($dbLink,$sql) or die('could not update Payment Method');
			$msg="Settings Updated Successfully";
    	}
	}

    $sql = "Select * from creditcardpayment";
    $r = mysqli_query($dbLink,$sql) or die("can not select creditcardpayment");
    $row = $r->fetch_assoc();
    $businessid = stripslashes($row['businessid']);
   	$password= stripslashes($row['password']);
	$signature= stripslashes($row['signature']);
    //$smywebsitename = stripslashes($row['mywebsitename']);
   	$status = stripslashes($row['status']);
	$mode = stripslashes($row['mode']);
	
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
<link rel="stylesheet" type="text/css" href="css/zice.style.css"/>
<link rel="stylesheet" type="text/css" href="css/icon.css"/>
<link rel="stylesheet" type="text/css" href="css/ui-custom.css"/>
<link rel="stylesheet" type="text/css" href="css/timepicker.css"  />
<link rel="stylesheet" type="text/css" href="components/colorpicker/css/colorpicker.css"  />
<link rel="stylesheet" type="text/css" href="components/elfinder/css/elfinder.css" />
<link rel="stylesheet" type="text/css" href="components/datatables/dataTables.css"  />
<link rel="stylesheet" type="text/css" href="components/validationEngine/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="components/jscrollpane/jscrollpane.css" media="screen" />
<link rel="stylesheet" type="text/css" href="components/fancybox/jquery.fancybox.css" media="screen" />
<link rel="stylesheet" type="text/css" href="components/tipsy/tipsy.css" media="all" />
<link rel="stylesheet" type="text/css" href="components/editor/jquery.cleditor.css"  />
<link rel="stylesheet" type="text/css" href="components/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="components/confirm/jquery.confirm.css" />
<link rel="stylesheet" type="text/css" href="components/sourcerer/sourcerer.css"/>
<link rel="stylesheet" type="text/css" href="components/fullcalendar/fullcalendar.css"/>
<link rel="stylesheet" type="text/css" href="components/Jcrop/jquery.Jcrop.css"  />

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="components/ui/jquery.ui.min.js"></script>
<script type="text/javascript" src="components/ui/jquery.autotab.js"></script>
<script type="text/javascript" src="components/ui/timepicker.js"></script>
<script type="text/javascript" src="components/colorpicker/js/colorpicker.js"></script>
<script type="text/javascript" src="components/checkboxes/iphone.check.js"></script>
<script type="text/javascript" src="components/elfinder/js/elfinder.full.js"></script>
<script type="text/javascript" src="components/datatables/dataTables.min.js"></script>
<script type="text/javascript" src="components/datatables/ColVis.js"></script>
<script type="text/javascript" src="components/scrolltop/scrolltopcontrol.js"></script>
<script type="text/javascript" src="components/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="components/jscrollpane/mousewheel.js"></script>
<script type="text/javascript" src="components/jscrollpane/mwheelIntent.js"></script>
<script type="text/javascript" src="components/jscrollpane/jscrollpane.min.js"></script>
<script type="text/javascript" src="components/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="components/tipsy/jquery.tipsy.js"></script>
<script type="text/javascript" src="components/editor/jquery.cleditor.js"></script>
<script type="text/javascript" src="components/chosen/chosen.js"></script>
<script type="text/javascript" src="components/confirm/jquery.confirm.js"></script>
<script type="text/javascript" src="components/validationEngine/jquery.validationEngine.js" ></script>
<script type="text/javascript" src="components/validationEngine/jquery.validationEngine-en.js" ></script>
<script type="text/javascript" src="components/vticker/jquery.vticker-min.js"></script>
<script type="text/javascript" src="components/sourcerer/sourcerer.js"></script>
<script type="text/javascript" src="components/fullcalendar/fullcalendar.js"></script>
<script type="text/javascript" src="components/flot/flot.js"></script>
<script type="text/javascript" src="components/flot/flot.pie.min.js"></script>
<script type="text/javascript" src="components/flot/flot.resize.min.js"></script>
<script type="text/javascript" src="components/flot/graphtable.js"></script>
<script type="text/javascript" src="components/uploadify/swfobject.js"></script>
<script type="text/javascript" src="components/uploadify/uploadify.js"></script>
<script type="text/javascript" src="components/checkboxes/customInput.jquery.js"></script>
<script type="text/javascript" src="components/effect/jquery-jrumble.js"></script>
<script type="text/javascript" src="components/filestyle/jquery.filestyle.js" ></script>
<script type="text/javascript" src="components/placeholder/jquery.placeholder.js" ></script>
<script type="text/javascript" src="components/Jcrop/jquery.Jcrop.js" ></script>
<script type="text/javascript" src="components/imgTransform/jquery.transform.js" ></script>
<script type="text/javascript" src="components/webcam/webcam.js" ></script>
<script type="text/javascript" src="components/rating_star/rating_star.js"></script>
<script type="text/javascript" src="components/dualListBox/dualListBox.js"  ></script>
<script type="text/javascript" src="components/smartWizard/jquery.smartWizard.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/zice.custom.js"></script>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<script language="javascript">
    function validate(form)
    {
        
        if (form.business.value == "") {
            alert("Please Enter website")
            form.mywebsite.focus();
            return false;
        }
        
        if (form.password.value == "")
        {
            alert("Please Enter Return URL")
            form.password.focus();
            return false;
        }
        if (form.signature.value == "")
        {
            alert("Please Enter Cancel URL")
            form.signature.focus();
            return false;
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
      <div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> creditcardpayment</span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="payment_method.php" class="uibutton icon confirm answer" >Back</a></div>
        <div class="content" >
          <form method="post" name="form1" id="form1" onSubmit="return validate(this);">
            <div  class="grid3">
              <div class="section ">
                <label> Business ID<small>Text</small></label>
                <div>
                  <input type="text" class="large" name="businessid"  id="businessid" value="<?=$businessid?>">
                </div>
              </div>
              <div class="section ">
                <label> Password<small>Text</small></label>
                <div>
                  <input type="text" class="large" name="password" id="password" value="<?=$password?>">
                </div>
              </div>
              <div class="section ">
                <label>Signature<small>Text</small></label>
                <div>
                  <input type="text" class="large" name="signature" id="signature" value="<?=$signature?>">
                </div>
              </div>
              <div class="section ">
                <label>Mode<small></small></label>
                <div>
                  <select data-placeholder="Choose a Schooltype..." class="" name="mode">
                    <option value="" <?php  if($mode == "") { echo 'selected="selected"'; } ?>>Live</option>
                    <option value="sandbox" <?php  if($mode!="" && $mode=="sandbox") { echo 'selected="selected"'; } ?>>Sandbox</option>
                  </select>
                </div>
              </div>
              <div class="section ">
                <label>Status<small></small></label>
                <div>
                  <select data-placeholder="Choose a Schooltype..." class="" name="status">
                    <option value="1" <?php  if($status!="" && $status==1) { echo 'selected="selected"'; } ?>>Active</option>
                    <option value="0" <?php  if($status!="" && $status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
                  </select>
                </div>
              </div>
              <div class="section last">
                <div>
                  <input name="Submit" type="submit" class="uibutton submit_form icon confirm " value="Submit" />
                  <!-- <a class="uibutton submit_form" >submitForm</a>--> 
                </div>
              </div>
            </div>
          </form>
          <div class="clear"></div>
        </div>
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
