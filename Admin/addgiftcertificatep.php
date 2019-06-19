<?php 
include "db.php";
$id =mysqli_real_escape_string($dbLink,$_GET['editid']);
$action =mysqli_real_escape_string($dbLink,$_GET['action']);

$code =mysqli_real_escape_string($dbLink,$_POST['code']);
$amount =mysqli_real_escape_string($dbLink,$_POST['amount']);
$mamount =mysqli_real_escape_string($dbLink,$_POST['mamount']);
$ramount =mysqli_real_escape_string($dbLink,$_POST['ramount']);
$sdate =mysqli_real_escape_string($dbLink,$_POST['sdate']);
$edate =mysqli_real_escape_string($dbLink,$_POST['edate']); 
$status =mysqli_real_escape_string($dbLink,$_POST['Status']);	
$updid = $_SESSION['what_adminid'];
$sysdate = date("Y-m-d");	
if(isset($_REQUEST['id']))
{		
	$sql2="delete from giftcertificate where GiftcertificateCode=".$_REQUEST['id']; 
	mysqli_query($dbLink,$sql2) or die('could not Delete product..');	
	echo 'true';
}
else if($action=='E')
{
	 $sql = "update giftcertificate set Code='$code',Amount='$amount',Mamount='0.00',RemainingAmount='0.00',StartDate='$sdate',EndDate='$edate',Status=$status,UpdatedBy=$updid,UpdatedOn='$sysdate' where GiftcertificateCode=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 header("location:addgiftcertificate.php?&id=$id&msg=Record Updated Successfully&tab=1");
	 exit();
}
else if($action=='A')
{

     echo $sql = "insert into giftcertificate(Code,Mamount,Amount,RemainingAmount,StartDate,EndDate,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values('$code','0.00','$amount','0.00','$sdate','$edate',$status,'$sysdate',$updid,'$sysdate',$updid)";
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 $id = mysqli_insert_id();
	 header("location:addgiftcertificate.php?id=$id&msg=Record Added Successfully&tab=1");
	 exit();
}
?>
