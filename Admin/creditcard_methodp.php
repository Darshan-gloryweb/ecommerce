<?php 
	include "db.php";
 	
	$id = AssureSec($_GET['editid']);
	$action = AssureSec($_GET['action']);
	
	$businessid= mysql_real_escape_string($dbLink,$_POST['businessid']);
	$password=$_POST['password'];
	$signature=$_POST['signature'];
	$status = AssureSec($_POST['status']);
	
	
if(isset($_REQUEST['id']))
{
	$sql = "delete from creditcardpayment where id=".$_REQUEST['id'];
	 mysqli_query($dbLink,$sql) or die('could not Delete..');
	 echo "true";
}
else if($action=='E')
{
     $sql = "update creditcardpayment set businessid='$businessid',password='$password',signature='$signature',status=$status where id=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update Payment Method');
     header("location:payment_method.php?msg=Record Updated Successfully");
	 exit();
	
}
else if($action=='A')
{
     $sql = "insert into creditcardpayment(businessid,password,signature,status) values('$businessid','$password','$signature',$status)";
	 mysqli_query($dbLink,$sql) or die('could not insert Payment Method');
     header("location:payment_method.php?msg=Record Added Successfully");
	 exit();
}
?>
