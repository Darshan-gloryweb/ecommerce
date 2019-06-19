<?php
require_once('db.php');
require_once('include/start_session.php');
$baddid=$_POST['billing'];
$saddid=$_POST['shipping'];
$cardid=$_POST['card'];
$ordernote=$_POST['ordernote'];
$sel_address = "SELECT * FROM customeraddress WHERE CustomerAddressID=".$baddid;
$res_address = mysqli_query($dbLink,$sel_address) or die('Could Not Select Address');
$res_data = $res_address->fetch_assoc();
$badd_fname = $res_data['FirstName'];
$badd_lname = $res_data['LastName'];
$badd_cname = $res_data['CompanyName'];
$badd_email= $res_data['Email'];
$badd_address1= $res_data['AddressLine1'];
$badd_address2 = $res_data['AddressLine2'];
$badd_city = $res_data['City'];
$badd_state = $res_data['StateID'];
$badd_zipcode = $res_data['Zipcode'];
$badd_country = $res_data['CountryID'];
$badd_phone = $res_data['Phone'];
$sel_address = "SELECT * FROM customeraddress WHERE CustomerAddressID=".$saddid;
$res_address = mysqli_query($dbLink,$sel_address) or die('Could Not Select Address');
$res_data = $res_address->fetch_assoc();
$sadd_fname = $res_data['FirstName'];
$sadd_lname = $res_data['LastName'];
$sadd_cname = $res_data['CompanyName'];
$sadd_email= $res_data['Email'];
$sadd_address1= $res_data['AddressLine1'];
$sadd_address2 = $res_data['AddressLine2'];
$sadd_city = $res_data['City'];
$sadd_state = $res_data['StateID'];
$sadd_zipcode = $res_data['Zipcode'];
$sadd_country = $res_data['CountryID'];
$sadd_phone = $res_data['Phone'];
$credit_detail = "select * from customercreditcard where CustomerCreditCardID=".$cardid;
$credit_res = mysqli_query($dbLink,$credit_detail) or die ('Could Not Select');
$credit_data = $credit_res->fetch_assoc();
$cardname=$credit_data['CreditCardName'];
$cardnumber=$credit_data['CreditCardNumber'];
$expmonth=$credit_data['CreditCardExpMonth'];
$expyear=$credit_data['CreditCardExpYear'];
$cvvnumber=$credit_data['CreditCardVerificationCode'];
$cardtype=$credit_data['CreditCardType'];
$payment_method="select * from creditcardpayment";
$payres=mysqli_query($dbLink,$payment_method) or die('Could not payment');
$paydata=$payres->fetch_assoc();
$business=$paydata['businessid'];
$password=$paydata['password'];
$signature=$paydata['signature'];
$mode=$paydata['mode'];
//Mail Data
$CustomerDetails = $CustomerDetails . "<div style='font-size: 16px;line-height: 34px;margin-bottom: 8px;color: #414146;width:50%;display:inline-block;'>";
		$CustomerDetails = $CustomerDetails."<h3>Billing Address</h3>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_fname.' '.$badd_lname."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_cname."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_email."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_address1."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_address2."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_city."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_zipcode."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_state."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_country."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$badd_phone."</p>";	
		$CustomerDetails = $CustomerDetails . "</div>";
		$CustomerDetails = $CustomerDetails . "<div style='font-size: 16px;line-height: 34px;margin-bottom: 8px;color: #414146;width:50%;display:inline-block;'>";
		$CustomerDetails = $CustomerDetails."<h3>Shipping Address</h3>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_fname.' '.$sadd_lname."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_cname."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_email."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_address1."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_address2."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_city."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_zipcode."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_state."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_country."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".$sadd_phone."</p>";	
		$CustomerDetails = $CustomerDetails . "</div>";
