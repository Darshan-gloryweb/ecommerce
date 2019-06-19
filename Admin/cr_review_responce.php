<?php
	include "db.php";
	header("Content-type: text/javascript");
	$pisql="select * from customerreview where crid=".$_POST['crid'];
	$pires=mysqli_query($dbLink,$pisql) or die('could not select customerreview');
	$pidata4=$pires->fetch_assoc();
	
	$pisql2="select * from customer where CustomerID =".$pidata4['customerid'];
	$pires2=mysqli_query($dbLink,$pisql2) or die('could not select customer');
	$cusdetail2 = $pires2->fetch_assoc();
	$fullname = $cusdetail2['FirstName'] .' '. $cusdetail2['LastName'];
	
	$descr =  $pidata4['descr'] ;
	$status =  $pidata4['status'];
	$ratings =  $pidata4['ratings'];
	
	
	$arr =  array(
       
                "fullname" => $fullname,
                "descr" => $descr,
                "status" => $status,
                "ratings" => $ratings
				
          );


	echo json_encode($arr);
		  
?>