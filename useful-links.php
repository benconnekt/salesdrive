<? include("include.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Telemarketing | Oxfordshire | London | Bristol | Swindon | Reading</title>
    <meta charset="utf-8">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Connektor">
    <link rel="stylesheet" href="css/style.css">
   <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery-1.6.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
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
                            <h5>Useful Links</h5>
                           <div id="accordion">
                          <? $sql="select * from linkcategory ORDER BY catname ASC "; 
                            $cat = $obj->select($sql);
                            $num_row = count($cat);
                            $rows=0;
                        for($m=0;$m<$num_row;$m++)
                        { ?>
                       
                           <h3><a href="#"><?=stripslashes($cat[$m]['catname']);?></a></h3>
                                <div>
                                      <? 
                                        $sqlink="select * from ulinks WHERE ucategory = '".$cat[$m]['catname']."'"; 
                                        $ulink = $obj->select($sqlink);
                                        $count = count($ulink);
                                    //$rows=0;
                                    for($i=0;$i<$count;$i++)
                                    { 
                                   //$rows++;
                                    $images = array($ulink[$i]["uimage"]);
                                   ?>
                                        <? foreach ($images as $image){?>
                                        <aside class="divider">
                                           <? if ($image){?>
                                        <div class="ulink">
                                            <a href="http://<?=$ulink[$i]['url']?>" target="_blank"><img src="admin/ulinks/<?=$image?>" alt="<?=$ulink[$i]['utitle']?>" /></a>
                                        </div>
                                            <?}?>
                                        <article class="para">
                                            <h6><a href="http://<?=$ulink[$i]['url']?>" target="_blank"><?=stripslashes($ulink[$i]['utitle']);?></a></h6>
                                            <?=  stripslashes($ulink[$i]['udesc']);?>
                                        </article>
                                        <div class="clear"></div>
                                    </aside>

                                        <?}?>

                                     <?}?> 
                                </div>
                                
                    
                    <?}?>
                         </div>
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