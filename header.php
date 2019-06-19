<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title>

<?=$title?>

</title>

<?php include('validation.php'); ?>

<?php include('include/start_session.php');?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>

<link href="<?=$frontpath?>/css/styles.css" rel="stylesheet">

<link href="<?=$frontpath?>/css/responsive.css" rel="stylesheet">

<link rel="stylesheet" href="<?=$frontpath?>/css/lightslider.css"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

</head>

<body class="no-margin">

<img src="images/Pixel.png" style="display:block;" width="1" height="1"> <app _nghost-c0="" ng-version="5.2.0">

<main _ngcontent-c0="" bathemerun="">

<div _ngcontent-c0="" class="additional-bg"></div>

<router-outlet _ngcontent-c0=""></router-outlet>

<pages class="ng-star-inserted">

<ba-page-top class="block" _nghost-c2="">

<div _ngcontent-c2="" bascrollposition="" class="page-top clearfix" maxheight="50"> 



<!---->

<header _ngcontent-c2="" class="container-fluid ng-star-inserted">

<div _ngcontent-c2="" class="row pad-lr-20 pad-tb-10 hidden-sm-down bg-grey offer_block pad-lr-md-0">

  <div _ngcontent-c2="" class="col-lg-5 col-md-6 col-sm-12 pad-t-xs-10 pad-lr-md-0 ng-star-inserted">

    <offer-header _ngcontent-c2="" page="homepage"><!----> 

      

      <!----><span class="bg-white pad-lr-10 pad-tb-5 f-size-11 inline-block text-red mar-l-15 mob-a w-450 w-xs-auto ng-star-inserted"> 

      <?php

			$sqldis_he_no = "select * from promotioncode where dis_for_All = 1";

			$resdis_he_no =  mysqli_query($dbLink,$sqldis_he_no) or die("can not select product");

			$datadis_he_no = $resdis_he_no->fetch_assoc()

		?>

      FLAT <?php echo $datadis_he_no['Percentage'];?>% OFF ON ALL ORDERS ABOVE RS <?php echo $datadis_he_no['dis_for_All_order_amount'];?> | USE CODE: <?php echo $datadis_he_no['Code'];?></span> 

      

      <!----> 

      

    </offer-header>

  </div>

  <div _ngcontent-c2="" class="col-lg-7 col-md-6 col-sm-12 pad-t-5 o-hidden pad-tb-xs-5 pad-lr-md-0 pad-8">

    <ul _ngcontent-c2="" class="no-margin no-padding list f-size-12 f-right wp-xs-100">

      

      <li _ngcontent-c2=""><a _ngcontent-c2="" class="pointer f-size-12 blackText" target="_blank" href="http://glorywebsdev.com/ecommerce/bulkorder.php">Bulk Order Query</a></li>

    </ul>

    <a _ngcontent-c2="" class="f-size-12 pointer pad-r-30 blackText f-right hidden-sm-down  relative top--2 blackText" href="mailto:care@dummy.com"> <i _ngcontent-c2="" aria-hidden="true" class="fa fa-envelope-o pad-r-5 f-size-12 relative f-left blackText"></i>care@dumy.com</a> </div>

</div>

