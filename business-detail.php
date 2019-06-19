<?php require_once('db.php'); 
 include('include/start_session.php'); ?>
<?php  $title = 'Proceed To Checkout | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>
<?php require_once('productfunction.php'); ?>
<?php 




	if(isset($_SESSION['Email'])) {
		$id = $_SESSION['Email'];
	}else{?>
		<script>window.location = "<?php echo $frontpath;?>/login.php";</script>
<?php }

$sqledit = "Select * from bussiness_detail where  cus_id='".$_SESSION['Email']."'";
$editres = mysqli_query($dbLink,$sqledit) or die("can not select bussiness");

if(mysqli_num_rows($editres)>0){ 
	


	$action = "E";

   

    //$editrow = mysql_fetch_array($editres);

    $editrow = $editres->fetch_assoc();

	$bus_companyName = stripslashes($editrow['bus_companyName']);

	$bus_email = stripslashes($editrow['bus_email']);

	$bus_phone = stripslashes($editrow['bus_phone']);

	$bus_industry = stripslashes($editrow['bus_industry']);

	$bus_businessType = stripslashes($editrow['bus_businessType']);

	$bus_gstin = stripslashes($editrow['bus_gstin']);

	$bus_addressLine = stripslashes($editrow['bus_addressLine']);

	$bus_postCode = stripslashes($editrow['bus_postCode']);

	$bus_city = stripslashes($editrow['bus_city']);

	$bus_idState = stripslashes($editrow['bus_idState']);

	$bus_pan = stripslashes($editrow['bus_pan']);

	$bus_isGstInvoice = stripslashes($editrow['bus_isGstInvoice']);

		

	

}

else

{

	$action = "A";

	$bus_companyName ='';
	$bus_email = '';
	$bus_phone = '';
	$bus_industry = '';
	$bus_businessType = '';
	$bus_gstin = '';
	$bus_addressLine = '';
	$bus_postCode ='';
	$bus_city = '';
	$bus_idState = '';
	$bus_pan = '';
	$bus_isGstInvoice = '';

}

?>
</head>
<body>

   
 
<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
               <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">Business Details</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        
        <?php 
			
			/*$sqluserdetail = "select * from bussiness_detail where Email='".$email."'";
			$resuserdeatil = mysqli_query($dbLink,$sqluserdetail) or die("Error : ".mysqli_error());
			$datauserdeatil=$resuserdeatil->fetch_assoc() ;*/
			
		?>
        
        <div _ngcontent-c4="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c4=""></router-outlet><bussiness-detail _nghost-c7="" class="ng-star-inserted"><loader _ngcontent-c7="" _nghost-c6=""><!---->
