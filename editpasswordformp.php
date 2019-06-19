<?php
require_once('db.php'); 
 include('include/start_session.php');
	
		if($_POST['confirm'] == $_POST['new']){
			$sqlupdate = "UPDATE customer SET Password='".md5($_POST['confirm'])."' WHERE Email= '".$_SESSION['Email']."'";
			$resuserdeatil = mysqli_query($dbLink,$sqlupdate) or die("Error : ".mysqli_error());
			if($resuserdeatil){
				if (isset($_SESSION['CustomerID'])) {
    // Delete the session vars by clearing the $_SESSION array
    $_SESSION = array();

    // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();
  }
				  // Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
				  setcookie('CustomerID', '', time() - 3600);
				  setcookie('Email', '', time() - 3600);
				   setcookie('ShoppingCartID', '', time() - 3600);
				   setcookie('FirstName', '', time() - 3600);
				   setcookie('LastName', '', time() - 3600);
				?>
				 
				  <?php 
				
			}
		}


?>