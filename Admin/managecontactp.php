<?php 
	include "db.php";
	
if(isset($_REQUEST['id']))
{
	$sql = "delete from contactmgnt where id=".$_REQUEST['id'];
	 mysqli_query($dbLink,$sql) or die('could not delete..');
	 echo "true";
}

?>
