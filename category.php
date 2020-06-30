<?php include "includes/header.php" ?>


  <!-- Navigation -->

  <?php include "includes/navigation.php" ?>


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

          <?php

            if(isset($_GET['category'])){

               $post_category_id =  $_GET['category'];

           
                          
          $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ";

          $select_all_posts_query = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($select_all_posts_query)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'],0,400);
          $post_status = $row['post_status'];



          ?>


              <!-- Blog Post -->
              <div class="card mb-4">
                 <a href="post.php?p_id=<?php echo $post_id; ?>" > <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap"> </a>
                  <div class="card-body">
                  <a href="post.php?p_id=<?php echo $post_id; ?>" > <h2 class="card-title"><?php echo $post_title; ?></h2></a>
                      <p class="card-text"><?php echo $post_content; ?></p>
                      <a href="#" class="btn btn-primary">Read More &rarr;</a>
                  </div>
                  <div class="card-footer text-muted">
                      Posted on <?php echo $post_date; ?> by
                      <a href="#"><?php echo $post_author; ?></a>
                  </div>
              </div>


          <?php } }?>

      </div>

      <!-- Sidebar Widgets Column -->

      <?php include "includes/sidebar.php" ?>


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include "includes/footer.php" ?>
