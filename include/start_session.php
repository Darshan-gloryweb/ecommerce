<?php
 /*   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } */
?>
<?php
if(isset($_SESSION['item_per_page1']) && $_SESSION['item_per_page1']!="")
{
	$_SESSION['item_per_page1']=$_SESSION['item_per_page1'];
}
else
{
	$_SESSION['item_per_page1']= 'ProductName';
}
if(isset($_SESSION['sorttype']) && $_SESSION['sorttype']!="")
{
	$_SESSION['sorttype']=$_SESSION['sorttype'];
}
else
{
	$_SESSION['sorttype']="ASC";
}
if(isset($_SESSION['CustomerID']))
{
	//echo $_SESSION['CustomerID'];
 	 $header_cart_sql = "SELECT count(shoppingcartitems.ShoppingCartItemsID) as noofproduct,sum(shoppingcartitems.Price*shoppingcartitems.Quantity) as total from shoppingcartitems inner join shoppingcart on shoppingcartitems.ShoppingCartID=shoppingcart.ShoppingCartID inner join customer on shoppingcart.CustomerID=customer.CustomerID and customer.CustomerID=".$_SESSION['CustomerID'];
 //exit;
 $header_cart_res = mysqli_query($dbLink,$header_cart_sql) or die ('Could not Select');
 $header_cart_data = $header_cart_res->fetch_assoc();
 $header_cart_product = $header_cart_data['noofproduct'];
 $header_cart_total = $header_cart_data['total'];
 
 if($header_cart_product=="")
 {
  $header_cart_product="0";
 }
 
 if($header_cart_total=="")
 {
  $header_cart_total="0.00";
 }
 
}
else
{
	 $header_cart_product="0";
	 $header_cart_total="0.00";
	 
}
$ip = $_SERVER['REMOTE_ADDR'];
?>