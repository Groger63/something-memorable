
<?php include('header.php');?>

<section id="one" class="wrapper style1">
  <div class="inner">
    <section id="three" class="wrapper style3 special">
      <div class="inner">
        <header class="major narrow ">
          <h1>Author DashBoard</h1>
          <h2><a href='addpost' >New post</a></h2>
        </header>
        <h2>My stories</h2>
        <?php
        if (isset($data['stories'])) {
          $count = 0;
          foreach ( $data['stories'] as $value ) {
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
              <a name="button_more" type="submit" href="editpost/'.$value->getPost_id().'" class="button alt">Edit</a>
              </li>
            </ul>
          </div>
        </article>';
        $count ++;
      }
    }
    ?>

  </div>
</section>

</div>
</section>

<?php include("footer.html");?>