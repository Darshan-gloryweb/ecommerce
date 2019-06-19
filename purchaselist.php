<?php require_once('db.php'); 
 include('include/start_session.php'); ?>
<?php  $title = 'Proceed To Checkout | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header.php');?>
<?php require_once('productfunction.php'); ?>
</head>
<body>


<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">My Orders</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        <div _ngcontent-c4="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c4=""></router-outlet><bussiness-order class="ng-tns-c6-1 ng-star-inserted"><loader class="ng-tns-c6-1" _nghost-c7=""><!---->
</loader>
<!---->          
<h3 class="f-size-16 f-size-xs-14 pad-b-10 mar-b-15 border-b pad-t-xs-0 mar-t-xs-0">MY ORDERS</h3>
<!---->

<!----><div class="relative ng-tns-c6-1 ng-star-inserted">
    
    <div class="mid_msz text-center relative pad-t-30 mar-t-30 ">
       <h3 class="f-size-20"> You have not placed any orders yet</h3>
    </div>
</div>

<div class="ng-tns-c6-1">
    <!---->
</div>

</bussiness-order>
        </div>
        
    </div>
</section>
</bussiness>
</div>
<!--<script type="text/javascript">
$('.mob_nav_tab').on("click",function(){
    $(this).find(".mob_nav_business").toggle();
  });</script>
  <script type="text/javascript">
  $(document).ready(function() {

      $(".mob_nav_business").hide();
    $(".mob_nav_tab").click(function(){
        $(this).toggleClass("dropdown-active");
    });
  
  </script>-->
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
      <script>
$(document).ready(function() {
    $(".list-items").click(function () {
        $(".list-items").removeClass("active");
        $(this).addClass("active");     
    });
});

</script>
 <?php require_once('footer.php');?>