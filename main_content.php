<?php require_once('db.php');  ?>
<link rel="stylesheet" href="<?php echo $frontpath;?>/icomoon/style.css">

<script type="text/javascript" src="<?=$frontpath?>/js/custom.js"></script>
<div class="container-fluid pad-lr-md-0">

    <router-outlet></router-outlet>

  <home class="ng-star-inserted" id="home-page-section">

 	<banner-carousel class="block pad-lr-15 no-pad-xs pad-lr-md-0 pad-b-md-30 ng-tns-c5-5"><div class="row pad-t-10 pad-lr-15 pad-lr-xs-0 pad-t-xs-0 pad-t-md-0">  

    <div class="hidden-sm-down col-sm-2 no-padding wp-20 flyout-wrap ng-tns-c5-5 ng-star-inserted">

      <flyout class="ng-tns-c5-5" _nghost-c3=""><div _ngcontent-c3="" class="flyout hidden-md-down box-shadow bg-white border-r-md-8 ng-star-inserted">

  <nav _ngcontent-c3="" class="navbar no-padding">

    <div _ngcontent-c3="" class="navbar-collapse js-navbar-collapse">

      <ul _ngcontent-c3="" class="nav navbar-nav pad-b-5" style="position:relative">

        <li _ngcontent-c3="" class="dropdown mega-dropdown text-grey">

          <a _ngcontent-c3="" class="dropdown-toggle text-red block lh-25" href="<?php echo $frontpath;?>/all-categories.php">

            <span _ngcontent-c3="" class="menu_icon"></span>

            View All Categories &gt;&gt;</a>

        </li>

        <li _ngcontent-c3="" class="dropdown mega-dropdown text-grey">

          <a _ngcontent-c3="" class="dropdown-toggle" href="#">

            <span _ngcontent-c3="" class="menu_icon"></span>

            Corporate Gifting </a>

        </li>


		<?php 
			$sqlmaincat = "select * from category WHERE parent=0 ";
			$resmaincat = mysqli_query($dbLink,$sqlmaincat) or die('Could Not Select ...');
			
			if(mysqli_num_rows($resmaincat)>0){
				while($datamaincat=$resmaincat->fetch_assoc()){
				  $cname = strtolower(str_replace(" ","-",$datamaincat['CategoryName']));
				  if (strpos($cname,'&') !== false) 
				  { 
					$cname = str_replace('&', 'and', $cname); 
				  }
			  
        ?>
        <li _ngcontent-c3="" class="dropdown mega-dropdown text-grey ng-star-inserted">

          <a _ngcontent-c3="" class="dropdown-toggle" href="<?php echo $frontpath;?>/category/<?=$cname?>">
            
            <?php $cname = strtolower(str_replace(" ","-",$datamaincat['CategoryName'])); 
          			if (strpos($cname,'&') !== false) { 
						$cname = str_replace('&', 'and', $cname); 
					}
		  	?>
          	<!--<span _ngcontent-c3="" class="menu_icon"></span>-->
          	<span class="icon-<?php echo $cname;?>"></span>
            <?php echo $datamaincat['CategoryName'];?>
            
          </a>

		  <ul _ngcontent-c3="" class="mega-dropdown-menu ng-star-inserted child-ul" style="position:absolute;left:200px;top:0px">
			<?php  
			  $safety_id =$datamaincat['CategoryID'];
			$sqlsafety="SELECT * FROM category WHERE parent=".$safety_id;
		 
			$ressefety=mysqli_query($dbLink,$sqlsafety) or die ('Could Not Select ...');
			if(mysqli_num_rows($ressefety)>0){
			?>
            
            
			<li _ngcontent-c3="" class="col-sm-3 pad-r-0">
              <ul _ngcontent-c3="" class="first_child_list" style="position:relative">
			<?php
			    $childcount = 0;
				while($data=$ressefety->fetch_assoc()){
				
				
				  $cbname = strtolower(str_replace(" ","-",$data['CategoryName']));
				  if (strpos($cbname,'&') !== false) 
				  { 
					$cbname = str_replace('&', 'and', $cbname);
				  } 
			  ?>
			  <li _ngcontent-c3="" class="lev_one wp-100 child-cl-1 <?php if($childcount == 0){ echo 'active'; } ?> ng-star-inserted">
              
              
              
              
              
                    <a _ngcontent-c3="" class="menu_item" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>">
                    <?php echo $data['CategoryName']; ?>
                      
                  </a>
				  <div class="child-cl-2">
				  <div _ngcontent-c3="" class=" row-eq-height inner_menu  ">  
             
				<div _ngcontent-c3="" class="f-left wp-40 no-padding ng-star-inserted">
					<h3 _ngcontent-c3="" class="no-margin pad-lr-10 f-size-14">Main Categories</h3>
					<?php  
					
					$sqlchildcat="SELECT * FROM category WHERE parent=".$data['CategoryID'];
					$reschild=mysqli_query($dbLink,$sqlchildcat) or die ('Could Not Select ...');
					?><ul _ngcontent-c3=""><?php
					if(mysqli_num_rows($reschild)>0){ 
					
						while($chaildcats=$reschild->fetch_assoc()){
							
							$cbbname = strtolower(str_replace(" ","-",$chaildcats['CategoryName']));
							  if (strpos($cbbname,'&') !== false) 
							  { 
								$cbbname = str_replace('&', 'and', $cbbname);
							  }
						?>
						
						<li _ngcontent-c3="" class="ng-star-inserted">
							<a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/<?=$cbbname?>"><?php echo $chaildcats['CategoryName']; ?></a>
						</li>
						<?php
						}
					
					}else{
						 ?><li _ngcontent-c3="" class="ng-star-inserted">
							 <a _ngcontent-c3="" class="menu_item">Not have child category</a>	 
						</li><?php
					}
					?>
					</ul>
					 
                  <!--<ul _ngcontent-c3="">
                     <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="data?.url">Plain Toe</a>
                    </li><li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="data?.url">Steel Toe</a>
                    </li><li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="data?.url">Composite Toe</a>
                    </li><li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="data?.url">Rubber Toe</a>
                    </li>
                  </ul> -->
              </div>
              <div _ngcontent-c3="" class="f-left wp-60 no-padding">
                <div _ngcontent-c3="" class="col-lg-4">
                  <h3 _ngcontent-c3="" class="menu-head">Shop by Brand</h3>
                  <ul _ngcontent-c3="" class="list-unstyled l-menu">
                   
                    
                            
					  <?php 
					  	$sqlbrand="select * from brand INNER join product on product.brandid = brand.brandid and product.CategoryID IN ( ".$data['CategoryID'].") GROUP BY product.brandid ORDER BY brand.brandname "; 
						$resbrand = mysqli_query($dbLink,$sqlbrand)or die('could not select product');
                        if(mysqli_num_rows($resbrand)>0){
						while($databrand=$resbrand->fetch_assoc()){
							$brandname = strtolower(str_replace(" ","-",$databrand['brandname']));
							  if (strpos($brandname,'&') !== false) 
							  { 
								$brandname = str_replace('&', 'and', $brandname);
							  }
							
							
							?>
							<li class="f-size-13 text-darkgrey text-left">
                            	<a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/brand-<?=$brandname?>">
                            	<?php  echo $databrand['brandname']; ?>
                                </a>
                            </li>
						<?php } }?>
                         
                  </ul>
                  <div _ngcontent-c3="" class="clearfix"></div>
                  <h3 _ngcontent-c3="" class="menu-head">Shop by Price</h3>
                  <ul _ngcontent-c3="" class="list-unstyled l-menu">
                    <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/price-0-100" class="menu_item">0 - 100</a>
                    </li>
                    <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/price-101-500" class="menu_item">101 - 500</a>
                    </li>
                    <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/price-501-1000" class="menu_item">501 - 1000</a>
                    </li>
                    <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/price-1001-5000" class="menu_item">1001 - 5000</a>
                    </li>
                    <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/price-5001-10000" class="menu_item">5001 - 10000</a>
                    </li>
                    <li _ngcontent-c3="" class="ng-star-inserted">
                      <a _ngcontent-c3="" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>/price-10001" class="menu_item">10001 - *</a>
                    </li>
                  </ul>
                </div>
                <div _ngcontent-c3="" class="col-lg-4">
                  <a _ngcontent-c3="" href="#">
                  <?php 
						if($datamaincat['menubannerimage'] != "" ){
							$menubannerimg = $datamaincat['menubannerimage'];
                        }
                        else if($data['menubannerimage'] != ""){
							$menubannerimg = $data['menubannerimage'];
                        }
						else if($chaildcats['menubannerimage'] != ""){
							$menubannerimg = $chaildcats['menubannerimage'];
							
						}
                        
                        
                        
						?>
                    <img _ngcontent-c3="" class="anclk flyout_image" src="<?php echo $frontpath;?>/CategoryIcon/<?php echo $menubannerimg;?>" />
					
                  </a>
                  
                </div>
              </div>
            </div>
            </div>
              </li>
			<?php
			$childcount++;		
				}
			?>
				 </ul>
			</li>
			<?php
			}
			
			?>
			<?php /* ?>
            <li _ngcontent-c3="" class="col-sm-3 pad-r-0">
              <ul _ngcontent-c3="" style="position:relative">
                
                  <li _ngcontent-c3="" class="lev_one wp-100 active w-645 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Safety Shoes
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Safety Helmets
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Traffic Safety
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Safety Signs &amp; Signals
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Safety Gloves
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Fall Protection
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Respiratory Masks
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Hearing Protection
                      
                  </a>
                  </li>
                
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Safety Goggles
                      
                  </a>
                  </li>
              
                  <li _ngcontent-c3="" class="lev_one wp-100 ng-star-inserted">
                    <a _ngcontent-c3="" class="menu_item">
                      Safety Jackets
                      
                  </a>
                  </li>
                
              </ul>
            </li> <?php */ ?>
            
          </ul>
          
        </li>
					
		  <?php }
			}
		
		?>
		
        
        
        
        
        
      </ul>

    </div>

  </nav>

