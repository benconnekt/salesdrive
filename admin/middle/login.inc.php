<script language="JavaScript1.2" src="js/jlogin.js"></script>

<table width="437" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" class="tableborder"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><h1>Admin Panel</h1></td>
      </tr>	  
      <tr>
        <td height="231" align="center" valign="middle">
		<form name="form1" action="login_a.php" method="post" onSubmit="return login_oC(document.form1)">
		<table width="63%" border="0" cellspacing="2" cellpadding="2">
		<tr><td colspan="3">
			<center><font class="errormsg"><? ECHO $_GET[err_msg];?></font></center><br>
			<p class="textblack">Enter User Name and Password fields respectively.</p>
		</td></tr>
          <tr>
            <td width="36%" height="25" align="right" class="textblack">Username :</td>
            <td width="64%" height="25"><input name="login_name" type="text" class="firsttextbox" id="login_name" size="25" />            </td>
          </tr>
          <tr>
            <td height="25" align="right" class="textblack">Password :</td>
            <td height="25"><input name="passwd" type="password" class="firsttextbox" id="passwd" size="25" /></td>
          </tr>
          <tr>
            <td height="25" align="right" class="textblack">&nbsp;</td>
            <td height="40" align="right" valign="bottom"><input type=image src="images/button_login.jpg" style="border:0"></td>
          </tr>
        </table>
		</form>
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="bottomtext">All rights reserved<br /></td>
  </tr>
  <tr>
    <td align="right" valign="middle" class="bottomtext">Designed &amp; Powered by <a href="http://www.connektor.co.uk" target="_blank" class="bottomtext">Connektor</a></td>
  </tr>
</table>



<!--<table width="437" border="0" cellpadding="0" cellspacing="0" rules=group align="center" style="background-color:#f8f8f8; border:1px solid #ffcc44;">
<tr><td height="30" class="bg-login" align="left" nowrap><font color="black" size="4">Admin Panel</font></td></tr>
		<tr><td class="bmatter" id="loginForm">
<center><font class="errormsg"><? ECHO $_GET[err_msg];?></font></center><br>
		<p align="center">Enter User Name and Password fields respectively.</p>	
			<form name="form1" action="login_a.php" method="post" onSubmit="return login_oC(document.form1)">
		<table  border="0" cellpadding="0" cellspacing="0" width="80%" align="center">
			<tr>
				<td class="bmatter1" height="35"><label for="login_name">Login</label></td>
				<td><input type="text" name="login_name" id="login_name" value="" size="25" maxlength="255"></td>
			</tr>
			<tr>
				<td class="bmatter1"><label for="passwd">Password</label></td>
				<td><input type="password" name="passwd" id="passwd" size="25" maxlength="14" value=""></td>
			</tr>
		</table><br>
		<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr>
			<td width="113" height="25" class="main" id="get_password">&nbsp;
			</td>
		<td aglin=><input type=image src="images/btn-login.gif" style="border:0"></td>
		</tr></table>
			</form>
	</td></tr>
</table> -->
