<? include("include.php");?>
<? $sqlpage="select * from webpages WHERE iCateoryId = 1 "; 
   $page = $obj->select($sqlpage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home :: Sales Drive </title>
    <meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div class="bg">
    <div class="bg2">
    <!--==============================header=================================-->
    <div class="wrapper">
    <header>
        <div class="main">
            <div class="top_bar"><div class="logo"><h1><a href="index.html">Sales Drive UK</a></h1></div>
            <div class="fright">
                <center><strong><a href="">Login</a>&nbsp; | &nbsp;<a href="">Register</a></strong></center>
                <h4><span style="color: #25aae2">Call: </span>&nbsp; 02088850900</h4>
                <div class="clear"></div>
            </div>
            
            <div class="clear"></div>
            
         </div>
         <div class="clear"></div>
            <nav>
                <ul class="sf-menu">
                    <li><a href="index.html">home</a>
                    </li>
                    <li><a href="about-us.html">the company</a>
                    <ul>
                       
			<li><a href="#">About</a></li>
			<li><a href="#">key members</a></li>
                   
                    </ul>
                    </li>
                    <li><a href="services.html">services</a></li>
                    <li><a href="testimonials.html">our promise</a></li>
                    <li><a href="contact-us.html">your investment</a></li>
                    <li><a href="contact-us.html">case history</a></li>
                    <li class="last"><a href="contact-us.html">testimonials</a></li>
                 </ul>
            </nav>
      
            <div class="clear"></div>
            <div id="fade"> 
                <img src="images/slider-1.jpg" width="950" height="260" />
                <img src="images/slider-2.jpg" width="950" height="260" /> 
            </div>
            <div class="clear"></div>
            <div class="seperator"></div>
        </div>
    </header>
       
    <!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="wrapper">
                <div class="block_container">
                <div class="outer_block_top"></div>
                 
                <div class="blockmain">
                    <div class="main">
                      <article class="grid_7">
                              
                          <div class="img_grid">
                              <img src="images/promote.png"/>
                          </div>
                          <aside class="divider">
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                          <div class="clear"></div>
                          </aside>
                           
                    </article>
                      <article class="grid_8 fright">
                       <? include('topten.php')?>
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