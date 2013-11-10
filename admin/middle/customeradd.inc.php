<?
$mode=$_REQUEST[mode];
$id=$_REQUEST[id];
$readonly="";
if($mode == "Update")
{
	$sql="select * from users where id='".$id."'";
 	$db_sql=$obj->select($sql);

	$id=$db_sql[0]["id"];
	$fname= $db_sql[0]["full_name"]; 
	$email= $db_sql[0]["user_email"]; 
        $company=$db_sql[0]["company"]; 
	$phone=$db_sql[0]["tel"];
        $address = $db_sql[0]["address"];
        $postcode = $db_sql[0]["postcode"];
        $country = $db_sql[0]["country"];;
	$status= $db_sql[0]["approved"];
        $user_name = $db_sql[0]["user_name"];

	//if($vUserName=='Admin')$readonly="readonly";
	 $TOP_HEADER='Update Customer';
         
}
else
{
   $mode="Add";
   $TOP_HEADER='Add Customer';
}


?>
<script language="JavaScript1.2" src="js/emailvalid.js"></script>
<script language="JavaScript1.2" src="js/general.js"></script>
<script language="JavaScript1.2" src="js/jadminadd.js"></script>
<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Customer Listing','index.php?file=customerlist');?></td>	  
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
                <form name="frmadd" method="post" action="customeradd_a.php"> 
				<input type="hidden" name="mode" value="<?=$mode;?>">
				<input type="hidden" name="id" value=<?=$id;?>>
				<tr >
				
                	<td Class="errormsg" colspan="4" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                </tr>
				<tr>
					<td></td>
					<td class="formtext">Name<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="fname" size="25" value="<?=$fname;?>" maxlength="50"> 
					</td>
				</tr>
				
                                <tr>
					<td></td>
					<td class="formtext">Company<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="company" size="40" value="<?=$company;?>" maxlength="50">
					</td>
				</tr>
                                <tr>
					<td></td>
					<td class="formtext">Address<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="address" size="40" value="<?=$address;?>" maxlength="50">
					</td>
				</tr>
                                <tr>
					<td></td>
					<td class="formtext">Post Code<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="postcode" size="40" value="<?=$postcode;?>" maxlength="50">
					</td>
				</tr>
                                <tr>
					<td></td>
					<td class="formtext">Country<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="email" size="40" value="<?=$country;?>" maxlength="50">
					</td>
				</tr>
                                  <tr>
					<td></td>
					<td class="formtext">Phone<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="tel" size="40" value="<?=$phone;?>" maxlength="50">
					</td>
				</tr>
                                  <tr>
					<td></td>
					<td colspan="2"><strong>Login Details</strong></td>
				</tr>
                                 <tr>
					<td></td>
					<td class="formtext">Username<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="user_name" size="40" value="<?=$user_name;?>" maxlength="50">
					</td>
				</tr>
                                <tr>
					<td></td>
					<td class="formtext">E-mail<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
						<input type="text" name="email" size="40" value="<?=$email;?>" maxlength="50">
					</td>
				</tr>
                                <tr>
					<td></td>
					<td class="formtext">Quick Password<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td>
                                            <input name="pwd" type="password" minlength="5" maxlength="50" id="pwd"/>
					</td>
				</tr>
                              								
				<tr>
					<td></td>
					<td class="formtext">Status</td>
					<td style="text-align:center">:</td>
					<td>
          				<select name="status">
            				<option <?=($status=="1")? "selected":""?> value="1">Active</option>
            				<option <?=($status=="0")? "selected":""?> value="0">Inactive</option>
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
						<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=customerlist');return false;">
                                             
					</td>
				</tr>
                                <tr>
                                    <td colspan="4" style="text-align:center">
                                        <a href="index.php?file=reportlist&id=<?echo $id?>"><? if ($mode=="Update")echo "Customer Report" ?> </a>
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
	if(document.frmadd.fname.value=="")
		{
			alert("Please Enter Name");
			document.frmadd.fname.focus();
			return false;
		}			
	 if(Trim(document.frmadd.email.value)=="")
		{
			alert("Please Enter Email");
			document.frmadd.email.focus();
			return false;
		}
	 if(Trim(document.frmadd.email.value)!="")
		{
			var msg = isValidEmail(document.frmadd.email.value);
			if(msg)
			{			
			alert(msg);
			document.frmadd.email.focus();
			return false;
			}
		}
				
			


		
	//document.frmadd.mode.value="Add";		
}
</script>	
