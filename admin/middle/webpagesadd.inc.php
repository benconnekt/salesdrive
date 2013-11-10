<?
$mode=$_REQUEST[mode];
$iWebPageId=$_REQUEST[iWebPageId];
$catid=$_REQUEST[catid];
$readonly="";
if($mode == "Update")
{
	$sql="select * from webpages where iWebPageId='".$iWebPageId."'";
 	$db_sql=$obj->select($sql);

	$iWebPageId=$db_sql[0]["iWebPageId"];
	$vWebPageName=$db_sql[0]["vWebPageName"];
	$tWebPageDesc=$db_sql[0]["tWebPageDesc"];
	$iCateoryId=$db_sql[0]["iCateoryId"];
        $isubCateoryId=$db_sql[0]["isubCateoryId"];
	$vWebImage=$db_sql[0]["vWebImage"];
	$TOP_HEADER='Edit Pages';
	
}
else
{
   $mode="Add";
   $TOP_HEADER='Add Pages';
}
	
?>
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        plugins : "emotions,spellchecker,advhr,insertdatetime,preview", 
                
        // Theme options - button# indicated the row# only
        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect,fontsizeselect,formatselect",
        theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,|,code,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "insertdate,inserttime,|,spellchecker,advhr,,removeformat,|,sub,sup,|,charmap,emotions",      
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true
});
</script>
<form name="frmadd" method="post" action="webpagesadd_a.php" enctype="multipart/form-data"> 
<input type="hidden" name="mode" value="<?=$mode;?>">
<input type="hidden" name="iWebPageId" value=<?=$iWebPageId;?>>


<table width="97%" border="0" align="center" cellpadding="2" cellspacing="2">
<tr>
	<td valign="top" class="backa"><? echo DisplayTopInListAdd('','Back to Pages Listing','index.php?file=webpageslist');?></td>	  
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
				  <td width="11%" class="formtext">Category<span class="errormsg">*</span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
					<select name="iCateoryId" id="mymenu" onChange='SelectSubCat();'>
					<option value="" selected="selected">Select Category</option>
					<option <?=($iCateoryId == '1')?"selected":""?>   value="1">Home</option>
					<option  <?=($iCateoryId == '2')?"selected":""?>  value="2">The Company</option>
                                        <option <?=($iCateoryId == '3')?"selected":""?>   value="3">Services</option>
					<option  <?=($iCateoryId == '5')?"selected":""?>  value="5">Our Promise</option>
					<option  <?=($iCateoryId == '6')?"selected":""?>  value="6">Your Investment</option>
					<option  <?=($iCateoryId == '7')?"selected":""?>  value="7">Case History</option>
                                        <option  <?=($iCateoryId == '8')?"selected":""?>  value="8">Testimonials</option>
					<option  <?=($iCateoryId == '9')?"selected":""?>  value="9">Top Ten Tips</option>
                                        <option  <?=($iCateoryId == '10')?"selected":""?>  value="10">Let Us Help You</option>
                                        <option  <?=($iCateoryId == '11')?"selected":""?>  value="11">Client Case Study</option>
                                        <option  <?=($iCateoryId == '12')?"selected":""?>  value="12">Privacy Policy</option>
                                        <option  <?=($iCateoryId == '13')?"selected":""?>  value="13">Disclaimer</option>
					</select>
                                            
                                        <select id='isubCateoryId' name='isubCateoryId' style="visibility: <?=($mode=="Update")?"visible":"hidden";?>">
                                            <option value=''>Select Sub Category</option>
                                        </select>
                                            
                                           
                                            <script type="text/javascript">
                                                /*var mod = "<?php //echo $mode;?>";
                                                var num = "<?php //echo $catid; ?>"
                                                var selectmenu=document.getElementById("mymenu")
                                                selectmenu.onchange=function(){ //run some code when "onchange" event fires
                                                 var chosenoption=this.options[this.selectedIndex] //this refers to "selectmenu"
                                                 if (chosenoption.value =="2"){
                                                     //alert(chosenoption.value);
                                                     document.getElementById("mymenu2").style.visibility = "visible";
                                                     document.writeln('hello world!');
                                                     
                                                  //window.open(chosenoption.value, "", "") //open target site (based on option's value attr) in new window
                                                 }
                                                 else{
                                                     document.getElementById("mymenu2").style.visibility = "hidden";
                                                     
                                                 }
                                                }*/
                                        function SelectSubCat()
                                            {
                                            removeAllOptions(frmadd.isubCateoryId);

                                            if(frmadd.iCateoryId.value == '2'){
                                                addOption(frmadd.isubCateoryId,"10", "About");
                                                addOption(frmadd.isubCateoryId,"11", "Key Members");
                                                }

                                            if(frmadd.iCateoryId.value == '3'){
                                                addOption(frmadd.isubCateoryId,"12", "Business Development");
                                                addOption(frmadd.isubCateoryId,"13", "Data Services");
                                                addOption(frmadd.isubCateoryId,"14", "Tailor-made Sales Strategies");
                                                addOption(frmadd.isubCateoryId,"15", "Appointment Setting");
                                                addOption(frmadd.isubCateoryId,"16", "Web Design");
                                                addOption(frmadd.isubCateoryId,"17", "Seminars & Events Booking");
                                                }
                                                //if(frmadd.iCateoryId.value == '13'){
                                                    //document.getElementById("vWebPageName").style.visibility = "hidden"
                                                //}
                                            } // end function SelectSubCat

                                        function removeAllOptions(selectbox)
                                            {
                                            var i;
                                            for(i=selectbox.options.length-1;i>=0;i--)
                                                {
                                                selectbox.remove(i);
                                                document.getElementById("isubCateoryId").style.visibility = "hidden";
                                                }
                                            }

                                        function addOption(selectbox, value, text )
                                            {
                                            var optn = document.createElement("OPTION");
                                            optn.text = text;
                                            optn.value = value;
                                            selectbox.options.add(optn);
                                            document.getElementById("isubCateoryId").style.visibility = "visible";
                                            }

                                             </script>
					</td>
				</tr>
				<tr>
				  <td width="11%" class="formtext">Title<span class="errormsg">*</span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%">
						<input type="text" name="vWebPageName" size="25" value="<?=$vWebPageName?>" maxlength="70" id="vWebPageName">		</td>
				</tr>
				<tr>
				  <td width="11%" class="formtext">Banner Image<span class="errormsg"></span></td>
					<td width="2%" style="text-align:center">:</td>
					<td width="87%" class="formtext">
						<input type="file" name="vWebImage" size="25" value=""> <? if($mode == "Update"){ ?> <img src="banner/<?=$vWebImage;?>" height="25" /> <? }?> &nbsp;Size(100 X 110)	</td>
				</tr>
				
				<tr>
				  <td valign="top"  class="formtext" >Description <span class="errormsg">*</span></td>
					<td valign="top" style="text-align:center">:</td>
                                        <td>
                                            <textarea name="tWebPageDesc" cols="105" rows="25">
                                                <?=stripslashes($tWebPageDesc)?></textarea>
                                        </td>
				</tr>			
				<tr >
					<td colspan="3"  style="text-align:center" align="right" >
				<input type="Image" style="cursor:hand;border:0" src="<?=($mode=="Update")?"images/btn-modify.gif":"images/add.gif";?>" onclick="return checkvalid1();">
				<input type="Image" style="cursor:hand;border:0" src="images/btn-reset.gif" onclick="reset();return false;">
				<input type=image style="cursor:hand;border:0"  src="images/btn-cancle.gif" onclick="RedirectURL('index.php?file=webpageslist');return false;">
					
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
