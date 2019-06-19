<?php include "db.php";

	if(isset($_POST['Submit']))
	{
		$sfrontpgtitle = $_POST['frontpgtitle'];
		$sadminpgtitle = $_POST['adminpgtitle'];
		$smywebsite = $_POST['mywebsite'];
		$smywebsitename = $_POST['mywebsitename'];
		$sfrontpath = $_POST['frontpath'];
   		$sadminpath = $_POST['adminpath'];
   		$sfootertitle = $_POST['footertitle'];
		
		$sql = "Select * from websetting";
    	$r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    	$row = $r->fetch_assoc();
    	$totrec = mysqli_num_rows($r);
    	if($totrec == "0")
    	{
        	$sql = "insert into websetting(adminpgtitle,frontpgtitle,mywebsite,mywebsitename,frontpath,adminpath,footertitle) values('$sadminpgtitle','$sfrontpgtitle','$smywebsite','$smywebsitename','$sfrontpath','$sadminpath','$sfootertitle')";
	    	mysqli_query($dbLink,$sql) or die('could not insert..');
			$msg="Settings Updated Successfully";
    	}
    	else
    	{
        	$sql = "update websetting set adminpgtitle='$sadminpgtitle',frontpgtitle='$sfrontpgtitle',mywebsite='$smywebsite',mywebsitename='$smywebsitename',frontpath='$sfrontpath',adminpath='$sadminpath',footertitle='$sfootertitle'";
			mysqli_query($dbLink,$sql) or die('could not update..');
			$msg="Settings Updated Successfully";
    	}
	}

    $sql = "Select * from websetting";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    $row = $r->fetch_assoc();
    $sfrontpgtitle = stripslashes($row['frontpgtitle']);
   	$sadminpgtitle = stripslashes($row['adminpgtitle']);
	$smywebsite = stripslashes($row['mywebsite']);
    $smywebsitename = stripslashes($row['mywebsitename']);
   	$sfrontpath = stripslashes($row['frontpath']);
   	$sadminpath = stripslashes($row['adminpath']);
	$sfootertitle = stripslashes($row['footertitle']);		
	
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
        
        if (form.mywebsite.value == "") {
            alert("Please Enter website")
            form.mywebsite.focus();
            return false;
        }
        
        if (form.frontpath.value == "")
        {
            alert("Please Enter Frontend path")
            form.frontpath.focus();
            return false;
        }
        if (form.adminpath.value == "")
        {
            alert("Please Enter Admin path")
            form.adminpath.focus();
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
                    <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div></div>
                                        
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Website Path And Title Settings </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
				<div style="margin-bottom:10px;"><a href="webset.php" class="uibutton icon confirm answer" >Back</a></div>
                            <div class="content" >
                           
                            <form method="post" name="form1" id="form1" onSubmit="return validate(this);"> 
                            
                            <div  class="grid3">
                                    
									<div class="section ">
                                    <label> Front Page Title<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="frontpgtitle"  id="frontpgtitle" value="<?=$sfrontpgtitle?>">
                                    </div>
                                    </div>
                                    <div class="section ">
                                    <label> Admin Page Title<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="adminpgtitle" id="adminpgtitle" value="<?=$sadminpgtitle?>">
                                    </div>
                                    </div>
                                    <div class="section ">
                                    <label> Website<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="mywebsite" id="mywebsite" value="<?=$smywebsite?>">
                                    </div>
                                    </div>
                                    <div class="section ">
                                    <label> Website Name<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="mywebsitename"  id="mywebsitename" value="<?=$smywebsitename?>">
                                    </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="section ">
                                    <label> Frontend Path<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="frontpath" id="frontpath" value="<?=$sfrontpath?>">
                                    </div>
                                    </div>
                                    <div class="section ">
                                    <label> Admin Path<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="adminpath"  id="adminpath" value="<?=$sadminpath?>">
                                    </div>
                                    </div>
                                   
                                    <div class="section ">
                                    <label> Footer Text<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="footertitle" id="footertitle"  value="<?=$sfootertitle?>">
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
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
