<?php  require_once('db.php'); ?>
<?php include('include/start_session.php'); ?>
<?php  $title = 'Cart | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>
<script type="text/javascript" src="<?=$frontpath?>/js/cart-custom.js"></script>
<link rel="stylesheet" href="<?php echo $frontpath;?>/icomoon/style.css">
<link href="<?=$frontpath?>/css/styles.css" rel="stylesheet">
<link href="<?=$frontpath?>/css/responsive.css" rel="stylesheet">
      
 <?php 
	if(isset($_SESSION['CustomerID']))
      {
		  
		  
		  /*$cart_sql = "SELECT product.*, shoppingcartitems.Quantity, shoppingcartitems.VariantName, shoppingcartitems.VariantValue ,shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";*/
        
		
		
        $cart_sql = "SELECT product.*, shoppingcartitems.Quantity,shoppingcart.*, shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";
          
          $cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');
		  $total;
			if(mysqli_num_rows($cart_res)>0)
			{
				?>
<div class="container-fluid" id="cart-page">
  <router-outlet></router-outlet><quick-order>
<!----><div class="pad-t-xs-5">
    
    <!----><div class="container tab_container pad-tb-20 no-pad-xs o-hidden">
        <div class="row  mar-t-xs-5">
            
            <div class="col-sm-8">

                <div class="order_block mar-b-15 bg-white box-shadow">

                    <div class="row ">
                        <div class="col-sm-12">

                            <div class="pad-tb-15 pad-lr-15 bg-darkblue text-white h-50 o-hidden">
                                <p class="f-left f-size-16 text-white inline-block">My Cart</p>
                                
                                
                                
                                
                            </div>


                            <cart><loader _nghost-c5=""><!---->
</loader>
<!---->

	
      
      	<div class="order-item">
   		 <div class="row bg-grey text-left pad-tb-15  hidden-sm-down  mar-lr-0 res-hidden">
        <div class="col-xs-2 col-sm-2 no-padding">
            <p class="pad-l-20 text-black">Item Details</p>
        </div>
        <div class="col-xs-4 col-sm-4 text-black"></div>
        <div class="col-xs-2 col-sm-2 text-black">Unit Price</div>
        <div class="col-xs-2 col-sm-2 text-black">Quantity</div>
        <div class="col-xs-2 col-sm-2 text-black text-right">Total</div>
    </div>
      
       <?php while($cart_data = $cart_res->fetch_assoc()){?>
		
			<!----><div class="row pad-t-20 pad-b-15 text-left border-b mob-p-l-15 mob-r-m-r cart_row">
				<div class="col-xs-4 col-md-3 text-center pad-l-45 no-padding-sm min-h-105">
					<img class="img-fluid border inline-block" tabindex="0" src="<?=$frontpath?>/ProductImage/<?=$cart_data['ImageName']?>">
				</div>
				<div class="col-xs-8 col-md-3 text-grey relative text-left-xs min-h-105 h-auto-xs mob-ta-l">
					<a class="f-size-14 wp-90 block text-blue text-400 lh-20 no-margin-xs mar-r-xs-0 wp-xs-100 pad-lr-xs-15 mar-t-xs-10 mob-p-n mar-b-25" href="<?=$frontpath?>/products/<?=str_replace(' ','_',$cart_data['ProductName'])?>.php"><?=$cart_data['ProductName']?></a>
					<span class="f-size-14 absolute inline-block bottom-0 text-500 text-darkgrey pointer top-xs-80 left-xs-150 mob-p-s mob-p-t-15 mob-t-h re-hover-text-red remove_product invisible-rem-btn" id="<?=$cart_data['ShoppingCartItemsID']?>" >REMOVE</span>
					
					 
												
				</div>
				<div class="col-xs-4 no-padding col-md-2 text-grey text-center-xs min-h-105 h-auto-xs mob-ta-l clear-l-xs">
		
					<?php 
					
					
					  if ($cart_data['is_deal_pro']==1){?>
					  
					  <div class="mar-tb-xs-15">
					   <span class="text-darkgrey block f-size-16 pro_price" data-value="<?php echo $cart_data['SalePrice'];?>"><?php echo '₹'.$cart_data['SalePrice'];?></span>
						
						<span class="text-darkgrey block line-through mar-tb-5 pad-t-5 f-size-12 b-text"><?php echo '₹'.$cart_data['Price'];?></span>
		
						<span class="text-green block text-500 mar-t-10 f-size-12">[<?php echo $cart_data['discount_lable'];?>% OFF]</span>
						 
		
					</div>
		
					  <?php }else{?>
					  <div class="mar-tb-xs-15">
					   <span class="text-darkgrey block f-size-16 pro_price" data-value="<?php echo $cart_data['Price'];?>"> <?php echo '₹'.$cart_data['Price'];?></span>
					</div>
		
					  <?php }?>
					
					
					<!---->
				</div>
				
				<div class="col-xs-8 no-padding col-md-3 text-grey text-center-xs min-h-105 h-auto-xs minh-auto-xs mob-ta-l final_qty">
					<div class="mob-ta-r pad-lr-xs-15">
						
					<div class="input-group">
						<span class="inline-block h-20 w-20 border-black text-center f-size-18 border-r-50 pointer qty_sub" style="border: 1px solid #53534F !important; color: #53534F !important;" id="qty_sub">-</span>
						
						<input class="text-center pad-tb-5 wp-40 mar-lr-5 qty_field" maxlength="3" onkeypress="if(window.event.keyCode > 31 &amp;&amp; (window.event.keyCode < 48 || window.event.keyCode > 57)){ return false; }" style="border-radius: 3px; border: 1px solid #53534F;" type="text"  value="<?=$cart_data["Quantity"] ?>">
						
						<span class="inline-block h-20 w-20 border-black text-center f-size-16 border-r-50 pointer qty_add" style="border: 1px solid #53534F !important; color: #53534F !important;line-height: 1.1;" id="qty_add">+</span>
                        <span class="f-size-14 absolute inline-block bottom-0 text-500 text-darkgrey pointer top-xs-custom left-xs-custom mob-p-s mob-p-t-15 mob-t-h re-hover-text-red remove_product visible-rem-btn" id="<?=$cart_data['ShoppingCartItemsID']?>" >REMOVE</span>
					</div>
			  </div>
					
					
		
		
					
				</div>
				
				<div class="col-xs-12 col-sm-2 col-md-1 text-right text-center-xs mar-t-xs-20 min-h-105 hidden-sm-down pad-l-10 pad-r-25 final_total no-padding">
				
				
					<?php 
						if ($cart_data['is_deal_pro']==1){$pro_price = $cart_data['SalePrice'];}
						else{$pro_price = $cart_data['Price'];}
						$pro_qty = $cart_data["Quantity"];
						$pro_total = $pro_price*$pro_qty;
					?>
				
					<p class="b-text f-size-15 text-darkgrey pro_total" data-value="<?php echo $pro_total;?>">₹ <?php echo $pro_total;?></p>
					
		
					
					 <!----> 
					
		
						
				
				</div>
				
				
				<div class="clearfix"></div>
			</div>
			
			<?php 
			$total =$total+$pro_total;
			
			} 
			
			
			
			?>
            <input type="hidden" value="<?php echo $total;?>" name="cart_total" />
    </div>
	




<div class="bottom_stick_wrap">
    <div class="o-hidden pad-lr-30 pad-tb-30 no-padding-sm mob-b-c mob-fixed col-sm-12 res-footer-pad">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!---->
        </div>

        <!----><button class="wp-30 no-border wp-xs-47 h-45 text-white bg-orange f-right mar-l-20 border-r-3 no-margin-xs f-size-15 f-size-xs-12 text-500 placeorder_btn" title="Place Order" tabindex="0">PLACE ORDER</button>
        <!----><button class="pad-lr-25 no-border h-45 text-white bg-back_btn mar-l-10 f-right wp-xs-44 border-r-3 no-margin-xs f-size-15 f-size-xs-12 text-500 continue_btn" title="Continue Shopping">CONTINUE SHOPPING</button>
    </div>
</div>

<!---->
</cart>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4 pad-l-0">
            
            
                <order-summary _nghost-c13=""><loader _ngcontent-c13="" _nghost-c5=""><!---->
</loader>
<!----><div _ngcontent-c13="" class="order-block bg-white o-hidden pad-tb-20 mar-b-xs-30">
  
  <!---->
  <div _ngcontent-c13="" class="promo_code pad-lr-20 pad-lr-xs-30 pad-b-10 mar-b-20 no-margin-xs">
    <div _ngcontent-c13="" class=" pad-b-20 clearfix pad-t-10" style="position: relative;">
      
      
      <form name="PromotionDiscount" id="PromotionDiscount" action="#"  class="clearfix ng-untouched ng-pristine ng-invalid"  method="post">
        <div _ngcontent-c13="" class="clearfix mar-t-10"></div>
        
        
        <input type="text" name="pcode" id="pcode" size="50" maxlength="40" class="f-size-13 inline-block h-40 f-left wp-70 border-tr-r-0 border-br-r-0 form-control ng-untouched ng-pristine ng-invalid" placeholder="Enter Promocode here"  value=""/>
       		
            
         <input type="button" value="Apply" name="promotion" class="pad-lr-0 btn bg-back_btn h-40 text-white border-tl-r-0 border-bl-r-0 f-left wp-30 text-500 f-size-12 promotion_appy" />
          <?=$_REQUEST['pmsg']?>
         
        
         
      </form>
      
      
    </div>
    <div _ngcontent-c13="" class="clearfix"></div>

   

    
    

    

    <p _ngcontent-c13="" class="lh-22 pad-b-5 mar-b-10 border-b text-500 f-size-16 no-border-xs">
      <span _ngcontent-c13="" class="mobile-promo">
        Take advantage of our exclusive offers
      </span>
    </p>



   
    
    <div _ngcontent-c13="" class="mobile-promo-box h-200 scroll-y h-auto-xs">
      <div _ngcontent-c13="">
      <div _ngcontent-c13="" class="mob-view" style="position: relative;">
          <span _ngcontent-c13="" class="close-promo" title="Close button">
          <i _ngcontent-c13="" _aria-hidden="true" class="icon-close"></i>
        </span>
        </div>

        <div _ngcontent-c13="" class="popup_title mob-view mobile-promo">
          <h3 _ngcontent-c13="" class="pad-b-5 f-size-18">Exclusive offer</h3>
        </div>

   
		<?php 
			
			
			$sqlprocode = "select * from promotioncode";
			$respromocode = mysqli_query($dbLink,$sqlprocode) or die ('Could Not Select Cart Items');
			while($datapromocode = $respromocode->fetch_assoc()){
				$todaydate = date('Y-m-d');
				$enddate = $datapromocode['EndDate'];
				
				$a1 = strtotime($todaydate);
				$b1 = strtotime($enddate);
				if($a1 <= $b1){
				
		?>
        	
        
          <p _ngcontent-c13="" class="f-size-13 text-500 pointer text-grey clearfix input-close">

            <label _ngcontent-c13="" class="radio_list" style="display: block !important; " for="0couponcode">
            <input _ngcontent-c13="" name="promo-code" style="display: inline-block !important;" id="promo-code" value="<?php echo $datapromocode['Code']?>" type="radio">
            <span _ngcontent-c13="" class="text-500 f-size-13 pad-b-5"><?php echo $datapromocode['Code']?> </span>
            <p class="f-size-11 pad-t-5 pad-l-15 text-400">Flat <?php echo $datapromocode['Percentage'];?>% Off </p>
            
           </label>
          </p>
        	
          <?php }}?>
      </div>
    </div>

    
  </div>
  <div _ngcontent-c13="" class="clearfix"></div>

	<?php
			//$sqlsh = "select * from shoppingcart where ShoppingCartID=".$_SESSION['ShoppingCartID'];
//			$ressh = mysqli_query($dbLink,$sqlsh); 
//			$datash = $ressh->fetch_assoc();
//			$datash['CouponDiscount'];
//			
//			$discount_total = ($total * $datash['CouponDiscount'])/100;
//			$after_discount_total = $total - $discount_total;
//			$final_amount = $after_discount_total + 49;
	 
	?>

  <div _ngcontent-c13="" class="product_block pad-tb-15 pad-lr-10 border-t border-b">
    <div _ngcontent-c13="" class="o-hidden pad-tb-5 pad-lr-15">
      <span _ngcontent-c13="" class="f-left inline-block f-size-14">Total Amount</span>
      <span _ngcontent-c13="" class="f-right inline-block text-black f-size-14 total_amount" data-value="<?php echo $total;?>">₹<?php echo $total;?></span>
    </div>

    <div _ngcontent-c13="" class="o-hidden pad-tb-5 pad-lr-15">
      <span _ngcontent-c13="" class="f-left inline-block f-size-14">Shipping</span>
      <!----><span _ngcontent-c13="" class="f-right inline-block text-black f-size-14">₹ 49.00</span>
      <!---->
    </div>
    <div _ngcontent-c13="" class="o-hidden pad-tb-5 pad-lr-15">
      <span _ngcontent-c13="" class="f-left inline-block f-size-14">Coupon Discount</span>
      <!---->
      <!----><span _ngcontent-c13="" class="f-right inline-block text-black f-size-14 dis_amount" data-value="">₹ 0</span>
    </div>
    <!---->
  </div>
  <!----><div _ngcontent-c13="" class="o-hidden pad-b-5 pad-t-25 pad-lr-20">
    <span _ngcontent-c13="" class="f-left inline-block f-size-16 b-text">Total Amount</span>
    <span _ngcontent-c13="" class="f-right inline-block b-text f-size-16 final_amount">₹<?php echo $final_amount = $total + 49;?></span>
  </div>
  <!---->
</div></order-summary>
            </div>

        </div>
    </div>
    
    <!---->
    <!---->
</div></quick-order>
</div>
<?php 

	} else{?>
		<div class="container-fluid" style="margin-top: 0px;">
  <router-outlet></router-outlet><quick-order>
<div class="pad-t-xs-5">
    
 
    
 	 <div class="container-fluid mar-tb-10 cont_shopping">
        <div class="row bg-white pad-tb-30 box-shadow">
            <div class="col-sm-12 text-center">
                <div class="wp-100 o-hidden mar-t-40">
                    <img class="" src="https://cdnx1.moglix.com/web/dist1/assets/img/empty_cart.svg">
                </div>
                
               
                <button class="btn btn-red text-white mar-tb-30 f-size-16 w-225 text-500 continue_btn" tabindex="0">Continue Shopping </button>

                <ul class="no-list-style no-margin no-padding wp-100 o-hidden cart-page-image">
                
                	<?php 
		$sqlcat = "select * from category where Status=1 ORDER BY DisplayOrder limit 5";
		$rescat= mysqli_query($dbLink,$sqlcat)or die('could not select Category');
		while($datacat=$rescat->fetch_assoc()){
	
	?>
    <li class="inline-block text-center pad-tb-10 f-left pointer">
                            <i class="empty-cart-cate icon-power-tools"></i>
                        <?php 
               $cname = strtolower(str_replace(" ","-",$datacat['CategoryName']));
               ?>
                        <a class="block max-w-150 f-size-14  f-size-xs-13 text-center center-block lh-20 pointer pad-t-10" href="<?php echo $frontpath;?>/category/<?=$cname?>"><?php echo $datacat['CategoryName'] ?></a>
                    </li>
    <?php }?>

                   
                    <li class="inline-block text-center pad-tb-10 f-left pointer">
                            <i class="empty-cart-cate icon-view_all_categpries" style="line-height:50px;">...</i> 
                        
                        <a class="block max-w-150 f-size-14  f-size-xs-13 text-center center-block lh-20 pointer pad-t-10" href="http://glorywebsdev.com/ecommerce/all-categories.php">more</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    
  
</div></quick-order>
</div>
<?php }	
}else{?>
	
    <div class="container-fluid" style="margin-top: 0px;">
  <router-outlet></router-outlet><quick-order>
<div class="pad-t-xs-5">
    
 
    
 	 <div class="container-fluid mar-tb-10 cont_shopping">
        <div class="row bg-white pad-tb-30 box-shadow">
        	<div class="wp-85 wp-xs-100 center-block">
            <div class="col-sm-12 text-center">
                <div class="wp-100 o-hidden mar-t-40">
                    <img class="" src="<?php echo $frontpath;?>/images/empty_cart.svg">
                </div>
                
               
                <button class="btn btn-red text-white mar-tb-30 f-size-16 w-225 text-500 continue_btn" tabindex="0">Continue Shopping </button>

                <ul class="no-list-style no-margin no-padding wp-100 o-hidden cart-page-image">
                
                	<?php 
		$sqlcat = "select * from category where Status=1 and parent=0 ORDER BY DisplayOrder limit 5";
		$rescat= mysqli_query($dbLink,$sqlcat)or die('could not select Category');
		while($datacat=$rescat->fetch_assoc()){
	
	?>
    <?php $cname = strtolower(str_replace(" ","-",$datacat['CategoryName'])); 
          			if (strpos($cname,'&') !== false) { 
						$cname = str_replace('&', 'and', $cname); 
					}
		  	?>
    <li class="inline-block text-center pad-tb-10 f-left">
     <i class="icon-<?php echo $cname;?>"></i>
                            
                        <?php 
               $cname = strtolower(str_replace(" ","-",$datacat['CategoryName']));
               ?>
                        <a class="block max-w-150 f-size-14  f-size-xs-13 text-center center-block lh-20 pointer pad-t-10" href="<?php echo $frontpath;?>/category/<?=$cname?>"><?php echo $datacat['CategoryName'] ?></a>
                    </li>
    <?php }?>

                   
                    <li class="inline-block text-center pad-tb-10 f-left pointer">
                            <i class="empty-cart-cate icon-view_all_categpries" style="line-height:50px;">...</i> 
                        
                        <a class="block max-w-150 f-size-14  f-size-xs-13 text-center center-block lh-20 pointer pad-t-10" href="http://glorywebsdev.com/ecommerce/all-categories.php">more</a>
                    </li>
                </ul>
            </div>
            </div>
        </div>
    </div>
    
    
  
</div></quick-order>
</div>		

<?php }?>
   
   
   
<?php require_once('footer.php');?>
<style>
.back-to-top{display:none !important;}</style>