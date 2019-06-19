<?php require_once('db.php'); 
 include('include/start_session.php');
?>
<?php
if($_GET['url'])
{
$url=mysqli_real_escape_string($dbLink,$_GET['url']);
$url=$_GET['url'].'.html';
$sql=mysqli_query($dbLink,"select id,title,content from pagemgnt where slug='$url'");
$row=$sql->fetch_assoc();
$id=$row['id'];
$content=$row['content'];
$title1=$row['title'];
}
else
{
echo '404 Not URL Available.';
}


?>
<?php require_once('include/function.php'); ?>
<?php $title = $title1.' | '.$mywebsitename; ?>
<?php require_once('header.php'); ?>
   <div class="page_detail_p">
      <h3><?=$title1?></h3>
    
    
      <p>
        <?=$content?>
      </p>
    </div>
  </div>
  <?php require_once('footer.php'); ?>