<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                        $query = "SELECT * FROM catgory";
                        $select_all_catgory_query = mysqli_query($conn ,$query);
                        while($row = mysqli_fetch_assoc($select_all_catgory_query)) {
                            $cat_id = $row['cat-id'] ;
                            $cat_na = $row['cat-name'];
                            echo "<li> <a href='catgory.php?catgory={$cat_id}'> {$cat_na} </a></li>";                   
                        }
                    ?>
                    
                    <?php
                        if(isset($_SESSION['user_role'])){         
                            echo "
                            <li class='dropdown '>
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i>{$_SESSION['username']}  <b class='caret'></b></a>
                                <ul class='dropdown-menu'>
                                    <li>
                                        <a href='admin/profile.php'><i class='fa fa-fw fa-user'></i> Profile</a>
                                    </li>
                                <li class='divider'></li>
                                    <li>
                                        <a href='includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>";
                            if($_SESSION['user_role']=='admin'){
                                echo "<li><a href='admin'> admin</a> </li>"; 
                                if(isset($_GET['post'])){
                                    $post_id = $_GET['post'];
                                    echo " <li><a href='admin/posts.php?source=edit&post={$post_id}'> editpost</a> </li>" ;
                              }
                            }
                        }
                        else{
                            echo "<li><a href='registration.php'> register</a> </li>";
                        }
                    ?>
                    .

                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 