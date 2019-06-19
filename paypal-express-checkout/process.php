<?php
session_start();
include_once("../db.php");
require_once('../include/start_session.php');
$payment_method="select * from creditcardpayment";
$payres=mysqli_query($dbLink,$payment_method) or die('Could not payments');
$paydata=$payres->fetch_assoc();
$PayPalApiUsername=$paydata['businessid'];
$PayPalApiPassword=$paydata['password'];
$PayPalApiSignature=$paydata['signature'];

$payment_method="select * from paypal";
$payres=mysqli_query($dbLink,$payment_method) or die('Could not payment');
$paydata=$payres->fetch_assoc();
$PayPalReturnURL=$paydata['return_url'];
$PayPalCancelURL=$paydata['cancel_url'];
$PayPalMode = $paydata['mode']; // sandbox or live
$PayPalCurrencyCode = 'GBP'; //Paypal Currency Code
//Calculation
if(isset($_SESSION['CustomerID']) && isset($_SESSION['Email']) && $_SESSION['Email']!="")
{
	$cart_sql = "SELECT product.*, shoppingcartitems.Quantity,shoppingcart.*, shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";
	
	$cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');
	if(mysqli_num_rows($cart_res)>0)
	{
    	while($cart_data = $cart_res->fetch_assoc())
		{
			$range_sql = "Select * from quantity where ProductID=".$cart_data['ProductID'];
			$price = $cart_data['Price'];
			$range_res = mysqli_query($dbLink,$range_sql) or die ('Could Not Select Range Data');
			$total;
			if(mysqli_num_rows($range_res)>0)
			{
				while($range_data = $range_res->fetch_assoc())
				{
					if($cart_data['Quantity']>= $range_data['minqty'] && $cart_data['Quantity']<= $range_data['maxqty'])
					{
						$price = $range_data['price'];
					}
					else if($cart_data['Quantity'] >= $range_data['maxqty'])
					{
						$price = $range_data['price'];
					}
				}
			}
			$cart_item_total=$price*$cart_data['Quantity'];
            $total = $total+$cart_item_total;
	  		$subtotal = $total;
			$cdisc = $cart_data['CouponDiscount'];
			$cgift = $cart_data['GiftCardCode'];
			$cam = $cart_data['GiftCardAmt'];
	        $cc = $cart_data['CouponCode'];
		}
		if($cdisc != "0")
		{
            $camt=($total*$cdisc)/100;
            $total = ($total-$camt);
		}	
		if($cgift != "0")
		{
			$total = $total-$cam;
		}
	}
	else
	{
		echo "Your Shopping Cart Is Empty";
	}
}
	else
	{
		echo "Your Shopping Cart Is Empty";
	}		
//Calculation

include_once("paypal.class.php");
$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
	//Other important variables like tax, shipping cost
	//$TotalTaxAmount 	= 2.58;  //Sum of tax for all items in this order. 