</div>







<div _ngcontent-c3="" class="wp-100 mobile_flyout hidden-sm-up" style="height: 100%; z-index: 999; position: fixed; top: 0; left: 0px; background-color: transparent;">



  <div _ngcontent-c3="" class="wp-80 absolute bg-white top-0 left-0" id="mobile_flyout_id" style="height: 100%;  box-shadow: 1px -2px 6px 0px rgba(123, 123, 123, 0.85); overflow-y: auto;">

    <ul _ngcontent-c3="" class="no-margin no-padding bg-white" style="">

        <li _ngcontent-c3="" class="mobile_menuicon bg-red text-white no_icon relative border-t-dark h-70" data-target="#menu1" data-toggle="collapse" style="padding: 22px 0px !important;">
        
            <span _ngcontent-c3="" class="fa fa-home pad-lr-10 inline-block f-size-20 text-500 text-white" tabindex="0"></span>
            
            <b _ngcontent-c3="" class="text-white" tabindex="0"> Home</b>
            
            <i _ngcontent-c3="" class="fa fa-times absolute pointer mobile_menuicon
            
            f-size-20 top-24 text-white" style="z-index: 1000; right: 0%;"></i>
        
        </li>
        
        <?php 
			$sqlmaincat = "select * from category WHERE parent=0 ";
			$resmaincat = mysqli_query($dbLink,$sqlmaincat) or die('Could Not Select ...');
			if(mysqli_num_rows($resmaincat)>0){
				while($datamaincat=$resmaincat->fetch_assoc()){
					
				  $cname = strtolower(str_replace(" ","-",$datamaincat['CategoryName']));
				  if (strpos($cname,'&') !== false) 
				  { 
					$cname = str_replace('&', 'and', $cname); 
				  }
			  
        ?>
         <li _ngcontent-c3="" class="parent relative Safety ng-star-inserted">
         	<span class="icon-<?php echo $cname;?>"></span>
            <?php echo $datamaincat['CategoryName'];?>
            <?php  
			  $safety_id =$datamaincat['CategoryID'];
			$sqlsafety="SELECT * FROM category WHERE parent=".$safety_id;
		 
			$ressefety=mysqli_query($dbLink,$sqlsafety) or die ('Could Not Select ...');
			if(mysqli_num_rows($ressefety)>0){?>
				
                <span _ngcontent-c3="" class="absolute right-40"></span>
			<?php }
			?>
        	
        
        </li>
        
					
		  <?php }
			}
		
		?>
        
        <!--<li _ngcontent-c3="" class="parent relative Safety ng-star-inserted"><i _ngcontent-c3=""></i>Safety
        
        	<span _ngcontent-c3="" class="absolute right-40"></span>
        
        </li>
        
        <li _ngcontent-c3="" class="parent relative Electricals ng-star-inserted"><i _ngcontent-c3=""></i>Electricals
        
        
        
        <span _ngcontent-c3="" class="absolute right-40"></span>
        
        </li>
        
        <li _ngcontent-c3="" class="parent relative LED &amp; Lighting ng-star-inserted"><i _ngcontent-c3=""></i>LED &amp; Lighting
        
        
        
        <span _ngcontent-c3="" class="absolute right-40"></span>
        
        </li>
        
        <li _ngcontent-c3="" class="parent relative Power Tools ng-star-inserted"><i _ngcontent-c3=""></i>Power Tools
        
        
        
        <span _ngcontent-c3="" class="absolute right-40"></span>
        
        </li>
        
        <li _ngcontent-c3="" class="parent corporate no_icon view" tabindex="0"><i _ngcontent-c3=""></i>Corporate Gifting</li>
        
        <li _ngcontent-c3="" class="parent no_icon view" tabindex="0"><i _ngcontent-c3=""></i>View All Categories</li>
        
        <li _ngcontent-c3="" class="no_icon border-t-dark" data-target="#menu1" data-toggle="collapse" style="padding-top: 15px !important;"><a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="#">Track
        
        Order</a></li>
        
        <li _ngcontent-c3="" class=""><a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="https://www.greengst.com/" target="_blank">Get GST Compliant</a>
        
        </li>
        
        <li _ngcontent-c3="" class="border-dark-b" data-target="#menu1" data-toggle="collapse" style="padding-bottom: 15px !important;"><a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="#">Bulk Order Query</a></li>
        
        <li _ngcontent-c3="" class="pad-lr-5 pad-tb-10" data-target="#menu1" data-toggle="collapse" style="margin-top: 10px !important; padding: 10px 15px !important;">
        
        <p _ngcontent-c3="" class="text-red f-size-12 pad-lr-10 pad-tb-5" style="border: 1px dashed #dadada;">
        
        <offer-header _ngcontent-c3="" page="cartpage">
        
        
        
        <span class="meee bg-white pad-lr-10 pad-tb-5 f-size-11 inline-block text-red mar-l-15 mob-a w-450 w-xs-auto ng-star-inserted">
        
        FLAT 2% OFF ON ALL PREPAID ORDERS</span>
        
        
        
        </offer-header>
        
        </p>
        
        </li>-->

    </ul>

  </div>

