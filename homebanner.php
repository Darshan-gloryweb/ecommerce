<div class="banner">

  <div class="banner_bl">

    <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">

      <div class="slides" data-group="slides">

        <ul>

          <?php

			$slider_sql = "SELECT * FROM homebanner where BannerName = 'Banner' and status = 1 order by DisplayOrder";

			$slider_res = mysqli_query($dbLink,$slider_sql);

			if(mysqli_num_rows($slider_res) > 0)

			{

				while($slider_data = $slider_res->fetch_assoc())

				{

				?>

          <li>

            <div class="slide-body" data-group="slide"> <img src="<?=$frontpath?>/HomeBanner/<?=$slider_data['ImagePath']?>?<?=time()?>" title="<?=$slider_data['BannerText']?>" alt="<?=$slider_data['BannerText']?>" class="bannerimg" width="764" height="298" />

              <div class="banner_content">

                <h3><?=$slider_data['BannerText']?></h3>

				<?=$slider_data['BannerDescription']?>

                

                <a href="<?=$slider_data['BannerUrl']?>" title="Shop Now"><img src="<?=$frontpath?>/images/shopnow.jpg" alt="Shop Now" title="Shop Now" width="141" height="25" /></a> </div>

            </div>

          </li>

          <?php

			}

			}

			?>

        </ul>

      </div>

      <a class="slider-control left" href="#" data-jump="prev"><</a> <a class="slider-control right"

                href="#" data-jump="next">></a>

      <div class="pages"> <a class="page" href="#" data-jump-to="1">1</a> <a class="page" href="#" data-jump-to="2"> 2</a> <a class="page" href="#" data-jump-to="3">3</a> </div>

    </div>

  </div>

</div>

