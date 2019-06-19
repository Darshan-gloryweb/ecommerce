<div class="content_right">
  <?php require_once('homebanner.php');?>
  <h3>Designs That Will Mesmerize you !</h3>
  <?php
	  		$isql="select * from pagemgnt where title = 'Home'";
			$ires=mysqli_query($dbLink,$isql) or die('could not select');
			if(mysqli_num_rows($ires) > 0)
			{
				while($idata = $ires->fetch_assoc())
				{?>
  <p>
    <?=$idata['content']?>
    <a href="<?=$frontpath?>/page/about-us.html" title="Read More">Read More</a> </p>
  <?php
				}}?>
  <h3>New Arrivals</h3>
  <?php
	$pres = mysqli_query($dbLink,"select * from product where status = 1 order by CreatedOn DESC limit 8");
  ?>
  <span style="display:none;" class="allData"><?php echo $numrows;?></span>
  <?php
  if(mysqli_num_rows($pres)>0)
  {
	  $i = 0;
	  $k=1;
	  	while($pdata = $pres->fetch_assoc())
		{
        	$i++;
			?>
  <div class="new <?php if($i%4 == 0){echo "last1"; }?> loadData" id="myData_<?php echo $k;?>" >
    <p><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>">
      <?=substr(html_entity_decode(stripslashes($pdata['ProductName'])),0,20)?>
      </a></p>
    <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php"><?php 
			if($pdata['ImageName']!="")
			{ ?>
            <img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>" height="103" width="181" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" />		<?php } else { ?> <img src="<?=$frontpath?>/images/noimg.jpg" height="103" width="180" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" /> <?php } ?></a>
    <div class="new_detail">
      <p>
       <?php
			$d = substr(strip_tags(html_entity_decode(stripslashes($pdata['Description']))),0,120);
			echo $d ;?>
      </p>
       </div>
    <div class="add"> <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="Price From : £ <?=$pdata['Price']?>">Price From : £ <?=$pdata['Price']?></a> </div>
  </div>
  <?php
  		$k++;
		}
  }
	
  ?>
  <div class="secondColumn" id="loaderImg" style="displa:block;text-align:center;background-color:#FE7021;height:50px;width:98%;display:none;"><span style="font-size:16px;margin-top:16px; display:inline-block;">Please Wait Loding</span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/ajax-loader.gif" style="margin-bottom:8px;vertical-align:middle;" /></div>
  <h3>Featured Products</h3>
  <?php
  	$psql = "select * from product where status = 1 and isfeatured = 1 order by rand() limit 8";
	$pres=mysqli_query($dbLink,$psql) or die('could not select');
	
  ?>
  <?php
  if(mysqli_num_rows($pres)>0)
  {
	  $i = 0;
	  	while($pdata = $pres->fetch_assoc())
		{
        	$i++;
			?>
  <div class="new <?php if($i%4 == 0){echo "last1"; }?>" >
    <p><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>">
      <?=substr(html_entity_decode(stripslashes($pdata['ProductName'])),0,20)?>
      </a></p>
    <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php"><?php 
			if($pdata['ImageName']!="")
			{ ?>
            <img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>" height="103" width="181" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" />		<?php } else { ?> <img src="<?=$frontpath?>/images/noimg.jpg" height="103" width="180" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" /> <?php } ?></a>
  
    <div class="new_detail">
      <p>
        <?php
			$d = substr(strip_tags(html_entity_decode(stripslashes($pdata['Description']))),0,120);
			echo $d ;?>
      </p>
      </div>
    <div class="add"> <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="Price From : £ <?=$pdata['Price']?>">Price From : £ <?=$pdata['Price']?></a> </div>
  </div>
  <?php
		}
  }
  ?>
  <?php require_once('weeklyspecial.php');?>
<?php require_once('feedbacklist.php');?>
</div>
</div>
