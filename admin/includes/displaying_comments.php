<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>ID</td>
            <td>Aurther</td>
            <td>Email</td>
            <td>Post title</td>
            <td>Status</td>
            <td>content</td>
            <td>date</td>
            <td>delete</td>
            <td>Aproved</td>
            <td>Unaproved</td>

        </tr>
    </thead>
    <tbody>
       <?php $sql = "SELECT * FROM comments ";
    $select_comment = mysqli_query($conn,$sql);
    confirm_query($select_comment);

        while($row = mysqli_fetch_assoc($select_comment)){
            $comment_post = "";
            $comment_id =  $row['comment_id'];
            $comment_post_id =  $row['comment_post_id'];
                $sql = "SELECT * FROM posts WHERE `post-id`={$comment_post_id}";
                $select_post = mysqli_query($conn,$sql);
                while($row2 = mysqli_fetch_assoc($select_post))
                    $comment_post = $row2['post-title'];
            $comment_aurther =  $row['comment_aurtor'];
            $comment_date =  $row['comment_date'];
            $comment_email =  $row['comment_email'];
            $comment_contant =  $row['comment_contet'];
            $comment_status =  $row['comment_status'];

            $comment_contant =  substr($comment_contant,0,100) ;

           
            echo " <tr> 
                    <td>  {$comment_id} </td>                  
                    <td>  {$comment_aurther} </td>
                    <td>  {$comment_email } </td>
                    <td> <a href='../post.php?post={$comment_post_id}'>{$comment_post}</a>  </td>
                    <td>  {$comment_status } </td> 
                    <td>  {$comment_contant} </td>           
                    <td>  {$comment_date} </td>
                    <td><a href='comments.php?source=delete&comment={$comment_id}'>Delete</td>
                    <td><a href='comments.php?source=aprrove&comment={$comment_id}'>aprrove</td>
                    <td><a href='comments.php?source=unaprrove&comment={$comment_id}'>unaprove</td>               
                </tr>" ;
        }
        
?> 
<?php //  if(isset($_GET['delete']))delete_post(); ?>
    </tbody>
</table>