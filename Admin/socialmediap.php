<?php	include "db.php";

    //if(!empty($facebook_url)){$facebook_url = $_POST['facebook_url'];}
	$facebook_url = $_POST['facebook_url'];
   	$facebook_act = $_POST['facebook_act'];
	if($facebook_url!="" && substr($facebook_url,0,7)!="http://"){
		$facebook_url = "http://".$facebook_url;
	}
	if(empty($facebook_act))
	{
		$facebook_act='No';
	}
	
	
	
	//if(!empty($twitter_url)){$twitter_url = $_POST['twitter_url'];}
	$twitter_url = $_POST['twitter_url'];
   	$twitter_act = $_POST['twitter_act'];
	if($twitter_url!="" && substr($twitter_url,0,7)!="http://"){
		$twitter_url = "http://".$twitter_url;
	}
	if(empty($twitter_act))
	{
		$twitter_act='No';
	}
	
	
	
	$google_url = $_POST['google_url'];
   	$google_act = $_POST['google_act'];
	if($google_url!="" && substr($google_url,0,7)!="http://"){
		$google_url = "http://".$google_url;
	}
	if($google_act=='')
	{
		$google='No';
	}
	
	
	
	
	$flicker_url = $_POST['flicker_url'];
   	$flicker_act = $_POST['flicker_act'];
	if($flicker_url!="" && substr($flicker_url,0,7)!="http://"){
		$flicker_url = "http://".$flicker_url;
	}
	if($flicker_act=='')
	{
		$flicker_act='No';
	}
	
	

	$youtube_url = $_POST['youtube_url'];
   	$youtube_act = $_POST['youtube_act'];
	if($youtube_url!="" && substr($youtube_url,0,7)!="http://"){
		$youtube_url = "http://".$youtube_url;
	}
	if($youtube_act=='')
	{
		$youtube_act='No';
	}
	
	
		
	$blogger_url = $_POST['blogger_url'];
   	$blogger_act = $_POST['blogger_act'];
	if($blogger_url!="" && substr($blogger_url,0,7)!="http://"){
		$blogger_url = "http://".$blogger_url;
	}
	if($blogger_act=='')
	{
		$blogger_act='No';
	}
	
	$linkedin_url = $_POST['linkedin_url'];
   	$linkedin_act = $_POST['linkedin_act'];
	if($linkedin_url!="" && substr($linkedin_url,0,7)!="http://"){
		$linkedin_url = "http://".$linkedin_url;
	}
	if($linkedin_act=='')
	{
		$linkedin_act='No';
	}
	
	
   		
        echo $sql = "update socialmedia set url='$facebook_url',status='$facebook_act' where name='facebook'";
		
		
		mysqli_query($dbLink,$sql) or die('could not update..');
		
		echo $sql = "update socialmedia set url='$twitter_url',status='$twitter_act' where name='twitter'";
		mysqli_query($dbLink,$sql) or die('could not update..');
		
		$sql = "update socialmedia set url='$google_url',status='$google_act' where name='google'";
		mysqli_query($dbLink,$sql) or die('could not update..');
		
		$sql = "update socialmedia set url='$flicker_url',status='$flicker_act' where name='flicker'";
		mysqli_query($dbLink,$sql) or die('could not update..');
		
		$sql = "update socialmedia set url='$youtube_url',status='$youtube_act' where name='youtube'";
		mysqli_query($dbLink,$sql) or die('could not update..');
		
		$sql = "update socialmedia set url='$blogger_url',status='$blogger_act' where name='blogger'";
		mysqli_query($dbLink,$sql) or die('could not update..');
		
		$sql = "update socialmedia set url='$linkedin_url',status='$linkedin_act' where name='linkedin'";
		mysqli_query($dbLink,$sql) or die('could not update..');
    
    header("Location:socialmedia.php?msg=Settings Updated Successfully");
    exit();

?>		