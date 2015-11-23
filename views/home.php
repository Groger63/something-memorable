<?php include('header.php');?>
        <!-- Banner -->
            <section id="banner">
                <i class="icon fa-diamond"></i>
                <h2>This is our Blog website</h2>
                <p>Just wait for it, it's gonna be legen...DARY</p>
                <ul class="actions">
                    <li><a  class="button big special">Pointless Button</a></li>
                </ul>
            </section>
            <section id="one" class="wrapper style1">
                <div class="inner">
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
                <nav>
                    <ul>
                    <?php 
                        for($i=1;$i<=$data['pages'];$i++)
                            echo '<li><a href="home/'.$i.'">Page'.$i.'</a></li>';
                        ?>
                    </ul>


                </nav>

                </div>
            </section>

<?php include("footer.html");?>

