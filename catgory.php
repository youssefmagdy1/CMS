
<?php include 'includes/header.php'  ;?>

<!-- Navigation -->
<?php include 'includes/nav.php' ; ?> 

<!-- Page Content -->
<div class="container">

    <div class="row">

       
        <div class="col-md-8">
        <!-- First Blog Post -->
        <?php

            if (isset($_GET['catgory'])){
            $catgory_id = $_GET['catgory'];
                    
            $query = "SELECT * FROM posts WHERE `post-catgory-id`={$catgory_id} AND `post-state`='published'";
            $select_all_post_catgory_query = mysqli_query($conn ,$query);

            $posts_num = mysqli_num_rows($select_all_post_catgory_query);
            if($posts_num==0) echo "<h1>No Posts </h1>" ;
            else{
                while($row = mysqli_fetch_assoc($select_all_post_catgory_query)){
                       
                    $post_id =  $row['post-id'];
                    $post_title =  $row['post-title'];
                    $post_aurther =  $row['post-aurther'];
                    $post_date =  $row['post-date'];
                    $post_img =  $row['post-img'];
                    $post_contant =  $row['post-contant'];
               
        ?>
            <h2>
                <a href="post.php?post=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
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

        <?php  }}} ?>

            <hr>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include 'includes/side_bar.php'; ?> 

    </div>
    <!-- /.row -->

    <hr>
<?php include 'includes/footer.php'; ?> 