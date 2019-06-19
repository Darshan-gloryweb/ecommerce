<?php require_once('db.php'); 
 include('include/start_session.php'); ?>
<?php  $title = 'Proceed To Checkout | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>
<?php //require_once('productfunction.php'); ?>
<?php 
	if(isset($_SESSION['Email'])) {
		$email = $_SESSION['Email'];
	}else{?>
		<script>window.location = "<?php echo $frontpath;?>/login.php";</script>
<?php }?>
<script type= "text/javascript" src = "<?php echo $frontpath;?>/js/countries.js"></script>
<script type= "text/javascript" src = "<?php echo $frontpath;?>/js/editaddress_custom.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


  

<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bussiness _nghost-c4="" class="ng-star-inserted"><section _ngcontent-c4="" class="container-fluid dashboard">
    <div _ngcontent-c4="" class="row row-eq-height mar-t-20 mar-b-10 ">
        <div _ngcontent-c4="" class="mob_nav_tab hidden_desktop mar-tb-20">
            <span _ngcontent-c4="" class=""><em _ngcontent-c4="">Address</em> <i _ngcontent-c4="" class="triangle-bottom"></i> </span>
        </div>
        
        <?php require_once('dashboard-left-sidebar.php'); ?>
        
        <div _ngcontent-c12="" class="pad-tb-20 business_wrap bg-white">
            <router-outlet _ngcontent-c12=""></router-outlet><bussiness-address _nghost-c18="" class="ng-tns-c18-14 ng-star-inserted"><div _ngcontent-c18="" class="ng-tns-c18-14">
    <div _ngcontent-c18="" class="col-md-12">
        <div _ngcontent-c18="" class="header-tabs clearfix pad-b-10 mar-b-5 border-b-s">
            <h2 _ngcontent-c18="" class="f-size-16 pull-left pad-l-10">ADDRESS:</h2>
        </div>
    </div>    
    <div _ngcontent-c18="" class="clear"></div>
    <router-outlet _ngcontent-c18="" class="ng-tns-c18-14"></router-outlet><tax-address _nghost-c24="" class="ng-tns-c24-28 ng-star-inserted"><div _ngcontent-c24="" class="ng-tns-c24-28">    
    <delivery-address _ngcontent-c24="" class="ng-tns-c24-28"><loader _nghost-c15=""><!---->
</loader>
<!---->


<!----><div class="ng-star-inserted">
  <div class="container full_view pad-lr-0">
    <div class=" ">
    
    <?php
	$sqlalladd = "select * from customeraddress where CustomerID=" . $_SESSION['CustomerID'];
	$alladd_res = mysqli_query($dbLink, $sqlalladd) or die('Could Not Select address');
	?>
    <div class="col-sm-6 mar-b-xxs-20 mar-t-30 ng-star-inserted add_list">
        <h3 class="pad-b-10 f-size-16 f-size-sm-14 text-uppercase border-b mar-b-10">Shipping Address (<?php echo mysqli_num_rows($alladd_res);?>)</h3>
        <h3 class="o-hidden pointer text-uppercase pad-tb-20 pad-lr-20 pad-lr-sm-15 pad-tb-sm-15 border text-blue mar-b-15 text-500 f-size-15 f-size-sm-13 add_shipp_add_btn">
          + Add shipping address
        </h3>
        <ul class="no-padding no-margin no-list-style address_block ng-star-inserted">
    <?php
	
	if (mysqli_num_rows($alladd_res) > 0)
		{
		while ($alladd_data = $alladd_res->fetch_assoc())
			{
				
?>
<input type="hidden" value="<?php echo $alladd_data['CustomerAddressID'];?>" name="checkoutAddressIndex">
    			<li class="border pad-lr-30 pad-lr-xs-20 pad-tb-25 wp-100 relative mar-b-xs-5 mar-b-15 ng-star-inserted">
                  
                  <ul class="address_menu no-margin no-padding no-list-style w-175 absolute bg-white right-25 top-20 border z-index ng-star-inserted" id="hideaddressdiv" style="box-shadow: 0px 2px 6px #d6d5d5 !important;">
                <li class="pointer f-size-14 text-grey address_edit_btn" id="edit-btn">Edit</li>
                <li class=" pointer f-size-14 text-grey address_dlt_btn">Delete</li>
              </ul>
              
                  <i aria-hidden="true" class="pad-lr-5 address-menu-icon pointer absolute f-size-16 top-20 right-20 fa fa-ellipsis-v"></i>
                  <h3 class="f-size-16">  <?php echo $alladd_data['FirstName']; ?></h3>
                  <p class="text-grey pad-tb-5 text-400 lh-22" style="word-wrap: break-word;"> <?php echo $alladd_data['AddressLine1'] . ', ' . $alladd_data['City'] . ', ' . $alladd_data['StateID'] . ', ' . $alladd_data['CountryID'] .' - '.$alladd_data['Zipcode']?></p>
                  <p class="text-grey pad-t-5 text-400 no-margin">Mobile : <b> <?php echo $alladd_data['Phone'];?> </b></p>
                </li>
                
                
                  
                  <?php
			}
		}

	?>
    </ul>
    
      </div>
      <div class="col-sm-12 col-xs-12 col-md-12 no-padding">
        <form name="order" id="address_form" action="#">
                    <div class="ng-star-inserted">
                      <div class="row pad-lr-15 pad-tb-20 wp-xs-100 no-margin-xs relative pad-lr-xs-0 ng-star-inserted address-field" id="address-form" style="width:100%; overflow: hidden;">
                        <address _nghost-c19="">
                        <div _ngcontent-c19="" class="ad_new row pad-lr-30 pad-tb-30 no-margin-xs no-padding-sm wp-xs-100 add-pad add-res-pad">
                          <div _ngcontent-c19="" class="pad-b-40 f-size-16 text-uppercase text-500 pad-lr-xs-15 text-padding">Add Shipping Address</div>
                          <input _ngcontent-c19="" formcontrolname="idAddress" value="" class="ng-untouched ng-pristine ng-valid" type="hidden">
                          <!--<input type="hidden" id="valid" value="valid" name="valid" />
                        <input type="hidden" name="addressnew" id="addressnew" />-->
                          <div _ngcontent-c19="" class="col-sm-6 col-md-4 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 name-field">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bfname" id="bfname" value="" placeholder="" type="text">
                              <label _ngcontent-c19="">Name*</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-5 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 mail-field">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bemail" id="bemail" value="<?php echo $add_email
