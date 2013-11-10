<?
## Used For Display Tob Menu Bar ##
## Function Used In File : top_header.php";
function getMenuList($iParentMenuId=0, $old_menu="",$iMenuIdNot="0",$loop=1)
{
	global $obj, $par_menu_arr;
	$sql_query = "select iMenuId, vMenuDisplay, vModuleName from ajaxlist_menu  where iParentMenuId='".$iParentMenuId."'";
	if($iMenuIdNot!="" && $iMenuIdNot != "0"){
		$sql_query .= " and iMenuId<>'$iMenuIdNot'";
	}
	$sql_query .= " order by iOrderBy";
	$db_cat_rs = $obj->select($sql_query);
	$n=count($db_cat_rs);
	if($n>0){
		for($i=0 ; $i<$n ; $i++){
			$par_menu_arr[]=array('iMenuId'=> $db_cat_rs[$i]['iMenuId'], 'vModuleName'=> $db_cat_rs[$i]['vModuleName'], 'vMenuDisplay' =>  $old_menu."--|".$loop."|&nbsp;&nbsp;".$db_cat_rs[$i]['vMenuDisplay'], 'loop'=>$loop);
			getMenuList($db_cat_rs[$i]['iMenuId'], $old_menu."&nbsp;&nbsp;&nbsp;&nbsp;",$iMenuIdNot,$loop+1);
		}
		$old_menu = "";
	}
}

function top_getTopMenuArray()
{
	$db_menu_rs=array();
	// Home 
	$i = 1; 
	$db_menu_rs[]=array("iMenuId" => $i , 	"iParentId" => 0,	"iSequenceOrder" => 0, 	"eStatus" => "Active",	"vMenuDisplay" => "Home", 		"vImage" => "", "vURL" => "#");
//	$db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i, 	"iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Dash Board", "vImage" => "", "vURL" => "index.php");
	$db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i, 	"iSequenceOrder" => 2, 	"eStatus" => "Active",	"vMenuDisplay" => "Site Map", 	"vImage" => "", "vURL" => "index.php?file=sitemap");
		$i++;
		
		//Admin mgmt
		$db_menu_rs[]=array("iMenuId" => $i,	"iParentId" => 0,  	"iSequenceOrder" => 0, 	"eStatus" => "Active",	"vMenuDisplay" => "Admin", 	"vImage" => "", 	"vURL" => "#");
		$db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Admin List", 	"vImage" => "", 	"vURL" => "index.php?file=adminlist");
		$i++;	
		//Master 			
                $db_menu_rs[]=array("iMenuId" => $i,	"iParentId" => 0,  	"iSequenceOrder" => 0, 	"eStatus" => "Active",	"vMenuDisplay" => "Dashboard", 	"vImage" => "", 	"vURL" => "#");
			
		$db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Pages", 	"vImage" => "", 	"vURL" => "index.php?file=webpageslist");
                 $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Footer Links", 	"vImage" => "", 	"vURL" => "index.php?file=footerlinklist");
                $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "FAQ", 	"vImage" => "", 	"vURL" => "index.php?file=faqlist");
                $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "News", 	"vImage" => "", 	"vURL" => "index.php?file=newslist");
                  $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Link Category", 	"vImage" => "", 	"vURL" => "index.php?file=linkcategorylist");
                $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Useful Links", 	"vImage" => "", 	"vURL" => "index.php?file=ulinklist");
                $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Clients", 	"vImage" => "", 	"vURL" => "index.php?file=clientlist");
                $db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "CRM", 	"vImage" => "", 	"vURL" => "index.php?file=customerlist");
		$i++;	
		
		//Settings
		$db_menu_rs[]=array("iMenuId" => $i, 	"iParentId" => 0,  	"iSequenceOrder" => 0, 	"eStatus" => "Active",	"vMenuDisplay" => "Settings", 			"vImage" => "", 	"vURL" => "#");
		$db_menu_rs[]=array("iMenuId" => -1, 	"iParentId" => $i,  "iSequenceOrder" => 1, 	"eStatus" => "Active",	"vMenuDisplay" => "Site Settings", 		"vImage" => "", 	"vURL" => "index.php?file=settinglist");

   	return $db_menu_rs;
}

