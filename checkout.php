<?php

require_once ('db.php');

include ('include/start_session.php');

$title = 'Proceed To Checkout | ' . $mywebsitename; 

require_once ('include/function.php');

require_once ('header.php');

require_once ('productfunction.php');

?>

<script type="text/javascript" src="<?php echo $frontpath;?>/js/cart-custom.js"></script>

<script type= "text/javascript" src = "<?php echo $frontpath;?>/js/countries.js"></script>

<script type= "text/javascript" src = "<?php echo $frontpath;?>/js/chekout_custom.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<?php

$sql = "select * from paypal";

$res = mysqli_query($dbLink, $sql) or die('Could Not Select Paypal');

$paydata = $res->fetch_assoc();

$cancel_url = $paydata['cancel_url'];

$return_url = $paydata['return_url'];

$business = $paydata['business'];

?>



<div _ngcontent-c14="" class="container pad-t-15 tab_container checkout-container">

  <div _ngcontent-c14="" class="row pad-tb-10">

    <div _ngcontent-c14="" class="col-sm-8 col-xs-12 no-padding w-sm-100 login_container">

      <div _ngcontent-c12="" class="login_block mar-b-20 bg-white box-shadow">

        <div class="panel checkout-step" id="1">

          <h3 _ngcontent-c4="" class="pad-tb-15 pad-lr-15 f-size-16 clearfix bg-darkblue text-white head-text">

            <i _ngcontent-c4="" class="icon-checkout_check checked-mark ng-star-inserted"></i> <span _ngcontent-c4="" class="inline-block mar-r-5">1.</span>

            <span>Login / Sign Up </span>

            <span _ngcontent-c4="" class="pull-left text-grey f-size-14 hidden-sm-down user_name pad-lr-30 pad-sm-lr-15 ng-star-inserted hidden-field">

            <?php

echo $_SESSION['FirstName']; ?>

            </span> <span _ngcontent-c4="" class="pull-left text-grey f-size-14 hidden-sm-down ng-star-inserted hidden-field">

            <?php

echo $_SESSION['Email']; ?>

            </span>

            <button _ngcontent-c4="" class="f-right bg-trans edit-btn-text pad-l-20 pad-tb-5 f-size-14 text-500 relative top--5 ng-star-inserted" type="button" id="login_edit">Edit</button>

          </h3>

          <?php



			

if (isset($_SESSION['CustomerID']) && !isset($_SESSION['Email'])){ ?>

          <div _ngcontent-c14="" class="row pad-b-40 pad-t-30 pad-lr-30 pad-lr-xs-0 ng-star-inserted login_chk_form">

            <div _ngcontent-c14="" class="pad-tb-10 pad-lr-60 pad-lr-xs-40 col-sm-6 divider-r">

              <div _ngcontent-c14="" class="beforeLogin ng-star-inserted">

                <login _ngcontent-c14="" _nghost-c15="" class="ng-tns-c15-0">

                  <h3 _ngcontent-c15="" class="text-500 f-size-18 pad-b-20 ng-tns-c15-0 ng-star-inserted">LOGIN / SIGNUP</h3>

                  <form _ngcontent-c5="" class="form-horizontal ng-tns-c5-0 ng-untouched ng-pristine ng-invalid ng-star-inserted" novalidate>

                    <div _ngcontent-c5="" class="ng-tns-c5-0 ng-untouched ng-pristine ng-invalid ng-star-inserted" formgroupname="step1">

                      <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-5">

                        <input type="text" name="username" id="username" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid login_email_id login-field" size="57"  _ngcontent-c5=""/>

                        

                        <!--<input _ngcontent-c5="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid" formcontrolname="email" placeholder="" type="text">-->

                        

                        <label _ngcontent-c5="" class="ng-tns-c5-0">Enter Email id*</label>

                        <p _ngcontent-c5="" class="email-error f-size-10 text-red text-500 absolute top-35 ng-tns-c5-0 ng-star-inserted">Kindly enter valid email id</p>

                      </div>

                    </div>

                    <div _ngcontent-c5="" class="ng-tns-c5-0 ng-untouched ng-pristine ng-invalid ng-star-inserted password_div" formgroupname="step1">

                      <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-5">

                        <input type="password" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="password" id="password" onKeyPress="capLock(event)" value="" size="57"  required/>

                        <label _ngcontent-c5="" class="ng-tns-c5-0">Password</label>

                      </div>

                    </div>

                    <input type="hidden" name="enter_email" value="">

                    <input type="button" class="login_btn callback_btn btn bg-orange h-45 f-size-14 mar-t-5 form-control text-white border-r-3 login_continue" value="submit" disabled="disabled" style="text-align:center !important; padding:0 !important;">

                    <!--<button _ngcontent-c5="" class="btn bg-orange h-45 f-size-14 mar-t-5 form-control text-white border-r-3 login_continue mar-t-30 ng-tns-c5-0 ng-star-inserted login_btn" disabled="disabled">CONTINUE</button>-->

                  </form>

                  <form class="rgister_form">

                    <div _ngcontent-c5="" class="callback_wrap mar-t-40">

                      <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                        <input type="text" name="username" id="username" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid" size="57"  _ngcontent-c5=""/>

                        <label _ngcontent-c5="" class="ng-tns-c5-0">Email Id</label>

                      </div>

                      <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                        <input _ngcontent-c5="" class="form-control no-border border-dark-b border-r-0 pad-l-0" placeholder="" type="text" name="FirstName">

                        <label _ngcontent-c5="" class="ng-tns-c5-0">Name</label>

                      </div>

                      <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                        <input _ngcontent-c5="" class="form-control no-border border-dark-b border-r-0 pad-l-0" placeholder="" type="text"  name="PhoneNumber">

                        <label _ngcontent-c5="" class="ng-tns-c5-0">Mobile Number</label>

                      </div>

                      <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                        <input type="password" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid" name="password123" id="password123" value="" size="57" />

                        <label _ngcontent-c5="" class="ng-tns-c5-0">Password</label>

                      </div>

                      <input type="button" class="rgister_btn btn callback_btn" value="submit">

                      <!--<input _ngcontent-c5="" class="btn callback_btn" value="submit" type="submit">--> 

                    </div>

                  </form>

                </login>

              </div>

            </div>

            <div _ngcontent-c14="" class="col-sm-6 no-padding pad-lr-30 pad-tb-10 pad-lr-60 pad-lr-xs-40 text-center ng-star-inserted social-tabs">

              <div _ngcontent-c14="" class="checkout_social">

                <social-login _ngcontent-c14="">

                  <button class="pull-left f-size-13 text-500 mar-b-25 bg-darkblue wp-48 no-border text-white pad-tb-10 h-45 wp-sm-100 mar-t-xs-10 border-r-3 relative-xs" title="Login with Facebook"> <span class="text-white inline-block "><i aria-hidden="true" class="fa fa-facebook fb-tab inline-block f-size-22 pad-r-5 text-white pull-left"></i> LOGIN WITH FACEBOOK</span> </button>

                  <button class="pull-right f-size-13 text-500 btn-google wp-48 wp-sm-100 no-border text-white  pad-tb-10 h-45 border-r-3" title="Login with Gmail"> <span class="text-white inline-block "><i aria-hidden="true" class="fa fa-google-plus fb-tab inline-block f-size-22 pad-r-5 text-white pull-left"></i> LOGIN WITH GOOGLE</span> </button>

                  <button class="activate-window" style="position: absolute; right: 100px; opacity:0; z-index: -9" type="button"></button>

                </social-login>

              </div>

            </div>

          </div>

          <?php }?>

          <div _ngcontent-c14="" class="pad-tb-10 pad-lr-60 pad-lr-xs-40 col-sm-12 des_loginuser" id="login_section"> 

            <!---->

            <div _ngcontent-c14="" class="afterLogin ng-star-inserted">

              <profile _ngcontent-c14="" _nghost-c16="">

                <div _ngcontent-c16="" class="pad-tb-10">

                  <p _ngcontent-c16="" class="b-text text-black pad-b-10 f-size-13 f-size-xs-14">We will send order details to this email address or mobile number.</p>

                  <h3 _ngcontent-c16="" class="text-400 text-black f-size-14 mar-b-0">Logged in as <?php echo $_SESSION['Email'];?></h3>

                  <p _ngcontent-c16="" class="text-500 text-black pad-b-10 f-size-13 f-size-xs-14 hidden-sm-up mar-t-10">Tap on CONTINUE button to proceed</p>

                  

                  <!---->

                  <div _ngcontent-c16="" class="pad-t-15 o-hidden ng-star-inserted"> </div>

                  <!---->

                  <continue _ngcontent-c16="" class="ng-star-inserted">

                    <div class="bottom_stick_wrap">

	<span class="col-xs-6 fixed_price f-left inline-block f-size-16 b-text mar-t-15"> ₹ 648.00 </span>



	<div class="col-md-12 col-sm-12 col-xs-6 half_mob">

		<button class="btn bg-orange pad-tb-15 pad-lr-35 text-white border-r-3 h-45 text-500 f-size-14 continue_next" id="login_continue_btn">CONTINUE</button>

	</div>



