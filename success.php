<?php
require_once('db.php');
require_once('include/start_session.php');

//$item_no = $_GET['item_name'];
//$item_transaction = $_GET['tx'];
//$item_price = $_GET['amount'];
//$item_currency = $_GET['cc'];
//
////Getting product details
////$sql=mysqli_query($dbLink,"select ProductName,Price,ImageName from product where ProductID='$item_no'");
////echo $sql;
//// $row=mysql_fetch_array($sql);
////$price=$row['Price'];
//$date = date('Y-m-d H:i:s');

?>
<!-- Paypal Integration -->
<?php

$order_sql = "insert into custorder (CustomerID, OrderDate, FirstName, LastName, Email,Status, CreatedOn, UpdatedOn) values  ($_SESSION[CustomerID],'$date','$_SESSION[FirstName]','$_SESSION[LastName]','$_SESSION[Email]',1,'$date','$date')";
//echo $order_sql;
mysqli_query($dbLink,$order_sql) or die ('Could Not Place Order');
$ordernumber = mysql_insert_id();
$cart_order_sql = "Insert Into ordercart (OrderNumber, CreatedOn, UpdatedOn) values ($ordernumber,'$date','$date') ";
//echo $cart_order_sql;
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
						
						
					$prod_details = $prod_details."</table>";
				}
	
} 









////Rechecking the product details
//if($item_price==$price)
//{
//
//$result=mysqli_query($dbLink, "insert into custorder (CustomerID, OrderDate, FirstName, LastName, Email,Status, CreatedOn, UpdatedOn) values  ($_SESSION[CustomerID],'$date','$_SESSION[FirstName]','$_SESSION[LastName]','$_SESSION[Email]',1,'$date','$date')");
//echo $result;
//
//
//
//if($result){
//  echo "<h1>Welcome,test</h1>";
//    echo '<h1>Payment Successful</h1>';
//    echo "<b>Example Query</b>: Insert Into ordercart (OrderNumber,OrderTotal, OrderSubTotal, CreatedOn, UpdatedOn)values ('$item_no',$total,$subtotal,'$date','$date')";
//}else{
//    echo "Payment Error";
//}
//}
//else
//{
//echo "Payment Failed"	;
//}
 //$sql = "select * from paypal";
//$res = mysqli_query($dbLink,$sql) or die('Could Not Select Paypal');
//$paydata = mysql_fetch_assoc($res);
//$cancel_url = $paydata['cancel_url'];
//$return_url = $paydata['return_url'];
//$paypal_email = $paydata['business'];
//// Check if paypal request or response
//if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
//
//	// Firstly Append paypal account to querystring
//	$querystring .= "?business=".urlencode($paypal_email)."&";	
//	
//	// Append amount& currency (£) to quersytring so it cannot be edited in html
//	
//	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
//	$querystring .= "item_name=".urlencode($item_name)."&";
//	$querystring .= "amount=".urlencode($item_amount)."&";
//	
//	//loop for posted values and append to querystring
//	foreach($_POST as $key => $value){
//		$value = urlencode(stripslashes($value));
//		$querystring .= "$key=$value&";
//	}
//	
//	// Append paypal return addresses
//	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
//	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
//	$querystring .= "notify_url=".urlencode($notify_url);
//	
//	// Append querystring with custom field
//	//$querystring .= "&custom=".USERID;
//	
//	// Redirect to paypal IPN
//	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
//	exit();
//
//}else{
//	
//	// Response from Paypal
//
//	// read the post from PayPal system and add 'cmd'
//	$req = 'cmd=_notify-validate';
//	foreach ($_POST as $key => $value) {
//		$value = urlencode(stripslashes($value));
//		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
//		$req .= "&$key=$value";
//	}
//	
//	// assign posted variables to local variables
//	$data['item_name']			= $_POST['item_name'];
//	$data['item_number'] 		= $_POST['item_number'];
//	$data['payment_status'] 	= $_POST['payment_status'];
//	$data['payment_amount'] 	= $_POST['mc_gross'];
//	$data['payment_currency']	= $_POST['mc_currency'];
//	$data['txn_id']				= $_POST['txn_id'];
//	$data['receiver_email'] 	= $_POST['receiver_email'];
//	$data['payer_email'] 		= $_POST['payer_email'];
//	$data['custom'] 			= $_POST['custom'];
//		
//	// post back to PayPal system to validate
//	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
//	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
//	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//	
//	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);	
//	
//	if (!$fp) {
//		// HTTP ERROR
//	} else {	
//
//		fputs ($fp, $header . $req);
//		while (!feof($fp)) {
//			$res = fgets ($fp, 1024);
//			if (strcmp($res, "VERIFIED") == 0) {
//			
//				// Used for debugging
//				//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Verified Response<br />data = <pre>".print_r($post, true)."</pre>");
//						
//				// Validate payment (Check unique txnid & correct price)
//				$valid_txnid = check_txnid($data['txn_id']);
//				$valid_price = check_price($data['payment_amount'], $data['item_number']);
//				// PAYMENT VALIDATED & VERIFIED!
//				if($valid_txnid && $valid_price){				
//					$orderid = updatePayments($data);		
//					if($orderid){					
//						// Payment has been made & successfully inserted into the Database								
//					}else{								
//						// Error inserting into DB
//						// E-mail admin or alert user
//					}
//				}else{					
//					// Payment made but data has been changed
//					// E-mail admin or alert user
//				}						
//			
//			}else if (strcmp ($res, "INVALID") == 0) {
//			
//				// PAYMENT INVALID & INVESTIGATE MANUALY! 
//				// E-mail admin or alert user
//				
//				// Used for debugging
//				//@mail("you@youremail.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
//			}		
//		}		
//	fclose ($fp);
//	}	
//}
?>