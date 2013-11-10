<?php

#-----------------------------------------------------------------
# Function about General Settings ::
#-----------------------------------------------------------------

function gendb_getGeneralVar()
{
	global $obj, $smarty;
	$wri_usql = "SELECT * FROM setting  where eStatus='Active'";
   	$wri_ures = $obj->select($wri_usql);

	for($i=0;$i<count($wri_ures);$i++)
	{
		$vName  = $wri_ures[$i]["vName"];
		$vValue  = $wri_ures[$i]["vValue"];
		global $$vName;
		$$vName=$vValue;
		if($smarty)
			$smarty->assign($vName, $vValue);
	}
}

function gendb_mysql_enum_values($table, $field)
{
   $sql = "SHOW COLUMNS FROM $table LIKE '$field'";
   $sql_res = mysql_query($sql)or die("Could not query:\n$sql");
   $row = mysql_fetch_assoc($sql_res);
   mysql_free_result($sql_res);
  return explode("','",
       preg_replace("/.*\('(.*)'\)/", "\\1", $row["Type"]));
}

function gendb_DisplayArray_Select($selstatus,$fieldId,$vstatus){

	$statuscombo = "";
	$statuscombo .= "<select name=\"$fieldId\">";
	
	for($i=0;$i<count($vstatus);$i++) {
		
		if (trim($selstatus) == trim($vstatus[$i])) {
			$statuscombo .= "<option value=".$vstatus[$i]." selected>".$vstatus[$i];
		} else {
			$statuscombo .= "<option value=".$vstatus[$i].">".$vstatus[$i];
		}
	}
	$statuscombo .= "</select>";
	return $statuscombo;
}

function gendb_DisplayArray_Select_with_Key($selstatus,$fieldId,$vstatus){

	$statuscombo = "";
	$statuscombo .= "<select name=\"$fieldId\">";

	foreach($vstatus as $k=>$v) {
		if (trim($selstatus) == trim($k)) {
			$statuscombo .= "<option value=".$k." selected>".$v;
		} else {
			$statuscombo .= "<option value=".$k.">".$v;
		}
	}
	$statuscombo .= "</select>";
	return $statuscombo;
}

function gendb_DisplayArray_Radio($selstatus,$fieldId,$vstatus)
{
	$statusradio = "";
	for($i=0;$i<count($vstatus);$i++) {
		if (trim($selstatus) == trim($vstatus[$i])) 
			$statusradio .= "<input type=\"Radio\" name=\"$fieldId\" value=".$vstatus[$i]." checked>&nbsp;".$vstatus[$i];
		else
			$statusradio .= "<input type=\"Radio\" name=\"$fieldId\" value=".$vstatus[$i].">&nbsp;".$vstatus[$i];
	}
	return $statusradio;
}


####  $vstatus => Like Yes,No or True,False --------   
function gendb_DisplayArray_YesNo($selstatus,$fieldId,$vstatus)
{
	$statuscheckbox = "";
	$statuscheckbox .= "<input ".$selstatus." type=\"checkbox\" name=\"$fieldId\">";
	return $statuscheckbox;
}

#-----------------------------
#-----------------------------------------------------------------------------------------
# Create Dynamic Combobox 
#(Usage : 
# echo dynamicDropeDown(country_master,iCountryId,vCountry,vCountryCode,$iCountryId); 
# If u don't want vCountryCode then only write ''. 
#-----------------------------------------------------------------------------------------

function gendb_dynamicDropeDown($tableName,$fieldId,$fieldName,$extVal='',$where_clause='',$order_by='',$selectedVal='',$select_name='',$width=150,$size='',$title='',$fun='',$other='no',$alt='_',$extratitle='')
{
	Global $obj;
	$groupdropdown = "";
	if($select_name == '')
		$select_name == $fieldId;
	if($where_clause !="")
		$where_clause = " WHERE $where_clause ";

	if($extVal!='')
		$ssql = "$fieldId,$fieldName,$extVal";
	else 
		$ssql = "$fieldId,$fieldName";	

	if($order_by !="")
		$order_by = " ORDER BY $order_by ";
		
	if($title=='')
		$title="Please Select Value";
	$sql_query="SELECT $ssql FROM $tableName $where_clause $order_by";
	$db_select_rs = $obj->select($sql_query);
	
	if($size!='')
		$size="size=$size";
		
	if($fun!='')
		$function = "onChange='".$fun."'";

	$groupdropdown .= "<select class='INPUT' name='".$select_name."' $size alt='$alt' style=\"width:$width\" $function title='$extratitle'>";
	$groupdropdown .= "<option value='' selected>".$title."</option>";
	
	for($i=0;$i<count($db_select_rs);$i++) 
	{
		$cid = $db_select_rs[$i][$fieldId];
		$cname = $db_select_rs[$i][$fieldName];
		$extname = $db_select_rs[$i][$extVal];

		if ($extVal != "")
		{
			$vData = "$cname ( $extname )";
		}
		else
		{
			$vData = "$cname"; 
		}
		
		if($cid==$selectedVal) 
		{
			$groupdropdown .= "<option value=\"$cid\" selected>".$vData."</option>";
		}
		else
		{
			$groupdropdown .= "<option value=\"$cid\">".$vData."</option>";  
		}
	}
	
	if($other == 'yes')
	{
	if($selectedVal=='Other') $sel='selected';
	$groupdropdown .="<option value='Other' $sel>Other</option>";
	}
	
	$groupdropdown .= "</select>";
	return $groupdropdown;
}
#-----------------------------------------------------------------------------------------
#//        Update Table Function
#-----------------------------------------------------------------------------------------

function gendb_updateTable($tablenm,$fieldnm,$fieldval,$id,$idval)
{
	Global $obj;
	$fieldsize = count($fieldnm[0]);
	$valuesize =  sizeof($fieldval[0]);
	if ($fieldsize != $valuesize)
	{
		$msg = "Invalid argument";
		return $msg;
	}
	$sql_update = "Update $tablenm set ";
	for ($cnt=0; $cnt<$fieldsize-1; $cnt++)
	{
		$sql_update .= $fieldnm[0][$cnt]." = '".$fieldval[0][$cnt]."',";
	}
	$sql_update .= $fieldnm[0][$fieldsize-1]." = '".$fieldval[0][$fieldsize-1]."'";
	$sql_update .= " Where ".$id. " = ".$idval;
	$db_update = $obj->sql_query($sql_update);
	if ($db_update)
	  $msg = "";
	else
	  $msg = "Error in updation";
	return $msg;
}
?>