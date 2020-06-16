<?php include_once  'dp.php' ;?>
<?php 

session_start();

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn ,$_POST['username']);
    $password = mysqli_real_escape_string($conn ,$_POST['password']);


    mysqli_real_escape_string($conn ,$_POST['username']);

    $sql = "SELECT * FROM users WHERE `username`='$username'";
    $select_user_query = mysqli_query($conn ,$sql);

    $num_row_user = mysqli_num_rows($select_user_query);

    if($num_row_user == 0 ) 
        echo "please sign up first "  ;
    

    if (!$select_user_query) 
        die(mysqli_error($conn)); 

    while ($row = mysqli_fetch_assoc($select_user_query)){

        $check_pass = $row['user_password'];
        $dp_username = $row['username'];
        $dp_user_firstname = $row['user_firstname'];
        $dp_user_lastname = $row['user_lastname'];
        $dp_user_role = $row['user_role'];

    
    if($password == $check_pass ) {
        $_SESSION['username']=$dp_username ;
        $_SESSION['user_firstname']=$dp_user_firstname ;
        $_SESSION['user_lastname']=$dp_user_lastname ;
        $_SESSION['user_role']=$dp_user_role ;
        
        if($dp_user_role=='admin')
            header('Location: ../admin');
        else{
            header('Location: ../index.php');
        }
    }
    else{
        header('Location: ../index.php');
    }

    
    
    
    }
}
?>