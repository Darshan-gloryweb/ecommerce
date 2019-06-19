<?php 
include "db.php";

	$sql = "Select * from google_code";
    $r = mysqli_query($dbLink,$sql) or die("can not select Image");
	$cnt=mysqli_num_rows($r);
	
	$script=mysqli_real_escape_string($dbLink,$_POST['script']);
	if($cnt>0)
	{
		$sql = "update google_code set code='$script'";
		mysqli_query($dbLink,$sql) or die("could not update script");
	
		header("location:gcode.php?msg=Script Updated Successfully");
		exit();
	}
	else
	{
		$sql = "insert into google_code (code) values ('$script')";
		mysqli_query($dbLink,$sql) or die("could not Add Script");
		header("location:gcode.php?msg=Script Added Successfully");
		exit();
	}
?>