<? include("ckeditor/ckeditor.php")  ;
$mode=$_REQUEST[mode];
$faqid=$_REQUEST[faqid];
$readonly="";
if($mode == "Update")
{
	$sql="select * from faq where faqid='".$faqid."'";
 	$db_sql=$obj->select($sql);

	$faqid=$db_sql[0]["faqid"];
	$question=$db_sql[0]["question"];
	$answer=$db_sql[0]["answer"];
	
	$TOP_HEADER='Edit FAQ';
	
}
else
{
   $mode="Add";
   $TOP_HEADER='Add FAQ';
}
	
?>
<LINK rel="stylesheet" type="text/css" href="js/jscalendar/calendar-gray.css">
<script language="JavaScript1.2" src="js/jscalendar/calendar2.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar-en.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script>

<form name="frmadd" method="post" action="faq_a.php" enctype="multipart/form-data"> 
<input type="hidden" name="mode" value="<?=$mode;?>">
<input type="hidden" name="faqid" value=<?=$faqid;?>>


<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to FAQ Listing','index.php?file=faqlist');?></td>	  
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
				  <td width="11%" class="formtext">Question<span class="errormsg">*</span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input type="text" name="question" size="25" value="<?=$question?>" maxlength="100">		</td>
				</tr>
					<tr>
				  <td valign="top"  class="formtext" >Answer <span class="errormsg">*</span></td>
					<td valign="top" style="text-align:center">:</td>
					<td>
					   <?php
                                                                        // Create a class instance.
                                        $CKEditor = new CKEditor();

                                        // Path to the CKEditor directory.
                                        $CKEditor->basePath = 'ckeditor/';

                                        // The initial value to be displayed in the editor.
                                        // Create the first instance.
                                        $CKEditor->editor("answer", $answer);

				?>					</td>
				</tr>
				
				<tr >
					<td colspan="3"  style="text-align:center" align="right" >
				<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
				<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
				<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=faqlist');return false;">
					
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