</div>

                  </continue>

                </div>

              </profile>

            </div>

          </div>

        </div>

      </div>

      <div class="panel checkout-step address_block mar-b-15 bg-white box-shadow clearfix btm-padding bottom-padding" id="2" disabled>

          <div role="tab" id="heading-2" class=""> 

            <!--<span class="checkout-step-number">2</span>-->

            <h3 _ngcontent-c14="" class="pad-tb-15 pad-lr-15 f-size-16 clearfix pad-l-10 text-cent address_head" style="margin-bottom: 0px;">

            

                <!----><i _ngcontent-c14="" class="icon-checkout_check checked-mark ng-star-inserted"></i> <span _ngcontent-c14="" class="inline-block mar-r-5">2.</span>

                <span>Address </span>

              <!----><span _ngcontent-c14="" class="pull-left text-grey f-size-14 width-cal-240 hidden-sm-down ng-star-inserted address-hide">sdfsdf, Gujarat, INDIA</span> 

              <!---->

              <button _ngcontent-c14="" class="f-right bg-trans1 pad-l-20 pad-tb-5 f-size-14 text-500 edit-btn-text relative top--5 ng-star-inserted edit_2" type="button" id="address_edit">Edit</button>

            </h3>

          </div>

          <?php



if (isset($_SESSION['CustomerID']) && isset($_SESSION['Email']))

	{ ?>

          <div id="collapse-2" class="panel-collapse">

            <div class="checkout-step-body">

              <div class="checout-address-step">

                <div class="row" style="text-align:center;">

                <div class="border box-shadow bg-order pad-lr-10 pad-tb-15 btm-mar lr-mar">

        <label class="pull-right blue-label text-500 height-auto text-center-xs" id="add_address">+ Add Shipping Address</label>

        <h4 class="f-size-14 mar-b-0 shipping_head">Shipping Address (2)</h4>

      </div>

                  <form name="order" id="address_form" action="#">

                    <div class="ng-star-inserted">

                      <div class="row pad-lr-30 pad-tb-20 wp-xs-100 no-margin-xs relative pad-lr-xs-0 ng-star-inserted address-field" id="address-form">

                        <address _nghost-c19="">

                        <div _ngcontent-c19="" class="ad_new row pad-lr-30 pad-tb-30 no-margin-xs no-padding-sm wp-xs-100 add-pad" id="address_sec">

                        

                          <div _ngcontent-c19="" class="pad-b-20 f-size-16 text-uppercase text-500 pad-lr-xs-15 text-padding">Add Shipping Address</div>

                          

                          <input _ngcontent-c19="" formcontrolname="idAddress" value="" class="ng-untouched ng-pristine ng-valid" type="hidden">

                          <!--<input type="hidden" id="valid" value="valid" name="valid" />

                        <input type="hidden" name="addressnew" id="addressnew" />-->

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 name-field">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bfname" id="bfname" value="" placeholder="" type="text">

                              <label _ngcontent-c19="">Name*</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 mail-field">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bemail" id="bemail" value="<?php echo $add_email

?>"  placeholder="" type="text">

                              <label _ngcontent-c19="">Email*</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 phone-field">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bphone" id="b1phone" maxlength="10" value="<?php echo $add_phone

?>" placeholder="" type="text">

                              <label _ngcontent-c19="">Phone Number*</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 pincode-field">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bzipcode" id="bzipcode" maxlength="5" value="<?php echo $add_zipcode

?>" placeholder="" type="text">

                              <label _ngcontent-c19="">Pincode *</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-12 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 add-field">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="baddress1" id="baddress1" value="<?php echo $add_address1 ?>" placeholder="" type="text">

                              <label _ngcontent-c19="">Address*</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 city-field">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="bcity" id="bcity" value="<?php echo $add_city ?>" placeholder="" type="text">

                              <label _ngcontent-c19="">City/District/Town*</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-55 country-field">

                              <p _ngcontent-c19="" class="text-grey mar-b-10 f-size-12 relative top--17">Country*</p>

                              <select id="country" name ="bcountry" class="changed-select relative top--13 form-control no-border border-dark-b border-r-0 pad-l-0 wp-100 ng-pristine ng-valid ng-touched login-field">

                              </select>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-15">

                            <div _ngcontent-c19="" class="moglix-form relative h-45 state-field">

                              <p _ngcontent-c19="" class="text-grey mar-b-10 f-size-12 relative top--17">State*</p>

                              <select name ="bstate" id ="state" class="relative top--26 form-control no-border border-dark-b border-r-0 pad-l-0 wp-100 ng-pristine ng-valid ng-touched login-field">

                              </select>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-5 mar-t-10 less-margin">

                            <div _ngcontent-c19="" class="moglix-form relative h-45">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-valid login-field" formcontrolname="landmark" placeholder="" type="text" name="blandmark" id="blandmark">

                              <label _ngcontent-c19="">Landmark (Optional)</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="col-sm-6 mar-b-5 mar-t-10 clear_float">

                            <div _ngcontent-c19="" class="moglix-form relative h-45">

                              <input _ngcontent-c19="" class="form-control no-border border-dark-b border-r-0 mar-b-10 pad-l-0 ng-untouched ng-pristine ng-valid login-field" formcontrolname="gstin" placeholder="" type="text" name="bgstin" id="bgstin">

                              <label _ngcontent-c19="" class="ng-star-inserted">GSTIN (Optional)</label>

                            </div>

                          </div>

                          <div _ngcontent-c19="" class="clearfix"></div>

                          <div _ngcontent-c19="" class="col-sm-12 mar-t-5 pad-lr-xs-5 o-hidden">

                          <input type="button" name="submit new-save" value="Cancel"  class="f-left btn bg-back_btn h-45 f-size-14 text-white border-r-3 f-left can_btn" id="cancel_btn"/>

                            <input type="hidden" name="bbb" id="bbb" value="1">

                            <input type="hidden" name="cusaddid" id="cusaddid" value="">

                            <input type="submit" name="submit new-save" value="SAVE"  class="f-left btn bg-orange h-45 f-size-14 text-white w-180 border-r-3 f-left mar-l-10 save_btn" id="save_btn"/>

                          </div>

                           

                        </div>

                        </address>

                       

                      </div>

                    </div>

                  </form>

                </div>

                <div class="row l-r-padd">

                  <?php

	$sqlalladd = "select * from customeraddress where CustomerID=" . $_SESSION['CustomerID'];

	$alladd_res = mysqli_query($dbLink, $sqlalladd) or die('Could Not Select address');

	if (mysqli_num_rows($alladd_res) > 0)

		{

		while ($alladd_data = $alladd_res->fetch_assoc())

			{

?>

                  <div class="col-md-4 col-sm-6 mob-m-b-15 address_box">

                    <div class="border f-left block wp-100 address_container mar-tb-15 relative">

                      <div class="pad-lr-10">

                        <div class="address">

                          <label class="text-left wp-100 inline-block pointer">

                          <h3 class="text-left f-size-16 text-400 mar-t-10">

                            <input name="checkoutAddressIndex" value="<?php

			echo $alladd_data['CustomerAddressID']; ?>" type="radio" id="<?php

			echo $alladd_data['CustomerAddressID']; ?>">

                            <span class="radio-text icon-checkout_check mar-r-5"></span> </h3>

                          <h3 class="text-left f-size-16 text-400 mar-t-10">

                            <?php

			echo $alladd_data['FirstName']; ?>

                          </h3>

                          <div class="showFullAddress">

                            <h3 class="addr_sec f-size-13 pad-tb-10 lh-20 mar-t-5 clearfix wp-100 text-left text-400">

                              <?php

			echo $alladd_data['AddressLine1'] . ' ' . $alladd_data['City'] . ' ' . $alladd_data['StateID'] . ' ' . $alladd_data['CountryID'] ?>

                            </h3>

                            <h3 class=""> <span class="f-size-13 text-grey text-400">Mobile : </span><span class="text-black inline-block text-grey mar-t-5 text-400 f-size-14">

                              <?php

			echo $alladd_data['Phone'] ?>

                              </span> </h3>

                            <div class="wp-100 bottom-0 left-0 o-hidden pad-tb-15 border-t-dark absolute address_action">

                              <div class="wp-50 f-left text-center">

                                <p class="f-size-14 text-400 pointer address_edit_btn">EDIT</p>

                              </div>

                              <div class="wp-50 f-left text-center">

                                <p class="f-size-14 text-400 pointer address_delete_btn">DELETE</p>

                              </div>

                            </div>

                          </div>

                          </label>

                        </div>

                      </div>

                    </div>

                  </div>

                  <?php

			}

		}



?>

                </div>

                <div class="col-md-12 col-sm-12 col-xs-6 row pad-b-40 no-pad-address pad-lr-15 mar-tb-15 half_mob">

                

                  <button class="btn bg-orange pad-tb-15 pad-lr-35 text-white border-r-3 h-45 text-500 f-size-14 continue_next_2 f-right" id="address_continue_btn">CONTINUE</button>

                </div>
<continue _ngcontent-c16="" class="ng-star-inserted">

                    <div class="bottom_stick_wrap">

	<span class="col-xs-6 fixed_price f-left inline-block f-size-16 b-text mar-t-15"> ₹ 648.00 </span>



	<div class="col-md-12 col-sm-12 col-xs-6 half_mob">

        <button class="btn bg-orange pad-tb-15 pad-lr-35 text-white border-r-3 h-45 text-500 f-size-14 continue_next" id="address_continue_btn1">CONTINUE</button>

	</div>



</div>

                  </continue>

              </div>

            </div>

          </div>

          <?php

	} ?>

        </div>

      <div class="panel checkout-step address_block mar-b-15 bg-white box-shadow clearfix" id="3" disabled>

          <div role="tab" id="heading-3" class=""> 

            <!--<span class="checkout-step-number">3</span>-->

            <h3 class="pad-tb-15 pad-lr-15 f-size-16 clearfix pad-l-10 text-cent prdt_head"> <a class="disabled" role="button" data-toggle="collapse"  data-parent="#accordion" href="#collapse-3" id="head-3" > 3. Product Summary</a> 

            <button _ngcontent-c14="" class="f-right bg-trans2 pad-l-20 pad-tb-5 f-size-14 text-500 edit-btn-text relative top--5 ng-star-inserted edit_2" type="button" id="product_edit">Edit</button>

            </h3>

          </div>

          <?php



