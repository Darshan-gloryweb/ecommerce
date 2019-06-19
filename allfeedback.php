<?php require_once('db.php'); 
 include('include/start_session.php');
?>
<?php require_once('include/function.php'); ?>
<?php $title = 'Feedback List' .' | '.$mywebsitename ?>
<?php require_once('header.php'); ?>

                <h3 class="testimonial">Feedback</h3>
                <?php 
					$au_sql = "select * from feedback where status = 1";
					$au_res = mysqli_query($dbLink,$au_sql) or die('could not select Author');
					$au_cnt=mysqli_num_rows($au_res);
		
			while($audata=$au_res->fetch_assoc())
				{ ?>
						                <p class="testimonial_p">"<?=$audata['message']?>"
						                	<span class="testimonial_span">
- <?=$audata['firstname']?></span></p>					
				  <?php
				}

					
				?>

  </div>

<?php require_once('footer.php'); ?>