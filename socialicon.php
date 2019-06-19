 <div class="social">

 <?php

    $social_sql = "Select * from socialmedia where status = 'Yes' order by displayorder";

    $social_res = mysqli_query($dbLink,$social_sql) or die("can not select social media");

	if(mysqli_num_rows($social_res)>0)

	{

		while($social_data = $social_res->fetch_assoc())

		{

			if($social_data['name'] == 'linkedin')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="facebook" alt="facebook" src="<?= $frontpath?>/images/in.png"></a>

				<?php

			}

			else if($social_data['name'] == 'youtube')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="facebook" alt="facebook" src="<?= $frontpath?>/images/youtube.png"></a>

				<?php

			}

			else if($social_data['name'] == 'twitter')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="twitter" alt="twitter" src="<?= $frontpath?>/images/twitter.png" height="22" width="22"></a>

				<?php

			}

			else if($social_data['name'] == 'facebook')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="facebook" alt="facebook" src="<?= $frontpath?>/images/fb.png" height="22" width="22"></a>

				<?php

			}

			else if($social_data['name'] == 'google')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="google" alt="google" src="<?= $frontpath?>/images/googleplus.png" width="21" height="22"></a>

				<?php

			}

			else if($social_data['name'] == 'flicker')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="facebook" alt="facebook" src="<?= $frontpath?>/images/flicker.png"></a>

				<?php

			}

			else if($social_data['name'] == 'blogger')

			{

				?>

				<a href="<?=$social_data['url']?>"><img title="facebook" alt="facebook" src="<?= $frontpath?>/images/blogger.png"></a>

				<?php

			}

		}

	}

	?>

	</div>