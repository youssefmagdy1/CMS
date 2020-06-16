<?php 
    if (isset($_POST['submit_comment']))
    {
        $comment_content = $_POST['comment'];
        $comment_user = $_POST['comment_user'];
        $comment_email = $_POST['user_email'];
        $post_id = $_GET['post'];

        $query = "INSERT INTO `comments`(comment_contet ,comment_post_id ,comment_aurtor,comment_email,comment_status) Values('$comment_content' , $post_id ,'$comment_user' ,'$comment_email' ,'draft') ";
        $insert_comment_query = mysqli_query($conn ,$query);
        if(!$insert_comment_query) die(mysqli_error($conn)); 

        // $query= "UPDATE posts SET `post-commet-count` =  `post-commet-count`+1 ";
        // $query .= "WHERE `post-id`=$post_id ";
        // $increases_comment_query = mysqli_query($conn ,$query);
        // if(!$increases_comment_query) die(mysqli_error($conn)); 

    }

?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="comment_user">Name</label>
                            <input type="text" class="form-control" name="comment_user">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <label for="comment">comment</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <?php 
                    $sql = "SELECT * FROM comments WHERE `comment_post_id`={$post_id} AND `comment_status`='approve' ORDER BY comment_id  ";
                    $show_comment_query = mysqli_query($conn ,$sql);
                    while ($row = mysqli_fetch_assoc($show_comment_query)){
                        $user_name = $row['comment_aurtor'];
                        $comment_date = $row['comment_date'];
                        $comment_content =$row['comment_contet'];                             
                ?>

                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $user_name ;?>
                            <small><?php echo  $comment_date ;?></small>
                        </h4>
                        <?php echo  $comment_content ;?>
                    </div>
                </div>
                    <?php } ?> 
                <!-- Comment -->
               