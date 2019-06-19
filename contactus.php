<?php require_once('db.php'); ?>
<?php require_once('include/function.php'); ?>
<?php include('include/start_session.php'); ?>
<?php $title ="Contact Us".' | '. $mywebsitename; ?>
<?php require_once('header.php'); ?>
    <div class="contact_us">
          <div class="wrapper"> 
        <!--<div class="sitemap"><a href="index.php" title="Home">Home</a><span>></span><p>Contact Us</p></div>-->
        <h3> Contact Us </h3>
	<div class="new_contact">
        <?php
          	$sql="select content from pagemgnt where status=1 and title='Contact Us'";
			$res=mysqli_query($dbLink,$sql) or die("Could Not Select Page");
			$data=$res->fetch_assoc();
			
      ?>
<div style="float:left;box-shadow:0 0 3px 1px #7051AA;margin-top:50px;margin-right:3%;padding:20px 0;margin-left:37px;border-radius:7px;width:300px;">
        <table width="100%" cellpadding="7" cellspacing="0" style="float:left">
              
            <th>- Our Location -</th>
          <tr>
            <td class="add_contact"><img src="<?=$frontpath?>/images/address.png" alt="address" title="address" /><strong>Address :-</strong></td>
            <td class="content_contact"><?=html_entity_decode(stripslashes($slocation))?></td>
          </tr>
              <tr>
            <td class="add_contact"><img src="<?=$frontpath?>/images/phone.png" alt="address" title="address" /><strong>Telephone : -</strong></td>
            <td class="content_contact"><?=$sphone?></td>
          </tr>
              <tr>
            <td class="add_contact"><img src="<?=$frontpath?>/images/icon.email.png" alt="address" title="address" /><strong>Email</strong></td>
            <td class="content_contact"><a href="mailto:<?=$semail?>" class="mail_contact" title="<?=$semail?>"><?=$semail?></a></td>
          </tr>
            </table>
</div>
<div style="float:left;box-shadow:0 0 3px 1px #7051AA;margin-top:50px;width:561px;">
<table width="70%" cellpadding="0" cellspacing="0" style="float:left;;">
	<tr>

<td><?=$map?>

</td>
</tr>
</table>
</div>
        <!-- <table cellpadding="5" cellspacing="5" id="feedback_form" >
          <form id="ServiceForm" name="ServiceForm"  >
            <tr>
              <th colspan="2">SEND YOUR DETAILS TO US</th>
            </tr>
            <tr>
              <td><b>First Name:</b></td>
              <td><input name="fname" id="fname" type="text" class="textbox"></td>
            </tr>
            <tr>
              <td><b>Last Name:</b></td>
              <td><input name="lname" id="lname" type="text" class="textbox"></td>
            </tr>
            <tr>
              <td><b>Address:</b></td>
              <td><textarea name="address" id="address" cols="5" rows="5" class="textbox"></textarea></td>
            </tr>
            <tr>
              <td><b>City:</b></td>
              <td><input name="city" id="city" type="text" class="textbox"></td>
            </tr>
            <tr>
              <td><b>Contact:</b></td>
              <td><input name="contact" id="contact" type="text" class="textbox"></td>
            </tr>
            <tr>
              <td><b>Email Id:</b></td>
              <td><input name="email" id="email" type="text" class="textbox"></td>
            </tr>
            <tr>
              <td><b>Message:</b></td>
              <td><textarea name="message" id="message" cols="5" rows="5" class="textbox"></textarea></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="button" onclick="return Validate1(ServiceForm);" value="Submit" class="submit">
                <img src="<?=$frontpath?>/images/spinner.gif" alt="Waiting.." id="waiting" height="23" width="23" style="margin-left:-132px; margin-top: 9px; visibility:hidden;" >
                <div id="sucres" style="color:rgb(217,182,162);
    float: left;
    margin: 14px 8px 8px 21px;
    width: 236px;font-size:12px"></div></td>
            </tr>
          </form>
        </table>--> 
        
      </div></div>
        </div>
  </div>
      <?php require_once('footer.php'); ?>