<?php 
	include "db.php";
 	$Mloc="../images/";
	function uploadImage1($file,$uploadPath)

	{

		$uploaddir = "../images"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!

		$path = $uploaddir;



		if(!file_exists($path))

			mkdir ($path, 0777);

		if(is_uploaded_file($file))

		{

			move_uploaded_file($file,$path.'/'.$uploadPath);

			$photo = $uploadPath;

		}

		return $photo;

	}
	$top_main_banner = $_FILES['top_main_banner']['name'];
	
	
?>