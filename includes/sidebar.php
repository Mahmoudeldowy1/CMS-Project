
<div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
          <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
           </div>
          </div>
        </div>


                <!-- Login -->
                <div class="card my-4">
          <h5 class="card-header">Login</h5>
          <div class="card-body">

          <form action="login.php" method="post">
          <div class="form-group">
              <input name="username" type="text" class="form-control" placeholder="Enter Username">
          </div>

            <div class="input-group">
              <input name="password" type="password" class="form-control" placeholder="Enter Password">
              <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Submit
                </button>
              </span>
            </div>

             </form>
           </div>
        </div>






        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
          <div class="row">
          <div class="col-lg-12">
             <ul class="list-unstyled">
                              
                            <?php 

                            $query = "SELECT * FROM categories";
                            $select_categories_sidebar = mysqli_query($connection,$query);         
                            
                            while($row = mysqli_fetch_assoc($select_categories_sidebar )) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];

                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

                            }
                    
                            ?>
                              
              </ul>
          </div>
                        
            </div>
          </div>
        </div>

        <!-- Side Widget -->

        <?php include "widget.php" ?>


      </div>