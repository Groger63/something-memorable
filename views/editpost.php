<?php include('header.php');?>

<section id="one" class="wrapper style1">
  <div class="inner">
    <section id="three" class="wrapper style3 special">
      <div class="inner">
        <header class="major narrow ">
        <h1>Edit post</h1>
          <form   enctype="multipart/form-data" method="post" action="editpost">
           <?php  

           echo '
           <p>Edit post Title:</p><input value="'.$post->getPost_title().'" name="post_title" type="text">
           <p>Edit post Content:</p><textarea rows="20" name="post_content" >'.$post->getPost_content().' </textarea>
           <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
           <div>';
                     if(isset($data['uploadfile'])){
            echo $data['uploadfile'].'<br>';
          }
          echo 'Upload new Picture
           <input name="imagepost" type="file" /></div>
           <input type="hidden" value="'.$post->getPost_id().'" name="post_id" >
           <input type="submit" value="edit" name="edit" >
           <input type="submit" value="deletepost" name="edit" >         

         </form>
         <div class="image-grid">';
           foreach ($post->getImagesPost() as $img) {
             echo '
             <form   enctype="multipart/form-data" method="post" action="editpost">
              <div>
                <a target="_blank" class="image" href="'.$img->getFile_path().'"><img src="'.$img->getFile_path().'"></img></a>

                 <input type="hidden" value="'.$post->getPost_id().'" name="post_id" >
                <input type="hidden" value="'.$img->getImg_id().'" name="img_id" >
                <input type="submit" value="deleteimg" name="edit" >

              </div>
            </form>';
          }
          echo'
             <form   enctype="multipart/form-data" method="post" action="editpost"> ';


          echo '

            </form>';
          ?>

        </div>
      </section>

    </div>
  </section>

  <?php include("footer.html");?>

