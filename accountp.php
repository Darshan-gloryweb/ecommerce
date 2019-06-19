<?php
include('db.php');
require_once('include/start_session.php');
$date = date('Y-m-d H:i:s');
if(isset($_POST['personal']))
{	
	$firstname =  mysqli_real_escape_string($dbLink,trim($_POST['fname']));
	$lastname =  mysqli_real_escape_string($dbLink,trim($_POST['lname']));
	$phone =  mysqli_real_escape_string($dbLink,trim($_POST['phone']));
	$sql = "UPDATE customer SET FirstName = '$firstname', LastName = '$lastname', PhoneNumber = '$phone', UpdatedOn='$date' WHERE CustomerID=".$_SESSION['CustomerID'];
		mysqli_query($dbLink,$sql) or die ('Could Not Save Personal Data');
		header('Location:myaccount.php',true);
		exit();
}
if(isset($_POST['changepassword']))
{	
	$oldpassword =  mysqli_real_escape_string($dbLink,trim($_POST['oldpassword']));
	$newpassword =  mysqli_real_escape_string($dbLink,trim($_POST['newpassword']));
	$confpassword =  mysqli_real_escape_string($dbLink,trim($_POST['confpassword']));
	if(!empty($oldpassword) && !empty($newpassword) && !empty($confpassword) && $newpassword == $confpassword)
	{
		$old_sql = "SELECT * FROM customer WHERE Email='".$_SESSION['Email']."' AND Password='".$oldpassword."'";
		$old_res = mysqli_query($dbLink,$old_sql) or ('Could Not Identify');
		if(mysqli_num_rows($old_res)>0)
		{
		
	$sql = "UPDATE customer SET Password = '$confpassword', UpdatedOn='$date' WHERE CustomerID=".$_SESSION['CustomerID']." AND Email='".$_SESSION['Email']."'";
		mysqli_query($dbLink,$sql) or die ('Could Not Save Password');
		header('Location:myaccount.php?link=changepassword&msg=Your has Password Changed Successfully',true);
		exit();
		}
		else
		{
			header('Location:myaccount.php?link=changepassword&msg=Invalid Old Password',true);
			exit();
		}
	}
	else
	{
		header('Location:myaccount.php?link=changepassword&msg=Invalid Information',true);
		exit();
	}
}
if(isset($_POST['address']))
{	
	$customerid = $_SESSION['CustomerID'];
	$storeid = $_SESSION['Store'];
	
	$aid = mysqli_real_escape_string($dbLink,trim($_POST['addressid']));
	 
	$fname =  mysqli_real_escape_string($dbLink,trim($_POST['fname']));
	$lname =  mysqli_real_escape_string($dbLink,trim($_POST['lname']));
	$cname =  mysqli_real_escape_string($dbLink,trim($_POST['cname']));
	$email =  mysqli_real_escape_string($dbLink,trim($_POST['email']));
	$address1 =  mysqli_real_escape_string($dbLink,trim($_POST['address1']));
	$address2 =  mysqli_real_escape_string($dbLink,trim($_POST['address2']));
	$city =  mysqli_real_escape_string($dbLink,trim($_POST['city']));
	$state =  mysqli_real_escape_string($dbLink,trim($_POST['state']));
	$zipcode =  mysqli_real_escape_string($dbLink,trim($_POST['zipcode']));
	$country =  mysqli_real_escape_string($dbLink,trim($_POST['country']));
	$phone =  mysqli_real_escape_string($dbLink,trim($_POST['phone']));
	
	$addresstype =  mysqli_real_escape_string($dbLink,trim($_POST['addresstype']));
	if($addresstype=="")
	{
		$addresstype=1;
	}
	
	$status = 1;
	$date = date('Y-m-d H:i:s'); 
	
	$action = mysqli_real_escape_string($dbLink,trim($_POST['action']));
	
	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($address1) && !empty($address2) && !empty($city) && !empty($state) && !empty($zipcode) && !empty($country))
	{
		if($action == "insert")
		{
			$sql = "INSERT INTO customeraddress (CustomerID, AddressType, FirstName, LastName, CompanyName, Email, AddressLine1, AddressLine2, City, StateID, Zipcode, CountryID, Phone, Status, CreatedOn, UpdatedOn) VALUES ($customerid, $addresstype, '$fname', '$lname', '$cname', '$email', '$address1', '$address2', '$city', $state, $zipcode, $country, '$phone', $status, '$date', '$date')";
			mysqli_query($dbLink,$sql) or die ('Could Not Save Address');
			
			header('Location:myaccount.php?link=addresses&msg=New Address has been Saved',true);
			exit();
		}
		else if($action == 'update')
		{
			$sql = "UPDATE customeraddress SET CustomerID=$customerid, FirstName='$fname', LastName='$lname', CompanyName='$cname', Email='$email', AddressLine1='$address1', AddressLine2='$address2', City='$city', StateID=$state, Zipcode=$zipcode, CountryID=$country, Phone='$phone', Status=$status, UpdatedOn='$date' WHERE CustomerAddressID=".$aid;
			mysqli_query($dbLink,$sql) or die ('Could Not Save Addresss');
			header('Location:myaccount.php?link=addresses&msg=Address has been Changed',true);
			exit();
		}
	}
}
if(isset($_REQUEST['add']) && $_REQUEST['add']=='bill')
{
	$changedefault = "Update customer set BillingAddressID=".$_REQUEST['id']." where CustomerID=".$_SESSION['CustomerID'];
	mysqli_query($dbLink,$changedefault) or die ('Could Not Change Default Address');
	header('Location:myaccount.php?link=addresses&msg=Default Address has been Changed',true);
	exit();
}
if(isset($_REQUEST['add']) && $_REQUEST['add']=='ship')
{
	$changedefault = "Update customer set ShippingAddressID=".$_REQUEST['id']." where CustomerID=".$_SESSION['CustomerID'];
	mysqli_query($dbLink,$changedefault) or die ('Could Not Change Default Address');
	header('Location:myaccount.php?link=addresses&msg=Default Address Changed',true);
	exit();
}
if(isset($_REQUEST['addtype']) && $_REQUEST['addtype']=='del')
{
	$changedefault = "Delete from customeraddress where CustomerAddressID=".$_REQUEST['id'];
	mysqli_query($dbLink,$changedefault) or die ('Could Not Delere Address');
	header('Location:myaccount.php?link=addresses&msg=Address Deleted',true);
	exit();
}
?>