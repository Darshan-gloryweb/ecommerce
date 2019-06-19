<?php require_once('db.php'); ?>
<?php $title = "Feedback"; ?>
<?php 
	  $sql="select id,title,content from pagemgnt where title='Feedback'";
	  $content=mysqli_query($dbLink,$sql);
	  $data=$content->fetch_assoc();
?>
<?php require_once('include/function.php'); ?>
<?php include('include/start_session.php'); ?>
<?php $title ="Feedback".' | '. $mywebsitename; ?>
<?php require_once('header.php'); ?>
    <div class="wrapper"> 
        <div class="contact_us">
        <h3>Feedback</h3>
        <?=$data['content']?>
        <table id="feedback_form" class="feed table" style="width:920px;">
            <form id="ServiceForm" name="ServiceForm" method="post" action="contactp.php" onsubmit="return Validatefeedback(ServiceForm);" >
            <tr>
                <td><table cellspacing="5" cellpadding="5" style="width:937px;">
                    <tr class="feed2" style="float:left;width:272px">
                    <td class="feed1"><b>Name:</b></td>
                    <td class="feed1"><input name="fname" id="fname" type="text" class="textbox feed3" /></td>
                  </tr>
                    <tr class="feed2" style="float:left;width:272px">
                    <td class="feed1"><b>Contact:</b></td>
                    <td class="feed1"><input name="contact" id="contact" type="text" class="textbox feed3"></td>
                  </tr>
                    <tr class="feed2" style="float:left;width:272px">
                    <td class="feed1"><b>Email Id:</b></td>
                    <td class="feed1"><input name="email" id="email" type="text" class="textbox feed3"></td>
                  </tr>
                    <tr>
                    <td class="feed1" style="font-weight:bold">Ratings:</td>
                    <td><input type="radio" name="ratings" id="ratings"  value="excellent" style="margin:0 5px 0 0;"/>
                        Excellent
                        <input type="radio" name="ratings" id="ratings"  value="verygood" style="margin:0 5px;"/>
                        Very Good
                        <input type="radio" name="ratings" id="ratings"  value="Good" style="margin:0 5px;"/>
                        Good
                        <input type="radio" name="ratings" id="ratings"  value="Average" style="margin:0 5px;"/>
                        Average
                        <input type="radio" name="ratings" id="ratings"  value="Poor" style="margin:0 5px;"/>
                        Poor</td>
                  </tr>
                    <tr class="feed2" style="float:left;width:272px">
                    <td class="feed1" style="width:60px;"><b>Comment:</b></td>
                    <td class="feed1" ><textarea name="message" id="message" cols="5" rows="5" class="textbox " style="width:720px;min-height:167px;"></textarea></td>
                  </tr>
                  </table></td>
              </tr>
            <tr>
                <td colspan="2"><input type="submit"   value="Submit" class="submit" style="margin-top:180px;margin-left:450px"></td>
              </tr>
          </form>
          </table>
      </div>
      </div>
  </div>
  <div class="content1">
  <h1>Customers Feedback</h1>
  <?php
     $fsql="select * from feedback order by createdon DESC";
	 $fres=mysqli_query($dbLink,$fsql) or die('could not select feedback');
	 if(mysqli_num_rows($fres) > 0)
	 {
		 while($fdata = $fres->fetch_assoc())
		 {
			?>
         <div class="feed_item">   
         <p><?=$fdata['firstname']?></p>
    <span><?=$fdata['message']?> <a href="<?=$frontpath?>/allfeedback.php" title="Read More">Read More>></a></span>
    </div>
	<?php
		 }
	 }
	 else
	 {
		 echo "<div class='feed_item'><p>No Customers Feedback</p></div>";
	 }
	?>
  </div>
    <?php require_once('footer.php'); ?>