<ul>
                          <? $sql="select * from webpages WHERE iCateoryId = 10 LIMIT 0,5 "; 
                            $help = $obj->select($sql);
                            $num_row = count($help);
                        $rows=0;
                        for($m=0;$m<$num_row;$m++)
                        { 
                        $rows++;
                        
                       ?>
                                <li><a href="let-us-help-you.php#lt_<?=$help[$m]['iWebPageId'];?>"><?=stripslashes($help[$m]['vWebPageName']);?></a></li>

                         <?}?>
</ul>