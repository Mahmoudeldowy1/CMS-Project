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

            if(isset($_GET['p_id'])){

              $the_post_id = $_GET['p_id'];

              $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";
              $select_view_post =  mysqli_query($connection,$query);
                          
          $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
          $select_post_query = mysqli_query($connection,$query);

          while($row = mysqli_fetch_assoc($select_post_query)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content =$row['post_content'];
          $post_status = $row['post_status'];
          $post_views_count = $row['post_views_count'];


          ?>


              <!-- Blog Post -->
              <div class="card mb-4">
                  <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap">
                  <div class="card-body">
                      <h2 class="card-title"><?php echo $post_title; ?></h2>
                      <p class="card-text"><?php echo $post_content; ?></p>
                  </div>
                  <div class="card-footer text-muted">
                      Posted on <?php echo $post_date; ?> by
                      <a href="#"><?php echo $post_author; ?></a>
                  </div>
              </div>


          <?php } }?>

              
            <!-- Comments Form -->

            <?php 

          if(isset($_POST['create_comment'])) {

              $the_post_id = $_GET['p_id'];
              $comment_author = $_POST['comment_author'];
              $comment_email = $_POST['comment_email'];
              $comment_content = $_POST['comment_content'];


              if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


                  $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status,comment_date)";

                  $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'unapproved',now())";

                  $create_comment_query = mysqli_query($connection, $query);

                  if (!$create_comment_query) {
                      die('QUERY FAILED' . mysqli_error($connection));


                  }
              } else {

                  echo "<script>alert('fields cannot be empty')</script>";

              }

              $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";
              $update_comment_count = mysqli_query($connection, $query);



          }

          ?> 

          <!-- Single Comment -->

          <?php 

          $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
          $query .= "AND comment_status = 'approved' ";
          $query .= "ORDER BY comment_id DESC ";
          $select_comment_query = mysqli_query($connection, $query);
          if(!$select_comment_query) {

              die('Query Failed' . mysqli_error($connection));
          }
          while ($row = mysqli_fetch_array($select_comment_query)) {
          $comment_date   = $row['comment_date']; 
          $comment_content= $row['comment_content'];
          $comment_author = $row['comment_author'];
              
              ?>
              

          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $comment_author; ?>
              <small><?php echo $comment_date;   ?></small>
            </h5>
              <?php echo $comment_content; ?>
            </div>
          </div>


          <?php } ?>



          <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
          <form action="#" method="post" role="form">

          <div class="form-group">
          <label for="Author">Author</label>
          <input type="text" name="comment_author" class="form-control" name="comment_author">
          </div>

          <div class="form-group">
          <label for="Author">Email</label>
          <input type="email" name="comment_email" class="form-control" name="comment_email">
          </div>

          <div class="form-group">
          <label for="comment">Your Comment</label>
          <textarea name="comment_content" class="form-control" rows="3"></textarea>
          </div>

          <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>

          </form>
          </div>
          </div>



      </div>

      <!-- Sidebar Widgets Column -->

      <?php include "includes/sidebar.php" ?>

    

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include "includes/footer.php" ?>