function displayTopMenu($parent_id, $menu)
{
	//$DISPLAY_IMAGE=($_COOKIE['coo_Kent_Menu']=="On"?"Y":"N");
	$DISPLAY_IMAGE='Y';
	$submenu_arr=getSubMenus($parent_id);
	$totRec = count($submenu_arr);
	if($totRec > 0)	{
		for($i=0;$i<$totRec;$i++){
			$flag=0;
			if($parent_id == 0){
				$flag=1;
			}
			if($flag !=1)
			{
				if($DISPLAY_IMAGE=="Y")
				{
					$menu_img_scr = "<img src=images/menu/".$submenu_arr[$i]['vImage']." alt=menu>";
					if($submenu_arr[$i]['vImage'] == '')
						$menu_img_scr = '';
				}
				else
				{
					$menu_img_scr = "<img src=images/spacer.gif height=17 width=5 alt=''>";
				}
				$menu .=",['$menu_img_scr','".$submenu_arr[$i]['vMenuDisplay']."','".$submenu_arr[$i]['vURL']."',null,'".$submenu_arr[$i]['vMenuDisplay']."' ".displayTopMenu($submenu_arr[$i][iMenuId], '')."]";
			}
			else if(count(getSubMenus($submenu_arr[$i][iMenuId])) > 0)
			{
				$menu .=",[null,'".$submenu_arr[$i]['vMenuDisplay']."','".$submenu_arr[$i]['vURL']."',null,'".$submenu_arr[$i]['vMenuDisplay']."'".displayTopMenu($submenu_arr[$i][iMenuId], '')."]";
			}
		}
	}
	else
	{
		return $menu;
	}
	return $menu;
}

function getSubMenus($id)
{
	global $db_menu_rs;
	$totRec = count($db_menu_rs);
	$j=0;
	for($i=0;$i<$totRec;$i++)
	{
		if($db_menu_rs[$i][iParentId] == $id)
		{
			$submenu[$j][vURL]=$db_menu_rs[$i][vURL];
			$submenu[$j][vMenuDisplay]=$db_menu_rs[$i][vMenuDisplay];
			$submenu[$j][iMenuId]=$db_menu_rs[$i][iMenuId];
			$submenu[$j][iParentId]=$db_menu_rs[$i][iParentId];
			$submenu[$j][vImage]=$db_menu_rs[$i][vImage];
			$submenu[$j][eStatus]=$db_menu_rs[$i][eStatus];
			$j++;
		}
	}
	return $submenu;
}### END ##########

function gen_DisplayPaging_Top($code, $showLetter="Y", $showPaging="Y", $width="100%")
{
	global $recmsg, $page_link;

	if($showPaging=="N")	$style = "style=display:none";
	else 					$style = "style=display:''";
	if($showLetter=="N")	$style_alpha = "style=display:none";
	else 					$style_alpha = "style=display:''";
	echo '<table width="'.$width.'" cellpadding="0" cellspacing="0" border="0">
		<tr style="height:20px">
			<td width="25%" class="disprecordmsg"><span '.$style.' class="disprecordmsg"  id="RECMSG_TOP">'.(($showPaging=="Y")?$recmsg:"").'&nbsp;</span></td>
			<td style="text-align:Center" nowrap><span '.$style_alpha.' class="disprecordmsg"  id="ALPHA_PAGING_TOP">'.(($showLetter=="Y")?getSearchByLetter($code):"").'</span></td>
			<td width="25%" style="text-align:right"><span '.$style.' class="errormsg"   id="PAGING-TOP">'.(($showPaging=="Y")?$page_link:"").'&nbsp;</span></td>
		</tr>
		</table>';
}

