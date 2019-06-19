<?php 
include "db.php";
	$id = $_GET['editid'];
	$action = $_GET['action'];
	$attr_pro = implode(',',$_POST['attr_pro']);
	$attr_var = implode(',',$_POST['attr_var']);
	
	
	
	
if($action=='E')

{

	 $sql = "update product set attr_pro='".$attr_pro."',attr_var = '".$attr_var."'  where ProductID=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 header("location:addproduct.php?id=$id&msg=Record Updated Successfully&tab=5");
 	 exit();

}



?>

