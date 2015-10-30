<?php include('header.php');?>

            <section id="one" class="wrapper style1">
                <div class="inner">
                                                <?php
                                if (isset($data)) {
                                    $count = 0;
                                foreach ($data as $value){
                                    echo '
                    <article class="feature ';
                    echo (($count%2 == 0) ? 'right"':'left"').'>
                        <span class="image"><img src="images/pic01.jpg" alt="" /></span>
                        <div class="content">
                            <h2>'.$value->getPost_title().'</h2>
                            <p>'.$value->getPost_content().'</p>';
                            foreach ($value->getImagesPost() as $img) {
                                echo '<img src="'.$img->getFile_path().'"></img><a href="https://www.google.com/maps/place/'.$img->getCoordinates().'">See on the map</a>';
                            }
                            echo '<ul class="actions">
                                <li>
                                    <a href="#" class="button alt">More</a>
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

