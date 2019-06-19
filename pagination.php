<?php
/*require_once('db.php');

header("Content-type: text/javascript");

$limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 

if($_GET['sorting']=='low'){ $shorting = 'ASC';}
else if($_GET['sorting']=='heigh'){ $shorting = 'DESC';}
else{$shorting = 'ASC';}

if(empty($_GET["catid"]) ){$catid = $_POST["catid"];}else{$catid = $_GET["catid"];}

if(isset($_GET['sorting'])){											
	
	$selectproduct = "select * from product where CategoryID IN (select CategoryID from category where parent = ".$catid." ) ORDER BY Price ".$shorting." LIMIT $start_from, $limit";

	
	
}else{
	
	
	$selectproduct = "select * from product where CategoryID IN (select CategoryID from category where parent = ".$catid." ) ORDER BY ProductName ASC LIMIT $start_from, $limit";

	
}
$resproduct = mysqli_query($dbLink,$selectproduct)or die('could not select product');
if(mysqli_num_rows($resproduct)>0){
while($dataproduct=$resproduct->fetch_assoc()){

?>

                                     
<div class="no-padding pad-lr-5 prod_grid pad-lr-xs--0 no-margin-xs ng-tns-c16-5 ng-trigger ng-trigger-fade ng-star-inserted">
  
  <a class="hidden-sm-down" target="_blank" href="#">
    <div class="prod_block relative">
      <div class="prod_image pad-lr-15 pad-lr-xs-5">
          <img alt="<?php echo $dataproduct['ProductName'];?>" class="img-fluid ng-tns-c16-5 ng-star-inserted ng-lazyloaded" src="<?php echo $frontpath?>/ProductImage/<?php echo $dataproduct['ImageName']?>" style="">
      </div>
      <div class="prod_name pad-lr-15 pad-lr-xs-5">
          <h4 class="text-blue b-text pad-t-5">
            <?php echo $dataproduct['ProductName'];?>
            
          </h4>
      </div>
      
      <div class="prod_price pad-lr-15 pad-lr-xs-5 ng-tns-c16-5 ng-star-inserted" style="">
      <?php 
          if ($dataproduct['is_deal_pro']==1){?>
         <p class="discount ng-tns-c16-5 ng-star-inserted">
             <?php echo $dataproduct['discount_lable'].'% OFF';?>
         </p>
         <h5 class="no-margin no-padding f-size-12 line-through ng-tns-c16-5 ng-star-inserted"><?php echo '₹'.$dataproduct['Price']?></h5>
       <h3 class="no-margin no-padding pad-t-5 f-size-20 f-size-xs-18 text-500"><?php echo '₹'.$dataproduct['SalePrice']?></h3>
            
          
          <?php }else{?>
          <h3 class="no-margin no-padding pad-t-5 f-size-20 f-size-xs-18 text-500"><?php echo '₹'.$dataproduct['Price']?></h3>
          <?php }?>
     
      </div>
      <div class="prod_detail pad-t-3 pad-b-15 pad-lr-10 pad-lr-xs-5">
        <ul class="no-margin no-padding pad-lr-5">
          <li class="ng-tns-c16-5 ng-star-inserted" style="">
          
          <?php 
             $sqlbrand = "select * from brand where brandid=".$dataproduct['brandid'];
             $resbrand = mysqli_query($dbLink,$sqlbrand);
             $databrand=$resbrand->fetch_assoc();
            
            
            ?>
              Brand:<b class="text-grey">
              <?php echo $databrand['brandname']?>
              </b>
            </li>
         </ul>
      </div>
    </div>
  </a>
</div>
                                      
                                      
<?php }
}
?>
                                     */                                      
