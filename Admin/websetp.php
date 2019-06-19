<?	include "db.php";

    $sfrontpgtitle = AssureSec($_POST['frontpgtitle']);
   	$sadminpgtitle = AssureSec($_POST['adminpgtitle']);
	$smywebsite = AssureSec($_POST['mywebsite']);
    $smywebsitename = AssureSec($_POST['mywebsitename']);
   	$sadminemail = AssureSec($_POST['adminemail']);
    $sfromemail = AssureSec($_POST['fromemail']);
   	$sbcemail = AssureSec($_POST['bcemail']);
    $sccemail = AssureSec($_POST['ccemail']);
   	$sfrontpath = AssureSec($_POST['frontpath']);
   	$sadminpath = AssureSec($_POST['adminpath']);
   	$sfootertitle = $_POST['footertitle'];
	$sendmail = AssureSec($_POST['issend']);
	$sheadertext = addcslashes($_POST['header_text'],"'");
	$sheadertitle = AssureSec($_POST['header_title']);
	
	 if($sendmail=='')
	 {
		 $sendmail=0;
	 }
	
    $sql = "Select * from websetting";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    $row = $r->fetch_assoc();
    $totrec = mysqli_num_rows($r);
    if($totrec == "0")
    {
        $sql = "insert into websetting(adminpgtitle,frontpgtitle,mywebsite,mywebsitename,sendmail,adminemail,fromemail,bcemail,ccemail,frontpath,adminpath,footertitle,header_title,header_text) values('$sadminpgtitle','$sfrontpgtitle','$smywebsite','$smywebsitename',$sendmail,'$sadminemail','$sfromemail','$sbcemail','$sccemail','$sfrontpath','$sadminpath','$sfootertitle','$sheadertext','$sheadertitle')";
	    mysqli_query($dbLink,$sql) or die('could not insert..');
    }
    else
    {
        $sql = "update websetting set adminpgtitle='$sadminpgtitle',frontpgtitle='$sfrontpgtitle',mywebsite='$smywebsite',mywebsitename='$smywebsitename',sendmail='$sendmail',adminemail='$sadminemail',fromemail='$sfromemail',bcemail='$sbcemail',ccemail='$sccemail',frontpath='$sfrontpath',adminpath='$sadminpath',footertitle='$sfootertitle',header_title='$sheadertitle',header_text='$sheadertext'";
		mysqli_query($dbLink,$sql) or die('could not update..');
    }

    header("Location:webset.php?msg=Settings Updated Successfully");
    exit();

?>		