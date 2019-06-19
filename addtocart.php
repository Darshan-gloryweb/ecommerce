<?php
include('db.php');
include('include/start_session.php');
$date = date('Y-m-d H:i:s');
//if(isset($_POST['addtocart']))
//{
	
	if(!isset($_SESSION['CustomerID']) || $_SESSION['CustomerID'] == 0 )
	{
		
		//exit;
		$create_cust_sql = "INSERT INTO customer (LastIpAddress, CreatedOn, UpdatedOn) VALUES ('$ip',  '$date', '$date')";
		mysqli_query($dbLink,$create_cust_sql) or die ('Could Not Purchase The Item');
		$_SESSION['CustomerID'] = mysqli_insert_id($dbLink);
	}
	$qty = $_POST['qty'];
	$productid = $_POST['pro_id'];
	$price = $_POST['price'];
	$customerid = $_SESSION['CustomerID'];
	
	
	$sql = "SELECT * FROM shoppingcart WHERE CustomerID=".$_SESSION['CustomerID'];
	$res = mysqli_query($dbLink,$sql) or die ('Could Not Select');
	if(mysqli_num_rows($res)>0)
	{
		
		$d= $res->fetch_assoc();
		$ssql = "SELECT * FROM shoppingcartitems WHERE ShoppingCartID=".$d['ShoppingCartID']." AND ProductID=".$productid;
		$ress = mysqli_query($dbLink,$ssql) or die ('Could Not Selects');
		$_SESSION['ShoppingCartID'] = $d['ShoppingCartID'];
		setcookie('ShoppingCartID', $d['ShoppingCartID'], time() + 60);
		if(mysqli_num_rows($ress)>0)
		{
			$dq = $ress->fetch_assoc();
			$qt = $dq['Quantity'];
			$qt = $qt + $qty;
			
			
			$range_sql = "Select quantity.*,product.Price as originalprice from quantity inner join product on quantity.ProductID = product.ProductID and quantity.ProductID=".$productid;
		$range_res = mysqli_query($dbLink,$range_sql) or die ('Could Not Select Range Data');
		if(mysqli_num_rows($range_res)>0)
		{
			while($range_data = $range_res->fetch_assoc())
			{
				if($qt >= $range_data['minqty'] && $qt <= $range_data['maxqty'])
				{
					$price = $range_data['price'];
					$flag="set";
					break;
				}
				else if($qt >= $range_data['maxqty'])
				{
					$price = $range_data['price'];
					$flag="set";
				}
				else
				{
					$price = $range_data['originalprice'];
					$flag="set";
					break;
				}
			}
		}
			
			$cart_item_sql = "UPDATE shoppingcartitems SET Quantity=$qt ,Price=$price,VariantName='$variant_value', VariantValue='$variant_price' WHERE ProductId=".$productid." AND ShoppingCartID=".$d['ShoppingCartID'];
		}
		else
		{
			
			$range_sql = "Select quantity.*,product.Price as originalprice from quantity inner join product on quantity.ProductID = product.ProductID and quantity.ProductID=".$productid;
		$range_res = mysqli_query($dbLink,$range_sql) or die ('Could Not Select Range Data');
		if(mysqli_num_rows($range_res)>0)
		{
			while($range_data = $range_res->fetch_assoc())
			{
				if($qty >= $range_data['minqty'] && $qty <= $range_data['maxqty'])
				{
					$price = $range_data['price'];
					$flag="set";
					break;
				}
				else if($qty >= $range_data['maxqty'])
				{
					$price = $range_data['price'];
					$flag="set";
				}
				else
				{
					$price = $range_data['originalprice'];
					$flag="set";
					break;
				}
			}
		}
		
		$cart_item_sql = "INSERT INTO shoppingcartitems (ShoppingCartID,ProductID,Quantity,Price,VariantName,VariantValue) VALUES (".$d['ShoppingCartID'].", $productid, $qty,$price, 'None', '0.00')";
		}
//echo $cart_item_sql;
	$aa = mysqli_query($dbLink,$cart_item_sql) or die ('Could Not Add To Cart Item');
	
	/*****cart item value*****/
	
	
		
		$cart_sql = "SELECT product.*, shoppingcartitems.Quantity,shoppingcart.*, shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";
			
			$cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');
			if(mysqli_num_rows($cart_res)>0)
			{
				echo $bb = mysqli_num_rows($cart_res);
			}
			else
			{
				echo $bb = 0;
			}
	
				
	
	
	
	
	//header('Location:cart.php',true);
	}
	else
	{
	//echo 'pratik';
	$cart_sql = "INSERT INTO shoppingcart (CustomerID, GiftCardDiscount, GiftCardCode, GiftCardAmt, GiftCardComments, CreatedOn) VALUES ($customerid, 0, 0, 0, 'No-Comment', '$date')";
	mysqli_query($dbLink,$cart_sql) or die('Could Not Add To Cart');
	
	$_SESSION['ShoppingCartID'] = mysqli_insert_id($dbLink);
	setcookie('ShoppingCartID', mysqli_insert_id($dbLink), time() + 60);    // expires in 30 days
	
	$soppingcartid = mysqli_insert_id($dbLink);
	
	$cart_item_sql = "INSERT INTO shoppingcartitems (ShoppingCartID,ProductID,Quantity,Price,VariantName,VariantValue) VALUES ($soppingcartid, $productid, $qty,$price, 'none', '0.00')";
	$aa = mysqli_query($dbLink,$cart_item_sql) or die ('Could Not Add To Cart Item');
	if($aa){echo $bb =1;}
	//header('Location:cart.php',true);
	//exit();
	}
//}
?>