//	$HandalingCost 		= 2.00;  //Handling cost for this order.
//	$InsuranceCost 		= 1.00;  //shipping insurance cost for this order.
//	$ShippinDiscount 	= -3.00; //Shipping discount for this order. Specify this as negative number.
//	$ShippinCost 		= 3.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.

	//we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
	//Please Note : People can manipulate hidden field amounts in form,
	//In practical world you must fetch actual price from database using item id. 
	//eg : $ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");
	$paypal_data ='';
	$ItemTotalPrice = 0;
	$i=0;
    foreach($_POST['item_name'] as $key=>$itmname)
    {		
        $paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($_POST['item_name'][$key]);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($_POST['item_code'][$key]);
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($_POST['item_prc'][$key]);		
		$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($_POST['item_qty'][$key]);
        
		// item price X quantity
        $subtotal = ($_POST['item_prc'][$key]*$_POST['item_qty'][$key]);
		
        //total price
        $ItemTotalPrice = $ItemTotalPrice + $subtotal;
		
		//create items for session
		$paypal_product['items'][] = array('itm_name'=>$_POST['item_name'][$key],
											'itm_price'=>$_POST['item_prc'][$key],
											'itm_code'=>$_POST['item_code'][$key], 
											'itm_qty'=>$_POST['item_qty'][$key]
											);
	$i++;
    }
	
	if($cdisc != "0")
	{
		
		$coupondiscount = ($ItemTotalPrice*$cdisc)/100;
		$ItemTotalPrice = $ItemTotalPrice - $coupondiscount;
		$paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$i.'= Coupon Discount';
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$i.'='.$cc;
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$i.'='.number_format(($coupondiscount*-1));		
		$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$i.'=1';
		
		$paypal_product['items'][] = array('itm_name'=>'Coupon Discount',
											'itm_price'=> number_format(($coupondiscount*-1)),
											'itm_code'=>$cc, 
											'itm_qty'=>1
											);
	}
	if($cgift != "0")
	{
		$i++;
		$ItemTotalPrice = $ItemTotalPrice - $cam;
		
		$paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$i.'= Gift Card Amount';
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$i.'='.$cgift;
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$i.'='.number_format(($cam*-1),2);		
		$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$i.'=1';
		
		$paypal_product['items'][] = array('itm_name'=>'Gift Card Amount',
											'itm_price'=> number_format(($cam*-1),2),
											'itm_code'=>$cgift, 
											'itm_qty'=>1
											);
	}
	
	//Grand total including all tax, insurance, shipping cost and discount
	$GrandTotal = ($ItemTotalPrice);
	$paypal_product['assets'] = array('grand_total'=>$GrandTotal);
	
	//create session array for later use
	$_SESSION["paypal_products"] = $paypal_product;
	
	//Parameters for SetExpressCheckout, which will be sent to PayPal
	$padata = 	'&METHOD=SetExpressCheckout'.
				'&RETURNURL='.urlencode($PayPalReturnURL ).
				'&CANCELURL='.urlencode($PayPalCancelURL).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				$paypal_data.				
				'&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				//'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
//				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
//				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
//				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
//				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
				'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
				'&LOGOIMG=http://localhost/Devnandan/images/resize-logo.png'. //site logo
				'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
				'&ALLOWNOTE=1';
		
		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
		$paypal= new MyPayPal();
		$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		
		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{
				//Redirect user to PayPal store with Token received.
			 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
				header('Location: '.$paypalurl);
		}
		else
		{
			//Show error message
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
		}

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
	//we will be using these two variables to execute the "DoExpressCheckoutPayment"
	//Note: we haven't received any payment yet.
	
	$token = $_GET["token"];
	$payer_id = $_GET["PayerID"];
	
	//get session variables
	$paypal_product = $_SESSION["paypal_products"];
	$paypal_data = '';
	$ItemTotalPrice = 0;

    foreach($paypal_product['items'] as $key=>$p_item)
    {		
		$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($p_item['itm_qty']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($p_item['itm_price']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($p_item['itm_name']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($p_item['itm_code']);
        
		// item price X quantity
        $subtotal = ($p_item['itm_price']*$p_item['itm_qty']);
		
        //total price
        $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
    }

	$padata = 	'&TOKEN='.urlencode($token).
				'&PAYERID='.urlencode($payer_id).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				$paypal_data.
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				//'&PAYMENTREQUEST_0_TAXAMT='.urlencode($paypal_product['assets']['tax_total']).
//				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($paypal_product['assets']['shippin_cost']).
//				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($paypal_product['assets']['handaling_cost']).
//				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($paypal_product['assets']['shippin_discount']).
//				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($paypal_product['assets']['insurance_cost']).
				'&PAYMENTREQUEST_0_AMT='.urlencode($paypal_product['assets']['grand_total']).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);

	//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
	$paypal= new MyPayPal();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	
	//Check if everything went ok..
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	{

			//echo '<h2>Success</h2>';
			//echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
			
				/*
				//Sometimes Payment are kept pending even when transaction is complete. 
				//hence we need to notify user about it and ask him manually approve the transiction
				*/
				//echo "";
				if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					//echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
				}
				elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					//echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
					//'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
				}

				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = 	'&TOKEN='.urlencode($token);
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{
					
					//Mail Data
$CustomerDetails = $CustomerDetails . "<div style='font-size: 16px;line-height: 34px;margin-bottom: 8px;color: #414146;width:50%;display:inline-block;'>";
		$CustomerDetails = $CustomerDetails."<h3>Billing Address</h3>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["FIRSTNAME"]).' '.html_entity_decode($httpParsedResponseAr["LASTNAME"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["EMAIL"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOSTREET"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOCITY"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOZIP"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOSTATE"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOCOUNTRYNAME"])."</p>";	
		$CustomerDetails = $CustomerDetails . "</div>";
		$CustomerDetails = $CustomerDetails . "<div style='font-size: 16px;line-height: 34px;margin-bottom: 8px;color: #414146;width:50%;display:inline-block;'>";
		$CustomerDetails = $CustomerDetails."<h3>Shipping Address</h3>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["FIRSTNAME"]).' '.html_entity_decode($httpParsedResponseAr["LASTNAME"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["EMAIL"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOSTREET"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOCITY"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOZIP"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOSTATE"])."</p>";
		$CustomerDetails = $CustomerDetails."<p style='margin:0'>".html_entity_decode($httpParsedResponseAr["SHIPTOCOUNTRYNAME"])."</p>";	
		$CustomerDetails = $CustomerDetails . "</div>";
