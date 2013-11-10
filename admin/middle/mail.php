<?php
$mode = $_POST['mode'];
include('class.phpmailer.php');

if($mode=='apply'){
  
    
	if(!empty($_POST['fname']) && !empty($_POST['phone']))
	{
	$FLname = $_POST['fname'];
	$fromemail = $_POST['email'];
	$mail  = new PHPMailer(); // defaults to using php "mail()"
	$body = '<html>	
				<body>		  
					<table width="98%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td colspan="7">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" height="25" align="center" valign="middle"><h2>Loan Request Form</h2></td>	
						</tr>
						<tr>
							<td width="356" height="25" align="right" valign="middle">Full Name :</td>
							<td width="396" align="left" valign="middle">'.$_REQUEST['fname'].'</td>
						</tr>
                                                </tr>
                                                </tr>
						<tr>
							<td width="356" height="25" align="right">Date of Birth :</td>
							<td width="396" height="25">'.$_REQUEST['dob'].'</td>
						</tr>
                                                </tr>
                                                <tr>
							<td height="25" align="right">Phone :</td>
							<td height="25">'.$_REQUEST['phone'].'</td>
						</tr>
						<tr><td height="25" align="right">E-mail  :</td>
							<td height="25">'.$_REQUEST['email'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">Address :</td>
							<td height="25">'.$_REQUEST['address'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">City :</td>
							<td height="25">'.$_REQUEST['city'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">State :</td>
							<td height="25">'.$_REQUEST['state'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">Country :</td>
							<td height="25">'.$_REQUEST['country'].'</td>
						</tr>
						
						<tr><td height="25" align="right"> Zip/Code : </td>
							<td height="25">'.$_REQUEST['zipcode'].'</td>
						</tr>
                                                <tr><td height="25" align="right"> Place of work : </td>
							<td height="25">'.$_REQUEST['pow'].'</td>
						</tr>
                              
                                                <tr>
							<td height="25" align="right">Monthly Income :</td>
							<td height="25">'.$_REQUEST['mincome'].'</td>
						</tr>
                                                  <tr>
							<td height="25" align="right">Annual Income :</td>
							<td height="25">'.$_REQUEST['annualincome'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">Amount Needed :</td>
							<td height="25">'.$_REQUEST['amtneeded'].'</td>
						</tr>
                                                 <tr>
							<td height="25" align="right">Reimbursement Years :</td>
							<td height="25">'.$_REQUEST['repayduration'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">Purpose for Loan :</td>
							<td height="25">'.$_REQUEST['ploan'].'</td>
						</tr>
                                                <tr>
							<td height="25" align="right">Name & Address of Next of Kin :</td>
							<td height="25">'.$_REQUEST['nkin'].'</td>
						</tr>
                                                
					</table>
				</body>
		</html>';
	$body             = eregi_replace("[\]",'',$body);
	$mail->From       = $fromemail;
	$mail->FromName   = $FLname;
	$mail->Subject    = "New Loan Request from ".$_POST['fname'];
	$mail->MsgHTML($body);
	$mail->AddAddress("connektor.web@gmail.com","BLV Group Ltd.");
        $mail->AddCC($address, $name); // To: add email addess that you want to SEND
	if(!$mail->Send()) {
	  header('location:../apply.php?msg=error');
		exit;
	} else {
	header('location:../apply.php?msg=succ');
	exit;
	}
 }
	 else
	 {
	 header('location:../apply.php?msg=filderror');
		exit;
	 }		
}


?>