</div>

</flyout>

    </div>

    

    <!----Home banner start---->

    <div class="col-md-8 col-sm-12 bg-grey no-padding-sm wp-65 wp-xs-100 pad-lr-10 h-300 h-auto-xs pad-l-md-0">
		<div id="myCarousel" class="carousel slide">

          <div class="carousel-inner">

          

          

			<?php 

				$sql= "select * from homebanner where Status=1 ORDER BY DisplayOrder LIMIT 5";

				$res = mysqli_query($dbLink,$sql) or die("can not select home banner");

				$counter = 1;

				while($data=$res->fetch_assoc()){

					//print_r($data);

			?>        

              

            <div class="item <?php if($counter <= 1){echo " active"; } ?>">

            	<a class="relative block" data="" href="#">

                <img src="<?php echo $frontpath;?>/HomeBanner/<?php echo $data['ImagePath'];?>" alt="Third slide">

                </a>

            </div>

            

            <?php 

				$counter++;

				}

			?>

            

            

          </div>

          <!-- Carousel nav -->

          <div class="owl-nav">

            

          	<div class="owl-prev">

              <a href="#myCarousel" data-slide="prev" onclick="$('#myCarousel').carousel('prev')">

                <i class="fa fa-chevron-left" aria-hidden="true"></i>

              </a>

              </div>

            <div class="owl-next">

              <a href="#myCarousel" data-slide="next" onclick="$('#myCarousel').carousel('next')">

                <i class="fa fa-chevron-right" aria-hidden="true"></i>

              </a>

            </div>

          </div>
