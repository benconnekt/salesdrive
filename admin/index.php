<?
	include_once("noentry.php");
	include_once("header.php");
?>
<HTML>
<HEAD>
<?
if(session_is_registered(sess_iAdminId) && $_GET['file'] == '')
{
	$include_script = "middle/sitemap.inc.php";
}
else if($_GET['file'] != '')
{
 	$include_script = "middle/".$_GET['file'].".inc.php";
}
else
{
	$include_script = "middle/login.inc.php";
}
?>
</HEAD>
<style>
    boby{
        color: black;
        margin-left: 0;
            margin-top:0
    }
</style>
<BODY onload='SelectSubCat();'>
<script language="JavaScript1.2" src="js/validate.js"></script>
<script language="JavaScript1.2" src="js/general.js"></script>
<script language="JavaScript1.2" src="js/emailvalid.js"></script>
<!--<script>
var admin_url = '<?=$admin_url?>';
var site_url = '<?=$site_url?>';
</script>
-->
<div class="back">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
		<td height="92" align="left" valign="bottom" class="categorylogo"><img src="images/category_logo.jpg" width="465" height="74" /></td>
		<td width="100" align="left" valign="top" class="logout"><a href="logout.php"><img src="images/logout.jpg" width="94" height="26" border="0" /></a></td>
   </tr>    
</table>

<? include_once("top/top.inc");?>

<? include($include_script);?>

</div>
<div class="bottomback">
<!--<table width="100%" align="center" cellpadding="0" cellspacing="0">
  <tr><td height="34" valign="middle" class="bottomlink"><a href="#">Home</a>  |  <a href="#">Employer Advertiser</a>  |  <a href="#">Jobseeker</a>  |  <a href="#">Job advertisement</a>  |  <a href="#">Job application</a>  |  <a href="#">Employer subscription</a>  |  <a href="#">Blog</a>  |  <a href="#">Category</a>  |  <a href="#">Logout</a></td></tr>
  <tr>
    <td valign="top" class="bottomtext">All rights reserved </td>
  </tr>
  <tr>
    <td height="20" valign="top" class="bottomtext">Designed &amp; Powered by <a href="http://www.rutujacreation.com" target="_blank" class="bottomtext">Rutuja Creation</a></td>
  </tr>
</table>-->
</div>
</BODY>
</HTML>
<? $obj->close();?>