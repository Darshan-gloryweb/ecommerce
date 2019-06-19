<?php

require_once('db.php');

header("Content-type: text/javascript");

$_POST['cat_id'];
if($_POST['sorting']=='low'){ $shorting = 'ASC';}else{$shorting = 'DESC';}

?>


                                        
                                        
<?php 
$aa = "select CategoryID from category where parent in (select CategoryID from category where parent='".$_POST['cat_id']."') or parent ='".$_POST['cat_id']."'";
$resaa = mysqli_query($dbLink,$aa);
if(mysqli_num_rows($resaa)>0){
	while($dataaa=$resaa->fetch_assoc()){
			
	

echo $selectproduct = "SELECT *
				 FROM product
				  where  CategoryID =".$dataaa['CategoryID']."
				 ORDER BY Price ".$shorting."
				 ";

$resproduct = mysqli_query($dbLink,$selectproduct)or die('could not select product');
if(mysqli_num_rows($resproduct)>0){
while($dataproduct=$resproduct->fetch_assoc()){?>

<?php $productlist ='<product-list class="block mar-t-10 ng-tns-c16-5">
	<div class="row prod_list ng-tns-c16-5 ng-star-inserted" lazy-load-images="" id="product_list">

<div class="no-padding pad-lr-5 prod_grid pad-lr-xs--0 no-margin-xs ng-tns-c16-5 ng-trigger ng-trigger-fade ng-star-inserted">

    <a class="hidden-sm-down" target="_blank" href="#">
        <div class="prod_block relative">
            <div class="prod_image pad-lr-15 pad-lr-xs-5">
            <img alt="'.$dataproduct['ProductName'].'" class="img-fluid ng-tns-c16-5 ng-star-inserted ng-lazyloaded" src="'.$frontpath.'/ProductImage/'.$dataproduct['ImageName'].'" style="">
            </div>
            <div class="prod_name pad-lr-15 pad-lr-xs-5">
            <h4 class="text-blue b-text pad-t-5">
            '.$dataproduct['ProductName'].'
            </h4>
            </div>
			<div class="prod_price pad-lr-15 pad-lr-xs-5 ng-tns-c16-5 ng-star-inserted" style="">';?>
			<?php 
			if ($dataproduct['is_deal_pro']==1){?>
			<?php 
			$productlist.='<p class="discount ng-tns-c16-5 ng-star-inserted">
			'.$dataproduct['discount_lable'].'% OFF
			</p>
			<h5 class="no-margin no-padding f-size-12 line-through ng-tns-c16-5 ng-star-inserted"> 
			₹'.$dataproduct['Price'].'</h5>
			<h3 class="no-margin no-padding pad-t-5 f-size-20 f-size-xs-18 text-500">
			₹'.$dataproduct['SalePrice'].'</h3>';?>
			
			
			<?php }
			
			$productlist.='</div>
        	<div class="prod_detail pad-t-3 pad-b-15 pad-lr-10 pad-lr-xs-5">
			<ul class="no-margin no-padding pad-lr-5">
			<li class="ng-tns-c16-5 ng-star-inserted" style="">';?>
			
			<?php 
			$sqlbrand = "select * from brand where brandid=".$dataproduct['brandid'];
			$resbrand = mysqli_query($dbLink,$sqlbrand);
			$databrand=$resbrand->fetch_assoc();
			
			
			
			$productlist.='Brand:<b class="text-grey">
			'.$databrand['brandname'].'
			</b>
			</li>
			</ul>
			</div>
			</div>
    </a>
</div></div>
</div>';?>



<?php echo $productlist; }}
 }
}

?>

