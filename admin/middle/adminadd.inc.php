<?
$mode=$_REQUEST[mode];
$iAdminId=$_REQUEST[iAdminId];
$readonly="";
if($mode == "Update")
{
	$sql="select * from admin where iAdminId='".$iAdminId."'";
 	$db_sql=$obj->select($sql);

	$iAdminId=$db_sql[0]["iAdminId"];
	$vFirstName= $db_sql[0]["vFirstName"]; 
	$vLastName= $db_sql[0]["vLastName"]; 
	$vEmail= $db_sql[0]["vEmail"]; 
	$vUserName= $db_sql[0]["vUserName"];
	$vPassword= $db_sql[0]["vPassword"];
	$ConfirmPass = $db_sql[0]["ConfirmPass"];
	$eStatus= $db_sql[0]["eStatus"];

	if($vUserName=='Admin')$readonly="readonly";
	 $TOP_HEADER='Update Admin';
}
else
{
   $mode="Add";
   $TOP_HEADER='Add Admin';
}


?>
<script language="JavaScript1.2" src="js/emailvalid.js"></script>
<script language="JavaScript1.2" src="js/general.js"></script>
<script language="JavaScript1.2" src="js/jadminadd.js"></script>

<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Admin Listing','index.php?file=adminlist');?></td>	  
</tr>
<tr>
	<td>
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
   
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="middle"><h2><img src="images/icon01.jpg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;<?=$TOP_HEADER?></h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder">
		  	<table  width="100%" border="0" align="center" cellspacing="1" cellpadding="1">
                <form name="frmadd" method="post" action="adminadd_a.php"> 
				<input type="hidden" name="mode" value="<?=$mode;?>">
				<input type="hidden" name="iAdminId" value=<?=$iAdminId;?>>
				<tr >
				
                	<td Class="errormsg" colspan="4" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                </tr>
				<tr>
					<td width="25%"></td>
					<td class="formtext">First Name<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="vFirstName" size="25" value="<?=$vFirstName;?>" maxlength="50"> 
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="formtext">Last Name<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="vLastName" size="25" value="<?=$vLastName;?>" maxlength="50">
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="formtext">E-mail<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="vEmail" size="40" value="<?=$vEmail;?>" maxlength="50">
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="formtext">User Name<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td align="left">
						<input type="text" size="25" <?=$readonly?> name="vUserName" value="<?=$vUserName;?>" maxlength="50">
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="formtext">Password<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="password" name="vPassword" size="25" value="<?=$vPassword;?>" maxlength="50">
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="formtext">Confirm Password<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="password" name="ConfirmPass" size="25" value="<?=$ConfirmPass;?>" maxlength="50">
					</td>
				</tr>								
				<tr>
					<td></td>
					<td class="formtext">Status</td>
					<td style="text-align:center">:</td>
					<td>
          				<select name="eStatus">
            				<option <?=($eStatus=="Active")? "selected":""?> value="Active">Active</option>
            				<option <?=($eStatus=="Inactive")? "selected":""?> value="Inactive">Inactive</option>
          				</select>					
		  			</td>
				</tr>
				<tr>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:center">
						<div align="left" style="font-size:12px;" ><span class="errormsg">*</span> Required Fields</div>
							<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
						<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
						<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=adminlist');return false;">
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
	if(document.frmadd.vFirstName.value=="")
		{
			alert("Please Enter Name");
			document.frmadd.vFirstName.focus();
			return false;
		}	
	if(document.frmadd.vLastName.value=="")
		{
			alert("Please Enter Name");
			document.frmadd.vLastName.focus();
			return false;
		}		
	 if(Trim(document.frmadd.vEmail.value)=="")
		{
			alert("Please Enter Email");
			document.frmadd.vEmail.focus();
			return false;
		}
	 if(Trim(document.frmadd.vEmail.value)!="")
		{
			var msg = isValidEmail(document.frmadd.vEmail.value);
			if(msg)
			{			
			alert(msg);
			document.frmadd.vEmail.focus();
			return false;
			}
		}
				
	
	 if(Trim(document.frmadd.vUserName.value)=="")
		{
			alert("Please Enter User Name");
			document.frmadd.vUserName.focus();
			return false;		
		}
			

if(Trim(document.frmadd.vPassword.value)=="")
		{
			alert("Please Enter Password ");
			document.frmadd.vPassword.focus();
			return false;
		}
				
	if(document.frmadd.vPassword.value.length < 5)
		{
			alert("Password should not be less than 5 characters");
			document.frmadd.vPassword.focus();
			return false;
		}	   
	
	if(Trim(document.frmadd.ConfirmPass.value)!=Trim(document.frmadd.vPassword.value))
		{
			alert("Please Confirm your Password ");
			document.frmadd.ConfirmPass.focus();
			return false;
		}
		
	//document.frmadd.mode.value="Add";		
}
</script>	
