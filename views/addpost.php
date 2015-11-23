<?php include('header.php');?>

<section id="one" class="wrapper style1">
  <div class="inner">
    <section id="three" class="wrapper style3 special">
      <div class="inner">
        <header class="major narrow ">
        <h1>New post</h1>
          <form   enctype="multipart/form-data" method="post" action="addpost">
           <?php  

           echo '
           <p>Post Title:</p><input value="';

           if(isset($data['post_title']))
           	echo $data['post_title'] ;
           echo '" name="post_title" type="text">
           <p>Edit post Content:</p><textarea rows="20" name="post_content" >';

           if(isset($data['post_content']))
           	echo $data['post_content'] ;


           echo ' </textarea>
           <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
           <div>';
           if(isset($data['uploadfile'])){
            echo $data['uploadfile'].'<br>';
          }
          echo 'Upload new Picture
           <input name="imagepost" type="file" /></div>
           <input type="submit" value="Add Post" name="addpost" >
           <input type="submit" value="deletepost" name="edit" >         

         </form>
'
          ?>

        </div>
      </section>

    </div>
  </section>

  <?php include("footer.html");?>

