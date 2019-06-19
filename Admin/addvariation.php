<?php include "db.php";

$id = $_GET['editid'];
$action = $_GET['action'];
$attr =$_POST['attr'];
$variation_name  = $_POST['variation_name'];
$variation_status =$_POST['variation_status'];
$variation_Price = $_POST['variation_Price'];
	

if(isset($_REQUEST['id']))

{

	 $sql2="delete from attributes_variation where id=".$_REQUEST['id']; 

	 $result=mysqli_query($dbLink,$sql2);

	 echo "true";

	 

}

else if($action=='E')

{

	

	 $sql = "update attributes_variation set variation_name='$variation_name',variation_status='$variation_status',variation_Price='$variation_Price' where id=".$id;

	// echo $sql;

	 mysqli_query($dbLink,$sql) or die('could not update..');

	 

	

		

		header("location:addattributes.php?id=$attr&rid=$id&msg=Record Updated Successfully&tab=2");

	 	exit();

}

else if($action=='A')

{

		

     $sql = "insert into attributes_variation(attr_id,variation_name,variation_status,variation_Price) values($attr,'$variation_name','$variation_status','$variation_Price')";

	 //echo $sql;

	 mysqli_query($dbLink,$sql) or die('could not insert..');

	 

	 



		header("location:addattributes.php?id=$attr&msg=Record Added Successfully&tab=2");

		exit();

}



?>

