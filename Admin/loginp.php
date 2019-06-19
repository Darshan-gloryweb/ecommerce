<?php 	include "db1.php";
global $_SESSION;
global $dbLink;
if($_REQUEST['username']!='' && $_REQUEST['pass']!='' )
{
		$user=$_REQUEST['username'];
		$Admpwd=md5($_REQUEST['pass']);
	    $sqlstr="select * from adminuser where UserName='$user' and Password='$Admpwd'";
    	$rs=mysqli_query($dbLink,$sqlstr) or die("query failed");
		if(mysqli_num_rows($rs)>0){
    		while($check=$rs->fetch_assoc())
        	{
            	if($user==$check['UserName'])
    			{
    				$aid = $check['AdminUserID'];
            	}
        	}
        	if($aid != "")
        	{
                /*session_start();*/
    			$_SESSION['what_adminid'] = $aid;
    			$_SESSION['what_admin'] = $user;
    			echo "true";
        	}
        	else
        	{
        		echo "false";
        	}
		}
		
		else
        {
        	echo "false";
        }
}
?>