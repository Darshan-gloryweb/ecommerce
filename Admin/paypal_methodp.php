<?php 
	include "db.php";
 	
	$id = AssureSec($_GET['editid']);
	$action = AssureSec($_GET['action']);
	
	$business= mysql_real_escape_string($dbLink,$_POST['business']);
	$return_url=$_POST['return_url'];
	$cancel_url=$_POST['cancel_url'];
	$status = AssureSec($_POST['status']);
	
	
if($action=='E')
{
     $sql = "update paypal set business='$business',return_url='$return_url',cancel_url='$cancel_url',status=$status where id=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update Payment Method');
     header("location:payment_method.php?msg=Record Updated Successfully");
	 exit();
	
}
else if($action=='A')
{
     $sql = "insert into paypal(business,return_url,cancel_url,status) values('$business','$return_url','$cancel_url',$status)";
	 mysqli_query($dbLink,$sql) or die('could not insert Payment Method');
     header("location:payment_method.php?msg=Record Added Successfully");
	 exit();
}
?>
