<?php
require_once('db.php');
header("Content-type: text/javascript");

$viewon = date("Y-m-d");
$viewip = $_SERVER['REMOTE_ADDR'];



 //$sqlrecent_view = "UPDATE product SET ViewOn='".$viewon."' , ViewIp='".$viewip."' WHERE ProductID=".$_POST['pro_id'];
$sqlrecent_view = "INSERT INTO recent_view_product(ProductID, ViewOn,ViewIp) VALUES ('".$_POST['pro_id']."','".$viewon."','".$viewip."')";

$resrecent_view = mysqli_query($dbLink,$sqlrecent_view);

//DELETE FROM snaps WHERE created_at<=DATE_SUB(NOW(), INTERVAL 1 DAY)
//$sqlrecent_view_select ="DELETE FROM recent_view_product WHERE viewon < (CURDATE() - INTERVAL 1 min)";
//$sqlrecent_view_select = "select * form recent_view_product where viewip=".$viewip;
//$resrecent_view_select = mysqli_query($dbLink,$sqlrecent_view_select);

//$data_view_select = $resrecent_view_select->fetch_assoc();





if($resrecent_view){
 echo $aa = "done";
}else{
	echo $aa = "not done";
}
 ?>
