<? $sqltop="select * from webpages WHERE iCateoryId = 9 order by iWebPageId desc LIMIT 0, 10"; 
   $topten = $obj->select($sqltop);
?>
                        <div class="top_ten">
                        <center><h5>Top Ten Tips</h5></center>
                        <? $number_of_categories = count($topten);
                        $rows=0;
                        for($m=0;$m<count($topten);$m++)
                        { 
                            $rows++;
                       ?>
                            <div class="indent-bot">
                                <strong class="dropcap" ><?=$m+1?></strong>
                                <div class="extra-wrap"><a href="top-ten-tips.php?id=<?=$topten[$m]['iWebPageId']?>#<?=$topten[$m]['vWebPageName'];?>"><?=$topten[$m]['vWebPageName'];?></a> </div>
                            </div>
                         <?}?>
                        </div>