if (isset($_SESSION['CustomerID']) && isset($_SESSION['Email']))

	{ ?>

          <div id="collapse-3" class="panel-collapse collapse">

            <div class="checkout-step-body checkout-step-product-details">

              <div class="checout-address-step">

                <div class="row">

                	<div class="col-sm-12">

                  		<div class="order-item">

                    <div class="row bg-grey1 text-left pad-tb-15  hidden-sm-down  mar-lr-0 res-hide">

                      <div class="col-xs-2 col-sm-2 no-padding">

                        <p class="pad-l-20 text-black">Item Details</p>

                      </div>

                      <div class="col-xs-4 col-sm-4 text-black"></div>

                      <div class="col-xs-2 col-sm-2 text-black">Unit Price</div>

                      <div class="col-xs-2 col-sm-2 text-black">Quantity</div>

                      <div class="col-xs-2 col-sm-2 text-black text-right">Total</div>

                    </div>

                    <?php

	while ($cart_data = $cart_res->fetch_assoc())

		{ ?>

                    <div class="row pad-t-20 pad-b-15 text-left border-b mob-p-l-15 mob-r-m-r cart_row">

                      <div class="col-xs-4 col-md-2 text-center pad-l-45 no-padding-sm pad-lr-xs-10 min-h-105"> <img class="img-fluid border inline-block" tabindex="0" src="<?php echo $frontpath

?>/ProductImage/<?php echo $cart_data['ImageName'] ?>"> </div>

                      <div class="col-xs-8 col-md-4 text-grey relative text-center-xs min-h-105 h-auto-xs mob-ta-l"> <a class="f-size-14 wp-90 block text-blue text-400 lh-20 no-margin-xs mar-r-xs-0 wp-xs-100 pad-lr-xs-15 mar-t-xs-10 mob-p-n mar-b-25" href="<?php echo $frontpath ?>/products/<?php echo str_replace(' ', '_', $cart_data['ProductName']) ?>.php"> <?php echo $cart_data['ProductName'] ?> </a> <span class="f-size-14 absolute inline-block bottom-0 text-500 text-darkgrey pointer top-xs-80 left-xs-150 mob-p-s mob-p-t-15 mob-t-h re-hover-text-red remove_product invisible-rem-btn" id="<?php echo $cart_data['ShoppingCartItemsID'] ?>" >REMOVE</span> </div>

                      <div class="col-xs-4 no-padding col-md-2 text-grey text-center-xs min-h-105 h-auto-xs mob-ta-l clear-l-xs">

                        <?php

		if ($cart_data['is_deal_pro'] == 1)

			{ ?>

                        <div class="mar-tb-xs-15"> <span class="text-darkgrey block f-size-16 pro_price" data-value="<?php

			echo $cart_data['SalePrice']; ?>">

                          <?php

			echo '₹' . $cart_data['SalePrice']; ?>

                          </span> <span class="text-darkgrey block line-through mar-tb-5 pad-t-5 f-size-12 b-text">

                          <?php

			echo '₹' . $cart_data['Price']; ?>

                          </span> <span class="text-green block text-500 mar-t-10 f-size-12">[

                          <?php

			echo $cart_data['discount_lable']; ?>

                          % OFF]</span> </div>

                        <?php

			}

		  else

			{ ?>

                        <div class="mar-tb-xs-15"> <span class="text-darkgrey block f-size-16 pro_price" data-value="<?php

			echo $cart_data['Price']; ?>">

                          <?php

			echo '₹' . $cart_data['Price']; ?>

                          </span> </div>

                        <?php

			} ?>

                      </div>

                      <div class="col-xs-8 no-padding col-md-2 text-grey text-center-xs min-h-105 h-auto-xs minh-auto-xs mob-ta-l final_qty">

                        <div class="mob-ta-r pad-lr-xs-15">

                          <div class="input-group"> <span class="inline-block h-20 w-20 border-black text-center f-size-18 border-r-50 pointer qty_sub" style="border: 1px solid #53534F !important; color: #53534F !important;" id="qty_sub">-</span>

                            <input class="text-center pad-tb-5 wp-40 mar-lr-5 qty_field" maxlength="3" onkeypress="if(window.event.keyCode > 31 &amp;&amp; (window.event.keyCode < 48 || window.event.keyCode > 57)){ return false; }" style="border-radius: 3px; border: 1px solid #53534F;" type="text"  value="<?php echo $cart_data["Quantity"] ?>">

                            <span class="inline-block h-20 w-20 border-black text-center f-size-16 border-r-50 pointer qty_add" style="border: 1px solid #53534F !important; color: #53534F !important;line-height: 1.1;" id="qty_add">+</span>

                            <span class="f-size-14 absolute inline-block bottom-0 text-500 text-darkgrey pointer top-xs-custom left-xs-custom mob-p-s mob-p-t-15 mob-t-h re-hover-text-red remove_product visible-rem-btn" id="id="<?php echo $cart_data['ShoppingCartItemsID'] ?>"">REMOVE</span>

                            

                             </div>

                        </div>

                        

                      </div>

                      <div class="col-xs-12 no-padding col-sm-2 text-right text-center-xs mar-t-xs-20 min-h-105 hidden-sm-down wp-xs-auto pad-lr-10 final_total">

                        <?php

		if ($cart_data['is_deal_pro'] == 1)

			{

			$pro_price = $cart_data['SalePrice'];

			}

		  else

			{

			$pro_price = $cart_data['Price'];

			}



		$pro_qty = $cart_data["Quantity"];

		$pro_total = $pro_price * $pro_qty;

?>

                        <p class="b-text f-size-15 text-darkgrey pro_total checkout_total" data-value="<?php

		echo $pro_total; ?>">₹

                          <?php

		echo $pro_total; ?>

                        </p>

                      </div>

                      <div class="clearfix"></div>

                    </div>

                    <?php

		$total = $total + $pro_total;

		}



?>

                    <input type="hidden" value="<?php

	echo $total; ?>" name="cart_total" />

                  </div>

                 	</div>

                </div>

                <div class="row"> 

                  <!-- Button -->

                  <div class="form-group">

                    <label class="control-label sr-only" for="next">next</label>

                    <div class="o-hidden pad-lr-30 pad-tb-30 no-padding-sm pad-tb-xs-15 mob-b-c mob-fixed col-sm-12 mobile-proceed-fixed pad-r10 checkout-next"> <a class="pad-lr-20 no-border h-45 text-white bg-orange f-right mar-l-20 border-r-3 no-margin-xs proceed_btn mar-r-xs-15 mob-b-full text-500 f-size-15 f-size-xs-13 nextBtn proceed_btn" type="button" id="proceed_payment_btn" >Proceed to Payment</a> <a class="collapsed btn btn-default pad-lr-20 no-border h-45 text-white bg-orange f-right mar-l-20 border-r-3 no-margin-xs proceed_btn mar-r-xs-15 mob-b-full text-500 f-size-15 f-size-xs-13" id="goto-3" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" style="display:none;">Next</a> </div>

                  </div>

                </div>
<continue _ngcontent-c16="" class="ng-star-inserted">

                    <div class="bottom_stick_wrap">

	<span class="col-xs-5 fixed_price f-left inline-block f-size-16 b-text mar-t-15"> ₹ 648.00 </span>



	<div class="col-xs-7 half_mob">

		<button class="btn bg-orange pad-tb-15 pad-lr-35 text-white border-r-3 h-45 text-500 f-size-12 continue_next" id="proceed_payment_btn1" style="padding: 20px 10px !important;">Proceed to Payment</button>
	</div>



</div>

                  </continue>

              </div>

            </div>

          </div>

          <?php

	} ?>

        </div>

      <div class="panel checkout-step address_block mar-b-15 bg-white box-shadow clearfix" id="4">

          <div role="tab" id="heading-4" class=""> 

            <!--<span class="checkout-step-number">4</span>-->

            <h3 class="pad-tb-15 pad-lr-15 f-size-16 clearfix pad-l-10 text-cent payment_head"> <a class="disabled collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-4"  > 4. Payment Methods </a> </h3>

          </div>

          <div id="collapse-4" class="panel-collapse collapse">

            

           <!--   <div class="row">

                <?php

