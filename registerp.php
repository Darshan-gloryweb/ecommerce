<?php
require_once('db.php');

require_once('include/start_session.php');
header("Content-type: text/javascript");
//if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = $_POST['email'];
	$fname = $_POST['name'];
	$PhoneNumber = $_POST['PhoneNumber'];
    $password1 =$_POST['password'];
	$date =  date('Y-m-d');
	
	//$store = $_SESSION['Store'];
	//$register_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/register.php';
	//$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	//$login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
	$enc_pass = md5($password1);
	
	if (isset($username)&& isset($password1)) {
		$query = "INSERT INTO customer (FirstName,Email,Password,PhoneNumber,IsRegister,LastIPAddress,Status,CreatedOn,UpdatedOn) VALUES ('$fname','$username','$enc_pass','$PhoneNumber',1,'$ip',1,'$date','$date')";
		
        $resery = mysqli_query($dbLink,$query) or die ('Could Not Register');
	
		if($resery){echo $status = 'Done';}
			//echo 'test';
	//exit;
	}
	
	
	//if(isset($_POST['checkout']))
//	{
//		if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
//      // Make sure someone isn't already registered using this username
//      $query = "SELECT * FROM customer WHERE Email = '$username'";
//      $data = mysqli_query($dbLink,$query) or die ('Could Not Select Email');
//      if (mysqli_num_rows($data) == 0) {
//        // The username is unique, so insert the data into the database
//        $query = "update customer set FirstName='$fname',LastName='$lname',Email='$username', Password='$password1',IsRegister=1 , LastIPAddress='$ip' , Status=1,UpdatedOn='$date' where CustomerID=".$_SESSION['CustomerID'];
//		
//        mysqli_query($dbLink,$query) or die ('Could Not Register');
//		
//		$_SESSION['CustomerID'] = $_SESSION['CustomerID'];
//        $_SESSION['Email'] = $username;
//		$_SESSION['FirstName'] = $fname;
//		$_SESSION['LastName'] = $lname;
//        setcookie('CustomerID',$_SESSION['CustomerID'], time() + 60);    // expires in 30 days
//        setcookie('Email', $username, time() + 60);  // expires in 30 days 
//		setcookie('FirstName', $fname, time() + 60);  // expires in 30 days
//		setcookie('LastName', $lname, time() + 60);  // expires in 30 days
//		
//		
//		$name = $_SESSION['FirstName']." ".$_SESSION['LastName'];
//		
//		//Send Mail Client			
//		$sql1 = "select emailtemplate.* from emailtemplate inner join template on emailtemplate.TemplateID = template.TemplateID and template.TemplateName = 'ClientRegistration' and emailtemplate.Status=1";
//		$res1 = mysqli_query($dbLink,$sql1) or die ('Could Not Select');
//		$data1 = $res1->fetch_assoc();				
//		if(mysqli_num_rows($res1)>0)
//		{
//		
//		$headers = "MIME-Version: 1.0\n";
//        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
//        $headers .= "Content-Transfer-Encoding: 8bit\n";
//        $headers .= "From:".$data1['FromID']."\r\n";
//        $headers .= "Bcc:".$data1['BCC']."\r\n";
//        $headers .= "Cc:".$data1['CC']."\r\n";
//        $headers .= "X-Priority: 1\r\n";
//        $headers .= "X-MSMail-Priority: High\r\n";
//        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";
//
//		$subject = $data1['Subject'];
//		$str = $data1['MailBody'];
//		
//		$str = str_replace('#websiteurl#',$frontpath,$str);
//		$str = str_replace('#websitename#',$mywebsitename,$str);
//		$str = str_replace('#name#',$name,$str);
//		$str = str_replace('#username#',$_SESSION['Email'],$str);
//		
//        $content = "";
//        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
//        $content = $content .$str; 
//        $content = $content . "</body></html>";
//		mail($_SESSION['Email'],$subject,$content,$headers);
//		}
//	//Send Mail Client
//        header('Location: ' . $frontpath.'/checkout.php');
//		mysql_close($dbc);
//		
//        exit();
//      }
//      else {
//        // An account already exists for this username, so display an error message
//      // echo $error = "An account already exists for this username. Please use a different address.";
//	    header('Location: ' . $frontpath.'/checkout.php?msg=An account already exists for this username. Please use a different address.');
//      }
//    }
//    else {
//     // echo $error = "You must enter all of the sign-up data, including the desired password twice.";
//	   header('Location: ' . $register_url.'?msg=You must enter all of the sign-up data, including the desired password twice.');
//    }
//	}
//	else
//	{
    	//if (!empty($username) && !empty($password1)) {
      // Make sure someone isn't already registered using this username
      //$query = "SELECT * FROM customer WHERE Email = '$username'";
      //$data = mysqli_query($dbLink,$query) or die ('Could Not Select Email');
      //if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
       // $query = "INSERT INTO customer (FirstName,Email,Password,PhoneNumber,IsRegister,LastIPAddress,Status,CreatedOn,UpdatedOn) VALUES ('$fname','$username','$enc_pass','$PhoneNumber',1,'$ip',1,'$date','$date')";
		//
      //  $resery = mysqli_query($dbLink,$query) or die ('Could Not Register');
		//if($resery){echo $status = 'Done';}
		
		//header('Location: ' . $login_url.'?msg=Registration complete.');
		
		/*$_SESSION['CustomerID'] = mysqli_insert_id();
        $_SESSION['Email'] = $username;
		$_SESSION['FirstName'] = $fname;
		$_SESSION['LastName'] = $lname;
        setcookie('CustomerID', mysqli_insert_id(), time() + 60);    // expires in 30 days
        setcookie('Email', $username, time() + 60);  // expires in 30 days 
		setcookie('FirstName', $fname, time() + 60);  // expires in 30 days
		setcookie('LastName', $lname, time() + 60);  // expires in 30 days
		
		
		$name = $_SESSION['FirstName']." ".$_SESSION['LastName'];*/
