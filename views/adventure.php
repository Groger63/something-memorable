<?php include('header.php');?>

<section id="one" class="wrapper style1">
    <div class="inner">
        <section id="three" class="wrapper style3 special">
            <div class="inner">
                <header class="major narrow ">
                   <?php  
                     echo '<p>Posted:'.$post->getDate_time_posted().'</p>';
                     if($post->getDate_time_posted()!=$post->getDate_last_edited()){
                      echo '<p>Edited:'.$post->getDate_last_edited().'</p>';
                     }



                     echo '<p>By:<a href=search/author/'.$post->getUsername().'>'.$post->getUsername().'</a></p>';
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
                        </form>';///vote

                        if($post->getComments()!=NULL){
                          foreach ($post->getComments() as $comment) {
                            echo'
                              <div >
                                <p>Comment posted by:'.$comment->getUser()->getDisplayname().'</p><p>'.

                             $comment->getMessage();'</p>'; //
                          }
                        }

                        echo '
                        <form action="" method="POST">
                          <p>Type a comment</p>';
                             if(isset($data["comment"]))echo $data["comment"];
                             echo '
                            <textarea > </textarea>
                            <input type="hidden" value="commentpost" name="action" id="action"/>
                            <input type="hidden" name="id_adv" value="'.$post->getPost_id().'" id="action"/>
                            <input type="hidden" name="username" value="'.$_SESSION['username'].'" id="action"/>
                            <input type="submit" value="Comment this story" name="Comment" id="vote" />
                        </form>';



                     }

                   ?>

               </div>
           </section>

       </div>
   </section>

<?php include("footer.html");?>

