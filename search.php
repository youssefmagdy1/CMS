
<?php include 'includes/header.php'  ;?>

    <!-- Navigation -->
<?php include 'includes/nav.php' ; ?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">
           
            <div class="col-md-8">
            <!-- First Blog Post -->
            <?php
              if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $query = "SELECT * FROM posts WHERE post_tags  LIKE '%$search%'";
                $search_query = mysqli_query($conn , $query);
                if(!$search_query){
                    die("failed".mysqli_error($conn));
                }
                $search_query_rows = mysqli_num_rows($search_query);
                if($search_query_rows==0){
                    echo "<h1>NO result </h1>" ; 
                }
                else{             
                    while($row = mysqli_fetch_assoc($search_query)){               
                        $post_title =  $row['post-title'];
                        $post_aurther =  $row['post-aurther'];
                        $post_date =  $row['post-date'];
                        $post_img =  $row['post-img'];
                        $post_contant =  $row['post-contant'];
            ?>
        
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_aurther?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_img ?>" alt="">
                <hr>
                <p><?php echo $post_contant ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <?php }}} ?>

                <hr>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/side_bar.php'; ?> 

        </div>
        <!-- /.row -->

        <hr>
<?php include 'includes/footer.php'; ?> 