<script type="text/javascript" src="js/jquery.atooltip.pack.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('img.normalTip').aToolTip();

        $('#footerlink li a').last().addClass('borderless');
});
</script>
                   <aside>
                       <h4>Our Clients</h4>
                <ul id="carousel" class="jcarousel-skin-tango">
                      <? $sql ="select * from clients"; 
                            $client = $obj->select($sql);
                            $num_row = count($client);
                            $rows=0;
                      for($m=0;$m<$num_row;$m++)
                        { 
                        $rows++;
                        $images = array($client[$m]["logo"]);
                       ?>
                            <? foreach ($images as $image){?>
                    <li><a href="<?=$client[$m]["url"]?"http://".$client[$m]["url"]:""?>" target="_blank"><img src="admin/client/<?=$image?>" width="130" height="65" alt="" /></a></li>
                            <?}?>
                          
                         <?}?>
                </ul>
                   </aside>
           </div>
       </div>
        </div>
    </section>
    
    </div> <!-- End of wrapper -->
     </div> <!-- End of body2 -->
</div><!-- End of bg2 -->
</div><!-- End of bg -->
<div class="clear"></div>
           </div>
           <div class="clear"></div>
<div class="top_footer"></div>
<footer>
      <div class="main">
          <aside class="contact">
              <h4>Contact Us</h4>
                <form id="contact-form">
                        <div class="success"> Contact form submitted! We will be in touch soon.</div>
                        <fieldset>
                            <input type="hidden" value="roy@salesdriveuk.co.uk" name="owner_email" />
                            <label class="name">
                                <input type="text" value="Your Name:" name="name">
                                <span class="error">*This is not a valid name.</span>
                                <span class="empty">*This field is required.</span>
                            </label>
                            <label class="phone">
                                <input type="text" value="Telephone:" name="phone">
                                <span class="error">*This is not a valid phone number.</span>
                                <span class="empty">*This field is required.</span>
                            </label>
                            <label class="email">
                                <input type="text" value="E-mail:" name="email">
                                <span class="error">*This is not a valid email address.</span>
                                <span class="empty">*This field is required.</span>
                            </label>
                            <label class="message">
                                <textarea name="message">Message:</textarea>
                                <span class="error">*The message is too short.</span>
                                <span class="empty">*This field is required.</span>
                            </label>
                           <input type="submit" name="submit" value="" class="fright" />
                        </fieldset>
                    </form>
            
          </aside>
          <aside class="help_case">
          <aside class="suffix_31">
              <h4>Let us help you</h4>
             <?include('let-us-help-footer.php')?>
            
          </aside>
          <aside class="grid_31">
              <h4>Client case study</h4>
             <?include('client-case-footer.php')?>
            
          </aside>
              
              <blockquote class="quotes">
                	<h4>Success Stories</h4>
                          <ul id="carousel2" class="jcarousel-skin-tango">
                      <? $sql ="select * from webpages WHERE iCateoryId = 8"; 
                         $data = $obj->select($sql);
                            $num_row = count($data);
                            $rows=0;
                      for($m=0;$m<$num_row;$m++)
                        {?>
                             <li>
                                    <h6><?=stripslashes($data[$m]['vWebPageName']);?></h6>
                                 
                                     <?=stripslashes($data[$m]['tWebPageDesc']);?>
                             </li>
                         <?}?>
                    </ul>
                </blockquote>
          </aside>
          <aside class="address last">
          <aside class="grid_31">
              <h4>Sales Drive (UK) Limited</h4>
              <address>
                  5, Elizabeth Jennings Way<br/>
                  Oxford, OX2 7EJ. <br/>
              </address>
              <span>E: info@salesdriveuk.co.uk</span>
              <span>T: 0800 865 4800</span><br/>
              <figure>
                  <a href="#">
                      <img class="normalTip" src="images/bbm_barcode2.png" width="185" height="150" title="Blackberry Messanger - Please scan barcode"/>
                  </a>
                  
              </figure>
          </aside>
          </aside>


          <div class="clear" ></div>
      </div>
</footer>
<div class="top_footer" style="height: 40px">
     <div class="main copyright">
          <div class="fleft">
              All rights reserved. &copy; 2012 Sales Drive (UK) LTD. <a href="privacy-policy.php">Privacy Policy</a> |  <a href="disclaimer.php">Legal</a> |  <a href="sitemap.php">Sitemap</a> 
      </div>
      <div class="fright" style="margin-right: 44px ">
          Web Design By <a href="http://www.connektor.co.uk" target="_blank">Connektor</a>
      </div>
          <div class="clear" ></div>
          </div> 
    </div>
          <div id="footerlink">
                <ul>
                      <? $fsql ="select * from footerlink"; 
                         $fdata = $obj->select($fsql);
                         $num_rows = count($fdata);
                        for($i=0;$i<$num_rows;$i++)
                        {?>
                             <li>
                                 
                                 <a href="<?=$fdata[$i]['fLurl']?>"><?=$fdata[$i]['fLName']?></a>
                             </li>
                         <?}?>
                  </ul>
              <div class="clear" ></div>
          </div>
        <script type="text/javascript">
        swfobject.registerObject("FlashID");
         </script>      
 
