<?php include "db.php";

$sql = "update customerreview set status=".$_POST['crstatus']." where crid=".$_POST['crid'];
$query = mysqli_query($dbLink,$sql) or die('could not update..');


if($query){
	
	$sql1 = "select status from customerreview where crid=".$_POST['crid'];
	$query1 = mysqli_query($dbLink,$sql1) or die('could not update..');
	$data1 = $query1->fetch_assoc();
	$crstatus = $data1['status'];
	if($crstatus == 1){
		echo $res = 'Review status is Active';
	}else{
		echo $res = 'Review status is Inactive';
	}
}
