<?
if($_REQUEST['option']=="eStatus" and !empty($_REQUEST['keyword'])) 
	$ssql.=" AND ".$_REQUEST[option]." like '".$_REQUEST[keyword]."%'";
elseif(isset($_REQUEST['keyword']))	
	$ssql.=" AND ".$_REQUEST[option]." like '".$_REQUEST[keyword]."%'";
		
$var_msg = $_REQUEST['var_msg'];	
$sql="select count(*) as tot from webpages where 1=1 ".$ssql;
$db_res=$obj->select($sql);	
$num_totrec = $db_res[0]["tot"];

include("middle/paging.inc.php");

$db_query = "select * from webpages ". $var_limit;
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
$TOP_HEADER='Web pages';
?>
<script language="JavaScript1.2" src="js/jlist.js"></script>
<form name="frmlist" method="post" action="webpagesadd_a.php">
<input type="hidden" name="mode" value="<? echo $mode;?>">
<input type="hidden" name="action" value="Search">



<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="27" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="middle"><h2><img src="images/package_icon.jpeg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;Pages </h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="78%" height="55" valign="middle">
			  <a href="index.php?file=webpagesadd" onClick="#return false;" class="buttonback">Add New</a>
       &nbsp; <a href="#" class="buttonback" onClick="return checkDelete();"name="b1">Delete</a>
               </td>
                <td width="22%" height="45" align="right" valign="middle" class="numbertitle"><? echo $recmsg ;?></td>
            </tr>
			<tr><td colspan="2"><span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span></td></tr>
			<?php if(count($db_res)>0){?>

            <tr>
              <td colspan="2">

			  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                <tr>
                  <td width="4%" height="25" align="center" valign="middle" class="detailtitle"><input  type="Checkbox" name="abc" value="1"  onclick="checkAll()"></td>
                  
				  <td width="24%" height="25" align="left" valign="middle" class="detailtitle">Title</td>
				  <td width="72%" height="25" align="left" valign="middle" class="detailtitle">Category</td>
                                  <td width="72%" height="25" align="left" valign="middle" class="detailtitle">Sub Category</td>
                                  <td width="72%" height="25" align="left" valign="middle" class="detailtitle">Action</td>
             </tr>
				<?	for($i=0;$i<count($db_res);$i++)
				{
					$bgcolor = ($i%2)?"bg01" : "bg02";
         		?>
                 <tr class="<?=$bgcolor?>" onMouseOver="Highlight(this)"  onmouseout="UnHighlight(this,'<?=$bgcolor?>')">
                  <td align="center" valign="middle" class="td-listing"><input  type="checkbox" id='iId' name="ch<?php echo $i?>" value="<?php    echo $db_res[$i]["iWebPageId"];?>" ></td>
                  <td align="left" valign="middle" class="td-listing"><a href="index.php?file=webpagesadd&iWebPageId=<? echo $db_res[$i]["iWebPageId"];?>&mode=Update&catid=<?=$db_res[$i]["iCateoryId"];?>" class="listlink"><strong><?=$db_res[$i]["vWebPageName"]?></strong></a></td>
				  <td align="left" valign="middle" class="td-listing">
				  <? 
				  if ($db_res[$i]["iCateoryId"] == 1) {
					$cateory="Home";
					} elseif ($db_res[$i]["iCateoryId"] == 2) {
						$cateory="The Company";
					} elseif ($db_res[$i]["iCateoryId"] == 3) {
						$cateory="Services";
					}
					elseif ($db_res[$i]["iCateoryId"] == 5) {
						$cateory="Our Promise";
					}
					elseif ($db_res[$i]["iCateoryId"] == 6) {
						$cateory="Your Investment";
					}
                                        elseif ($db_res[$i]["iCateoryId"] == 7) {
						$cateory="Case History";
					}
                                         elseif ($db_res[$i]["iCateoryId"] == 8) {
						$cateory="Testimonials";
					}
                                        elseif ($db_res[$i]["iCateoryId"] == 9) {
						$cateory="Top Ten Tips";
					}
                                         elseif ($db_res[$i]["iCateoryId"] == 10) {
						$cateory="Let Us Help You";
					}
                                         elseif ($db_res[$i]["iCateoryId"] == 11) {
						$cateory="Client case study";
					}
                                         elseif ($db_res[$i]["iCateoryId"] == 12) {
						$cateory="Privacy Policy";
					}
                                         elseif ($db_res[$i]["iCateoryId"] == 13) {
						$cateory="Disclaimer";
					}
                                        
					else { $cateory="";}
					echo $cateory;
				  ?>
				  </td>
                                    <td align="left" valign="middle" class="td-listing">
				  <? 
				  if ($db_res[$i]["isubCateoryId"] == 10) {
					$subcateory="About";
					} elseif ($db_res[$i]["isubCateoryId"] == 11) {
						$subcateory="Key Members";
					}
                                         elseif ($db_res[$i]["isubCateoryId"] == 12) {
						$subcateory="Business Development";
					}
                                        elseif ($db_res[$i]["isubCateoryId"] == 13) {
						$subcateory="Data Services";
					}
                                        elseif ($db_res[$i]["isubCateoryId"] == 14) {
						$subcateory="Tailor-made Sales Strategies";
					}
                                        elseif ($db_res[$i]["isubCateoryId"] == 15) {
						$subcateory="Appointment Setting";
					}
                                          elseif ($db_res[$i]["isubCateoryId"] == 16) {
						$subcateory="Web Design";
					}
                                          elseif ($db_res[$i]["isubCateoryId"] == 17) {
						$subcateory="Seminars & Events Booking";
					}
					else { $subcateory="None";}
					echo $subcateory;
				  ?>
				  </td>
                                  <td align="left" valign="middle" class="td-listing"><a href="index.php?file=webpagesadd&iWebPageId=<? echo $db_res[$i]["iWebPageId"];?>&mode=Update&catid=<?=$db_res[$i]["iCateoryId"];?>" class="listlink"><strong>View/Edit</strong></a></td>
                                  
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