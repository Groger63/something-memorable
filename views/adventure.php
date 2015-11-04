<?php include('header.php');?>

<section id="one" class="wrapper style1">
    <div class="inner">
        <section id="three" class="wrapper style3 special">
            <div class="inner">
                <header class="major narrow ">
                   <?php  
                     echo '<h1>'.$post->getPost_title().'</h1>';
                     echo '<p>'.$post->getPost_content().'</p>';
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
                      echo '<a href="index.php?action=vote&id_adv='.$post->getPost_id().'&username='.$_SESSION['username'].'">Vote for this story</a>';
                    }

                   ?>

               </div>
           </section>

       </div>
   </section>

<?php include("footer.html");?>

