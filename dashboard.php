<?php  require_once('db.php'); ?>
<?php require_once('include/function.php'); 
 include('include/start_session.php');
 $title = "Login";
?>
<?php require_once('header-inner.php');
if(isset($_SESSION['Email'])) {?>
	<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c12="" class="ng-star-inserted"><section _ngcontent-c12="" class="container-fluid dashboard">
    <div _ngcontent-c12="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c12="" class="mob_nav_tab hidden_desktop mar-tb-20 hideLeftMenu">
            <span _ngcontent-c12="" class=""><em _ngcontent-c12=""></em> <i _ngcontent-c12="" class="triangle-bottom"></i> </span>
        </div>
        
        <!---->
        <div _ngcontent-c12="" class="pad-tb-20 full_width">
            <router-outlet _ngcontent-c12=""></router-outlet><bussiness-dashboard _nghost-c13="" class="ng-tns-c13-4 ng-star-inserted"><section _ngcontent-c13="" class="bussiness-dashboard">
  <div _ngcontent-c13="" class="row">
    <div _ngcontent-c13="" class="col-sm-12 pad-lr-xs-0">
      <h3 _ngcontent-c13="" class="text-center text-uppercase text-400 f-size-20 pad-b-10 wp-95 center-block common-h3">My Dashboard</h3>

      <!---->

      <div _ngcontent-c13="" class="wp-70 wp-xs-100 text-center center-block o-hidden dashboard_wrap">
        <a href="<?php echo $frontpath;?>/order.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block order"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">My Orders</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">View total orders placed</h5>
        </span>
        </a>
        <a href="<?php echo $frontpath;?>/myfaq.php">
			<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 f-left-xs wp-xs-46 bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block rfq"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">My RFQs</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">View request for quotations</h5>
        </span>
        </a>
        <!--<a href="<?php echo $frontpath;?>/purchaselist.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block purchase"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">Purchase List</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">Products you have saved</h5>
        </span>
        </a>-->
        <a href="<?php echo $frontpath;?>/business-detail.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block bussiness"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">Business Details</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">View your business details</h5>
        </span>
        </a>
        <a href="<?php echo $frontpath;?>/info.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 wp-xs-45 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block personal"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">User Settings</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">View/Edit your information</h5>
        </span>
		</a>
        <a href="<?php echo $frontpath;?>/editpassword.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block password"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">Password</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">View/Edit your password</h5>
        </span>
        </a>
        <a href="<?php echo $frontpath;?>/editaddress.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" tabindex="0">
          <span _ngcontent-c13="" class="icon_block address"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5">Address</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2">View/Edit your address</h5>
        </span>
        </a>
        <!--<a href="<?php echo $frontpath;?>/creditline.php">
        	<span _ngcontent-c13="" class="inline-block dash-block box-shadow h-180 w-180 wp-xs-46 f-left-xs bg-white mar-lr-5 mar-tb-10 pad-lr-xs-10 ng-trigger ng-trigger-fade" style="cursor: default !important;" tabindex="0">
          <span _ngcontent-c13="" class="icon_block insight"></span>
          <h3 _ngcontent-c13="" class="f-size-16 text-400 pad-b-5 text-grey">Credit Line</h3>
          <h5 _ngcontent-c13="" class="f-size-13 text-400 pad-t-2 text-grey">Apply Now</h5>
        </span>
        </a>-->
      </div>
      <div _ngcontent-c13="" class="clearfix"></div>
    </div>
  </div>

  <div _ngcontent-c13="" class="row mar-t-20">
      <div _ngcontent-c13="" class="col-sm-12 text-center">
        <a href="http://glorywebsdev.com/ecommerce/"><span _ngcontent-c13="" class="f-size-14 text-blue text-500 text-uppercase" tabindex="0">Start Shopping Now <i _ngcontent-c13="" class="fa fa-angle-double-right text-blue"></i></span></a>
      </div>
    </div>


</section>
</bussiness-dashboard>
        </div>
    </div>
</section>
</bussiness>
</div>
<?php  }else{?>
	<script>window.location = "<?php echo $frontpath;?>/login.php";</script>
<?php }

 
?>

<?php require_once('footer.php');?>