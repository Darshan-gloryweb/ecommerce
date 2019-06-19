<?php  require_once('db.php'); ?>

<?php include('include/start_session.php'); ?>





<?php



if($_GET['url'])

{

	$_GET['url'];



$url = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1);

$url = str_replace('.php','',$url);

$url=str_replace('-',' ',$url);



//$bb = str_replace('-',' ',$url);



$aa = "select product.*,category.CategoryName,category.CategoryTypeID from product inner join category on product.CategoryID = category.CategoryID  and product.ProductName='".mysqli_real_escape_string($dbLink,$url)."'";



/*$url=$_GET['url'];

$url=str_replace('_',' ',$url);*/

$sql=mysqli_query($dbLink,$aa) or die ('Could Not Select Product');

$rows=$sql->fetch_assoc();

$ctypeid = $rows['CategoryTypeID'];

}

else

{

	echo '404 Not URL Availables.';

}

?>







<?php  $title = $rows['ProductName'].' | '.$mywebsitename; ?>

<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>

<script type="text/javascript" src="<?=$frontpath?>/js/recent_view.js"></script>

<!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->

<link href="<?=$frontpath?>/css/style-prod-single.css" rel="stylesheet">

<link href="<?=$frontpath?>/css/styles.css" rel="stylesheet">

<link href="<?=$frontpath?>/css/responsive.css" rel="stylesheet">

<!-- CSS STYLE-->

<link rel="stylesheet" type="text/css" href="<?=$frontpath?>/css/xzoom.css" media="all" />



<!-- XZOOM JQUERY PLUGIN  -->

<script type="text/javascript" src="<?=$frontpath?>/js/xzoom.min.js"></script>

<script type="text/javascript" src="<?=$frontpath?>/js/item-custom.js"></script>



<input type="hidden" name="pro_id" value="<?php echo $rows['ProductID'];?>">

