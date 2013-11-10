<?
if(isset($_REQUEST[Id]) && $_REQUEST[Id]!='')
	$Id=$_REQUEST[Id];
else
	$Id=0;?>
<table width="20%"  border="0" cellspacing="0" cellpadding="0" align="left">
<tr><Td>&nbsp;</td></tr>
<tr>
	<td width="100%">
		<table width="100%" border="0" cellpadding="0">
		<tr>
		<?
			for($j=0, $tottab= count($header_sub_tab); $j< $tottab;$j++){
				if(($header_sub_tab[$j]['Id']-1)==$Id){
					echo '<TD valign=top>';
					echo createTopTapActive($header_sub_tab[$j]['Val']);
					echo '</TD>';
				}else{
					echo '<TD valign=top>';
					createTopTapInActive($header_sub_tab[$j]['Val'],$header_sub_tab[$j]['Href']);
					echo '</TD>';
				}
		echo '<td align="right" width="65%" class="largetabheader"></td>';
		}?>
		</tr>
		</table>
	</td>
</tr>
</table>
