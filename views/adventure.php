<?php include('header.php');?>

<section id="one" class="wrapper style1">
    <div class="inner">
        <section id="three" class="wrapper style3 special">
            <div class="inner">
                <header class="major narrow ">
                   <?php  
                   ini_set('display_errors', 1);
                   ini_set('display_startup_errors', 1);
                   error_reporting(E_ALL);
                   echo $post->getPost_id();
                   echo $post->getPost_content();
                   ?>

               </div>
           </section>

       </div>
   </section>

   <?php include("footer.html");?>

