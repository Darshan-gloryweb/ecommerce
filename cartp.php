<?php include('db.php');
	$id =$_GET['editid'];
	$action =$_REQUEST['action'];
	$quantity = $_REQUEST['quantity'];
	$ProductID = $_REQUEST['ProductID'];
	$flag="";
	if($action=='E')
	{
		$range_sql = "Select quantity.*,product.Price as originalprice from quantity inner join product on quantity.ProductID = product.ProductID and quantity.ProductID=".$ProductID;
		$range_res = mysqli_query($dbLink,$range_sql) or die ('Could Not Select Range Data');
		if(mysqli_num_rows($range_res)>0)
		{
			while($range_data = $range_res->fetch_assoc())
			{
				if($quantity >= $range_data['minqty'] && $quantity <= $range_data['maxqty'])
				{
					$price = $range_data['price'];
					$flag="set";
					break;
				}
				else if($quantity >= $range_data['maxqty'])
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
		
		
		$sql = "update shoppingcartitems set Quantity='$quantity'";
		if($flag!="")
		{
			$sql.= " ,Price = '".$price."'";
		}
		$sql.=" where ProductID=".$ProductID." and ShoppingCartItemsID=".$_REQUEST['cartitemid'];
		mysqli_query($dbLink,$sql) or die('could not update');
}
	header("location:cart.php");
	 	exit();
?>