//Mail Data
$date = date('Y-m-d H:i:s');
$subtotal = $_POST['subtotal'];
if(isset($_POST['total2']))
{
	$total = $_POST['total2'];
}
else if(isset($_POST['total1']))
{
	$total = $_POST['total1'];
}
else
{
	$total = $_POST['total'];
}
?>
<!-- Paypal Integration -->
<?php
/** DoDirectPayment NVP example; last modified 08MAY23.
 *
 *  Process a credit card payment. 
*/
$environment = $mode;	// or 'beta-sandbox' or 'live'
/**
 * Send HTTP POST Request
 *
 * @param	string	The API method name
 * @param	string	The POST Message fields in &name=value pair format
 * @return	array	Parsed HTTP Response body
 */
function PPHttpPost($methodName_, $nvpStr_) {
	global $environment;
	// Set up your API credentials, PayPal end point, and API version.
	$API_UserName = urlencode('$business'); //ssample786-facilitator_api1.gmail.com
	$API_Password = urlencode('$password');//1390827598
	$API_Signature = urlencode('$signature');//AsAjodq-NintJaGeBInED55y06TuA21h.6m4U0g08qo3xRzIf2wfUBPJ
	$API_Endpoint = "https://api-3t.paypal.com/nvp";
	if("sandbox" === $environment || "beta-sandbox" === $environment) {
		$API_Endpoint = "https://api-3t.$environment.paypal.com/nvp";
	}
	$version = urlencode('51.0');
	// Set the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	// Turn off the server and peer verification (TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	// Set the API operation, version, and API signature in the request.
	$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";
	// Set the request as a POST FIELD for curl.
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
	// Get response from the server.
	$httpResponse = curl_exec($ch);
	if(!$httpResponse) {
		exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
	}
	// Extract the response details.
	$httpResponseAr = explode("&", $httpResponse);
	$httpParsedResponseAr = array();
	foreach ($httpResponseAr as $i => $value) {
		$tmpAr = explode("=", $value);
		if(sizeof($tmpAr) > 1) {
			$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
		}
	}
	if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {
		exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
	}
	return $httpParsedResponseAr;
}
// Set request-specific fields.
$paymentType = urlencode('Sale');				// or 'Sale'  'Authorization'
$firstName = urlencode($_SESSION['FirstName']);
$lastName = urlencode($_SESSION['LastName']);
$creditCardType = urlencode($cardtype);
$creditCardNumber = urlencode($cardnumber);
$expDateMonth = '05';
// Month must be padded with leading zero
$padDateMonth = urlencode(str_pad($expmonth, 2, '0', STR_PAD_LEFT));
$expDateYear = urlencode($expyear);
$cvv2Number = urlencode($cvvnumber);
$address1 = urlencode($badd_address1);
$address2 = urlencode($badd_address2);
$city = urlencode($badd_city);
$state = urlencode('CA');
$zip = urlencode($badd_zipcode);
$country = urlencode('US');				// US or other valid country code
$amount = urlencode($total);
$currencyID = urlencode('GBP');							// or other currency ('GBP', 'EUR', 'JPY', 'CAD', 'AUD')
// Add request-specific fields to the request string.
$nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber".
			"&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
			"&STREET=$address1&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";
// Execute the API operation; see the PPHttpPost function above.
$httpParsedResponseAr = PPHttpPost('DoDirectPayment', $nvpStr);
//print_r($httpParsedResponseAr);
if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
	//exit('Direct Payment Completed Successfully: '.json_encode($httpParsedResponseAr, true));
	
	$order_sql = "insert into custorder (CustomerID, OrderDate, FirstName, LastName, Email, BillingFirstName, BillingLastName, BillingCompanyName, BillingEmail, BillingAddressLine1, BillingAddressLine2, BillingCity, BillingZipCode, BillingStateID, BillingCountryID, BillingPhone, ShippingFirstName, ShippingLastName, ShippingCompanyName, ShippingEmail, ShippingAddressLine1, ShippingAddressLine2, ShippingCity, ShippingZipcode, ShippingStateID, ShippingCountryID, ShippingPhone, CreditCardName, CreditCardType, CreditCardNumber, CreditCardVerificationCode, CreditCardExpMonth, CreditCardExpYear, Status, OrderNotes, CreatedOn, UpdatedOn) values  ($_SESSION[CustomerID],'$date','$_SESSION[FirstName]','$_SESSION[LastName]','$_SESSION[Email]','$badd_fname','$badd_lname','$badd_cname','$badd_email','$badd_address1','$badd_address2','$badd_city',$badd_zipcode,$badd_state,$badd_country,'$badd_phone','$sadd_fname','$sadd_lname','$sadd_cname','$sadd_email','$sadd_address1','$sadd_address2','$sadd_city',$sadd_zipcode,$sadd_state,$sadd_country,'$sadd_phone','$cardname','$cardtype','$cardnumber','$cvvnumber','$expmonth','$expyear',1,'$ordernote','$date','$date')";
