<?php  require_once('db.php'); ?>
<?php include('include\start_session.php'); 

$orderid=$_REQUEST['orderid'];
 
 $validate = "select * from custorder where OrderNumber=".$orderid." and CustomerID=".$_SESSION['CustomerID'];
 $validate_res = mysqli_query($dbLink,$validate) or die('Could Not Validate Order');
 if(mysqli_num_rows($validate_res)>0)
 {
	 $val = true;
 }
 else
 {
	 $val = false;
 }
?>

<?php  $title = 'Cart | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header.php');?>

      <div class="cart">
      <h3>Shopping Cart</h3>
      <div class="right_cart">
<a href="index.php" title="">      	<input type="button" name="continue" class="continue" /></a>
    <a href="<?=$frontpath?>/checkout.php">    <input type="button" name="proceed" class="proceed"/></a>
              
      </div>
      <div class="inside_cart">
    <?php  
     if(isset($_SESSION['CustomerID'])  && isset($_SESSION['Email']))
			{ 
				if($val)
				{
            $cart_sql = "SELECT product.ProductName,ordercartitems.Price,product.ImageName,product.ProductID,ordercartitems.Quantity,ordercart.OrderCartID FROM product INNER JOIN ordercartitems ON product.ProductID=ordercartitems.ProductID INNER JOIN ordercart ON ordercart.OrderNumber=$orderid and ordercart.OrderCartID=ordercartitems.OrderCartID";
					
					$cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');
					if(mysqli_num_rows($cart_res)>0)
					{
						?>
                        <form id="updateOrder" name="updateOrder" method="post" onSubmit="return validateq();" action="updateorder.php">
	<div class="container m-bot-35 clearfix">
		
					
	<div class="sixteen columns">
    
    <?php
				/*$cart_sql = "SELECT product.*, shoppingcartitems.Quantity, shoppingcartitems.VariantName, shoppingcartitems.VariantValue ,shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";*/
				
				
			?>
            <p><div style="color:#090"><?=$_REQUEST['msg']?></div>
            <p>There are (<?=mysqli_num_rows($cart_res)?>) items in your Order cart. Here's a snapshot of your order.</p>
        <table width="100%" cellspacing="0" cellpadding="0" id="shoppingcart">
        <tr>
        	<th class="td_left">Item(s)</th>
            <th>Quantity.</th>
            <th>Price(per Unit)</th>
            <th>Row Amount</th>
            </tr>
            <?php
			$prodids;
            while($cart_data = $cart_res->fetch_assoc())
						{
							?>
            <tr>
            <td class="ftd td_left" ><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$cart_data['ProductName'])?>.php">
											<img  class="prod_img" src="<?=$frontpath?>/ProductImage/<?=$cart_data['ImageName']?>" width="50" height="50" style="float:left">
										</a>
                                       
                                        	<a class="prod_name" href="<?=$frontpath?>/products/<?=str_replace(' ','_',$cart_data['ProductName'])?>.php" title="" style="  color: #373737;
   
    font-size: 12px;
    font-weight: bold;
   float:left;
margin:0 5px;
    text-transform: capitalize;"><?=$cart_data['ProductName']?></a>
                                        </td>
            <td>
            	<input type="text" name="<?=$cart_data['ProductID']?>qty" value="<?=$cart_data['Quantity']?>" id="qty" style="border:1px solid #A38ECB;padding:2px;width:20px;text-align:center" class="uqty" />
                <input type="hidden" name="<?=$cart_data['ProductID']?>price" value="<?=$cart_data['Price']?>" />
                
            </td>
            <td>$<?=$cart_data['Price']?></td>
            <!--<td class="td_bottom">$399</td>-->
            <td>$<?=$cart_item_total=$cart_data['Price']*$cart_data['Quantity']?></td>
            </tr>
       <?php $total =$total+$cart_item_total;  ?>
        
            
            <!-- New -->
            
            
                <?php 
				$prodids = $prodids.$cart_data['ProductID'].',';
				$cart_id=$cart_data['OrderCartID'];
				} ?>
                <tr>
                <td class="td_left"></td>
                <td></td>
                <td><strong>Cart Amount : </strong></td>
                <td >$<?=$total?></td>
                </tr>
                <tr>
                <td class="td_left td_bottom"></td>
                <td class="td_bottom"></td>
                <td class="td_bottom"><strong>Total Amount : </strong></td>
                <td class="td_bottom">$<?=$total?></td>
                </tr>
                 </table>
        		<?php
				$prodids = substr($prodids,0,-1);
				?>
    <input type="hidden" name="order" value="<?=$orderid?>" />

    <input type="hidden" name="ordercart" value="<?=$cart_id?>" />
    <input type="hidden" name="prodids" id="prodids" value="<?=$prodids?>" />
    <p><a href="<?=$frontpath?>/myaccount.php?link=orders"><input type="button" value="Back To List" style="background:rgb(207,189,240);padding:10px;color:#fff" /></a> <input type="submit" value="Update Order" name="submit" style="background:rgb(207,189,240);padding:10px;color:#fff" />
    </div>
	
	</div>
    </form>
    <?php
	 }
			else
			{
				?>
                <div class="container m-bot-35 clearfix">
                    <?php
					echo "Your Shopping Cart Is Empty";
					?></div><?php
			}
				}
				else
				{ ?>
                <div class="container m-bot-35 clearfix">
                <?php
					echo "You Have not Access To this Order";
					?></div><?php
				}
	 }
				 ?>
        
      </div>
      </div>
    </div>
<?php require_once('footer.php');?>
