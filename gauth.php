<?php
session_start();

require_once('g-api-settings.php');
require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);

		//echo '<pre>';print_r($user_info); echo '</pre>';
		
		echo $user_info[emails][0][value];
		// Now that the user is logged in you may want to start some session variables
		$_SESSION['logged_in'] = 1;

		// You may now want to redirect the user to the home page of your website
		// header('Location: http://glorywebsdev.com/ecommerce/checkout.php');
	
		 echo '<script>window.location ="http://glorywebsdev.com/ecommerce/checkout.php";</script>';
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>
