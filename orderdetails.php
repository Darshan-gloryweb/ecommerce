<?php

require_once('db.php');

include('include/start_session.php');

$date = date('Y-m-d H:i:s');

$fname =  mysqli_real_escape_string($dbLink,trim($_POST['bfname']));
$email =  mysqli_real_escape_string($dbLink,trim($_POST['bemail']));
$phone =  mysqli_real_escape_string($dbLink,trim($_POST['bphone']));
$zipcode =  mysqli_real_escape_string($dbLink,trim($_POST['bzipcode']));
$address1 =  mysqli_real_escape_string($dbLink,trim($_POST['baddress1']));
$city =  mysqli_real_escape_string($dbLink,trim($_POST['bcity']));
$state =  mysqli_real_escape_string($dbLink,trim($_POST['bstate']));
$country =  mysqli_real_escape_string($dbLink,trim($_POST['bcountry']));
$landmarck=  mysqli_real_escape_string($dbLink,trim($_POST['landmarck']));
$gstin=  mysqli_real_escape_string($dbLink,trim($_POST['gstin']));
$getbbb=  mysqli_real_escape_string($dbLink,trim($_POST['bbb']));

$cstate = trim($_POST['cstate']);
if(isset($_POST['CustomerAddressID'])) {
	$sqlalladd = "select * from customeraddress where CustomerAddressID=".$_POST['CustomerAddressID'];
    $alladd_res = mysqli_query($dbLink,$sqlalladd) or die ('Could Not Select address');
	$alladd_data = $alladd_res->fetch_assoc();
	$FirstName = $alladd_data['FirstName'];
	$Email = $alladd_data['Email'];
	$Phone = $alladd_data['Phone'];
	$Zipcode = $alladd_data['Zipcode'];
	$AddressLine1 = $alladd_data['AddressLine1'];
	$City = $alladd_data['City'];
	$StateID = $alladd_data['StateID'];
	$CountryID = $alladd_data['CountryID'];
	$landmarck = $alladd_data['landmarck'];
	$gstin = $alladd_data['gstin'];
	//$getbbb = 2;


	 
}
if($cstate == 1){echo 'zalak';

	if($_POST['cusaddid'] == ""){

				 $sqlinsert = "INSERT INTO customeraddress (CustomerID, FirstName, Email, AddressLine1, City, StateID, Zipcode, CountryID, Phone, landmarck, gstin, Status, CreatedOn, UpdatedOn) VALUES (".$_SESSION['CustomerID'].", '$fname', '$email', '$address1', '$city', '$state', '$zipcode', '$country','$phone','$landmarck','$gstin', '$status', '$date', '$date')";
			
			$resinsert =  mysqli_query($dbLink,$sqlinsert) or die ('Could Not Save Address');
			if($resinsert){$msg = 'Data inserted';}else{$msg = 'not inserted';}
			
			}else{

				$sqlupdate = "update customeraddress set FirstName='$fname',Email='$email', AddressLine1='$address1', City ='$city', StateID = '$state', Zipcode='$zipcode', CountryID='$country', Phone='$phone', landmarck='$landmarck', gstin='$gstin' where CustomerAddressID=".$_POST['cusaddid'];
				
			$resupdate =   mysqli_query($dbLink,$sqlupdate) or die ('Could Not upadted aaaaaaaaa');
			if($resupdate){$msg = 'Data Updated';}else{$msg = 'not Updated';}

			}

		}
if($cstate == 3){



	$sqlinsert = "DELETE FROM `customeraddress` WHERE CustomerAddressID=".$_POST['CustomerAddressID'];
	//exit;
	$resinsert =  mysqli_query($dbLink,$sqlinsert) or die ('Could Not Save Address');
	if($resinsert){$msg = 'Data deleted';}else{$msg = 'not deleted';}
	
	

}
		

