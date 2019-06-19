<?php require_once('db.php'); 
 include('include/start_session.php'); ?>
<?php  $title = 'Proceed To Checkout | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>
<?php require_once('productfunction.php'); ?>
<?php 
	if(isset($_SESSION['Email'])) {
		$login_email = $_SESSION['Email'];
	}else{?>
		<script>window.location = "<?php echo $frontpath;?>/login.php";</script>
<?php }?>
</head>
<body>


<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">My Orders</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        <?php 
			$sqlcustorder = "select * from custorder where CustomerID = '".$_SESSION['CustomerID']."'";
			$rescustorder = mysqli_query($dbLink,$sqlcustorder) or die("Error : ".mysqli_error());
			
			if (mysqli_num_rows($rescustorder)>0) {
				
				while($datacustorder = $rescustorder->fetch_assoc()){?>
				
                <div _ngcontent-c7="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c7=""></router-outlet><bussiness-order class="ng-tns-c18-8 ng-star-inserted"><loader class="ng-tns-c18-8" _nghost-c10="">
</loader>
          
<h3 class="f-size-16 f-size-xs-14 pad-b-10 mar-b-15 border-b pad-t-xs-0 mar-t-xs-0">MY ORDERS</h3>
<div class="ng-tns-c18-8 ng-star-inserted">
    <div class="mar-tb-20 relative ng-tns-c18-8 ng-star-inserted">
        <div class="border box-shadow bg-order row bgig-grey pad-tb-10 no-margin pointer" aria-controls="footwear" aria-expanded="false" data-toggle="collapse" href="#">
            <div class="col-sm-10">
                
                <span class="f-size-15 pad-tb-5 no-margin f-size-sm-13">Order Id : <b class="pad-l-5 f-size-16 f-size-sm-14 f-size-xs-12 text-semiblack"><?php echo $datacustorder['OrderNumber'];?></b></span>
                <span class="inline-block pad-lr-5 text-500">|</span>
                <span class="f-size-14 f-size-xs-13">
                    <span class="text-500"><?php echo mysqli_num_rows($rescustorder);?> Item  </span>
                </span>
                <span class="inline-block pad-lr-5 text-500">|</span>
                
                
                <span class="f-size-14 f-size-xs-13">
                    <span class="text-500 inline-block pad-l-5 pad-l-xs-0">Placed on :  <?php echo date("d-m-Y",$datacustorder['OrderDate']);?></span>
                </span>

                
                
            </div>
            <div class="col-md-2">
                
            </div>
        </div>

        
<?php 
$order_sql = "select custorder.*,ordercart.* from custorder inner join ordercart on custorder.OrderNumber = ordercart.OrderNumber and custorder.CustomerID=".$_SESSION['CustomerID']." order by custorder.UpdatedOn DESC";
$order_res = mysqli_query($dbLink,$order_sql) or die ('Could Not Select Orders');

if(mysqli_num_rows($order_res)>0)
{
	
	
	while($order_data = $order_res->fetch_assoc())
	{
		$order_item = "SELECT product.ProductName,ordercartitems.Price,product.ImageName,ordercartitems.Quantity from product inner join ordercartitems on ordercartitems.OrderCartID=".$order_data['OrderCartID']." and ordercartitems.ProductID=product.ProductID";
		
		$order_item_res = mysqli_query($dbLink,$order_item) or die ('Could Not Select Order Items');
		while($order_item_data=$order_item_res->fetch_assoc())
		{
			
			?>
								
            <div class="ng-tns-c18-8 ng-star-inserted" id="one">

                <div class="row no-margin border-b-dot ng-tns-c18-8 ng-star-inserted">
                    <div class="col-sm-12 ">
                        <div class="row pad-t-30">
                            <div class="col-sm-2 col-xs-4 pad-lr-xs-0 text-center">
                            <img src="<?=$frontpath?>/ProductImage/<?=$order_item_data['ImageName']?>?<?=time()?>"
			title="<?=$order_item_data['ProductName']?>" alt="<?=$order_item_data['ProductName']?>"
			 class="img-fluid inline-block border" />
                                
                            </div>

                            <div class="col-md-10 col-xs-8 pad-r-xs-0">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <p class="f-size-14 f-size-sm-13 lh-22 lh-xs-18 text-500 mar-b-10">
                                            <?=$order_item_data['ProductName']?>
                                        </p>
                                        
                                        <span class="f-size-13 no-margin text-grey f-size-xs-13 mar-r-15 mar-b-xs-10 wp-xs-100">Status : <span class="text-500"><?php if($order_data['Status']==1){ echo "Pending";} ?>
                                 <?php if($order_data['Status']==2){ echo "Completed";} ?>
                                    <?php if($order_data['Status']==3){ echo "Cancelled";} ?></span></span>
                                        
                                        
                                    </div>

                                    

                                    <div class="col-sm-2 col-xs-6 mar-tb-xs-5">
                                        <span class="inline-block f-size-14 f-size-xs-13 f-left pad-l-xs-0"> <b class="ng-tns-c18-8">Qty :<?=$order_item_data['Quantity']?></b></span>
                                    </div>
                                    <div class="col-sm-4 text-right col-xs-12">
                                        <p class="f-size-14 text-grey relative-xs"><b class="ng-tns-c18-8">Price : ₹ <?=$order_item_data['Price']?></b></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                         
                         <div class="clearfix"></div>
                         
                         
                         

                         <div class="row pad-b-20">
                             <div class="col-md-10 col-xs-12 f-right pad-lr-xs-0">
                                 <div class="select_wrap f-left">
                                     
                                 </div>

                                 
                             </div>
                         </div>



                    </div>

                    
                </div>
                
                
                <div class="row border pad-tb-20 no-border-r no-border-l no-margin pad-lr-10 ng-tns-c18-8 ng-star-inserted">
                    <div class="col-sm-12 no-padding-sm o-hidden">
                        <span class="inline-block f-left f-size-14 f-size-xs-13">
                        <?php
						$cusadd = "select * from customeraddress where CustomerID = '".$_SESSION['CustomerID']."'"; 
						$cusres = mysqli_query($dbLink,$cusadd) or die ('Could Not Select add');
						$dataadd=$cusres->fetch_assoc();
						
						?>
                        
                        Address : <?php echo $dataadd['AddressLine1'].' , '.$dataadd['City'].' , '.$dataadd['StateID'].' , '.$dataadd['Zipcode'] ?></span>
                       
                        <div class="f-right text-right">
                             <span class="f-size-12 block mar-b-5 text-grey">Shipping:  ₹ <?=$order_data['OrderShippingCharge'];?></span>
                              <span class="f-size-12 block mar-b-5 text-grey">Discount:  ₹ <?=$order_data['OrderDiscount'];?></span>
                             <span class="block text-500 f-size-14 f-size-xs-13 block">Total :  ₹ <?=$order_data['OrderTotal']?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php
		}
	}
}
?>
    </div>
</div>



<div class="ng-tns-c18-8">
    
</div>

</bussiness-order>
        </div>	
			<?php 	}
			}else{?>
            	<div _ngcontent-c4="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c4=""></router-outlet><bussiness-order class="ng-tns-c6-1 ng-star-inserted"><loader class="ng-tns-c6-1" _nghost-c7="">
</loader>
          
<h3 class="f-size-16 f-size-xs-14 pad-b-10 mar-b-15 border-b pad-t-xs-0 mar-t-xs-0">MY ORDERS</h3>


<div class="relative ng-tns-c6-1 ng-star-inserted">
    
    <div class="mid_msz text-center relative pad-t-30 mar-t-30 ">
       <h3 class="f-size-20"> You have not placed any orders yet</h3>
    </div>
</div>

<div class="ng-tns-c6-1">
    
</div>

</bussiness-order>
        </div>
			<?php 	}
				?>
        
        
    </div>
</section>
</bussiness>
</div>
 <?php require_once('footer.php');?>