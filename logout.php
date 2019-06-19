<?php
  // If the user is logged in, delete the session vars to log them out
include('db.php');
include('include/start_session.php');
//require_once 'fbConfig.php';

// Remove access token from session

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
  
 // echo 'adada';
  //exit;
//unset($_SESSION['facebook_access_token']);

// Remove user data from session
//unset($_SESSION['userData']);


  // Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
  setcookie('CustomerID', '', time() - 3600);
  setcookie('Email', '', time() - 3600);
   setcookie('ShoppingCartID', '', time() - 3600);
   setcookie('FirstName', '', time() - 3600);
   setcookie('LastName', '', time() - 3600);

  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url); 
?>
