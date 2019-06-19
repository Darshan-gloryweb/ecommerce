<?php require_once('db.php'); 
 include('include/start_session.php'); ?>
<?php  $title = 'Edit Password | '.$mywebsitename; ?>
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


<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">Password</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        <?php 
			
			$sqluserdetail = "select * from customer where Email='".$email."'";
			$resuserdeatil = mysqli_query($dbLink,$sqluserdetail) or die("Error : ".mysqli_error());
			$datauserdeatil=$resuserdeatil->fetch_assoc() ;
			
		?>
        <div _ngcontent-c5="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c5=""></router-outlet><bussiness-password _nghost-c16="" class="ng-tns-c16-4 ng-star-inserted"><loader _ngcontent-c16="" class="ng-tns-c16-4" _nghost-c7=""><!---->
</loader>
<section _ngcontent-c16="" class="container-fluid pad-lr-0">
  <div _ngcontent-c16="" class="row">
    <div _ngcontent-c16="" class="col-sm-12">
      <h3 _ngcontent-c16="" class="f-size-16 border-b o-hidden pad-b-10">CHANGE PASSWORD</h3>
      <div _ngcontent-c16="" class="clearix"></div>
      <div _ngcontent-c16="" class="wp-40 pad-tb-15 wp-xs-100 h-400">
        <form  action="" method="post" class="ng-tns-c16-4 ng-untouched ng-pristine ng-invalid" novalidate id="editpasswordform">
          <div _ngcontent-c16="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade clearix">
            <label _ngcontent-c16="" class="f-size-13">Current Password *</label>
            <input _ngcontent-c16="" class="form-control f-size-13 ng-untouched ng-pristine ng-invalid" minlength="3" name="current" ngmodel="" placeholder="Enter your current password" required type="password">
          </div>
          <!---->
          <div _ngcontent-c16="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade clearfix">
            <label _ngcontent-c16="" class="f-size-13">New Password *</label>
            <input _ngcontent-c16="" class="form-control f-size-13 ng-untouched ng-pristine ng-invalid" minlength="3" name="new" ngmodel="" placeholder="Enter new password"  type="password" required>
          </div>
          <!---->
          <div _ngcontent-c16="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade clearfix">
            <label _ngcontent-c16="" class="f-size-13">Confirm Password *</label>
            <input _ngcontent-c16="" class="form-control f-size-13 ng-untouched ng-pristine ng-invalid" minlength="3" name="confirm" ngmodel="" placeholder="Confirm your password" required type="password" required="required">
          </div>
          <!---->
          <div _ngcontent-c16="" class="wp-100 o-hidden ng-trigger ng-trigger-fade">
            <p _ngcontent-c16="" class="text-left text-500 pad-lr-0 pad-b-10 pad-t-0 f-size-12 text-red"></p>
          </div>
          <div _ngcontent-c16="" class="form-group pad-tb-10 no-margin ng-trigger ng-trigger-fade">
            
            <input type="submit" name="submit" class="btn w-200 f-size-14 text-500 h-40 bg-orange text-white save-btn" value="Save Changes" />
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</bussiness-password>
        </div>
    </div>
</section>
</bussiness>
</div>
  
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" >
jQuery(document).ready(function($){
  
  $("#editpasswordform").validate({ 
    
        rules: {           
            
       "current": "required",
       "confirm" : "required",
       "new" : "required",
      
        },
    
    
        
        submitHandler: function(form) {
            //Your code for AJAX starts   
       
            values = $("#editpasswordform").serialize();
      
      
            jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/editpasswordformp.php',
                         type: "post",
                         data: values,
                        success: function(){
                            //alert("success");
                            alert('Change Password successfully');
              				$("#editpasswordform")[0].reset();
              				window.location = "<?php echo $frontpath;?>/login.php";
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


 