function gen_DisplayPaging_Bottom($code, $showLetter="Y", $showPaging="Y", $width="100%")
{
	global $recmsg, $page_link;
	if($showPaging=="N")
		$style = "style=display:none";
	else
		$style = "style=display:''";
	echo '<table width="'.$width.'" cellpadding="0" cellspacing="0" border="0">
		<tr style="height:20px">
			<td width="25%" class="disprecordmsg"><span '.$style.' class="disprecordmsg"  id="RECMSG_BOTTOM">'.(($showPaging=="Y")?$recmsg:"").'&nbsp;</span></td>
			<td style="text-align:Center" nowrap><span '.$style_alpha.' class="disprecordmsg"  id="ALPHA_PAGING_BOTTOM">'.(($showLetter=="Y")?getSearchByLetter($code):"").'</span></td>
			<td width="25%" style="text-align:right"><span '.$style.' class="errormsg"   id="PAGING-BOTTOM">'.(($showPaging=="Y")?$page_link:"").'&nbsp;</span></td>
		</tr>
		</table>';
}


function getSearchByLetter($fieldname)
{
	foreach ($_GET as $key=>$value)
	{
		if($key != "option" && $key != "keyword")
			$qs .= "&$key=$value";
	}

	$filename = basename($PHP_SELF);
	$link = "";
	for($i=65;$i<=90;$i++)
	{
		IF($_GET[keyword]==chr($i))
			$link .= '<font color="ff6600" size="+1">'.chr($i).'</font> ';
		else
			$link .= '<a class="bluetext" href="'.$filename.'?'.$qs.'&option='.rawurldecode($fieldname).'&keyword='.chr($i).'&search=true&start=1" title="Search with '.chr($i).'">'.chr($i).'</a> ';
	}
	if(isset($_GET[keyword]) && $_GET[keyword]=="")
		$link .= '<font color="ff6600" size="+1">'.ALL.'</font>';
	else
		$link .= '<a class="bluetext" href="'.$filename.'?'.$qs.'&option='.$fieldname.'&keyword='.'" title="Show All">'.ALL.'</a>';
	return $link;
}

function DisplayTopInListAdd($TOP_HEADER,$BACK_LABEL='',$BACK_LINK='',$HEADING='',$img='')
{
	$html='<div class="screenTitle">
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
      		<tr>
				<td>';
	if($img=="")
		$img = "on.gif";

	//$html.='<img src="images/'.$img.'">';

	$html .='&nbsp;'.$TOP_HEADER.'</td>';
		if($BACK_LABEL!='')
			$html .= '<td align="right"><a href="'.$BACK_LINK.'">'.$BACK_LABEL.'</a>&nbsp;&nbsp;</td>';
	$html .= '</tr>
			</table>
		</div>';
	return $html;
}

function displayMenu($parent_id, $pre="5")
{
	global $parent_rec;
	$submenu_arr=getSubMenus($parent_id);
	$totRec = count($submenu_arr);
	$DISPLAY_IMAGE="Y";
	if($parent_id==0)	$parent_rec=$totRec;
	if($totRec > 0)
	{
		for($i=0;$i<$totRec;$i++)
		{
			if($parent_id == 0)
			{
				if($i%(ceil($parent_rec/3))==0)	echo "</td><td valign='top'>";
				echo "<span class='bluematter'>";
			}
			else
			{
				echo "<span class=''>";
			}
			//if(gen_checkSiteFeature($submenu_arr[$i][vSiteFeatureCode]))
			{?>
				<ul>
			<? if($DISPLAY_IMAGE=="Y")
			{
				if(trim($submenu_arr[$i]['vImage'])!="" && @file("images/menu/".$submenu_arr[$i]['vImage']))
				{?>
					<img src="images/menu/<?=$submenu_arr[$i]['vImage']?>" height=17>&nbsp;
				<? }
				else
					echo "<b><font color=darkblue>&curren;</font></b> ";
			}
			else
			{
				echo "<li>";
			}
			if($submenu_arr[$i][vURL]=="#"){?>
			<font color=darkblue><?=$submenu_arr[$i][vMenuDisplay]?></font>
			<? }
			else
			{?>
					<a href="<?=$submenu_arr[$i][vURL]?>" title="<?=$submenu_arr[$i][vMenuDisplay]?>" class="sitemap"><?=$submenu_arr[$i][vMenuDisplay]?></a>
			<? }
			if($DISPLAY_IMAGE != "Y")
			{
				echo "</li>";
			}?>
			</span>
			<?displayMenu($submenu_arr[$i][iMenuId], $pre+15);?>
			</ul>
			<? }
		}
	}
	else
	{
		return 1;
	}
}

