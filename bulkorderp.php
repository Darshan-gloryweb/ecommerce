<?php 
require_once('db.php');
include('include/start_session.php');
require 'PHPMailer/PHPMailerAutoload.php';

if(isset($_SESSION['Email'])) {
	$cus_email = $_SESSION['Email'];
}else{
	$cus_email = $_POST['email'];
}


//$product_detail = serialize($product_detail1);


$sqlbulkoder = "INSERT INTO  bulkorder (cus_id,firstname,lastname,email,phoneno,description,isbusiness, companyname,buyertype,gstno,panno) VALUES ('".$cus_email."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phoneno']."','".$_POST['description']."','".$_POST['isbusiness']."','".$_POST['companyname']."','".$_POST['buyertype']."','".$_POST['gstno']."','".$_POST['panno']."')";

$resbulkorder = mysqli_query($dbLink,$sqlbulkoder) or die ('Could Not insert bulkorder');

if($resbulkorder){
	$lastinser_id = mysqli_insert_id($dbLink);
	
	$productName=$_POST['productName'];
	$quantity=$_POST['quantity'];
	$brand=$_POST['brand'];
	
	$count_productName = count($productName);
	
	for ($i=0; $i < $count_productName ; $i++) {
		 
		$sql_bulk_pro_detail = "INSERT INTO  bulkorder_prodetail (bulkorderid,productName,quantity,brand) VALUES ('".$lastinser_id."','".$productName[$i]."','".$quantity[$i]."','".$brand[$i]."')";
		$res_bulk_pro_detail = mysqli_query($dbLink,$sql_bulk_pro_detail) or die ('Could Not insert bulkorder product detail.');	
		
	}
	
	$sqlselect_bulk_pro_detail = "select * from bulkorder_prodetail where bulkorderid=".$lastinser_id;
	$resselect_bulk_pro_dtail = mysqli_query($dbLink,$sqlselect_bulk_pro_detail) or die ('Could Not insert bulkorder product detail.');
	
	
	$message='<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" border="0" id="backgroundTable" st-sortable="preheader">
	<tbody>
    	<tr>
        	<td>
            	<table  width="600" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="center">
                	<tbody>
                    	<tr>
                        	<td width="100%">
                            	<table width="600" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="center">
                                	<tbody>
                                    <!--Spacing Start-->
                                    	<tr>
                                        	<td width="100%" height="20"></td>
                                        </tr>
                                     <!--Spacing End-->
                                     <tr>
                                     	<td>
                                        	<table width="280" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="left">
                                            	<tbody>
                                                	<tr>
                                                    	<td style="color:#000000;font-family:Arial, Helvetica, sans-serif ; font-size:25px; text-transform:uppercase" align="left" valign="middle" st-content="viewonline"><a href="#" title="Logo" style="color:#000000; text-decoration:none"><img src="http://glorywebsdev.com/ecommerce/images/logomain.png" style="height:auto; width:120px;"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="280" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="right">
                                            	<tbody>
                                                	<tr>
                                                    	
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                     </tr>
                                     <!--Spacing Start-->
                                     <tr>
                                     	<td width="100%" height="20"></td>
                                     </tr>
                                     <!--Spacing Ends-->
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" bgcolor="#f7f7f7">
        <tbody>
            <tr>
                <td>
                    <table bgcolor="#ffffff" align="center" width="600" cellpadding="0" cellspacing="0" border="0" class="devicewidth" style="border-top:5px solid #DC1410">
                        <tbody>
                        <!--Spacing Start-->
                            <tr>
                                <td height="20" style="line-height:1px;font-size:1px;mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                        <!--Spacing Ends-->
                        <tr>
                            <td>
                                <table width="560" cellpadding="0" cellspacing="0" align="center" border="0" class="devicewidthinner">
                                    <tbody>
                                        <!--Spacing Start-->
                                        
                                        <!--Spacing Ends-->
                                        <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
										
                                        <!--Title Start-->
                                        <tr>
                                            <td style="font-size:60px;font-weight:700;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:center;text-transform:uppercase;line-height:70px;">
        New Order</td>
                                        </tr>
                                        <!--Title Ends-->
                                        <!--Content Start Here-->
                                        
                                        <!--Content Ends Here-->
                                        <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;line-height:20px;text-align:center"></td>
                                        </tr>
                                         <!--Spacing Start-->
                                        <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
                                        <!--Spacing Ends-->
                                        <!---product detail start-->
										
										<tr>
											<td>
												<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">
												<tr style="font-size:20px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px; font-weight:bold">
													<th>Product Name</th>
													<th>Quantity</th>
													<th>Brand</th>
												</tr>';
													while($dataselect_bulk_pro_dtail = $resselect_bulk_pro_dtail->fetch_assoc()){
											$message.='<tr><td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">';			
											$message.=$dataselect_bulk_pro_dtail['productName'];
											$message.='</td><td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">';
											$message.=$dataselect_bulk_pro_dtail['quantity'];
											$message.='</td><td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">';
											$message.=$dataselect_bulk_pro_dtail['brand'];
											$message.='</td></tr>';
											
										}
												
										$message.='</table>
										
											
											</td>
										
										
										</tr>
										<!--Spacing Start-->
											<tr>
												<td height="20" style="line-height:1px;font-size:1px;mso-line-height-rule: exactly;">&nbsp;</td>
											</tr>
										<!--Spacing Ends-->
										<tr>
											<td>
												<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">';
									
										if($_POST['isbusiness'] == 1){
											
											$message.='<tr><td>
												<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold; width:30%">
														Company Name
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['companyname'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Industry
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['buyertype'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														GSTIN
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['gstno'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														PAN NO
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['panno'].'</td>
												</tr>
												</table>
											
											</td></tr>';
										}			
												
										$message.='
												<tr>
													<td>
														<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">			
														<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														First Name
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['firstname'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Last Name
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['lastname'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Email
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['email'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Phone No
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">'.$_POST['phoneno'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Description
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['description'].'</td>
												</tr>
														
														
														</table>
													</td>	
												
													
												</tr>';
												
										$message.='</table>
											</td>
										</tr>
										<!---product detail end-->
                                        <!-- Spacing -->
                                        <tr>
                                         <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                      </tr>
                                      <!-- Spacing -->
                                      <tr>
                                        <td>
        
                            </td>
                          </tr>
                       </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>

';
	
	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'test1.glorywebs@gmail.com';                 // SMTP username
	$mail->Password = 'Glory@789+123';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	$mail->setFrom('test1.glorywebs@gmail.com', 'Mailer');
	$mail->addAddress($_POST['email'], 'receiver');     // Add a recipient
	$mail->isHTML(true);
	$mail->Subject = 'New Bulk Order';
	$mail->Body   = $message;
	
					

	 if($mail->send()) //output success or failure messages
        {       
            echo 'yes';
        }else{
            echo 'no';
        }
	
	$message='<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7" border="0" id="backgroundTable" st-sortable="preheader">
	<tbody>
    	<tr>
        	<td>
            	<table  width="600" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="center">
                	<tbody>
                    	<tr>
                        	<td width="100%">
                            	<table width="600" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="center">
                                	<tbody>
                                    <!--Spacing Start-->
                                    	<tr>
                                        	<td width="100%" height="20"></td>
                                        </tr>
                                     <!--Spacing End-->
                                     <tr>
                                     	<td>
                                        	<table width="280" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="left">
                                            	<tbody>
                                                	<tr>
                                                    	<td style="color:#000000;font-family:Arial, Helvetica, sans-serif ; font-size:25px; text-transform:uppercase" align="left" valign="middle" st-content="viewonline"><a href="#" title="Logo" style="color:#000000; text-decoration:none"><img src="http://glorywebsdev.com/ecommerce/images/logomain.png" style="height:auto; width:120px;"></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="280" cellpadding="0" cellspacing="0" border="0" class="devicewidth" align="right">
                                            	<tbody>
                                                	<tr>
                                                    	
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                     </tr>
                                     <!--Spacing Start-->
                                     <tr>
                                     	<td width="100%" height="20"></td>
                                     </tr>
                                     <!--Spacing Ends-->
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" bgcolor="#f7f7f7">
        <tbody>
            <tr>
                <td>
                    <table bgcolor="#ffffff" align="center" width="600" cellpadding="0" cellspacing="0" border="0" class="devicewidth" style="border-top:5px solid #DC1410">
                        <tbody>
                        <!--Spacing Start-->
                            <tr>
                                <td height="20" style="line-height:1px;font-size:1px;mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                        <!--Spacing Ends-->
                        <tr>
                            <td>
                                <table width="560" cellpadding="0" cellspacing="0" align="center" border="0" class="devicewidthinner">
                                    <tbody>
                                        <!--Spacing Start-->
                                        
                                        <!--Spacing Ends-->
                                        <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
										
                                        <!--Title Start-->
                                        <tr>
                                            <td style="font-size:60px;font-weight:700;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:center;text-transform:uppercase;line-height:70px;">
        New Order</td>
                                        </tr>
                                        <!--Title Ends-->
                                        <!--Content Start Here-->
                                        
                                        <!--Content Ends Here-->
                                        <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;line-height:20px;text-align:center"></td>
                                        </tr>
                                         <!--Spacing Start-->
                                        <tr>
                                             <td width="100%" height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                        </tr>
                                        <!--Spacing Ends-->
                                        <!---product detail start-->
										
										<tr>
											<td>
												<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">
												<tr style="font-size:20px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px; font-weight:bold">
													<th>Product Name</th>
													<th>Quantity</th>
													<th>Brand</th>
												</tr>';
													while($dataselect_bulk_pro_dtail = $resselect_bulk_pro_dtail->fetch_assoc()){
											$message.='<tr><td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">';			
											$message.=$dataselect_bulk_pro_dtail['productName'];
											$message.='</td><td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">';
											$message.=$dataselect_bulk_pro_dtail['quantity'];
											$message.='</td><td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">';
											$message.=$dataselect_bulk_pro_dtail['brand'];
											$message.='</td></tr>';
											
										}
												
										$message.='</table>
										
											
											</td>
										
										
										</tr>
										<!--Spacing Start-->
											<tr>
												<td height="20" style="line-height:1px;font-size:1px;mso-line-height-rule: exactly;">&nbsp;</td>
											</tr>
										<!--Spacing Ends-->
										<tr>
											<td>
												<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">';
									
										if($_POST['isbusiness'] == 1){
											
											$message.='<tr><td>
												<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold; width:30%">
														Company Name
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['companyname'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Industry
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['buyertype'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														GSTIN
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['gstno'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														PAN NO
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['panno'].'</td>
												</tr>
												</table>
											
											</td></tr>';
										}			
												
										$message.='
												<tr>
													<td>
														<table width="560" cellpadding="10" cellspacing="10" align="center" border="0">			
														<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														First Name
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['firstname'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Last Name
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['lastname'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Email
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['email'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Phone No
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:2px;">'.$_POST['phoneno'].'</td>
												</tr>
												
												<tr>
													<td style="font-size:17px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px; font-weight:bold;width:30%">
														Description
													</td>
													<td style="font-size:14px;font-family:Arial, Helvetica, sans-serif;color:#000000;text-align:left;line-height:17px;">'.$_POST['description'].'</td>
												</tr>
														
														
														</table>
													</td>	
												
													
												</tr>';
												
										$message.='</table>
											</td>
										</tr>
										<!---product detail end-->
                                        <!-- Spacing -->
                                        <tr>
                                         <td height="20" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                      </tr>
                                      <!-- Spacing -->
                                      <tr>
                                        <td>
        
                            </td>
                          </tr>
                       </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>

';
	
	
	
	
}
	
	
	
	
	
//$message.="
//	
//'".$_POST['productName']."' 
//'".$_POST['quantity']."'
//'".$_POST['brand']."' 
//
//'".$_POST['isbusiness']."' 
//'".$_POST['companyname']."' 
//'".$_POST['buyertype']."' 
//'".$_POST['gstno']."' 
//'".$_POST['panno']."' 
//
//'".$_POST['firstname']."' 
//'".$_POST['lastname']."' 
//'".$_POST['email']."' 
//'".$_POST['phoneno']."' 
//'".$_POST['description']."' ";
//

	

