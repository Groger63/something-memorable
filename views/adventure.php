<?php include('header.php');?>

<section id="one" class="wrapper style1">
    <div class="inner">
        <section id="three" class="wrapper style3 special">
            <div class="inner">
                <header class="major narrow ">
                   <?php  
                     echo '<h1>'.$post->getPost_title().'</h1>';
                     echo '<p>'.$post->getPost_content().'</p>';
                      echo '<div class="image-grid">';
                     foreach ($post->getImagesPost() as $img) {
                       echo '<a target="_blank" class="image" href="'.$img->getFile_path().'"><img src="'.$img->getFile_path().'"></img></a>';
                      }
                      echo '</div>';
                     if($post->getVote_post()!=NULL){
                      echo '<P>';
                        foreach ($post->getVote_post() as $vote) {
                          echo $vote->getUser()->getDisplayname().' ';
                       }
                       echo 'voted for this adventure!</p>';
                     }
                     

                    $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'unregisteredUser' ;
                    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'unknownuser' ;

                    if($role=="reader"||($role=="author"&&$post->getUsername()!=$username)){
                      echo '
                        <form action="" method="POST">
                            <input type="hidden" value="vote" name="action" id="action"/>
                            <input type="hidden" name="id_adv" value="'.$post->getPost_id().'" id="action"/>
                            <input type="hidden" name="username" value="'.$_SESSION['username'].'" id="action"/>
                            <input type="submit" value="Vote for this story" name="vote" id="vote" />
                        </form>';
                     }

                   ?>

               </div>
           </section>

       </div>
   </section>

<?php include("footer.html");?>

