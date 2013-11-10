<? include("include.php");
/********************** MYSETTINGS.PHP**************************
This updates user settings and password
************************************************************/
include 'dbc.php';
page_protect();

$err = array();
$msg = array();

if($_POST['doUpdate'] == 'Update')  
{


$rs_pwd = mysql_query("select pwd from users where id='$_SESSION[user_id]'");
list($old) = mysql_fetch_row($rs_pwd);
$old_salt = substr($old,0,9);

//check for old password in md5 format
	if($old === PwdHash($_POST['pwd_old'],$old_salt))
	{
	$newsha1 = PwdHash($_POST['pwd_new']);
	mysql_query("update users set pwd='$newsha1' where id='$_SESSION[user_id]'");
	$msg[] = "Your new password is updated";
	//header("Location: mysettings.php?msg=Your new password is updated");
	} else
	{
	 $err[] = "Your old password is invalid";
	 //header("Location: mysettings.php?msg=Your old password is invalid");
	}

}

if($_POST['doSave'] == 'Save')  
{
// Filter POST data for harmful code (sanitize)
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}


mysql_query("UPDATE users SET
			`full_name` = '$data[name]',
			`address` = '$data[address]',
			`tel` = '$data[tel]',
			`fax` = '$data[fax]',
			`country` = '$data[country]',
			`website` = '$data[web]'
			 WHERE id='$_SESSION[user_id]'
			") or die(mysql_error());

//header("Location: mysettings.php?msg=Profile Sucessfully saved");
$msg[] = "Profile Sucessfully saved";
 }
 
$rs_settings = mysql_query("select * from users where id='$_SESSION[user_id]'"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Settings </title>
    <meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Connektor">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.6.4.min.js"></script>
    <script src="js/script.js"></script>
	<!--[if lt IE 7]>
  		<div class='aligncenter'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"border="0"></a></div>  
 	<![endif]-->
    <!--[if lt IE 9]>
   		<script src="js/html5.js"></script>
  		<link rel="stylesheet" href="css/ie.css"> 
	<![endif]-->
  <script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#myform").validate();
	 $("#pform").validate();
  });
  </script>
</head>
<body>
<div class="bg">
    <div class="bg2">
        <div class="body2">
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
                          <h5>Member Account</h5>
                           <table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
                              <tr> 
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr> 
                                <td width="160" valign="top"><?php 
                            /*********************** MYACCOUNT MENU ****************************
                            This code shows my account menu only to logged in users. 
                            Copy this code till END and place it in a new html or php where
                            you want to show myaccount options. This is only visible to logged in users
                            *******************************************************************/
                            if (isset($_SESSION['user_id'])) {?>
                            <div class="myaccount">
                              <p><strong>My Account</strong></p>
                              <a href="account.php">Account</a><br>
                              <a href="report.php">Report</a><br>
                              <a href="settings.php">Settings</a><br>
                                <a href="logout.php">Logout </a>
                            </div>
                            <?php } 
                            /*******************************END**************************/
                            ?>
                              <?php 
                            if (checkAdmin()) {
                            /*******************************END**************************/
                            ?>
                                  <p> <a href="admin.php">Admin CP </a></p>
                                      <?php } ?>
                                  <p>&nbsp;</p>
                                  <p>&nbsp;</p>
                                  <p>&nbsp;</p></td>
                                <td width="732" valign="top">
                            <h3 class="titlehdr"><?=$_SESSION['user_name']."'s"?> Account - Settings</h3>
                                  <p> 
                                    <?php	
                                    if(!empty($err))  {
                                       echo "<div class=\"msg\">";
                                      foreach ($err as $e) {
                                        echo "* Error - $e <br>";
                                        }
                                      echo "</div>";	
                                       }
                                       if(!empty($msg))  {
                                        echo "<div class=\"msg\">" . $msg[0] . "</div>";

                                       }
                                      ?>
                                  </p>
                                  <p>Here you can make changes to your profile. Please note that you will 
                                    not be able to change your email which has been already registered.</p>
                                      <?php while ($row_settings = mysql_fetch_array($rs_settings)) {?>
                                  <form action="mysettings.php" method="post" name="myform" id="myform">
                                    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" class="forms">
                                      <tr>
                                      
                                        <td colspan="2">
                                            <label>Name</label>
                                            <input name="name" type="text" id="name"  class="required" value="<? echo $row_settings['full_name']; ?>">
                                          </td>
                                      </tr>
                                       <tr>
                                      
                                        <td colspan="2">
                                            <label>Company</label>
                                            <input name="name" type="text" id="name"  class="required" value="<? echo $row_settings['company']; ?>">
                                          </td>
                                      </tr>
                                      <tr> 
                                        <td colspan="2">
                                            <label>Address</label> 
                                            <textarea name="address" class="required" id="address"><? echo $row_settings['address']; ?></textarea>
                                             
                                           
                                        </td>
                                      </tr>
                                       <tr>
                                      
                                        <td colspan="2">
                                            <label>Post Code</label>
                                            <input name="name" type="text" id="name"  class="required" value="<? echo $row_settings['postcode']; ?>" size="50">
                                         </td>
                                      </tr>
                                      <tr> 
                                        <td colspan="2"><label>Country</label>
                                            <input name="country" type="text" id="country" value="<? echo $row_settings['country']; ?>" >
                                        </td>
                                      </tr>
                                      <tr> 
                                        <td colspan="2">
                                        <label>Phone</label>
                                        <input name="tel" type="text" id="tel" class="required" value="<? echo $row_settings['tel']; ?>"></td>
                                      </tr>
                                      <tr> 
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr> 
                                        <td>
                                             <label>User Name</label>
                                        <input name="user_name" type="text" id="web2" value="<? echo $row_settings['user_name']; ?>" disabled>
                                        </td>
                                      </tr>
                                      <tr> 
                                        <td>
                                        <label>Email</label>
                                        <input name="user_email" type="text" id="web3"  value="<? echo $row_settings['user_email']; ?>" disabled>
                                        </td>
                                      </tr>
                                    </table>
                                    <p>
                                        <label>&nbsp;</label>
                                      <input name="doSave" type="submit" id="doSave" value="Save">
                                    </p>
                                  </form>
                                      <?php } ?>
                                  <h3 class="titlehdr">Change Password</h3>
                                  <p>If you want to change your password, please input your old and new password 
                                    to make changes.</p>
                                  <form name="pform" id="pform" method="post" action="">
                                    <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" class="forms">
                                      <tr> 
                                        <td colspan="2">
                                            <label>Old Password</label>
                                        <input name="pwd_old" type="password" class="required password"  id="pwd_old"></td>
                                      </tr>
                                      <tr> 
                                        <td colspan="2"><label>New Password</label>
                                       <input name="pwd_new" type="password" id="pwd_new" class="required password"  ></td>
                                      </tr>
                                    </table>
                                    <p align="center"> 
                                      <input name="doUpdate" type="submit" id="doUpdate" value="Update">
                                    </p>
                                    <p>&nbsp; </p>
                                  </form>
                                  <p>&nbsp; </p>
                                  <p>&nbsp;</p>

                                  <p align="right">&nbsp; </p></td>
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