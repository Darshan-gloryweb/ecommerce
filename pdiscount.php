<?php
require_once('db.php');
require_once('include/start_session.php');
$pcode = mysqli_real_escape_string($dbLink,trim($_POST['pcode']));
$sql = "select p.* from promotioncode p where p.Code='$pcode' and p.Used < p.Uses";
$res = mysqli_query($dbLink,$sql) or die ('Could Not Select Promotion Code');
if(mysqli_num_rows($res)>0)
{
	$data = $res->fetch_assoc();
	$start_date = $data['StartDate'];
                        $end_date = $data['EndDate'];
                        $start = strtotime($start_date);
                        $todays_date = date("Y-m-d");
                        $today = strtotime($todays_date);
                        $expiration_date = strtotime($end_date);
	 if($today >= $start && $today <= $expiration_date) // if todays date is > start date and < end date then execute the below script               
	 {
		 $dsql = "Select customer.* from customer inner join custorder on customer.CustomerID=custorder.CustomerID and customer.CustomerID=".$_SESSION['CustomerID']." inner join ordercart on ordercart.OrderNumber = custorder.OrderNumber inner join promotioncode on promotioncode.Code = ordercart.UserDiscountCode and promotioncode.Code='".$pcode."'";
		 $dres = mysqli_query($dbLink,$dsql) or die ('Could Not Identify Customer');
		 
		 //exit;
		 if(mysqli_num_rows($dres)>0)
		 {
			//header('Location:cart.php?pmsg=Coupon Code is Already Used By You!');	 
		 }
		 else
		 {
			 $sql = "update shoppingcart set CouponCode='$pcode',CouponDiscount=".$data['Percentage']." where ShoppingCartID=".$_SESSION['ShoppingCartID']." and CustomerID=".$_SESSION['CustomerID'];
			 
			 //exit;
			$res = mysqli_query($dbLink,$sql) or die ('Could Not Added Gift Card Certificate');
			//echo $data['Percentage'];
			
			echo $discount_total = ($_POST['cart_total'] * $data['Percentage'])/100;
			
			$final_discount_total = $_POST['cart_total'] - $discount_total;
			
//			$sqlsh = "select * from shoppingcart where ShoppingCartID=".$_SESSION['ShoppingCartID'];
//			$ressh = mysqli_query($dbLink,$sqlsh); 
//			$datash = $ressh->fetch_assoc();
//			echo $datash['CouponDiscount'];
			
			
	
			
			if($res){
				//echo $dis = 'done'; 	
			}
			///header('Location:cart.php?pmsg=Coupon Code Applied Successfully');
		 }
	 }
	 else if ($today < $start)
	 {
		 //header('Location:cart.php?pmsg=Coupon Code is not yet active!');
	 } 
     else if ($today > $expiration_date)
	 {
		// header('Location:cart.php?pmsg=Coupon Code has expired!');
	 }
	
}
else
{
	//header('Location:cart.php?pmsg=Promotion Code does not Match');
}
?>