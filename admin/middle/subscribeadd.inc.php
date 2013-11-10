<? $readonly="";
$TOP_HEADER='Send Mail To All Customers';
$sql="select * from subscribe ";
$db_sql=$obj->select($sql);

?>
<form name="frmadd" method="post" action="subscribe_a.php"> 
<input type="hidden" name="mode" value="mail">
<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Subscribe Listing','index.php?file=subscribelist');?></td>	  
</tr>
<tr>
	<td>
		<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
   
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="middle"><h2><img src="images/category_icon.jpeg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;<?=$TOP_HEADER?></h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder">
		  	<table  width="100%" border="0" align="center" cellspacing="1" cellpadding="1">
 				<tr >
				
                	<td Class="errormsg" colspan="4" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                </tr>
				<tr>
					<td width="0%"></td>
					<td width="11%" valign="top" class="formtext"><strong>To</strong><span class="errormsg"></span></td>
					<td width="1%" valign="top" style="text-align:center">:</td>
					<td width="88%">
					<textarea name="allEmail" cols="90">
					<?	for($i=0;$i<count($db_sql);$i++)
						{
							echo $db_sql[$i]['vSubscriEmail'].",";
						} ?>
					</textarea>
					</td>
				</tr>
				<tr>
					<td width="0%"></td>
					<td width="11%" class="formtext"><strong>Subject</strong><span class="errormsg"> *</span></td>
					<td width="1%" style="text-align:center">:</td>
					<td width="88%">
						<input type="text" name="Subject" size="25" value="" > 
					</td>
				</tr>
				<tr>
					<td width="0%"></td>
					<td width="11%" class="formtext" valign="top"><strong>Massage</strong><span class="errormsg"> *</span></td>
					<td width="1%" style="text-align:center" valign="top">:</td>
					<td width="88%">
						<textarea name="Massage" id="Massage" cols="90"></textarea>
					</td>
				</tr>
				<tr>
					<td width="0%"></td>
					<td width="11%" class="formtext"><strong>From</strong><span class="errormsg"> *</span></td>
					<td width="1%" style="text-align:center">:</td>
					<td width="88%">
						<input type="text" name="From" size="25" > 
					</td>
				</tr>
				
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:center">
						<div align="left" style="font-size:12px;" ><span class="errormsg">*</span> Required Fields</div>
							<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
						<!--<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">-->
						<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=subscribelist');return false;">
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
	if(document.frmadd.Subject.value=="")
	{
		alert("Please Enter Subject");
		document.frmadd.Subject.focus();
		return false;
	}	
	if(document.frmadd.Massage.value=="")
	{
		alert("Please Enter Massage");
		document.frmadd.Massage.focus();
		return false;
	}	
	if(document.frmadd.From.value=="")
	{
		alert("Please Enter From");
		document.frmadd.From.focus();
		return false;
	}	
}
</script>	
