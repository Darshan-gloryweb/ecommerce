<?php 

include "db.php";

$id =mysqli_real_escape_string($dbLink,$_GET['editid']);

$action =mysqli_real_escape_string($dbLink,$_GET['action']);



$code =mysqli_real_escape_string($dbLink,$_POST['code']);

$percentage =mysqli_real_escape_string($dbLink,$_POST['percentage']);

$sdate =mysqli_real_escape_string($dbLink,$_POST['sdate']);

$edate =mysqli_real_escape_string($dbLink,$_POST['edate']); 

$uses =mysqli_real_escape_string($dbLink,$_POST['uses']);

$status =mysqli_real_escape_string($dbLink,$_POST['Status']);	

$dis_for_All_order_amount=$_POST['dis_for_All_order_amount'];	

$newcustomer = $_POST['newcustomer'];

if($newcustomer=='')

{

	$newcustomer=0;

}
$dis_for_All = $_POST['dis_for_All'];

if($dis_for_All=='')

{

	$dis_for_All=0;

}
$updid = $_SESSION['what_adminid'];

$sysdate = date("Y-m-d");	

if(isset($_REQUEST['id']))

{		

	$sql2="delete from promotioncode where PromotionID=".$_REQUEST['id']; 

	mysqli_query($dbLink,$sql2) or die('could not Delete product..');	

	echo 'true';

}

else if($action=='E')

{

	  echo $sql = "update promotioncode set Code='$code',Percentage=$percentage,StartDate='$sdate',EndDate='$edate',Uses=$uses,CustomerType=$newcustomer,dis_for_All=$dis_for_All,dis_for_All_order_amount = '$dis_for_All_order_amount',Status=$status,UpdatedBy=$updid,UpdatedOn='$sysdate' where PromotionID=".$id;
	//exit;
	 mysqli_query($dbLink,$sql) or die('could not update..');

	 header("location:addpromotion.php?&id=$id&msg=Record Updated Successfully&tab=1");

	 exit();

}

else if($action=='A')

{



      $sql = "insert into promotioncode(Code,Percentage,StartDate,EndDate,Uses,CustomerType,dis_for_All,dis_for_All_order_amount,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values('$code','$percentage','$sdate','$edate','$uses','$newcustomer','$dis_for_All','$dis_for_All_order_amount','$status','$sysdate',$updid,'$sysdate','$updid')";
	
	 mysqli_query($dbLink,$sql) or die('could not insert..');

	 $id = mysqli_insert_id();

	 header("location:addpromotion.php?id=$id&msg=Record Added Successfully&tab=1");

	 exit();

}

?>