<?php

               $sqlnumreview = "select * from customerreview where productid =".$rows['ProductID'];

              $resnumreview = mysqli_query($dbLink,$sqlnumreview);

              

				if(mysqli_num_rows($resnumreview)>0){

					$numreview = mysqli_num_rows($resnumreview);

				}else{

					$numreview =0;

				}

              $aa = "SELECT SUM(ratings) AS value_sum FROM customerreview where productid =".$rows['ProductID'];



              $resultaa = mysqli_query($dbLink,$aa); 

			  if(mysqli_num_rows($resultaa)>0){

					 $rowaa = $resultaa->fetch_assoc();

					  $sumaa = $rowaa['value_sum'];

					  if($sumaa>0 && $numreview>0){  

						$avg = $sumaa/$numreview;

					  }else{

						$avg = 0;

					  }

				}else{

					

				}

              

            ?>

 <div class="container-fluid pad-lr-md-0">

  <router-outlet></router-outlet>

  <product>

     <loader _nghost-c5="">

        <!---->

     </loader>

     <section class="container-fluid mar-b-10 prod_desc pad-lr-30 no-pad-xs pad-t-xs-5 mar-lr-xs--15 display-block item-container" style="overflow: hidden;">

        <div class="row border-b hidden-xs-down">

           <breadcrump class="" _nghost-c6="">

           

              <ul _ngcontent-c6="" class="bread-head no-margin hidden-sm-down">

                 <li _ngcontent-c6="" class="f-size-12" tabindex="0"><a href="<?=$frontpath?>/index.php" title="Home">Home </a></li>

                 <!---->

                 <li _ngcontent-c6="" class="item f-size-12"><a href="<?=$frontpath?>/all-categories.php" title="All Categories">All Categories</a></li>

                 <li _ngcontent-c6="" class="item f-size-12"><a href="<?=$frontpath?>/category/<?=str_replace(' ','_',$rows['CategoryName'])?>" title="<?=html_entity_decode(stripslashes($rows['CategoryName']))?>">

          <?=$rows['CategoryName']?>

          </a></li>

                 <li _ngcontent-c6="" class="item f-size-12"><?=$rows['ProductName']?></li>

                 

              </ul>

           </breadcrump>

        </div>

        



        

        <div class="row product_block center-block-xs bg-white pad-tb-30 pad-b-xs-0 box-shadow wp-xs-99">

        	<div class="col-sm-4 prod-image-block" id="leftElement">

            <!---->

            <div class="tiles pad-tb-30 pad-b-xs-0">

                <!---->

                <!----><!---->

                	<img class="img-fluid center-block prodZoomImage xzoom" data-imagezoom="true" data-target="#zoomModal" data-toggle="modal" id="xzoom-default" alt="" src="<?=$frontpath?>/ProductImage/<?=$rows['ImageName']?>"  xoriginal="<?=$frontpath?>/ProductImage/<?=$rows['ImageName']?>"  />

                  

                

                <!---->

                <!---->

                    <!---->

                

                                

                <!---->

                    <owl-carousel class="prodImageCarausel prodImageCarausel_caption block mar-t-15 pad-t-30 pad-lr-10 bottom-thumb" id="prodImageCarausel_caption"><owl-carousel-child class="owl-theme sliding owl-carousel owl-loaded owl-drag" style="display: block;">

                        

                        <!---->

                    <div class="owl-stage-outer recent-outer">

                    	<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 341px;">

                    

                    	

                             

                            

                            <?php 

                               $sqlgimg = "select * from productimage where ProductID=".$rows['ProductID']." ";

                                    $resgimg = mysqli_query($dbLink,$sqlgimg);

                                    if(mysqli_num_rows($resgimg)>0)

                                    {

                                      $counter = 1;

                                        while($datagimg = $resgimg->fetch_assoc())

                                      {  

									  

									   if($counter <= 1){?>

                                       <div class="owl-item active" style="width: 67.2px; margin-right: 1px;">

                                        <div class="item pointer " >

                                          <a href="<?=$frontpath?>/ProductImage/<?=$rows['ImageName']?>">

                           <img class="item-gal" src="<?=$frontpath?>/ProductImage/<?=$rows['ImageName']?>"  xpreview="<?=$frontpath?>/ProductImage/<?=$rows['ImageName']?>" ></a>

                           <!---->

                        </div></div>

                                      

                                       

       									<?php } ?>

                                        <div class="owl-item active" style="width: 67.2px; margin-right: 1px;"><div class="item pointer " >

                                          <a href="<?php echo $frontpath.'/ProductGallery/'.$datagimg['imagename']?>">

                                       <img class="item-gal" src="<?php echo $frontpath.'/ProductGallery/'.$datagimg['imagename']?>" >

                                     </a>

                                       </div></div>

       									<?php 

									  		$counter++;

									  }  

                                    }

                            ?>

                            

                    	</div>

                    </div>

                        

                        

                        

                        <div class="owl-nav disabled"><div class="owl-prev disabled">&lt;</div><div class="owl-next disabled">&gt;</div></div><div class="owl-dots disabled"></div></owl-carousel-child></owl-carousel>

                





                <!----><div class="shoe_opt o-hidden mar-t-15">

                    <ul class="no-list-style no-padding no-margin shoe_property">

                        

                        <!----><!---->

                            <!----><!---->

                                <!----><li class="Chemical Resistant"></li>

                            <!---->

                                <!----><li class="Toe Type"></li>

                            <!---->

                                <!----><li class="Oil Resistant"></li>

                            <!---->

                                <!----><li class="Impact Resistant"></li>

                            <!---->

                                <!----><li class="Antiskid"></li>

                            

                       

                            

                        

                    </ul>

                </div>



                <p class="text-center f-size-14 text-500 hidden-sm-down mar-t-15 res-hide"><i class="fa fa-search-plus"></i> Hover to Zoom</p>

            </div>

        </div>

        

        

	       

           <div class="col-sm-8 left-border pad-r-xs-15 res-product-blocks">

              <div class="row">

                 <div class="col-md-7 full-width-tab">

                 	

                    <div class=" ">

                       <!---->

                       <h1 class="f-size-20 text-black text-400 pad-b-5">

                          <?php echo $rows['ProductName'];?>

                       </h1>

                    </div>

                    <div class="prod_review o-hidden mar-t-xs-10">

                       <!----><span class="rating_box pointer bg-green f-left f-size-10 text-500 inline-block text-white pad-l-5 pad-t-5 mar-r-10" id="showAllRatings"><?php printf('%.1f', $avg);?> <i class="star-icon" style="font-size: 10px !important;"></i>

                       </span>

                       <!----><span class="mar-r-10 f-size-14 inline-block mar-t-5 f-size-xs-14 text-green pad-b-5 text-500">

                       <?php if($rows['Status'] == 1){echo "IN STOCK";}else{echo "NOT IN STOCK";} ?>

                       </span>

                       <!---->

                       <!---->

                       <!---->

                    </div>

                    <!---->

                    <div class="clearfix"></div>

                    <!---->

                    <div class="prod_description container-fluid no-padding pad-lr-xs-15">

                       <div class="row">

                          <!---->

                          <div class="col-sm-12 col-md-12">

                             <div class="row pad-tb-15">

                                <div class="col-md-12 col-sm-8 pad-lr-xs-0">

                                   <div class="prod_price_block o-hidden pad-tb-5">

                                      <!----><span class="f-left inline-block f-size-28 text-black pad-r-10 f-size-xs-22 text-500">

                                      <?php if ($rows['is_deal_pro']==1){

										  		echo '₹'.$rows['SalePrice'];

												echo '<input type="hidden" name="price_pro" value='.$rows['SalePrice'].' />';

									  		}

                                            if($rows['is_deal_pro']==0){

												echo '₹'.$rows['Price'];

												echo '<input type="hidden" name="price_pro" value='.$rows['Price'].' />';

											}



                                      ?>

                                      </span>

                                      <!---->

                                      <?php 

                                      if ($rows['is_deal_pro']==1){?>

                                      <!----><span class="f-left inline-block f-size-14 f-size-xs-13 text-grey" style="text-decoration: line-through;">

                                        <?php echo '₹'.$rows['Price']?>

                                        

                                      </span>

                                      <!----><span class="f-left inline-block f-size-12 text-500 pad-l-10 f-size-xs-13 text-green">

                                      <?php echo '['.$rows['discount_lable'].'% OFF ]';?>

                                     

                                      </span>

                                      <?php }?>

                                      

                                   </div>

                                   <p class="f-size-12 text-400 pad-t-5 pad-b-10  mar-b-xs-15">( Price inclusive of all taxes )</p>

                                   <!---->

                                   <div class="attribute_fieldset tablecombz-quantity-wanted clearfix" id="quantity_wanted_p">

                                      <label class="inline-block f-left pad-r-5 pad-t-5 pad-t-xs-15 text-500">Update Qty:

                                      </label>

                                      

                                      <div class="quantity_wanted_input mar-lr-10 mar-lr-xs-0 inline-block f-left mar-t-xs-10">

                                      

                                         <div class="new_quantity_add f-left mar-r-10 border-r-3 o-hidden">

                                        

                                      <div class="input-group">

                                                <span class="input-group-btn">

                                                    <button type="button" class="btn btn-default btn-number btn-qty" disabled="disabled" data-type="minus" data-field="quant[1]">

                                                        <span class="glyphicon glyphicon-minus minus-icon"></span>

                                                    </button>

                                                </span>

                                                <input type="text" name="quant[1]" class="form-control input-number cart_quantity_input text inline-block mar-lr-10 h-30 no-border pad-lr-5 text-center mar-l-xs-0 mar-r-xs-10 w-80 mar-r-xs-10" value="1" min="1" max="1000" style="width: 40px !important;margin-right: 2px !important;margin-left: 2px !important;">

                                                <span class="input-group-btn">

                                                    <button type="button" class="btn btn-default btn-number btn-qty1" data-type="plus" data-field="quant[1]">

                                                        <span class="glyphicon glyphicon-plus minus-icon"></span>

                                                    </button>

                                                </span>

                                            </div>

                                         

										</div>



                                         <div class="o-hidden">

                                            <p class="qty-text inline-block f-left f-size-11 f-size-xs-12 text-grey text-400 no-margin">Qty Per Pack : 1 Piece

                                            </p>

                                            <div class="clearfix"></div>

                                            <p class="block f-left f-size-11 f-size-xs-12 text-grey text-400">Min Orderable Qty : 1 Pack</p>

                                         </div>

                                      </div>

                                   </div>

                                </div>

                                <!---->

                                <div class="col-sm-4 col-md-12 pad-lr-xs-0">



                                        



                                        

                                            <!---->

                                            <?php

                                               $sqlqty  = "select * from quantity where ProductID = ".$rows['ProductID']."  ORDER BY minqty ASC" ;

                                              $resqty = mysqli_query($dbLink,$sqlqty);

                                             

												if(mysqli_num_rows($resqty)>0){?>

                                                <div class="bulk_order mar-t-20">

                                            <div class="table_wrap">

                                                <table class="qty_table" border="1">

                                            <tbody><tr>

                                              <th></th>

                                              <th>Quantity</th>

                                              <th>Discount</th>

                                              <th>Price per pack</th>

                                            </tr>

                                              <?php   while($dataqty=$resqty->fetch_assoc()){

                                             

                                             ?>

                                            <tr >

                                              <td>

                                                  <label class="radio_wrap">

                                            <input name="buy_product" type="radio" class="ng-untouched ng-pristine ng-valid qty-radio">

                                            <i></i>

                                            </label>

                                              </td>



                                              <!----><td>

                                              		<input type="hidden" value="<?php echo $dataqty['minqty'];?>-<?php echo $dataqty['maxqty'];?>"  name="max_val_radio"  class="cc"/>

                                                  <?php echo $dataqty['minqty'] .'<span>-'.$dataqty['maxqty'].'</span>';?>

                                                  

                                              </td>

                                              <!---->



                                              <td>

                                                <?php echo $dataqty['qty_discount'];?>

                                                 

                                              </td>

                                              <td>₹<?php echo $dataqty['price'];?></td>

                                            </tr>

                                            <?php }?>

											

											 </tbody></table>

											 </div>



                                        </div>

											<?php }?>

                                           







                                           





                                        

                                    </div>

                                

                             </div>

                             <!---->

                             <div class="row">

                                <div class="col-sm-12 col-md-12 o-hidden mob_fix text-center">

                                  

                                  	<?php /*?><img src="<?php echo $frontpath;?>/images/ajax-loader.gif" class="loder_img" height="100" width="100" /><?php */?>

            						<div class="pad-tb-10 pad-lr-10 text-green b-text mar-lr-25 suc-not">Added To Cart Successfully.</div>

                                    

                                   <button class="btn inline-block mar-r-10 mar-lr-xs-5 btn-red text-white wp-xs-46 text-500 cartbtn cartbtn" style="font-size: 16px;">ADD TO CART

                                   </button>

                                   <a href="<?php echo $frontpath;?>/cart.php" class="btn inline-block btn-green text-white wp-xs-46 mar-lr-xs-5 text-500 buybtn" style="padding-top: 10px;" >BUY NOW</a>

                                  

                                </div>

                             </div>

                          </div>

                           <div class="col-md-12 pad-lr-xs-0 pad-tb-15">

                           <h3 class="f-size-16 text-500 text-uppercase no-margin pad-lr-xs-15">Key Features

                                </h3>

                                <!----><div class="row center-block-xs pad-tb-10 wp-xs-99 key_feature">

                                    <div class="col-sm-12">

                                         <?php echo html_entity_decode(stripslashes($rows['pro_key_feature']));?>

                                    </div>

                                </div>                             

                           

                          </div>

                          <div class="col-md-12 pad-lr-xs-0">

                             <!----><!---->

                             <h3 class="f-size-16 pad-tb-10 text-uppercase no-margin mar-t-20 text-500" id="product-spec">Product Specifications</h3>

                             <div class="row center-block-xs pad-tb-15 wp-xs-99">

                                <div class="col-sm-12 pad-lr-xs-0">

                                  <?php 

                                     $sqlbrand = "select * from brand where brandid=".$rows['brandid'];



                                    $resbrand = mysqli_query($dbLink,$sqlbrand);

                                    $databrand=$resbrand->fetch_assoc();

                                    

                                    

                                    ?>

                                  <input type="hidden" name="pro_brand" value="<?php echo $databrand['brandname'];?>">

                                   <?php echo html_entity_decode(stripslashes($rows['pro_specification']));?>

                                </div>

                             </div>

                          </div>

                       </div>

                    </div>

                    

                 </div>

                

                 <div class="col-md-5 full-width-tab">

                                    <div class="row">

                                       <div class="col-md-12 pad-t-40">

                                          <div class="">

                                             <!---->

                                             <div class="relative f-size-13 pad-b-5 text-500 pad-r-10 dis_table">

                                                Check delivery and payment options

                                                <button class="ques_btn relative right--5 border border-r-5" data-placement="top" data-toggle="tooltip" disabled="">?

                                                </button>

                                                <p class="hover_text hover_tooltip absolute w-200 bg-black text-white pad-lr-10 pad-tb-10 f-size-10 border-r-6">

                                                   *Shipping charge applicable as per serviceability<br>

                                                   * COD payment upto ₹10000<br>

                                                   * 7 days free return, Bulk 

                                                   Orders (greater than 10) &amp; heavy items are shipped through surface 

                                                   &amp; may take more

                                                   than 10 days for delivery.<br>

                                                </p>

                                             </div>

                                          </div>

                                          <div class="clearfix">

                                             <!---->

                                             <div class="product_pin mar-b-5 relative mar-tb-xs-15 f-left wp-xs-100">

                                                <form class="zip-code clearfix relative ng-untouched ng-pristine ng-invalid" novalidate="">

                                                   <input class="form-control ng-untouched ng-pristine ng-invalid" formcontrolname="pincode" placeholder="Your Pincode" type="text">

                                                   <span class="input-group-addon text-white bg-darkgrey w-40 pointer check-btn">Check</span>

                                                   <!---->

                                                </form>

                                                <!---->

                                             </div>

                                             <!---->

                                             <div class="delivery_time no-padding f-right">

                                                <!---->

                                                <p class="f-size-12 text-grey"><span class="text-grey">Delivery : </span> 4-7 Days

                                                </p>

                                             </div>

                                          </div>

                                          <!---->

                                          <div class="clearfix">

                                             <p class="f-size-12">

                                                <span class="text-grey">Shipping charge applicable as per serviceability</span>

                                             </p>

                                          </div>

                                          <div class="clearfix">

                                          </div>

                                       </div>

                                    </div>

                                    <!---->

                                    <div class="border-dash text-center bg-lightYellow wp-100 mar-t-20 inline-block mar-tb-xs-15 mar-b-20">

                                       <div class="product-desc pad-tb-20 pad-lr-15 text-center">

                                          <p class="text-center b-text f-size-13 text-500">Want to buy even more quantity?</p>

                                          <!----><button class="wp-95 inline-block mar-t-10 btn bg-blue text-white f-none f-size-13 text-500 h-40 f-size-15 text-500" data-target="#oosModal" data-toggle="modal" type="button">GET BULK QUOTE NOW</button>

                                          <!---->

                                       </div>

                                    </div>

                                    <!---->

                                    <div class="col-sm-12 col-md-12 bg-lightYellow border-dash mar-b-30">

                                       <!---->

                                       <div class=" pad-tb-15">

                                          <div class="">

                                             <h3 class="f-size-13 text-darkblue pad-t-xs-10"><b class="text-black ">OFFERS</b></h3>

                                          </div>

                                       </div>

                                       <div class="pad-tb-15">

                                          <!---->

                                          <div class="hidden-sm-down text-center hidden-sm-up input-group pad-t-10 text-right text-left-xs pad-r-15 res-hidden">

                                             <span class="block f-size-16 wp-xs-100 text-blue" data-target="#emiModal" data-toggle="modal">

                                             View EMI Options

                                             </span>

                                             <span class="inline-block f-size-12 pad-t-5 text-grey f-center-xs wp-xs-100">*On min. purchase of ₹3000</span>

                                          </div>

                                          <!---->

                                          <div class="emi-text clearfix pad-b-15 ">

                                             <div class="f-left">

                                                <div class="clearfix">

                                                   <span class="block text-500 f-size-13 f-left-xs wp-xs-100 text-left-xs">EMIs Available

                                                   <a class="text-blue inline-block" data-target="#emiModal" data-toggle="modal" href="">

                                                   View Plans

                                                   </a>

                                                   </span>

                                                </div>

                                                <div class="clearfix">

                                                   <span class="inline-block f-size-10 text-grey f-left-xs wp-xs-100 text-left-xs pad-l-xs-0">On min. purchase of ₹3000</span>

                                                </div>

                                             </div>

                                          </div>

                                          <div class="emi-text clearfix pad-t-5 border-t-d">

                                             <p class="mar-tb-10 f-size-13 text-500">

                                                Get GST Compliant

                                                <a class="getGst text-blue text-uppercase text-400" href="http://www.greengst.com/" target="_blank">Click here</a>

                                             </p>

                                          </div>

                                          <div class="clearfix"></div>

                                       </div>

                                    </div>

                                 </div>

                

              </div>

              <div class="clearfix"></div>

              <div class="center-block-xs pad-b-20 pad-lr-0 wp-xs-99 prod_info">

                <!----><h3 class="f-size-16 pad-tb-10 text-500 pad-lr-xs-0 text-uppercase">

                Product Information</h3>

                <div class="f-size-13 show-read-more">

                    <?php echo html_entity_decode(stripslashes($rows['Description']));?>

                </div>

            </div>

              

           </div>

           

           

           <div class="col-sm-12">

           </div>

        </div>

        

		<div id="bottomElement">

           <div class="container-fluid no-padding display-block">

              <div class="pad-t-20">

                 <div class="row pad-lr-xs-15 bg-white">

                    <h3 class="f-size-16 pad-tb-25 pad-lr-15 similar text-500 text-uppercase no-margin pad-lr-xs-15 display-block">Similar Products</h3>

                      <owl-carousel class="similar-product block">

                       <owl-carousel-child class="owl-carousel owl-loaded owl-drag" style="display: block;">

                          <!---->

                          <div class="owl-stage-outer recent-outer">

                             <div class="owl-stage item_pro_slider" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1547px;">

                    <?php  



                        $psql = "select * from product where CategoryID=".$rows['CategoryID']." and ProductID not in (".$rows['ProductID'].")order by rand() limit 10";

                        $pres=mysqli_query($dbLink,$psql) or die('could not select');

                    ?>

        <?php

  if(mysqli_num_rows($pres)>0)

  {

    $i = 0;

      while($pdata = $pres->fetch_assoc())

    {

          $i++;

      ?>

      

     	 <div class="owl-item <?php if($i == 1){echo 'active';}?>" style="width: 257.8px;">

       <div class="item">

          <div class="item similar-product-item">

             <div class="product_block_container pad-tb-20 pad-lr-20 pad-lr-xs-5" id="productOuter inner-product-outer">

             <?php  $pname = strtolower(str_replace(" ","-",$pdata['ProductName']));?>



				

               	 <div class="product_block pointer">

                   <div class="img_block">

                   <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

                    <img class="img-responsive" alt="" src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>">

                    

                      </a>

                   </div>

                   <div class="prod_name pad-lr-15 pad-b-10 pad-lr-xs-5">

                      <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

                         <h2 class="text-blue f-size-13 lh-16 text-400 text-left pad-t-5"><?=substr(html_entity_decode(stripslashes($pdata['ProductName'])),0,20)?></h2>

                      </a>

                   </div>

                   <div class="prod_price text-left pad-lr-15 relative pad-lr-xs-5">

                      <!---->



                      <?php 

                      if ($pdata['is_deal_pro']==1){?>

                      <p class="discount bg-green absolute top-0 right-0 text-white f-size-11 pad-tb-5 pad-lr-5 text-500 box-shd"><?php echo $pdata['discount_lable'];?>% OFF</p>

                      <!---->

                      <h5 class="no-margin no-padding f-size-12 line-through text-grey">

                         <?php echo '₹'.$pdata['Price'];?>

                      </h5>

                      <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 

                         <?php echo '₹'.$pdata['SalePrice'];?>



                      </h3>



                      <?php }else{?>



                      <!---->

                     

                      <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 

                       <?php echo '₹'.$pdata['Price'];?>



                      </h3>



                      <?php }?>

                      

                   </div>

                   <div class="prod_detail pad-t-5 pad-b-10 pad-lr-10 pad-lr-xs-5">

                      <ul class="no-margin no-padding pad-lr-5 no-list-style no-padding-sm">

                         <!----><!---->

                         <!---->

                         <li class="f-size-13 text-darkgrey text-left">

                            

                              <?php 

                                 $sqlbrand = "select * from brand where brandid=".$pdata['brandid'];



                                    $resbrand = mysqli_query($dbLink,$sqlbrand);

                                    $databrand=$resbrand->fetch_assoc();



                                    echo 'Brand:<b class="text-grey">'.$databrand['brandname'].'</b>';

                              ?>

                         </li>

                         <!---->

                         <!---->

                         <!---->

                         <!---->

                      </ul>

                   </div>

                </div>

                

             </div>

          </div>

       </div>

    </div>

     

    <?php }}?>

        

  

                          </div>

                          <!-- <div class="owl-nav">

                             <div class="owl-prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

                             <div class="owl-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                          </div> -->

                          </div>

                          <div class="owl-dots">

                             <div class="owl-dot active"><span></span></div>

                             <div class="owl-dot"><span></span></div>

                          </div>

                       </owl-carousel-child>

                    </owl-carousel>

                 </div>

              </div>

           </div>

        </div>

        

        

                        

         <div class="row bg-white pad-lr-30" id="reviewsAll">

           <div class="pad-tb-20 cust_review text-golden wp-xs-99 mar-t-20 clearfix border-dark-b">

              <div class="col-md-12 no-padding">

                 <h3 class="f-size-16 text-500 pad-tb-10 text-uppercase no-margin pad-lr-xs-15">CUSTOMER REVIEWS</h3>

                 <h3 class="f-size-16 text-400 pad-t-10 pad-b-40 pad-lr-xs-15 pad-b-xs-5 lh-22">Customer Reviews on <?php echo $rows['ProductName']?>

                 </h3>

              </div>

              <!---->



              

              



              <div class="col-sm-6 border-darkblack-r no-border-xs res-reviews">

                 <div class="row">

                    <div class="col-xs-12 col-sm-5">

                       <div class="rating-container  mar-b-xs-30" style="position:relative">

                          <i aria-hidden="true" class="fa fa-star text-grey text-golden text-center f-size-100 mar-b-xs-10 aver-rat">

                          <small class=""><?php printf('%.1f', $avg);?></small>

                          </i>

                          <p class="f-size-13 lh-20 max-w-125 text-center center-block mar-tb-10">Average rating based on <?php echo $numreview; ?> ratings</p>

                       </div>

                    </div>

                    <div class="col-xs-12 col-sm-7 no-padding-sm">

                       <div class="col-xs-12 col-sm-7 col-md-12 no-padding-sm">

                          <div class="rating_process_wrap pad-l-xs-40">

                             <div class="mar-b-10 clearfix relative">

                                <span class="absolute left--30 f-size-12">5 <i class="fa fa-star text-grey text-grey"></i></span>

                                <?php 

                                  $sql5rat = "SELECT * FROM customerreview where productid =".$rows['ProductID']." and ratings =5 and status =1";

                                  $res5rat = mysqli_query($dbLink,$sql5rat); 

                                  $data5rat = mysqli_num_rows($res5rat);

								  if($numreview>0){

								  	$barwidth5 = (100*$data5rat)/$numreview;

								  }else{$barwidth5 = 0;}

                                ?>

                                

                                <div class="rating_bar rate-5 col-md-10 col-xs-10">

                                   <span class="bg-green" style="width: <?php echo $barwidth5;?>%;"></span>

                                </div>

                                <span class="col-md-2 f-size-13 text-500 col-xs-2 absolute">

                                <?php  echo $data5rat = mysqli_num_rows($res5rat);?>

                                

                                </span>

                             </div>

                             <div class="mar-b-10 clearfix relative">

                                <span class="absolute left--30 f-size-12">4 <i class="fa fa-star text-grey text-grey"></i></span>

                                <?php 

                                  $sql4rat = "SELECT * FROM customerreview where productid =".$rows['ProductID']." and ratings =4 and status =1";

                                  $res4rat = mysqli_query($dbLink,$sql4rat); 

                                  $data4rat = mysqli_num_rows($res4rat);

								  if($numreview>0){

								  	$barwidth4 = (100*$data4rat)/$numreview;

								  }else{$barwidth4 = 0;}

                                ?>

                                <div class="rating_bar rate-4 col-md-10 col-xs-10">

                                   <span class="bg-l-green" style="width: <?php echo $barwidth4;?>%;"></span>

                                </div>

                                <span class="col-md-2 f-size-13 text-500 col-xs-2 absolute">

                                  <?php echo $data4rat = mysqli_num_rows($res4rat);?>

                                

                                </span>

                             </div>

                             <div class="mar-b-10 clearfix relative">

                                <span class="absolute left--30 f-size-12">3 <i class="fa fa-star text-grey text-grey"></i></span>

                                <?php 

                                  $sql3rat = "SELECT * FROM customerreview where productid =".$rows['ProductID']." and ratings =3 and status =1";

                                  $res3rat = mysqli_query($dbLink,$sql3rat); 

                                  $data3rat = mysqli_num_rows($res3rat);

								  if($numreview>0){

								  	$barwidth3 = (100*$data3rat)/$numreview;

								  }else{$barwidth3 = 0;}

                                ?>

                                <div class="rating_bar rate-3 col-md-10 col-xs-10">

                                   <span class="bg-yellow" style="width: <?php echo $barwidth3;?>%;"></span>

                                </div>

                                <span class="col-md-2 f-size-13 text-500 col-xs-2 absolute">

                                  <?php  echo $data3rat = mysqli_num_rows($res3rat);?>

                                

                                </span>

                             </div>

                             <div class="mar-b-10 clearfix relative">

                                <span class="absolute left--30 f-size-12">2 <i class="fa fa-star text-grey text-grey"></i></span>

                                 <?php 

                                  $sql2rat = "SELECT * FROM customerreview where productid =".$rows['ProductID']." and ratings =2 and status =1";

                                  $res2rat = mysqli_query($dbLink,$sql2rat); 

                                  $data2rat = mysqli_num_rows($res2rat);

								  if($numreview>0){

								  	$barwidth2 = (100*$data2rat)/$numreview;

								  }else{$barwidth2 = 0;}

                                ?>

                                <div class="rating_bar rate-2 col-md-10 col-xs-10">

                                   <span class="bg-orange" style="width: <?php echo $barwidth2;?>%;"></span>

                                </div>

                                <span class="col-md-2 f-size-13 text-500 col-xs-2 absolute">

                                  <?php echo $data2rat = mysqli_num_rows($res2rat);?>

                                

                                </span>

                             </div>

                             <div class="mar-b-10 clearfix realtive">

                                <span class="absolute left--15 left-xs-10 f-size-12">1 <i class="fa fa-star text-grey"></i></span>

                                <?php 

                                  $sql1rat = "SELECT * FROM customerreview where productid =".$rows['ProductID']." and ratings =1 and status =1";

                                  $res1rat = mysqli_query($dbLink,$sql1rat); 

                                  $data1rat = mysqli_num_rows($res1rat);

								  if($numreview>0){

								  $barwidth1 = (100*$data1rat)/$numreview;

								  }else{$barwidth1 = 0;}

                                ?>

                                <div class="rating_bar rate-1 col-md-10 col-xs-10">

                                   <span class="bg-red" style="width: <?php echo $barwidth1;?>%;"></span>

                                </div>

                                <span class="col-md-2 f-size-13 text-500 col-xs-2 absolute">

								<?php 

                                  

                                  echo $data1rat = mysqli_num_rows($res1rat);

                                ?></span>

                             </div>

                          </div>

                       </div>

                    </div>

                 </div>

              </div>

              <!---->

              <div class="col-sm-6 pad-lr-30 pad-lr-xs-20 pad-b-20 write_review text-center-xs res-reviews">

                 <h5 class="f-size-17 pad-tb-15 text-400 text-center-xs pad-tb-xs-15 lh-22">Share Your Thoughts With Other Customers

                 </h5>

                 <p class="f-size-14 text-center-xs">Rate the Product</p>

                 <div class="o-hidden pad-tb-10 pad-tb-xs-10 pull-left mar-r-15 no-padding text-center-xs wp-xs-100">

                    <rating class="f-left f-none-xs ng-untouched ng-pristine ng-valid" style=" padding-top: 3px;" _nghost-c7="">

                       <span _ngcontent-c7="" aria-valuemin="0" class="rating" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="0">

                          <!----><span _ngcontent-c7="">

                          <i _ngcontent-c7="" data-icon="★" class="star-icon half0" title="1">☆</i>

                          </span><span _ngcontent-c7="">

                          <i _ngcontent-c7="" data-icon="★" class="star-icon half-100" title="2">☆</i>

                          </span><span _ngcontent-c7="">

                          <i _ngcontent-c7="" data-icon="★" class="star-icon half-200" title="3">☆</i>

                          </span><span _ngcontent-c7="">

                          <i _ngcontent-c7="" data-icon="★" class="star-icon half-300" title="4">☆</i>

                          </span><span _ngcontent-c7="">

                          <i _ngcontent-c7="" data-icon="★" class="star-icon half-400" title="5">☆</i>

                          </span>

                       </span>

                    </rating>

                    <!---->

                 </div>

                 <?php if(isset($_SESSION['Email'])) {?>



                  <a href="<?php echo $frontpath;?>/write-review/<?php echo $_GET['url'];?>" class="btn inline-block f-left btn-golden btn-red text-white pointer col-sm-6 no-padding f-size-16  f-none-xs" >

                      write a review

                  </a>

                  <?php }else{

					  $uri = $_SERVER['REQUEST_URI'];



$uri; // Outputs: URI

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";



 



$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];



