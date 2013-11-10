<?
$id = $_REQUEST[id];
$sql="select * from users where id='".$id."'";
$db_sql = $obj->select($sql);
$cusname = $db_sql[0]["full_name"];

if($_REQUEST['option']=="status" and !empty($_REQUEST['keyword'])) 
	$ssql.=" AND ".$_REQUEST[option]." like '".$_REQUEST[keyword]."%'";
elseif(isset($_REQUEST['keyword']))	
	$ssql.=" AND ".$_REQUEST[option]." like '".$_REQUEST[keyword]."%'";
		
if($_REQUEST['option']=="content" and isset($_REQUEST['keyword'])) 
{
	$key=explode(" ",trim($_REQUEST['keyword']),2);
	if ($key[1]=="")
	{
		$key[1]=$key[0];
	}
	$ssql.=" AND ".$_REQUEST['option']." like '".$key[0]."%' or content like '".$key[0]."%'";
}
$var_msg = $_REQUEST['var_msg'];	
$sql="select count(*) as tot from report where customerid ='".$id."'".$ssql;
$db_res=$obj->select($sql);	
$num_totrec = $db_res[0]["tot"];

include("middle/paging.inc.php");

if(isset($sorton))
{  	
		switch ($sorton)
		{	
			case "1":
				($stat==1)? $sort = "date" : $sort = "date DESC";
				break;
			
		}
}
else 
{
	$sort ="date";
}

$db_query = "select * from report where customerid ='".$id."' ".$ssql. " order by " .$sort. $var_limit;
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
<script language="JavaScript1.2" src="js/jlist.js"></script>

<form name="frmlist" method="post" action="reportadd_a.php">
<input type="hidden" name="mode" value="<? echo $mode;?>">
<input type="hidden" name="action" value="Search">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="27" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="left" valign="middle"><h2><img src="images/icon01.jpg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;<?= strtoupper($cusname) ?> Report</h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="78%" height="55" valign="middle">
	<a href="index.php?file=reportadd&id=<?=$_GET[id]?>" onclick="#return false;" class="buttonback">Add New</a>
       &nbsp; <a href="#" class="buttonback" onClick="return checkDelete();"name="b1">Delete</a>
       &nbsp; <a href="#" class="buttonback" onClick="return checkActive();;"name="b1" >Activate</a>  
	   &nbsp; <a href="#" class="buttonback" onClick="return checkInActive();;"name="b1" >De-Activate</a>   	   
	           </td>
                <td width="22%" height="45" align="right" valign="middle" class="numbertitle"><? echo $recmsg ;?></td>
            </tr>
			<tr><td colspan="2"><span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span></td></tr>
			<?php if(count($db_res)>0){?>

            <tr>
              <td colspan="2">

			  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                
		<tr>
                  <td width="6%" height="25" align="center" valign="middle" class="detailtitle"><input  type="Checkbox" name="abc" value="1"  onclick="checkAll()"></td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Source</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Company</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Contact</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Tel</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Report</td>
                   <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Action Required</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Date</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Action</td>
                  <td width="5%" height="25" align="left" valign="middle" class="detailtitle">Status</td>
                  
               </tr>
				<?	for($i=0;$i<count($db_res);$i++)
				{
					$bgcolor = ($i%2)?"bg01" : "bg02";
         		?>
                 <tr class="<?=$bgcolor?>" onMouseOver="Highlight(this)"  onmouseout="UnHighlight(this,'<?=$bgcolor?>')">
                  <td align="center" valign="middle" class="td-listing"><input  type="checkbox" id='iId' name="ch<?php echo $i?>" value="<?php  echo $db_res[$i]["reportid"];?>" >  </td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["source"]?></td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["company"]?></td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["contact"]?></td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["tel"]?></td>
                  <td align="left" valign="middle" class="td-listing"><a href="index.php?file=reportadd&reportid=<? echo $db_res[$i]["reportid"];?>&mode=Update&id=<?=$id?>" class="listlink"><?=substr($db_res[$i]["content"],0,50)."..."?></a></td>
                  <td align="left" valign="middle" class="td-listing"> <a href="index.php?file=reportadd&reportid=<? echo $db_res[$i]["reportid"];?>&mode=Update&id=<?=$id?>" class="listlink"><?=substr($db_res[$i]["actionRequired"],0,50)."..."?></a></td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["date"]?></td>
                    <td align="left" valign="middle" class="td-listing"> <a href="index.php?file=reportadd&reportid=<? echo $db_res[$i]["reportid"];?>&mode=Update&id=<?=$id?>" class="listlink">View/Edit</a></td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["status"]?></td>		 				
                </tr>
                   <?
					}
					?>
			<? }?>
				
              </table></td>
              </tr>
            <tr>
              <td height="25" colspan="2" align="right" valign="bottom" class="numbertitle"> 
			  <input  type="hidden" name="no" value="<? echo count($db_res); ?>">
                          <input  type="hidden" name="id" value="<? echo $id?>">
	   	<? if(count($db_res)){ echo "Page(s) :".$page_link;}?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td  colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5" align="left" valign="top"><img src="images/bottom_left.jpg" width="5" height="6" /></td>
                <td align="left" valign="top" class="categorybottomback"><img src="images/spacer.gif" width="1" height="1" /></td>
                <td width="6" align="left" valign="top"><img src="images/bottom_right.jpg" width="6" height="6" /></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="27" align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
</form>

<script>
/* function checkConfigType(val)
{
	window.location = 'index.php?file=settinglist&AX=No&Type='+val;
}
function checkValid(frm)
{
	frm.mode.value = 'Update';
}*/ 
</script>
