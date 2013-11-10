<? 
      $sqlnews="select * from news order by iNewsId desc LIMIT 0, 3"; 
      $rev_news = $obj->select($sqlnews);
      $divs = 2;
?>
<div class="fleft">
                         <h4>Latest News</h4>

  <!-- Open the first div. PLEASE put the CSS in a .css file; inline used for brevity -->
<aside class="fleft"><article class="outer_latest"><article class="latest_news useful-link">

<!-- Main printing loop.-->
<? $num_rows = count($rev_news);
for($i = 0; $i<$num_rows; $i++)
{?>

                <article>
                    <? $date = date("l, F d, Y",strtotime($rev_news[$i]['vNewDate']));?>
                               <h6><?=$date;?></h6>
                               <aside>
                                   <p><?= stripslashes($rev_news[$i]['vNewTitle']); ?> <a href="newsdetails.php?id=<?=$rev_news[$i]['iNewsId']."#news_".$rev_news[$i]['iNewsId'];?>">Read More&gt;&gt;</a>
                                   </p>
                               </aside>
               </article> <!--Add a cell and your content-->
   
<?}?>
               
                                 <aside>
                                     <a href="archive.php" class="fright v">View All&gt;&gt;</a>
                                 </aside>
             </article>
    </article>
  </aside>
</div>


<div class="fright">
                         <h4>Useful Links</h4>

<aside class="fleft"><article class="outer_latest"><article class="latest_news useful-link">

                             <? 
                                        $sqlink="select * from ulinks ORDER BY uId DESC LIMIT 0, 3"; 
                                        $ulink = $obj->select($sqlink);
                                        $count = count($ulink);
                                    for($m=0;$m<$count;$m++)
                                    { 
                                   ?>
                    
                                    <aside>
                                    <h6><?=stripslashes($ulink[$m]['utitle']);?></h6>
                                   <span>
                                       <p>
                                       <a href="http://<?=$ulink[$m]['url']?>" target="_blank"><?=stripslashes($ulink[$m]['url']);?></a>
                                       </p>
                                   </span>
                               </aside>

                                     <?}?>
            
                                 <aside>
                                     <a href="useful-links.php" class="fright v">View All&gt;&gt;</a>
                                 </aside>
   
             </article>
    </article>
  </aside>
</div>

  


