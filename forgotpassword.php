<?php  require_once('db.php'); ?>
<?php require_once('include/function.php'); 
 include('include/start_session.php');
?>
<?php require_once('header.php');?>
    <div class="checkout_table" style="margin: 90px 263px;width: 433px;">
    <form name="login" id="login" onSubmit="return validateForgot(this)" action="forgotpassp.php" method="post">
      <div  style="font-size: 13px;margin: 10px 0;text-align: center;"> <?php echo $_REQUEST['msg']; ?> </div>
      <table width="100%">
      	<tr>
        	<th>
            	<strong>Forgot Password?</strong>
            </th>
        </tr>
        <tr>
          <td>Email Address<br />
          <input type="text" name="username" id="username" class="" size="57" /></td>
        </tr>  
          <td colspan="2"><input type="submit" name="login" value="Login"  class="loginbtn"/></td>
        </tr>
      </table>
      </form>
      </div>
    
  </div>

  <?php require_once('footer.php');?>
