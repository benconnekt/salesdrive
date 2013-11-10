<?
include_once("noentry.php");
$mode = $_POST['mode'];
$reportid = $_POST['reportid'];
$id = $_POST['id'];

if($mode == 'Add')
{
$sql = "INSERT INTO report(customerid,source,company,contact,tel,actionRequired,content,date,status)
		VALUES('".$_POST['id']."','".$_POST['source']."','".$_POST['company']."',
                    '".$_POST['contact']."','".$_POST['tel']."','".$_POST['actionRequired']."',
                    '".$_POST['content']."',
                    '".$_POST['date']."','".$_POST['status']."' )";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=reportlist&id='.$id.'&var_msg='.$msg);	
		exit;
	}
}

if($mode == 'Update')
{
	$sql = "UPDATE report set
                        source = '".$_POST['source']."',
                        company = '".$_POST['company']."',
                        contact = '".$_POST['contact']."',
                        tel = '".$_POST['tel']."',
                        actionRequired = '".$_POST['actionRequired']."',
                        content = '".$_POST['content']."',
                        date = '".$_POST['date']."',
                        status = '".$_POST['status']."'
			WHERE reportid = '".$_POST['reportid']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=reportlist&id='.$id.'&var_msg='.$msg);	
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
			$sql = "DELETE from report WHERE reportid = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=reportlist&id='.$id.'&var_msg='.$msg);
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
			$sql = "UPDATE report set status = 'Active' WHERE reportid = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Active Successfully ';
		header('location: index.php?file=reportlist&id='.$id.'&var_msg='.$msg);	
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
			$sql = "UPDATE report set status = 'Inactive' WHERE reportid = '".$_POST['ch'.$i]."' ";
			$del = $obj->edit($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records InActive Successfully ';
		header('location: index.php?file=reportlist&id='.$id.'&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=reportlist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>