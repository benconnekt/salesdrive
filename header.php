<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<header>
        <div class="main">
            <div class="top_bar"><div class="logo"><h1><a href="index.php">Sales Drive UK</a></h1></div>
            <div class="call fright">
                <strong>
                        <?if (isset($_SESSION['user_id'])) {?> <a href="account.php"><?=$_SESSION['user_name']?>'s Account</a>
                        | &nbsp;<a href="logout.php">Logout</a>
                        <?}else{?>
                        <a href="login.php">Login</a>&nbsp; | &nbsp;<a href="register.php">Register</a>
                    <?}?>
                </strong>
                
                <h4><span style="color: #25aae2">Call: </span>&nbsp; 0800 865 4800 </h4>
                <div class="social fright">
                    <a href="#"><img src="images/fsb.jpg"/></a>
                 <a href="https://www.facebook.com/SalesDriveLimited" target="_blank"><img src="images/fb.png"/> </a>
                <a href="https://twitter.com/#!/SalesDriveUK" target="_blank"><img src="images/twitter.png"/>  </a>
                <a href="http://www.linkedin.com/pub/roy-heaton/2b/370/838" target="_blank"><img src="images/linkedin.png"/> </a>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="clear"></div>
            
         </div>
         <div class="clear"></div>
            <? include('nav.html')?>
      
            <div class="clear"></div>
            
            <div id="fade">
                  <!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="950" height="260" id="FlashID" title="Sales Drive Animated Banner">
                      <param name="movie" value="images/anim_banner-2.swf" />
                      <param name="quality" value="high" />
                      <param name="wmode" value="opaque" />
                      <param name="swfversion" value="6.0.65.0" />
                      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                     <!-- <param name="expressinstall" value="Scripts/expressInstall.swf" />
                      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                      <!--[if !IE]>-->
                      <!--  <object type="application/x-shockwave-flash" data="images/anim_banner-2.swf" width="950" height="260">
                        <!--<![endif]-->
                       <!--  <param name="quality" value="high" />
                        <param name="wmode" value="opaque" />
                        <param name="swfversion" value="6.0.65.0" />
                        <param name="expressinstall" value="Scripts/expressInstall.swf" />
                        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                        <!-- <div>
                          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                        </div> -->
                        <!--[if !IE]>-->
                      <!-- </object> -->
                      <!--<![endif]-->
                  <!-- </object> -->
                <img src="images/slider-3.jpg" width="950" height="260" />
                <img src="images/slider-7.jpg" width="950" height="260" />
                <img src="images/slider-4.jpg" width="950" height="260" />
                 <img src="images/slider-6.jpg" width="950" height="260" />
            </div>
            <?//}?>
            <div class="clear"></div>
            <div class="seperator"></div>
        </div>
    </header>