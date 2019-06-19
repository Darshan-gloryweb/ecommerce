  <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <!--<span _ngcontent-c4="" class=""><em _ngcontent-c4="">Business Details</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>-->
        </div>
 <div _ngcontent-c4="" class="mob_nav_business business_sidebar mar-b-xs-20 col-sm-2 bg-white no-padding mar-r-10 mar-r-xs-0 dashboard-menu ng-star-inserted order-leftside">
            <ul _ngcontent-c4="" class="no-padding pad-b-50 no-margin no-list-style">
                <li _ngcontent-c4="">
                	<a _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-15 text-400 pad-lr-15 border-b" href="<?php echo $frontpath;?>/dashboard.php">
                		<span _ngcontent-c4="" class="menu_icon fa fa-dashboard dashboard"></span>
                        <span _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav uppercase">
                        <span _ngcontent-c4=""> DASHBOARD</span>
                        </span>
                     </a>
                </li>
                <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="order">
                <span _ngcontent-c4="" class="menu_icon fa fa-shopping-cart order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/order.php">My Orders</a>
                </li>
                 <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="rfq">
                <span _ngcontent-c4="" class="menu_icon fa fa-info-circle order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/myfaq.php">My RFQs</a>
                </li>
                 <!--<li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="purchaselist">
                <span _ngcontent-c4="" class="menu_icon fa fa-list-alt order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/purchaselist.php">Purchase List</a>
                </li>-->
                 <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="businessdetail">
                <span _ngcontent-c4="" class="menu_icon fa fa fa-briefcase order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/business-detail.php">Business Details</a>
                </li>
                 <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="info">
                <span _ngcontent-c4="" class="menu_icon fa fa-user order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/info.php">User Settings</a>
                </li>
                 <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="editaddress">
                <span _ngcontent-c4="" class="menu_icon fa fa-map-marker order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/editaddress.php">Address</a>
                </li>
                 <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="editpassword">
                <span _ngcontent-c4="" class="menu_icon fa fa-key order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/editpassword.php">Password</a>
                </li>
                <!-- <li _ngcontent-c4="" class="block pad-t-10 pad-b-10 f-size-13 text-400 pad-lr-15 border-b list-items" id="creditlines">
                <span _ngcontent-c4="" class="menu_icon fa fa-credit-card order pad-r-10"></span><a _ngcontent-c4="" class="inline-block pad-l-5 text_dash_nav" href="<?php echo $frontpath;?>/creditline.php">Credit Line</a>
                </li>-->
            </ul>
        </div>
        <script>
   jQuery(document).ready(function($) {
	   if ($(window).width() < 768)
	   {
		   console.log($(window).width());
		  $(".mob_nav_business").hide();
		$(".mob_nav_tab").click(function(){
			 $('.mob_nav_business').slideToggle();
			 
		});
	   }
   });
  </script>
             <!-- <script>
$(document).ready(function() {
    $(".list-items").click(function () {
        $(".list-items").removeClass("active");
        $(this).addClass("active");     
    });
});

</script>-->

<script>
$(function(){
    var current = location.pathname;
	//alert(current);
switch (current) {
    case '/ecommerce/info.php':
       $('#info').addClass('active');
       break;
    case '/ecommerce/business-detail.php':
       $('#businessdetail').addClass('active');
       break;
    case '/ecommerce/order.php':
       $('#order').addClass('active');
       break;
    case '/ecommerce/myfaq.php':
       $('#rfq').addClass('active');
       break;
    case '/ecommerce/purchaselist.php':
       $('#purcahselist').addClass('active');
       break;
	   case '/ecommerce/editpassword.php':
       $('#editpassword').addClass('active');
       break;
	   case '/ecommerce/editaddress.php':
       $('#editaddress').addClass('active');
       break;
}
});
</script>