<?php require_once('db.php'); ?>
<?php
if($_GET['url'])
{
$url=mysql_real_escape_string($dbLink,$_GET['url']);
$url=$_GET['url'];
$url=str_replace('_',' ',$url);
$sql=mysqli_query($dbLink,"select CategoryID,CategoryName,Description from category where CategoryName='$url'");
$row=$sql->fetch_assoc();
$id=$row['CategoryID'];
$content=$row['Description'];
$title1=$row['CategoryName'];
}
else
{
echo '404 Not URL Available.';
}

?>
<?php require_once('include/function.php'); ?>
<?php require_once('include/start_session.php'); ?>
<?php require_once('productdetails.php'); ?>
<?php $title = $title1 .' | '. $mywebsitename; ?>
<?php require_once('header.php'); ?>
    <?php require_once('leftside.php');?>
        <div class="content_right">
            	
                <div class="sitemap">
                <a href="<?=$frontpath?>/index.php" title="Home">Home</a><span>>></span>
                <a href="<?=$frontpath?>/allcategories.php" title="All Categories">All Categories</a><span>>></span>
                <p><?=$title1?></p>
</div>
                <h3 class="p_h3"><?=$title1?></h3>
                 <?php 
			$csql="select * from category where parent = $id and status = 1";
			$cres=mysqli_query($dbLink,$csql) or die("could not select categorys");
			if(mysqli_num_rows($cres) > 0)
			{
				$i =0;
				while($sdata = $cres->fetch_assoc())
				{
	$i++;
?>
                <div class="new1  <?php if($i%4 == 0){echo "last1"; }?>" >
 <a href="<?=$frontpath?>/category/<?=str_replace(' ','_',$sdata['CategoryName'])?>" title="<?=$sdata['CategoryName']?>" >
      <?=substr(html_entity_decode(stripslashes($sdata['CategoryName'])),0,20).'...'?>
      </a>
<?php if($sdata['ImageName'] == ""){?><img src="<?=$frontpath?>/Admin/images/noimg.jpg" alt="<?=$sdata['CategoryName']?>" title="<?=$sdata['CategoryName']?>" width="181" height="103" /><?php } else {?>
                    <img src="<?=$frontpath?>/CategoryIcon/<?=$sdata['ImageName']?>?<?= time()?>" alt="<?=$sdata['CategoryName']?>" title="<?=$sdata['CategoryName']?>" width="181" height="103" /><?php } ?>
                    <div class="viewmore">
	<a href="<?=$frontpath?>/category/<?=str_replace(' ','_',$sdata['CategoryName'])?>" title="Viewmore">View More >></a>
</div>
                   
                </div>
<?php
}}else { ?><p style="float:left;font-size:12px;height:100px;color:red">There is No any Category</p> <?php }
?>	
               
             
              <?php require_once('weeklyspecial.php');?>   
              <?php require_once('feedbacklist.php');?>  
            </div>
    </div>
    <?php require_once('footer.php');?>
