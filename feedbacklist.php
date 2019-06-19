
<div class="feedback">
                	<h3>Customer Feedback</h3>
                     <?php
	 $fsql="select * from feedback order by createdon DESC";
	 $fres=mysqli_query($dbLink,$fsql) or die('could not select......');
	 if(mysqli_num_rows($fres) > 0)
	 {
		 while($fdata = $fres->fetch_assoc())
		 {
			?> <p><?=$fdata['firstname']?></p>
    <span style="width:356px;"><?=$fdata['message']?> <a href="<?=$frontpath?>/allfeedback.php" title="Read More">Read More>></a></span>
	<?php
		 }
	 }
	?>
                </div></div>