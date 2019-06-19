<?php 
require_once('db.php');
if($_POST) //Post Data received from product list page.
{
    //Other important variables like tax, shipping cost
    $TotalTaxAmount     = 2.58;  //Sum of tax for all items in this order.
    $HandalingCost      = 2.00;  //Handling cost for this order.
    $InsuranceCost      = 1.00;  //shipping insurance cost for this order.
    $ShippinDiscount    = -3.00; //Shipping discount for this order. Specify this as negative number.
    $ShippinCost        = 3.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.

    //we need 4 variables from an item, Item Name, Item Price, Item Number and Item Quantity.
    $paypal_data = '';
    $ItemTotalPrice = 0;

    //loop through POST array
    foreach($_POST['item_name'] as $key=>$itmname)
    {
        //get actual product price from database using product code
       $product_code    = filter_var($_POST['item_code'][$key], FILTER_SANITIZE_STRING);
       
        $results = $mysqli->query("SELECT price FROM products WHERE product_code='$product_code' LIMIT 1");
        $obj = $results->fetch_object();

        $paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($_POST['item_name'][$key]);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($_POST['item_code'][$key]);
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($obj->price);     
        $paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($_POST['item_qty'][$key]);
       
        // item price X quantity
        $subtotal = ($obj->price*$_POST['item_qty'][$key]);
       
        //total price
        $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
    }

    //parameters for SetExpressCheckout
    $padata =   '&METHOD=SetExpressCheckout'.
                '&RETURNURL='.urlencode($PayPalReturnURL ).
                '&CANCELURL='.urlencode($PayPalCancelURL).
                '&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
                $paypal_data.              
                '&NOSHIPPING=0'. //set 1 to hide buyer's shipping address
                '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
                '&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
                '&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
                '&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
                '&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
                '&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
                '&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
                '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                '&LOCALECODE=GB'. //PayPal pages to match the language on your website.
                '&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
                '&CARTBORDERCOLOR=FFFFFF'. //border color of cart
                '&ALLOWNOTE=1';
   

}
?>