<?php include('header.php');?>



            <form action ="search" method="POST">
                    <input name='searchtags' placeholder="" type="text"  />
                    <select name='searchtype'>
                        <option value="keyword">By Keyword</option>
                        <option value="author">By Author</option>
                    </select>
                    <input type="submit" value="searchpost" name="search" id="Search" />
                
            </form>




            <section id="one" class="wrapper style1">
                <div class="inner">
                <h1> Search page</h1>
                 <?php
                     if (isset($data['data'])) {
                                    $count = 0;
                                foreach ($data['data'] as $value){
                                    echo '
                    <article class="feature ';
                    echo (($count%2 == 0) ? 'right"':'left"').'>
                        <div class="content">
                            <h2>'.$value->getPost_title().'</h2>
                            <p>'.$value->getPost_content().'</p>';
                            foreach ($value->getImagesPost() as $img) {
                                echo '<span class="image"><a target="_blank" href="'.$img->getFile_path().'"><img src="'.$img->getFile_path().'"></img></a></span>';
                                if(null!==$img->getCoordinates()){
                                    echo '<a target="_blank"  href="https://www.google.com/maps/place/'.$img->getCoordinates().'">See on the map</a>';
                                }
                            }
                            echo '<ul class="actions">
                                <li>
                                    <a name="button_more" type="submit" href="showadventure/'.$value->getPost_id().'" class="button alt">More</a>
                                </li>
                            </ul>
                        </div>
                    </article>';
                    $count ++;
                }
                }?>
     

                </div>
            </section>

<?php include("footer.html");?>

