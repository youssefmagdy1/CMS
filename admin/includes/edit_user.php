<?php 


if (isset($_GET['user'])){
   
    $user_id=$_GET['user'];
 
    $query = "SELECT * FROM users WHERE `user_id` =$user_id ";
    $select_all_users_query = mysqli_query($conn ,$query);
    confirm_query($select_all_users_query);

    while($row = mysqli_fetch_assoc($select_all_users_query)){     
        
        $user_id =  $row['user_id'];
        $username =  $row['username'];
        $user_firstname =  $row['user_firstname'];
        $user_lastname =  $row['user_lastname'];
        $user_email =  $row['user_email'];
        $user_img =  $row['user_img'];
        $user_role =  $row['user_role'];
        $user_password =  $row['user_password'];
        $user_role = $row['user_role'];
    }
}

if(isset($_POST['update_user'])){
        
    $username =  $_POST['username'];
    $user_firstname =  $_POST['user_firstname'];
    $user_lastname =  $_POST['user_lastname'];
    $user_email =  $_POST['user_email'];
    if(!empty($_FILES['image']['name'])){
        $user_img = $_FILES['image']['name'];
        $user_img_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($user_img_temp , "../images/$user_img");
    }   
    $user_password = password_hash($_POST['user_password'],PASSWORD_BCRYPT);
    $user_role = $_POST['user_role'];

    $sql = "UPDATE  users SET ";
    $sql .= "`username`='$username' ,";
    $sql .= "`user_firstname`='$user_firstname' ,";
    $sql .= "`user_lastname`= '$user_lastname' ,";
    $sql .= "`user_email`='$user_email' ,";
    $sql .= "`user_img`= '$user_img' ,";
    $sql .= "`user_role` = '$user_role' ,";
    $sql .= "`user_password` = '$user_password' ";
    $sql .= "WHERE `user_id`='$user_id'; ";

    $update_user_query = mysqli_query($conn ,$sql);
    // confirm_query($update_user_query); 
    if(!$update_user_query) {die(mysqli_error($conn));}
     else {echo "<div class='alert alert-success' role='alert'> Done  " ."<a href='users.php' class='alert-link'>View users </a> </div>" ; } 
}

?>



<form action="" method="post" enctype="multipart/form-data">    
    
    <div class="form-group">
        <label for="title">username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>

   <div class="form-group">
        <label for="user_role">role</label>
        <select name="user_role" id="">
          <option value="admin" >admin</option>
          <option value="subscribe" <?php if($user_role=="subscriber")echo"selected" ?>>subscribe</option>
        </select>
    </div> 


    <div class="form-group">
       <label for="users">First name :</label>
       <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?> ">
    </div>

    <div class="form-group">
       <label for="users">Last name :</label>
       <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?> ">
    </div>


    <div class="form-group">
        <img src="../images/<?php echo $user_img ?>" alt="" srcset="" width ="100" hight="100">
        <label for="user_image">user Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="user_tags"> Email</label>
        <input type="text" class="form-control" name="user_email" value="<?php echo $user_email ?>">
    </div>
      
    <div class="form-group">
        <label for="user_content">Password :</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?> ">
    </div>
      
      

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update">
    </div>


</form>
