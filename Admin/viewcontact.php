<?php include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }
    $sqledit = "Select * from contactmgnt where id=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select degreemst");
    $editrow = $editres->fetch_assoc();

	$fname = stripslashes($editrow['fname']);
	$lname = stripslashes($editrow['lname']);
	$address = stripslashes($editrow['address']);
	$city = stripslashes($editrow['city']);
	$email = stripslashes($editrow['email']);
	$contact = stripslashes($editrow['contact']);
	$message = stripslashes($editrow['message']);
	$date = stripslashes($editrow['date']);
	
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
       <?php  include('include_files.php'); ?>    
    <script language="javascript" type="text/javascript" src="validation.js"></script>
                
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
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Contact Detail Of <font color="#009900"><?=$fname?> <?=$lname?></font> </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <div style="margin-bottom:10px;"><a href="managecontact.php" class="uibutton submit_form" >Back</a></div>
                    
                    
                           			
                            		<table align="center" cellspacing="20" cellpadding="10">
                                    <tr><td>
                                    <label > First Name</label>   
                                    </td>
                                    <td style="display:inline-block;width:200px;font-size:14px; line-height:20px;">
                                    <label style="font-weight:normal;"><?=$fname?></label>
                                    </td></tr>
                                    <tr><td>
                                    <label> Last Name</label>   
                                    </td>
                                    <td style="display:inline-block;width:200px ; font-size:14px;line-height:20px;">
                                    <label style="font-weight:normal;"><?=$lname?></label>
                                    </td></tr>
                                    <tr><td>
									<label>Address</label></td>
                                    <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;">
                                   
                                    <label style="font-weight:normal;"><?=$address?></label>
                                    </td></tr>
                                    <tr><td>
                                    <label>City</label>   
                                   </td>
                                    <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;">
                                    <label style="font-weight:normal;"><?=$city?></label></td></tr>
                                    <tr><td>
									
                                    <label> Email</label>   
                                   
                                    </td>
                                    <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;">
                                   
                                    <label style="font-weight:normal;"><?=$email?></label>   
                                    
                                    </td></tr>
                                    <tr><td>
									<label> Message</label>
                                    </td>
                                    <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;">
                                    <label style="font-weight:normal;"><?=$message?></label>
                                    </td></tr>
                                    <tr><td>
									
                                    <label> Contact</label>   
                                    
                                    </td>
                                    <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;">
                                    
                                    <label style="font-weight:normal;"><?=$contact?></label>   
                                    
                                    </td></tr>
                                    <tr><td>
									
                                    <label> Date</label>   
                                    
                                    </td>
                                    <td style="display:inline-block;width:200px;font-size:14px;ine-height:20px;">
                                    
                                    <label style="font-weight:normal;"><?=$date?></label>   
                                   
                                    </td></tr>
                                    </table>
                                    
                            <div class="clear"></div>


                        </div>


					</div>
					 <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
