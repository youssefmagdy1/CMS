<?php 
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $checkBoxValue){
            $bulk_option = $_POST['bulk_options'];
            
            switch ($bulk_option) {
                case 'admin':
                    admin_user($checkBoxValue);
                    break;

                case 'subscriber':
                    subscriber_user($checkBoxValue);
                    break;
                
                case 'delete':
                    delete_user($checkBoxValue );
                    break;
                
                default:
                   
                    break;
            }
        }
    }
   

?>

<form action="" method="post">
<table class="table table-bordered table-hover">
<div class="row">
    <div id="bulkOptionContainer" class="col-xs-4 ">
        <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="admin">admin</option>
        <option value="subscriber">Subscriber</option>
        <option value="delete">Delete</option>
        
        </select>
    </div>       
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>
</div>
    <thead>
        <tr>
            <td><input type="checkbox" id="selectAllPosts"></td>
            <td>ID</td>
            <td>Username</td>
            <td>picture</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Email</td>
            <td>role</td>
            <td>delete</td>
            <td>edit</td>
            <td>Admin</td>
            <td>Subscriper</td>
        </tr>
    </thead>
    <tbody>
       <?php
     $sql = "SELECT * FROM users ";
    $select_user = mysqli_query($conn,$sql);
    if(!$select_user)  die("falid".mysqli_error($conn));

    else{
        while($row = mysqli_fetch_assoc($select_user)){

            $user_id =  $row['user_id'];
            $username =  $row['username'];          
            $user_firstname =  $row['user_firstname'];
            $user_lastname =  $row['user_lastname'];
            $user_email =  $row['user_email'];
            $user_img =  $row['user_img'];
            $user_role =  $row['user_role'];
            $randSalt =  $row['randSalt'];

            echo " <tr> 
                   <td><input type='checkbox' value='{$user_id}'  name='checkBoxArray[]' class='checkboxs'></td>
                    <td>  {$user_id} </td>
                    <td>  {$username}  </td>
                    <td>  <img width='100' height='100' class='img-responsive' src='../images/{$user_img}'> </td>
                    <td>  {$user_firstname} </td>
                    <td>  {$user_lastname} </td>
                    <td>  {$user_email } </td> 
                    <td>  {$user_role} </td>
                    <td><a href='users.php?source=delete&user={$user_id}'>Delete</td>
                    <td><a href='users.php?source=edit&user={$user_id}'>Edit</td>
                    <td><a href='users.php?source=publish&user={$user_id}'>Admin</td>
                    <td><a href='users.php?source=unpuplish&user={$user_id}'>Subscribe</td>               
                </tr>" ;
        }
    }
?> 
    </tbody>
</table>
</form>