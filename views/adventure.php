<?php include('header.php');?>

            <section id="one" class="wrapper style1">
                <div class="inner">
                <section id="three" class="wrapper style3 special">
                    <div class="inner">
                        <header class="major narrow ">
                           <?php  <h2></h2>
                            
                                foreach ($data as $msgerror) {
                                    echo '<p>'.$msgerror.'</p>';
                                }
                           

                            </header>
                             ?>

                    </div>
                </section>

                </div>
            </section>

<?php include("footer.html");?>

