<?php
class User {
    private $dbHost     = "localhost";
    private $dbUsername = "gloryweb_ecomm";
    private $dbPassword = "@Glory78+123";
    private $dbName     = "gloryweb_ecommerce";
    private $userTbl    = 'customer';
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array()){
        if(!empty($userData)){
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                // Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET FirstName = '".$userData['FirstName']."',  Email = '".$userData['Email']."', modified = NOW() WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                // Insert user data
               
			   
			    $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', FirstName  = '".$userData['FirstName']."',   Email = '".$userData['Email']."', CreatedOn = NOW(), UpdatedOn = NOW()";
				
				
                $insert = $this->db->query($query);
            }
            
            // Get user data from the database
            $result = $this->db->query($prevQuery);
			
			
            $userData = $result->fetch_assoc();
        }
        
        // Return user data
        return $userData;
    }
}
?>
<?php 
require_once 'fbConfig.php';
//require_once 'User.class.php';

if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        //header('Location: ./');
    }
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,cover,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    // Initialize User class
    $user = new User();
    
    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid'     => $fbUserProfile['id'],
        'FirstName'    => $fbUserProfile['FirstName'],
       // 'last_name'     => $fbUserProfile['last_name'],
        'Email'         => $fbUserProfile['Email'],
//        'gender'        => $fbUserProfile['gender'],
//        'locale'        => $fbUserProfile['locale'],
//        'cover'         => $fbUserProfile['cover']['source'],
//        'picture'       => $fbUserProfile['picture']['url'],
//        'link'          => $fbUserProfile['link']
    );
    $userData = $user->checkUser($fbUserData);
    
    // Put user data into session
    $_SESSION['userData'] = $userData;
    
	//print_r($_SESSION['userData']);
//	exit;
	
    // Get logout url
    //$logoutURL = $helper->getLogoutUrl($accessToken, 'http://glorywebsdev.com/ecommerce/logout.php');
    
    // Render facebook profile data
    if(!empty($userData)){ 
//        $output  = '<h2 style="color:#999999;">Facebook Profile Details</h2>';
//        $output .= '<div style="position: relative;">';
//        $output .= '<img src="'.$userData['cover'].'" />';
//        $output .= '<img style="position: absolute; top: 90%; left: 25%;" src="'.$userData['picture'].'"/>';
//        $output .= '</div>';
//        $output .= '<br/>Facebook ID : '.$userData['oauth_uid'];
//        $output .= '<br/>Name : '.$userData['FirstName'].' '.$userData['last_name'];
//        $output .= '<br/>Email : '.$userData['Email'];
//        $output .= '<br/>Gender : '.$userData['gender'];
//        $output .= '<br/>Locale : '.$userData['locale'];
//        $output .= '<br/>Logged in with : Facebook';
//        $output .= '<br/>Profile Link : <a href="'.$userData['link'].'" target="_blank">Click to visit Facebook page</a>';
//        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>'; 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
    
}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
    
    // Render facebook login button
    $output = '<a href="'.htmlspecialchars($loginURL).'">Login with Facebook</a>';
}
?>
    <div><?php echo $output; ?></div>
    
	
