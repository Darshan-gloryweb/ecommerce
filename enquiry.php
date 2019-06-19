<?php 
/*************

	Author : Glorywebs PVT LTD.
	URL : http://www.glorywebs.com
	Developed By : Manish Prajapati
	Created On : 31-12-2013
	Description : This is the Index Page
	
*************/
?>
<?php require_once('db.php'); ?>
<?php $title = "Enquiry"; ?>
<?php 
	  $sql="select id,title,content from pagemgnt where title='Feedback'";
	  $content=mysqli_query($dbLink,$sql);
	  $data=$content->fetch_assoc();
?>
<?php require_once('include/function.php'); ?>
<?php include('include/start_session.php'); ?>
<?php $title ="Enquiry".' | '. $mywebsitename; ?>
<?php require_once('header.php'); ?>
      <div class="wrapper"> 
    <!--<div class="sitmap"> 
    	<a href="<?=$frontpath?>/index.php" alt="Home" title="Home">Home</a><span> ></span>
        <p><?php echo  $data['title']; ?></p>
    </div>-->
    <div class="contact_us">
          <h3>Enquiry</h3>
          <?=$data['content']?>
          <table id="feedback_form" class="table" >
        <form id="ServiceForm" name="ServiceForm" method="post" action="enquiryp.php" onsubmit="return Validateenquiry(ServiceForm);" >
 <tr>
            <td><table cellspacing="5" cellpadding="5" style="width:937px;">
                <tr  >
                  <td class="feed1" style="width:200px;padding:0"><b>Name:</b></td>
                  
                
				
                  <td class="feed1" style="width:200px;padding:0"><b>Last Name:</b></td>
<td class="feed1" style="width:149px;padding:0"><b>City:</b></td>
</tr>
<tr>
<td class="feed1" style="width:200px;padding:0"> <input name="fname" id="fname" type="text" class="textbox feed3" /> </td>
                  <td class="feed1" style="width:200px;padding:0"> <input name="lname" id="lname" type="text" class="textbox feed3" /> </td>
<td class="feed1" style="width:149px;padding:0"><input name="city" id="city" type="text" class="textbox feed3"></td>
                </tr>
                <!--<tr>
                  <td><b>Last Name:</b></td>
                  <td><input name="lname" id="lname" type="text" class="textbox"></td>
                </tr>-->
                <!--<tr>
                    <td><b>Address:</b></td>
                    <td><textarea name="address" id="address" cols="5" rows="5" class="textbox"></textarea></td>
                  </tr>-->
                <!--<tr>
                  <td><b>City:</b></td>
                  <td><input name="city" id="city" type="text" class="textbox"></td>
                </tr>-->
 <tr >
                  <td class="feed1"  style="width:200px;padding:0"><b>Contact:</b></td>
                  <td class="feed1"  style="width:149px;padding:0"><b>Email Id:</b></td>                  
               </tr>
<tr>
<td class="feed1" style="width:200px;padding:0"><input name="contact" id="contact" type="text" class="textbox feed3"></td>
                  <td class="feed1" style="width:149px;padding:0"><input name="email" id="email" type="text" class="textbox feed3"></td>
                </tr>

                <tr class="feed2" style="float:left;width:232px">
                  <td class="feed1" style="width:90px;padding:0"><b>Comment:</b></td>
</tr>
<tr>
                  <td class="feed1" style="padding:0"><textarea name="message" id="message" cols="5" rows="5" class="textbox " style="width:930px;min-height:167px;"></textarea></td>
                </tr>
 <tr>
                      <td style="padding:0">
                           Type Word below
</td></tr>

                      <td class="feed1" style="width:180px;padding:0">
 <input type="text" name="vcode" id="vcode" class="textbox" style="width:140px" />
<input type="hidden" name="hidrandval" id="hidrandval" /><img src="<?=$frontpath?>/images/refresh.png" onclick="Refreshchange();" style="cursor:pointer;margin-left:5px" />
                      </td>


                  </tr>
<tr>
<td style="padding:0">
                           <div id="captchadiv" title="verification image, type it in the box" style=" border: 1px solid rgb(210,209,207);
    color:rgb(55,55,55);
    font-family: Playball;
    font-size: 16px;
    font-weight: bold;
    padding: 6px;
    text-align: center;
    width: 80px;    margin-top: 8px;"></div>
                      </td>
</tr>
              </table></td></tr>
              <?php /*?><tr>
            <td><table cellspacing="5" cellpadding="5">
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
              </table></td>
            <td><table cellspacing="5" cellpadding="5" style="float:left;width:100%">
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
                  <td>Type Word below
                      <div id="captchadiv" title="verification image, type it in the box" style="color:#304D45;FONT-FAMILY: Arial, Helvetica, sans-serif;font-size:24px;font-weight:bold;width:80px;"></div></td>
                  <td><input type="text" name="vcode" id="vcode" class="textbox" />
                      <input type="hidden" name="hidrandval" id="hidrandval" />
                      <img src="<?=$frontpath?>/images/refresh.png" onclick="Refreshchange();" style="cursor:pointer;" /></td>
                </tr>
              </table></td>
          </tr><?php */?>
              <tr>
            <td colspan="2"><input type="submit"   value="Submit" class="submit" style=" margin-top: 10px;">
                  <img src="<?=$frontpath?>/images/spinner.gif" alt="Waiting.." id="waiting" height="23" width="23" style="margin-left:20px; margin-top: 9px; visibility:hidden;" >
                  <div id="sucres" style="color:#373737;margin: -36px 8px 8px 96px;
    width: 165px;float:left"></div></td>
          </tr>
            </form>
      </table>
        </div>
        </div>
  </div>
      <?php require_once('footer.php'); ?>