mysqli_query($dbLink,$order_sql) or die ('Could Not Place Order');
$ordernumber = mysql_insert_id();
$cart_order_sql = "Insert Into ordercart (OrderNumber,OrderTotal, OrderSubTotal, CreatedOn, UpdatedOn) values ($ordernumber,$total,$subtotal,'$date','$date') ";
mysqli_query($dbLink,$cart_order_sql) or die ('Could Not Create Order Cart');
$ordercartid=mysql_insert_id();
$cart_sql = "SELECT product.*, shoppingcartitems.Quantity,shoppingcart.*, shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";
					
					$cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');
					if(mysqli_num_rows($cart_res)>0)
					{
$prod_details="<table style='width:100%;'><tr><td><strong>Product</strong></td><td><strong>Name</strong></td><td><strong>Price</strong></td><td><strong>Quantity</strong></td><td><strong>Row Total</strong></td>";
						 while($cart_data = $cart_res->fetch_assoc())
						{
$price = $cart_data['Price'];
//
$range_sql = "Select * from quantity where ProductID=".$cart_data['ProductID'];
			
			$range_res = mysqli_query($dbLink,$range_sql) or die ('Could Not Select Range Data');
			
			if(mysqli_num_rows($range_res)>0)
			{
				while($range_data = $range_res->fetch_assoc())
				{
					if($cart_data['Quantity']>= $range_data['minqty'] && $cart_data['Quantity']<= $range_data['maxqty'])
					{
						
						$price = $range_data['price'];
					}
				}
			}
//
							$order_cart_item_sql = "INSERT INTO ordercartitems (OrderCartId, ProductID, Price, Quantity) values ($ordercartid,$cart_data[ProductID],$price,$cart_data[Quantity])";
$prod_details = $prod_details."<tr><td><img style='width:50px; height:50px;' src='".$frontpath."/ProductImage/".$cart_data['ImageName']."?".time()."'></td><td>".$cart_data['ProductName']."</td><td>".$price."</td><td>".$cart_data['Quantity']."</td><td>".$price*$cart_data['Quantity']."</td></tr>";	
							
							mysqli_query($dbLink,$order_cart_item_sql) or die ('Could Not Insert In Order Cart Items');
							$code = $cart_data['GiftCardCode'];
							$amt = $cart_data['GiftCardAmt'];
							$cmt = $cart_data['GiftCardComments'];
							
							$pcode = $cart_data['CouponCode'];
							$pdisc = $cart_data['CouponDiscount'];
							
						}
$prod_details = $prod_details."<tr><td></td><td></td><td></td><td>Sub Total</td><td>".$total."</td></tr>";
						$prod_details = $prod_details."<tr><td></td><td></td><td></td><td>Total</td><td>".$total."</td></tr>";
						if($code!='0')
						{
							$updsql = "Update ordercart set GiftCardCode='".$code."',GiftCardDiscount='".$amt."',GiftCardComments='".$cmt."' where OrderCartID=".$ordercartid;
							mysqli_query($dbLink,$updsql) or die ('Could Not Update Gift Certificate Details');
							
							$prod_details = $prod_details."<tr><td></td><td></td><td></td><td>Gift Cart Amount</td><td>".$amt."</td></tr>";
						$prod_details = $prod_details."<tr><td></td><td></td><td></td><td>After gift card apply Total :</td><td>".$total=$total-$amt."</td></tr>";
						}
						if($pdisc!="0")
						{
							$updsql = "Update ordercart set UserDiscountCode='".$pcode."',UserDiscount=".$pdisc." where OrderCartID=".$ordercartid;
							mysqli_query($dbLink,$updsql) or die ('Could Not Update Gift Certificate Details');
							
							$prod_details = $prod_details."<tr><td></td><td></td><td></td><td>Coupon Code Amount</td><td>".$camt=(($total*$pdisc)/100)." ( ".$pdisc."% )</td></tr>";
						$prod_details = $prod_details."<tr><td></td><td></td><td></td><td>After Coupon Code apply Total :</td><td>".$total-$camt."</td></tr>";
							
						}
						$prod_details = $prod_details."</table>";
					}
		//Email
		//Send Mail Admin			
		$sql1 = "select emailtemplate.* from emailtemplate inner join template on emailtemplate.TemplateID = template.TemplateID and template.TemplateName = 'AdminOrder' and emailtemplate.Status=1";
		$res1 = mysqli_query($dbLink,$sql1) or die ('Could Not Select');
		$data1 = $res1->fetch_assoc();				
		if(mysqli_num_rows($res1)>0)
		{
		
		$headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "From:".$data1['FromID']."\r\n";
        $headers .= "Bcc:".$data1['BCC']."\r\n";
        $headers .= "Cc:".$data1['CC']."\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";
		$subject = $data1['Subject'];
		$str = $data1['MailBody'];
		
		$str = str_replace('#websiteurl#',$frontpath,$str);
		$str = str_replace('#websitename#',$mywebsitename,$str);
		$str = str_replace('#customerDetails#',$CustomerDetails,$str);
		$str = str_replace('#productDetails#',$prod_details,$str);
		
        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content .$str; 
        $content = $content . "</body></html>";
		mail($adminemail,$subject,$content,$headers);
		}
	//Send Mail Admin
	
	//Send Mail Admin Client
	$sql1 = "select emailtemplate.* from emailtemplate inner join template on emailtemplate.TemplateID = template.TemplateID and template.TemplateName = 'ClientOrder' and emailtemplate.Status=1";
		$res1 = mysqli_query($dbLink,$sql1) or die ('Could Not Select');
		$data1 = $res1->fetch_assoc();				
		if(mysqli_num_rows($res1)>0)
		{
		
		$headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "From:".$data1['FromID']."\r\n";
        $headers .= "Bcc:".$data1['BCC']."\r\n";
        $headers .= "Cc:".$data1['CC']."\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";
		$subject = $data1['Subject'];
		$str = $data1['MailBody'];
		
		$str = str_replace('#websiteurl#',$frontpath,$str);
		$str = str_replace('#websitename#',$mywebsitename,$str);
		$str = str_replace('#customerDetails#',$CustomerDetails,$str);
		$str = str_replace('#productDetails#',$prod_details,$str);
		
        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content .$str; 
        $content = $content . "</body></html>";
		mail($_SESSION['CEmail'],$subject,$content,$headers);
		}
	//Send Mail Client
		
		//Email
	
	echo '<script>window.location="'.$frontpath.'/thankyouorder.php?msg=Your Order Has been Successfully Placed"</script>';
	
	/*header('Location:thankyouorder.php?msg=Your Order Has been Successfully Placed');*/
	
} else  {
	echo '<script>window.location="'.$frontpath.'/thankyouorder.php?data=missing&msg=Your Order Has Not Placed Due to Invalid Data"</script>';
	/*header('Location:thankyouorder.php?data=missing&msg=Your Order Has Not Placed Due to Invalid Data');*/
}
?>