</div>
      <div class="home_banner_caption hidden-sm-down" id="home-banner">

        

        

        	<?php 

				$sql= "select * from homebanner where Status =1 ORDER BY DisplayOrder LIMIT 5";

				$res = mysqli_query($dbLink,$sql) or die("can not select home banner");

				$counter = 0;

				while($data=$res->fetch_assoc()){

					

			?>          

             <a data-target="#myCarousel" data-slide-to="<?php echo $counter;?>" class="button dummy_banner bg-white secondary url ng-tns-c5-0 ng-star-inserted <?php if($counter <= 0){echo " active"; } ?>" id="<?php echo $counter;?>">

                <h3 class="no-margin f-size-12"><?php echo $data['BannerName'];?></h3>

                <p class="no-margin no-padding f-size-12"><?php echo $data['BannerDescription']?></p>

            </a>

            

            <?php $counter++; }?>

            

            

            

            

            

        

        </div>

    </div>

    <!----Home banner end---->

    <div class="col-md-2 col-sm-12  homeadv_banner wp-15 wp-xs-100">

      <div class="row bg-white">

      

      	<?php 

			$sqladd = "select * from advertiseimage where advertisebannerID = 2 and banner_img_status=1 ORDER BY advertisebanner_display_order LIMIT 3";

			$resadd=mysqli_query($dbLink,$sqladd) or die('could not select advertise banner');

			while($dataadd=$resadd->fetch_assoc()){ 

		

		?>

        

        <div class="col-xs-4 col-sm-12 col-lg-12 no-padding ng-tns-c5-0 ng-star-inserted">

          <a class="block moglix-adv h-125 h-auto-xs" href="<?php echo $dataadd['banner_img_url'];?>">

            <img class="ng-tns-c5-0 ng-trigger ng-trigger-fade" src="<?=$frontpath?>/AdvertiseGallery/<?php echo $dataadd['imagename'];?>">

          </a>

        </div>

        

        

        <?php } ?>

      </div>

    </div>

  </div>

  </banner-carousel>

  


    <best-seller class="block pad-lr-15 no-pad-xs ng-tns-c6-1"><div class="container-fluid bg-grey home_prod_carousel">

  <div class="row mar-tb-10">

    <div class="col-sm-12 no-padding">

      <div class="homepage_product_slider_block pad-b-xs-30 bg-white min-h-300 h-auto-xs best-seller-sec">

        <h3 class="product_slider_heading text-uppercase f-size-18 pad-b-20 text-500">Bestsellers</h3>

        <div class="ng-tns-c6-1">
 <owl-carousel class="ng-tns-c7-2">

                	<owl-carousel-child class="owl-theme homepage_product_slider sliding owl-carousel owl-loaded owl-drag" style="display: block;">

                    

                		<div class="owl-stage-outer">

                			<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2763px;">

                				

                               <?php
                                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                                        $today = date("Y-m-d H:i:s");

                                         $sqlrecent  = "SELECT *
                                                    FROM product
                                                    LIMIT 10";
                                        $resrecent = mysqli_query($dbLink,$sqlrecent);
										
										
										  if(mysqli_num_rows($resrecent)>0)
										  {
											$i = 0;
											  while($datarecent = $resrecent->fetch_assoc())
											{
												  $i++;
											  ?>
								
                                

                				<div class="owl-item active" style="width: 184.143px;">

                          <?php  $pname = strtolower(str_replace(" ","-",$datarecent['ProductName']));?>

                          <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

                                    <div class="product_block text-center">

                                        <div class="img_block pad-lr-xs-15 pad-tb-xs-15">

                                            <img class="img-responsive ng-lazyloaded" src="<?=$frontpath?>/ProductImage/<?php echo $datarecent['ImageName'];?>">

                                        </div>

                                        <div class="ng-tns-c7-2">

                                            <h4 class="f-size-14 f-size-xs-13  lh-18 text-black text-400 pad-b-5 pad-lr-xs-5"><?php echo $datarecent['ProductName'];?></h4>

                                            <h5 class="f-size-17 f-size-xs-14   b-text text-green mar-t-5 pad-b-5">₹<?php echo $datarecent['Price'];?></h5>

                                            

                                            <?php

												$sqlbrand = "select * from brand where brandid =".$datarecent['brandid']; 

												$resbrand = mysqli_query($dbLink,$sqlbrand)or die('could not select brand');

												$databrand=$resbrand->fetch_assoc()

											?>

                                            <h5 class="f-size-12 l-text text-lightblack mar-t-2">

                                            	<?php echo $databrand['brandname'];?>

                                           	</h5>

                                        </div>

                                    </div>

                                </a></div>

                    

                    			 <?php }}?>

                			</div>

                		</div>

                	</owl-carousel-child>

            	</owl-carousel>


        </div>



      </div>

    </div>

  </div>