$credit_detail = "select * from customercreditcard where CustomerID=" . $_SESSION['CustomerID'];

$credit_res = mysqli_query($dbLink, $credit_detail) or die('Could Not Select');

$credit_data = $credit_res->fetch_assoc();

?>

                <div class="checkout_table" style="margin:15px; width:47%;">

                  <table width="100%" cellpadding="0" cellspacing="0">

                    <tr>

                      <th> <strong>Card Details</strong></th>

                    </tr>

                    <tr>

                      <td> Name On CreditCard<br />

                        <input type="text" name="nameoncard" id="nameoncard" size="50" maxlength="40" value="<?php echo $credit_data['CreditCardName'] ?>" /></td>

                    </tr>

                    <tr>

                      <td>Select Card Type<br />

                        <select name="creditCardType" id="creditCardType" class="type" onChange="javascript:generateCC(); return false;">

                          <option <?php



if ($credit_data['CreditCardType'] == "Visa")

	{

	echo "selected='selected'";

	} ?> value="Visa">Visa</option>

                          <option <?php



if ($credit_data['CreditCardType'] == "MasterCard")

	{

	echo "selected='selected'";

	} ?> value="MasterCard">MasterCard</option>

                          <option <?php



if ($credit_data['CreditCardType'] == "Discover")

	{

	echo "selected='selected'";

	} ?> value="Discover">Discover</option>

                          <option <?php



if ($credit_data['CreditCardType'] == "Amex")

	{

	echo "selected='selected'";

	} ?> value="Amex">American Express</option>

                        </select></td>

                    </tr>

                    <tr>

                      <td>Card Number<br />

                        <input type="text" value="<?php echo $credit_data['CreditCardNumber'] ?>" maxlength="16" name="creditCardNumber" id="creditCardNumber"  size="50"/></td>

                    </tr>

                    <tr>

                      <td> Expiration Date<br />

                        <select name="expDateMonth" id="expDateMonth" style="width:70px;float:left;margin-right:10px;">

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "01")

	{

	echo "selected='selected'";

	} ?> value=1>01</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "02")

	{

	echo "selected='selected'";

	} ?> value=2>02</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "03")

	{

	echo "selected='selected'";

	} ?> value=3>03</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "04")

	{

	echo "selected='selected'";

	} ?> value=4>04</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "05")

	{

	echo "selected='selected'";

	} ?> value=5>05</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "06")

	{

	echo "selected='selected'";

	} ?> value=6>06</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "07")

	{

	echo "selected='selected'";

	} ?> value=7>07</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "08")

	{

	echo "selected='selected'";

	} ?> value=8>08</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "09")

	{

	echo "selected='selected'";

	} ?> value=9>09</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "10")

	{

	echo "selected='selected'";

	} ?> value=10>10</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "11")

	{

	echo "selected='selected'";

	} ?> value=11>11</option>

                          <option <?php



if ($credit_data['CreditCardExpMonth'] == "12")

	{

	echo "selected='selected'";

	} ?> value=12>12</option>

                        </select>

                        <select name="expDateYear" id="expDateYear" style="width:100px;float:left">

                          <?php



for ($i = 2010; $i <= 2025; $i++)

	{

?>

                          <option <?php

	if ($credit_data['CreditCardExpYear'] == $i)

		{

		echo "selected='selected'";

		} ?> value="<?php echo $i ?>"> <?php echo $i

?> </option>

                          <?php

	}



?>

                        </select></td>

                    </tr>

                    <tr>

                      <td> Card Verification Number:<br />

                        <input type=text size="50" value="<?php echo $credit_data['CreditCardVerificationCode'] ?>" maxlength="4" name="cvv2Number" id="cvv2Number"  /></td>

                    </tr>

                  </table>

                </div>

              </div>-->

              <payment _ngcontent-c4=""><loader _nghost-c14=""><!---->

</loader>

<div class="row-eq-height payment_block" style="border: 1px solid #d6d6d6;">

    <div class="col-sm-3 bg-grey1 no-padding min-h-470 minh-auto-xs payment_sidebar">

        <ul class="ullist">

            <!---->

            <li class="pointer f-size-14"><a href="#credit_blocks">Credit/Debit Card</a></li>

            <li class="pointer f-size-14"><a href="#net_blocks">Net Banking</a></li>

            <li class="pointer pad-tb-15 f-size-14"><a href="#wallet_blocks">Wallet</a></li>

            <li class="pointer f-size-14"><a href="#emi_blocks">EMI</a></li>

            <li class="pointer f-size-14"><a href="#cash_blocks">Cash On Delivery</a></li>

            <li class="pointer f-size-14"><a href="#neft_blocks">NEFT/RTGS</a></li>

            <li class="pointer f-size-14"><a href="#upi_blocks">UPI</a></li>

        </ul>

    </div>

    <div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="credit_blocks">

        <!---->



        <!----><credit-debit-card><loader _nghost-c14=""><!---->

</loader>

<div class="credit_card_block pad-lr-10 tab-pane" id="credit_block">

    <form class="form-horizontal ng-untouched ng-pristine ng-invalid" novalidate="">

        <label class="inline-block pad-r-20">

            <input formcontrolname="mode" value="CC" class="ng-untouched ng-pristine ng-valid" type="radio">

            <span class="radio-text icon-checkout_check">Credit Card</span>

        </label> 

        <label class="inline-block pad-lr-20 pad-lr-xs-5">

            <input formcontrolname="mode" value="DC" class="ng-untouched ng-pristine ng-valid" type="radio">

            <span class="radio-text icon-checkout_check inline-block">Debit Card</span>

        </label>

        <div formgroupname="requestParams" class="ng-untouched ng-pristine ng-invalid">

            <div class="mar-tb-10">

                <input ccnumber="" class="h-40 br-3 border pad-l-10 wp-100 ng-untouched ng-pristine ng-invalid" formcontrolname="ccnum" id="cc-number" placeholder="Card Number" type="tel">

            </div>

            <div class="mar-tb-10 o-hidden">

                <div class=" h-40 wp-xs-100">

                    <div class="wp-60 o-hidden f-left">

                        <div class="border br-3 o-hidden wp-60 f-left">

                            <select class="pad-l-5 no-border wp-50 h-40 inline-block bg-white f-left f-size-12 ng-untouched ng-pristine ng-invalid btm-margin" formcontrolname="ccexpmon">

                                <option value="">MM</option>

                                <!----><option value="01">JAN</option><option value="02">FEB</option><option value="03">MAR</option><option value="04">APR</option><option value="05">MAY</option><option value="06">JUN</option><option value="07">JUL</option><option value="08">AUG</option><option value="09">SEP</option><option value="10">OCT</option><option value="11">NOV</option><option value="12">DEC</option>

                            </select>

                            <select class="pad-l-5 no-border wp-50 h-40 inline-block bg-white f-left f-size-12 ng-untouched ng-pristine ng-invalid btm-margin" formcontrolname="ccexpyr">

                                <option value="">YY</option>

                                <!----><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option>

                            </select>

                        </div>

                        <p class="pad-l-10 f-size-14 pad-t-5 wp-40 h-40 inline-block f-left text-blueblack text-400" type="text">Expiry <br>Date</p>

                    </div>

                    <div class="wp-40 o-hidden f-left">

                        <i class="fa fa-credit-card f-size-28 mar-l-10 inline-block f-right lh-40"></i>

                        <input cccvc="" class="w-60 h-40 inline-block f-right border br-3 text-center ng-untouched ng-pristine ng-invalid" formcontrolname="ccvv" id="cc-cvc" placeholder="CVV" type="password">

                    </div>

                </div>

            </div>

            <div class="mar-tb-10">

                <input class="h-40 border br-3 pad-l-10 wp-100 ng-untouched ng-pristine ng-invalid" formcontrolname="ccname" placeholder="Name On Card" type="text">

            </div>

            

            

        </div>

        <div class="">

            <div class="mar-t-5 mar-b-10">

              <label>

                <input formcontrolname="store_card" class="ng-untouched ng-pristine ng-valid" type="checkbox">

                <span class="radio-text icon-checkout_check inline-block f-size-13 pad-r-5">Save this card for faster checkout.</span>

              </label>

            </div>

            <button class="btn bg-orange wp-60 text-white border-r-3 h-45 wp-xs-60 mob-b-full text-500 f-size-16" type="submit" disabled="">PAY <!----><span class="hidden-sm-up text-white">₹ 648.00</span></button>

                <!---->

           

        </div>



    </form>

</div>



