<?php 

	include "db.php";

 		

	echo $id = $_GET['editid'];

	$action = $_GET['action'];

	

	/*$ProductID=$_POST['ProductID']);*/

	$product =$_POST['product'];

	$minqty = $_POST['minqty'];

    $maxqty =$_POST['maxqty'];

	$price = $_POST['price'];

	$qty_discount = $_POST['qty_discount'];

	

if(isset($_REQUEST['id']))

{

	 $sql2="delete from quantity where id=".$_REQUEST['id']; 

	 $result=mysqli_query($dbLink,$sql2);

	 echo "true";

	 

}

else if($action=='E')

{

	

	 $sql = "update quantity set minqty='$minqty',maxqty='$maxqty',price='$price',qty_discount='$qty_discount' where id=".$id;

	// echo $sql;

	 mysqli_query($dbLink,$sql) or die('could not update..');

	 

	

		

		header("location:addproduct.php?id=$product&rid=$id&msg=Record Updated Successfully&tab=3");

	 	exit();

}

else if($action=='A')

{

		

     echo $sql = "insert into quantity(ProductID,minqty,maxqty,price,qty_discount) values($product,'$minqty','$maxqty','$price','$qty_discount')";

	 //echo $sql;

	 mysqli_query($dbLink,$sql) or die('could not insert..');

	 

	 



		header("location:addproduct.php?id=$product&msg=Record Added Successfully&tab=3");

		exit();

}



?>