</div>

</best-seller>



	<?php 

		$sqlcat = "select * from category where Status=1 and parent = 0 ORDER BY DisplayOrder limit 7";

		$rescat= mysqli_query($dbLink,$sqlcat)or die('could not select Category');

		while($datacat=$rescat->fetch_assoc()){

	

	?>



	<category-carousel class="block pad-lr-15 no-pad-xs ng-tns-c7-2"><div class="container-fluid bg-grey home_prod_carousel">

    <div class="row mar-tb-10">

        <div class="col-sm-12 no-padding">

            <div class="homepage_product_slider_block pad-b-xs-30 bg-white  min-h-300 h-auto-xs">

                <h3 class="product_slider_heading text-uppercase f-size-18"><?php echo $datacat['CategoryName'] ?></h3>

                

                



                 <?php 

               		$cname = strtolower(str_replace(" ","-",$datacat['CategoryName']));
					if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
						$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
					}
				 	//$rr = strtolower(str_replace("&","and",$cname));
					
               ?>

                <a href="<?php echo $frontpath;?>/category/<?=$cname?>" class="btn hidden-sm-down f-right mar-t--30 text-white f-size-12 bg-red mar-lr-15" tabindex="0">VIEW ALL</a>

                <owl-carousel class="ng-tns-c7-2">

                	<owl-carousel-child class="owl-theme homepage_product_slider sliding owl-carousel owl-loaded owl-drag" style="display: block;">

                    

                		<div class="owl-stage-outer">

                			<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2763px;">

                				

                                <?php 
								
								
								
								$sqlpro="SELECT *
										 FROM product
										 INNER JOIN category ON product.CategoryID = category.CategoryID
										 where  category.parent = ".$datacat['CategoryID']."
										 ORDER BY RAND()
										  LIMIT 10
										 "; 

									//$sqlpro = "select * from product where CategoryID =".$datacat['CategoryID']." ";

									$respro = mysqli_query($dbLink,$sqlpro)or die('could not select product');

									$counter = 0;

									while($datapro=$respro->fetch_assoc()){

								

								?>
								
                                

                				<div class="owl-item active" style="width: 184.143px;">

                          <?php  $pname = strtolower(str_replace(" ","-",$datapro['ProductName']));?>

                          <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">

                                    <div class="product_block_container text-center">

                                        <div class="img_block pad-lr-xs-15 pad-tb-xs-15">

                                            <img class="img-responsive ng-lazyloaded" src="<?=$frontpath?>/ProductImage/<?php echo $datapro['ImageName'];?>">

                                        </div>

                                        <div class="ng-tns-c7-2">

                                            <h4 class="f-size-14 f-size-xs-13  lh-18 text-black text-400 pad-b-5 pad-lr-xs-5"><?php echo $datapro['ProductName'];?></h4>

                                            <h5 class="f-size-17 f-size-xs-14   b-text text-green mar-t-5 pad-b-5">₹<?php echo $datapro['Price'];?></h5>

                                            

                                            <?php

												$sqlbrand = "select * from brand where brandid =".$datapro['brandid']; 

												$resbrand = mysqli_query($dbLink,$sqlbrand)or die('could not select brand');

												$databrand=$resbrand->fetch_assoc()

											?>

                                            <h5 class="f-size-12 l-text text-lightblack mar-t-2">

                                            	<?php echo $databrand['brandname'];?>

                                           	</h5>

                                        </div>

                                    </div>

                                </a></div>

                    

                    			<?php $counter++; }?>

                			</div>

                		</div>

                	</owl-carousel-child>

            	</owl-carousel>

                <div class="wp-100 text-center o-hidden">

                    <button class="btn hidden-sm-up mar-t-15 text-white f-size-12 bg-red " tabindex="0">VIEW ALL </button>

                </div>

            </div>

        </div>

    </div>

