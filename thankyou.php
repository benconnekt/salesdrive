<? include("include.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Thank You </title>
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
    $.validator.addMethod("username", function(value, element) {
        return this.optional(element) || /^[a-z0-9\_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or underscore.");

    $("#regForm").validate();
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
                          <h5>Thank You</h5>
                             <p>An activation email 
                                    has been sent to your email address (dont forget to check your spam folder). 
                                    Please check your email and click on the activation link. You can <a href="login.php">login 
                                    here</a> if you have already activated your account.</font></p>
                                  <p>&nbsp;</p>
                                        
                    </article>
                       <div class="clear"></div>
                    </div>
                </div>
                </div>
               <div class="outer_block_bottom"> </div>
                </div>
                   <div class="clear"></div>
                   <div class="main">
                       <?include('news.php') ?>
                       <div class="clear"></div>
                       
                   
   <? include('footer.php')?>

</body>
</html>