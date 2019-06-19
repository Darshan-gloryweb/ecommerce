<?php 
require_once('db.php');
$query = "SELECT * FROM customer WHERE Email = '".$_POST['email']."'";
      $data = mysqli_query($dbLink,$query) or die ('Could Not Select Email');
      if (mysqli_num_rows($data) >0) {
		  echo "true";
	  }
?>