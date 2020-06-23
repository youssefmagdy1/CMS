<?php include 'includes/header.php'  ;?>

<!-- Navigation -->
<?php include 'includes/nav.php' ; ?> 
<?php
if(isset($_GET['post'])){
    $post_id = $_GET['post'] ;
    $query = "SELECT * FROM posts WHERE `post-id`=$post_id";
    $select_post_query = mysqli_query($conn ,$query);
    while($row = mysqli_fetch_assoc($select_post_query)){
        $post_title =  $row['post-title'];
        $post_aurther =  $row['post-aurther'];
        $post_date =  $row['post-date'];
        $post_img =  $row['post-img'];
        $post_contant =  $row['post-contant'];
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="aurther.php?aurther=<?php echo $post_aurther?>> <?php echo $post_aurther ; ?> </a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_img ;?> " alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                 <?php echo $post_contant ;?>
                </p>

                <hr>
    <?php }}?>

                <!-- Blog Comments -->
                <?php include 'includes/comments.php' ; ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/side_bar.php' ;?> 

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php  include 'includes/footer.php' ?>