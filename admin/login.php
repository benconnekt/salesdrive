<?
require_once("include.php");
if(isset($_SESSION['sess_iAdminId']) && !empty($_SESSION['sess_iAdminId']))
{
	header("location: index.php");
	exit;
}
?>
<HTML>
<HEAD>
<? include_once("header.php");?>
</HEAD>
<BODY>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgColor=#ffffff>
<tr>
	<td>
		<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td height="71" style="border-bottom:1px solid maroon">
				<? //include("top/top.inc"); ?>
			</td>
		</tr>
	    </table> -->
		<table width="100%" border="0" cellspacing="0" cellpadding="0" height="520">
	    <tr>
 	    	<td valign="top">
				<? include("middle/login.inc.php"); ?>
			</td>
		</tr>
		</table>
	  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
	    	<td background="images/bg-bottom.jpg" height="24">
				</td>
        </tr>
        </table>	  	      
    </td>
</tr>
</table>
</BODY>
</HTML>