//Mail Data
$date = date('Y-m-d H:i:s');

//Database
$order_sql = "insert into custorder (CustomerID, OrderDate, FirstName, LastName, Email, BillingFirstName, BillingLastName, BillingCompanyName, BillingEmail, BillingAddressLine1, BillingAddressLine2, BillingCity, BillingZipCode, BillingStateID, BillingCountryID, BillingPhone, ShippingFirstName, ShippingLastName, ShippingCompanyName, ShippingEmail, ShippingAddressLine1, ShippingAddressLine2, ShippingCity, ShippingZipcode, ShippingStateID, ShippingCountryID, ShippingPhone, CreditCardName, CreditCardType, CreditCardNumber, CreditCardVerificationCode, CreditCardExpMonth, CreditCardExpYear, Status, OrderNotes, CreatedOn, UpdatedOn) values  ($_SESSION[CustomerID],'$date','$_SESSION[FirstName]','$_SESSION[LastName]','$_SESSION[Email]','".urldecode($httpParsedResponseAr["FIRSTNAME"])."','".urldecode($httpParsedResponseAr["LASTNAME"])."','','".urldecode($httpParsedResponseAr["EMAIL"])."','".urldecode($httpParsedResponseAr["SHIPTOSTREET"])."','','".urldecode($httpParsedResponseAr["SHIPTOCITY"])."',".urldecode($httpParsedResponseAr["SHIPTOZIP"]).",1,1,'','".urldecode($httpParsedResponseAr["FIRSTNAME"])."','".urldecode($httpParsedResponseAr["LASTNAME"])."','','".urldecode($httpParsedResponseAr["EMAIL"])."','".urldecode($httpParsedResponseAr["SHIPTOSTREET"])."','','".urldecode($httpParsedResponseAr["SHIPTOCITY"])."',".urldecode($httpParsedResponseAr["SHIPTOZIP"]).",1,1,'','','','','','','',1,'Payment Paid Through Paypal','$date','$date')";
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
//Database
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
		echo '<script>window.location="'.$frontpath.'/thankyouorder.php?msg=Your Order Has been Successfully Placed"</script>';
		//Email
				} else  {
					echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
					
				}
	
	}else{
			//echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			//echo '<pre>';
			//print_r($httpParsedResponseAr);
			//echo '</pre>';
	}
}
?>
