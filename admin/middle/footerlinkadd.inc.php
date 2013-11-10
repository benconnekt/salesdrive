<?
$mode=$_REQUEST[mode];
$fLid=$_REQUEST[fLid];
$readonly="";
if($mode == "Update")
{
	$sql="select * from footerlink where fLid='".$fLid."'";
 	$db_sql=$obj->select($sql);

	$fLid=$db_sql[0]["fLid"];
	$fLName=$db_sql[0]["fLName"];
	$fLDesc=$db_sql[0]["fLDesc"];
	
	$fLMetaTitle=$db_sql[0]["fLMetaTitle"];
	$fLMetaDesc=$db_sql[0]["fLMetaDesc"];
	$fLKey=$db_sql[0]["fLKey"];
	
	$TOP_HEADER='Edit Footer Pages';
	
}
else
{
   $mode="Add";
   $TOP_HEADER='Add Footer Pages';
}
	
?>
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "emotions,spellchecker,advhr,insertdatetime,preview", 
                
        // Theme options - button# indicated the row# only
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,|,code,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions",      
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true
});
</script>
<form name="frmadd" method="post" action="footerlinkadd_a.php"> 
<input type="hidden" name="mode" value="<?=$mode;?>">
<input type="hidden" name="fLid" value=<?=$fLid;?>>


<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Footer Link Listing','index.php?file=footerlinklist');?></td>	  
</tr>
<tr>
	<td>
		<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
   
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="middle"><h2><img src="images/package_icon.jpeg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;<?=$TOP_HEADER?></h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder">
				<table  width="100%" border="0" align="center" cellspacing="1" cellpadding="1">
 				<tr>
                	<td Class="errormsg" colspan="2" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                                </tr>
				<tr>
				  <td width="11%" class="formtext">Page Name<span class="errormsg">*</span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input type="text" name="fLName" size="25" value="<?=$fLName?>" maxlength="100">		</td>
				</tr>
				
				<tr>
				  <td valign="top"  class="formtext" >Description <span class="errormsg">*</span></td>
					<td valign="top" style="text-align:center">:</td>
                                        <td>
                                            <textarea name="fLDesc" cols="105" rows="25">
                                                <?=stripslashes($fLDesc)?></textarea>
                                        </td>
				</tr>
                                <tr>
                                    <td colspan="3">
                                        <h1 style="background: none">SEO ZONE</h1>
                                    </td>
                                </tr>
				<tr>
				  <td width="11%" class="formtext">Meta Title<span class="errormsg"></span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input type="text" name="fLMetaTitle" size="45" value="<?=$fLMetaTitle?>" maxlength="200" />		</td>
				</tr>
				<tr>
				  <td width="11%" class="formtext">Meta Description<span class="errormsg"></span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
					<input type="text" name="fLMetaDesc" size="45" value="<?=$fLMetaDesc?>" maxlength="250"/>
					</td>
				</tr>
				<tr>
				  <td width="11%" class="formtext">Meta Keyword<span class="errormsg"></span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
					<input type="text" name="fLKey" size="45" value="<?=$fLKey?>" maxlength="200"/>
				</td>
				</tr>
				
				
				<tr >
					<td colspan="3"  style="text-align:center" align="right" >
				<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
				<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
				<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=footerlinklist');return false;">
					
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
          </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="27" align="left" valign="top">&nbsp;</td>
    </tr>
  </table>
	</td>
</tr>
</table>
</form>

<script language="JavaScript1.2">
function checkvalid1()
{
	if(document.frmadd.fLName.value == "")
	{
		alert("Please Enter Page Name.");
		document.frmadd.fLName.focus();
		return false;
	}
}
</script>	
