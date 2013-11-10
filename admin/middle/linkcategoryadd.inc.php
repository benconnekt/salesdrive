<? include("ckeditor/ckeditor.php");
$mode=$_REQUEST[mode];
$catid=$_REQUEST[catid];
$readonly="";
if($mode == "Update")
{
	$sql="select * from linkcategory where catid='".$catid."'";
 	$db_sql=$obj->select($sql);

	$catid=$db_sql[0]["catid"];
	$catname = $db_sql[0]["catname"];
	$TOP_HEADER='Edit Category';
	
}
else
{
   $mode="Add";
   $TOP_HEADER='Add Category';
}
	
?>
<form name="frmadd" method="post" action="linkcategoryadd_a.php" enctype="multipart/form-data"> 
<input type="hidden" name="mode" value="<?=$mode;?>">
<input type="hidden" name="catid" value=<?=$catid;?>>


<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Category Listing','index.php?file=linkcategorylist');?></td>	  
</tr>
<tr>
	<td>
		<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
   
    <tr>
      <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="middle"><h2><img src="images/package_icon.jpeg" width="37" height="34" align="absmiddle" />&nbsp;&nbsp;<?=$TOP_HEADER?></h2></td>
          <td width="7" align="left" valign="middle"><img src="images/detail_title_right.jpg" width="7" height="36" align="absmiddle" /></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top" class="rlborder">
				<table  width="100%" border="0" align="center" cellspacing="1" cellpadding="1">
 				<tr >
                	<td Class="errormsg" colspan="2" style="text-align:center">
						<span class="errormsg"><? if(isset($var_msg))print $var_msg;?></span>
					</td>
                </tr>
                <tr>
				  <td width="11%" class="formtext">Category Name<span class="errormsg"></span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%" class="formtext">
						<input type="text" name="catname" size="30" value="<?=$catname ?>">	
                                        </td>
				</tr>
				
				
				
						
				<tr >
					<td colspan="3"  style="text-align:center" align="right" >
				<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
				<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
				<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=linkcategorylist');return false;">
					
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
    if(document.frmadd.iCateoryId.value == "")
	{
		alert("Please Select Category.");
		document.frmadd.iCateoryId.focus();
		return false;
	}
	 if(document.frmadd.iCateoryId.value == "2" || document.frmadd.iCateoryId.value == "3" )
	{
		if(document.frmadd.iCateoryId.value == null ){
                alert("Please Select Sub Category.");
		document.frmadd.isubCateoryId.focus();
		return false;
                    }
	}
        if(document.frmadd.vWebPageName.value == "")
	{
            if (document.frmadd.iCateoryId.value == "12"){
                return true;
            }
		else {alert("Please Enter Page Title.");
		document.frmadd.vWebPageName.focus();
		return false;
                }
	}
	
       
}
</script>	
