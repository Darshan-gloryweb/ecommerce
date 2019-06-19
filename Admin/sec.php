<?php 
function user_right($page)
{
	global $dbLink;
	$admin_menu="select access from adminuser where AdminUserID=".$_SESSION['what_adminid'];
	$admin_menu_res=mysqli_query($dbLink,$admin_menu) or die ('Could Not Select');
	if(mysqli_num_rows($admin_menu_res)>0)
	{
		  $d=$admin_menu_res->fetch_assoc();
		  $pstr=$d['access'];
		  $access=explode(',',$pstr);
	}
	
	if(in_array($page,$access))
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>