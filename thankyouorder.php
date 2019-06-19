<?php  require_once('db.php'); ?>
<? session_start();
if(isset($_REQUEST['data']))
{
}
else
{
$delete_cart = "delete from shoppingcart where ShoppingCartID=".$_SESSION['ShoppingCartID'];
mysqli_query($dbLink,$delete_cart) or die ('Could Manage After order');
$delete_cart_item = "delete from shoppingcartitems where ShoppingCartID=".$_SESSION['ShoppingCartID'];
mysqli_query($dbLink,$delete_cart_item) or die ('Could Not Cart Items After Order');
}
	?>
<?php include('include/start_session.php'); ?>
<?php  $title = 'Cart | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>
<?php require_once('header.php');?>
      <div class="cart">
     
   <p style="font-size:20px;float:left;margin:10px;border:1px solid rgb(218,218,218);width:95%;padding:10px;color:rgb(235,61,0);border-radius:5px;">  <?=$_REQUEST['msg']?></p>
      </div>
      </div>
    
<?php require_once('footer.php');?>
