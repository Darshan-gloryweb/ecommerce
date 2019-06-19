<?php  require_once('db.php'); ?>

<?php require_once('include/function.php'); 

 include('include/start_session.php');

 $title = "Login";

?>

<?php require_once('header-inner.php');

if(isset($_SESSION['Email'])) {?>

<script type="text/javascript">

window.location.href = "http://glorywebsdev.com/ecommerce/dashboard.php";

</script>

<?php }else{

?>



<link href="<?php echo $frontpath;?>/css/style-login.css" rel="stylesheet">



<div class="container-fluid pad-lr-md-0">

  <router-outlet></router-outlet>

  <account-login _nghost-c4="" class="ng-star-inserted">

    <div _ngcontent-c4="" class="login-container no-padding ">

      <div _ngcontent-c4="" class="row row-eq-height bg-white pad-tb-50 pad-tb-xs-30 mar-tb-20 box-shadow">

        <div _ngcontent-c4="" class="col-sm-6 col-xs-12 pad-lr-50 pad-lr-xs-30 border-darkblack-r res-noborder">

          <login _ngcontent-c4="" _nghost-c5="" class="ng-tns-c5-0"> 

            <!---->

            <h3 _ngcontent-c5="" class="text-500 f-size-18 pad-b-20 ng-tns-c10-0 ng-star-inserted">LOGIN / SIGNUP</h3>

            <!----> 

            <!----> 

            <!---->

            <form _ngcontent-c5="" class="form-horizontal ng-tns-c5-0 ng-untouched ng-pristine ng-invalid ng-star-inserted" novalidate>

              <!---->

              <div _ngcontent-c5="" class="ng-tns-c5-0 ng-untouched ng-pristine ng-invalid ng-star-inserted" formgroupname="step1">

                <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-5">

                  <input type="text" name="username" id="username" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid login_email_id login-field" size="57"  _ngcontent-c5=""/>

                  

                  <!--<input _ngcontent-c5="" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid" formcontrolname="email" placeholder="" type="text">--> 

                  <!---->

                  <label _ngcontent-c5="" class="ng-tns-c5-0">Enter Email/Mobile number*</label>

                  <!----> 

                  <!---->

                  <p _ngcontent-c5="" class="email-error f-size-10 text-red text-500 absolute top-35 ng-tns-c5-0 ng-star-inserted">Kindly enter valid email or mobile number</p>

                </div>

              </div>

              <div _ngcontent-c5="" class="ng-tns-c5-0 ng-untouched ng-pristine ng-invalid ng-star-inserted password_div" formgroupname="step1">

                <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-5">

                  <input type="password" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="password" id="password" onKeyPress="capLock(event)" value="" size="57"  required/>

                  

                  <!---->

                  <label _ngcontent-c5="" class="ng-tns-c5-0">Password</label>

                </div>
<p _ngcontent-c13="" class="f-size-14 text-blue pad-b-5 text-500 pointer ng-tns-c13-5 ng-star-inserted">Forgot Password?</p>
              </div>

              <input type="hidden" name="enter_email" value="">

              

              <!----> 

              <!----> 

              <!----> 

              <!---->

               <input type="button" class="login_btn callback_btn btn bg-orange h-45 f-size-14 mar-t-5 form-control text-white border-r-3 login_continue" value="submit" disabled="disabled" style="text-align:center !important; padding:0 !important;">

              <!--<button _ngcontent-c5="" class="btn bg-orange h-45 f-size-14 mar-t-5 form-control text-white border-r-3 login_continue mar-t-30 ng-tns-c5-0 ng-star-inserted login_btn" disabled="disabled">CONTINUE</button>-->

            </form>

            <form class="rgister_form">

              <div _ngcontent-c5="" class="callback_wrap">

                <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                    <input type="text" name="username" id="username" class="form-control no-border border-dark-b border-r-0 pad-l-0 login-field" size="57"  _ngcontent-c5=""/>

                  <label _ngcontent-c5="" class="ng-tns-c5-0">Email Id</label>

                </div>

                <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                  <input _ngcontent-c5="" class="form-control no-border border-dark-b border-r-0 pad-l-0 login-field" placeholder="" type="text" name="FirstName" id="firstname">

                  <label _ngcontent-c5="" class="ng-tns-c5-0">Name</label>

                </div>

                <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                  <input _ngcontent-c5="" class="form-control no-border border-dark-b border-r-0 pad-l-0 login-field" placeholder="" type="text"  name="PhoneNumber" id="phoneno">

                  <label _ngcontent-c5="" class="ng-tns-c5-0">Mobile Number</label>

                </div>

                 <div _ngcontent-c5="" class="moglix-form relative h-50 mar-b-15">

                 	<input type="password" class="form-control no-border border-dark-b border-r-0 pad-l-0 ng-untouched ng-pristine ng-invalid login-field" name="password123" id="password123" value="" size="57" />

                     <label _ngcontent-c5="" class="ng-tns-c5-0">Password</label>

                  </div>

                  <input type="button" class="rgister_btn btn bg-orange h-45 f-size-14 mar-t-5 form-control text-white border-r-3  callback_btn" value="Register">

                <!--<input _ngcontent-c5="" class="btn callback_btn" value="submit" type="submit">-->

              </div>

            </form>

            <!----> 

            <!---->

            

            

          </login>

          

          <!---->

          <div _ngcontent-c4="" class="separator-or ng-star-inserted"></div>

          <!---->

          <h3 _ngcontent-c4="" class="text-500 f-size-14 mar-t-40 pad-t-30 pad-tb-xs-10 text-uppercase mar-b-10 ng-star-inserted">Quick login gateway</h3>

          <!---->

          <social-login _ngcontent-c4="" class="o-hidden ng-star-inserted">

            <button class="pull-left f-size-13 text-500 mar-b-25 bg-darkblue wp-48 no-border text-white pad-tb-10 h-45 mar-t-xs-10 border-r-3 relative-xs full-width-btn" title="Login with Facebook "> <i aria-hidden="true" class="fa fa-facebook inline-block f-size-16 pad-r-5 text-white"></i> LOGIN WITH FACEBOOK </button>

            <button class="pull-right f-size-13 text-500 btn-google wp-48 no-border text-white  pad-tb-10 h-45 border-r-3 full-width-btn" title="Login with Gmail"> <i aria-hidden="true" class="fa fa-google-plus inline-block f-size-16 text-white"></i> LOGIN WITH GOOGLE </button>

            <button class="activate-window" style="position: absolute; right: 100px; opacity:0; z-index: -9" type="button"></button>

          </social-login>

          <!----> 

        </div>

        <div _ngcontent-c4="" class="clearfix"></div>

        <!---->

        <div _ngcontent-c4="" class="col-sm-6 pad-lr-40 mar-t-xs-30 pad-lr-xs-30 ng-star-inserted">

          <h3 _ngcontent-c4="" class="f-size-18 no-margin mar-b-10 text-400">Empower Your Business with Unparalleled Advantage</h3>

          <h5 _ngcontent-c4="" class="f-size-13 text-400">Join our exclusive business program and enjoy supreme benefits:</h5>

          <div _ngcontent-c4="" class="clearix"></div>

          <div _ngcontent-c4="" class="o-hidden mar-t-45 mar-b-15">

            <div _ngcontent-c4="" class="w-45 h-40 empower_icon purchase inline-block f-left"></div>

            <div _ngcontent-c4="" class="inline-block wp-xs-80 signup_points f-left pad-lr-15">

              <h3 _ngcontent-c4="" class="f-size-15 no-margin mar-b-5 text-uppercase text-500">Purchase List</h3>

              <h5 _ngcontent-c4="" class="f-size-13 text-400 text-grey">Smart procurement process helps in fostering a relatively quick add to cart mechanism</h5>

            </div>

          </div>

          <div _ngcontent-c4="" class="o-hidden mar-b-15">

            <div _ngcontent-c4="" class="w-45 h-45 empower_icon location inline-block f-left"></div>

            <div _ngcontent-c4="" class="inline-block wp-xs-80 signup_points f-left pad-lr-15">

              <h3 _ngcontent-c4="" class="f-size-15 no-margin mar-b-5 text-500 text-uppercase">Address management</h3>

              <h5 _ngcontent-c4="" class="f-size-13 text-400 text-grey">Intelligent address profiling facilitates easy administration of your shipping as well as billing addresses</h5>

            </div>

          </div>

          <div _ngcontent-c4="" class="o-hidden mar-b-15">

            <div _ngcontent-c4="" class="w-45 h-40 empower_icon pricing inline-block f-left"></div>

            <div _ngcontent-c4="" class="inline-block wp-xs-80 signup_points f-left pad-lr-15">

              <h3 _ngcontent-c4="" class="f-size-15 no-margin mar-b-5 text-500 text-uppercase">Bulk orders and pricing</h3>

              <h5 _ngcontent-c4="" class="f-size-13 text-400 text-grey">Exclusive pricing and discounts available for registered customers on all bulk purchases</h5>

            </div>

          </div>

          <div _ngcontent-c4="" class="o-hidden">

            <div _ngcontent-c4="" class="w-45 h-45 empower_icon invoice inline-block f-left"></div>

            <div _ngcontent-c4="" class="inline-block wp-xs-80 signup_points f-left pad-lr-15">

              <h3 _ngcontent-c4="" class="f-size-15 no-margin mar-b-5 text-500 text-uppercase">Business invoicing/input tax credit</h3>

              <h5 _ngcontent-c4="" class="f-size-13 text-400 text-grey">Get GST invoice for business purchases and claim input tax credit</h5>

            </div>

          </div>

         <!-- <div _ngcontent-c4="" class="pad-lr-90 pad-lr-xs-5"><a _ngcontent-c4="" class="f-size-13 f-right text-blue text-500" href="https://www.moglix.com/business-account">Know more</a></div>-->

        </div>

      </div>

    </div>

  </account-login>

</div>



<script>

  // This is called with the results from from FB.getLoginStatus().

  function statusChangeCallback(response) {

    console.log('statusChangeCallback');

    console.log(response);

    // The response object is returned with a status field that lets the

    // app know the current login status of the person.

    // Full docs on the response object can be found in the documentation

    // for FB.getLoginStatus().

    if (response.status === 'connected') {

      // Logged into your app and Facebook.

      testAPI();

    } else {

      // The person is not logged into your app or we are unable to tell.

      document.getElementById('status').innerHTML = 'Please log ' +

        'into this app.';

    }

  }



  // This function is called when someone finishes with the Login

  // Button.  See the onlogin handler attached to it in the sample

  // code below.

  function checkLoginState() {

    FB.getLoginStatus(function(response) {

      statusChangeCallback(response);

    });

  }



  window.fbAsyncInit = function() {

    FB.init({

      appId      : '2190970754252979',

      cookie     : true,  // enable cookies to allow the server to access 

                          // the session

      xfbml      : true,  // parse social plugins on this page

      version    : 'v2.8' // use graph api version 2.8

    });



    // Now that we've initialized the JavaScript SDK, we call 

    // FB.getLoginStatus().  This function gets the state of the

    // person visiting this page and can return one of three states to

    // the callback you provide.  They can be:

    //

    // 1. Logged into your app ('connected')

    // 2. Logged into Facebook, but not your app ('not_authorized')

    // 3. Not logged into Facebook and can't tell if they are logged into

    //    your app or not.

    //

    // These three cases are handled in the callback function.



    FB.getLoginStatus(function(response) {

      statusChangeCallback(response);

    });



  };



  // Load the SDK asynchronously

  (function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "https://connect.facebook.net/en_US/sdk.js";

    fjs.parentNode.insertBefore(js, fjs);

  }(document, 'script', 'facebook-jssdk'));



  // Here we run a very simple test of the Graph API after login is

  // successful.  See statusChangeCallback() for when this call is made.

  function testAPI() {

    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response) {

	

      console.log('Successful login for: ' + response.name);

      document.getElementById('status').innerHTML =

        'Thanks for logging in, ' + response.name + '!';

    });

  }

 

  

