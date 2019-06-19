<?php  include "db.php";

$id = $_GET['editid'];
$action = $_GET['action'];
$Name = $_POST['Name'];
$Status = $_POST['Status'];

if(isset($_REQUEST['id']))

{

	$sql2="delete from attributes where id=".$_REQUEST['id']; 
	mysqli_query($dbLink,$sql2) or die('could not Delete..');
	echo "true";

}

else if($action=='E')

{

	$csql ="select * from attributes where Name='$Name' and id !=".$id;
	$cres=mysqli_query($dbLink,$csql) or die('could not select');
	if(mysqli_num_rows($cres) > 0)
	{
		header("location:attributes.php?msg=Brand Exist");
		exit();
	}
	else
	
	{
	
		$sql = "update attributes set Name='$Name',Status=$Status where id=".$id;
		mysqli_query($dbLink,$sql) or die('could not update..');
		header("location:attributes.php?msg=Record Updated Successfully");
		exit();
	
	}

}

else if($action=='A')

{
	
	$csql ="select * from attributes where Name='$Name'";
	$cres=mysqli_query($dbLink,$csql) or die('could not select');
	if(mysqli_num_rows($cres) > 0)
	{
		header("location:attributes.php?msg=Brand Exist");
		exit();
	}
	else{	

		$sql = "insert into attributes(Name,Status) values('$Name','$Status')";
		mysqli_query($dbLink,$sql) or die('could not insert..');
		header("location:attributes.php?msg=Record Added Successfully");
		exit();

	}
	
}

?>

