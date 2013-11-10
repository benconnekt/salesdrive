<? include 'include.php';
if($_GET['url'])
{ 
$url=$_GET['url'];
$sql=mysql_query("select * from footerlink where fLurl = '$url'");



$count=mysql_num_rows($sql);
$row=mysql_fetch_array($sql);
$title=$row['fLName'];
$body=$row['fLDesc'];
$body = stripslashes($body );
$metatitle =  $row['fLMetaTitle'];
$fLKey = $row['fLKey'];
$fLMetaDesc = $row['fLMetaDesc'];
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= ($metatitle != "") ? $metatitle : $title; ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?=$fLMetaDesc?>">
    <meta name="keywords" content="<?=$fLKey?>">
    <meta name="author" content="Connektor - www.connektor.co.uk"/>
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
                          <h5><?=$title?></h5>
                          <aside class="divider">
                              <?=$body?>
                          </aside>
                  
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