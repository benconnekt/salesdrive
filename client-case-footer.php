<ol>
                          <? $sql="select * from webpages WHERE iCateoryId = 11 LIMIT 0,5 "; 
                            $help = $obj->select($sql);
                            $num_row = count($help);
                        $rows=0;
                        for($m=0;$m<$num_row;$m++)
                        { 
                        $rows++;
                        
                       ?>
                                <li><a href="client-case-study.php#cl_<?=$help[$m]['iWebPageId'];?>"><?=stripslashes($help[$m]['vWebPageName']);?></a></li>

                         <?}?>
</ol>