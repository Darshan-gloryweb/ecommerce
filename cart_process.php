<?php
require_once('db.php');
include('include/start_session.php');
//session_start(); //start session
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
############# add products to session #########################
if(isset($_POST["product_code"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array 
	}
	
	//we need to get product name and price from database.
	$sqlstatement = "SELECT * FROM product WHERE ProductID=".$_POST["product_code"]." LIMIT 1";
	$resultstatement = mysqli_query($dbLink,$sqlstatement); 
    
	
	//$statement->execute();
	//$statement->bind_result($ProductName, $Price);
	
	
	while($datastatement = $resultstatement->fetch_assoc()){
	//while($statement->fetch()){ 
		echo $new_product["ProductName"] = $datastatement['ProductName']; //fetch product name from database
		echo $new_product["Price"] = $datastatement['Price'];  //fetch product price from database
		
		if(isset($_SESSION["products"])){  //if session var already exist
			if(isset($_SESSION["products"][$new_product['ProductID']])) //check item exist in products array
			{
				unset($_SESSION["products"][$new_product['ProductID']]); //unset old item
			}			
		}
		
		echo $_SESSION["products"][$new_product['ProductID']] = $new_product;	//update products with new item array	
	}
	
 	$total_items = count($_SESSION["products"]); //count total items
	//echo $total_items;
	exit;
	die(json_encode(array('items'=>$total_items))); //output json 

}

