<? include_once("include.php");
if(!session_is_registered("sess_iAdminId") || $_SESSION["sess_iAdminId"] == ""){
	header("Location:login.php");
	exit();
}
/*
if($_POST[action]=="add request")
{
	echo $sendto;
	$dDate = date("Y-m-d H:i:s");
	$sql = "insert into admin_request(tRequest, vScriptName, dDate) values('".$_POST[tRequest]."','".$_POST[vScriptName]."','".$dDate."')";
	$obj->insert($sql);
	header("location:http://".$sendto);
	exit;
}*/
?>