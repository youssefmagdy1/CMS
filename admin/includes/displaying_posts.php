<table class="table table-bordered table-hover">
<div class="row ">
    <div id="bulkOptionContainer" class="col-xs-4 ">
        <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
        </select>
    </div>       
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>
</div>

    <thead>
        <tr>
            <td>ID</td>
            <td>Aurther</td>
            <td>Title</td>
            <td>Catgory</td>
            <td>Status</td>
            <td>image</td>
            <td>tags</td>
            <td>comments</td>
            <td>date</td>
            <td>delete</td>
            <td>edit</td>
            <td>publish</td>
            <td>unpublis</td>
        </tr>
    </thead>
    <tbody>
       <?php $sql = "SELECT * FROM posts ";
    $select_post = mysqli_query($conn,$sql);
    if(!$select_post) 
        die("falid".mysqli_error($conn));
    else{
        while($row = mysqli_fetch_assoc($select_post)){

            $post_id =  $row['post-id'];
            $post_catgory_id =  $row['post-catgory-id'];
                $sql = "SELECT * FROM catgory WHERE `cat-id`=$post_catgory_id";
                $select_catgory = mysqli_query($conn,$sql);
                while($row2 = mysqli_fetch_assoc($select_catgory))
                    $post_catgory = $row2['cat-name'];
            $post_title =  $row['post-title'];
            $post_aurther =  $row['post-aurther'];
            $post_date =  $row['post-date'];
            $post_img =  $row['post-img'];
            $post_tags =  $row['post_tags'];
            $post_comment =  $row['post-commet-count'];
                $sql = "SELECT * FROM comments WHERE `comment_post_id`=$post_id";
                $count_comments = mysqli_query($conn,$sql);
                $comment_count= mysqli_num_rows($count_comments);
            $post_state =  $row['post-state'];

            
            echo " <tr> 
                    <td>  {$post_id} </td>
                    <td>  {$post_aurther}  </td>
                    <td>  {$post_title} </td>
                    <td>  {$post_catgory } </td>
                    <td>  {$post_state } </td> 
                    <td>  <img width='100' height='100' class='img-responsive' src='../images/{$post_img}'> </td>
                    <td>  {$post_tags} </td>
                    <td>  {$comment_count} </td>
                    <td>  {$post_date} </td>
                    <td><a href='posts.php?source=delete&post={$post_id}'>Delete</td>
                    <td><a href='posts.php?source=edit&post={$post_id}'>Edit</td>
                    <td><a href='posts.php?source=publish&post={$post_id}'>publish</td>
                    <td><a href='posts.php?source=unpuplish&post={$post_id}'>unpublish</td>
                   
                   
                </tr>" ;
        }
    }
?> 
<?php //  if(isset($_GET['delete']))delete_post(); ?>
    </tbody>
</table>