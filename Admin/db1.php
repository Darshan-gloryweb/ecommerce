<?php

include_once __DIR__."/../db.php";
global $pgtitle;
global $aid;
global $msg;
global $id;
//session_start();

if(!isset($_SESSION['what_adminid']) && strpos($_SERVER['REQUEST_URI'],"login") === false)
{
  header("location:login.php");
  exit();
}

?>