</loader>
<section _ngcontent-c7="" class="container-fluid">
    <div _ngcontent-c7="" class="row">
        <div _ngcontent-c7="" class="col-sm-12 pad-lr-0">
            <h3 _ngcontent-c7="" class=" f-size-16 f-size-xs-14 pad-b-10 mar-b-5 border-b pad-t-xs-0 mar-t-xs-0">BUSINESS DETAILS</h3>
            <div _ngcontent-c7="" class=" pad-r-30 pad-r-xs-0 pad-b-15 pad-t-5 wp-xs-100">
            
                <form  method="post" novalidate class="ng-untouched ng-pristine ng-valid" id="business_detailp" action="">
                   <div _ngcontent-c7="" class="row mar-t-30">
                       <div _ngcontent-c7="" class="col-md-6 form-details">
                            <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine isFocus ng-valid" name="bus_companyName" maxlength="75" type="text" value="<?php echo $bus_companyName ;?>">
                                <label _ngcontent-c7="">Business Entity Name</label>
                                <!---->
                            </div>
                            <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine isFocus ng-valid" name="bus_email" type="text" value="<?php echo $bus_email ;?>">
                                <label _ngcontent-c7="">Business Email Id</label>
                                <!---->
                                <!---->
                            </div>
                            <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine isFocus ng-valid" name="bus_phone" type="text" value="<?php echo $bus_phone ;?>">
                                <label _ngcontent-c7="">Business Phone Number</label>
                                <!---->
                                <!---->
                            </div>

                            <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-30 mar-t-30">
                                <label _ngcontent-c7="" class="select_label">Industry (optional)</label>
                                <!--<?php echo $bus_industry.'adasadasd'?>-->
                                <select _ngcontent-c7="" class="form-control f-size-14 border mar-t--30 ng-untouched ng-pristine ng-valid" name="bus_industry">
                                    <option _ngcontent-c7="" value="">Please Select Your Industry</option>
                                    <option _ngcontent-c7="" value="1" <?php if($bus_industry == 1){?> selected="selected"<?php }?>>Agriculture</option>
                                    <option _ngcontent-c7="" value="2" <?php if($bus_industry == 2){?> selected="selected"<?php }?>>Auto Component</option>
                                    <option _ngcontent-c7="" value="3" <?php if($bus_industry == 3){?> selected="selected"<?php }?>>Consumer Goods</option>
                                    <option _ngcontent-c7="" value="4" <?php if($bus_industry == 4){?> selected="selected"<?php }?>>Educational Institutes, Labs &amp; Scientific Institutes</option>
                                    <option _ngcontent-c7="" value="5" <?php if($bus_industry == 5){?> selected="selected"<?php }?>>Engineering</option>
                                    <option _ngcontent-c7="" value="6" <?php if($bus_industry == 6){?> selected="selected"<?php }?>>Hospital &amp; Healthcare</option>
                                    <option _ngcontent-c7="" value="7" <?php if($bus_industry == 7){?> selected="selected"<?php }?>>Hospitality: Hotel, Restaurant &amp; Catering</option>
                                    <option _ngcontent-c7="" value="8" <?php if($bus_industry == 8){?> selected="selected"<?php }?>>Industrial &amp; Manufacturing</option>
                                    <option _ngcontent-c7="" value="9" <?php if($bus_industry == 9){?> selected="selected"<?php }?>>Logistics &amp; Facility Management</option>
                                    <option _ngcontent-c7="" value="10" <?php if($bus_industry == 10){?> selected="selected"<?php }?>>Professional Services</option>
                                    <option _ngcontent-c7="" value="11" <?php if($bus_industry == 11){?> selected="selected"<?php }?>>Retail &amp; E-commerce</option>
                                    <option _ngcontent-c7="" value="12" <?php if($bus_industry == 12){?> selected="selected"<?php }?>>Others</option>
                                </select>
                                <!---->
                            </div>

                           <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-30 mar-t-30">
                               <label _ngcontent-c7="" class="select_label">Business Type</label>
                               <select _ngcontent-c7="" class="f-size-14 form-control border mar-t--30 ng-untouched ng-pristine ng-valid" name="bus_businessType">
                                   <option _ngcontent-c7="" value="">Please Select Your Business Type</option>
                                   <option _ngcontent-c7="" value="1" <?php if($bus_businessType == 1){?> selected="selected"<?php }?>>Corporate</option>
                                   <option _ngcontent-c7="" value="2" <?php if($bus_businessType == 2){?> selected="selected"<?php }?>>Reseller</option>
                               </select>
                           </div>

                           

                            <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-valid isFocus" name="bus_gstin" type="text" value="<?php echo $bus_gstin ;?>">
                                <label _ngcontent-c7="" class="f-size-13">GSTIN (Optional)</label>
                                <!---->
                                <!---->
                            </div>
                       </div>

                       <div _ngcontent-c7="" class="col-md-6 form-details">
                            <div _ngcontent-c7="" formgroupname="address" class="ng-untouched ng-pristine ng-valid">
                                <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                    <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine isFocus ng-valid" name="bus_addressLine" type="text" value="<?php echo $bus_addressLine ;?>">
                                    <label _ngcontent-c7="">Registered Address</label>
                                    <!---->
                                </div>
                                <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                    <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine isFocus ng-valid" name="bus_postCode" type="text" value="<?php echo $bus_postCode ;?>">
                                    <label _ngcontent-c7="">PIN</label>
                                    <!---->
                                    <!---->
                                </div>
    
                                <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25">
                                    <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine isFocus ng-valid" name="bus_city" type="text" value="<?php echo $bus_city ;?>">
                                    <label _ngcontent-c7="">City</label>
                                    <!---->
                                </div>
    
                                <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-30 mar-t-30">
                                    <label _ngcontent-c7="" class="select_label">State</label>
                                    <select _ngcontent-c7="" class="form-control f-size-14 border mar-t--30 ng-untouched ng-pristine ng-valid" name="bus_idState">
                                        <option _ngcontent-c7="" value="">Please Select State</option>
                                        <!----><option _ngcontent-c7="" value="313" <?php if($bus_idState == 313){?> selected="selected"<?php }?>  class="ng-star-inserted">Andhra Pradesh</option>
                                        <option _ngcontent-c7="" value="314" <?php if($bus_idState == 314){?> selected="selected"<?php }?> class="ng-star-inserted">Arunachal Pradesh</option>
                                        <option _ngcontent-c7="" value="315" <?php if($bus_idState == 315){?> selected="selected"<?php }?> class="ng-star-inserted">Assam</option>
                                        <option _ngcontent-c7="" value="316" <?php if($bus_idState == 316){?> selected="selected"<?php }?> class="ng-star-inserted">Bihar</option>
                                        <option _ngcontent-c7="" value="317" <?php if($bus_idState == 317){?> selected="selected"<?php }?> class="ng-star-inserted">Chhattisgarh</option>
                                        <option _ngcontent-c7="" value="318" <?php if($bus_idState == 318){?> selected="selected"<?php }?> class="ng-star-inserted">Goa</option>
                                        <option _ngcontent-c7="" value="319" <?php if($bus_idState == 319){?> selected="selected"<?php }?> class="ng-star-inserted">Gujarat</option>
                                        <option _ngcontent-c7="" value="320" <?php if($bus_idState == 320){?> selected="selected"<?php }?> class="ng-star-inserted">Haryana</option>
                                        <option _ngcontent-c7="" value="321" <?php if($bus_idState == 321){?> selected="selected"<?php }?> class="ng-star-inserted">Himachal Pradesh</option>
                                        <option _ngcontent-c7="" value="322" <?php if($bus_idState == 322){?> selected="selected"<?php }?> class="ng-star-inserted">Jammu and Kashmir</option>
                                        <option _ngcontent-c7="" value="323" <?php if($bus_idState == 323){?> selected="selected"<?php }?> class="ng-star-inserted">Jharkhand</option>
                                        <option _ngcontent-c7="" value="324" <?php if($bus_idState == 324){?> selected="selected"<?php }?> class="ng-star-inserted">Karnataka</option>
                                        <option _ngcontent-c7="" value="325" <?php if($bus_idState == 325){?> selected="selected"<?php }?> class="ng-star-inserted">Kerala</option>
                                        <option _ngcontent-c7="" value="326" <?php if($bus_idState == 326){?> selected="selected"<?php }?> class="ng-star-inserted">Madhya Pradesh</option>
                                        <option _ngcontent-c7="" value="327" <?php if($bus_idState == 327){?> selected="selected"<?php }?> class="ng-star-inserted">Maharashtra</option>
                                        <option _ngcontent-c7="" value="328" <?php if($bus_idState == 328){?> selected="selected"<?php }?> class="ng-star-inserted">Manipur</option>
                                        <option _ngcontent-c7="" value="329" <?php if($bus_idState == 329){?> selected="selected"<?php }?> class="ng-star-inserted">Meghalaya</option>
                                        <option _ngcontent-c7="" value="330" <?php if($bus_idState == 330){?> selected="selected"<?php }?> class="ng-star-inserted">Mizoram</option>
                                        <option _ngcontent-c7="" value="331" <?php if($bus_idState == 331){?> selected="selected"<?php }?> class="ng-star-inserted">Nagaland</option>
                                        <option _ngcontent-c7="" value="332" <?php if($bus_idState == 332){?> selected="selected"<?php }?> class="ng-star-inserted">Odisha</option>
                                        <option _ngcontent-c7="" value="333" <?php if($bus_idState == 333){?> selected="selected"<?php }?> class="ng-star-inserted">Punjab</option>
                                        <option _ngcontent-c7="" value="334" <?php if($bus_idState == 334){?> selected="selected"<?php }?> class="ng-star-inserted">Rajasthan</option>
                                        <option _ngcontent-c7="" value="335" <?php if($bus_idState == 335){?> selected="selected"<?php }?> class="ng-star-inserted">Sikkim</option>
                                        <option _ngcontent-c7="" value="336" <?php if($bus_idState == 336){?> selected="selected"<?php }?> class="ng-star-inserted">Tamil Nadu</option>
                                        <option _ngcontent-c7="" value="337" <?php if($bus_idState == 337){?> selected="selected"<?php }?> class="ng-star-inserted">Tripura</option>
                                        <option _ngcontent-c7="" value="338" <?php if($bus_idState == 338){?> selected="selected"<?php }?> class="ng-star-inserted">Uttarakhand</option>
                                        <option _ngcontent-c7="" value="339" <?php if($bus_idState == 339){?> selected="selected"<?php }?> class="ng-star-inserted">Uttar Pradesh</option>
                                        <option _ngcontent-c7="" value="340" <?php if($bus_idState == 340){?> selected="selected"<?php }?> class="ng-star-inserted">West Bengal</option>
                                        <option _ngcontent-c7="" value="341" <?php if($bus_idState == 341){?> selected="selected"<?php }?> class="ng-star-inserted">Andaman and Nicobar Islands</option>
                                        <option _ngcontent-c7="" value="342" <?php if($bus_idState == 342){?> selected="selected"<?php }?> class="ng-star-inserted">Chandigarh</option>
                                        <option _ngcontent-c7="" value="343" <?php if($bus_idState == 343){?> selected="selected"<?php }?> class="ng-star-inserted">Dadra and Nagar Haveli</option>
                                        <option _ngcontent-c7="" value="344" <?php if($bus_idState == 344){?> selected="selected"<?php }?> class="ng-star-inserted">Daman and Diu</option>
                                        <option _ngcontent-c7="" value="345" <?php if($bus_idState == 345){?> selected="selected"<?php }?> class="ng-star-inserted">Delhi</option>
                                        <option _ngcontent-c7="" value="346" <?php if($bus_idState == 346){?> selected="selected"<?php }?> class="ng-star-inserted">Lakshadweep</option>
                                        <option _ngcontent-c7="" value="347" <?php if($bus_idState == 347){?> selected="selected"<?php }?> class="ng-star-inserted">Puducherry</option>
                                        <option _ngcontent-c7="" value="348" <?php if($bus_idState == 348){?> selected="selected"<?php }?> class="ng-star-inserted">Telangana</option>
                                    </select>
                                    <!---->
                                </div>
                            </div>
    
                            <div _ngcontent-c7="" class="moglix-form relative h-45 mar-b-25 business-res-margin">
                                <input _ngcontent-c7="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-valid isFocus" name="bus_pan" type="text" value="<?php echo $bus_pan ;?>">
                                <label _ngcontent-c7="">PAN (optional)</label>
                            </div>

                            <div _ngcontent-c7="" class="form-group pad-tb-10 no-margin" style="visibility: hidden;">
                                <label _ngcontent-c7="">
                                    <input _ngcontent-c7="" name="bus_isGstInvoice" style="display: none !important;" class="ng-untouched ng-pristine ng-valid" type="checkbox" value="<?php echo $bus_isGstInvoice ;?>">
                                    <span _ngcontent-c7="" class="inline-block pad-l- text-blue checkbox">Need tax invoice for my purchases.</span>
                                </label>
                            </div>
                        </div>
                   </div>

                    <!---->
                    <div _ngcontent-c7="" class="form-group pad-tb-10 no-margin">
                        
                        <input type="submit" name="submit" class="btn w-200 f-size-14 h-45 bg-orange text-white" value="Save Changes" />

                        
                    </div>
                </form>
            </div>

            



        </div>
    </div>
</section>
</bussiness-detail>
        </div>
    </div>
</section>
</bussiness>
</div>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script>
jQuery(document).ready(function($){
	$("#business_detailp").validate({ 
		
        rules: {           
            
			 "bus_companyName": "required",
			 "bus_email": "required",
			 "bus_phone": "required",
			 "bus_addressLine": "required",
			 "bus_postCode": "required",
			 "bus_idState": "required",
			
			
        },
		
		
       	
        submitHandler: function(form) {
            //Your code for AJAX starts   
			 
            values = $("#business_detailp").serialize();
			
			
            jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/business_detailp.php?action=<?php echo $action; ?>',
                         type: "post",
                         data: values,
                        success: function(){
							
                            //alert("success");
                            alert('Submitted successfully');
							$("#business_detailp")[0].reset();
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