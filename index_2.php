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
        
  <?include 'header.php';?>
       
    <!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="wrapper">
                <div class="block_container">
                <div class="outer_block_top"></div>
                 
                <div class="blockmain">
                    <div class="main">
                      <article class="grid_7">
                          <?php
                            $sql = "SELECT * FROM webpages where iCateoryId = '1' ";
                            if (!$res = mysql_query($sql)) die(mysql_error());
                            while ($row = mysql_fetch_assoc($res))
                            {?>
                    <div class="grid_30" style="width: 190px !important">
                        <div style="height: 50px; overflow: hidden"><h4 style="text-align: left;"><?php echo $row[vWebPageName]; ?></h4></div>
                        <div class="img_grid">
                        <img src="admin/banner/<?php echo $row[vWebImage]; ?>" alt="" width="101" height="110"/>
                        </div>
                        <div class="clear"></div>
                        <div style="height: 220px; overflow: hidden; margin-top: 10px">
                            <?php echo stripslashes(substr($row['tWebPageDesc'], 0, 400)). "..."; ?>
                        </div>
                        <div class="clear"></div>
                        <p>
                        <a class="readmore" href="inner-index.php?id=<?php echo $row[iWebPageId]; ?>">View more &gt;&gt;</a>
                         </p>
                    </div>
                          <?php  }?>
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