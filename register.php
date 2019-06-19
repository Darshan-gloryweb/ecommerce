<?php include('db.php'); ?>
<?php require_once('include/function.php');
 include('include/start_session.php'); 
 $title = "Register";
 ?>
<?php include('header.php'); ?>

<div class="checkout_table" style="margin: 90px 263px;width: 433px;">
  <form name="register" id="register" method="post" action="registerp.php" onSubmit="return validateRegister(this)">
      <div  style="color: #F00;font-size: 12px;margin: 10px 0;text-align: center;"> 
	  <?php if(isset($_REQUEST['msg'])){echo $_REQUEST['msg']; }?> </div>
      <table width="100%">
      <tr><th>Register</th></tr>
      <tr>
      <td>First Name <br />
         <input type="text" name="fname" id="fname" class="" size="57" /></td>
         </tr>
         <tr>
          <td>Last Name <br />
         <input type="text" name="lname" id="lname" class="" size="57" /></td>
          </tr>
        <tr>
          <td>Email<br />
          <input type="text" name="username" id="username" class="" size="57" /></td>
        </tr>
        <tr>
          <td>Password<br />
          <input type="password" name="password1" id="password" onkeypress="capLock(event)" size="57" /></td>
        </tr>
        <tr>
          <td>Confirm Password<br />
          <input type="password" name="password2" id="password" onkeypress="capLock(event)" size="57" /></td>
        </tr>
        <tr>
         <td colspan="2"><input type="submit" name="submit" value="Register"  class="loginbtn"/></td>
        </tr>
        <tr>
        <td colspan="2">
        If already have account, Please login from  <a href="<?=$frontpath?>/login.php" title="Login" style="color:#A38ECB;">here</a></td>
        </tr>
      </table>
      </form>
      </div>
    
  </div>
               
               <?php /*?> <img src="<?=$frontpath?>/images/shopping-top.jpg" alt="" title="" class="img_left">
                <div class="shoppingformdetails">
                    
                    <div class="shoppingpt2">
                    <form name="register" id="register" method="post" action="registerp.php" onSubmit="return validateRegister(this)">
                    	
                        <div class="shoppingptrow" style="color:red;">
                    
                        <?php echo $_REQUEST['msg']; ?>
                        </div>
                        <div class="shoppingptrow">
                        
                            <div class="shoppingptrowleft">
                               Email</div>
                            <div class="shoppingptrowright">
                                <input type="text" name="username" id="username" class="textfield" />
                            </div>
                        </div>
                        <div class="shoppingptrow">
                            <div class="shoppingptrowleft">
                                Password</div>
                            <div class="shoppingptrowright">
                                <input type="password" class="textfield" name="password1" id="password" onkeypress="capLock(event)" />
                            </div>
                        </div>
                        <div class="shoppingptrow">
                            <div class="shoppingptrowleft">
                                Confirm Password</div>
                            <div class="shoppingptrowright">
                                <input type="password" class="textfield" name="password2" id="password" onkeypress="capLock(event)" />
                            </div>
                        </div>
                        
                        
                        
                        <div class="shoppingptrow">
                            <div class="shoppingptrowleft">
                                &nbsp;</div>
                            <div class="shoppingptrowright">
                                <input type="submit" name="submit" value="Register"  style="background-color: #0087BE;color: #FFF;font-size: 14px;font-weight: bold;padding: 7px;border-radius: 6px;margin-left: 128px; cursor:pointer;"/>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <img src="<?=$frontpath?>/images/shopping-bottom.jpg" alt="" title="" class="img_right"><?php */?>

<?php require_once('footer.php');?>