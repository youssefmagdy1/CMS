<div class="col-md-4">


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<?php  if(!isset($_SESSION['username'])) echo '
<div class="well">
    <h4>Sign in:</h4>
    <form action="includes/login.php" method="post" class="form-group">
        <input type="text" class="form-control form-group" name="username" placeholder="enter your name">
        <div class="input-group">
            <input type="password" class="form-control" name="password"  placeholder="enter your pasword">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="login">Login </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>
';?>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php
                $query = "SELECT * FROM catgory LIMIT 3";
                $select_all_catgory_query = mysqli_query($conn ,$query);
                while($row = mysqli_fetch_assoc($select_all_catgory_query)) {
                    $cat_id = $row['cat-id'] ;
                    $cat_na = $row['cat-name'];
                    echo "<li> <a href='catgory.php?catgory={$cat_id}'> {$cat_na} </a></li>";                   
                }
            ?>

            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>
</div>