<?php include("include.php");
include ('checklogin.php');
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
      <script>
  $(document).ready(function(){
    $("#logForm").validate();
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
                            <div id="login">
                          <h5>Member Login</h5>
                          <p>
	  <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	  if(!empty($err))  {
	   echo "<div class=\"msg\">";
	  foreach ($err as $e) {
	    echo "$e <br>";
	    }
	  echo "</div>";	
	   }
	  /******************************* END ********************************/	  
	  ?></p>
       <form action="login.php" method="post" name="logForm" id="logForm" >
           <p>
                <label for="usr_email">Username / Email</label>
                <input name="usr_email" type="text" class="required" id="txtbox">
           </p>
         <p>
                <label for="pwd">Password </label>
                 <input name="pwd" type="password" class="required password" id="txtbox">
         </p>
          <p>
              <label>&nbsp;</label>
                <input name="remember" type="checkbox" id="remember" value="1">
                Remember me
           </p>
                <p> 
                 <label>&nbsp;</label>
                  <input name="doLogin" type="submit" id="doLogin3" value="Login">
                </p>
                <p>
                    <label>&nbsp;</label>
                    <a href="register.php">Register Free</a>
                  | <a href="forgot.php">Forgot Password</a></p>
      </form>
                            </div>                     
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