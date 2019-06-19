<?php
require_once('db.php');
require_once('include/start_session.php');
$gcode = mysqli_real_escape_string($dbLink,trim($_POST['gcode']));
$gdescr = mysqli_real_escape_string($dbLink,trim($_POST['descr']));
$tot = mysqli_real_escape_string($dbLink,trim($_POST['tot']));
$sql = "select g.* from giftcertificate g where g.Code='$gcode'";
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
	 	
	//if($tot > $data['Mamount'])
	//{
		$dsql = "Select customer.*,sum(ordercart.GiftCardDiscount) as tgift from customer inner join custorder on customer.CustomerID=custorder.CustomerID and customer.CustomerID=".$_SESSION['CustomerID']." inner join ordercart on ordercart.OrderNumber = custorder.OrderNumber inner join giftcertificate on giftcertificate.Code = ordercart.GiftCardCode and giftcertificate.Code='".$gcode."'";
		$dres = mysqli_query($dbLink,$dsql) or die ('Could Not Identify Customer');
		
		if(mysqli_num_rows($dres)>0)
		{
			//echo "You Have Already Used This Code";
			$rdata = $dres->fetch_assoc();
			if($rdata['tgift'] != '0.00' && $rdata['tgift']>=$data['Amount'])
			{
				echo "Your Gift Certificate Amount Has Been Used.";
			}
		else
		{
		$camount = $data['Amount']-$rdata['tgift'];
		if($tot<$camount)
		{
			$camount = $tot;
		}
			
		$sql = "update shoppingcart set GiftCardCode='$gcode',GiftCardAmt='".$camount."',GiftCardComments='".$gdescr."' where ShoppingCartID=".$_SESSION['ShoppingCartID']." and CustomerID=".$_SESSION['CustomerID'];
		//echo $sql;
		$res = mysqli_query($dbLink,$sql) or die ('Could Not Added Gift Card Certificate');
		}
	}
	//else
	//{
		//echo "Less amount to get the discount";
	//}
							}
							else if ($today < $start){echo "Coupon Code is not yet active!";} 
                        else if ($today > $expiration_date){echo "Coupon Code has expired!";}
}
else
{
	echo "Gift Certificate Code Does Not Match";
}
?>