<?php 
    if (isset($_POST['create_post'])){
        $post_title= $_POST['title'];
        $post_catgory = $_POST['post_category'];
        $post_user = $_POST['post_user'];
        $post_status = $_POST['post_status'] ;
        $post_img = $_FILES['image']['name'];
        $post_img_temp = $_FILES['image']['tmp_name'];
        $post_tags =$_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        // $post_comment_count =   ;

        move_uploaded_file($post_img_temp , "../images/$post_img");
    

    $sql = "INSERT INTO posts (`post-catgory-id`,`post-title`, `post-aurther`,`post-img`,`post-contant`,`post_tags`, `post-state`)";
    $sql .= " VALUE ('{$post_catgory}','{$post_title}','{$post_user}','{$post_img}','{$post_content}','{$post_tags}','{$post_status}') ";
    
    $insert_post_query = mysqli_query($conn ,$sql);
    if (!$insert_post_query) die(mysqli_error($conn)) ; 
    else {echo " user created" ."<a href='posts.php'>VIEW Posts</a>" ;  }
    }
?>


<form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category" id="">
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
       <input type="text" class="form-control" name="post_user">
    </div>

    <div class="form-group">
         <select name="post_status" id="">
             <option value="draft">Post Status</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
      
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control "name="post_content" id="editor" cols="30" rows="10"> </textarea>
    </div>
   



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>
    
