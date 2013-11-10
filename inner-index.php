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
                          <?
                          if(isset($_GET['id'])){
   
                             $sqlinner="select * from webpages WHERE iWebPageId = '".$_GET['id']."' "; 
                            $inner = $obj->select($sqlinner);
                            $numb_rows = count($inner);
                                $rows=0;
                                for($i=0;$i<$numb_rows;$i++)
                                { 
                                $rows++;
                                $images = array($inner[$i]["vWebImage"]);
                               ?>
                            <? foreach ($images as $image){?>
                          <h4><?=$inner[$i]['vWebPageName'];?></h4>
                            <aside class="divider">
                             
                            <div class="img_grid">
                                <img src="admin/banner/<?=$image?>" alt="" width="101" height="110"/>
                            </div>
                                
                            <article>
                                
                                <?=  stripslashes($inner[$i]['tWebPageDesc']);?>
                            <p>
                                <a class="readmore back" href="index.php">&lt;&lt;Back</a>
                            </p>
                                </article>
                            <div class="clear"></div>
                            </aside>

                            <?}?>
                          
                         <?}
                          }?>
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