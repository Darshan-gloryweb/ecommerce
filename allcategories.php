<?php require_once('db.php'); ?>
<?php require_once('include/function.php'); ?>
<?php require_once('include/start_session.php'); ?>
<?php require_once('productdetails.php'); ?>
<?php $title = "All Categories" .' | '. $mywebsitename; ?>
<?php require_once('header.php'); ?>
    <?php require_once('leftside.php');?>
        <div class="content_right">
            	
                <div class="sitemap">
                <a href="<?=$frontpath?>/index.php" title="Home">Home</a><span>>></span>
                <p>All Categories</a></p>
                </div>
                <h3 class="p_h3">All Category Type</h3>
                 <?php 
			$csql="select * from categorytype";
			$cres=mysqli_query($dbLink,$csql) or die("could not select categorys");
			if(mysqli_num_rows($cres) > 0)
			{
				while($sdata = $cres->fetch_assoc())
				{?>
                <div class="new1 <?php if($i%4 == 0){echo "last1"; }?>" style="margin-right:7px">
 <a href="<?=$frontpath?>/categorytype/<?=str_replace(' ','_',$sdata['name'])?>" title="<?=$sdata['name']?>" >
      <?=substr(html_entity_decode(stripslashes($sdata['name'])),0,20)?>
      </a>
<?php if($sdata['ImageName'] == ""){?><img src="<?=$frontpath?>/Admin/images/noimg.jpg" alt="<?=$sdata['name']?>" title="<?=$sdata['name']?>" width="181" height="103" /><?php } else {?>
                    <img src="<?=$frontpath?>/CategoryTypeIcon/<?=$sdata['ImageName']?>?<?= time()?>" alt="<?=$sdata['name']?>" title="<?=$sdata['name']?>" width="181" height="103" /><?php } ?>
                    <div class="viewmore">
	<a href="<?=$frontpath?>/categorytype/<?=str_replace(' ','_',$sdata['name'])?>" title="Viewmore">View More >></a>
</div>
                   
                </div>
<?php
}}
?>
          
                <?php require_once('weeklyspecial.php');?> 
                <?php require_once('feedbacklist.php');?> 
            </div>
    </div>
   <?php require_once('footer.php');?>