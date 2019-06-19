<?php
$connectionstring = "mysql://root:root@localhost/backend";
date_default_timezone_set("Asia/Kolkata");
date_default_timezone_get();
if (isset($_ENV["CLEARDB_DATABASE_URL"])) {
  $connectionstring = $_ENV["CLEARDB_DATABASE_URL"];
}
preg_match("~mysql://([^:@/]*):?([^@/]*)@?([^/]*)/?([^/?]*)~", $connectionstring, $matches);

//echo '<pre>';print_r($matches);

/*$servername='localhost' ; // Replace this 'localhost' with your server name
$database_username='devnanda_glory'; // Replace this  with your username
$database_password='devnandan@852';  // Replace this  with your password
$database_name='devnanda_devnandan';  // Replace this 'db' with your database name ekove_com_-_main*/

//$servername='localhost' ; // Replace this 'localhost' with your server name
$servername=$matches[3] ;
$database_username='root'; // Replace this  with your username
$database_password='';  // Replace this  with your password
$database_name='gloryweb_ecommerce';  // Replace this 'db' with your database name ekove_com_-_main

$dbLink = new mysqli($servername,$database_username,$database_password,$database_name);

//mysql_connect($servername,$database_username,$database_password);
//mysql_select_db($database_name);

/*selection of websetting*/
  $wsql = "Select * from websetting";
  $wr = mysqli_query($dbLink,$wsql) or die("can not select wsql");
  $wrow = $wr->fetch_assoc();
  $frontpgtitle = stripslashes($wrow['frontpgtitle']);
  $pgtitle = stripslashes($wrow['adminpgtitle']);
  $mywebsite = stripslashes($wrow['mywebsite']);
  $mywebsitename = stripslashes($wrow['mywebsitename']);
  $adminemail = stripslashes($wrow['adminemail']);
  $fromemail = stripslashes($wrow['fromemail']);
  $bcemail = stripslashes($wrow['bcemail']);
  $ccemail = stripslashes($wrow['ccemail']);
  $frontpath = stripslashes($wrow['frontpath']);
  $adminpath = stripslashes($wrow['adminpath']);
  $footertitle = stripslashes($wrow['footertitle']);
  $sendmail = stripslashes($wrow['sendmail']);
  $sphone = stripslashes($wrow['phone']);
  $logo = stripslashes($wrow['logoimage']);
  $headertext = stripslashes($wrow['headertext']);
  $sfax = stripslashes($wrow['fax']);
  $semail = stripslashes($wrow['email']);
  $slocation = stripslashes($wrow['location']);
  $shippingtime = stripslashes($wrow['shippingtime']);
  $map= stripslashes($wrow['map']);	

  session_start();
  
/*End of websetting*/
function escape_string($string)
{
   $string = nl2br($string);
   if(version_compare(phpversion(),"4.3.0")=="-1") {
	 $string = mysqli_escape_string($string);
   } else {
	 $string = mysqli_real_escape_string($dbLink,$string);
   }
   return $string;
}

function unescape_string($string)
{
  stripslashes($string);
  $string = str_replace('<br />', Chr(13), $string);
  return $string;
}

/*---------------------Start of SQL INJECTION PROTECTION---------------------------*/
function AssureSec($string)
{
  global $dbLink;
  // include class file
  require_once("class.inputfilter_clean.php");

  $tag_method = "0";
  $attr_method = "0";
  $xss_auto = "1";
  //$myFilter = new InputFilter($tags, $attr, $tag_method, $attr_method, $xss_auto);
  $myFilter = new InputFilter("","","0","0","1");

  $pri = mysqli_real_escape_string($dbLink,$myFilter->process($string));
  return $pri;
}
/*---------------------End of SQL INJECTION PROTECTION---------------------------*/
?>