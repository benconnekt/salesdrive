<? include("include.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | News Archive</title>
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
                        <article class="grid_7">
                            <h5 style="margin-bottom: 20px; border-bottom: 1px dotted #00c4ff">News Archive</h5>
                          
                          <? 
                            $sql="select * from news ORDER BY vNewDate ASC"; 
                            $news = $obj->select($sql);
                            $num_row = count($news);
                            $rows=0;
                                for($m=0;$m<$num_row;$m++)
                                { 
                                $rows++;
                                //$images = array($top[$m]["vWebImage"]);
                               ?>
                            <h5 id="news_<?=$news[$m]['iNewsId']?>"><?=stripslashes($news[$m]['vNewTitle']);?></h5>
                          <aside class="divider">
                               
                            <article>
                               <? 
                              $date = date("l, F d, Y",strtotime($news[$m]['vNewDate']));?>     
                               <h6 style="color: #37A8CA; font-size: 14px"> <?=$date;?></h6>
                                <?=  stripslashes(substr($news[$m]['tNewDesc'], 0, 150)."...")?>
                               <a href="newsdetails.php?id=<?=$news[$m]['iNewsId']."#news_".$news[$m]['iNewsId'];?>">Read More&gt;&gt;</a>
                            </article>
                            <div class="clear"></div>
                        </aside>

                           
                          
                         <?}?>                  
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