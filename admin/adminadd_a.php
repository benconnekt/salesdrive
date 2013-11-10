<?
include_once("noentry.php");

$mode = $_POST['mode'];
$iAdminId = $_POST['iAdminId'];

if($mode == 'Add')
{
$sql = "INSERT INTO admin(vFirstName,vLastName,vEmail,vUserName,vPassword,eStatus)
		VALUES('".$_POST['vFirstName']."','".$_POST['vLastName']."','".$_POST['vEmail']."',
		'".$_POST['vUserName']."','".$_POST['vPassword']."','".$_POST['eStatus']."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=adminlist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{
	$sql = "UPDATE admin set
			vFirstName = '".$_POST['vFirstName']."',
			vLastName = '".$_POST['vLastName']."',
			vEmail = '".$_POST['vEmail']."',
			vUserName = '".$_POST['vUserName']."',
			vPassword = '".$_POST['vPassword']."'
			WHERE iAdminId = '".$_POST['iAdminId']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=adminlist&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Delete')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "DELETE from admin WHERE iAdminId = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=adminlist&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Active')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "UPDATE admin set eStatus = 'Active' WHERE iAdminId = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Active Successfully ';
		header('location: index.php?file=adminlist&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Inactive')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "UPDATE admin set eStatus = 'Inactive' WHERE iAdminId = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records InActive Successfully ';
		header('location: index.php?file=adminlist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=adminlist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>