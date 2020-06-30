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

          $per_page = 10;


          if(isset($_GET['page'])) {


              $page = $_GET['page'];

          } else {


              $page = "";
          }


          if($page == "" || $page == 1) {

              $page_1 = 0;

          } else {

              $page_1 = ($page * $per_page) - $per_page;

          }




          $post_query_count = "SELECT * FROM posts";
          $find_count = mysqli_query($connection,$post_query_count);
          $count = mysqli_num_rows($find_count);
          $count  = ceil($count /$per_page);




          $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
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
                      <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
                  </div>
                  <div class="card-footer text-muted">
                      Posted on <?php echo $post_date; ?> by
                      <a href="author_posts.php?author=<?php echo $post_author;?>"><?php echo $post_author; ?></a>
                  </div>
              </div>


          <?php }?>

      </div>

      <!-- Sidebar Widgets Column -->

      <?php include "includes/sidebar.php" ?>


    </div>
    <!-- /.row -->


            <ul class = "pagination">
                <?php

                for($i =1; $i <= $count; $i++) {

                    if($i == $page) {

                        echo "<li class='page-item'><a class='page-link active_link' href='index.php?page={$i}'>{$i}</a></li>";


                }  else {

                        echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";

                }

                }

                ?>
            </ul>

  </div>
<!-- /.container -->


  <?php include "includes/footer.php" ?>
