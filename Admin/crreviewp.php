<?php
	include "db.php";
	if(isset($_REQUEST['id']))
	{
		$sql2="delete from customerreview where crid=".$_REQUEST['id']; 
		mysqli_query($dbLink,$sql2) or die('could not Delete product..');
		echo 'true';
	}
	
?>