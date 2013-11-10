<?
include_once("noentry.php");

$mode = $_POST['mode'];
$clientid = $_POST['clientid'];

if($mode == 'Add')
{
if($_FILES['logo']['name'] != '')
	{
		$r=rand(1,1000);
		$clientimg = "Client_".$r.".".getExtension($_FILES['logo']['name']);
		move_uploaded_file($_FILES['logo']['tmp_name'],'client/'.$clientimg);
	}
$sql = "INSERT INTO clients(name,logo,url)
		VALUES('".addslashes($_POST['name'])."','".$clientimg."','".$_POST['url']."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=clientlist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{	
	$sql="select * from clients where clientid ='".$clientid."'";
 	$db_sql=$obj->select($sql);
	$logo=$db_sql[0]["logo"];
	if($_FILES['logo']['name'] != '')
		{
			@unlink("client/".$logo);
			$r=rand(1,1000);
			$clientimg = "Client".$r.".".getExtension($_FILES['logo']['name']);
			move_uploaded_file($_FILES['logo']['tmp_name'],'client/'.$clientimg);
		}
	else
		{
		$clientimg = $logo;
		}
	$sql = "UPDATE clients set
			name = '".addslashes($_POST['name'])."',
                        url  = '".addslashes($_POST['url'])."',
			logo = '".$clientimg."'
			WHERE clientid = '".$_POST['clientid']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=clientlist&var_msg='.$msg);	
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
			$sql="select * from clients where clientid='".$_POST['ch'.$i]."'";
 	    	$db_sql=$obj->select($sql);
			$vWebImage=$db_sql[0]["vWebImage"];
			@unlink("banner/".$vWebImage);

			$sql = "DELETE from clients WHERE clientid = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=clientlist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=clientlist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}
?>