<?php

   include("db.php");

	$fname =$_REQUEST['fname'];
	$lname =$_REQUEST['lname'];
	$rating =$_REQUEST['rating'];
    $email = $_REQUEST['email'];
	$message = $_REQUEST['message'];
	$pid = $_REQUEST['pid'];
	$createdon=date('Y-m-d H:i:s');
	
	$sql = "Insert into productreview(prodid,fname,lname,email,notes,rating,status,createdon) VALUES ($pid,'$fname','$lname','$email','$message',$rating,1,'$createdon')";
	//echo $sql;
	$abc=mysqli_query($dbLink,$sql) or die ('Could Not Inserted');
	if($abc)
	{
		echo "True";
	}
?>