<!---->

</credit-debit-card>



        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!---->

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="#" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="#" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

	<div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="net_blocks">

        <!---->



        <!---->



        <!----><net-banking class="ng-star-inserted"><loader _nghost-c14=""><!---->

</loader>

<div class="net_banking_block tab-pane" id="net_block">

    <h3 class="b-text f-size-14 pad-lr-10">Select from Top Banks</h3>

    <div class="o-hidden wp-xs-100">

        <div class="wp-30 wp-xs-43 mar-lr-5 mar-tb-10 f-left  border text-center relative pad-tb-5">

            <label class="pointer" style="margin-bottom: 0px;">

                <input name="selectedBankCode" value="AXIB" type="radio">

                <span class="radio-text icon-checkout_check inline-block absolute top-20 left-10"></span>

                <img class="img-fluid inline-block pad-tb-10 pad-l-xs-10" src="images/bank_axib.png">

            </label>

        </div>

        <div class="wp-30 wp-xs-43 mar-lr-5 mar-tb-10 f-left  border text-center relative pad-tb-5">

            <label class="pointer" style="margin-bottom: 0px;">

                <input name="selectedBankCode" value="AXIB" type="radio">

                <span class="radio-text icon-checkout_check inline-block absolute top-20 left-10"></span>

                <img class="img-fluid inline-block pad-tb-10 pad-l-xs-10" src="images/bank_icib.png">

            </label>

        </div>

        <div class="wp-30 wp-xs-43 mar-lr-5 mar-tb-10 f-left  border text-center relative pad-tb-5">

            <label class="pointer" style="margin-bottom: 0px;">

                <input name="selectedBankCode" value="AXIB" type="radio">

                <span class="radio-text icon-checkout_check inline-block absolute top-20 left-10"></span>

                <img class="img-fluid inline-block pad-tb-10 pad-l-xs-10" src="images/bank_hdfb.jpg">

            </label>

        </div>

      <div class="wp-30 wp-xs-43 mar-lr-5 mar-tb-10 f-left  border text-center relative pad-tb-5">

        <label class="pointer" style="margin-bottom: 0px;">

          <input name="selectedBankCode" value="AXIB" type="radio">

          <span class="radio-text icon-checkout_check inline-block absolute top-20 left-10"></span>

          <img class="img-fluid inline-block pad-tb-10 pad-l-xs-10" src="images/bank_sbib.png">

        </label>

      </div>

    </div>

    <div class="wp-100 o-hidden pad-lr-10 mar-tb-15">

        <form class="form-horizontal ng-untouched ng-pristine ng-valid" novalidate="">

            <div formgroupname="requestParams" class="ng-untouched ng-pristine ng-valid">

                <h3 class="f-size-12">Select Bank</h3>

                <select class="block bg-white mar-t-10 mar-b-20 h-35 wp-60 wp-xs-100 no-border border-dark-b pad-lr-10 ng-untouched ng-pristine ng-valid" formcontrolname="code" name="code" style="border: 1px solid #dcdcdc !important;">

                    <option value="">--Select Bank--</option>

                    <!----><option value="KRKB" class="ng-star-inserted">Karnataka Bank</option><option value="SBHB" class="ng-star-inserted">State Bank of Hyderabad</option><option value="DCBCORP" class="ng-star-inserted">DCB Bank - Corporate Netbanking</option><option value="DSHB" class="ng-star-inserted">Deutsche Bank</option><option value="INGB" class="ng-star-inserted">ING Vysya Bank</option><option value="SOIB" class="ng-star-inserted">South Indian Bank</option><option value="CABB" class="ng-star-inserted">Canara Bank</option><option value="162B" class="ng-star-inserted">Kotak Bank</option><option value="SBMB" class="ng-star-inserted">State Bank of Mysore</option><option value="CITNB" class="ng-star-inserted">Citi Bank NetBanking</option><option value="INDB" class="ng-star-inserted">Indian Bank</option><option value="PNBB" class="ng-star-inserted">Punjab National Bank - Retail Banking</option><option value="IDBB" class="ng-star-inserted">Industrial Development Bank of India</option><option value="UBIB" class="ng-star-inserted">Union Bank of India</option><option value="SBBJB" class="ng-star-inserted">State Bank of Bikaner and Jaipur</option><option value="JAKB" class="ng-star-inserted">Jammu and Kashmir Bank</option><option value="BOIB" class="ng-star-inserted">Bank of India</option><option value="INOB" class="ng-star-inserted">Indian Overseas Bank</option><option value="YESB" class="ng-star-inserted">Yes Bank</option><option value="CSBN" class="ng-star-inserted">Catholic Syrian Bank</option><option value="CBIB" class="ng-star-inserted">Central Bank Of India</option><option value="UBIBC" class="ng-star-inserted">Union Bank - Corporate Netbanking</option><option value="CPNB" class="ng-star-inserted">Punjab National Bank-Corporate</option><option value="DCBB" class="ng-star-inserted">Development Credit Bank</option><option value="FEDB" class="ng-star-inserted">Federal Bank</option><option value="DENN" class="ng-star-inserted">Dena Bank</option><option value="BOMB" class="ng-star-inserted">Bank of Maharashtra</option><option value="CRPB" class="ng-star-inserted">Corporation Bank</option><option value="SBTB" class="ng-star-inserted">State Bank of Travancore</option><option value="UNIB" class="ng-star-inserted">United Bank Of India</option><option value="CUBB" class="ng-star-inserted">CityUnion</option><option value="SRSWT" class="ng-star-inserted">Saraswat Bank</option><option value="INIB" class="ng-star-inserted">IndusInd Bank</option><option value="KRVB" class="ng-star-inserted">Karur Vysya</option><option value="SBPB" class="ng-star-inserted">State Bank of Patiala</option><option value="VJYB" class="ng-star-inserted">Vijaya Bank</option>

                    <!----><option value="SBIB" class="ng-star-inserted">State Bank of India</option><option value="AXIB" class="ng-star-inserted">AXIS Bank NetBanking</option><option value="HDFB" class="ng-star-inserted">HDFC Bank</option><option value="ICIB" class="ng-star-inserted">ICICI Netbanking</option>

                </select>

            </div>

            <div>

               <button class="btn bg-orange wp-60 text-white border-r-3 h-45 wp-xs-60 mob-b-full f-size-16 text-500" type="submit">PAY <!----><span class="hidden-sm-up text-white ng-star-inserted">₹ 648.00</span></button>

                <!---->

            </div>

        </form>

    </div>

</div>



<!---->

</net-banking>



        <!---->



        <!---->



        <!---->



        <!---->



        <!---->

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="http://moglix.com/terms" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="http://moglix.com/privacy" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

    <div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="wallet_blocks">

        <!---->



        <!---->



        <!---->



        <!----><wallet _nghost-c21="" class="ng-star-inserted">

<loader _ngcontent-c21="" _nghost-c14=""><!---->

</loader>

    <div _ngcontent-c21="" class=" wallet_block tab-pane" id="wallet_block">

    <h3 _ngcontent-c21="" class="text-500 f-size-15 pad-lr-10 mar-b-10">Select Wallet</h3>

    <form _ngcontent-c21="" class="form-horizontal ng-untouched ng-pristine ng-valid" novalidate="">

        <div _ngcontent-c21="" class="wp-xs-100 o-hidden pad-l-10">

            <div _ngcontent-c21="" class="pay-box paytm">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/Paytm_logo.png" width="66">

            </div>

            <div _ngcontent-c21="" class="pay-box payu">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/payumoney-logo.png" width="95">

            </div>

            <div _ngcontent-c21="" class="pay-box mobikwik">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/mobiquick.png" width="85">

            </div>

            <div _ngcontent-c21="" class="pay-box airtel">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/airtel.png" width="73">

            </div>

            <div _ngcontent-c21="" class="pay-box freecharge">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/freecharge.png" width="102">

            </div>

            <div _ngcontent-c21="" class="pay-box payzapp">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/payzapp.png" width="93">

            </div>

            <div _ngcontent-c21="" class="pay-box olamoney">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/olamoney.png" width="102">

            </div>

            <div _ngcontent-c21="" class="pay-box oxigen">

                <label _ngcontent-c21="" class="pay-option">

                    <input _ngcontent-c21="" class="pay-input ng-untouched ng-pristine ng-valid" formcontrolname="wType" type="radio">

                    <span _ngcontent-c21="" class="pay-label icon-checkout_check" for="checkbox"></span>

                </label>

                <img _ngcontent-c21="" src="images/oxigen.png" width="85">

            </div>

            



            

        </div>

        <div _ngcontent-c21="" class="wp-100 o-hidden pad-lr-10 mar-tb-15">

            <h3 _ngcontent-c21="" class="f-size-12">You will be redirected to a secure payment gateway wallet.</h3>

        </div>

        <div _ngcontent-c21="" class="pad-lr-10">

            <button _ngcontent-c21="" class="btn bg-orange wp-60 text-white border-r-3 h-45 wp-xs-100 text-500 f-size-16" type="submit">PAY  <!----><span _ngcontent-c21="" class="hidden-sm-up text-white ng-star-inserted">₹ 648.00</span></button>

            

            <!---->

        </div>

    </form>

