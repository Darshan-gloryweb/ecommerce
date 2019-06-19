<?php
include('db.php');
include('include/start_session.php');
$id=$_POST['shoppingcartitemid'];

$sql = "DELETE FROM shoppingcartitems WHERE ShoppingCartItemsID=".$id;
mysqli_query($dbLink,$sql) or die('Could Not Delete');

if(isset($_SESSION['CustomerID']))
			{
				$cart_sql = "SELECT product.*, shoppingcartitems.Quantity, shoppingcartitems.VariantName, shoppingcartitems.VariantValue ,shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";
					
					$cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');
					if(mysqli_num_rows($cart_res)>0)
					{
						echo "still";
					}
					else
					{
						echo "no";
					}
			}
				 ?>
