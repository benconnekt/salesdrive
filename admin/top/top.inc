<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td align="left" rowspan="3" valign="middle"><img src="images/logoadmin.jpg" border="0" /></td></tr>
<tr><td valign="top" align="right">:: <strong>Site control Panel ::</strong>&nbsp;&nbsp;<br>
	<? if($_SESSION[sess_iAdminId] != ""){?>
		<?echo "Logged User : ".$_SESSION[sess_vUserName];?>&nbsp;&nbsp;
		[Administrator]&nbsp;&nbsp;
	<? }?>
	</td>
</tr> 
<tr><td valign="bottom" style="padding-bottom: 7px" align="right"><font color="#000000"><b><? echo date('F j , Y');?></b></font>&nbsp;&nbsp;</td></tr></table>-->
<? if($_SESSION[sess_iAdminId] != ""){?>
<? include ("top_header.php")?>
<? }?>