<div _ngcontent-c2="" class="row search_bar pad-lr-30 pad-lr-md-0 bg-white relative sticky-header">

  <div _ngcontent-c2="" class="col-xs-6 col-md-3 col-lg-2 pad-tb-5 o-hidden pad-b-xs-10 hidden-xs"><i _ngcontent-c2="" aria-hidden="true" class="mobile_menuicon fa fa-bars inline-block f-left f-size-22 text-grey pad-t-10 pointer hidden-sm-up pad-r-10 test" id="mobile_favicon" onclick="openNav()"></i>

    

    <!----> 

    

    <a _ngcontent-c2="" class="inline-block f-left" href="<?=$frontpath?>"> 

    

    <!---->

    <h1 _ngcontent-c2="" class="ng-star-inserted">

    

    <img _ngcontent-c2="" alt="Logo" class="logo img-fluid" src="<?php echo $frontpath; ?>/images/dummy-logo.png">

    

    </h1>

    

    <!----> 

    

    </a> <a _ngcontent-c2="" class="inline-block absolute f-size-12 top-5 left-105 text-black text-500 no-border try_max" target="_blank" href="#"> </a>

  </div>

  <div _ngcontent-c2="" class="col-xs-5 visible-xs pad-tb-5 o-hidden pad-b-xs-10"><i _ngcontent-c2="" aria-hidden="true" class="mobile_menuicon fa fa-bars inline-block f-left f-size-22 text-grey pad-t-10 pointer hidden-sm-up pad-r-10 test" id="mobile_favicon" onclick="openNav()"></i>

    

    <!----> 

    

    <a _ngcontent-c2="" class="inline-block f-left" href="<?=$frontpath?>"> 

    

    <!---->

    <h1 _ngcontent-c2="" class="ng-star-inserted">

    

    <img _ngcontent-c2="" alt="Logo" class="logo img-fluid" src="<?php echo $frontpath; ?>/images/dummy-logo.png">

    

    </h1>

    

    <!----> 

    

    </a> <a _ngcontent-c2="" class="inline-block absolute f-size-12 top-5 left-105 text-black text-500 no-border try_max" target="_blank" href="#"> </a>

  </div>

  <div _ngcontent-c2="" class="visible-xs col-xs-7">

    <ul _ngcontent-c2="" class="list no-padding no-margin wp-100 wp-xs-100">

      <li _ngcontent-c2="" class="pad-tb-10 relative pointer"> <a href="<?php echo $frontpath;?>/cart.php">

        <p _ngcontent-c2="" class="cart_count absolute text-black top-12 left-50">

          <?php 

        if(isset($_SESSION['CustomerID']))

  {

    

    $cart_sql = "SELECT product.*, shoppingcartitems.Quantity,shoppingcart.*, shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";

      

      $cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');

      if(mysqli_num_rows($cart_res)>0)

      {

        echo mysqli_num_rows($cart_res);

        }

      else

      {

        echo 0;

      }

  }else{

    echo 0;

  }

    

  ?>

        </p>

        <span _ngcontent-c2="" class="shopping-cart no-border pointer"></span> 

        <!----><span _ngcontent-c2="" class="inline-block no-border pad-t-5 f-size-14 text-black lh-20 pointer relative top--8 hidden-sm-down ng-star-inserted"> Cart</span> </a> </li>

      <li _ngcontent-c2="" class="pad-tb-10 pad-t-5 pointer" tabindex="0"> <span _ngcontent-c2="" class="deals no-border pointer relative top-5 relative-xs left-xs-15"></span> <a href="<?=$frontpath?>/deals.php" class="inline-block no-border f-size-14 lh-20 pointer relative top-0 text-red hidden-sm-down deall-icon">Deals</a> </li>

      

      <!---->

      <?php if(isset($_SESSION['Email'])) {?>

      <li _ngcontent-c2="" class="wp-30 pointer login_btn logged_in o-hidden ng-star-inserted">

                        <a _ngcontent-c2="" href="http://glorywebsdev.com/ecommerce/dashboard.php">

                            <span _ngcontent-c2="" class="login no-border pointer icon-my_account_logged_in"></span><span _ngcontent-c2="" class="no-border pad-t-3 text-400 inline-block-lg hidden-md-down hide-resposnive" style="width: 60px; overflow: hidden; margin-top: -15px; text-align:left;"><?php echo $_SESSION['FirstName'];?></span>

                            <span _ngcontent-c2="" class="login_active no-border pointer is-display"></span>

                        </a>

                       

                        <div class="user_menu display_menu">

                        <ul class="no-padding no-list-style pad-tb-10 pad-lr-10 o-hidden">

                        	<li class="header-list1 pointer h-35" style="padding-left:10px !important;">

                            	<a href="http://glorywebsdev.com/ecommerce/order.php" class="link"><i class="fa fa-shopping-cart"></i>My Orders</a>

                            </li>

                            <li class="header-list1 pointer h-35" 

                            style="padding-left:10px !important;"><a href="http://glorywebsdev.com/ecommerce/myfaq.php" class="link">

                            <i class="fa fa-info-circle"></i>My RFQ</a></li>

                        	<li class="header-list1 pointer h-35" style="padding-left:10px !important;"><a href="http://glorywebsdev.com/ecommerce/editaddress.php" class="link"> <i class="fa fa-map-marker"></i>Address</a></li>

							<li class="header-list1 pointer h-35" style="padding-left:10px !important;"><a href="<?=$frontpath?>/logout.php" class="link"><i class="fa fa-sign-out"></i>Logout</a></li>

                        </ul>

                        </div> </li>

                        <!---->

                    <div></div>

                    <?php }else{?>

                    <li _ngcontent-c2="" class="pad-tb-10 text-right login_btn pointer ng-star-inserted" tabindex="0">

                    <a  href="<?php echo $frontpath;?>/login.php">

                    <span _ngcontent-c2="" class="login no-border pointer"></span>

                    </a>

                    <a  href="<?php echo $frontpath;?>/login.php">

                        <span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $userData['Email'];?> </span>

                    </a>

                    <a  _ngcontent-c2="" href="<?php echo $frontpath;?>/login.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Login</span> </a>

                    </li>

                    

					<?php }?>

      <?php /*?><li _ngcontent-c2="" class="pad-tb-10 text-right login_btn pointer ng-star-inserted" tabindex="0"> <span _ngcontent-c2="" class="login no-border pointer"></span>

        <?php if(isset($_SESSION['Email'])) {?>

        <span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $_SESSION['Email'];?> </span> 

        <a href="<?=$frontpath?>/logout.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8" title="Logout"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Logout</span></a>

        <?php



  }else if(isset($_SESSION['userData'])){

    $userData = $_SESSION['userData'];

    

    ?>

        <span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $userData['Email'];?> </span>

        <a href="<?=$frontpath?>/logout.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8" title="Logout"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Logout</span></a>

        <?php   

  }else { ?>

        <a  _ngcontent-c2="" href="<?php echo $frontpath;?>/login.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Login</span> </a>

        <?php }?>

      </li><?php */?>

      

      <!---->

      

    </ul>

  </div>

  <div _ngcontent-c2="" class="col-xs-12 col-md-6 col-lg-6 pad-tb-10 pad-l-md-0" id="search-input-block">

    <div _ngcontent-c2="" class="input-group no-margin ">

      

      

      <form method="post" action="<?=$frontpath?>/search.php" class="form-horizontal ng-pristine ng-invalid ng-touched" onsubmit="return searchitem(this);">

 

 			

            <input type="text" name="search1" id="search1"  class="static-xs form-control f-size-14 h-40 f-left wp-86 border-tr-r-0 border-br-r-0 text-black ng-untouched ng-pristine ng-invalid" placeholder="I am looking for..." autocomplete="off" />

            

		

            <input type="submit" class="input-group-addon bg-red inline-block f-left wp-14 h-40 text-white pointer border-tl-r-0 border-bl-r-0 fa-input" value="&#xf002;">   

	  </form>

    </div>

    <div _ngcontent-c2="" class="" id="auto" ></div>

  </div>

  <div _ngcontent-c2="" class="col-xs-6 hidden-xs col-md-3 col-lg-4 no-padding">

    <ul _ngcontent-c2="" class="list no-padding no-margin wp-100 wp-xs-100">

      <li _ngcontent-c2="" class="pad-tb-10 relative pointer"> <a href="<?php echo $frontpath;?>/cart.php">

        <p _ngcontent-c2="" class="cart_count absolute text-black top-12 left-50">

          <?php 

        if(isset($_SESSION['CustomerID']))

	{

		

		$cart_sql = "SELECT product.*, shoppingcartitems.Quantity,shoppingcart.*, shoppingcartitems.ShoppingCartItemsID FROM product INNER JOIN shoppingcart ON shoppingcart.CustomerID=".$_SESSION['CustomerID']." INNER JOIN shoppingcartitems ON shoppingcart.ShoppingCartID=shoppingcartitems.ShoppingCartID AND product.ProductID=shoppingcartitems.ProductID";

			

			$cart_res = mysqli_query($dbLink,$cart_sql) or die ('Could Not Select Cart Items');

			if(mysqli_num_rows($cart_res)>0)

			{

				echo mysqli_num_rows($cart_res);

				}

			else

			{

				echo 0;

			}

	}else{

		echo 0;

	}

		

	?>

        </p>

        <span _ngcontent-c2="" class="shopping-cart no-border pointer"></span> 

        <!----><span _ngcontent-c2="" class="inline-block no-border pad-t-5 f-size-14 text-black lh-20 pointer relative top--8 hidden-sm-down ng-star-inserted"> Cart</span> </a> </li>

      <li _ngcontent-c2="" class="pad-tb-10 pad-t-5 pointer" tabindex="0"> 

      	<a href="<?=$frontpath?>/deals.php">

        	<span _ngcontent-c2="" class="deals no-border pointer relative top-5 relative-xs left-xs-15"></span> 

        </a>

        <a href="<?=$frontpath?>/deals.php" class="inline-block no-border f-size-14 lh-20 pointer relative top-0 text-red hidden-sm-down deall-icon">Deals</a> 

        </li>

      

      <!---->

      <?php if(isset($_SESSION['Email'])) {?>

      <li _ngcontent-c2="" class="wp-30 pointer login_btn logged_in o-hidden ng-star-inserted">

                        <a _ngcontent-c2="" href="http://glorywebsdev.com/ecommerce/dashboard.php">

                            <span _ngcontent-c2="" class="login no-border pointer icon-my_account_logged_in"></span><span _ngcontent-c2="" class="no-border pad-t-3 text-400 inline-block-lg hidden-md-down hide-resposnive" style="width: 60px; overflow: hidden; margin-top: -15px; text-align:left;"><?php echo $_SESSION['FirstName'];?></span>

                            <span _ngcontent-c2="" class="login_active no-border pointer is-display"></span>

                        </a>

                        <div class="user_menu display_menu">

                        <ul class="no-padding no-list-style pad-tb-10 pad-lr-10 o-hidden">

                        	<li class="header-list1 pointer h-35" style="padding-left:10px !important;">

                            	<a href="http://glorywebsdev.com/ecommerce/order.php" class="link"><i class="fa fa-shopping-cart"></i>My Orders</a>

                            </li>

                            <li class="header-list1 pointer h-35" 

                            style="padding-left:10px !important;"><a href="http://glorywebsdev.com/ecommerce/myfaq.php" class="link">

                            <i class="fa fa-info-circle"></i>My RFQ</a></li>

                        	<li class="header-list1 pointer h-35" style="padding-left:10px !important;"><a href="http://glorywebsdev.com/ecommerce/editaddress.php" class="link"> <i class="fa fa-map-marker"></i>Address</a></li>

							<li class="header-list1 pointer h-35" style="padding-left:10px !important;"><a href="<?=$frontpath?>/logout.php" class="link"><i class="fa fa-sign-out"></i>Logout</a></li>

                        </ul>

                        </div>

                        <!---->

                    <div></div></li>

                    <?php }else{?>

                    <li _ngcontent-c2="" class="pad-tb-10 text-right login_btn pointer ng-star-inserted" tabindex="0">

                    <a  href="<?php echo $frontpath;?>/login.php">

                    <span _ngcontent-c2="" class="login no-border pointer"></span>

                    </a>

                    <a  href="<?php echo $frontpath;?>/login.php">

                        <span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $userData['Email'];?> </span>

                    </a>

                    <a  _ngcontent-c2="" href="<?php echo $frontpath;?>/login.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Login</span> </a>

                    </li>

                    

					<?php }?>

      <?php /*?><li _ngcontent-c2="" class="pad-tb-10 text-right login_btn pointer ng-star-inserted" tabindex="0"> <span _ngcontent-c2="" class="login no-border pointer"></span>

        <?php if(isset($_SESSION['Email'])) {?>

        <a href="<?=$frontpath?>/logout.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8" >

        	<span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $_SESSION['Email'];?> </span> 

        </a>

        <a href="<?=$frontpath?>/logout.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8" title="Logout"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Logout</span></a>

        <?php



	}else if(isset($_SESSION['userData'])){

		$userData = $_SESSION['userData'];

		

		?>

        <a href="<?=$frontpath?>/logout.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8">

        	<span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $userData['Email'];?> </span> 

        </a>

        <a href="<?=$frontpath?>/logout.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8" title="Logout"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Logout</span></a>

        <?php 	

	}else { ?>

    	<a  href="<?php echo $frontpath;?>/login.php">

    		<span _ngcontent-c2="" class="hidden-sm-down no-border"> <?php echo $userData['Email'];?> </span>

        </a>

        <a  _ngcontent-c2="" href="<?php echo $frontpath;?>/login.php" class="inline-block no-border f-size-14 lh-20 pointer relative top--8"> <span _ngcontent-c2="" class="hidden-sm-down no-border">Login</span> </a>

        <?php }?>

      </li><?php */?>

      

      <!---->

      

    </ul>

  </div>