</div>







</category-carousel>

<?php }?>



	<recently-viewed-carousel class="block pad-lr-15 no-pad-xs ng-tns-c6-1">
    
<div class="container-fluid bg-grey home_prod_carousel">

  <div class="row mar-tb-10">

    <div class="col-sm-12 no-padding">

      <div class="homepage_product_slider_block pad-b-xs-30 bg-white min-h-300 h-auto-xs recent-view-sec">

        <h3 class="product_slider_heading text-uppercase f-size-18 pad-b-20 text-500">Recently Viewed Items</h3>

                    
                    
                    <owl-carousel class="block">
                       <owl-carousel-child class="owl-carousel owl-loaded owl-drag" style="display: block;">
                          
                          <div class="owl-stage-outer">
                             <div class="owl-stage item_pro_slider" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1547px;">
                     <?php
                                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                                        $today = date("Y-m-d H:i:s");

                                         $sqlrecent  = "SELECT *
                                                    FROM recent_view_product
                                                    INNER JOIN  product ON recent_view_product.ProductID = product.ProductID
                                                    where recent_view_product.ViewIp ='".$ipaddress."'";
                                        $resrecent = mysqli_query($dbLink,$sqlrecent);
										
										
										  if(mysqli_num_rows($resrecent)>0)
										  {
											$i = 0;
											  while($datarecent = $resrecent->fetch_assoc())
											{
												  $i++;
											  ?>
      
     	 <div class="owl-item <?php if($i == 1){echo 'active';}?>" >
       <div class="item">
          <div class="item similar-product-item">
             <div class="product_block_container pad-tb-20 pad-lr-20 pad-lr-xs-5" id="productOuter">
             <?php  $pname = strtolower(str_replace(" ","-",$datarecent['ProductName']));?>

				
               	 <div class="product_block pointer">
                   <div class="img_block">
                   <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">
                    <img class="img-responsive recent-img" alt="" src="<?=$frontpath?>/ProductImage/<?=$datarecent['ImageName']?>" style="margin-bottom:0 !important;">
                    
                      </a>
                   </div>
                   <div class="prod_name pad-lr-15 pad-b-10 pad-lr-xs-5">
                      <a class="block product_block_container pointer ng-tns-c7-2 ng-star-inserted" href="<?php echo $frontpath.'/products/'.$pname ; ?>">
                         <h2 class="text-blue f-size-13 lh-16 text-400 text-left pad-t-5"><?=substr(html_entity_decode(stripslashes($datarecent['ProductName'])),0,20)?></h2>
                      </a>
                   </div>
                   <div class="prod_price text-left pad-lr-15 relative pad-lr-xs-5">
                      

                      <?php 
                      if ($datarecent['is_deal_pro']==1){?>
                      <p class="discount bg-green absolute top-0 right-0 text-white f-size-11 pad-tb-5 pad-lr-5 text-500 box-shd"><?php echo $datarecent['discount_lable'];?>% OFF</p>
                      
                      <h5 class="no-margin no-padding f-size-12 line-through text-grey">
                         <?php echo '₹'.$datarecent['Price'];?>
                      </h5>
                      <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 
                         <?php echo '₹'.$datarecent['SalePrice'];?>

                      </h3>

                      <?php }else{?>

                      
                     
                      <h3 class="no-margin no-padding pad-t-5 f-size-18 text-500"> 
                       <?php echo '₹'.$datarecent['Price'];?>

                      </h3>

                      <?php }?>
                      
                   </div>
                   <div class="prod_detail pad-t-5 pad-b-10 pad-lr-10 pad-lr-xs-5">
                      <ul class="no-margin no-padding pad-lr-5 no-list-style no-padding-sm">
                         
                         
                         <li class="f-size-13 text-darkgrey text-left">
                            
                              <?php 
                                 $sqlbrand = "select * from brand where brandid=".$datarecent['brandid'];

                                    $resbrand = mysqli_query($dbLink,$sqlbrand);
                                    $databrand=$resbrand->fetch_assoc();

                                    echo 'Brand:<b class="text-grey">'.$databrand['brandname'].'</b>';
                              ?>
                         </li>
                         
                         
                         
                         
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
                          <div class="owl-dots">
                             <div class="owl-dot active"><span></span></div>
                             <div class="owl-dot"><span></span></div>
                          </div>
                       </owl-carousel-child>
                    </owl-carousel>
                  
                 </div>

</div></div></div>

</recently-viewed-carousel>



  </home>

</div>
<!--<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("#home-banner");
var btns = header.getElementsByClassName("dummy_banner");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>-->
<script>
$(document).ready(function() {
    $(".dummy_banner").click(function () {
        $(".dummy_banner").removeClass("active");
        $(this).addClass("active");     
    });
});

</script>