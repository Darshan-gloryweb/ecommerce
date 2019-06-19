<?php 
	include "db.php";
 	
	$id = $_GET['editid'];
	$action = $_GET['action'];
	
	$menu = $_POST['name'];
	
if(isset($_REQUEST['id']))
{
	$s="delete from navigation where menuid in (".$_REQUEST['id'].")";
	mysqli_query($dbLink,$s) or die ('Could Not Delete Navigation');
	
	$sql = "delete from menu where id=".$_REQUEST['id'];
	 mysqli_query($dbLink,$sql) or die('could not Delete..');
	 echo "true";
}
else if($action=='E')
{
     $sql = "update menu set name='$menu' where id=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update menu');
     header("location:managenavigation.php?msg=Record Updated Successfully");
	 exit();
	
}
else if($action=='A')
{
     $sql = "insert into menu(name) values('$menu')";
	 mysqli_query($dbLink,$sql) or die('could not insert Menu');
     header("location:managenavigation.php?msg=Record Added Successfully");
	 exit();
}
?>
