<? include("include.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Lead Generation & Nurturing | Appointment Setting</title>
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
    <style type="text/css">
        #accordion h3{
                font-size: 14px;
                
        }
        #accordion h3 a{
            color: #006699
        }
    </style>
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
                          <h5>Frequently Asked Questions</h5>
                           <div id="accordion">
                          <? $sql="select * from faq"; 
                            $faq = $obj->select($sql);
                            $num_row = count($faq);
                        $rows=0;
                        for($m=0;$m<$num_row;$m++)
                        { 
                        $rows++;
                        //$images = array($test[$m]["vWebImage"]);
                       ?>
                           
                                <h3><a href="#"><?=stripslashes($faq[$m]['question']);?></a></h3>
                                <div>
                                        <p>
                                             <?=  stripslashes($faq[$m]['answer']);?>
                                        </p>
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