<?php
include('db.php');
include('include/start_session.php');
$email = $_POST['email'];
$headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "From:".$fromemail."\r\n";
        $headers .= "Bcc:".$bcemail."\r\n";
        $headers .= "Cc:".$ccemail."\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";

		$subject = "You Are Recommended To This URL";

        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content . "<table align=center width=600 border=0 cellspacing=0 cellpadding=0>";
        $content = $content . "<tr><td style=padding:10px;><a href=".$frontpath."><img src=".$frontpath."images/logo.png border=0/></a></td></tr>";
        $content = $content . "<tr><td style=padding:10px;>";
        $content = $content . "<table bgcolor=#F6F6F6 style=font-size:12px;color:#333;font-family:Arial, Helvetica, sans-serif; border=0 cellspacing=0 cellpadding=10 width=100%>";
        $content = $content . "<tr><td valign=top><p>Hello,</p>";
        $content = $content . "<p>You are recommended to this URL.</p>";
        $content = $content . "<table style=font-size:12px;color:#333;font-family:Arial, Helvetica, sans-serif;  border=0 cellspacing=3 cellpadding=0 width=100%>";
		$content = $content . "<tr><td width=200 valign=top><strong>Url</strong></td><td valign=top>From : ".$_SESSION['FirstName']." ".$_SESSION['LastName']."</td></tr>";
		$content = $content . "<tr><td width=200 valign=top><strong>Url</strong></td><td valign=top>From : ".$_SESSION['FirstName']."'s Mail : ".$_SESSION['Email']."</td></tr>";
        $content = $content . "<tr><td width=200 valign=top><strong>Clic Here:</strong></td><td valign=top><a href='".$frontpath."'>Devnandan Store</a></td></tr>";
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
		echo "<script>window.location='".$frontpath."/friend.php?msg=Your Message Is Sent.'</script>";
?>