?>"  placeholder="" type="text">
                              <label _ngcontent-c19="">Email*</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-4 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 phone-field">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bphone" id="b1phone" maxlength="10" value="<?php echo $add_phone
?>" placeholder="" type="text">
                              <label _ngcontent-c19="">Phone Number*</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-5 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 pincode-field">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bzipcode" id="bzipcode" maxlength="5" value="<?php echo $add_zipcode
?>" placeholder="" type="text">
                              <label _ngcontent-c19="">Pincode *</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-12 col-md-9 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 add-field">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="baddress1" id="baddress1" value="<?php echo $add_address1 ?>" placeholder="" type="text">
                              <label _ngcontent-c19="">Address*</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-4 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 city-field">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bcity" id="bcity" value="<?php echo $add_city ?>" placeholder="" type="text">
                              <label _ngcontent-c19="">City/District/Town*</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-5 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-55 country-field">
                              <p _ngcontent-c19="" class="text-grey mar-b-10 f-size-12 relative top--17">Country*</p>
                              <select id="country" name ="bcountry" class="changed-select relative top--26 form-control no-border border-dark-b border-r-0 pad-l-0 wp-100 ng-pristine ng-valid ng-touched login-field">
                              </select>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-4 mar-b-15">
                            <div _ngcontent-c19="" class="moglix-form relative h-45 state-field">
                              <p _ngcontent-c19="" class="text-grey mar-b-10 f-size-12 relative top--17">State*</p>
                              <select name ="bstate" id ="state" class="relative top--26 form-control no-border border-dark-b border-r-0 pad-l-0 wp-100 ng-pristine ng-valid ng-touched login-field">
                              </select>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6  col-md-5 mar-b-5 mar-t-10 less-margin">
                            <div _ngcontent-c19="" class="moglix-form relative h-45">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-valid login-field" formcontrolname="landmark" placeholder="" type="text" name="blandmark" id="blandmark">
                              <label _ngcontent-c19="">Landmark (Optional)</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="col-sm-6 col-md-4 mar-b-5 mar-t-10 clear_float">
                            <div _ngcontent-c19="" class="moglix-form relative h-45">
                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-valid login-field"  formcontrolname="gstin" placeholder="" type="text" name="bgstin" id="bgstin">
                              <label _ngcontent-c19="" class="ng-star-inserted">GSTIN (Optional)</label>
                            </div>
                          </div>
                          <div _ngcontent-c19="" class="clearfix"></div>
                          <div _ngcontent-c19="" class="col-sm-12 mar-t-5 pad-lr-xs-5 o-hidden">
                           <input type="submit" name="submit new-save" value="Cancel"  class="f-left btn bg-back_btn h-45 f-size-14 text-white border-r-3 f-left can_btn"/>
                            <input type="hidden" name="bbb" id="bbb" value="1">
                            <input type="hidden" name="cusaddid" id="cusaddid" value="">
                            <input type="submit" name="submit new-save" id="savv_btn" value="SAVE ADDRESS"  class="f-left btn bg-orange h-45 f-size-14 text-white w-180 border-r-3 f-left mar-l-10 save_btn"/>
                          </div>
                           
                        </div>
                        </address>
                       
                      </div>
                    </div>
                  </form>
      </div>
    
    </div>
  </div>
</div></delivery-address>
</div>
</tax-address>
</div>
<div _ngcontent-c18="" class="clear"></div>
</bussiness-address>
        </div>
    </div>
</section>
</bussiness>
</div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
      $(".login-field").keyup(function(){
      $('.login-field').removeClass("isFocus");
        $(this).addClass("isFocus");
  if($('#bfname').val()) {
							 	$('#bfname').addClass('isFocus');
							 }
 if($('#bemail').val()) {
							 	$('#bemail').addClass('isFocus');
							 }
  if($('#b1phone').val()) {
							 	$('#b1phone').addClass('isFocus');
							 }
  if($('#bzipcode').val()) {
							 	$('#bzipcode').addClass('isFocus');
							 }
  if($('#baddress1').val()) {
							 	$('#baddress1').addClass('isFocus');
							 }
  if($('#bcity').val()) {
							 	$('#bcity').addClass('isFocus');
							 }
  if($('#blandmark').val()) {
							 	$('#blandmark').addClass('isFocus');
							 }
  if($('#bgstin').val()) {
							 	$('#bgstin').addClass('isFocus');
							 }
 
    });

  });

</script>
<script type="text/javascript">
  $(document).mouseup(function (e)
                    {
  var cont = $("#hideaddressdiv"); // YOUR CONTAINER SELECTOR

  if (!cont.is(e.target) // if the target of the click isn't the container...
      && cont.has(e.target).length === 0) // ... nor a descendant of the container
  {
    cont.hide();
  }
});
</script>
  <style>
[class*=" icon-"]::before, [class^="icon-"]::before {
    font-family: !icomooon important;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
  </style>

 <?php require_once('footer.php');?>