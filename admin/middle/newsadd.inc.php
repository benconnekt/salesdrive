<? include("ckeditor/ckeditor.php") ;
$mode=$_REQUEST[mode];
$iNewsId=$_REQUEST[iNewsId];
$readonly="";
if($mode == "Update")
{
	$sql="select * from news where iNewsId='".$iNewsId."'";
 	$db_sql=$obj->select($sql);

	$iNewsId=$db_sql[0]["iNewsId"];
	$vNewTitle=$db_sql[0]["vNewTitle"];
	$vNewDate=$db_sql[0]["vNewDate"];
	$tNewDesc=$db_sql[0]["tNewDesc"];
	
	$TOP_HEADER='Edit News Pages';
	
}
else
{
   $mode="Add";
   $TOP_HEADER='Add News Pages';
}
	
?>
<LINK rel="stylesheet" type="text/css" href="js/jscalendar/calendar-gray.css">
<script language="JavaScript1.2" src="js/jscalendar/calendar2.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar-en.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script>

<form name="frmadd" method="post" action="news_a.php" enctype="multipart/form-data"> 
<input type="hidden" name="mode" value="<?=$mode;?>">
<input type="hidden" name="iNewsId" value=<?=$iNewsId;?>>


<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to News Listing','index.php?file=newslist');?></td>	  
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
 				<tr >
                	<td Class="errormsg" colspan="2" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                </tr>
				
				<tr>
				  <td width="11%" class="formtext">News Title<span class="errormsg">*</span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input type="text" name="vNewTitle" size="25" value="<?=$vNewTitle?>" maxlength="50">		</td>
				</tr>
				<tr>
				  <td width="11%" class="formtext">Date <span class="errormsg">*</span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input readonly="readonly" size="10" type="text" name="vNewDate" id="vNewDate" value="<?=$vNewDate?>" />&nbsp;<img src="images/cal.gif" name="date_dtpa" id="date_dtpa" border="0" align="bottom" />
					<script type="text/javascript">
	Calendar.setup({
	inputField     :    "vNewDate",      // id of the input field
	ifFormat       :    "%Y-%m-%d", //"%Y-%m-%d %H:%M:%S",       // format of the input field
	showsTime      :    false,            // will display a time selector
	button         :    "date_dtpa",   // trigger for the calendar (button ID)
	singleClick    :    false,           // double-click mode
	step           :    1,                // show all years in drop-down boxes (instead of every other year as default)
	align          :    "right"           // alignment (defaults to "Bl")
});

	</script>
					</td>
				</tr>
					<tr>
				  <td valign="top"  class="formtext" >Description <span class="errormsg">*</span></td>
					<td valign="top" style="text-align:center">:</td>
					<td>
				   <?php
                                                                        // Create a class instance.
                                        $CKEditor = new CKEditor();

                                        // Path to the CKEditor directory.
                                        $CKEditor->basePath = 'ckeditor/';

                                        // The initial value to be displayed in the editor.
                                        // Create the first instance.
                                        $CKEditor->editor("tNewDesc", $tNewDesc);

				?>					</td>
				</tr>
				
				<tr >
					<td colspan="3"  style="text-align:center" align="right" >
				<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
				<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
				<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=newslist');return false;">
					
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
	if(document.frmadd.vNewTitle.value == "")
	{
		alert("Please Enter News Title.");
		document.frmadd.vNewTitle.focus();
		return false;
	}
	if(document.frmadd.vNewDate.value == "")
	{
		alert("Please Select News.");
		document.frmadd.vNewDate.focus();
		return false;
	}
}
</script>	
