<?php
require_once('db.php');
require_once('include/start_session.php');

$prodids =  $_POST['prodids'];
$ids = explode(',',$prodids);
$total = 0;
for($i=0;$i<count($ids);$i++)
{
	$sql = "update ordercartitems set Quantity=".$_POST[$ids[$i].'qty']." where ProductID=".$ids[$i];
	mysqli_query($dbLink,$sql) or die ('Order Details Could Not Updated');
	
	$total = $total + ($_POST[$ids[$i].'qty']*$_POST[$ids[$i].'price']);
}
	$sql = "update ordercart set OrderTotal=".$total.",OrderSubTotal=".$total." where OrderCartID=".$_POST['ordercart'];
	mysqli_query($dbLink,$sql) or die ('Could Not Update Order Total');
	header('location:editorder.php?orderid='.$_POST['order'].'&msg=Order Updated Successfully');
?>