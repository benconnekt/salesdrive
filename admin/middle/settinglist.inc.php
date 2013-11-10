<?
$ssql = " where 1=1 AND eStatus='Active'";
if(!isset($_REQUEST[Type]) || $_REQUEST[Type]== '')	$_REQUEST[Type] = 'Appearance';
$ssql .= " AND eConfigType = 'Appearance'";
if(isset($_REQUEST[keyword]))
	$ssql.=" AND ".$_REQUEST[option]." like '%".$_REQUEST[keyword]."%'";
$sql="select count(*) as tot from setting $ssql";
$db_res=$obj->select($sql);	
$num_totrec = $db_res[0]["tot"];
$rec_limit= "50";
include("middle/paging.inc.php");

$sort =" order by iOrderBy";
$db_query = "select * from setting  ".$ssql.$sort;
//echo $db_query;
$db_res = $obj->select($db_query);
$var_msg = $_REQUEST['var_msg'];
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
$TOP_HEADER='General Setting List';
?>

<form name="frmlist" method="post" action="settingadd_a.php">
<input type="hidden" name="mode" value="<?=$mode?>">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="27" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="middle"><h2><img src="images/icon01.jpg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;Settings</h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder">        
		  	<table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
        	<td>
              	<table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                	<td width="50%" Class="errormsg">&nbsp;<? if(isset($var_msg))print $var_msg;?></td>
				  	<? // $ConfigType_Arr=gendb_mysql_enum_values("setting",'eConfigType');?>
                  	<!--<td width="20%" align="right" class="td-listing">
				  		<select name="eConfigType" style="width:150px" onChange="return checkConfigType(this.value)">
				  		<? for($i=0;$i<count($ConfigType_Arr);$i++){?>
				  			<option <?=($_REQUEST[Type] == $ConfigType_Arr[$i])?"selected":""?> value="<?=$ConfigType_Arr[$i]?>"><?=$ConfigType_Arr[$i]?></option>
				  		<? }?>
				  		</select>
                  	</td>
                  	<td width="10%" class="td-listing"><div align="right">
                    	<select name="option">					  
                      		<option <?=($option =="vDesc")? "selected":""?> value="vDesc"> Description</option>
                        	<option <?=($option =="vValue")? "selected":""?> value="vValue">Values</option>
					  	</select>
                    </div>
                  	</td>
                  	<td width="15%" class="td-listing"><div align="right">
                    	<input  name="keyword" type="Text" size="20" value="<?=$keyword?>">
                    </div>
                  	</td>
                  	<td width="5%" class="td-listing"><div align="right">
                      <input name="Search" class="imagestyle" type="image" src=images/search.jpg alt="Search" onClick="return valid()">
                    </div>
              		</td>-->
              	</tr>
                <tr>
                	<td colspan="5">
						<table width="100%" border="0" cellspacing="1" cellpadding="1">
 						<!--<tr>
	                    	<td width="10%" class="td-listing">
								<a href="index.php?file=settinglist&Type=<?=$_REQUEST[Type]?>"><img style="cursor:pointer;" type="image" name="sh1"   src="images/showall.jpg" border="0" alt="Show All"></a>
	                   		<td width="60%" class="td-new2"><div align="right"><font class="disprecordmsg"><? echo $recmsg ;?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td> 
                      	</tr>-->
                    	</table>
                  	</td>
                </tr>
              	</table>
                <?php if(count($db_res)>0){?>

              	<table width="100%" cellspacing="0" cellpadding="2" border="0">
				 <tr>
                   <td width="20%" height="25" align="left" valign="middle" class="detailtitle" style="padding-left:20px;">Description</td>
                  <td width="23%" height="25" align="left" valign="middle" class="detailtitle">User Values</td>
                                    
                </tr>
				<?	for($i=0;$i<count($db_res);$i++)
				{
					$bgcolor = ($i%2)?"bg01" : "bg02";
         		?>    
        		<input  type="hidden" name="did" value=<?=$db_setting_rs[$i]["vName"];?>>
                <tr class="<?=$bgcolor?>" onMouseOver="Highlight(this)"  onmouseout="UnHighlight(this,'<?=$bgcolor?>')">

					<td style="padding-left:20px;" class="td-listing"><?=$db_res[$i]["vDesc"];?></td>
					<td class="td-listing">
						<? if($db_res[$i]["eDisplayType"] == 'text'){?>
							<input type="Text" name="<?=$db_res[$i]["vName"]?>" size="50" value="<?=$db_res[$i]["vValue"]?>">
						<? }if($db_res[$i]["eDisplayType"] == 'textarea')	{?>
							<textarea rows="6" cols="45" name="<?=$db_res[$i]["vName"]?>"><?=$db_res[$i]["vValue"]?></textarea>
						<? }if($db_res[$i]["eDisplayType"] == 'checkbox')	{?>
							<input <?=($db_res[$i]["vValue"] == 'Y')?"checked":""?> type="checkbox" name="<?=$db_res[$i]["vName"]?>" size="50">
						<? }if($db_res[$i]["eDisplayType"] == 'selectbox'){ 
						
							if($db_res[$i]["eSource"] == 'List')	{
								$Source_Arr = explode(",",$db_res[$i]["vSourceValue"]);
								$nSource_List = count($Source_Arr);?>
								<?if($db_res[$i]["eSelectType"] =='Single')	{?>
								<Select style="width:275px" name="<?=$db_res[$i]["vName"]?>">
								<?	}	else	{?>
								<Select style="width:275px" multiple name="<?=$db_res[$i]["vName"]?>[]">
								<?	}	?>
									<option value="-9"><< Select <?=$db_res[$i]["vDesc"]?> >></option>
									<? for($j=0;$j<$nSource_List;$j++){
										$list_arr = explode("::",$Source_Arr[$j]);
										if($list_arr[1] == "")
											$list_arr[1] = $list_arr[0];
										$selected = "";
										if($db_res[$i]["eSelectType"] =='Single')	{
											if($list_arr[0] == $db_res[$i]["vValue"])
												$selected = "selected";
										}
										else
										{
											$vValue_arr = explode("|",$db_res[$i]["vValue"]);
											if(in_array($list_arr[0], $vValue_arr))
												$selected = "selected";
										}
										?>	
										<option <?=$selected?> value="<?=$list_arr[0];?>"><?=$list_arr[1];?></option>
									<?}?>				
								</SELECT>
							<? }
							if($db_res[$i]["eSource"] == 'Query'){
								$db_selectSource_rs = $obj->select($db_res[$i]["vSourceValue"]);
								$nSource_Query = count($db_selectSource_rs);?>
								<Select style="width:275px" name="<?=$db_res[$i]["vName"]?>">
									<option value="-9"><< Select <?=$db_res[$i]["vDesc"]?> >></option>
									<? for($j=0;$j<$nSource_Query;$j++){?>	
										<option <?=($db_selectSource_rs[$j][0] == $db_res[$i]["vValue"])?"selected":""?> value="<?=$db_selectSource_rs[$j][0];?>"><?=$db_selectSource_rs[$j][1];?></option>
									<? }?>				
								</SELECT>

							<? }
						}?>
					</td>
                </tr>
				<? }?>
			<? }?>
			  	</table>
             </td>
        </tr>
      	</table>
		  
		  </td>
        </tr>
        <tr>
          <td  colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5" align="left" valign="top"><img src="images/bottom_left.jpg" width="5" height="6" /></td>
                <td align="left" valign="top" class="categorybottomback"><img src="images/spacer.gif" width="1" height="1" /></td>
                <td width="6" align="left" valign="top"><img src="images/bottom_right.jpg" width="6" height="6" /></td>
              </tr>
          </table>
		   <input  type="hidden" name="no" value="<? echo count($db_res); ?>">
	   <p align="right"><font size="1" FACE="Verdana, Arial, Helvetica, sans-serif" color="black"><? //if(count($db_res)){ echo "Page(s) :".$page_link;}?></font></p>
		  </td>
        </tr>
      </table></td>
    </tr>
<tr>
	<td align="center" colspan="5">
	<input type="Image" class="buttonstyle" src="images/btn-modify.gif" style="cursor:hand;border:0"  onClick="return checkValid(document.frmlist);">
	<input type="Image" class="buttonstyle" src="images/btn-reset.gif" onClick="reset();return false;" style="cursor:hand;border:0">
	<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=sitemap');return false;">
	</td>
</tr>
  </table>
</form>
<script>
function checkConfigType(val)
{
	window.location = 'index.php?file=settinglist&AX=No&Type='+val;
}
function checkValid(frm)
{
	frm.mode.value = 'Update';
}
</script>