</div>



<!---->

<!---->

<!---->



</wallet>



        <!---->



        <!---->



        <!---->



        <!---->

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="http://moglix.com/terms" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="http://moglix.com/privacy" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

    <div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="cash_blocks">

        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!----><cash-on-delivery _nghost-c23="" class="ng-tns-c23-0 ng-star-inserted"><loader _ngcontent-c23="" class="ng-tns-c23-0" _nghost-c14=""><!---->

</loader>

<div _ngcontent-c23="" class="cash_on_delivery tab-pane" id="cash_block">

    <h3 _ngcontent-c23="" class="text-500 f-size-15 pad-lr-10">Pay using Cash On Delivery</h3>

    <div _ngcontent-c23="" class="wp-100 mar-tb-15 pad-lr-10 o-hidden">

        <!---->

        <!----><p _ngcontent-c23="" class="f-size-13 text-green pad-t-5 pad-b-5 ng-tns-c23-0 ng-star-inserted">Great all the products in the cart are eligible for cash on delivery. </p>

        <p _ngcontent-c23="" class="f-size-12 pad-t-5">*Payment through Card on delivery, is subject to availability of the device.</p>

        

        <!---->

    </div>



    <!----><div _ngcontent-c23="" class="pad-lr-10 ng-tns-c23-0 ng-star-inserted">

        <!----><div _ngcontent-c23="" class="send_otp pad-tb-30 relative ng-tns-c23-0 ng-trigger ng-trigger-fade ng-star-inserted">

            <form _ngcontent-c23="" class="ng-tns-c23-0 ng-untouched ng-pristine ng-valid" novalidate="">

                <div _ngcontent-c23="" class="form-group text-center w-300 relative">

                    <p _ngcontent-c23="" class="absolute top--10 text-500 text-grey text-left text-500 f-size-11 pad-b-10">Mobile Number</p>

                    <span _ngcontent-c23="" class="top-12 left-0 absolute">+91 </span>

                    <input _ngcontent-c23="" class="pad-l-30 no-border border-b form-control inline-block w-300 h-40 f-size-14 ng-untouched ng-pristine ng-valid" name="mobile_num" pattern="^[1-9][0-9]{9}$" placeholder="Enter Mobile Number*" required="" type="text"> 

                    <p _ngcontent-c23="" class="text-500 text-grey text-left text-500 f-size-11 pad-t-10 pad-b-5">Email</p>

                    <input _ngcontent-c23="" class="no-border form-control inline-block w-300 h-40 f-size-14 ng-untouched ng-pristine ng-valid" name="cust_email" readonly="" type="text">

                </div>

                <div _ngcontent-c23="" class="">

                    <p _ngcontent-c23="" class="f-size-12 pad-t-5 text-grey">The OTP Phone Number/ Email should be same as in the Shipping Details</p>

            </div>

                <!---->

                <div _ngcontent-c23="" class="mar-t-10 form-group">



                    <button _ngcontent-c23="" class="inline-block btn btn-red text-white h-40 w-300 f-size-14 res-bttt" type="submit">Confirm Order</button>

                </div>

            </form>



            

        </div>

        <!---->

    </div>



    

</div>









<!----></cash-on-delivery>



        <!---->



        <!---->

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="http://moglix.com/terms" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="http://moglix.com/privacy" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

    <div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="upi_blocks">

        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!----><upi _nghost-c24="" class="ng-star-inserted">

<loader _ngcontent-c24="" _nghost-c14=""><!---->

</loader>

<div _ngcontent-c24="" class="upi_block tab-pane" id="upi_block">

<h3 _ngcontent-c24="" class="text-500 f-size-15 pad-lr-10 mar-b-10">Select UPI</h3>

<form _ngcontent-c24="" class="form-horizontal ng-untouched ng-pristine ng-invalid" novalidate="">

    <div _ngcontent-c24="" class="wp-xs-100 o-hidden pad-l-10">  

        <div _ngcontent-c24="" class="upi-box">

            <label _ngcontent-c24="" class="upi-option">

                  <input _ngcontent-c24="" class="upi-input checked ng-untouched ng-pristine ng-valid" formcontrolname="uType" id="upi" type="radio">

                  <span _ngcontent-c24="" class="upi-label icon-checkout_check" for="upi"></span>

            </label>

            <img _ngcontent-c24="" src="images/tez.png" width="50">

        </div>

          <!----><div _ngcontent-c24="" class="fillUpibox ng-star-inserted">

              <span _ngcontent-c24="">Please enter your UPI ID.</span>

              <label _ngcontent-c24="" class="upiInput">

                  <input _ngcontent-c24="" class="upicode ng-untouched ng-pristine ng-invalid" formcontrolname="upi" type="text">

                  <!---->

              </label>

          </div>     

    </div>

    <div _ngcontent-c24="" class="wp-100 o-hidden pad-lr-10 mar-tb-15">

        <h3 _ngcontent-c24="" class="f-size-12">You will be redirected to a secure payment gateway wallet.</h3>

    </div>

    <div _ngcontent-c24="" class="pad-lr-10">

        <button _ngcontent-c24="" class="btn bg-orange wp-60 text-white border-r-3 h-45 wp-xs-100 text-500 f-size-16" type="submit" disabled="">PAY  <!----><span _ngcontent-c24="" class="hidden-sm-up text-white ng-star-inserted">₹ 648.00</span></button>

        

        <!---->

    </div>

</form>

</div>



<!---->





</upi>

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="http://moglix.com/terms" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="http://moglix.com/privacy" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

    <div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="emi_blocks">

        <!---->



        <!---->



        <!---->



        <!---->



        <!----><emi class="ng-star-inserted"><loader _nghost-c14=""><!---->

</loader>

<!----><div class="f-size-16 text-red ng-star-inserted"> EMI not available below Rs. 3000</div>



<!---->



<!---->

</emi>



        <!---->



        <!---->



        <!---->

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="http://moglix.com/terms" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="http://moglix.com/privacy" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

    <div class="tab-content col-sm-9 pad-tb-30 pad-lr-30 pad-lr-sm-15 pad-tb-sm-15 pad-lr-xs-10 min-h-470" id="neft_blocks">

        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!---->



        <!----><neft-rtgs class="ng-star-inserted"><loader _nghost-c14=""><!---->

</loader>

<!----><div class="f-size-16 text-red ng-star-inserted"> NEFT not available below Rs. 2000</div>



<!---->

</neft-rtgs>



        <!---->

        <div class="pad-tb-20 wp-100 mar-tb-30 border-t">

            <p class="f-size-12 lh-22">Please note.You might be redirected to 3-D secure page to complete your transaction.By placing this order, you agree to the <a class="text-darkblue" href="http://moglix.com/terms" target="_blank">Terms of Use</a> and <a class="text-darkblue" href="http://moglix.com/privacy" target="_blank">Privacy Policy</a> of moglix.com </p>

        </div>

    </div>

</div>





</payment>



            <!-- <div class="row"> 

                <div class="form-group">

                  <label class="control-label sr-only" for="next">next</label>

                  <div class="o-hidden pad-lr-30 pad-tb-30 no-padding-sm pad-tb-xs-15 mob-b-c mob-fixed col-sm-12 mobile-proceed-fixed pad-r10 checkout-next"> <a class="pad-lr-20 no-border h-45 text-white bg-orange f-right mar-l-20 border-r-3 no-margin-xs proceed_btn mar-r-xs-15 mob-b-full text-500 f-size-15 f-size-xs-13 nextBtn" type="button" >Next</a> <a class="pad-lr-20 no-border h-45 text-white bg-orange f-right mar-l-20 border-r-3 no-margin-xs proceed_btn mar-r-xs-15 mob-b-full text-500 f-size-15 f-size-xs-13 collapsed btn btn-default" id="goto-4" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-5" style="display:none;">Next</a> </div>

                </div>

              </div> -->

            </div>

          </div>

    </div>

    <div _ngcontent-c14="" class="col-sm-4 no-padding-sm mar-l-xs--15 w-sm-100 pad-sm-0 hidden-sm-down ng-star-inserted checkoutside-block">

      <order-summary _nghost-c13="">

        <loader _ngcontent-c13="" _nghost-c5=""> </loader>

        <div _ngcontent-c13="" class="order-block bg-white o-hidden pad-tb-20 mar-b-xs-30">

          <div _ngcontent-c13="" class="promo_code pad-lr-20 pad-lr-xs-30 pad-b-10 mar-b-20 no-margin-xs">

            <div _ngcontent-c13="" class=" pad-b-20 clearfix pad-t-10" style="position: relative;">

              <form name="PromotionDiscount" id="PromotionDiscount" action="#"  class="clearfix ng-untouched ng-pristine ng-invalid"  method="post">

                <div _ngcontent-c13="" class="clearfix mar-t-10"></div>

                <input type="text" name="pcode" id="pcode" size="50" maxlength="40" class="f-size-13 inline-block h-40 f-left wp-70 border-tr-r-0 border-br-r-0 form-control ng-untouched ng-pristine ng-invalid" placeholder="Enter Promocode here"  value=""/>

                <input type="button" value="Apply" name="promotion" class="f-size-12 btn bg-back_btn h-40 text-white border-tl-r-0 border-bl-r-0 f-left wp-30 inline-block b-text  text-500 f-size-16 promotion_appy promotion_tag" />

                <?php echo $_REQUEST['pmsg'] ?>

              </form>

            </div>

            <div _ngcontent-c13="" class="clearfix"></div>

            <p _ngcontent-c13="" class="lh-22 pad-b-5 mar-b-10 border-b text-500 f-size-16 no-border-xs"> <span _ngcontent-c13="" class="mobile-promo"> Take advantage of our <small _ngcontent-c13="">exclusive offers</small> </span> </p>

            <div _ngcontent-c13="" class="mobile-promo-box h-200 scroll-y h-auto-xs">

              <div _ngcontent-c13="">

                <div _ngcontent-c13="" class="mob-view" style="position: relative;"> <span _ngcontent-c13="" class="close-promo" title="Close button"> <i _ngcontent-c13="" _aria-hidden="true" class="icon-close"></i> </span> </div>

                <div _ngcontent-c13="" class="popup_title mob-view mobile-promo">

                  <h3 _ngcontent-c13="" class="pad-b-5 f-size-18">Exclusive offer</h3>

                </div>

                <?php

