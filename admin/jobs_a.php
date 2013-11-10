<?
include_once("noentry.php");
$mode = $_POST['mode'];
$iJobId = $_POST['iJobId'];
if($mode == 'Add')
{
$sql = "INSERT INTO jobs(vJobTitle,tJobdesc)
		VALUES('".addslashes($_POST['vJobTitle'])."','".addslashes($_POST['tJobdesc'])."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=jobslist&var_msg='.$msg);	
		exit;
	}
}
if($mode == 'Update')
{
	$sql = "UPDATE jobs set
			vJobTitle = '".addslashes($_POST['vJobTitle'])."',
			tJobdesc = '".addslashes($_POST['tJobdesc'])."'
			WHERE iJobId = '".$_POST['iJobId']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=jobslist&var_msg='.$msg);	
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
			$sql = "DELETE from jobs WHERE iJobId = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=jobslist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=webpageslist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>