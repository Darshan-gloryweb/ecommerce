<?php 
include "db.php";

	
	
	if(isset($_GET['id'])){ $id = $_GET['id']; }
	//$action = AssureSec($_GET['action']);
	$aid = AssureSec($_GET['editid']);

	
	$fname=AssureSec($_POST['FirstName']);
	$lname=AssureSec($_POST['LastName']);
	$CompanyName=AssureSec($_POST['CompanyName']);
	$AddressLine1=AssureSec($_POST['AddressLine1']);
	$AddressLine2=AssureSec($_POST['AddressLine2']);
	$email=AssureSec($_POST['Email']);
	$City=AssureSec($_POST['City']);
	$state=AssureSec($_POST['state']);
	$zipcode=AssureSec($_POST['Zipcode']);
	$country=AssureSec($_POST['country']);
	$Phone=AssureSec($_POST['Phone']);
	
	$sql="update customeraddress set FirstName='$fname',LastName='$lname',CompanyName='$CompanyName',AddressLine1='$AddressLine1',AddressLine2='$AddressLine2',Email='$email',City='$City',StateID=$state,Zipcode=$zipcode,CountryID='$country',Phone='$Phone' where CustomerAddressID=".$aid." and CustomerID=".$id;
	//echo $sql;
	mysqli_query($dbLink,$sql) or die("could not update address");
	header("location:addcustomer.php?id=".$id."&msg=Customer Address  Updated Successfully");
		exit();