$sqlprocode = "select * from promotioncode";

$respromocode = mysqli_query($dbLink, $sqlprocode) or die('Could Not Select Cart Items');



while ($datapromocode = $respromocode->fetch_assoc())

	{

	$todaydate = date('Y-m-d');

	$enddate = $datapromocode['EndDate'];

	$a1 = strtotime($todaydate);

	$b1 = strtotime($enddate);

	if ($a1 <= $b1)

		{

?>

                <p _ngcontent-c13="" class="f-size-13 text-500 pointer text-grey clearfix input-close">

                  <label _ngcontent-c13="" class="radio_list" style="display: block !important; " for="0couponcode">

                    <input _ngcontent-c13="" name="promo-code" style="display: inline-block !important;" id="promo-code" value="<?php

		echo $datapromocode['Code'] ?>" type="radio">

                    <span _ngcontent-c13="" class="text-500 f-size-13 pad-b-5">

                    <?php

		echo $datapromocode['Code'] ?>

                    </span> <span _ngcontent-c13="" class="f-size-11 pad-t-5 pad-l-15 text-400"> Flat

                    <?php

		echo $datapromocode['Percentage'] ?>

                    % Off</span> </label>

                </p>

                <?php

		}

	} ?>

              </div>

            </div>

          </div>

          <div _ngcontent-c13="" class="clearfix"></div>

          <div _ngcontent-c13="" class="product_block pad-tb-15 pad-lr-10 border-t border-b">

            <div _ngcontent-c13="" class="o-hidden pad-tb-5 pad-lr-15"> <span _ngcontent-c13="" class="f-left inline-block f-size-14">Total Amount</span> <span _ngcontent-c13="" class="f-right inline-block text-black f-size-14 total_amount" data-value="<?php

echo $total; ?>">₹

              <?php

echo $total; ?>

              </span> </div>

            <div _ngcontent-c13="" class="o-hidden pad-tb-5 pad-lr-15"> <span _ngcontent-c13="" class="f-left inline-block f-size-14">Shipping</span> <span _ngcontent-c13="" class="f-right inline-block text-black f-size-14">₹ 49.00</span> </div>

            <div _ngcontent-c13="" class="o-hidden pad-tb-5 pad-lr-15"> <span _ngcontent-c13="" class="f-left inline-block f-size-14">Coupon Discount</span> <span _ngcontent-c13="" class="f-right inline-block text-black f-size-14 dis_amount" data-value="">₹ 0</span> </div>

          </div>

          <div _ngcontent-c13="" class="o-hidden pad-b-5 pad-t-25 pad-lr-20"> <span _ngcontent-c13="" class="f-left inline-block f-size-16 b-text">Total Amount</span> <span _ngcontent-c13="" class="f-right inline-block b-text f-size-16 final_amount">₹

            <?php

echo $final_amount = $total + 49; ?>

            </span> </div>

        </div>

      </order-summary>

    </div>

  </div>

</div>

<script language="javascript">

	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down

	populateCountries("country2");

	populateCountries("country2");

</script>

<?php



if (isset($_GET['location']))

	{

	$pro_url = htmlspecialchars($_GET['location']);

	}

  else

	{

	$pro_url = "http://glorywebsdev.com/ecommerce/dashboard.php";

	}



?>

<script type="text/javascript">



jQuery(window).load(function($){



        // alert('hii');

		//jQuery('.des_loginuser').hide();

        jQuery('.email-error').hide();

		jQuery('.password_div').hide();

		jQuery('.rgister_form').hide();

		jQuery("form input.form-control").focusout(function(){

			if(jQuery(this).val() != ""){

                jQuery(this).parent().parent().addClass("has-content");



                // validateEmail();



            }else{

                jQuery(this).parent().parent().removeClass("has-content");



            }

		});

        jQuery("form input.login_email_id").focusout(function(){

			

            if(jQuery(this).val() != ""){

				if ( !validateEmail(jQuery(this).val())) {jQuery('.email-error').show(); return false;}

				var new_email = jQuery(this).val();

				

				jQuery.ajax({

					type: "POST",

					dataType: "html",

					url: "check_email.php",

					data:'new_email='+new_email,

					success: function(res){

							if(res=="no"){



								// alert('no');



								jQuery(this).parent().parent().addClass("has-content");

								jQuery('.form-horizontal').hide();

								jQuery('.rgister_form').show();

								jQuery('input[name=username]').val(new_email);

								

							}

								

							

					}

			  	});

               

				jQuery('.login_btn').removeAttr("disabled");

				jQuery('.password_div').show('slow');



				

				

                // validateEmail();



            }else{jQuery(this).parent().parent().removeClass("has-content");}

            

            

        });

		jQuery(".login_btn").click(function(){

			var email = jQuery('input[name=username]').val();

			var password = jQuery('#password').val();



			// alert(password);



			jQuery.ajax({

					type: "POST",

					dataType: "json",

					url: "loginp.php",

					data:'email='+email+'&password='+password,

					success: function(res){

						

						if(res.res == "Done"){

							

							jQuery('.login_chk_form').hide();

							jQuery('.des_loginuser').show();

							window.location = "<?php echo $frontpath;?>/checkout.php";

							

							

							

						}

							

								

							

					}

			  	});

			

		});

		jQuery(".continue_next_2").click(function(){

			

			jQuery('#collapse-2').hide();	

			jQuery('#collapse-3').show();

		});

		

		

		jQuery(".rgister_btn").click(function(){

			var email = jQuery('input[name=username]').val();



			// alert(email);



			var name = jQuery('input[name=FirstName]').val();

			var PhoneNumber = jQuery('input[name=PhoneNumber]').val();

			

			

			var password = jQuery('#password123').val();

			

			jQuery.ajax({

					type: "POST",

					dataType: "html",

					url: "registerp.php",

					data:'email='+email+'&name='+name+'&PhoneNumber='+PhoneNumber+'&password='+password,

					success: function(res){

							if(res == "Done"){

							window.location.href = "http://glorywebsdev.com/ecommerce/login.php";

						}

						

								

							

					}

			  	});

		})

    });

function validateEmail(sEmail) {

  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

  if (filter.test(sEmail)) {

   return true;

  }

    else {



      // $('.email-error').show();



  }

}

</script>

<style>

