<?
include_once("noentry.php");

$mode = $_POST['mode'];
$iWebPageId = $_POST['iWebPageId'];

if($mode == 'Add')
{
if($_FILES['vWebImage']['name'] != '')
	{
		$r=rand(1,1000);
		$Voucherimg = "Banner_".$r.".".getExtension($_FILES['vWebImage']['name']);
		move_uploaded_file($_FILES['vWebImage']['tmp_name'],'banner/'.$Voucherimg);
	}
$sql = "INSERT INTO webpages(vWebPageName,tWebPageDesc,iCateoryId,isubCateoryId,vWebImage)
		VALUES('".addslashes($_POST['vWebPageName'])."','".addslashes($_POST['tWebPageDesc'])."','".$_POST['iCateoryId']."','".$_POST['isubCateoryId']."','".$Voucherimg."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=webpageslist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{	
	$sql="select * from webpages where iWebPageId='".$iWebPageId."'";
 	$db_sql=$obj->select($sql);
	$vWebImage=$db_sql[0]["vWebImage"];
	if($_FILES['vWebImage']['name'] != '')
		{
			@unlink("banner/".$vWebImage);
			$r=rand(1,1000);
			$Voucherimgch = "Banner_".$r.".".getExtension($_FILES['vWebImage']['name']);
			move_uploaded_file($_FILES['vWebImage']['tmp_name'],'banner/'.$Voucherimgch);
		}
	else
		{
		$Voucherimgch = $vWebImage;
		}
	$sql = "UPDATE webpages set
			vWebPageName = '".addslashes($_POST['vWebPageName'])."',
			tWebPageDesc = '".addslashes($_POST['tWebPageDesc'])."',
			vWebImage = '".$Voucherimgch."',
			iCateoryId = '".$_POST['iCateoryId']."',
                        isubCateoryId = '".$_POST['isubCateoryId']."'
			WHERE iWebPageId = '".$_POST['iWebPageId']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=webpageslist&var_msg='.$msg);	
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
			$sql="select * from webpages where iWebPageId='".$_POST['ch'.$i]."'";
 	    	$db_sql=$obj->select($sql);
			$vWebImage=$db_sql[0]["vWebImage"];
			@unlink("banner/".$vWebImage);

			$sql = "DELETE from webpages WHERE iWebPageId = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=webpageslist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=webpageslist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
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