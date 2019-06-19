<?php include "db.php";
$id = $_GET['editid'];
$action = $_GET['action'];
$cus_id =$_SESSION['Email'];

if($action=='E')

{

	
	
	$sql = "update bussiness_detail set bus_companyName='".$_POST['bus_companyName']."',bus_email='".$_POST['bus_email']."',bus_phone='".$_POST['bus_phone']."',bus_industry='".$_POST['bus_industry']."',bus_businessType='".$_POST['bus_businessType']."',bus_gstin='".$_POST['bus_gstin']."',bus_addressLine='".$_POST['bus_addressLine']."',bus_postCode='".$_POST['bus_postCode']."',bus_city='".$_POST['bus_city']."',bus_idState='".$_POST['bus_idState']."',bus_pan='".$_POST['bus_pan']."',bus_isGstInvoice='".$_POST['bus_isGstInvoice']."' where cus_id='".$id."'";
	
	$res = mysqli_query($dbLink,$sql) or die('could not update..');
	if($res){
		$msg ="yes";
	}
	


}

else if($action=='A')

{

	

	$sql = "insert into bussiness_detail(cus_id, bus_companyName, bus_email, bus_phone, bus_industry, bus_businessType, bus_gstin, bus_addressLine, bus_postCode, bus_city, bus_idState, bus_pan, bus_isGstInvoice) values('".$_SESSION['Email']."', '".$_POST['bus_companyName']."','".$_POST['bus_email']."','".$_POST['bus_phone']."','".$_POST['bus_industry']."','".$_POST['bus_businessType']."','".$_POST['bus_gstin']."','".$_POST['bus_addressLine']."','".$_POST['bus_postCode']."','".$_POST['bus_city']."','".$_POST['bus_idState']."','".$_POST['bus_pan']."','".$_POST['bus_isGstInvoice']."')";
	//exit;
	$res = mysqli_query($dbLink,$sql) or die('could not insert..');
	if($res){
		
			$msg ="yes";
		 }


}

?>

