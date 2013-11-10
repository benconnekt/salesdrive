<?
include_once("noentry.php");

$mode = $_POST['mode'];
$faqid = $_POST['faqid'];

if($mode == 'Add')
{
$sql = "INSERT INTO faq(question,answer)
		VALUES('".htmlentities ($_POST['question'])."','".htmlentities ($_POST['answer'])."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=faqlist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{
	$sql = "UPDATE faq set
			question = '".htmlentities($_POST['question'])."',
			answer = '".htmlentities ($_POST['answer'])."'
			WHERE faqid = '".$_POST['faqid']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=faqlist&var_msg='.$msg);	
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
			$sql = "DELETE from faq WHERE faqid = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=faqlist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=faqlist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>