<?php
require_once('db.php'); 
 include('include/start_session.php');

		$sqlupdate = "UPDATE customer SET FirstName='".$_POST['fname']."',LastName='".$_POST['lname']."',Email='".$_POST['email']."',PhoneNumber='".$_POST['phone']."' WHERE Email= '".$_POST['email']."'";
		$resuserdeatil = mysqli_query($dbLink,$sqlupdate) or die("Error : ".mysqli_error());
		
		


?>
