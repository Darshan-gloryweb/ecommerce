<?php
 require_once('db.php');
 require_once('include/start_session.php');
// Start the session
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  $login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
  // if (!isset($_SESSION['CustomerID'])) {
    
	//if (isset($_POST['login'])) {
      // Connect to the database
		
      // Grab the user-entered log-in data
       $user_username = mysqli_real_escape_string($dbLink,trim($_POST['email']));
       $user_password = md5(mysqli_real_escape_string($dbLink,trim($_POST['password'])));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
          $query = "SELECT * FROM customer WHERE Email = '$user_username' AND Password = '$user_password'";
        //exit;
		
		$data = mysqli_query($dbLink,$query) or die ('Could Not Login');

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = $data->fetch_assoc();
		  
		  if(isset($_POST['checkout']))
		  {
			  if(isset($_SESSION['CustomerID']) && $_SESSION['CustomerID']!=$row['CustomerID'])
			  {
				  $update_cart_customer_id_sql = "Update shoppingcart set CustomerID=".$row['CustomerID']." where ShoppingCartID=".$_SESSION['ShoppingCartID'];
				  mysqli_query($dbLink,$update_cart_customer_id_sql) or die ('Could Not Get Your Cart');
			  }
		  }
		  
           $_SESSION['CustomerID'] = $row['CustomerID'];
		   $_SESSION['FirstName'] = $row['FirstName'];
		   $_SESSION['LastName'] = $row['LastName'];
           $_SESSION['Email'] = $user_username;
          
		  setcookie('CustomerID', $row['CustomerID'], time() + 60);    // expires in 30 days
          setcookie('Email', $user_username, time() + 60);  // expires in 30 days 
		  
		  $res = "Done";
        }
        else {
         
		  $res = "login error";

        }
      }
      else {
         $res = "login error";
			
      }
$data = array(
            "res"  => $res,
			
        );
echo json_encode($data);	
    //}
 // }


 //require_once('db.php');
// require_once('include/start_session.php');
// header("Content-type: text/javascript");
// Start the session
  //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  //$login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
  // if (!isset($_SESSION['CustomerID'])) {
   // if (isset($_POST['login'])) {
      // Connect to the database
		
      // Grab the user-entered log-in data
      // $user_username = $_POST['email'];
//      $user_password = $_POST['password'];
//	  $user_password1=md5($_POST['password']);
//		//exit;
//	  if(isset($user_username) && isset($user_password))
//	  {
//		  	  $query = "SELECT * FROM customer WHERE Email = '$user_username' AND Password = '$user_password1'";
//        	 $data = mysqli_query($dbLink,$query) or die ('Could Not Login');
//			if (mysqli_num_rows($data) == 1) {
//			  // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
//			  $row = $data->fetch_assoc();
//			  
//			  //if(isset($_POST['checkout']))
////			  {
////				  if(isset($_SESSION['CustomerID']) && $_SESSION['CustomerID']!=$row['CustomerID'])
////				  {
////					  $update_cart_customer_id_sql = "Update shoppingcart set CustomerID=".$row['CustomerID']." where ShoppingCartID=".$_SESSION['ShoppingCartID'];
////					  mysqli_query($dbLink,$update_cart_customer_id_sql) or die ('Could Not Get Your Cart');
////				  }
////			  }
//			  
//			  $_SESSION['CustomerID'] = $row['CustomerID'];
//			  $_SESSION['FirstName'] = $row['FirstName'];
//			  //$_SESSION['LastName'] = $row['LastName'];
//			  $_SESSION['Email'] = $user_username;
//			  
//			  
//			  
//			  setcookie('CustomerID', $row['CustomerID'], time() + 60);    // expires in 30 days
//			  setcookie('Email', $user_username, time() + 60);  // expires in 30 days 
//			  
//			  //session_start(); 
//			  //echo 'ttt';
//			  //exit;
//			  //echo $_GET['location'];	
//			  //exit;
//			 	//if(isset($_GET['location'])) {
//   					// echo $status = htmlspecialchars($_GET['location']);
//				//}
//			 
//			 
//			  if(isset($_POST['checkout']))
//			  {
//				  header('Location: ' . $frontpath.'/checkout.php');
//			  }
//			  else
//			  {
//				session_start(); 
//			
//			  }
//			}
//			 
//	  }
	
      //if (!empty($user_username) && !empty($user_password)) {
//        // Look up the username and password in the database
//        $query = "SELECT CustomerID,FirstName,LastName FROM customer WHERE Email = '$user_username' AND Password = '$user_password1'";
//        $data = mysqli_query($dbLink,$query) or die ('Could Not Login');
//
//        if (mysqli_num_rows($data) == 1) {
//          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
//          $row = $data->fetch_assoc();
//		  
//		  if(isset($_POST['checkout']))
//		  {
//			  if(isset($_SESSION['CustomerID']) && $_SESSION['CustomerID']!=$row['CustomerID'])
//			  {
//				  $update_cart_customer_id_sql = "Update shoppingcart set CustomerID=".$row['CustomerID']." where ShoppingCartID=".$_SESSION['ShoppingCartID'];
//				  mysqli_query($dbLink,$update_cart_customer_id_sql) or die ('Could Not Get Your Cart');
//			  }
//		  }
//		  
//          $_SESSION['CustomerID'] = $row['CustomerID'];
//		  $_SESSION['FirstName'] = $row['FirstName'];
//		  $_SESSION['LastName'] = $row['LastName'];
//          $_SESSION['Email'] = $user_username;
//          
//		  
//		  setcookie('CustomerID', $row['CustomerID'], time() + 60);    // expires in 30 days
//          setcookie('Email', $user_username, time() + 60);  // expires in 30 days 
//		  if(isset($_POST['checkout']))
//		  {
//			  header('Location: ' . $frontpath.'/checkout.php');
//		  }
//		  else
//		  {
//			session_start(); 
//		  	header('Location: ' . $home_url);
//		  }
//        }
//        else {
//          // The username/password are incorrect so set an error message
//if(isset($_POST['checkout']))
//		  {
//			  header('Location: ' . $frontpath.'/checkout.php?msg=Sorry, you must enter a valid username and password to log in.');
//		  }
//		  else
//		  {
//         
//		  header('Location: ' . $login_url.'?msg=Sorry, you must enter a valid username and password to log in.');
//}
//        }
//      }
//      else {
//        // The username/password weren't entered so set an error message
//if(isset($_POST['checkout']))
//		  {
//			  header('Location: ' . $frontpath.'/checkout.php?msg=Sorry, you must enter a valid username and password to log in.');
//		  }
//		  else
//		  {
//		 header('Location: ' . $login_url.'?msg=Sorry, you must enter your username and password to log in.');
//}
//      }
    //}
 // }

?>