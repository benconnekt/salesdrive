<?
include_once("noentry.php");

$mode = $_POST['mode'];
$catid = $_POST['catid'];

if($mode == 'Add')
{

$sql = "INSERT INTO linkcategory(catname)
		VALUES('".addslashes($_POST['catname'])."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=linkcategorylist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{
	
	$sql = "UPDATE linkcategory set
			catname = '".addslashes($_POST['catname'])."'
			WHERE catid = '".$_POST['catid']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=linkcategorylist&var_msg='.$msg);	
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
			$sql = "DELETE from linkcategory WHERE catid = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=linkcategorylist&catid='.$catid.'&var_msg='.$msg);
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
			$sql = "UPDATE linkcategory set status = 'Active' WHERE catid = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Active Successfully ';
		header('location: index.php?file=linkcategorylist&catid='.$catid.'&var_msg='.$msg);	
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
			$sql = "UPDATE linkcategory set status = 'Inactive' WHERE catid = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records InActive Successfully ';
		header('location: index.php?file=linkcategorylist&catid='.$catid.'&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=linkcategorylist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>