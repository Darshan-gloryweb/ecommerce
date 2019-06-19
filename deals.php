<?php  require_once('db.php'); ?>

<?php $title = $mywebsitename; ?>

<?php require_once('header-inner.php');?>

<?php 
$sql = "Select * from websetting";

$r = mysqli_query($dbLink,$sql) or die("can not select websetting");

$row = $r->fetch_assoc();
?>

<div class="container-fluid">

  <router-outlet></router-outlet><deals class="ng-star-inserted"><div id="corporate">

<div class="container-fluid bg-white mar-t-20 pad-lr-0  wp-xs-107 mar-l-xs--10 o-hidden">

    <div class="row mar-lr-5">

      <div class="col-sm-12 pad-tb-20">

        <a class="hidden-sm-down" href="<?php echo $row['top_banner_link'];?>">

          <img class="wp-100" src="<?php echo $frontpath;?>/images/<?php echo $row['top_main_banner'];?>">

        </a>

<a class="hidden-sm-up" href="https://www.moglix.com/deals/big-deals">

          <img class="wp-100" src="images/Images_2018-03-31_05-51-29_platinum-banner.jpg">

        </a>

      </div>



    



    <div class="col-sm-12">

          <h3 class="f-size-22 text-400 text-uppercase  text-left pad-t-30 pad-b-5 pad-t-xs-5">Top Picks of the Day</h3>

          <span class="block h-3  bg-red w-200  mar-b-20"></span>

        </div>



  

  <div class="wp-100 o-hidden pad-r-10">

  	<?php

		$sqlpro = "select * from product where is_deal_pro =1 and Status = 1";

		$respro = mysqli_query($dbLink,$sqlpro) or die("can not select brand"); 

		while($datapro=$respro->fetch_assoc()){

			

	?>

	  <div class="col-sm-3 col-xs-6 pad-tb-10 pad-r-5">
		<?php //echo $datapro['ProductID']; 
		
		$pname = strtolower(str_replace(" ","-",$datapro['ProductName'])); ?>
	  <a href="<?php echo $frontpath.'/products/'.$pname ; ?>" class="o-hidden">        

			  <img class="wp-100" src="<?=$frontpath?>/ProductImage/<?php echo $datapro['discountimage'];  ?>">

	  </a>      

		  </div>

	<?php }?>      

  </div>  





      <div class="col-sm-12">

          <h3 class="f-size-22 text-400 text-uppercase text-left pad-t-30 pad-b-5 pad-t-xs-5">Shop by category</h3>

          <span class="block h-3  bg-red w-200 mar-b-20"></span>

        </div>

        <?php

		$sqlcat = "select * from category where is_deal_cat=1 and Status = 1";

		$rescat = mysqli_query($dbLink,$sqlcat) or die("can not select brand"); 

		while($datacat=$rescat->fetch_assoc()){

			

		?>

        
		<?php //echo $datacat['CategoryID'];
			$cname = strtolower(str_replace(" ","-",$datacat['CategoryName']));
		  ?>
		  

              <div class="col-sm-6 pad-tb-20 pad-l-30 pad-lr-xs-0  h-400 h-auto-xs">

              	<a href="<?php echo $frontpath.'/category/'.$cname ; ?>">

                	<img class="wp-100" src="<?=$frontpath?>/CategoryIcon/<?php echo $datacat['discountimage'];  ?>">

              	</a>

              </div>

		<?php }?>

  

   



   <div class="wp-100 o-hidden pad-l-10 pad-r-20 pad-t-30">



        <h3 class="f-size-22 text-400 text-uppercase text-left pad-t-30 pad-b-5 pad-t-xs-5">Shop by Brand</h3>

          <span class="block mar-b-20 h-3 bg-red w-140 mar-b-20"></span>

        

        <?php

		$sqlbrand = "select * from brand where is_deal_brand=1 and Status = 1";

		$resbrand = mysqli_query($dbLink,$sqlbrand) or die("can not select brand"); 

		while($databrand=$resbrand->fetch_assoc()){

			

		?>

        

		  

              <div class="col-xs-4 col-sm-2 pad-tb-10 pad-r-5">

              	<a href="#">

                	<img class="wp-100" src="<?=$frontpath?>/BrandIcon/<?php echo $databrand['ImageName'];  ?>">

              	</a>

              </div>

		<?php }?>

            

     

      

              </div>

    

    

    <div class="col-sm-12 pad-t-20 pad-b-30">

          <h3 class="f-size-22 text-400 text-uppercase text-left pad-t-30 pad-b-5 pad-t-xs-5">SUMMER SALE</h3>

          <span class="block mar-b-20 h-3 bg-red w-150 mar-b-20"></span>

          <a class="hidden-sm-down" href="#">

            <img class="wp-100" src="<?php echo $frontpath;?>/images/<?php echo $row['bottom_main_banner'];?>">

          </a>

		  

		  <a class="hidden-sm-up" href="https://www.moglix.com/deals/made-in-india">

            <img class="wp-100" src="images/Images_2018-03-22_04-49-42_dealsMobile.jpg">

          </a>

		  

        </div>





  

</div>

  

  </div>





</div></deals>

</div>





<?php require_once('footer.php');?>