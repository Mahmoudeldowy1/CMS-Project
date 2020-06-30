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

            if(isset($_GET['author'])){

                $the_post_author = $_GET['author'];


                $query = "SELECT * FROM posts WHERE post_author = '$the_post_author' ";
                $select_post_query = mysqli_query($connection,$query);

                if(!$select_post_query){
                    die("QUERY FAILED. " . mysqli_error($connection));
                }

                while($row = mysqli_fetch_assoc($select_post_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content =$row['post_content'];
                    $post_status = $row['post_status'];

                    ?>

                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <a href="post.php?p_id=<?php echo $post_id; ?>" > <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap"> </a>
                        <div class="card-body">
                            <a href="post.php?p_id=<?php echo $post_id; ?>" > <h2 class="card-title"><?php echo $post_title; ?></h2></a>
                            <p class="card-text"><?php echo $post_content; ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo $post_date; ?> by
                             All Posts by <?php echo $post_author; ?>
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
