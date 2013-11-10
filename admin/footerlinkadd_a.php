<?
include_once("noentry.php");

$mode = $_POST['mode'];
$fLid = $_POST['fLid'];

//clean seo urls

function string_limit_words($string, $word_limit) 
{
$words = explode(' ', $string);
return implode(' ', array_slice($words, 0, $word_limit));
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
        $title=mysql_real_escape_string($_POST['fLName']);
        //$body=mysql_real_escape_string($_POST['body']);
        $title=htmlentities($title);
        //$body=htmlentities($body);
        //$date=date("Y/m/d");
        //
        //Title to friendly URL conversion
        $newtitle=string_limit_words($title, 6); // First 6 words
        $urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);
        $newurltitle=str_replace(" ","-",$newtitle);
        $url = strtolower($newurltitle);
        $url= $url.'.php'; // Final URL
}

if($mode == 'Add')
{
$sql = "INSERT INTO footerlink(fLName,fLDesc,fLMetaTitle,fLMetaDesc,fLKey,fLurl)
		VALUES('".trim($_POST['fLName'])."','".addcslashes($_POST['fLDesc'])."',
                    '".trim($_POST['fLMetaTitle'])."','".trim($_POST['fLMetaDesc'])."','".trim($_POST['fLKey'])."', '".$url."')";

$ins = $obj->insert($sql);

	if($ins)
	{
		$msg = 'Records Added Successfully ';
		header('location: index.php?file=footerlinklist&var_msg='.$msg);	
		exit;
	}

}

if($mode == 'Update')
{	
	$sql="select * from footerlink where fLid='".$fLid."'";
 	$db_sql=$obj->select($sql);
	$sql = "UPDATE footerlink set
			fLName = '".addslashes($_POST['fLName'])."',
			fLDesc = '".addslashes($_POST['fLDesc'])."',
			fLMetaTitle = '".addslashes($_POST['fLMetaTitle'])."',
			fLMetaDesc = '".addslashes($_POST['fLMetaDesc'])."',
			fLKey = '".addslashes($_POST['fLKey'])."',
                        fLurl  = '".$url."'
			WHERE fLid = '".$_POST['fLid']."' ";
	$updt = $obj->edit($sql);

	if($updt)
	{
		$msg = 'Records Updated Successfully ';
		header('location: index.php?file=footerlinklist&var_msg='.$msg);	
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
			//$sql="select * from footerlink where fLid='".$_POST['ch'.$i]."'";
 	    	//$db_sql=$obj->select($sql);
			//$vWebImage=$db_sql[0]["vWebImage"];
			//@unlink("banner/".$vWebImage);

			$sql = "DELETE from footerlink WHERE fLid = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=footerlinklist&var_msg='.$msg);	
		exit;
	}
}

if($_POST['action'] == 'Search')
{
	header('location:index.php?file=footerlinklist&option='.$_POST['option'].'&keyword='.$_POST['keyword']);
	exit;
}
?>