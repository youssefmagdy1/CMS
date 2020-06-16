<?php 
    if (isset($_GET['post'])){

        $post_id=$_GET['post'];
 
        $query = "SELECT * FROM posts WHERE `post-id` ='$post_id' ";
        $select_all_post_query = mysqli_query($conn ,$query);
        confirm_query($select_all_post_query);

        while($row = mysqli_fetch_assoc($select_all_post_query)){     
        
            $post_title= $row['post-title'];
            $post_catgory = $row['post-catgory-id'];
            $post_user = $row['post-aurther'];
            $post_status = $row['post-state'] ;
            $post_img = $row['post-img'];
            $post_tags =$row['post_tags'];
            $post_content = $row['post-contant'];
            $post_date = $row['post-date'];
            $post_comment_count =  $row['post-commet-count'] ;
        }
    }

    if(isset($_POST['update_post'])){
        
        $post_title= $_POST['title'];
        $post_catgory = $_POST['catgory'];
        $post_user = $_POST['post_user'];
        $post_status = $_POST['post_status'] ;
        if(!empty($_FILES['image']['name'])){
            $post_img = $_FILES['image']['name'];
            $post_img_temp = $_FILES['image']['tmp_name'];
        }   
        $post_tags =$_POST['post_tags'];
        $post_content = $_POST['post_content'];
        //$post_comment_count =  4 ;

        $sql = "UPDATE  posts SET ";
        $sql .= "`post-catgory-id`='$post_catgory' ,";
        $sql .= "`post-title`='$post_title' ,";
        $sql .= "`post-aurther`='$post_user' ,";
        $sql .= "`post-img`= '$post_img' ,";
        $sql .= "`post-contant`='$post_content' ,";
        $sql .= "`post_tags`= '$post_tags' ,";
        $sql .= "`post-commet-count` = '$post_comment_count' ,";
        $sql .= "`post-state`='$post_status' ";
        $sql .= "WHERE `post-id`='$post_id'; ";

        move_uploaded_file($post_img_temp , "../images/$post_img");
        
        $update_post_query = mysqli_multi_query($conn ,$sql);
        confirm_query($update_post_query); 
        echo " user created" ."<a href='posts.php'>VIEW posts </a>" ; 
    }
?>


<form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title ;?>">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select name="catgory" id="">
        <?php
            $query = "SELECT * FROM catgory";
            $select_all_catgory_query = mysqli_query($conn ,$query);
            while($row = mysqli_fetch_assoc($select_all_catgory_query)) 
                echo "<option value='{$row['cat-id']}'>{$row['cat-name']}</option>";                   
        ?>
        </select>
    </div>


    <div class="form-group">
       <label for="users">Users</label>
       <input type="text" class="form-control" name="post_user" value="<?php echo $post_user;?>">
    </div>

    <div class="form-group">
         <select name="post_status" id="" value="<?php echo $post_status ;?>">
             
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="100" src="../images/<?php echo $post_img ;?>" alt="" srcset="">
         <input type="file"  name="image" >
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ;?>">
    </div>
      
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control "name="post_content" id="" cols="30" rows="10" > 
          <?php echo $post_content ;?>    
        </textarea>
    </div>
      
      

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>


</form>
    
<?php



 ?> 