</div>

</header>

</div>



<!---->





<!---->



<div _ngcontent-c3="" class="mobile_flyout hidden-lg-up" style="" id="mobile_flyout_id">

    <div _ngcontent-c3="" class="wp-80 absolute bg-white top-0 left-0" style="height: 100%;  box-shadow: 1px -2px 6px 0px rgba(123, 123, 123, 0.85); overflow-y: auto;">

      <ul _ngcontent-c3="" class="no-margin no-padding bg-white" style="">

      

      	<li _ngcontent-c3="" class="mobile_menuicon bg-red text-white no_icon relative border-t-dark h-70" data-target="#menu1" data-toggle="collapse" style="padding: 22px 0px !important;">

        	<span _ngcontent-c3="" class="fa fa-home pad-lr-10 inline-block f-size-20 text-500 text-white" tabindex="0">

            </span>

            <a href="<?php echo $fronthpath;?>"><b _ngcontent-c3="" class="text-white" tabindex="0"> Home</b></a>

            <a href="javascript:void(0)" onclick="closeNav()">

            	<i _ngcontent-c3="" class="fa fa-times absolute pointer mobile_menuicon responsive-icon f-size-20 top-24 text-white"></i>

            </a>

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

        	<?php $cname = strtolower(str_replace(" ","-",$datamaincat['CategoryName'])); 

          			if (strpos($cname,'&') !== false) { 

						$cname = str_replace('&', 'and', $cname); 

					}

		  	?>

          	<!--<span _ngcontent-c3="" class="menu_icon"></span>-->

          	<a href="<?php echo $frontpath;?>/category/<?=$cname?>">

                <span class="icon-<?php echo $cname;?>"></span>

                <?php echo $datamaincat['CategoryName'];?>

            </a>

            <span _ngcontent-c3="" class="absolute right-40 plus-minus cell">+</span>

			

        </li>

        <li _ngcontent-c3="" class="mobile_pad no-padding ng-star-inserted" style="display:none;">

        <?php 

            $safety_id =$datamaincat['CategoryID'];

			$sqlsafety="SELECT * FROM category WHERE parent=".$safety_id;

		 

			$ressefety=mysqli_query($dbLink,$sqlsafety) or die ('Could Not Select ...');

			if(mysqli_num_rows($ressefety)>0){?>

				

                	

                    <?php while($data=$ressefety->fetch_assoc()){

						

						  $cbname = strtolower(str_replace(" ","-",$data['CategoryName']));

						  if (strpos($cbname,'&') !== false) 

						  { 

							$cbname = str_replace('&', 'and', $cbname);

						  } 

			  	    ?>

						

						

                    	

            				<a _ngcontent-c3="" class="menu_item" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>">

                            <p _ngcontent-c3="" class="ng-star-inserted">

								<span _ngcontent-c3="" class="no_icon"><?php echo $data['CategoryName']; ?></span>

				            </p>

                            </a>

                         

                        

                    <?php }?>

                    

			<?php }

            ?>

          </li>

        

        

        

					

		  <?php }

			}

		

		?>     

        

       

        

        

        

        

        

        <li _ngcontent-c3="" class="parent no_icon view text-red" tabindex="0">

            <a href="<?php echo $frontpath;?>/all-categories.php">

            <i _ngcontent-c3="" class="icon_font round-icon"><em _ngcontent-c3="" class="icon-view_all_categpries "></em></i>View All Categories

            </a>

        </li>

        

        

        

        <li _ngcontent-c3="" class="no_icon border-t-dark" data-target="#menu1" data-toggle="collapse" style="padding-top: 5px !important;padding-bottom: 5px !important;">

        	<a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="#">Online Assist</a>

        </li>

        

        <li _ngcontent-c3="" class="no_icon border-t-dark" data-target="#menu1" data-toggle="collapse" style="padding-top: 15px !important;">

        	<a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="#">Track Order</a>

        </li>

        <li _ngcontent-c3="" class="">

        	<a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="#" target="_blank">Get GST Compliant</a>

        </li>

        <li _ngcontent-c3="" class="border-dark-b" data-target="#menu1" data-toggle="collapse" style="padding-bottom: 15px !important;">

        	<a _ngcontent-c3="" class="inline-block pad-tb-5 pad-lr-30" href="<?php echo $frontpath;?>/bulkorder.php">Bulk Order Query</a>

        </li>

        <li _ngcontent-c3="" class="pad-lr-5 pad-tb-10" data-target="#menu1" data-toggle="collapse" style="margin-top: 10px !important; padding: 10px 15px !important;">

          <p _ngcontent-c3="" class="text-red f-size-12 pad-lr-10 pad-tb-5 ng-star-inserted" style="border: 1px dashed #dadada;">

            <offer-header _ngcontent-c3="" page="cartpage"><span class="meee bg-white pad-lr-10 pad-tb-5 f-size-11 inline-block text-red mar-l-15 mob-a w-450 w-xs-auto ng-star-inserted">FLAT 5% OFF ON ALL ORDERS ABOVE RS 999 | USE CODE: JULY5 </span>

            </offer-header>

          </p>

        </li>

    </ul>

