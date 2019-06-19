<?php require_once('db.php'); ?>
<?php
if($_GET['url'])
{
$url=mysql_real_escape_string($dbLink,$_GET['url']);
$url=$_GET['url'];
$url=str_replace('_',' ',$url);
$sql=mysqli_query($dbLink,"select category.*,categorytype.name from category inner join categorytype on category.CategoryName='$url' and category.CategoryTypeID = categorytype.id");
$row=$sql->fetch_assoc();
$id=$row['CategoryID'];
$ctypeid=$row['CategoryTypeID'];
$content=$row['Description'];
$title1=$row['CategoryName'];
$ctypename = $row['name'];
}
else
{
echo '404 Not URL Available.';
}
?>
<?php require_once('include/function.php'); ?>
<?php require_once('include/start_session.php'); ?>
<?php
$pagination = "select ProductID from product where CategoryID = ".$id." and Status=1";
//echo $pagination;
$pagination_res = mysqli_query($dbLink,$pagination) or die ('Could Not Select Per Pages');				
$numrows = mysqli_num_rows($pagination_res);
?>
<?php require_once('productdetails.php'); ?>
<?php $title = $title1 .' | '. $mywebsitename; ?>
<?php require_once('header-inner.php'); ?>
    <?php require_once('categoryleftside.php');?>
    <div class="content_right">
        <div class="sitemap"> <a href="<?=$frontpath?>/index.php" title="Home">Home</a><span>>></span> <a href="<?=$frontpath?>/allcategories.php" title="All Categories">All Categories</a><span>>></span>
        <a href="<?=$frontpath?>/categorygroup/<?=str_replace(' ','_',$ctypename)?>" title="<?=$ctypename?>"><?=$ctypename?></a><span>>></span>
        <p>
            <?=$title1?>
          </p>
      </div>
        <div style="margin-top:10px;float:left">
        <?php
