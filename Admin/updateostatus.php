<?php 
include "db.php";

	
	
	$ordertype = $_REQUEST['ordertype'];
	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	$isbusiness = $_REQUEST['isbusiness'];
	
	$sql="update bulkorder set status='$status' where bulkorderid=".$id." and isbusiness =".$isbusiness;
	//echo $sql;
	mysqli_query($dbLink,$sql) or die("could not update address");
	
	echo "Status Updated Successfully";