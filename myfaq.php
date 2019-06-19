<?php require_once('db.php'); 
error_reporting(E_ERROR | E_PARSE);
 include('include/start_session.php'); ?>
<?php  $title = 'Proceed To Checkout | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header.php');?>
<?php require_once('productfunction.php'); ?>
<?php 
	if(isset($_SESSION['Email'])) {
		$email = $_SESSION['Email'];
	}else{?>
		<script>window.location = "<?php echo $frontpath;?>/login.php";</script>
<?php }?>
</head>
<body>

  
<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">My RFQ</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        <div _ngcontent-c12="" class="pad-tb-20 business_wrap bg-white">
        <router-outlet _ngcontent-c12=""></router-outlet>
        <bussiness-rfq _nghost-c14="" class="ng-tns-c14-7 ng-star-inserted">
        <loader _ngcontent-c36="" class="ng-tns-c36-7" _nghost-c6=""><!---->
</loader>

        <div _ngcontent-c14="" class=" ">
        
        <?php 
			
			$rfqsql = "select * from bulkorder where cus_id = '".$_SESSION['Email']."'";
			$rfqres = mysqli_query($dbLink,$rfqsql) or die("Error : ".mysqli_error());
			
			$rfqdata = $rfqres->fetch_assoc();
			$bulkorderid = $rfqdata['bulkorderid'];
			
			$vsql = "select * from bulkorder_prodetail where bulkorderid = ".$bulkorderid."";
			$vbr = mysqli_query($dbLink,$vsql) or die("can not select websetting");
			
			if (mysqli_num_rows($vbr)>0) {
				echo '<h3 _ngcontent-c14="" class="f-size-16 border-b-s pad-b-10">MY RFQ  ('.mysqli_num_rows($rfqres).') </h3>';
				while($vdata = $vbr->fetch_assoc()){
				?>
                

        <div _ngcontent-c14="" class="mar-t-15 ng-tns-c14-7 ng-trigger ng-trigger-fade ng-star-inserted">
        <a _ngcontent-c14="" class="ng-tns-c14-7">
        <div _ngcontent-c14="" class="border box-shadow bg-order row no-margin pad-lr-10 pad-tb-15 pad-tb-xs-5 pointer" data-toggle="collapse" data-target="#demo0">
        
        <div _ngcontent-c14="" class="col-xs-12 col-sm-12 pad-tb-xs-5 pad-lr-xs-0">
        <span _ngcontent-c14="" class="f-size-16 f-size-xs-12 text-left">RFQ Id : </span>
        <span _ngcontent-c14="" class="f-size-16 f-size-xs-12 text-left"> <b _ngcontent-c14="" class="text-darkgrey f-size-14 f-size-xs-12"><?php echo $vdata['id'];?></b></span>
        <span _ngcontent-c14="" class="inline-block pad-lr-5 text-500">|</span>
        <span _ngcontent-c14="" class="ng-tns-c14-7"><b _ngcontent-c14="" class="text-darkgrey f-size-14 f-size-xs-12"><?php echo $vdata['quantity'];?> Item </b></span>
        <span _ngcontent-c14="" class="inline-block pad-lr-5 text-500">|</span>
        <span _ngcontent-c14="" class="f-size-16 f-size-xs-12 text-center text-left-xs"><b _ngcontent-c14="" class="text-darkgrey f-size-14 f-size-xs-12">Placed on <?php echo date("m/d/y",$rfqdata['orderon']);?></b></span>
        </div>
        </div>
        </a>
        <div _ngcontent-c14="" class="collapse in show" id="demo0">
        <div _ngcontent-c14="" class="row pad-lr-20 pad-tb-20 ng-tns-c14-7 ng-star-inserted" style="">
        <div _ngcontent-c14="" class="clearfix border-b-dot pad-b-20">
        <div _ngcontent-c14="" class="col-md-10 col-sm-10">
        <p _ngcontent-c14="" class="text-left f-size-xs-14 lh-20 mar-b-5"><span _ngcontent-c14="" class="text-500"> <?php echo $vdata['productName'];?></span> </p>
        <p _ngcontent-c14="" class=" f-size-xs-14 mar-b-5"> <span _ngcontent-c14="" class="ng-tns-c14-7">Brand :</span>  <span _ngcontent-c14="" class="text-500"><?php echo $vdata['brand'];?> </span></p>
        
        <p _ngcontent-c14="" class="ng-tns-c14-7">
            <span _ngcontent-c14="" class="text-500 f-size-xs-14 text-green ng-tns-c14-7 ng-star-inserted">Created</span>
            
        </p>
        </div>
        <div _ngcontent-c14="" class="col-md-2 col-sm-2 pad-t-xs-5">
        <p _ngcontent-c14="" class=" f-size-xs-14"><span _ngcontent-c14="" class="text-500">Qty :  <?php echo $vdata['quantity'];?> </span></p>
        </div>
        </div>
        
        </div>
        
        
        
        </div>
        </div>
        
        
        
    			
			<?php } 
			}else{?>
            <h3 _ngcontent-c14="" class="f-size-16 border-b-s pad-b-10">MY RFQ(0)</h3>
				<div _ngcontent-c9="" class="row pad-tb-30 mar-tb-50 mar-tb-xs-0 ng-tns-c9-2 ng-star-inserted">
                    <div _ngcontent-c9="" class="col-sm-6 text-center">
                      <img _ngcontent-c9="" class="max-w-275 ng-trigger ng-trigger-fade" src="https://cdnx3.moglix.com/img/others/rfq-stop.jpg">
                    </div>
                    <div _ngcontent-c9="" class="col-sm-6 text-center">
                      <h3 _ngcontent-c9="" class="text-center text-500 pad-tb-15 mar-t-30 f-size-17">You have not requested any quotation till date</h3>
                      <a href="<?php echo $frontpath;?>/bulkorder.php" class="btn btn-red text-white inline-block getquote_btn">Get Quotes</a>
                      
                    </div>
                  </div>
			<?php }?>
			</div>
        </bussiness-rfq>
    </div>
			
    
			
        
    </div>
</section>
</bussiness>
</div>
<script>
$(function(){
$('#demo0').addClass('cdd');
});


</script>


 <?php require_once('footer.php');?>