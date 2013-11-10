<?
if($_REQUEST['option']=="status" and !empty($_REQUEST['keyword'])) 
	$ssql.=" AND ".$_REQUEST[option]." like '".$_REQUEST[keyword]."%'";
elseif(isset($_REQUEST['keyword']))	
	$ssql.=" AND ".$_REQUEST[option]." like '".$_REQUEST[keyword]."%'";
		
if($_REQUEST['option']=="fname" and isset($_REQUEST['keyword'])) 
{
	$key=explode(" ",trim($_REQUEST['keyword']),2);
	if ($key[1]=="")
	{
		$key[1]=$key[0];
	}
	$ssql.=" AND ".$_REQUEST['option']." like '".$key[0]."%' or lname like '".$key[0]."%'";
}
$var_msg = $_REQUEST['var_msg'];	
$sql="select count(*) as tot from customer where 1=1 ".$ssql;
$db_res=$obj->select($sql);	
$num_totrec = $db_res[0]["tot"];

include("middle/paging.inc.php");

if(isset($sort))
{  	
		switch ($sort)
		{	
			case "1":
				($stat==1)? $sort = "fname" : $sort = "fname DESC";
				break;
			case "2":
				($stat==1)? $sort = "email" : $sort = "email DESC";
				break;
			case "4":
				($stat==1)? $sort = "status" : $sort = "status DESC";
				break;
		}
}
else 
{
	$sort ="fname";
}

$db_query = "select * from customer where 1=1  ".$ssql. " order by " .$sort. $var_limit;
$db_res = $obj->select($db_query);
$keyword = $_REQUEST['keyword'];
if(!count($db_res)>0 && isset($keyword)){
	$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>0</font> matches:";
}else if(isset($keyword)){
	$var_msg = "Search Successfully";
	$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>$num_totrec</font> matches:";
}
if(!isset($start))	$start = 1;
$num_limit = ($start-1)*$rec_limit;
$startrec = $num_limit;
$lastrec = $startrec + $rec_limit;
$startrec = $startrec + 1;
if($lastrec > $num_totrec)	$lastrec = $num_totrec;
//	$recmsg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
if($num_totrec > 0 ){
	$recmsg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
}else{
	$recmsg="No Records Found.";
}
//$TOP_HEADER='Admin';
?>
