<?php include("include.php");
include 'dbc.php';




/******************* ACTIVATION BY FORM**************************/
if ($_POST['doReset']=='Reset')
{
$err = array();
$msg = array();

foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}
if(!isEmail($data['user_email'])) {
$err[] = "ERROR - Please enter a valid email"; 
}

$user_email = $data['user_email'];

//check if activ code and user is valid as precaution
$rs_check = mysql_query("select id from users where user_email='$user_email'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Error - Sorry no such account exists or registered.";
	//header("Location: forgot.php?msg=$msg");
	//exit();
	}


if(empty($err)) {

$new_pwd = GenPwd();
$pwd_reset = PwdHash($new_pwd);
//$sha1_new = sha1($new);	
//set update sha1 of new password + salt
$rs_activ = mysql_query("update users set pwd='$pwd_reset' WHERE 
						 user_email='$user_email'") or die(mysql_error());
						 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);						 
						 
//send email

$message = 
"Here are your new password details ...\n
User Email: $user_email \n
Passwd: $new_pwd \n

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($user_email, "Reset Password", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());						 
						 
$msg[] = "Your account password has been reset and a new password has been sent to your email address.";						 
						 
//$msg = urlencode();
//header("Location: forgot.php?msg=$msg");						 
//exit();
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Member Login </title>
    <meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Connektor">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.6.4.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
    <script src="js/script.js"></script>
	<!--[if lt IE 7]>
  		<div class='aligncenter'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"border="0"></a></div>  
 	<![endif]-->
    <!--[if lt IE 9]>
   		<script src="js/html5.js"></script>
  		<link rel="stylesheet" href="css/ie.css"> 
	<![endif]-->
  <script>
  $(document).ready(function(){
    $("#actForm").validate();
  });
  </script>
</head>
<body>
<div class="bg">
    <div class="bg2">
    <!--==============================header=================================-->
    <div class="wrapper">
   <?include 'header.php';?>
       
    <!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="wrapper">
                <div class="block_container">
                <div class="outer_block_top"></div>
                 
                <div class="blockmain">
                    <div class="main">
                        <article class="grid_32">
                         <table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top"><p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
<h3 class="titlehdr">Forgot Password</h3>

      <p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"msg\">" . $msg[0] . "</div>";

	   }
	  /******************************* END ********************************/	  
	  ?>
      </p>
      <p>If you have forgot the account password, you can <strong>reset password</strong> 
        and a new password will be sent to your email address.</p>
	 
      <form action="forgot.php" method="post" name="actForm" id="actForm" >
        <table width="65%" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="56%">Your Email</td>
            <td width="64%"><input name="user_email" type="text" class="required email" id="txtboxn" size="25"></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doReset" type="submit" id="doLogin3" value="Reset">
                </p>
              </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
      </form>
	  
      <p>&nbsp;</p>
	   
      <p align="left">&nbsp; </p></td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>                  
                    </article>
                       <div class="clear"></div>
                    </div>
                </div>
                </div>
               <div class="outer_block_bottom"> </div>
                </div>
                   <div class="clear"></div>
                   <div class="main">
                       <?//include('news.php') ?>
                       <div class="clear"></div>
                       
                   
   <? include('footer.php')?>
 
</body>
</html>