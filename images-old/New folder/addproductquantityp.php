<?php
	include "db.php";
 		
	$id = AssureSec($_GET['editid']);
	$action = AssureSec($_GET['action']);
	
	/*$ProductID=AssureSec($_POST['ProductID']);*/
	$product =AssureSec($_POST['product']);
	$minqty = AssureSec($_POST['minqty']);
    $maxqty =AssureSec($_POST['maxqty']);
	$price = AssureSec($_POST['price']);
	
if(isset($_REQUEST['id']))
{
	 $sql2="select * from quantity where id=".$_REQUEST['id']; 
	 $result=mysqli_query($dbLink,$sql2);
	 
}
else if($action=='E')
{
	
	 $sql = "update quantity set minqty='$minqty',maxqty='$maxqty',price='$price' where id=".$id;
	// echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	
		
		header("location:addproduct.php?id=$product&rid=$id&msg=Record Updated Successfully");
	 	exit();
}
else if($action=='A')
{
		
     $sql = "insert into quantity(ProductID,minqty,maxqty,price) values($product,'$minqty','$maxqty','$price')";
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
	 

		header("location:addproduct.php?id=$product&rid=$id&msg=Record Added Successfully");
		exit();
}

?>
