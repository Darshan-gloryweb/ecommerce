<?php include "db.php";
	if(isset($_REQUEST['id'])){
		$action='E';
	    $sql = "Select * from adminuser where AdminUserID=".$_REQUEST['id'];
    	$r = mysqli_query($dbLink,$sql) or die("can not select adminuser");
	    $row = $r->fetch_assoc();
		$editid = $_REQUEST['id'];
    	$FirstName = stripslashes($row['FirstName']);
		$LastName = stripslashes($row['LastName']);
		$Email = stripslashes($row['Email']);
		$username = stripslashes($row['UserName']);
		$Password = md5($row['Password']);
		$aimg= stripslashes($row['AImg']);
		$access = stripslashes($row['access']);
		$paccess=explode(',',$access);
	}
	else{
		$action='A';	
		$editid = '';
    	$FirstName = '';
		$LastName = '';
		$Email = '';
		$username = '';
		$Password = '';
		$aimg= '';
		$access = '';
		$paccess='';
		
	}
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
        <?php  include('password_set.php'); ?>    
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
					 <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ if(isset($_GET['msg'])){ echo $_GET['msg']; } } ?></div></div>
                    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Add User</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
					<div style="margin-bottom:10px;"><a href="user.php" class="uibutton icon confirm answer" >Back</a></div>
                            <div class="content" >
                            
                          <form action="userp.php?action=<?php  echo $action;?>&editid=<?php  echo $editid;?>" method="post" name="form" id="form" onSubmit="return validateuser(this);" enctype="multipart/form-data"> 
                            
                            <div  class="grid3">
                                    
                                    <div class="section ">
                                    <label> First Name<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="FirstName"  id="FirstName" value="<?=$FirstName?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Last Name<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="LastName"  id="LastName" value="<?=$LastName?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Admin Image<small>Image of Admin</small></label>   
                                    <div> 
                                    <?php  if( $aimg != "")
									{ ?>
                                    <img src="<?=$frontpath?>/UserImage/<?=$aimg?>?<?php  echo time(); ?>" height="200" width="200" alt="<?=$FirstName?>" /><br /> <?php  } ?>
                                    <input type="file" class="fileupload" name="aimg" id="aimg" />
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> User Name<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="username"  id="username" value="<?=$username?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Email<small>Text</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="Email"  id="Email" value="<?=$Email?>">
                                    </div>
                                    </div>

									<!-- <div class="section ">
                                    <label>Password<small>Text</small></label>   
                                    <div> 
                                    <input type="password" class="large" name="Password"  id="Password" value="<?=$Password?>" onKeyUp="passwordStrength(this.value);" />
                                    </div>
                                    </div> -->
                             		
                                  <!--  
                                   <div class="section " style="height:40px;">
									<label for="passwordStrength">Password strength<small>Strength of Password</small></label><div>
									<div id="passwordDescription" style="margin-bottom:5px;">Password not entered</div>
									<div id="passwordStrength" class="strength0"></div>

									</div>
                                    </div> -->
                                    
                                    <div class="section ">
                                    <label>Your Password Should Have<small>Security</small></label>   
                                    <div>
                                    <label class="large">This Validations<small></small></label>
                                    <ul id="sec"></ul>
                                    </div>
                                    </div>
                                    
                                    <div style="float:right">
                                        <a class="uibutton call" >Check All</a>
                    					<a class="uibutton uall" >Uncheck ALL</a>
                                        </div>
                                    
                                    <div class="section ">
                                    <label>Select Menu<small>Access to Admin</small></label>   
                                    <div> 
                                    <ul>
                                                                      
                                       <li> <label >Menu Items</label>    
                                     <ul style="margin-left:24px;">
                                        <?php  $degsql="select id,url,name from admin_menu order by displayorder";
					 						  $degres=mysqli_query($dbLink,$degsql) or die ("Could Not Select Subject");
					 						  while($degdata=$degres->fetch_assoc())
					 						 {	?>
								 <li>
                         <input type="checkbox" name="access[]" id="<?=$degdata['id']?>" value="<?=$degdata['url']?>" class="ck allstate" <?php  if($paccess!=''){if(in_array($degdata['url'],$paccess)){ echo "checked='checked'"; }} ?> />
                         <label for="<?=$degdata['id']?>"><?=$degdata['name']?></label></li>
                         <?php  } ?>	</ul>
                         					</li>
                                     </ul>
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
