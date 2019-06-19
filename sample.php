<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="you@youremail.com">
<input type="hidden" name="item_name" value="Item Name">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="amount" value="6.00">
<input type="hidden" name="quantity" value="5">
<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>-->
<?php require_once('db.php');?>
SUBSCRIPTION PAYMENT FORM

----------------------------------------------

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="64QG7S2TP8JGL">
<input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form>

 

MULTIPLE ITEMS FORM

----------------------------------

<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="abc@gmail.com">
<input type="hidden" name="currency_code" value="AUD">

 
<!--First Item-->
<p>
<input type="hidden" name="item_name_1" value="Cross Trainer Software CD">
<input type="hidden" name="item_number_1" value="CROSSTRAINCD">
<input type="hidden" name="amount_1" value="120.00">
Lexia Cross Trainer Software CD
 <select name="quantity_1" value="">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</p>

<?php /*?><!--Second Item--> 
<p>
<input type="hidden" name="item_name_2" value="Literacy and Maths Online Monthly Subscription">
<input type="hidden" name="item_name_2" value="LITONLINE1">
<input type="hidden" name="amount_2" value="120.00">
Literacy and Maths Online Monthly Subscription
 <select name="quantity_2" value="">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</p>

<!--Third Item-->
<p>
<input type="hidden" name="item_name_3" value="Family Discount Offer Monthly Subscription">
<input type="hidden" name="item_number_3" value="FDISCOUNT">
<input type="hidden" name="amount_3" value="120.00">
Family Discount Offer - Monthly Subscription
 <select name="quantity_3" value="">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</p>

<!--Fourth Item-->
<p>
<input type="hidden" name="item_name_4" value="Family Discount Offer Monthly Subscription - Additional Users">
<input type="hidden" name="item_number_4" value="FDISCOUNTUSERS">
<input type="hidden" name="amount_4" value="40.00">
Family Discount Offer - Additional Users
 <select name="quantity_4" value="">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</p><?php */?>
 
<input type="hidden" name="return" value="http://www.literacyandmaths.com.au/thankyou.html">

 

<input type="image" src="http://images.paypal.com/en_US/i/btn/x-click-but22.gif" border="0" name="submit" width="87" height="23" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
<?php
	
?>
<?php
$x =1;
	while($x <= 5)
		{
				
			echo 'item_name_'.$x.'<br>';
			$x++;
		}
?>

<script>
function check_dd() {
    if(document.getElementById('security_question_1').value == "paypal") {
        document.getElementById('paypal').style.display = 'block';
        document.getElementById('credit').style.display = 'none';
    }
 else if(document.getElementById('security_question_1').value == "credit"){
        document.getElementById('paypal').style.display = 'none';
        document.getElementById('credit').style.display = 'block';

    }
 else if(document.getElementById('security_question_1').value == ""){
        document.getElementById('paypal').style.display = 'none';
        document.getElementById('credit').style.display = 'none';

    }

}

</script>

<select class="default" id="security_question_1" name="security_question_1" onchange="check_dd();">
    <option value="" selected>Select question...</option>
    <option value="paypal">Paypal</option>
    <option value="credit">Credit Card</option>
   
</select>

<div id="paypal" style="display:none;">paypal</div>
<div id="credit" style="display:none;">credit</div>



