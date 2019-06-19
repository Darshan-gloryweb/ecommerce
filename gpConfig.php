<?php
if(!session_id()){
    session_start();
}
//Include Google client library 
//require_once 'src/Google/autoload.php';
//include_once 'vendor/autoload.php';

include_once 'src/Google/Google_Client.php';
include_once 'src/Google/contrib/Google_Oauth2Service.php';


/*
 * Configuration and setup Google API
 */
$clientId = '113581286954-ktooub37rcu4d1of0vhremvc621d5fss.apps.googleusercontent.com';
$clientSecret = 'G8W7W0la3lPpinUuaYG_K5Eo';
$redirectURL = 'http://glorywebsdev.com/ecommerce/checkout.php/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to moglix');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>