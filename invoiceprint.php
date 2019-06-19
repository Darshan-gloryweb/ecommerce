<? require_once('db.php'); 
 require_once('include/start_session.php');
 
    $id = $_GET['id'];

$sql = "Select custorder.*,customercreditcard.*,ordercart.OrderTotal from custorder inner join customercreditcard on custorder.CustomerID = customercreditcard.CustomerID and  custorder.OrderNumber =".$id." inner join ordercart on ordercart.OrderNumber = custorder.OrderNumber";
//echo $sql;
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Invoice Print</title>
    <style media="print" type="text/css">
.print {
	visibility: hidden;
}
</style>
    <style type="text/css">
body {
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 0px 0px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #555555;
	background: #fff url(/Client/images/patten.jpg) repeat left top;
}
a {
	text-decoration: none;
	cursor: pointer;
	outline: none;
	border: 0px;
}
a:hover {
	text-decoration: underline;
}
h1 {
	margin: 0px 0px 0px 0px;
	padding: 0px 0px 5px 20px;
	background: url(/Client/images/title-bullet.gif) no-repeat left 5px;
	font-size: 18px;
	color: #a30327;
	border-bottom: 1px solid #e7e7e7;
}
.TextBox {
	border: 1px solid #DADADA;
	color: #000000;
	font-size: 11px;
	height: 18px;
	padding-top: 2px;
	width: 210px;
}
.Button {
	border: 1px solid #DCDCDC;
	padding: 3px;
	font-family: Tahoma;
	font-size: 12px;
	font-weight: bold;
	color: #999;
	background-color: #fff;
	-moz-border-radius: 4px;
}
.table_none {
	border: 1px solid #ebebeb;
	border-collapse: collapse;
	padding: 10px 0 0 0;
	font-size: 12px;
	color: #363636;
}
.table_none td {
	padding: 5px 8px;
	background: #fff;
	font-size: 12px;
	color: #363636;
	line-height: 18px;
}
.table_none th {
	background: #f6f6f6;
	font-size: 12px;
	padding: 5px 8px;
	border-bottom: none;
	border: 1px solid #ebebeb;
	color: #363636;
	font-weight: bold;
	text-align: left;
}
.table_none a {
	color: #d22d4f;
}
.table_none a:hover {
	color: #363636;
	text-decoration: underline;
}
.required {
	color: red;
}
</style>
    </head>
    <body>
    <form name="form1" method="post"  id="form1">
      <div>
        <input name="__VIEWSTATE" id="__VIEWSTATE" value="" type="hidden">
      </div>
      <div>
        <center>
          <table class="table_none" cellpadding="0" cellspacing="0" width="750px">
            <tbody>
              <tr>
                <td style="height: 60px; vertical-align: middle; background-color: #fff; border-bottom: 1px solid #E7E7E7;" colspan="2"><a href="<?=$frontpath?>/index.php" title=""> <img src="<?=$frontpath?>/images/logo.png" id="imgLogo" title="" style="border: 0 none" ></a>
                  <div style="float: right; width: 200px;" class="print">
                    <input name="ImgPrint" id="ImgPrint" title="Print" src="<?=$frontpath?>/images/print.png" onclick="window.print();return false;" style="border-width:0px;border: 0 none; float: right;" type="image">
                  </div></td>
              </tr>
              
              <tr>
                <th colspan="2" style="text-align: center; font-weight: bold; border-bottom: 1px solid #e7e7e7;"> Invoice </th>
              </tr>
              <?php
                	$data=$r->fetch_assoc();
								//{ ?>
              <tr>
                <td style="text-align: left; width: 120px;"> Order Number : </td>
                <td style="text-align: left"><b>
                  <?= $data['OrderNumber']?>
                  </td>
              </tr>
              <tr>
                <td style="text-align: left"> Order Date : </td>
                <td style="text-align: left"><b>
                  <?=date('d . M . Y ',strtotime( $data['OrderDate']));?>
                  </b></td>
              </tr>
        
              <!--<tr style="display: none">
                <td style="text-align: left"> Shipping Method : </td>
                <td style="text-align: left"></td>
              </tr>
              <tr style="display: none">
                <td style="text-align: left"> Payment Method : </td>
                <td style="text-align: left"></td>
              </tr>
              <tr style="display: none">
                <td style="text-align: left"> Card Type : </td>
                <td style="text-align: left"> Master Card </td>
              </tr>
              <tr style="display: none">
                <td style="text-align: left"> Card Name : </td>
                <td style="text-align: left"> anil </td>
              </tr>
              <tr style="display: none">
                <td style="text-align: left"> Card Number : </td>
                <td style="text-align: left"> *************1111 </td>
              </tr>-->
              
              <?php             $cart_sql = "SELECT product.ProductName,ordercartitems.Price,product.ImageName,product.ProductID,ordercartitems.Quantity,ordercart.OrderCartID,ordercart.GiftCardCode,ordercart.GiftCardDiscount,ordercart.GiftCardComments,ordercart.UserDiscount,ordercart.UserDiscountCode FROM product INNER JOIN ordercartitems ON product.ProductID=ordercartitems.ProductID INNER JOIN ordercart ON ordercart.OrderNumber=$id and ordercart.OrderCartID=ordercartitems.OrderCartID";
