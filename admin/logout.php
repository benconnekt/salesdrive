<?
include_once("noentry.php");
session_destroy();
$err_msg = "You have successfully Logged Out";
header("location:login.php?err_msg=$err_msg");
exit;
?>