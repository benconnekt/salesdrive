<?
include_once("noentry.php");

$mode = $_POST['mode'];
$uId = $_POST['uId'];

if($mode == 'Add')
{
if($_FILES['uimage']['name'] != '')
	{
		$r=rand(1,1000);
		$clientimg = "UL_".$r.".".getExtension($_FILES['uimage']['name']);
		move_uploaded_file($_FILES['uimage']['tmp_name'],'ulinks/'.$clientimg);
	}
$sql = "INSERT INTO ulinks(utitle,url,udesc,urange,ucategory,uimage)
		VALUES('".$_POST['utitle']."','".addslashes($_POST['url'])."','".$_POST['udesc']."','".$_POST['urange']."',
                   '".$_POST['ucategory']."', '".$clientimg."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=ulinklist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{	
	$sql="select * from ulinks where uId ='".$uId."'";
 	$db_sql=$obj->select($sql);
	$uimage=$db_sql[0]["uimage"];
	if($_FILES['uimage']['name'] != '')
		{
			@unlink("ulinks/".$logo);
			$r=rand(1,1000);
			$clientimg = "UL_".$r.".".getExtension($_FILES['logo']['name']);
			move_uploaded_file($_FILES['uimage']['tmp_name'],'ulinks/'.$clientimg);
		}
	else
		{
		$clientimg = $uimage;
		}
	$sql = "UPDATE ulinks set
			utitle = '".addslashes($_POST['utitle'])."',
                        url  = '".addslashes($_POST['url'])."',
                        udesc = '".addslashes($_POST['udesc'])."',
                        urange = '".addslashes($_POST['urange'])."',
                        ucategory = '".addslashes($_POST['ucategory'])."',
			uimage = '".$clientimg."'
			WHERE uId = '".$_POST['uId']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=ulinklist&var_msg='.$msg);	
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
			$sql="select * from ulinks where uId='".$_POST['ch'.$i]."'";
 	    	$db_sql=$obj->select($sql);
			$uimage=$db_sql[0]["uimage"];
			@unlink("banner/".$uimage);

			$sql = "DELETE from ulinks WHERE uId = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=ulinklist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=ulinklist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
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