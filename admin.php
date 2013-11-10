<? include("include.php");

include 'admincheck.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sales Drive | Admin </title>
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
                        <article class="grid_32">
                          <h5>Member Account</h5>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="14%" valign="top"><?php
                                if (isset($_SESSION['user_id'])) {?>
                        <div class="myaccount">
                          <p><strong>My Account</strong></p>
                          <a href="account.php">Account</a><br>
                          <a href="report.php">Report</a><br>
                          <a href="settings.php">Settings</a><br>
                          <a href="logout.php">Logout </a></div>
                        <?php }
                        if (checkAdmin()) {
                        /*******************************END**************************/
                        ?>
                              <p> <a href="admin.php">Admin CP </a></p>
                                  <?php } ?>
                                </td>
                            <td width="74%" valign="top" style="padding: 10px;"><h2><font color="#FF0000">Administration 
                                Page</font></h2>
                              <table width="100%" border="0" cellpadding="5" cellspacing="0" class="myaccount">
                                <tr>
                                  <td>Total users: <?php echo $all;?></td>
                                  <td>Active users: <?php echo $active; ?></td>
                                  <td>Pending users: <?php echo $total_pending; ?></td>
                                </tr>
                              </table>
                              <p><?php 
                                  if(!empty($msg)) {
                                  echo $msg[0];
                                  }
                                  ?></p>
                              <table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="background-color: #E4F8FA;padding: 2px 5px;border: 1px solid #CAE4FF;" >
                                <tr>
                                  <td><form name="form1" method="get" action="admin.php">
                                      <p align="center">Search 
                                        <input name="q" type="text" id="q" size="40">
                                        <br>
                                        [Type email or user name] </p>
                                      <p align="center"> 
                                        <input type="radio" name="qoption" value="pending">
                                        Pending users 
                                        <input type="radio" name="qoption" value="recent">
                                        Recently registered 
                                        <input type="radio" name="qoption" value="banned">
                                        Banned users <br>
                                        <br>
                                        [You can leave search blank to if you use above options]</p>
                                      <p align="center"> 
                                        <input name="doSearch" type="submit" id="doSearch2" value="Search">
                                      </p>
                                      </form></td>
                                </tr>
                              </table>
                              <p>
                                <?php if ($get['doSearch'] == 'Search') {
                                  $cond = '';
                                  if($get['qoption'] == 'pending') {
                                  $cond = "where `approved`='0' order by date desc";
                                  }
                                  if($get['qoption'] == 'recent') {
                                  $cond = "order by date desc";
                                  }
                                  if($get['qoption'] == 'banned') {
                                  $cond = "where `banned`='1' order by date desc";
                                  }

                                  if($get['q'] == '') { 
                                  $sql = "select * from users $cond"; 
                                  } 
                                  else { 
                                  $sql = "select * from users where `user_email` = '$_REQUEST[q]' or `user_name`='$_REQUEST[q]' ";
                                  }


                                  $rs_total = mysql_query($sql) or die(mysql_error());
                                  $total = mysql_num_rows($rs_total);

                                  if (!isset($_GET['page']) )
                                        { $start=0; } else
                                        { $start = ($_GET['page'] - 1) * $page_limit; }

                                  $rs_results = mysql_query($sql . " limit $start,$page_limit") or die(mysql_error());
                                  $total_pages = ceil($total/$page_limit);

                                  ?>
                              <p>Approve -&gt; A notification email will be sent to user notifying activation.<br>
                                Ban -&gt; No notification email will be sent to the user. 
                              <p><strong>*Note: </strong>Once the user is banned, he/she will never be 
                                able to register new account with same email address. 
                              <p align="right"> 
                                <?php 

                                  // outputting the pages
                                        if ($total > $page_limit)
                                        {
                                        echo "<div><strong>Pages:</strong> ";
                                        $i = 0;
                                        while ($i < $page_limit)
                                        {


                                        $page_no = $i+1;
                                        $qstr = ereg_replace("&page=[0-9]+","",$_SERVER['QUERY_STRING']);
                                        echo "<a href=\"admin.php?$qstr&page=$page_no\">$page_no</a> ";
                                        $i++;
                                        }
                                        echo "</div>";
                                        }  ?>
                                        </p>
                                        <form name "searchform" action="admin.php" method="post">
                                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
                                  <tr bgcolor="#E6F3F9"> 
                                    <td width="4%"><strong>ID</strong></td>
                                    <td> <strong>Date</strong></td>
                                    <td><div align="center"><strong>User Name</strong></div></td>
                                    <td width="24%"><strong>Email</strong></td>
                                    <td width="10%"><strong>Approval</strong></td>
                                    <td width="10%"> <strong>Banned</strong></td>
                                    <td width="25%">&nbsp;</td>
                                  </tr>
                                  <tr> 
                                    <td>&nbsp;</td>
                                    <td width="10%">&nbsp;</td>
                                    <td width="17%"><div align="center"></div></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <?php while ($rrows = mysql_fetch_array($rs_results)) {?>
                                  <tr> 
                                    <td><input name="u[]" type="checkbox" value="<?php echo $rrows['id']; ?>" id="u[]"></td>
                                    <td><?php echo $rrows['date']; ?></td>
                                    <td> <div align="center"><?php echo $rrows['user_name'];?></div></td>
                                    <td><?php echo $rrows['user_email']; ?></td>
                                    <td> <span id="approve<?php echo $rrows['id']; ?>"> 
                                      <?php if(!$rrows['approved']) { echo "Pending"; } else {echo "Active"; }?>
                                      </span> </td>
                                    <td><span id="ban<?php echo $rrows['id']; ?>"> 
                                      <?php if(!$rrows['banned']) { echo "no"; } else {echo "yes"; }?>
                                      </span> </td>
                                    <td> <font size="2"><a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "approve", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#approve<?php echo $rrows['id']; ?>").html(data); });'>Approve</a> 
                                      <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "ban", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#ban<?php echo $rrows['id']; ?>").html(data); });'>Ban</a> 
                                      <a href="javascript:void(0);" onclick='$.get("do.php",{ cmd: "unban", id: "<?php echo $rrows['id']; ?>" } ,function(data){ $("#ban<?php echo $rrows['id']; ?>").html(data); });'>Unban</a> 
                                      <a href="javascript:void(0);" onclick='$("#edit<?php echo $rrows['id'];?>").show("slow");'>Edit</a> 
                                      </font> </td>
                                  </tr>
                                  <tr> 
                                    <td colspan="7">

                                                <div style="display:none;font: normal 11px arial; padding:10px; background: #e6f3f9" id="edit<?php echo $rrows['id']; ?>">

                                                <input type="hidden" name="id<?php echo $rrows['id']; ?>" id="id<?php echo $rrows['id']; ?>" value="<?php echo $rrows['id']; ?>">
                                                User Name: <input name="user_name<?php echo $rrows['id']; ?>" id="user_name<?php echo $rrows['id']; ?>" type="text" size="10" value="<?php echo $rrows['user_name']; ?>" >
                                                User Email:<input id="user_email<?php echo $rrows['id']; ?>" name="user_email<?php echo $rrows['id']; ?>" type="text" size="20" value="<?php echo $rrows['user_email']; ?>" >
                                                Level: <input id="user_level<?php echo $rrows['id']; ?>" name="user_level<?php echo $rrows['id']; ?>" type="text" size="5" value="<?php echo $rrows['user_level']; ?>" > 1->user,5->admin
                                                <br><br>New Password: <input id="pass<?php echo $rrows['id']; ?>" name="pass<?php echo $rrows['id']; ?>" type="text" size="20" value="" > (leave blank)
                                                <input name="doSave" type="button" id="doSave" value="Save" 
                                                onclick='$.get("do.php",{ cmd: "edit", pass:$("input#pass<?php echo $rrows['id']; ?>").val(),user_level:$("input#user_level<?php echo $rrows['id']; ?>").val(),user_email:$("input#user_email<?php echo $rrows['id']; ?>").val(),user_name: $("input#user_name<?php echo $rrows['id']; ?>").val(),id: $("input#id<?php echo $rrows['id']; ?>").val() } ,function(data){ $("#msg<?php echo $rrows['id']; ?>").html(data); });'> 
                                                <a  onclick='$("#edit<?php echo $rrows['id'];?>").hide();' href="javascript:void(0);">close</a>

                                          <div style="color:red" id="msg<?php echo $rrows['id']; ?>" name="msg<?php echo $rrows['id']; ?>"></div>
                                          </div>

                                          </td>
                                  </tr>
                                  <?php } ?>
                                </table>
                                    <p><br>
                                  <input name="doApprove" type="submit" id="doApprove" value="Approve">
                                  <input name="doBan" type="submit" id="doBan" value="Ban">
                                  <input name="doUnban" type="submit" id="doUnban" value="Unban">
                                  <input name="doDelete" type="submit" id="doDelete" value="Delete">
                                  <input name="query_str" type="hidden" id="query_str" value="<?php echo $_SERVER['QUERY_STRING']; ?>">
                                  <strong>Note:</strong> If you delete the user can register again, instead 
                                  ban the user. </p>
                                <p><strong>Edit Users:</strong> To change email, user name or password, 
                                  you have to delete user first and create new one with same email and 
                                  user name.</p>
                              </form>

                                  <?php } ?>
                              &nbsp;</p>
                                  <?php
                                  if($_POST['doSubmit'] == 'Create')
                        {
                        $rs_dup = mysql_query("select count(*) as total from users where user_name='$post[user_name]' OR user_email='$post[user_email]'") or die(mysql_error());
                        list($dups) = mysql_fetch_row($rs_dup);

                        if($dups > 0) {
                                die("The user name or email already exists in the system");
                                }

                        if(!empty($_POST['pwd'])) {
                          $pwd = $post['pwd'];	
                          $hash = PwdHash($post['pwd']);
                         }  
                         else
                         {
                          $pwd = GenPwd();
                          $hash = PwdHash($pwd);

                         }

                        mysql_query("INSERT INTO users (`user_name`,`user_email`,`pwd`,`approved`,`date`,`user_level`)
                                                 VALUES ('$post[user_name]','$post[user_email]','$hash','1',now(),'$post[user_level]')
                                                 ") or die(mysql_error()); 



                        $message = 
                        "Thank you for registering with us. Here are your login details...\n
                        User Email: $post[user_email] \n
                        Passwd: $pwd \n

                        *****LOGIN LINK*****\n
                        http://$host$path/login.php

                        Thank You

                        Administrator
                        $host_upper
                        ______________________________________________________
                        THIS IS AN AUTOMATED RESPONSE. 
                        ***DO NOT RESPOND TO THIS EMAIL****
                        ";

                        if($_POST['send'] == '1') {

                                mail($post['user_email'], "Login Details", $message,
                            "From: \"Member Registration\" <auto-reply@$host>\r\n" .
                             "X-Mailer: PHP/" . phpversion()); 
                         }
                        echo "<div class=\"msg\">User sucessfully created with password $pwd</div>"; 
                        }

                                  ?>

                              <h2><font color="#FF0000">Create New User</font></h2>
                              <table width="90%" border="0" cellpadding="5" cellspacing="2" class="myaccount">
                                <tr>
                                  <td><form name="form1" method="post" action="admin.php" id="myform">
                                          <p><label>User ID </label>
                                        <input name="user_name" type="text" id="user_name">
                                          </p>
                                      <p><label>Email</label>
                                        <input name="user_email" type="text" id="user_email">
                                      </p>
                                      <p><label>User Level </label>
                                        <select name="user_level" id="user_level">
                                          <option value="1">User</option>
                                          <option value="5">Admin</option>
                                        </select>
                                      </p>
                                      <p><label>Password </label>
                                        <input name="pwd" type="text" id="pwd"><br/>
                                        (if empty a password will be auto generated)</p>
                                      <p> 
                                        <input name="send" type="checkbox" id="send" value="1" checked>
                                        Send Email</p>
                                      <p> 
                                        <input name="doSubmit" type="submit" id="doSubmit" value="Create">
                                      </p>
                                    </form>
                                    <p>**All created users will be approved by default.</p>
                                  </td>
                                </tr>
                              </table>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <p>&nbsp;</p></td>
                            <td width="12%">&nbsp;</td>
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
                       <?include('news.php') ?>
                       <div class="clear"></div>
                       
                   
   <? include('footer.php')?>
 
</body>
</html>