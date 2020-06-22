<?php  include "includes/header.php" ?>

<?php 
    if(isset($_POST['submit'])){

        // $user_firstname = $_POST['user_firstname'];
        // $user_lastname = $_POST['user_lastname'];
        // $user_img = $_FILES['image']['name'];
        // $user_img_temp = $_FILES['image']['tmp_name'];
        // $user_role =$_POST['user_role'];
        $username= mysqli_real_escape_string($conn , $_POST['username']);
        $user_email =mysqli_real_escape_string($conn , $_POST['email']) ;
        $user_password =mysqli_real_escape_string($conn ,$_POST['password']);

        if(!empty($user_email)&&!empty($username)&&!empty($user_password))
        {
        
        //  move_uploaded_file($user_img_temp , "../images/$user_img");  
            // $sql = "SELECT `randSalt` FROM `users`";
            // $select_rand_salt_query =mysqli_query($conn,$sql);
            // if(!$select_rand_salt_query)die(mysqli_error($conn));
            $ranSalt = '$2y$10$Srayekoppa2011&youss';

            $user_password = password_hash($user_password ,PASSWORD_BCRYPT);

            if(!$user_password) echo "error in password " ;



            $sql = "INSERT INTO users (`username`,`user_firstname`, `user_lastname`,`user_email`,`user_password` ,  `user_img` ,user_role  )";
            // $sql .= " VALUE ('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_img}' , '$user_role' ,'') ";
            $sql .= " VALUE ('{$username}','','','{$user_email}','{$user_password}','' , 'subscriber' ) ";
                
            $insert_user_query = mysqli_query($conn ,$sql);
            if (!$insert_user_query) die(mysqli_error($conn)) ; 
            else { 
                $_SESSION['username']=$username ;
                $_SESSION['email'] =$user_email ;
                $_SESSION['user_role']='subscriber' ;
                
                header('Location: index.php');
            
            }
        }
    }


?>


    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>  
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
