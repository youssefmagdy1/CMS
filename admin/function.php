<?php
 
function confirm_query($result){
    global $conn ;
    if(!$result) { die("falid".mysqli_error($conn));}
}
 



//catgory
function insert_catgory(){
    global $conn ; 
    $cat_name = $_POST['cat_title'];
    if($cat_name==""||empty($cat_name))
        echo " this filed should't be empty";
    else {
        $query ="INSERT INTO catgory(`cat-name`) VALUE ('{$cat_name}')";
        $insert_catgory = mysqli_query($conn ,$query);
        confirm_query($insert_catgory) ;        
    }
    
}

function displaying_catgory(){
    global $conn ; 
    $sql = "SELECT * FROM catgory ";
    $select_catgory = mysqli_query($conn,$sql);
    if(!$select_catgory)  die("falid".mysqli_error($conn));
    else{
        while($row = mysqli_fetch_assoc($select_catgory)){
         $cat_id = $row['cat-id'];
         $cat_na = $row['cat-name'];
         echo " <tr> 
                    <td>  {$cat_id} </td>
                    <td>  {$cat_na}  </td>
                    <td><a href='catgory.php?delete= {$cat_id}'>Delete</td>
                    <td><a href='catgory.php?edit= {$cat_id}'>Edit</td>
                </tr>" ;
        }
    }
}


function delete_catgory(){
    global $conn ; 
    $deleted_id = $_GET['delete'];
    $sql = "DELETE FROM catgory WHERE `cat-id`={$deleted_id}";
    $deleted_id_query = mysqli_query($conn ,$sql);
    header("Location: catgory.php");
    
}

//posts

function delete_post($id){
    global $conn ;  
    $sql = "DELETE FROM comments WHERE `comment_post_id`={$id}";
    $deleted_comment_id_query = mysqli_query($conn ,$sql);
    $sql = "DELETE FROM posts WHERE `post-id`={$id}";  
    $deleted_id_query = mysqli_query($conn ,$sql);
    header("Location: posts.php");        
}

function publish_post($id){
    global $conn ; 
    $sql = "UPDATE posts SET `post-state`='published' WHERE `post-id`= $id";
    $aprrove_comment_query = mysqli_query($conn ,$sql);
    header("Location: posts.php");
}
function unpublish_post($id){
    global $conn ; 
    $sql = "UPDATE posts SET `post-state`='unpublished' WHERE `post-id`= $id";
    $aprrove_comment_query = mysqli_query($conn ,$sql);
    header("Location: posts.php");
    
}   
function clone_post($id){
    global $conn ; 
    $sql = "SELECT * FROM posts WHERE `post-id`=$id ";
    $clone_post_query = mysqli_query($conn,$sql);
    if(!$clone_post_query) 
        die("falid".mysqli_error($conn));
    else{
        while($row = mysqli_fetch_assoc($clone_post_query)){

            $post_id =  $row['post-id'];
            $post_catgory_id =  $row['post-catgory-id'];
            $post_title =  $row['post-title'];
            $post_aurther =  $row['post-aurther'];
            $post_date =  $row['post-date'];
            $post_img =  $row['post-img'];
            $post_tags =  $row['post_tags'];
            $post_content= $row['post-contant'];
            $post_state =  $row['post-state'];
        }
         

    $sql = "INSERT INTO posts (`post-catgory-id`,`post-title`, `post-aurther`,`post-img`,`post-contant`,`post_tags`, `post-state`)";
    $sql .= " VALUE ('{$post_catgory_id}','{$post_title}','{$post_aurther}','{$post_img}','{$post_content}','{$post_tags}','{$post_state}') ";
    
    $insert_clone_post_query = mysqli_query($conn ,$sql);
    if (!$insert_clone_post_query) die(mysqli_error($conn)) ; 
   
    }




}

// comments

function delete_comment($id){
    global $conn ;  
    $sql = "DELETE FROM comments WHERE `comment_id`={$id}";
    $deleted_id_query = mysqli_query($conn ,$sql);
    header("Location: comments.php");        
}
function aprrove_comment($id){
    global $conn ; 
    $sql = "UPDATE comments SET `comment_status`='approve' WHERE comment_id= $id";
    $aprrove_comment_query = mysqli_query($conn ,$sql);
    header("Location: comments.php");
    
}
function unaprrove_comment($id){
    global $conn ; 
    $sql = "UPDATE comments SET `comment_status`='unapprove' WHERE comment_id= $id";
    $unaprrove_comment_query = mysqli_query($conn ,$sql);
    header("Location: comments.php");
}

//users
function delete_user($id){
    global $conn ;  
    $sql = "DELETE FROM users WHERE `user_id`={$id}";
    $deleted_id_query = mysqli_query($conn ,$sql);
    header("Location: users.php");        
}
function user_admin($id){
    global $conn ; 
    $sql = "UPDATE users SET `user_role`='admin' WHERE `user_id`= $id";
    $user_amdin_query = mysqli_query($conn ,$sql);
    header("Location: users.php");
    
}
function user_subscribe($id){
    global $conn ; 
    $sql = "UPDATE users SET `user_role`='subscriber' WHERE `user_id`= $id";
    $user_amdin_query = mysqli_query($conn ,$sql);
    header("Location: users.php");
    
}

?>