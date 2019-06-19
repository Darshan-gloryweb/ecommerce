<?php 

	include "db.php";

 	

	$id = AssureSec($_GET['editid']);

	$action = AssureSec($_GET['action']);

	
	$menu = mysql_escape_string($_POST['menu']);

	$page= mysql_escape_string($_POST['page']);

	$displayorder= AssureSec($_POST['displayorder']);

	$customlink=mysql_escape_string($_POST['customlink']);

	

	

	$parent= AssureSec($_POST['parent']);

	if($parent=="")

	{

		$parent=0;

	}

	

if($action=='D')

{

	$menu=$_REQUEST['id'];

	$sql = "delete from navigation where id=".$_REQUEST['nid'];

	 mysqli_query($dbLink,$sql) or die('could not Delete..');

	 getnav($_REQUEST['nid']);

	 header("location:menusettings.php?id=$menu&msg=Menu Updated Successfully");

	 exit();

}

else if($action=='E')

{

	$isql="select title,slug from pagemgnt where id=".$page;

	$ires=mysqli_query($dbLink,$isql) or die ('Could Not Select Page');

	$idata=$ires->fetch_assoc();

	

     $sql = "update navigation set title='".$idata['title']."',slug='".$idata['slug']."',parent=$parent,displayorder=$displayorder where id=".$id;

	 mysqli_query($dbLink,$sql) or die('could not update menu');

     header("location:menusettings.php?id=$menu&msg=Record Updated Successfully");

	 exit();

	

}

else if($action=='A')

{


	$isql="select title,slug from pagemgnt where id=".$page;

	$ires=mysqli_query($dbLink,$isql) or die ('Could Not Select Page');

	$idata=$ires->fetch_assoc();

	

     $sql = "insert into navigation (menuid,title,slug,parent,displayorder,customlink) values (".$menu.",'".$idata['title']."','".$idata['slug']."',$parent,$displayorder,$customlink)";

	 mysqli_query($dbLink,$sql) or die('could not insert Menu');

     header("location:menusettings.php?id=$menu&msg=Record Added Successfully");

	 exit();

}

else if($action=='custom')

{

	$title=mysql_escape_string($_POST['linkname']);

	$slug=mysql_escape_string($_POST['linkurl']);

	$displayorder=$_POST['displayorder'];

	$customlink=mysql_escape_string($_POST['customlink']);

	$id=$_POST['nid'];

     

	 if($id!="")

	 {

		 $sql = "update navigation set title='".$title."',slug='".$slug."',parent=$parent,displayorder=$displayorder where id=".$id;

	 mysqli_query($dbLink,$sql) or die('could not update menu');

	 header("location:menusettings.php?id=$menu&msg=Record Updated Successfully");
	
	 exit();
	 }

	 else

	 {

	 $sql = "insert into navigation (menuid,title,slug,parent,displayorder,customlink) values (".$menu.",'".$title."','".$slug."',$parent,$displayorder,$customlink)";

	// echo $sql;

	 mysqli_query($dbLink,$sql) or die('could not insert Menu');

	 header("location:menusettings.php?id=$menu&msg=Record Added Successfully");
	
	 exit();
	 }

     


}



function getnav($p)

{

	$sql="select id from navigation where parent=".$p;

	$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');

	if(mysqli_num_rows($res)>0)

	{

		while($d=$res->fetch_assoc())

		{

			$s="delete from navigation where id=".$d['id'];

			mysqli_query($dbLink,$s) or die('could Not delete');

			getnav($d['id']);

		}

	}

}

?>