function gen_DisplayRecPerPage($rec_limit="")
{
	global $RECLIMIT;
    $getArgu = getPOSTGETParam();
    $select_combo="";
	$select_combo.='<select name="rec_limit" onchange="return checkRecordLimit(this.value);">';
	$select_combo.='<option value="">Default Limit ('.$RECLIMIT.')</option>';
	if($rec_limit=='')$rec_limit=$RECLIMIT;
	if($_REQUEST[TotalRecords]!='')$rec_limit=$_REQUEST[TotalRecords];
	for($i=10;$i<=100;$i=$i+10)
	{
		if($i==$rec_limit)
			$select_combo.='<option value="'.$i.'" selected>'.$i.'</option>';
		else
		    $select_combo.='<option value="'.$i.'">'.$i.'</option>';
	}
	$select_combo.='</select>';
	return $select_combo;
}

function createTitleBox($titleMsg)
{
	echo '<TABLE id=Table3 style="WIDTH: 100%; HEIGHT: 4px" height=4 cellSpacing=0 cellPadding=0 border=0>
				<TBODY>
                    <TR class="td-lightbrown">
                      <TD class="td-row1" height="20" align="left" width="100%"><SPAN class="topHead2" style="color:#000000" id=SignIn1_Label1>&nbsp;&nbsp;'.$titleMsg .'</SPAN></TD>
					</TR>
					<TR><TD>&nbsp;</TD></TR>
				</TBODY>
		  </TABLE>';
}

function gen_security($id)
{
	$flag = "0";
	if($_SESSION["sess_eType"] == "IM")
	{
		if($_SESSION["sess_iEmployeeId"] == $id)
			$flag = "1";
		else
			$flag = "0";
	}
	else
	{
		if($_SESSION["sess_iMemberId"] == $id)
			$flag = "1";
		else
			$flag = "0";
	}
	return $flag;
}

/*function gen_seqno($table,$fieldname){
  global $obj;
   $selquery_seq="select $fieldname from $table where eStatus = 'Active'";
    $db_seq_no = $obj->select($selquery_seq);
    $seq_nos = "<select name='$fieldname'>";
    $seq_nos .= "<option>----Select Sequence Number---</option>";
    for($i=0;$i<=count($db_seq_no);$i++)
    {
        $j=$i+1;
        if($i==count($db_seq_no))
            $selected = " selected ";
        $seq_nos .= "<option ".$selected.">".$j."</option>";
    }
    $seq_nos .="</select>";
    return $seq_nos;
}*/

function gen_seqno($table,$fieldname,$fieldvalue)
{
  global $obj;
  $selected="";
  	$selquery_seq="select $fieldname from $table";
    $db_seq_no = $obj->select($selquery_seq);
    $seq_nos = "<select name='$fieldname'>";
    $seq_nos .= "<option>----Select Sequence Number---</option>";
    for($i=0;$i<=count($db_seq_no);$i++)
    {
        $j=$i+1;
        if($fieldvalue==""){
        if($i==count($db_seq_no))
            $selected = " selected ";
         }
         if($fieldvalue!=""){
            if($j==$fieldvalue){
              //echo $j;
                $selected="selected";
            }
         }
        $seq_nos .= "<option ".$selected." value=".$j.">".$j."</option>";
        $selected="";
    }
    $seq_nos .="</select>";
    return $seq_nos;

}