.checkout-wrapper{padding-top: 40px; padding-bottom:40px; background-color: #fafbfa;}

.checkout{    background-color: #fff;

    border:1px solid #eaefe9;

     

    font-size: 14px;}

    .row{

        margin:0px;

    }

.panel{margin-bottom: 0px;}

.checkout-step {

     

    /*border-top: 1px solid #f2f2f2;

    color: #666;

    font-size: 14px;

    padding: 5px;

    position: relative;*/

}

.checkout-step-title a{

    color:#fff;

}

.checkout-step-head{

    background-color:#366090;

    padding:6px;

    height:44px;

}

.checkout-step-head1

{

	    background-color:#fff;

    padding:6px;

    height:44px;

}

.checkout-step-number {

    display: inline-block;

    font-size: 18px;

    height: 32px;

    margin-right: 26px;

    text-align: center;

    padding:3px;

    color:#fff;

}

.checkout-step-title{ 

    vertical-align: middle;display: inline-block; margin: 0px;

	font-size: 16px;

font-weight: 300;

padding-top: 7px;

padding-left: 10px;

     }

.checkout-next{

/*    margin:10px;*/

    text-align: center;

    font-size:17px;

}

 

.checout-address-step{}

.checout-address-step .form-group{margin-bottom: 18px;

    width: 100%;}



.checkout-step-body{padding-left: 0px; padding-top: 30px;}



.checkout-step-active{display: block;}

.checkout-step-disabled{display: none;}



.checkout-login{}

.login-phone{display: inline-block;}

.login-phone:after {

    font-size: 14px;

    left: 36px;

}

.login-phone:before {

    content: "";

    font-style: normal;

    color: #333;

    font-size: 18px;

    left: 12px;

        display: inline-block;

    font: normal normal normal 14px/1 FontAwesome;

    font-size: inherit;

    text-rendering: auto;

    -webkit-font-smoothing: antialiased;

    -moz-osx-font-smoothing: grayscale;

}

.login-phone:after, .login-phone:before {

    position: absolute;

    top: 50%;

    -webkit-transform: translateY(-50%);

    transform: translateY(-50%);

}

.login-phone .form-control {

    padding-left: 68px;

    font-size: 14px;

    

}

.checkout-login .btn{height: 42px;     line-height: 1.8;}

 

.otp-verifaction{margin-top: 30px;}

.checkout-sidebar{background-color: #fff;

    border:1px solid #eaefe9; padding: 30px; margin-bottom: 30px;}

.checkout-sidebar-merchant-box{background-color: #fff;

    border:1px solid #eaefe9; margin-bottom: 30px;}

.checkout-total{border-bottom: 1px solid #eaefe9; padding-bottom: 10px;margin-bottom: 10px; }

.checkout-invoice{display: inline-block;

    width: 100%;}

.checout-invoice-title{    float: left; color: #30322f;}

.checout-invoice-price{    float: right; color: #30322f;}

.checkout-charges{display: inline-block;

    width: 100%;}

.checout-charges-title{float: left; }

.checout-charges-price{float: right;}

.charges-free{color: #43b02a; font-weight: 600;}

.checkout-payable{display: inline-block;

    width: 100%; color: #333;}

.checkout-payable-title{float: left; }

.checkout-payable-price{float: right;}



.checkout-cart-merchant-box{ padding: 20px;display: inline-block;width: 100%; border-bottom: 1px solid #eaefe9;

 padding-bottom: 20px; }

.checkout-cart-merchant-name{color: #30322f; float: left;}

.checkout-cart-merchant-item{ float: right; color: #30322f; }

.checkout-cart-products{}



.checkout-cart-products .checkout-charges{ padding: 10px 20px;

    color: #333;}

.checkout-cart-item{ border-bottom: 1px solid #eaefe9;

    box-sizing: border-box;

    display: table;

    font-size: 12px;

    padding: 22px 20px;

    width: 100%;}

 .checkout-item-list{}

.checkout-item-count{ float: left; }

.checkout-item-img{width: 60px; float: left;}

.checkout-item-name-box{ float: left; }

.checkout-item-title{ color: #30322f; font-size: 14px;  }

.checkout-item-unit{  }

.checkout-item-price{float: right;color: #30322f; font-size: 14px; font-weight: 600;}





.checkout-viewmore-btn{padding: 10px; text-align: center;}



.header-checkout-item{text-align: right; padding-top: 20px;}

.checkout-promise-item {

    background-repeat: no-repeat;

    background-size: 14px;

    display: inline-block;

    margin-left: 20px;

    padding-left: 24px;

    color: #30322f;

}

.checkout-promise-item i{padding-right: 10px;color: #43b02a;}

.disabled {

   pointer-events: none;

   cursor: default;

}

label{

    display:block;

}

select{

    margin-bottom:8px;

    width:260px;

}

.address{

   /* background-color:#e5e5e5;

    padding:15px;

    border-radius:2px;*/

    margin:5px;

}



.list-group-item{

    background-color:#e5e5e5;

    border:none;

    padding:0px;

    margin-top:4px;

}

select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {

    padding: 4px 6px;

}



.paymentWrap {

	padding: 50px;

}



.paymentWrap .paymentBtnGroup {

	max-width: 800px;

	margin: auto;

}



.paymentWrap .paymentBtnGroup .paymentMethod {

	padding: 40px;

	box-shadow: none;

	position: relative;

}



.paymentWrap .paymentBtnGroup .paymentMethod.active {

	outline: none !important;

}



.paymentWrap .paymentBtnGroup .paymentMethod.active .method {

	border-color: #4cd264;

	outline: none !important;

	box-shadow: 0px 3px 22px 0px #7b7b7b;

}



.paymentWrap .paymentBtnGroup .paymentMethod .method {

	position: absolute;

	right: 3px;

	top: 3px;

	bottom: 3px;

	left: 3px;

	background-size: contain;

	background-position: center;

	background-repeat: no-repeat;

	border: 2px solid transparent;

	transition: all 0.5s;

}



.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {

}



.paymentWrap .paymentBtnGroup .paymentMethod .method.visa2 {}



.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {

}



.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card2 {}



.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {

       



}



.paymentWrap .paymentBtnGroup .paymentMethod .method.amex2 {

     background-image: url("http://www.paymentscardsandmobile.com/wp-content/uploads/2015/08/Amex-icon.jpg");



}



.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {

	border-color: #4cd264;

	outline: none !important;

}

.info1{

    background-color: #f9f9f9;

    padding:15px;

}

.info2{

    background-color: #eee;

    padding:15px;

}

</style>

<script type="text/javascript">

$(document).ready(function($) {

  $('.tab-content').hide();

  $('.tab-content:first').show();

  $('.ullist li:first').addClass('active');

  $('.ullist li').click(function(event) {

    $('.ullist li').removeClass('active');

    $(this).addClass('active');

    $('.tab-content').hide();



    var selectTab = $(this).find('a').attr("href");



    $(selectTab).fadeIn(200);

  });

});

</script>

<script>

$('#login_continue_btn').on('click',function(){

    $('#login_section').hide();

    $('#collapse-2').slideDown("slow");

	$('.address_head').addClass('active_tabs');

	$('.head-text').addClass('login_head');

	$('.login_head').removeClass('active_tabs');

	$(".bg-trans").css("display","block");

	

});

$('#address_continue_btn').on('click',function(){

    $('#collapse-2').hide();

    $('#collapse-3').slideDown("slow");

	$('.prdt_head').addClass('active_tabs');

	$('.address_head').removeClass('active_tabs');

	$(".bg-trans1").css("display","block");

	$(".bg-trans").css("display","block");

});

$('#address_continue_btn1').on('click',function(){

    $('#collapse-2').hide();

    $('#collapse-3').slideDown("slow");

	$('.prdt_head').addClass('active_tabs');

	$('.address_head').removeClass('active_tabs');

	$(".bg-trans1").css("display","block");

	$(".bg-trans").css("display","block");

});

$('#proceed_payment_btn').on('click',function(){

    $('#collapse-3').hide();

    $('#collapse-4').slideDown("slow");

		$('.prdt_head').removeClass('active_tabs');

	$('.payment_head').addClass('active_tabs');

	$(".bg-trans2").css("display","block");

	$(".bg-trans1").css("display","block");

	$(".bg-trans").css("display","block");

});

$('#proceed_payment_btn1').on('click',function(){

    $('#collapse-3').hide();

    $('#collapse-4').slideDown("slow");

		$('.prdt_head').removeClass('active_tabs');

	$('.payment_head').addClass('active_tabs');

	$(".bg-trans2").css("display","block");

	$(".bg-trans1").css("display","block");

	$(".bg-trans").css("display","block");

});


$('#address_form').hide();

$('#add_address').on('click',function(){

    $('#address_form').slideDown("slow");

});

$('#cancel_btn').on('click',function(){

    $('#address_form').slideUp("slow");

});

$('#login_edit').on('click',function(){

    $('#login_section').slideDown("slow");

		$('.head-text').addClass('active_tabs');

		$('#collapse-2').hide();

		$('#collapse-3').hide();

		$('#collapse-4').hide();

		$('.address_head').removeClass('active_tabs');

		$('.payment_head').removeClass('active_tabs');

			$('.prdt_head').removeClass('active_tabs');

			$('#login_edit').hide();

});

$('#address_edit').on('click',function(){

    $('#collapse-2').slideDown("slow");

		$('.address_head').addClass('active_tabs');

		$('#login_section').hide();

		$('#collapse-3').hide();

		$('#collapse-4').hide();

		$('.login_head').removeClass('active_tabs');

		$('.payment_head').removeClass('active_tabs');

			$('.prdt_head').removeClass('active_tabs');

			$('#address_edit').hide();

			$('#product_edit').hide();

});

$('#product_edit').on('click',function(){

    $('#collapse-3').slideDown("slow");

		$('.prdt_head').addClass('active_tabs');

		$('#login_section').hide();

		$('#collapse-2').hide();

		$('#collapse-4').hide();

		$('.login_head').removeClass('active_tabs');

		$('.payment_head').removeClass('active_tabs');

		$('.address_head').removeClass('active_tabs');

			$('.prdt_head').addClass('active_tabs');

			$('#product_edit').hide();

});

$('.address_edit_btn').on('click',function(){

    $('#collapse-2').show();

});

</script>

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

<?php



// require_once 'login_facebook.php';



require_once ('footer.php');

 ?>