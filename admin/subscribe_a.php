<?
include_once("noentry.php");

$mode = $_POST['mode'];
$iSubscriID = $_POST['iSubscriID'];

if($mode == 'Delete')
{
	$cnt = 0;
	for($i=0; $i<=$_POST['no']; $i++)
	{
		if($_POST['ch'.$i] != '')
		{
			$sql = "DELETE from subscribe WHERE iSubscriID = '".$_POST['ch'.$i]."' ";
			$del = $obj->delete($sql);
			
			$cnt = $cnt+1;			
		}
	}
	if($cnt > 0)
	{
		$msg = $cnt .' Records Deleted Successfully ';
		header('location: index.php?file=subscribelist&var_msg='.$msg);	
		exit;
	}
}
if($mode == 'mail')
{
$to = $_POST['allEmail'];
$subject = $_POST['Subject'];
$message = '
<html>	
	<body>		  
		<table width="98%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td colspan="7">&nbsp;</td>
			</tr>
			<tr>
				<td align="center" valign="middle"><h2>'.$_POST['Subject'].'</h2></td>
				
			</tr>
			<tr>
				<td align="left" valign="middle">'.$_POST['Massage'].'</td>
			</tr>
		</table>
	</body>
</html>
	';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$_POST['From'] . "\r\n";
	mail($to, $subject, $message, $headers);	
	?>
	<script type="text/javascript">alert("We will contact you soon."); window.location='index.php?file=subscribelist';</script>
<? 
}
?>