</script>



<!--

  Below we include the Login Button social plugin. This button uses

  the JavaScript SDK to present a graphical Login button that triggers

  the FB.login() function when clicked.





<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">

</fb:login-button>



<div id="status">

</div>

-->

<!--<div class="checkout_table" style="margin: 90px 263px;width: 433px;">

  <form name="login" id="login" onSubmit="return validateLogin(this)" action="loginp.php" method="post">

    <div  style="color: #F00;font-size: 13px;margin: 10px 0;text-align: center;">

      <?php if(isset($_REQUEST['msg'])){echo $_REQUEST['msg']; }?>

    </div>

    <table width="100%">

      <tr>

        <th> <strong>Login</strong> </th>

      </tr>

      <tr>

        <td>Email Address<br />

          <input type="text" name="username" id="username" class="" size="57" /></td>

      </tr>

      <tr>

        <td>Password<br />

          <input type="password" class="" name="password" id="password" onKeyPress="capLock(event)" value="" size="57" /></td>

      </tr>

      <tr>

        <td colspan="2"><input type="submit" name="login" value="Login"  class="loginbtn"/></td>

      </tr>

      <tr>

        <td colspan="2"> If don't have account, Please register from <a href="<?=$frontpath?>/register.php" title="Register" style="color:#A38ECB;">here</a></td>

      </tr>

      <tr>

        <td colspan="2"><a href="<?=$frontpath?>/forgotpassword.php" title="Forgot Password?" style="color:#A38ECB;">Forgot Password?</a></td>

      </tr>

    </table>

  </form>

