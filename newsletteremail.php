<?php 
require_once('db.php'); 
header("Content-type: text/javascript");

require 'PHPMailer/PHPMailerAutoload.php';
if(isset($_POST['newslater_email'])){
	$slselect = "select * from newsletter";
	$resque = mysqli_query($dbLink,$slselect) or die ('Could Not select newslater email');
	$data = $resque->fetch_assoc();
	//print_r($data);
	
	
	
	
		if($data['newsletter_email'] != $_POST['newslater_email']){
			
			$message= 'Welcome to our website. Thanks';
			$mail = new PHPMailer;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'test1.glorywebs@gmail.com';                 // SMTP username
			$mail->Password = 'Glory@789+123';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to
			$mail->setFrom('test1.glorywebs@gmail.com', 'Mailer');
			$mail->addAddress($_POST['newslater_email'], 'receiver');     // Add a recipient
			$mail->isHTML(true);
			$mail->Subject = 'Thanks For Subscrib..';
			$mail->Body   = $message;
			
			//echo '<pre>';
			//print_r($mail);				
		
			 if($mail->send()) //output success or failure messages
				{   	
				
					$sqlnewslater = "INSERT INTO  newsletter (newsletter_email) VALUES ('".$_POST['newslater_email']."')";
					$resnewslater = mysqli_query($dbLink,$sqlnewslater) or die ('Could Not insert newslater email');
					$msg = 'You are successfully subscribed..';
				
				}else{
				
					$msg = 'Something are wrong..';
				
				}
			
		}else{
			
			$msg = 'You are already Subscriber..';
			
		}
	
	
	
	?>	
		
		<?php /*?>if($_POST['newslater_email'] != $data['newsletter_email']){
			$sqlnewslater = "INSERT INTO  newsletter (newsletter_email) VALUES ('".$_POST['newslater_email']."')";

			$resnewslater = mysqli_query($dbLink,$sqlnewslater) or die ('Could Not insert newslater email');
			if($resnewslater){
				
				$message= 'Welcome to our website. Thanks';
				
				$mail = new PHPMailer;
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'test1.glorywebs@gmail.com';                 // SMTP username
				$mail->Password = 'Glory@abc+123';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;                                    // TCP port to connect to
				$mail->setFrom('test1.glorywebs@gmail.com', 'Mailer');
				$mail->addAddress($_POST['newslater_email'], 'receiver');     // Add a recipient
				$mail->isHTML(true);
				$mail->Subject = 'Thanks For Subscrib..';
				$mail->Body   = $message;
				
								
			
				 if($mail->send()) //output success or failure messages
					{       
						$msg = 'You are successfully subscribed.';
					}else{
						$msg = 'Something are wrong..';
					}
				
			}
		}else{
			$msg = "You are already subscribe";
		}<?php */?>
		
			
	
	
	
	
	
<?php 	
	
}

$data = array(
            
			"msg"=>$msg
			
        );
echo json_encode($data);

	
?>