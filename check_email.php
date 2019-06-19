<?php 
require_once('db.php');
header("Content-type: text/javascript");
$_POST['new_email'];


$query = "SELECT * FROM customer WHERE Email ='".$_POST['new_email']."'";
$data = mysqli_query($dbLink,$query) or die ('Could Not Select Email');
if (mysqli_num_rows($data) == 0) {echo $status = "no";}
else {echo $status = "yes";}

?>