</div>-->



<?php }?>

<?php



if(isset($_GET['location'])) {

	$pro_url = htmlspecialchars($_GET['location']);

	

}else{

	$pro_url ="http://glorywebsdev.com/ecommerce/dashboard.php";

	} 

?>



<script type="text/javascript">



jQuery(window).load(function($){

        //alert('hii');

        jQuery('.email-error').hide();

		jQuery('.password_div').hide();

		jQuery('.rgister_form').hide();

		jQuery("form input.form-control").focusout(function(){

			if(jQuery(this).val() != ""){

                jQuery(this).parent().parent().addClass("has-content");

                //validateEmail();

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

								//alert('no');

								jQuery(this).parent().parent().addClass("has-content");

								jQuery('.form-horizontal').hide();

								jQuery('.rgister_form').show();

								jQuery('input[name=username]').val(new_email);

								

							}

								

							

					}

			  	});

               

				jQuery('.login_btn').removeAttr("disabled");

				jQuery('.password_div').show('slow');

				

				

                //validateEmail();

            }else{jQuery(this).parent().parent().removeClass("has-content");}

            

            

        });

		jQuery(".login_btn").click(function(){

			var email = jQuery('input[name=username]').val();

			var password = jQuery('#password').val();

			//alert(password);

			jQuery.ajax({

					type: "POST",

					dataType: "json",

					url: "loginp.php",

					data:'email='+email+'&password='+password,

					success: function(res){

						if(res.res == "Done"){

							window.location.href = "<?php echo $pro_url;?>";

						}

							

								

							

					}

			  	});

			

		});

		jQuery(".rgister_btn").click(function(){

			var email = jQuery('input[name=username]').val();

			//alert(email);

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

      //$('.email-error').show();

  }

}

</script>

<script type="text/javascript">

	jQuery(document).ready(function($) {

	    $(".login-field").keyup(function(){

    	$('.login-field').removeClass("isFocus");

        $(this).addClass("isFocus");
  if($('#username').val()) {
							 	$('#username').addClass('isFocus');
							 }
  if($('#password').val()) {
							 	$('#password').addClass('isFocus');
							 }
  if($('#firstname').val()) {
							 	$('#firstname').addClass('isFocus');
							 }
  if($('#phoneno').val()) {
							 	$('#phoneno').addClass('isFocus');
							 }
  if($('#password123').val()) {
							 	$('#password123').addClass('isFocus');
							 }
    });

	});

</script>

<?php require_once('footer.php');?>