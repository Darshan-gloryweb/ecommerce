<?php 
include "db.php";

$orderstatus = $_POST['ordrestatus'];

$sql = "update custorder set Status=$orderstatus where OrderNumber=".$_POST['order'];
mysqli_query($dbLink,$sql) or die ('Could Not Update Order');
header('Location:vieworder.php?id='.$_POST['order'],true);

?>