$cart_res=mysqli_query($dbLink,$cart_sql) or die('could not select product');?>
   <td colspan="2" style="text-align: left"><table class="grid" style="border: 1px solid #e7e7e7;" border="0" bordercolor="#DEDEDE" cellpadding="3" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <th style="text-align: left"> Product Name&nbsp; </th>
                        
                        <th style="text-align: right"> Price&nbsp; </th>
                        <th style="text-align: right"> Quantity&nbsp; </th>
                        <th style="text-align: right"> SubTotal&nbsp; </th>
                      </tr>
                      <tr id="RepOrderCartItems_ctl00_trGroup">
                        <th colspan="5" > Items:<?=mysqli_num_rows($cart_res)?>;
                        (
                        <?=$data['FirstName'].' '.$data['LastName']?>
                        )
                        
                        Total: £
                        <?=$data['OrderTotal']?>
                      </th>
                      </tr>
              <?php
$total = 0;

while($cart_data=$r->fetch_assoc())
{
	?>
              <tr>
             
                    
                    <tr id="RepOrderCartItems_ctl00_trCategory">
                        <td style="text-align: left; border: 1px solid #FFFFFF; vertical-align: top;" ><?=$cart_data['ProductName']?></td>
                        <td style="text-align: right; border: 1px solid #FFFFFF; vertical-align: top;"> £
                        <?=$cart_data['Price']?>.00
                       </td>
                        <td style="text-align: right; border: 1px solid #FFFFFF; vertical-align: top;"><span id="RepOrderCartItems_ctl00_ltCategoryQuantity">
                          <?=$cart_data['Quantity']?>
                          </span></td>
                        <td style="text-align: right; border: 1px solid #FFFFFF; vertical-align: top;"> £<span id="RepOrderCartItems_ctl00_ltSubBasePrice">
                          <?=$cart_item_total=$cart_data['Price']*$cart_data['Quantity']?>.00
                          </span></td>
                      </tr>
                    <?php $total =$total+$cart_item_total;            ?>
                   
                        <?php
						
						$gamt = $cart_data['GiftCardDiscount'];
	$gcode = $cart_data['GiftCardCode'];
	$gcomment = $cart_data['GiftCardComments'];
	
	$pdisc = $cart_data['UserDiscount'];
	$pcode = $cart_data['UserDiscountCode'];
						
						 }
	

?>
 <tr>
                        <td colspan="3" style="text-align: right"> Order Sub Total : </td>
                        <td style="text-align: right"> £
                        <?=$total?>.00
                         </td>
                      </tr>
                 
                    <tr>
                        <td colspan="3" style="text-align: right"> Total : </td>
                        <td style="text-align: right"> £
                        <?=$total?>.00
                        </td>
                    </tr>
                      <?php
					  if($pdisc != 0)
					 {
						 ?>
                         <tr>
                        <td colspan="3" style="text-align: right">Coupon Code Amount ( <?=$pdisc?>% ):</td>
                        <td style="text-align: right">£ <?=$camt=($total*$pdisc)/100?>.00
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" style="text-align: right">Total After Coupon Code Applied:</td>
                        <td style="text-align: right">£ <?=$total=$total-$camt?>.00
                        </td>
                      </tr>
                         <?php
					 }
					 if($gamt != 0)
					{
						?>
                         <tr>
                        <td colspan="3" style="text-align: right">Gift Certificate Amount:</td>
                        <td style="text-align: right">£ <?=$gamt?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3" style="text-align: right">Total After Gift Amount Applied:</td>
                        <td style="text-align: right">£ <?=$total-$gamt?>.00
                        </td>
                      </tr>
                        <?php
					}
	
					  ?>
                      
                  </tbody>
                  </table></td>
              </tr>
              <?php
						 	//while($data=mysql_fetch_assoc($r))
								//{ ?>
              <tr>
                <td colspan="2"><table class="table_none" cellpadding="5" cellspacing="2" width="100%">
                    <tbody>
                    <tr>
                        <th style="text-align: left"> Billing Address : </th>
                        <th style="text-align: left"> Shipping Address : </th>
                      </tr>
                    <tr>
                        <td style="border-left: 1px solid #e7e7e7; text-align: left;"><?= $data['BillingFirstName'].' '.$data['BillingLastName']?>
                        <br />
                        <?= $data['BillingFirstName']?>,<br />
                        <?= $data['BillingAddressLine1']?>,
                        <?= $data['BillingAddressLine2']?>,<br />
                        <?= $data['BillingCity']?>,<br />
                        <?= $data['BillingStateID']?>,<br />
                        <?= $data['BillingZipCode']?>,<br />
                        <?= $data['BillingCountryID']?>,<br />
                      Phone :  <?= $data['BillingPhone']?>.<br />
                       </td>
                        <td style="border-left: 1px solid #e7e7e7; text-align: left;"> <?= $data['ShippingFirstName']?><br>
                        <?= $data['ShippingLastName']?>,<br>
                       <?=$data['ShippingCompanyName']?>,<br>
                      <?=$data['ShippingAddressLine1']?>,<?=$data['ShippingAddressLine2']?>,13213<br>
                      <?=$data['ShippingCity']?>,<br />
                      <?=$data['ShippingStateID']?>,<br />
                      <?=$data['ShippingCountryID']?>,<br />
                        Phone : <?=$data['ShippingPhone']?>.<br></td>
                      </tr>
                    <?php //} ?>
                  </tbody>
                  </table></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align: center"><p style="text-align:center;margin:0"> With Regards,</p> <br>
                 <img src="<?=$frontpath?>/images/logo_login.png" alt="Devnandan Handloom" title="Devnandan Handloom" /></td>
              </tr>
            </tbody>
          </table>
        </center>
      </div>
      <div style="display: none">
        <input name="HdnCustomerID" id="HdnCustomerID" value="492" type="hidden">
      </div>
    </form>
</body>
</html>