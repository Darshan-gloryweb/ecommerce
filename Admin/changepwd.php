<?php include "db.php";
    $sql = "Select FirstName,LastName from adminuser where AdminUserID=".$_SESSION['what_adminid'];
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    $row = $r->fetch_assoc();
    $aname = stripslashes($row['FirstName']).' '.stripslashes($row['LastName']);
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
        <?php  include('include_files.php');?>
        <?php  include('pass_set.php'); ?>     
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
                    <span ><span class="ico  gray spreadsheet"></span><span style="color:#9BC652;padding:0px"><?php echo $aname; ?></span>&nbsp;>&nbsp;Change Password </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >

                            <div class="content" >
                            <form action="changepwdp.php?action=pass" method="post" name="form2" id="form2" onSubmit="return validate1(this);"> 
                            
                            <div  class="grid3">
                                    
									<div class="section ">
                                    <label> Old Password<small>Text</small></label>   
                                    <div> 
                                    <input type="password" class="large" name="oldpass"  id="oldpass" />
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> New Password<small>Text</small></label>   
                                    <div> 
                                    <input type="password" class="large" name="newpass"  id="newpass" onKeyUp="passwordStrength(this.value)" />
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Confirm Password<small>Text</small></label>   
                                    <div> 
                                    <input type="password" class="large" name="confpass"  id="confpass" />
                                    </div>
                                    </div>
                                    
                                   <div class="section " style="height:40px;">
									<label for="passwordStrength">Password strength<small>Strength of Password</small></label><div>
									<div id="passwordDescription" style="margin-bottom:5px;">Password not entered</div>
									<div id="passwordStrength" class="strength0"></div>
									</div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Your Password Should Have<small>Security</small></label>   
                                    <div> 
                                    <ul id="sec"></ul>
                                    </div>
                                    </div>
                                   
                                    <div class="section last">
                                    <div>
                                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
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
