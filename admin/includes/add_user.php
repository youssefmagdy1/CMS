<?php 
    if (isset($_POST['create_user'])){
        
        $username= $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'] ;
        $user_img = $_FILES['image']['name'];
        $user_img_temp = $_FILES['image']['tmp_name'];
        $user_password =$_POST['user_password'];
        $user_role =$_POST['user_role'];
       
        move_uploaded_file($user_img_temp , "../images/$user_img");  

    $sql = "INSERT INTO users (`username`,`user_firstname`, `user_lastname`,`user_email`,`user_password` ,  `user_img` ,user_role ,randSalt )";
    $sql .= " VALUE ('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_img}' , '$user_role' ,'') ";
    
    $insert_user_query = mysqli_query($conn ,$sql);
    if (!$insert_user_query) die(mysqli_error($conn)) ; 
    else { echo ' <div class="alert alert-success" role="alert">
                    user created   <a href="users.php">VIEW users </a>
                  </div>' ; }
    }
?>



<form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="title">username</label>
        <input type="text" class="form-control" name="username">
    </div>


    <div class="form-group">
       <label for="users">First name :</label>
       <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
       <label for="users">Last name :</label>
       <input type="text" class="form-control" name="user_lastname">
    </div>

   <div class="form-group">
        <label for="user_role">role</label>
        <select name="user_role" id="">
          <option value="admin">admin</option>
          <option value="subscribe">subscribe</option>
        </select>
    </div> 

    <div class="form-group">
        <label for="user_image">user Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="user_tags"> Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
      
    <div class="form-group">
        <label for="user_content">Password :</label>
        <input type="password" class="form-control" name="user_password">
    </div>
      
      

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add user">
    </div>


</form>
    
