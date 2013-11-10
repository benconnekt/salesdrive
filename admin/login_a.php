<?
include_once("include.php");

$login_name = $_POST["login_name"];
$passwd = $_POST["passwd"];

$sql = "select iAdminId, vUserName,tLastLogin,eStatus from admin where vUserName = '".$login_name."' and vPassword = '".$passwd."'";
$result = $obj->sql_query($sql);

if($result && $result[0]["eStatus"]=='Active')
{
	$_SESSION["sess_iAdminId"] = $result[0]["iAdminId"];
	$_SESSION["sess_vUserName"] = $result[0]["vUserName"];
	$_SESSION[sess_tLastLogin] = $result[0]["tLastLogin"];
	$_SESSION["sess_eType"] = 'Admin';
	
	#================================================================================#
	#for change in seesion#
	$_SESSION["sess_login_iAdminId"] = $result[0]["iAdminId"];
	$_SESSION["sess_login_eType"] = "Admin";
	#end of assignment#
	#================================================================================#
	
	#=================================================================================
	# FOR Last Login Details.....
	#=================================================================================
	$tLastLogin =time();
	$vFromIP=$_SERVER["REMOTE_ADDR"];
	$sql = "update admin set tLastLogin ='$tLastLogin ', vFromIP='$vFromIP' where iAdminId='".$_SESSION[sess_iAdminId]."'";
	$db_sql = $obj->sql_query($sql);
	
	#=================================================================================
	header("location:index.php");
	//exit;
}
elseif(count($result) == 1 && $temp_var=="Yes")
{
	$errorMessage = 'You are already logged in from another window/Location<BR>Please try Later after some time';
	header('Location: login.php?err_msg='.$errorMessage);
	exit;
}
else
{
	$err_msg = "Your login failed. This happens due to - Incorrect Username/Password.";
	header("location:login.php?err_msg=$err_msg");
	exit;
}
?>