$data = array(
            "cusaddid" => $_POST['CustomerAddressID'],
            "FirstName"  => $FirstName,
            "Email"  => $Email,
			"Phone"  => $Phone,
			"Zipcode"=>$Zipcode,
			"AddressLine1"=>$AddressLine1,
			"City"=>$City,
			"StateID"=>$StateID,
			"CountryID"=>$CountryID,
			"landmarck"=>$landmarck,
			"gstin"=>$gstin,
			"bbb" => 1,
			"msg"=>$msg
			
        );
echo json_encode($data);			
							
exit;

$billingaddress = $_POST['billingaddress'];

$shippingaddress = $_POST['shippingaddress'];

	//if(isset($_POST['addressnew']))

	//{

	$addresstype=1;

	$fname =  mysqli_real_escape_string($dbLink,trim($_POST['bfname']));

	$lname =  mysqli_real_escape_string($dbLink,trim($_POST['blname']));

	$cname =  mysqli_real_escape_string($dbLink,trim($_POST['bcname']));

	$email =  mysqli_real_escape_string($dbLink,trim($_POST['bemail']));

	$address1 =  mysqli_real_escape_string($dbLink,trim($_POST['baddress1']));

	$address2 =  mysqli_real_escape_string($dbLink,trim($_POST['baddress2']));

	$city =  mysqli_real_escape_string($dbLink,trim($_POST['bcity']));

	$state =  mysqli_real_escape_string($dbLink,trim($_POST['bstate']));

	$zipcode =  mysqli_real_escape_string($dbLink,trim($_POST['bzipcode']));

	$country =  mysqli_real_escape_string($dbLink,trim($_POST['bcountry']));

	$phone =  mysqli_real_escape_string($dbLink,trim($_POST['bphone']));

	

	$status = 1;
	$ip = $_SERVER['REMOTE_ADDR'];
	$date =  date('d-m-Y H:i:s');
	$password1 = $_POST['cpass'];
	
	exit;
	if(isset($_POST['checkouttype']) && $_POST['checkouttype']=="register")
	{
		$query = "update customer set FirstName='$fname',LastName='$lname',Email='$email', Password='$password1',IsRegister=1 , LastIPAddress='$ip' , Status=1,UpdatedOn='$date' where CustomerID=".$_SESSION['CustomerID'];
		
		mysqli_query($dbLink,$query) or die ('Could Not Register');
		
		$_SESSION['CustomerID'] = $_SESSION['CustomerID'];
        $_SESSION['Email'] = $email;
		$_SESSION['FirstName'] = $fname;
		$_SESSION['LastName'] = $lname;
        setcookie('CustomerID',$_SESSION['CustomerID'], time() + 60);    // expires in 30 days
        setcookie('Email', $email, time() + 60);  // expires in 30 days 
		setcookie('FirstName', $fname, time() + 60);  // expires in 30 days
		setcookie('LastName', $lname, time() + 60);  // expires in 30 days
		
	}

	$sql = "INSERT INTO customeraddress (CustomerID, AddressType, FirstName, LastName, CompanyName, Email, AddressLine1, AddressLine2, City, StateID, Zipcode, CountryID, Phone, Status, CreatedOn, UpdatedOn) VALUES (".$_SESSION['CustomerID'].", '$addresstype', '$fname', '$lname', '$cname', '$email', '$address1', '$address2', '$city', '$state', '$zipcode', '$country','$phone', $status, '$date', '$date')";

	//echo $sql;
//	exit;

			mysqli_query($dbLink,$sql) or die ('Could Not Save Address');

 			$billingid=mysqli_insert_id($dbLink);
			
			

			$billingaddress=mysqli_insert_id($dbLink);

			

	

	

	$changer_default_address = "Update customer set BillingAddressID=$billingid where CustomerID=".$_SESSION['CustomerID'];

	mysqli_query($dbLink,$changer_default_address) or die ('Could Not Update Customer Address');

	

	//}

	

	

	header('Location:checkout.php');

?>