<?php 
	include "db.php";

	$id = $_GET['editid'];
	$action = $_GET['action'];
	
	$bannerposition_title =$_POST['bannerposition_title'];
	$bannerposition_des = $_POST['bannerposition_des'];
	
if(isset($_REQUEST['id']))
{
	$all_sql = "SELECT ProductID from product where CategoryID=".$_REQUEST['id'];
  $all_res = mysqli_query($dbLink,$all_sql) or die ('Could Not Select');
  if(mysqli_num_rows($all_res)>0)
  {
   echo "Use";
  }
  else
  {
   $sqll = "select ImageName from category where CategoryID=".$_REQUEST['id'];
   $res = mysqli_query($dbLink,$sqll) or die('could not select..');
   $row = $res->fetch_assoc();
   $Mloc="../CategoryIcon/";

   $dr1 = $row['ImageName'];
   $dr1loc = $Mloc.$row['ImageName'];
   if (is_file($dr1loc)==true)
   {
     unlink($dr1loc);
      }
   
   $sql2="delete from category where CategoryID=".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql2) or die('could not Delete..');
  echo "true";
  }
}
else 
if($action=='E')
{
	
		$csql ="select * from bannerposition where bannerposition_title ='$bannerposition_title' and bannerpositionID !=".$id;
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:bannerposition.php?msg=advertise banner position Exist");
		 exit();
	}
	
else
{
	   $sql = "update bannerposition set bannerposition_title='$bannerposition_title',bannerposition_des='$bannerposition_des' where bannerpositionID=".$id;
	 //echo $sql;
	 //exit;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	 header("location:bannerposition.php?msg=Record Updated Successfully");
	 	exit();
}
}
else if($action=='A')
{
		$csql ="select * from bannerposition where bannerposition_title='$bannerposition_title'";
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:bannerposition.php?msg=advertise banner position Exist");
		 exit();
	}
	
else
{
     $sql = "insert into bannerposition(bannerposition_title,bannerposition_des) values('$bannerposition_title','$bannerposition_des')";
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not insert..');

		header("location:bannerposition.php?msg=Record Added Successfully");
		exit();
}
}
?>
