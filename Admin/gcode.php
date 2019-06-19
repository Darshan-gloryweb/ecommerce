<?php include "db.php";

    $sql = "Select * from google_code";
    $r = mysqli_query($dbLink,$sql) or die("can not select Image");
	$row=$r->fetch_assoc();
	$code=($row['code']);	
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
        <script type="text/javascript">
		function validate()
		{
			/*if(document.getElementsByName('script')[0].value == "")
			{
				alert('Please Enter Your Analytics Code');
				document.getElementsByName('script')[0].focus();
				return false;
			}*/
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
					 $right=user_right('gcode.php');
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

					<div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                    <div class="onecolumn" >
                        <div class="header"><span><span class="ico gray administrator"></span>Add Google Analytic Code</span></div>
                        <div class="clear"></div>
                        
                        
                        
                        <div class="content" >
                            <form id="validation_demo" action="gcodep.php" enctype="multipart/form-data" method="post" onSubmit="return validate();"> 
                            
                            <div  class="grid3">
                            
                            		<div class="section">
                                   <label> Script  <small>Banner Script</small></label>   
                                  <div > <textarea name="script" id="editor"  class="editor"  cols="" rows=""><?=html_entity_decode($code)?></textarea></div>      
                                    </div>
                                   
                            		<div class="section last">
                                    <div>
                                    <input type="hidden" value="<?php if(!empty($size)){echo $size;}?>" name="size" />
                                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                                     
                                    </div>
									</div>
                                    </form>
                                 </div>                       
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
