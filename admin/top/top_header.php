<LINK href="css/theme.css" type="text/css" rel=stylesheet>
<SCRIPT language=JavaScript src="js/JSCookMenu.js" type=text/javascript></SCRIPT>
<SCRIPT language=JavaScript src="js/theme.js" type=text/javascript></SCRIPT>
<SCRIPT language=JavaScript src="js/creditzjavascript.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>
function insertAtCursor(myField, myValue) 
{
	if(document.selection) 
	{	// IE support
		myField.focus();
		sel = document.selection.createRange();
		sel.text = myValue;
	}
	else if (myField.selectionStart || myField.selectionStart == '0') 
	{	// MOZILLA/NETSCAPE support
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		myField.value = myField.value.substring(0, startPos)
		+ myValue
		+ myField.value.substring(endPos, myField.value.length);
	}
	else
	{
		myField.value += myValue;
	}
}
</SCRIPT>
<?
$db_menu_rs = top_getTopMenuArray();
$totRec = count($db_menu_rs);
$menu=displayTopMenu('0',"");
$menu=substr($menu,1);

?>
<table  width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="13" align="left" valign="top"><img src="images/link_left.jpg" width="13" height="33" /></td>
      <td valign="middle" class="linkback">
	  <DIV id=myMenuID></DIV>
    	<SCRIPT language=JavaScript type=text/javascript>
		var menu = "<?=$menu?>";
		var myMenu = eval('['+ menu	+']');
		cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
		</SCRIPT>
	  <!--<a href="#">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Employer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Advertiser</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Jobseeker</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Job advertisement</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Job application</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Employer subscription</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Blog</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Category</a> --></td>
      <td width="13" align="left" valign="top"><img src="images/link_right.jpg" width="13" height="33" /></td>
    </tr>
  </table>
  
<?php /*?><TABLE class=menubar cellSpacing=0 cellPadding=0 width="100%" border=0>
<TR>
	<TD class=menubackgr valign="top">
		<DIV id=myMenuID></DIV>
    	<SCRIPT language=JavaScript type=text/javascript>
		var menu = "<?=$menu?>";
		var myMenu = eval('['+ menu	+']');
		cmDraw ('myMenuID', myMenu, 'hbr', cmThemeOffice, 'ThemeOffice');
		</SCRIPT>
   	</TD>
    <TD class=menubackgr align=right></TD>
    <!--<TD align=right valign="middle" class=menubackgr><A href="logout.php" class="wmatterbold"> Logout </A><STRONG>&nbsp;&nbsp; <?=$_SESSION[sess_eUsrType]?></STRONG>	</TD> -->
</TR>
</TABLE><?php */?>
<SCRIPT language=JavaScript type=text/JavaScript>
function log_out(){
	window.location='logout.php';
}
</SCRIPT>
