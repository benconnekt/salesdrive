<? include("ckeditor/ckeditor.php");
$mode=$_REQUEST[mode];
$id=$_REQUEST[id];
$reportid = $_REQUEST[reportid];

$readonly="";

    $sql="select * from users where id='".$id."'";
 	$db_sql=$obj->select($sql);
        $id=$db_sql[0]["id"];
	$cusname= $db_sql[0]["full_name"]; 
        
if ($mode=="Update"){
        $upsql="select * from report where reportid ='".$reportid."'";
 	$updb_sql=$obj->select($upsql);
        
        $id=$updb_sql[0]["customerid"];
	$content= $updb_sql[0]["content"];
        $source= $updb_sql[0]["source"];
        $date= $updb_sql[0]["date"];
        $status=$updb_sql[0]["status"];
        $actionRequired = $updb_sql[0]["actionRequired"];
        $company = $updb_sql[0]["company"];
        $contact = $updb_sql[0]["contact"];
        $tel = $updb_sql[0]["tel"];
        
        $TOP_HEADER='Update Report';
}
else
{
   $mode="Add";
   $TOP_HEADER='Add Report';
}
 

?>
<script language="JavaScript1.2" src="js/emailvalid.js"></script>
<script language="JavaScript1.2" src="js/general.js"></script>
<script language="JavaScript1.2" src="js/jadminadd.js"></script>
<LINK rel="stylesheet" type="text/css" href="js/jscalendar/calendar-gray.css">
<script language="JavaScript1.2" src="js/jscalendar/calendar2.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar-en.js"></script>
<script type="text/javascript" src="js/jscalendar/calendar-setup.js"></script>
<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Cutomer Report Listing',"index.php?file=reportlist&id=".$id." ");?></td>	  
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
                <form name="frmadd" method="post" action="reportadd_a.php"> 
				<input type="hidden" name="mode" value="<?=$mode;?>">
				<input type="hidden" name="id" value=<?=$id;?>>
                                <input type="hidden" name="reportid" value=<?=$reportid;?>>
				<tr >
				
                	<td Class="errormsg" colspan="4" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                               </tr>
                                <tr>
					<td width="25%"></td>
                                        
					<td class="formtext">Name<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="cusname" size="25" value="<?=$cusname;?>" maxlength="50" disabled="disabled"> 
					</td>
				</tr>
                                 <tr>
					<td width="25%"></td>
                                        
					<td class="formtext">Source<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="source" size="25" value="<?=$source;?>" maxlength="50"> 
					</td>
				</tr>
                                <tr>
					<td width="25%"></td>
                                        
					<td class="formtext">Company<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="company" size="25" value="<?=$company;?>" maxlength="50"> 
					</td>
				</tr>
                                  <tr>
					<td width="25%"></td>
                                        
					<td class="formtext">Contact<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="contact" size="25" value="<?=$contact;?>" maxlength="50"> 
					</td>
				</tr>
                                <tr>
					<td width="25%"></td>
                                        
					<td class="formtext">Tel<span class="errormsg"> *</span></td>
					<td style="text-align:center">:</td>
					<td >
						<input type="text" name="tel" size="25" value="<?=$tel;?>" maxlength="50"> 
					</td>
				</tr>
                                
                        
				  <tr>
					<td></td>
					<td class="formtext">Report</td>
					<td style="text-align:center">:</td>
					<td>
					    <?php
                                                                        // Create a class instance.
                                        $CKEditor = new CKEditor();

                                        // Path to the CKEditor directory.
                                        $CKEditor->basePath = 'ckeditor/';

                                        // The initial value to be displayed in the editor.
                                        // Create the first instance.
                                        $CKEditor->editor("content", $content);

				?>					</td>
				</tr>
                                  <tr>
					<td></td>
					<td class="formtext">Action Required</td>
					<td style="text-align:center">:</td>
					<td>
					    <?php
                                                                        // Create a class instance.
                                        $CKEditor = new CKEditor();

                                        // Path to the CKEditor directory.
                                        $CKEditor->basePath = 'ckeditor/';

                                        // The initial value to be displayed in the editor.
                                        // Create the first instance.
                                        $CKEditor->editor("actionRequired", $actionRequired);

				?>					</td>
				</tr>
                         
                                   <tr>
                                     <td></td>
				      <td class="formtext">Date</td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input readonly="readonly" size="10" type="text" name="date" id="date" value="<?=$date?>" />&nbsp;<img src="images/cal.gif" name="date_dtpa" id="date_dtpa" border="0" align="bottom" />
					<script type="text/javascript">
                                            Calendar.setup({
                                            inputField     :    "date",      // id of the input field
                                            ifFormat       :    "%Y-%m-%d", //"%Y-%m-%d %H:%M:%S",       // format of the input field
                                            showsTime      :    false,            // will display a time selector
                                            button         :    "date_dtpa",   // trigger for the calendar (button ID)
                                            singleClick    :    false,           // double-click mode
                                            step           :    1,                // show all years in drop-down boxes (instead of every other year as default)
                                            align          :    "right"           // alignment (defaults to "Bl")
                                         });

                                        </script>
					</td>
				</tr>
				<tr>
					<td></td>
					<td class="formtext">Status</td>
					<td style="text-align:center">:</td>
					<td>
          				<select name="status">
            				<option <?=($status=="Active")? "selected":""?> value="Active">Active</option>
            				<option <?=($status=="Inactive")? "selected":""?> value="Inactive">Inactive</option>
          				</select>					
		  			</td>
				</tr>
                               <tr>
					<td colspan="4"></td>
				</tr>
                              
				<tr>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align:center">
						<div align="left" style="font-size:12px;" ><span class="errormsg">*</span> Required Fields</div>
							<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
						<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
						<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=reportlist&id=<?echo $id?>');return false;">
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
			document.frmadd.cusname.focus();
			return false;
		}	
		
				
			


		
	//document.frmadd.mode.value="Add";		
}
</script>	
