<?php require_once('db.php'); 
 include('include/start_session.php'); ?>
<?php  $title = 'Proceed To Checkout | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>
<?php require_once('productfunction.php'); ?>
<?php 
	if(isset($_SESSION['Email'])) {
		$email = $_SESSION['Email'];
	}else{?>
		<script>window.location = "<?php echo $frontpath;?>/login.php";</script>
<?php }?>
</head>
<body>

  
  </form>
<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">User Settings</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        <?php 
			
			$sqluserdetail = "select * from customer where Email='".$email."'";
			$resuserdeatil = mysqli_query($dbLink,$sqluserdetail) or die("Error : ".mysqli_error());
			$datauserdeatil=$resuserdeatil->fetch_assoc() ;
			
		?>
        <div _ngcontent-c5="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c5=""></router-outlet><bussiness-info _nghost-c9="" class="ng-tns-c9-1 ng-star-inserted"><loader _ngcontent-c9="" class="ng-tns-c9-1" _nghost-c7=""><!---->
</loader>
<section _ngcontent-c9="" class="container-fluid pad-lr-0">
  <div _ngcontent-c9="" class="row">
    <div _ngcontent-c9="" class="col-sm-12">
      <h3 _ngcontent-c9="" class="f-size-16 f-size-xs-14 pad-b-10 mar-b-15 border-b pad-t-xs-0 mar-t-xs-0 ng-trigger ng-trigger-fade">USER SETTINGS</h3>
      <div _ngcontent-c9="" class="clearix"></div>
      <div _ngcontent-c9="" class="wp-40 pad-b-15 wp-xs-100 h-400">
        <form  action="" method="post" class="ng-tns-c9-1 ng-untouched ng-pristine ng-valid" id="infop">
          <div _ngcontent-c9="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade">
            <label _ngcontent-c9="" class="f-size-13 pad-b-2">Email *</label>
            <input _ngcontent-c9="" class="form-control f-size-13 ng-untouched ng-pristine ng-valid" name="email" placeholder="Enter email address" readonly type="text" value="<?php echo $datauserdeatil['Email'];?>">
          </div>
          <div _ngcontent-c9="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade">
            <label _ngcontent-c9="" class="f-size-13 pad-b-2">Phone No. *</label>
            <input _ngcontent-c9="" class="form-control f-size-13 ng-untouched ng-pristine ng-valid" name="phone" placeholder="Enter phone number" readonly type="text" value="<?php echo $datauserdeatil['PhoneNumber'];?>">
          </div>
          <div _ngcontent-c9="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade">
            <label _ngcontent-c9="" class="f-size-13 pad-b-2">First Name *</label>
            <input _ngcontent-c9="" class="form-control f-size-13 ng-untouched ng-pristine ng-valid" name="fname" placeholder="Enter first name" type="text" value="<?php echo $datauserdeatil['FirstName'];?>">
          </div>
          <div _ngcontent-c9="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade">
            <label _ngcontent-c9="" class="f-size-13 pad-b-2">Last Name *</label>
            <input _ngcontent-c9="" class="form-control f-size-13 ng-untouched ng-pristine ng-valid" name="lname" placeholder="Enter last name" type="text" value="<?php echo $datauserdeatil['LastName'];?>">
          </div>
          <div _ngcontent-c9="" class="wp-100 o-hidden">
            <p _ngcontent-c9="" class="text-left text-500 pad-lr-0 pad-b-10 pad-t-0 f-size-12 text-red ng-trigger ng-trigger-fade"></p>
          </div>
          <div _ngcontent-c9="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade">
          <input type="submit" name="submit" class="btn w-200 f-size-14 text-500 h-40 bg-orange text-white" value="Submit" />

          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</bussiness-info>
        </div>
    </div>
</section>
</bussiness>
</div>
  
<?php
	if(isset($_POST['submit'])){
		$sqlupdate = "UPDATE customer SET FirstName='".$_POST['fname']."',LastName='".$_POST['lname']."',Email='".$_POST['email']."',PhoneNumber='".$_POST['phone']."' WHERE Email= '".$_POST['email']."'";
		$resuserdeatil = mysqli_query($dbLink,$sqlupdate) or die("Error : ".mysqli_error());
		if($resuserdeatil){?>
			<script>window.location = "<?php echo $frontpath;?>/info.php";</script>
			
		<?php }
		
	}

?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
jQuery(document).ready(function($){
	$("#infop").validate({ 
		
        rules: {           
            
			 "fname": "required",
			 "lname": "required",
			 "email": "required",
			 "PhoneNumber": "required",
			 
			
			
        },
		
		
       	
        submitHandler: function(form) {
            //Your code for AJAX starts   
			 
            values = $("#infop").serialize();
			
			
            jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/infop.php',
                         type: "post",
                         data: values,
                        success: function(){
							
                            //alert("success");
                            alert('Submitted successfully');
							$("#infop")[0].reset();
							window.location = "<?php echo $frontpath;?>/business-detail.php";
							
							
                        },
                        error:function(){
                //            alert("failure");
                            alert('There is error while submit');
                        }                
            //Your code for AJAX Ends
        });       
    }
         });
});
</script>


 <?php require_once('footer.php');?>