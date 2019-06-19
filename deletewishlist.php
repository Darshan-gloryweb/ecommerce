<?php
require_once('db.php');
session_start();
$id= $_REQUEST['id'];

	$sql = "delete from wishlist where CustomerID=".$_SESSION['CustomerID']." and ProductID=".$id;
	$b = mysqli_query($dbLink,$sql);
	if($b)
	{
		echo "Deleted";
	}
	else
	{
		echo "NotDeleted";
	}
?>