$url; // Outputs: Full URL?>

                  <?php $redirectpath = $frontpath ."/login.php?location=" . urlencode($url) ?>

                  <a href="<?php echo $redirectpath ;?>" class="btn inline-block f-left btn-golden btn-red text-white pointer col-sm-6 no-padding f-size-16  f-none-xs review_btn">

                      write a review

                  </a>

                  <?php }?>

                 

              </div>

           </div>

        </div>

        <div class="row bg-white pad-lr-30">

           <!----><!---->

           <div class="center-block-xs review solid_border-b row-eq-height wp-xs-99">

              <div class="col-sm-12 col-md-3 hidden-xs-down custom-review-title">

                 <h3 class="f-size-20 pad-t-20 pad-b-5 text-400">Top Customer Reviews</h3>

              </div>

              <div class="col-sm-12 col-md-9 pad-lr-xs-5 cust_tab_wrap">

                 <ul class="nav nav-tabs hp-100 pad-t-xs-10 no-border" role="tablist">

                    <li class="nav-item hp-100 pad-t-15 no-padding-sm pad-l-0">

                       <a class="nav-link f-size-13 f-size-xs-12 pad-l-0 text-500">SORT BY</a>

                    </li>

                    <li class="nav-item hp-100 pad-t-15 no-padding-sm review-list-top active">



                       <a class="nav-link f-size-13 f-size-xs-12 no-border active " data-toggle="tab" href="#buzz" role="tab" id="most-recent" data-attr="<?php echo $rows['ProductID'];?>" >MOST

                            RECENT</a>

                      

                    </li>

                    <li class="nav-item hp-100 pad-t-15 no-padding-sm review-list-top">

                     <a class="nav-link f-size-13 f-size-xs-12" data-toggle="tab" href="#references" role="tab" id="most-helpful" data-attr="<?php echo $rows['ProductID'];?>">MOST HELPFUL</a>

                    </li>

                    <select class="f-right mar-t-15 h-30 hidden-xs-down " value="all" id="filter_select_rating" data-attr="<?php echo $rows['ProductID'];?>">

                        <option value="0">All Star</option>

                        <option value="5">5 Star Rating</option>

                        <option value="4">4 Star Rating</option>

                        <option value="3">3 Star Rating</option>

                        <option value="2">2 Star Rating</option>

                        <option value="1">1 Star Rating</option>

                    </select>

                    

                    <span class="f-right inline-block text-500 pad-t-25 f-size-14 pad-lr-10 hidden-xs-down filter-prod">FILTER BY : </span>

                 </ul>

              </div>

           </div>

           <div class="row bg-white center-block-xs wp-xs-99 mar-b-xs-20">

              <div class="tab-content col-sm-12 pad-lr-xs-0">

                 <div class="container-fluid tab-pane fade active show active in pad-lr-xs-0 review-list" id="buzz" role="tabpanel">

                    <!----><!---->

                    <?php



                    $sqlreview  = "SELECT *

                    FROM customerreview

                    INNER JOIN customer ON customerreview.customerid = customer.CustomerID

                    where customerreview.productid =".$rows['ProductID']." AND customerreview.status =1 ORDER BY date DESC limit 5

                    ";



                     //$sqlreview = "select * from customerreview where productid =".$rows['ProductID']." and status =1 ORDER BY date DESC limit 20" ;

                     $resreview = mysqli_query($dbLink,$sqlreview);

                     

                    while($datareview = $resreview->fetch_assoc()) {?>



                       <div class="row pad-tb-30">

                       <div class="col-sm-3 f-left">

                          <div class="cust_review">

                             <rating style="float:left" _nghost-c7="" class="ng-untouched ng-pristine ng-valid">

                                <span _ngcontent-c7="" aria-valuemin="0" class="rating readonly" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="5">

                                   <?php  

                                   //echo $datareview['ratings'];

                                   for($x=1;$x<=$datareview['ratings'];$x++) {

                                      echo '<span _ngcontent-c7="">

                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="1">☆</i>';

                                      

                                    }

                                    while ($x<=5) {

                                      echo'<span _ngcontent-c7="">

                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half0" title="1">☆</i>';

                                      $x++;

                                    }?>

                                   

                                   </span>

                                </span>

                             </rating>

                          </div>

                          <div class="clearfix"></div>

                          

                          <h3 class="f-size-16 pad-tb-10 text-400"><?php echo $datareview['FirstName'];?></h3>

                          <h5 class="f-size-14 text-grey pad-b-30 pad-b-xs-5 no-margin"><?php echo $datareview['date'];?></h5>

                          <!---->

                          <h5 class="f-size-12 pad-b-30 text-green pad-b-xs-5 no-margin">Verified User

                          </h5>

                       </div>

                       <div class="col-sm-9 f-left">

                          <h3 class="f-size-16"><?php echo $datareview['rating_title'];?></h3>

                          <p class="f-size-14 mar-t-20"><?php echo $datareview['descr'];?></p>

                          <div class="cust_suggestion o-hidden mar-t-20 no-margin-xs">

                             <span class="inline-block f-left pad-tb-10 lh-22 pad-r-20 f-size-14">1 of 1 users found this review helpful. Was this review helpful?</span>

                             

                            <?php if(isset($_SESSION['Email'])) {



                               echo "<button class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 like_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">

                               <i class='fa fa-thumbs-up'></i>

                               </button>

                               <button class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 dislike_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">

                               <i class='fa fa-thumbs-down'></i>

                               </button>";



                             }else{?>



                                <a class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 ' href="<?php echo $frontpath;?>/login.php">

                                 <i class='fa fa-thumbs-up'></i>

                                 </a>

                                 <a class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 login_redirect' href="<?php echo $frontpath;?>/login.php">

                                 <i class='fa fa-thumbs-down'></i>

                                 </a>

                            <?php  }?>

                          </div>

                       </div>

                    </div>

                    <?php }?>



                 </div>

                 

                

              </div>

           </div>

        </div>

                        

        <div class="row bg-white center-block-xs pad-tb-20 box-shadow mar-t-20 wp-xs-99 mar-t-xs-15 mar-b-xs-50">

                           <div class="col-sm-12 pad-lr-30 pad-lr-xs-15 pad-tb-10 customer_reviews">

                              <h3 class="f-size-16 pad-b-20 text-500 text-uppercase no-margin pad-lr-xs-15"> CUSTOMER QUESTIONS &amp; ANSWERS</h3>

                              <form class="form-inline ng-untouched ng-pristine ng-valid" novalidate>

                                 <div class="input-group wp-70 w-tab-100 no-margin relative mar-b-tab-20 cust_answ_input">

                              

                              <i class="level-up-5 fa fa-search absolute top-10 text-grey left-10 f-size-18"></i>

                              <input class="form-control h-40 pad-l-35 wp-80 border-tr-r-5 border-br-r-5 wp-xs-65 ng-untouched ng-pristine ng-invalid" formcontrolname="question" id="inlineFormInputGroup" placeholder="Have a Question? Search for answer" type="text">

                              <button class="input-group-addon bg-black text-white pointer f-size-14 f-size-xs-11 h-40 border-tl-r-0 border-bl-r-0 res-btnss" disabled="disabled">Ask Question

                              </button>

                              

                              </div></form>

                              <button class="btn mar-l-10 btn-white border-black f-size-12 h-40 pad-lr-15 pointer no-margin-xs save-btn" type="submit">

                                 <!----><span>22</span>

                                 Questions

                              </button>

                              <button class="btn text-green mar-l-10 btn-white border-green f-size-12 h-40 pad-lr-15 pointer save-btn" type="submit">

                                 <!---->

                                 Answers

                              </button>

                              

                           </div>

                           <div class="mar-t-10 text-green text-500 pad-lr-15"> </div>

                           <!---->

                           <div class="col-sm-12 pad-lr-30 pad-tb-10">

                              <!---->

                           </div>

                           <!---->

                           <div class="col-sm-12  pad-lr-30 ">

                              <h3 class="f-size-16 mar-t-xs-10 pad-b-10 text-500 pad-t-xs-5">Typical questions asked about products:

                              </h3>

                              <p class="f-size-13 pad-tb-5">- Is the item durable?</p>

                              <p class="f-size-13 pad-tb-5">- Is this item easy to use?</p>

                              <p class="f-size-13 pad-tb-5">- What are the dimensions of this item?</p>

                           </div>

                        </div>

                        

        <div class="row bg-white box-shadow wp-xs-99 center-block-xs hidden-sm-down mar-t-20 recent-items">

           <div class="col-sm-12 no-padding">

              <h3 class="f-size-16 pad-tb-25 similar pad-lr-15  text-500 text-uppercase no-margin  pad-lr-xs-15 hidden-sm-down">YOUR RECENTLY VIEWED ITEM</h3>

              <recently-viewed-carousel class="recently_viewed">

                 <!---->

                 <div class="col-sm-12 no-padding pad-lr-xs-0">

                    <!---->

                    

                    <owl-carousel class="block">

                       <owl-carousel-child class="owl-carousel owl-loaded owl-drag" style="display: block;">

                          <!---->

                          <div class="owl-stage-outer recent-outer">

                             <div class="owl-stage item_pro_slider" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1547px;">

                     <?php

                                        $ipaddress = $_SERVER['REMOTE_ADDR'];

                                        $today = date("Y-m-d H:i:s");



                                         $sqlrecent  = "SELECT *

                                                    FROM recent_view_product

                                                    INNER JOIN  product ON recent_view_product.ProductID = product.ProductID

                                                    where recent_view_product.ViewIp ='".$ipaddress."' and recent_view_product.ProductID not in (".$rows['ProductID'].") GROUP BY product.ProductID";

                                        $resrecent = mysqli_query($dbLink,$sqlrecent);

										

										

										  if(mysqli_num_rows($resrecent)>0)

										  {

											$i = 0;

											  while($datarecent = $resrecent->fetch_assoc())

											{

												  $i++;

											  ?>

      

     	 <div class="owl-item <?php if($i == 1){echo 'active';}?>" style="width: 257.8px;">

       <div class="item">

          <div class="item similar-product-item">

             <div class="product_block_container pad-tb-20 pad-lr-20 pad-lr-xs-5" id="productOuter inner-product-outer">

             <?php  $pname = strtolower(str_replace(" ","-",$datarecent['ProductName']));?>



				

               	 <div class="product_block pointer">

                   <div class="img_block">

                   <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

                    <img class="img-responsive" alt="" src="<?=$frontpath?>/ProductImage/<?=$datarecent['ImageName']?>">

                    

                      </a>

                   </div>

                   <div class="prod_name pad-lr-15 pad-b-10 pad-lr-xs-5">

                      <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

                         <h2 class="text-blue f-size-13 lh-16 text-400 text-left pad-t-5"><?=substr(html_entity_decode(stripslashes($datarecent['ProductName'])),0,20)?></h2>

                      </a>

                   </div>

                   <div class="prod_price text-left pad-lr-15 relative pad-lr-xs-5">

                      <!---->



                      <?php 

                      if ($datarecent['is_deal_pro']==1){?>

                      <p class="discount bg-green absolute top-0 right-0 text-white f-size-11 pad-tb-5 pad-lr-5 text-500 box-shd"><?php echo $datarecent['discount_lable'];?>% OFF</p>

                      <!---->

                      <h5 class="no-margin no-padding f-size-12 line-through text-grey">

                         <?php echo '₹'.$datarecent['Price'];?>

                      </h5>

                      <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 

                         <?php echo '₹'.$datarecent['SalePrice'];?>



                      </h3>



                      <?php }else{?>



                      <!---->

                     

                      <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 

                       <?php echo '₹'.$datarecent['Price'];?>



                      </h3>



                      <?php }?>

                      

                   </div>

                   <div class="prod_detail pad-t-5 pad-b-10 pad-lr-10 pad-lr-xs-5">

                      <ul class="no-margin no-padding pad-lr-5 no-list-style no-padding-sm">

                         <!----><!---->

                         <!---->

                         <li class="f-size-13 text-darkgrey text-left">

                            

                              <?php 

                                 $sqlbrand = "select * from brand where brandid=".$datarecent['brandid'];



                                    $resbrand = mysqli_query($dbLink,$sqlbrand);

                                    $databrand=$resbrand->fetch_assoc();



                                    echo 'Brand:<b class="text-grey">'.$databrand['brandname'].'</b>';

                              ?>

                         </li>

                         <!---->

                         <!---->

                         <!---->

                         <!---->

                      </ul>

                   </div>

                </div>

                

             </div>

          </div>

       </div>

    </div>

     

    <?php }}?>

        

  

                          </div>

                          <!-- <div class="owl-nav">

                             <div class="owl-prev disabled"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>

                             <div class="owl-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                          </div> -->

                          </div>

                          <div class="owl-dots">

                             <div class="owl-dot active"><span></span></div>

                             <div class="owl-dot"><span></span></div>

                          </div>

                       </owl-carousel-child>

                    </owl-carousel>

                    

                    

                    

                    <?php /*?><owl-carousel>

                       <owl-carousel-child class="owl-carousel owl-loaded owl-drag" style="display: block;">

                          <!---->

                          <div class="owl-stage-outer">

                             <div class="owl-stage item_pro_slider" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 216px;">

                                

                                  <?php

                                        $ipaddress = $_SERVER['REMOTE_ADDR'];

                                        $today = date("Y-m-d H:i:s");



                                         $sqlrecent  = "SELECT *

                                                    FROM recent_view_product

                                                    INNER JOIN  product ON recent_view_product.ProductID = product.ProductID

                                                    where recent_view_product.ViewIp ='".$ipaddress."' and recent_view_product.ProductID not in (".$rows['ProductID'].") GROUP BY product.ProductID";

                                        $resrecent = mysqli_query($dbLink,$sqlrecent);

										

										

										  if(mysqli_num_rows($resrecent)>0)

										  {

											$i = 0;

											  while($datarecent = $resrecent->fetch_assoc())

											{

												  $i++;

											  ?>

											  

												 <div class="owl-item " style="width: 257.8px;">

											   <div class="item">

												  <div class="item similar-product-item">

													 <div class="product_block_container pad-tb-20 pad-lr-20 pad-lr-xs-5" id="productOuter">

													 <?php  $pname = strtolower(str_replace(" ","-",$pdata['ProductName']));?>

										

														

														 <div class="product_block pointer">

														   <div class="img_block">

														   <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

															<img class="img-responsive" src="<?php echo $frontpath.'/ProductImage/'.$datarecent['ImageName']?>" alt="<?php echo $datarecent['ImageName'];?>"> 

                                                             </a>

														   </div>

														   <div class="prod_name pad-lr-15 pad-b-10 pad-lr-xs-5">

															  <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

																 <h2 class="text-blue f-size-13 lh-16 text-400 text-left pad-t-5"><?=substr(html_entity_decode(stripslashes($datarecent['ProductName'])),0,20)?></h2>

															  </a>

														   </div>

														   <div class="prod_price text-left pad-lr-15 relative pad-lr-xs-5">

															  <!---->

										

															  <?php 

															  if ($datarecent['is_deal_pro']==1){?>

															  <p class="discount bg-green absolute top-0 right-0 text-white f-size-11 pad-tb-5 pad-lr-5 text-500 box-shd"><?php echo $pdata['discount_lable'];?>% OFF</p>

															  <!---->

															  <h5 class="no-margin no-padding f-size-12 line-through text-grey">

																 <?php echo '₹'.$datarecent['Price'];?>

															  </h5>

															  <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 

																 <?php echo '₹'.$datarecent['SalePrice'];?>

										

															  </h3>

										

															  <?php }else{?>

										

															  <!---->

															 

															  <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 

															   <?php echo '₹'.$datarecent['Price'];?>

										

															  </h3>

										

															  <?php }?>

															  

														   </div>

														   <div class="prod_detail pad-t-5 pad-b-10 pad-lr-10 pad-lr-xs-5">

															  <ul class="no-margin no-padding pad-lr-5 no-list-style no-padding-sm">

																 <!----><!---->

																 <!---->

																 <li class="f-size-13 text-darkgrey text-left">

																	

																	 



                                    <?php 

                                 $sqlbrand = "select * from brand where brandid=".$datarecent['brandid'];



                                    $resbrand = mysqli_query($dbLink,$sqlbrand);

                                    $databrand=$resbrand->fetch_assoc();



                                    echo 'Brand:<b class="text-grey">'.$databrand['brandname'].'</b>';

                              ?>

																 </li>

																 <!---->

																 <!---->

																 <!---->

																 <!---->

															  </ul>

														   </div>

														</div>

														

													 </div>

												  </div>

											   </div>

											</div>

											 

											<?php }}?>

												



                                   

                               

                             </div>

                          </div>

                          <div class="owl-nav disabled">

                             <div class="owl-prev disabled"><img src="images/leftarrow.png"></div>

                             <div class="owl-next disabled"><img src="images/rightaarrow.png"></div>

                          </div>

                          <div class="owl-dots disabled"></div>

                       </owl-carousel-child>

                    </owl-carousel><?php */?>

                 </div>

              </recently-viewed-carousel>

           </div>

        </div>

        

        

        

        

                        

       

        

     </section>

  <div class="modal fade" id="oosModal" role="dialog">

    <div class="modal-dialog wp-xs-100">

        

      <div class="modal-content o-hidden bg-white">

        <div class="mpdal-header">

            <button class="z-index close absolute top-0 left-0 h-30 w-30 bg-black" data-dismiss="modal" type="button">×</button>

            <h3 class="text-center pad-tb-20 relative top-0 f-size-18 text-uppercase" style="box-shadow: 1px 1px 5px #e2e2e2;">Bulk Order Request Form</h3>

        </div>

        <div class="modal-body relative">

          <div class="col-sm-12 col-md-12 no-padding">

                <!----><div class="outofstockNum pad-lr-15 h-auto-xs">

                    

                    

                    <form class="mar-b-20 no-margin-xs ng-untouched ng-pristine ng-invalid" novalidate="">                      

                      <div class="overflow_form o-hidden-xs">



                        <div class="row mar-lr-0 mar-tb-5">

                                <!----><h4 class="modal-title f-size-16 pad-l-15 pad-r-30">Tiger 26mm Rotary Hammer, TGP 226, Power: 800W</h4>

                                <!----><p class="f-size-13 mar-t-5 pad-l-15 pad-r-30 text-500">Fill in the required details: </p>

                                <div class="col-sm-12 col-md-6 pad-tb-5">

                                    <label class="f-size-13 mar-b-5 text-500 mar-t-5">Brand</label>

                                    <input class="form-control f-size-13 ng-untouched ng-pristine ng-valid" formcontrolname="brandName" name="brand" placeholder="Brand(Optional)" readonly="" type="text">

                                </div>

                                <div class="col-sm-12 col-md-6 pad-tb-5">

                                    <label class="f-size-13 mar-b-5 text-500 mar-t-5">Quantity*</label>

                                    <input class="form-control f-size-13 text-grey pad-tb-5 b-l-0 text-400 h-35 relative left--1 b-l-xs-1 ng-untouched ng-pristine ng-invalid" formcontrolname="quantity" maxlength="3" placeholder="Qty*" min="0" type="number">

                                    <!---->

                                </div>

                                <div class="clearfix"></div>

                                <div class="pad-tb-5 o-hidden pad-t-xs-10 mar-lr-0 mar-tb-5">

                                    <div class="col-sm-12">

                                        <label>

                                            

                                            <input style="" type="checkbox">

                                        <span class="checkbox f-left inline-block pad-r-10 text-500">I am a business customer</span>

                                    </label>

                                    </div>

                                </div>

                                <!---->



                                <div class="row mar-lr-0 mar-tb-5">

                                    <div class="col-sm-12 col-md-6 pad-tb-5">

                                        <label class="f-size-13 mar-b-5 text-500 mar-t-5">First Name*</label>

                                        <input class="form-control f-size-13 ng-untouched ng-pristine ng-invalid" formcontrolname="first_name" maxlength="30" name="firstName" placeholder="First Name*" type="text">

                                        <!---->

                                    </div>

                                    <div class="col-sm-12 col-md-6 pad-tb-5">

                                        <label class="f-size-13 mar-b-5 text-500 mar-t-5">Last Name</label>

                                        <input class="form-control f-size-13 ng-untouched ng-pristine ng-valid" formcontrolname="last_name" maxlength="30" name="lastName" placeholder="Last Name" type="text">

                                        <!---->

                                    </div>

                                </div>

                                <div class="row mar-lr-0 mar-tb-5">

                                    <div class="col-sm-12 col-md-6 pad-tb-5">

                                        <label class="f-size-13 mar-b-5 text-500 mar-t-5">Email ID*</label>

                                        <input class="form-control f-size-13 ng-untouched ng-pristine ng-invalid" formcontrolname="email" name="email" placeholder="Email*" type="email">

                                        <!---->

                                        <!---->

                                    </div>

                                    <div class="col-sm-12 col-md-6 pad-tb-5">

                                        <label class="f-size-13 mar-b-5 text-500 mar-t-5">Phone Number*</label>

                                        <input class="form-control f-size-13 ng-untouched ng-pristine ng-invalid" formcontrolname="phone" maxlength="10" minlength="10" name="phoneNumber" placeholder="xxxxxxxxxx*" type="text">

                                        <!---->

                                        <!---->

                                    </div>

                                </div>





                                <input autocomplete="off" class="form-control" name="tinNumber" value="22" type="hidden">

                                <input autocomplete="off" class="form-control" name="panNumber" value="11" type="hidden">

                                <input autocomplete="off" class="form-control" name="prodName_0" value="Ideal 110 V Instrumental Axial Cooling Fan, ID 12038 A2" type="hidden">

                                <input autocomplete="off" class="form-control" name="brand_0" value="Ideal" type="hidden">

                                <div class="row mar-lr-0 mar-tb-5">

                                    <div class="col-sm-12 col-md-12 pad-r-15 pad-lr-xs-15">

                                        <label class="f-size-13 mar-b-5 text-500 mar-t-5">Description (Optional)</label>

                                        <textarea class="form-control f-size-13 ng-untouched ng-pristine ng-valid" formcontrolname="description" name="desc" placeholder="Write your comment here" style="height: 75px; margin-top: 5px;"></textarea>

                                    </div>

                                </div>



                            </div>



                            <div class="wp-100 absolute bottom-20 left-0 hidden-sm-down pad-lr-30 mar-tb-5 bg-white hidden-xs" style="box-shadow: 1px -3px 5px #e2e2e2;">

                                <div class="col-sm-12">

                                    <button class="col-sm-12 btn text-white btn-red col-md-12 no-padding pad-r-15 mar-tb-20 no-padding-sm wp-100 f-size-15 text-500 h-45" style="font-size: 1rem !important;" type="submit" disabled="">

                                    Get Quote

                                </button>

                                </div>

                            </div>

                            <div class="row hidden-sm-up pad-lr-30 mar-tb-5 res-quote">

                                <div class="col-sm-12 pad-l-0 pad-r-xs-0">

                                    <button class="col-sm-12 btn text-white btn-red col-md-12 no-padding pad-r-15 mar-tb-20 no-padding-sm wp-100 f-size-13 f-size-xs-13 h-35 visible-xs" type="submit" disabled="">

                                            Get Quote

                                    </button>

                                </div>

                            </div>

                            

                        </div>

                        </form>

                        

                        

                        

                        

                        

                        

                    </div>

                </div>

            </div>

            <!---->

        </div>



    </div>

</div>

  </product>

</div>





<!---sidebar popup-->





<script>

$ (document).ready (function () {

	$ (".modal a").not (".dropdown-toggle").on ("click", function () {

		$ (".modal").modal ("hide");

	});

});



</script>

<script type="text/javascript">

$(document).ready(function(){

	var maxLength = 200;

	$(".show-read-more").each(function(){

		var myStr = $(this).text();

		if($.trim(myStr).length > maxLength){

			var newStr = myStr.substring(0, maxLength);

			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);

			$(this).empty().html(newStr);

			$(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');

			$(this).append('<span class="more-text">' + removedStr + '</span>');

		}

	});

	$(".read-more").click(function(){

		$(this).siblings(".more-text").contents().unwrap();

		$(this).remove();

	});

});

</script>

    <?php require_once('footer.php');?>

<style>

    .show-read-more .more-text{

        display: none;

    }

    .show-read-more{font-size: 14px !important;

line-height: 28px;}

.read-more{text-transform: uppercase;color: #0061d5 !important;}

</style>