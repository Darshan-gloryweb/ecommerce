<?	include("db.php");
	
	$opwd = $_POST['oldpass'];
	$cpwd = $_POST['confpass'];
	$user = $_SESSION['what_adminid'];
	$username=$_POST['aname'];
	if($user != "")  // Super Admin
    {
	if($_REQUEST['action'] == "pass")
	{
		$str="select * from adminuser where AdminUserID='$user' and Password='$opwd'";
    	$rs=mysqli_query($dbLink,$str);
    	$rschk=mysqli_num_rows($rs);
        //$row = mysql_fetch_array($rs);

    	if($rschk>0)
    	{
    		//$rsval=mysql_fetch_array($rs);
    		$str="update adminuser set Password='$cpwd' where AdminUserID='$user'";
    		$rsupdate=mysqli_query($dbLink,$str) or die("Change password query failed");
    		header('Location:changepwd.php?msg=Succsessfully Changed');
    		exit();
    	}
    	else
    	{
    		header('Location:changepwd.php?msg=Invalid Old Password');
    		exit();
    	}
	}
	}
 ?>