if($title1 == "Favour Boxes")
{
$slider_sql = "SELECT * FROM homebanner where BannerName ='Favour Boxes' order by DisplayOrder";

			$slider_res = mysqli_query($dbLink,$slider_sql);
if(mysqli_num_rows($slider_res) > 0)

			{

				$slider_data = $slider_res->fetch_assoc()
?>
				 <img src="<?=$frontpath?>/HomeBanner/<?=$slider_data['ImagePath']?>?<?=time()?>" title="<?=$slider_data['BannerText']?>" alt="<?=$slider_data['BannerText']?>" class="bannerimg" width="764" height="150" />
<?php

}}
else if($title1 == "Marriage Items")
{
$slider_sql = "SELECT * FROM homebanner where BannerName ='Marriage Items' order by DisplayOrder";

			$slider_res = mysqli_query($dbLink,$slider_sql);
if(mysqli_num_rows($slider_res) > 0)

			{

				$slider_data = $slider_res->fetch_assoc()
?>
				 <img src="<?=$frontpath?>/HomeBanner/<?=$slider_data['ImagePath']?>?<?=time()?>" title="<?=$slider_data['BannerText']?>" alt="<?=$slider_data['BannerText']?>" class="bannerimg" width="764" height="150" />
<?php

}}
else if($title1 == "Mithai Boxes")
{
$slider_sql = "SELECT * FROM homebanner where BannerName ='Mithai Boxes' order by DisplayOrder";

			$slider_res = mysqli_query($dbLink,$slider_sql);
if(mysqli_num_rows($slider_res) > 0)

			{

				$slider_data = $slider_res->fetch_assoc()
?>
				 <img src="<?=$frontpath?>/HomeBanner/<?=$slider_data['ImagePath']?>?<?=time()?>" title="<?=$slider_data['BannerText']?>" alt="<?=$slider_data['BannerText']?>" class="bannerimg" width="764" height="150" />
<?php

}}
?>

      </div>
        <h3 class="p_h3">
        <?=$title1?>
        (&nbsp;
        <?=$numrows?>
        Products&nbsp;)</h3>
        <div class="paggination">
        <div class="pleft">
            <p>Sort by :</p>
            <!--<select id="sorttype" name="sorttype" onchange="get_products('<?=$_SESSION['item_per_page']?>',this.value)">
                        <option <?php if("ProductName"==$_SESSION['item_per_page1']) { echo "selected='selected'"; } ?> value="ProductName"> Sort By Name</option>
                        <option <?php if("Price"==$_SESSION['item_per_page1']) { echo "selected='selected'"; } ?> value="Price"> Sort By Price</option>
                        </select>-->
            <div style="width:62px; float:left;">
            <?php if($_SESSION['sorttype'] == "ASC" && $_SESSION['item_per_page1']=="ProductName") { 
						?>
            <img src="<?=$frontpath?>/images/up.png" alt="ASC" width="15" height="20"  />
            <?php }	else if($_SESSION['sorttype'] == "DESC" && $_SESSION['item_per_page1']=="ProductName"){ 
						?>
            <img src="<?=$frontpath?>/images/down.png" alt="DESC" width="15" height="20"  />
            <?php }?>
            <label style="cursor:pointer" class="sortlbl" id="sorttypename" onclick="get_products('<?=$_SESSION['item_per_page']?>','ProductName','<?php if($_SESSION['sorttype'] == "ASC") { echo "DESC"; } else { "ASC"; }?>')">Name</label>
          </div>
            <div style="width:62px; float:left;">
            <?php if($_SESSION['sorttype'] == "ASC" && $_SESSION['item_per_page1']=="Price") { 
						?>
            <img src="<?=$frontpath?>/images/up.png" alt="ASC" width="15" height="20"  />
            <?php }	else if ($_SESSION['sorttype'] == "DESC" && $_SESSION['item_per_page1']=="Price") { 
						?>
            <img src="<?=$frontpath?>/images/down.png" alt="DESC" width="15" height="20"  />
            <?php }?>
            <label style="cursor:pointer" class="sortlbl" id="sorttypeprice" onclick="get_products('<?=$_SESSION['item_per_page']?>','Price','<?php if($_SESSION['sorttype'] == "ASC") { echo "DESC"; } else { "ASC"; }?>')">Price</label>
          </div>
          </div>
        <div id="products" style="float:left;width:100%">
            <?php
				$limit = 8;
				$offset = 0;
                $psql = "select * from product where CategoryID = ".$id." and Status = 1 order by ".$_SESSION['item_per_page1']." ".$_SESSION['sorttype']." limit ".$offset.", ".$limit;
				$pres=mysqli_query($dbLink,$psql) or die('could not selectsss');
	
  				?>
            <span style="display:none;" class="allData"><?php echo $numrows;?></span>
            <input type="hidden" name="cid" id="cid" value="<?=$id?>" />
            <?php
  if(mysqli_num_rows($pres)>0)
  {
	  $i = 0;
	   $k=1;
	  	while($pdata = $pres->fetch_assoc())
		{
        	$i++;
			?>
            <div class="new  <?php if($i%4 == 0){echo "last1"; }?> loadData" id="myData_<?php echo $k;?>" >
            <p><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>">
              <?=substr(html_entity_decode(stripslashes($pdata['ProductName'])),0,25)?>
              </a></p>
            <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>">
              <?php 
			if($pdata['ImageName']!="")
			{ ?>
              <img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>" height="103" width="180" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" />
              <?php } else { ?>
              <img src="<?=$frontpath?>/images/noimg.jpg" height="103" width="180" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" />
              <?php } ?>
              </a>
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
  }else{ ?>
            <p style="float:left;font-size:12px;height:100px;color:red">There is No any Product in This Category</p>
            <?php }

  ?>
          </div>
        <div class="secondColumn" id="loaderImg" style="displa:block;text-align:center;background-color:#FE7021;height:50px;width:98%;display:none;"><span style="font-size:16px;margin-top:16px; display:inline-block;">Please Wait Loding</span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?=$frontpath?>/images/ajax-loader.gif" style="margin-bottom:8px;vertical-align:middle;" /></div>
        <?php require_once('weeklyspecial.php');?>
            <?php require_once('feedbacklist.php');?>
      </div>
      </div>
  </div>
    <?php require_once('footer.php');?>