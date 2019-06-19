<?php 
	include "db.php";
if(isset($_REQUEST['id']))
{
		$sql4="delete from customer where CustomerID=".$_REQUEST['id']; 
	 	mysqli_query($dbLink,$sql4) or die('could not Delete..');
	 	echo "true";
}
?>
