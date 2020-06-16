<table class="table table-bordered table-hover">
    <thead>
        <tr>
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