function convertPOSTtoSESSION($post_Arr)
{
	foreach($post_Arr as $post_key => $post_val)
	{
		$_SESSION[$post_key] = $post_val;
	}
}

function gen_getMemberCombo($sel='',$onchange='')
{
	global $obj;
	if($onchange!='')
		$onchange=$onchange;
	$sql="select iMemberId,vFirstName,vLastName from member where  eStatus='Active' order by vFirstName ";					
	$db_mem=$obj->select($sql);
	$mem_combo="";
	$mem_combo.="<select alt=\"*\" $onchange title=\"Member\" name=\"iMemberId\" id=\"iMemberId\">";
		$mem_combo.="<option id=\"iMemberId\"  value=\"\">-------- Select  Member --------</option>";
			for($i=0;$i<count($db_mem);$i++)
			{
				if($db_mem[$i]["iMemberId"]==$sel)
					$mem_combo.="<option id=\"iMemberId\" value=".$db_mem[$i]["iMemberId"]." selected>".$db_mem[$i]["vFirstName"]." ".$db_mem[$i]["vLastName"]."</option>";
				else
					$mem_combo.="<option id=\"iMemberId\" value=".$db_mem[$i]["iMemberId"].">".$db_mem[$i]["vFirstName"]." ".$db_mem[$i]["vLastName"]."</option>";
			}
		$mem_combo.="</select>";
	return $mem_combo;
}

function gen_getEvent_type($sel='')
{
	$Event_Combo="";
	$eEventType_Arr=gendb_mysql_enum_values("event",'eEventType');
		$Event_Combo.="<select class=\"INPUT\" alt=\"*\" title=\"Event Type\" name=\"eEventType\" style=\"width:150px\">";
		for($i=0;$i<count($eEventType_Arr);$i++)
		{
			if($sel == $eEventType_Arr[$i])
				$Event_Combo.="<option  value=".$eEventType_Arr[$i]." selected>".$eEventType_Arr[$i]."</option>";
			else
				$Event_Combo.="<option  value=".$eEventType_Arr[$i].">".$eEventType_Arr[$i]."</option>";
		}
		$Event_Combo.="</select>";
	return $Event_Combo;
}

function gen_getClassifiedcombos($table,$Field,$sel='')
{
	$FrontPage_Combo="";
	$eFrontage_Arr=gendb_mysql_enum_values($table,$Field);
		$FrontPage_Combo.="<select class=\"INPUT\" alt=\"*\" title=\"Front Page\" name=\"$Field\" style=\"width:100px\">";
		for($i=0;$i<count($eFrontage_Arr);$i++)
		{
			if($sel == $eFrontage_Arr[$i])
				$FrontPage_Combo.="<option  value=".$eFrontage_Arr[$i]." selected>".$eFrontage_Arr[$i]."</option>";
			else
				$FrontPage_Combo.="<option  value=".$eFrontage_Arr[$i].">".$eFrontage_Arr[$i]."</option>";
		}
		$FrontPage_Combo.="</select>";
	return $FrontPage_Combo;
}

function gen_show_PaymentTypeCombo($sel='')
{
	$paymenttype_arr=array('Pending','Declined','Payed','Free');
	$Payment_Combo="";
		$Payment_Combo.="<select class=\"INPUT\" name=\"ePaymentStatus\" style=\"width:150px\">";
		for($i=0;$i<count($paymenttype_arr);$i++)
		{
			if($sel == $paymenttype_arr[$i])
				$Payment_Combo.="<option  value=".$paymenttype_arr[$i]." selected>".$paymenttype_arr[$i]."</option>";
			else
				$Payment_Combo.="<option  value=".$paymenttype_arr[$i].">".$paymenttype_arr[$i]."</option>";
		}
		$Payment_Combo.="</select>";
	return $Payment_Combo;
}?>