<?php 
/*************** PHP LOGIN SCRIPT V 2.0*********************
***************** Auto Approve Version**********************
(c) Balakrishnan 2009. All Rights Reserved

Usage: This script can be used FREE of charge for any commercial or personal projects.

Limitations:
- This script cannot be sold.
- This script may not be provided for download except on its original site.

For further usage, please contact me.

***********************************************************/


include 'dbc.php';

$err = array();
					 
if($_POST['doRegister'] == 'Register') 
{ 
/******************* Filtering/Sanitizing Input *****************************
This code filters harmful script code and escapes data of all POST data
from the user submitted form.
*****************************************************************/
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}

/********************* RECAPTCHA CHECK *******************************
This code checks and validates recaptcha
****************************************************************/
 require_once('recaptchalib.php');
     
      $resp = recaptcha_check_answer ($privatekey,
                                      $_SERVER["REMOTE_ADDR"],
                                      $_POST["recaptcha_challenge_field"],
                                      $_POST["recaptcha_response_field"]);

      if (!$resp->is_valid) {
        //die ("<h3>Image Verification failed!. Go back and try again.</h3>" .
             //"(reCAPTCHA said: " . $resp->error . ")");
          $err[] = "ERROR - Image Verification failed!. Please try again.";
      }
/************************ SERVER SIDE VALIDATION **************************************/
/********** This validation is useful if javascript is disabled in the browswer ***/

if(empty($data['full_name']) || strlen($data['full_name']) < 4)
{
$err[] = "ERROR - Invalid name. Please enter atleast 3 or more characters for your name";
//header("Location: register.php?msg=$err");
//exit();
}

// Validate User Name
if (!isUserID($data['user_name'])) {
$err[] = "ERROR - Invalid user name. It can contain alphabet, number and underscore.";
//header("Location: register.php?msg=$err");
//exit();
}

// Validate Email
if(!isEmail($data['usr_email'])) {
$err[] = "ERROR - Invalid email address.";
//header("Location: register.php?msg=$err");
//exit();
}
// Check User Passwords
if (!checkPwd($data['pwd'],$data['pwd2'])) {
$err[] = "ERROR - Invalid Password or mismatch. Enter 5 chars or more";
//header("Location: register.php?msg=$err");
//exit();
}
	  
$user_ip = $_SERVER['REMOTE_ADDR'];

// stores sha1 of password
$sha1pass = PwdHash($data['pwd']);

// Automatically collects the hostname or domain  like example.com) 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Generates activation code simple 4 digit number
$activ_code = rand(1000,9999);

$usr_email = $data['usr_email'];
$user_name = $data['user_name'];

/************ USER EMAIL CHECK ************************************
This code does a second check on the server side if the email already exists. It 
queries the database and if it has any existing email it throws user email already exists
*******************************************************************/

$rs_duplicate = mysql_query("select count(*) as total from users where user_email='$usr_email' OR user_name='$user_name'") or die(mysql_error());
list($total) = mysql_fetch_row($rs_duplicate);

if ($total > 0)
{
$err[] = "ERROR - The username/email already exists. Please try again with different username and email.";
//header("Location: register.php?msg=$err");
//exit();
}
/***************************************************************************/

if(empty($err)) {

$sql_insert = "INSERT into `users`
  			(`full_name`,`user_email`,`pwd`,`address`,`tel`,`date`,`users_ip`,`activation_code`,`country`,`user_name`
			)
		    VALUES
		    ('$data[full_name]','$usr_email','$sha1pass','$data[address]','$data[tel]',
			now(),'$user_ip','$activ_code','$data[country]','$user_name'
			)
			";
			
mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
$user_id = mysql_insert_id($link);  
$md5_id = md5($user_id);
mysql_query("update users set md5_id='$md5_id' where id='$user_id'");
//	echo "<h3>Thank You</h3> We received your submission.";

if($user_registration)  {
$a_link = "
*****ACTIVATION LINK*****\n
http://$host$path/activate.php?user=$md5_id&activ_code=$activ_code
"; 
} else {
$a_link = 
"Your account is *PENDING APPROVAL* and will be soon activated the administrator.
";
}

$message = 
"Hello \n
Thank you for registering with us. Here are your login details...\n

User ID: $user_name
Email: $usr_email \n 
Passwd: $data[pwd] \n

$a_link

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($usr_email, "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());

  header("Location: thankyou.php");  
  exit();
	 
	 } 
 }					 

?>