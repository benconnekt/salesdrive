<?
include("../function/gen_db.inc.php");
include("../function/gen_function.inc.php");
?>
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
<TABLE class=menubar cellSpacing=0 cellPadding=0 width="100%" border=0>
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
    <TD align=right valign="middle" class=menubackgr>
		<A href="logout.php" class="wmatterbold"> Logout </A><STRONG>&nbsp;&nbsp; <?=$_SESSION[sess_eUsrType]?></STRONG>	</TD>
</TR>
</TABLE>
<SCRIPT language=JavaScript type=text/JavaScript>
function log_out(){
	window.location='logout.php';
}
</SCRIPT>
