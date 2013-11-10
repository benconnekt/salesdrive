<? include 'include.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Services  </title>
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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
</head>
<body>
<div class="bg">
    <div class="bg2">
        <div class="body2">
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
                    <li><a href="index.php">home</a>
                    </li>
                    <li><a href="#">the company</a>
                    <ul>
                       
			<li><a href="about.php">About</a></li>
			<li><a href="key-members.php">key members</a></li>
                   
                    </ul>
                    </li>
                    <li><a href="#">services</a>
                        <ul>
                       
			<li><a href="business-develoment.php">Business Development</a></li>
			<li><a href="data-services.php">Data Services</a></li>
                        <li><a href="tailor-made-sales.php">Tailor-made Sales Strategies</a></li>
                        <li><a href="furniture-agency.php">Furniture Agency</a></li>
                   
                    </ul> 
                    </li>
                    <li><a href="our-promise.php">our promise</a></li>
                    <li><a href="your-investment.php">your investment</a></li>
                    <li><a href="case-history.php">case history</a></li>
                    <li class="last"><a href="testimonials.php">testimonials</a></li>
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
                          <h5>Services</h5>
                          <? $sqlserv="select * from webpages WHERE iCateoryId = 3 "; 
                            $services = $obj->select($sqlserv);
                            $num_row = count($services);
                        $rows=0;
                        for($m=0;$m<$num_row;$m++)
                        { 
                        $rows++;
                        $images = array($services[$m]["vWebImage"]);
                       ?>
                            <? foreach ($images as $image){?>
                            <aside class="divider">
                             
                            <div class="img_grid">
                                <img src="admin/banner/<?=$image?>" alt="" width="101" height="110"/>
                            </div>
                            <article>
                                <h6><?=stripslashes($services[$m]['vWebPageName']);?></h6>
                                <?=  stripslashes($services[$m]['tWebPageDesc']);?>
                            </article>
                            <div class="clear"></div>
                </aside>

                            <?}?>
                          
                         <?}?>                  
                    </article>
                      <article class="grid_8 fright">
                       <? include 'topten.php';?>
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