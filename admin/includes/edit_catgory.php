<?php 
    if (isset($_GET['edit'])){
       
        $cat_id = $_GET['edit'];
        $sql = "SELECT * FROM catgory WHERE `cat-id`={$cat_id}";
        $select_catgory_query = mysqli_query($conn ,$sql);
        if($select_catgory_query){
            while($row = mysqli_fetch_assoc($select_catgory_query)){
                $edit_cat_name = $row['cat-name'];
                $cat_id = $row['cat-id'];
             }
        }
        else{die("falid".mysqli_error($conn)); }     
    }   
    
    if(isset($_POST['update_catgory'])){
        if(!empty($_GET['edit'])){
            $edited_name = $_POST['edit_cat_title'];
            $sql = " UPDATE  catgory SET `cat-name`='$edited_name' WHERE `cat-id`={$cat_id}";
            $edited_catgory_query = mysqli_query($conn ,$sql);
            if(!$edited_catgory_query){die(mysqli_error($conn));}
            header("Location: catgory.php");
        }
        else { echo " Please choose an catgory ";}
    }
   ?>
   
<div class="col-xs-6">   
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="edit_cat_title" class="form-control" VALUE="<?php if(isset($_GET['edit'])) echo $edit_cat_name;?>">
        </div>
        <div class="form-group">
            <button type="submit" name="update_catgory" class="btn-primary btn" >Edit Catgory</button>
        </div>
    </form>
</div>  