</div>

</div>

</flyout>

</div>

<!--<script type="text/javascript">

$("#mobile_flyout_id").hide();

$(document).ready(function(){

$('#mobile_favicon').hover(function(){  

    $('.test').toggleClass('MenuHideShow');

});

$(".mobile_menuicon").click(function(){

$("#mobile_flyout_id").animate({width:'toggle'},1000);

});

$(".responsive-icon").click(function(){

 $("#mobile_flyout_id").css({display:'none'});

});

});

</script>-->

<script>

function openNav() {

    document.getElementById("mobile_flyout_id").style.width = "100%";

}



function closeNav() {

    document.getElementById("mobile_flyout_id").style.width = "0";

}

</script>

<script>

$(window).scroll(function () {

var sticky = $('.sticky-header'),

    scroll = $(window).scrollTop();



if (scroll >= 80) {

    sticky.addClass('Stickyfixed');

} else {

    sticky.removeClass('Stickyfixed');



}

});

</script>

<script type="text/javascript">

$(document).ready(function() {

  //toggle the component with class accordion_body

  $(".parent").click(function() {

    if ($('.mobile_pad').is(':visible')) {

      $(".mobile_pad").slideUp(300);

      $(".plus-minus").text('+');

    }

    if ($(this).next(".mobile_pad").is(':visible')) {

      $(this).next(".mobile_pad").slideUp(300);

     $(this).children(".plus-minus").text('+');

    } else {

      $(this).next(".mobile_pad").slideDown(300);

      $(this).children(".plus-minus").text('-');

    }

  });

});

$('.login_btn').hover(function(){

     $('.user_menu', this).slideDown(300); 

},function(){

     $('.user_menu', this).slideUp(300);

});

</script>