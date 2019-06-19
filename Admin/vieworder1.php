<?php include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }

$sql = "Select custorder.*,customercreditcard.*,ordercart.OrderTotal from custorder inner join customercreditcard on custorder.CustomerID = customercreditcard.CustomerID and  custorder.OrderNumber =".$id." inner join ordercart on ordercart.OrderNumber = custorder.OrderNumber";
//echo $sql;
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>
<?=$pgtitle?>
</title>
<!-- Link shortcut icon-->
<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" />
<link rel="stylesheet" href="css/style.css">
<?php  include('include_files.php'); ?>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<!---->

</head>
<body class="dashborad">
<div id="alertMessage" class="error"></div>
<?php  include('inc_header.php'); ?>
<div id="shadowhead"></div>
<div id="hide_panel"> <a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc" rel="1" id="hide_menu"></a> <a class="butAcc" rel="0" id="show_menu_icon"></a> <a class="butAcc" rel="1" id="hide_menu_icon"></a> </div>
<?php  include('inc_leftmenu.php'); ?>
<div id="content">
  <div class="inner">
    <?php  include('inc_toplogo.php'); ?>
    <div class="clear"></div>
    <div class="section ">
      <div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span>
       View Order
      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="manageorder.php" class="uibutton icon confirm answer" >Back</a></div>
        <div id="uploadTab">
          <ul class="tabs" >
           <!-- <li ><a href="#tab1"  id="2"  > Product Details </a></li>-->
            <li ><a href="#tab2"  id="3"  > General </a></li>
          </ul>
          <div class="tab_container" >
          
            </div>
            <!--tab1-->
            
            <div id="tab2" class="tab_content">
            <?php  if($id!="") { ?>
            <div style="width:30%;border:1px solid #BDBDBD;padding:5px;display:inline-block;margin-left:25px; margin-bottom: 20px;">
            <table cellpadding="5" cellspacing="10" width="100%">
            <strong>Order Review</strong>
             <?php 
						 	while($data=$r->fetch_assoc())
								{ ?>
            	<tr>
                	<td>Order Number</td>
                    <td><?= $data['OrderNumber']?></td>
                </tr>
                <tr>
                	<td>Order Date</td>
                    <td><?= $data['OrderDate']?></td>
                </tr>
                <tr>
                	<td>Total</td>
                    <td><?=$data['OrderTotal']?></td>
                </tr>
                <tr>
                	<td>Order Status</td>
                    <td><?php  if($data['Status'] == 1){ echo "Pending";}?></td>
                </tr>
               
               
                
               
            </table>
             </div>
              <div style="width:30%;border:1px solid #BDBDBD;padding:5px;display:inline-block;margin-left:25px; margin-bottom: 20px;vertical-align:top">
            <table cellpadding="5" cellspacing="10" width="100%">
             <strong>Customer Detail</strong>
						 
            	<tr>
                	<td>Customer Name</td>
                    <td><?= $data['FirstName'].' '.$data['LastName']?></td>
                </tr>
                <tr>
                	<td>Email</td>
                    <td><?= $data['Email']?></td>
                </tr>
              
            </table>
             </div>
               <div style="width:30%;border:1px solid #BDBDBD;padding:5px;display:inline-block;margin-left:25px; margin-bottom: 20px;">
               <strong>Billing Address</strong>
            <table cellpadding="2" cellspacing="10" width="100%" style="margin-top:10px;">
             
				<tr>
                	<td>Name</td>
                    <td><?= $data['BillingFirstName'].' '.$data['BillingLastName']?></td>
                </tr>
                <tr>
                	<td>Company Name</td>
                    <td><?= $data['BillingCompanyName']?></td>
                </tr>
                <tr>
                	<td>Email</td>
                    <td><?= $data['BillingEmail']?></td>
                </tr>
                		 
            	<tr>
                	<td>Address Line 1</td>
                    <td><?= $data['BillingAddressLine1']?></td>
                </tr>
                <tr>
                	<td>Address Line 2</td>
                    <td><?= $data['BillingAddressLine2']?></td>
                </tr>
                <tr>
                	<td>City</td>
                    <td><?= $data['BillingCity']?></td>
                </tr>
                <tr>
                	<td>Zip Code</td>
                    <td><?= $data['BillingZipCode']?></td>
                </tr>
                <tr>
               	<td>State</td>
                    <td><?= $data['BillingStateID']?></td>
                </tr>
                <tr>
                	<td>Country</td>
                    <td><?= $data['BillingCountryID']?></td>
                </tr>
                <tr>
                	<td>Phone</td>
                    <td><?= $data['BillingPhone']?></td>
                </tr>
       </table>
             </div>
              <div style="width:30%;border:1px solid #BDBDBD;padding:5px;display:inline-block;margin-left:25px; margin-bottom: 20px;">
               <strong>Shipping Address</strong>
            <table cellpadding="2" cellspacing="10" width="100%" style="margin-top:10px;">
             
						 
            	<tr>
                	<td>Name</td>
                    <td><?= $data['ShippingFirstName'].' '.$data['ShippingLastName']?></td>
                </tr>
                <tr>
                	<td>Company Name</td>
                    <td><?= $data['ShippingCompanyName']?></td>
                </tr>
                <tr>
                	<td>Email</td>
                    <td><?= $data['ShippingEmail']?></td>
                </tr>
                <tr>
                	<td>Address Line 1</td>
                    <td><?= $data['ShippingAddressLine1']?></td>
                </tr>
                <tr>
               	<td>Address Line 2</td>
                    <td><?= $data['ShippingAddressLine2']?></td>
                </tr>
                <tr>
                	<td>City</td>
                    <td><?= $data['ShippingCity']?></td>
                </tr>
                <tr>
                	<td>Zip Code</td>
                    <td><?= $data['ShippingZipCode']?></td>
                </tr>
                <tr>
                	<td>State</td>
                    <td><?= $data['ShippingStateID']?></td>
                </tr>
                <tr>
                	<td>Country</td>
                    <td><?= $data['ShippingCountryID']?></td>
                </tr>
                <tr>
                	<td>Phone</td>
                    <td><?= $data['ShippingPhone']?></td>
                </tr>

                
              
            </table>
             </div>
              <div style="width:30%;border:1px solid #BDBDBD;padding:5px;display:inline-block;margin-left:25px; margin-bottom: 20px;float:left">
            <table cellpadding="5" cellspacing="10" width="100%">
            <strong>Payment Detail</strong>
						 
            	<tr>
                	<td>Card Type</td>
                    <td><?= $data['CreditCardType']?></td>
                </tr>
                <tr>
                	<td>Card Number</td>
                    <td><?= $data['CreditCardNumber']?></td>
                </tr>
                <tr>
                	<td>Card Name</td>
                    <td><?= $data['CreditCardName']?></td>
                </tr>
               
               
                
                <?php  } ?>
            </table>
             </div>
             <div style="width:50%;border:1px solid #BDBDBD;padding:5px;display:inline-block;margin-left:25px; margin-bottom: 20px;">
             <?php              $cart_sql = "SELECT product.ProductName,product.Price,product.ImageName,product.ProductID,ordercartitems.Quantity,ordercart.OrderCartID FROM product INNER JOIN ordercartitems ON product.ProductID=ordercartitems.ProductID INNER JOIN ordercart ON ordercart.OrderNumber=$id and ordercart.OrderCartID=ordercartitems.OrderCartID";
$cart_res=mysqli_query($dbLink,$cart_sql) or die('could not select product');?>
             <table width="100%" cellpadding="3" cellspacing="10">
              <strong>Order Detail</strong>
    <tr>
    <th align="left">Image</th>
    <th align="left">Product Name</th>
    <th align="left">Quantity</th>
    <th align="left">Price</th>
    <th align="left">Total</th>
   </tr>
<?php 
$total = 0;
while($cart_data=$cart_res->fetch_assoc())
{
	?>
    
    	<tr>
        <td align="left"><img src="<?=$frontpath?>/ProductImage/<?=$cart_data['ImageName']?>" title="<?=$cart_data['ImageName']?>" alt="<?=$cart_data['ImageName']?>" height="50" width="50"/></td>
        	<td align="left" ><?=$cart_data['ProductName']?></td>
            <td align="left"><?=$cart_data['Quantity']?></td>
            <td align="left">$ <?=$cart_data['Price']?></td>
		    <td align="left">$ <?=$cart_item_total=$cart_data['Price']*$cart_data['Quantity']?></td>
        </tr>
    
    <?php  $total =$total+$cart_item_total;
}

?>
<tr>
<td></td>
<td></td>
<td></td>
	<td align="left">Sub Total</td>
    <td align="left">$ <?=$total?></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
	<td align="left">Total</td>
    <td align="left">$ <?=$total?></td>
</tr>

  </table>           </div>
                      
     </div>
                  <?php  } ?>
            </div>
         
    <div class="clear"></div>
    </div>
    

    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
</body>
</html>
