<?php include"db.php";

	$fname =$_REQUEST['fname'];
	$lname =$_REQUEST['lname'];
	$city =$_REQUEST['city'];
    $email = $_REQUEST['email'];
	$contact =$_REQUEST['contact'];
	$message = $_REQUEST['message'];
	$sysdate = date("Y-m-d H:i:s");
		
    $hidrandval = $_POST['hidrandval'];
    $vcode = $_POST['vcode'];

    if($fname == "")
    {
	/*	 echo "<div class='success-message'>There is Some Error While Sending Your Feedback</div>";*/
       header("Location:".$frontpath."index.php");
       exit();
    }

    if($email == "")
    {
		 /*echo "<div class='success-message'>There is Some Error While Sending Your Feedback</div>";*/
       header("Location:".$frontpath."index.php");
       exit();
    }

   /* if($vcode == "")
    {
       	header("location:".$frontpath."index.php");
    	exit();
    }

    if($hidrandval != $vcode)
    {
        header("location:".$frontpath."index.php");
    	exit();
    }*/
 
    $sysdate = date("Y-m-d");

        $sql = "insert into enquiry(firstname,lastname,city,email,contact,message,createdon,status) values('$fname','$lname','$city','$email','$contact','$message','$sysdate',1)";
		//echo $sql ;
  		$rs = mysqli_query($dbLink,$sql) or die('can not insert');

        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "From:".$fromemail."\r\n";
        //$headers .= "Reply-To:".$fromemail."\r\n";
        //$headers .= "Return-Path:".$fromemail."\r\n";
        $headers .= "Bcc:".$bcemail."\r\n";
        $headers .= "Cc:".$ccemail."\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";

		$subject = "New contact detail has been successfully placed at What You Want Offers";

        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content . "<table align=center width=600 border=0 cellspacing=0 cellpadding=0>";
        $content = $content . "<tr><td style=padding:10px;><a href=".$frontpath."><img src=".$frontpath."images/logo.png border=0/></a></td></tr>";
        $content = $content . "<tr><td style=padding:10px;>";
        $content = $content . "<table bgcolor=#F6F6F6 style=font-size:12px;color:#333;font-family:Arial, Helvetica, sans-serif; border=0 cellspacing=0 cellpadding=10 width=100%>";
        $content = $content . "<tr><td valign=top><p>Dear Administrator,</p>";
        $content = $content . "<p>New contact detail has listed below.</p>";
        $content = $content . "<table style=font-size:12px;color:#333;font-family:Arial, Helvetica, sans-serif;  border=0 cellspacing=3 cellpadding=0 width=100%>";
        $content = $content . "<tr><td width=200 valign=top><strong>Name </strong></td><td valign=top>".$fname." ".$lname."</td></tr>";
        $content = $content . "<tr><td valign=top><strong>Email Id </strong></td><td valign=top>".$email."</td></tr>";
        $content = $content . "<tr><td valign=top><strong>Phone </strong></td><td valign=top>".$contact."</td></tr>";
		$content = $content . "<tr><td valign=top><strong>Comment</strong></td><td valign=top>".$message."</td></tr>";
		$content = $content . "<tr><td valign=top><strong>City </strong></td><td valign=top>".$city."</td></tr>";
        $content = $content . "<tr><td valign=top><strong>Message </strong></td><td valign=top>".$message."</td></tr>";
        $content = $content . "<tr><td valign=top></td><td valign=top></td></tr>";
        $content = $content . "</table>";
        $content = $content . "<p>&nbsp;</p>";
        $content = $content . "<p>Kind regards,</p>";
        $content = $content . "<p><strong><a href=".$frontpath." style=color: #78654E>".$mywebsitename."</a></strong></p>";
        $content = $content . "<p>&nbsp;</p></td></tr>";
        $content = $content . "</table>";
        $content = $content . "</td></tr>";
        $content = $content . "</table>";
        $content = $content . "</body></html>";
        //echo $subject."<br>";
        //echo $content."<br>";
        //mail("shawnmichale@gmail.com",$subject,$content,$headers);
        mail($adminemail,$subject,$content,$headers);


        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "From:".$fromemail."\r\n";
        //$headers .= "Reply-To:".$fromemail."\r\n";
        //$headers .= "Return-Path:".$fromemail."\r\n";
        $headers .= "Bcc:".$bcemail."\r\n";
        $headers .= "Cc:".$ccemail."\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";

		$subject = "Your contact detail has been successfully placed at What You Want Offers";

        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content . "<table align=center width=600 border=0 cellspacing=0 cellpadding=0>";
        $content = $content . "<tr><td style=padding:10px;><a href=".$frontpath."><img src=".$frontpath."images/logo.png border=0/></a></td></tr>";
        $content = $content . "<tr><td style=padding:10px;>";
        $content = $content . "<table bgcolor=#F6F6F6 style=font-size:12px;color:#333;font-family:Arial, Helvetica, sans-serif; border=0 cellspacing=0 cellpadding=10 width=100%>";
        $content = $content . "<tr><td valign=top><p>Dear ".$fname." ".$lname.",</p>";
        $content = $content . "<p>Your contact detail has listed below.</p>";
        $content = $content . "<table style=font-size:12px;color:#333;font-family:Arial, Helvetica, sans-serif;  border=0 cellspacing=3 cellpadding=0 width=100%>";
        $content = $content . "<tr><td width=200 valign=top><strong>Name </strong></td><td valign=top>".$fname." ".$lname."</td></tr>";
        $content = $content . "<tr><td valign=top><strong>Email Id </strong></td><td valign=top>".$email."</td></tr>";
        $content = $content . "<tr><td valign=top><strong>Phone </strong></td><td valign=top>".$contact."</td></tr>";
		$content = $content . "<tr><td valign=top><strong>Comment</strong></td><td valign=top>".$message."</td></tr>";
		$content = $content . "<tr><td valign=top><strong>City </strong></td><td valign=top>".$city."</td></tr>";
        $content = $content . "<tr><td valign=top><strong>Message </strong></td><td valign=top>".$message."</td></tr>";
        $content = $content . "<tr><td valign=top></td><td valign=top></td></tr>";
        $content = $content . "</table>";
        $content = $content . "<p>&nbsp;</p>";
        $content = $content . "<p>Kind regards,</p>";
        $content = $content . "<p><strong><a href=".$frontpath." style=color: #78654E>".$mywebsitename."</a></strong></p>";
        $content = $content . "<p>&nbsp;</p></td></tr>";
        $content = $content . "</table>";
        $content = $content . "</td></tr>";
        $content = $content . "</table>";
        $content = $content . "</body></html>";
        
        mail($email,$subject,$content,$headers);
/* echo '<div style="color:#373737" >Your message has been sent, Thank you.</div>';*/
        header("Location: ".$frontpath."/thankyouenquiry.php?msg=contact");
		exit();
?>