//Send Mail Client			
		//$sql1 = "select emailtemplate.* from emailtemplate inner join template on emailtemplate.TemplateID = template.TemplateID and template.TemplateName = 'ClientRegistration' and emailtemplate.Status=1";
		//$res1 = mysqli_query($dbLink,$sql1) or die ('Could Not Select');
		//$data1 = $res1->fetch_assoc();				
		//if(mysqli_num_rows($res1)>0)
		//{
		
		//$headers = "MIME-Version: 1.0\n";
//        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
//        $headers .= "Content-Transfer-Encoding: 8bit\n";
//        $headers .= "From:".$data1['FromID']."\r\n";
//        $headers .= "Bcc:".$data1['BCC']."\r\n";
//        $headers .= "Cc:".$data1['CC']."\r\n";
//        $headers .= "X-Priority: 1\r\n";
//        $headers .= "X-MSMail-Priority: High\r\n";
//        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";
//
//		$subject = $data1['Subject'];
//		$str = $data1['MailBody'];
//		
//		$str = str_replace('#websiteurl#',$frontpath,$str);
//		$str = str_replace('#websitename#',$mywebsitename,$str);
//		$str = str_replace('#name#',$name,$str);
//		$str = str_replace('#username#',$_SESSION['Email'],$str);
//		
//        $content = "";
//        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
//        $content = $content .$str; 
//        $content = $content . "</body></html>";
//		mail($_SESSION['Email'],$subject,$content,$headers);
//		}
	//Send Mail Client
        // Confirm success with the user
		//echo "<script type='text/javascript'>alert('Signup Successful and please login');
	 	//echo "<meta http-equiv='refresh' content='0; url=index.php' />";
        //mysql_close($dbc);
       
      //}
      //else {
     //   // An account already exists for this username, so display an error message
      // echo $error = "An account already exists for this username. Please use a different address.";
	  //  header('Location: ' . $register_url.'?msg=An account already exists for this username. Please use a different address.');
     // }
    //}
    
	//}
 
  
 ?>