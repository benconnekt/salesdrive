<?
include_once("noentry.php");

$mode = $_POST['mode'];
$iNewsId = $_POST['iNewsId'];

if($mode == 'Add')
{
$sql = "INSERT INTO news(vNewTitle,tNewDesc,vNewDate)
		VALUES('".addslashes($_POST['vNewTitle'])."','".addslashes($_POST['tNewDesc'])."','".$_POST['vNewDate']."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=newslist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{
	$sql = "UPDATE news set
			vNewTitle = '".addslashes($_POST['vNewTitle'])."',
			tNewDesc = '".addslashes($_POST['tNewDesc'])."',
			vNewDate = '".$_POST['vNewDate']."'
			WHERE iNewsId = '".$_POST['iNewsId']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=newslist&var_msg='.$msg);	
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
			$sql = "DELETE from news WHERE iNewsId = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=newslist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=webpageslist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>