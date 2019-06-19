<?php
require_once('db.php');
session_start();
$id= $_REQUEST['id'];
$date = date('Y-m-d');
if(isset($_SESSION['Email']) && isset($_SESSION['CustomerID']))
{
	$sqll = "select * from wishlist where ProductID =".$id." and CustomerID=".$_SESSION['CustomerID'];
	$res = mysqli_query($dbLink,$sqll) or die ('Could Not Select');
	if(mysqli_num_rows($res)>0)
	{
		echo "Already Added to Wishlist";
	}
	else
	{
	$sql = "insert into wishlist (CustomerID,ProductID,CreatedOn) value (".$_SESSION['CustomerID'].",".$id.",'".$date."')";
	$b = mysqli_query($dbLink,$sql);
	if($b)
	{
		echo "Item Added To Wishlist";
	}
	else
	{
		echo "Item Could Not Added To Wishlist";
	}
	}
}

?>