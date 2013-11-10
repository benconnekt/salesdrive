<? include("include.php");
/********************** MYSETTINGS.PHP**************************
This updates user settings and password
************************************************************/
include 'dbc.php';
page_protect();

$reportid = $_REQUEST[reportid];
 
$sql="select * from report where reportid ='".$reportid."'";
$db_res=$obj->select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Report Details </title>
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
    $("#myform").validate();
	 $("#pform").validate();
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
                          <h5>Member Account</h5>
                           <table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr> 
                                <td colspan="3">&nbsp;</td>
                              </tr>
                              <tr> 
                                <td width="160" valign="top"><?php 
                            /*********************** MYACCOUNT MENU ****************************
                            This code shows my account menu only to logged in users. 
                            Copy this code till END and place it in a new html or php where
                            you want to show myaccount options. This is only visible to logged in users
                            *******************************************************************/
                            if (isset($_SESSION['user_id'])) {?>
                            <div class="myaccount">
                              <p><strong>My Account</strong></p>
                              <a href="account.php">Account</a><br>
                              <a href="report.php">Report</a><br>
                              <a href="settings.php">Settings</a><br>
                                <a href="logout.php">Logout </a>
                              </div>
                            <?php } 
                            /*******************************END**************************/
                            ?>
                              <?php 
                            if (checkAdmin()) {
                            /*******************************END**************************/
                            ?>
                                  <p> <a href="admin.php">Admin CP </a></p>
                                      <?php } ?>
                                  <p>&nbsp;</p>
                                  <p>&nbsp;</p>
                                  <p>&nbsp;</p></td>
                                <td width="732" valign="top">
                            <h3 class="titlehdr"><?=$_SESSION['user_name']."'s"?> Account - Report</h3>
                               	<?php if(count($db_res)>0){?>

			  <table width="100%" border="0" cellpadding="8" cellspacing="0">
                
		<tr>
                  <td width="40%" height="25" align="left" valign="middle" class="detailtitle">Report</td>
                  <td width="40%" height="25" align="left" valign="middle" class="detailtitle">Action Required</td>
                  <td width="20%" height="25" align="left" valign="middle" class="detailtitle">Date</td>
                  
               </tr>
				<?	for($i=0;$i<count($db_res);$i++)
				{
					$bgcolor = ($i%2)?"bg01" : "bg02";
         		?>
                 <tr class="<?=$bgcolor?>" onMouseOver="Highlight(this)"  onmouseout="UnHighlight(this,'<?=$bgcolor?>')">
                  <td align="left" valign="middle" class="td-listing"><?=$db_res[$i]["content"]?></td>
                  <td align="left" valign="middle" class="td-listing"><?=$db_res[$i]["actionRequired"]?></td>
                  <td align="left" valign="middle" class="td-listing"> <?=$db_res[$i]["date"]?></td>		 				
                </tr>
                <tr>
                    <td colspan="2"><a href="report.php">Back to Report Listing</a></td>
                </tr>
                   <?
					}
					?>
			<? }?>
				
              </table>

                                  <p align="right">&nbsp; </p></td>
                              </tr>
                              <tr> 
                                <td colspan="3">&nbsp;</td>
                              </tr>
                            </table>    
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