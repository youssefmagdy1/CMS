<?php include 'includes/admin_header.php' ?>
    <div id="wrapper">
    
        <!-- Navigation -->
        <?php include 'includes/admin_nav.php' ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           welcome to dashbord
                            <small><?php echo $_SESSION['username']?></small>
                        </h1> 
                    </div>    
                </div>
                <!-- /.row -->

<div class="row">

<?php 
    $sql = "SELECT * FROM `users`";
    $select_users_query = mysqli_query($conn ,$sql);
    $num_users = mysqli_num_rows($select_users_query);
    
    $sql = "SELECT * FROM `posts`";
    $select_posts_query = mysqli_query($conn ,$sql);
    $num_posts = mysqli_num_rows($select_posts_query);
   
    $sql = "SELECT * FROM `comments`";
    $select_comments_query = mysqli_query($conn ,$sql);
    $num_comments = mysqli_num_rows($select_comments_query);
   
    $sql = "SELECT * FROM `catgory`";
    $select_catgory_query = mysqli_query($conn ,$sql);
    $num_catgory = mysqli_num_rows($select_catgory_query);
?>
                       
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $num_posts ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'> <?php echo $num_comments ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $num_users ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'><?php echo $num_catgory ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="catgory.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
<?php 
     $sql = "SELECT * FROM `users` WHERE `user_role` ='subscriber'";
     $select_users_role_query = mysqli_query($conn ,$sql);
     $num_users_role = mysqli_num_rows($select_users_role_query);
     
     $sql = "SELECT * FROM `posts`  WHERE `post-state` ='draft'";
     $select_posts_darft_query = mysqli_query($conn ,$sql);
     $num_posts_darft = mysqli_num_rows($select_posts_darft_query );
    
     $sql = "SELECT * FROM `comments`  WHERE `comment_status` ='draft'";
     $select_comments_draft_query = mysqli_query($conn ,$sql);
     $num_comments_draft = mysqli_num_rows($select_comments_draft_query);

?>

<div class="row">                  
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count' ,'Draft'],
                    
            <?php
                                            
            $element_text = ['Posts', 'Comments', 'Users', 'Categories'];       
            $element_count = [$num_posts, $num_comments, $num_users ,$num_catgory];

            $element_draft_count = [$num_posts_darft ,$num_comments_draft ,$num_users_role, 0];

            for($i =0;$i < 4; $i++)   
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}".","."{$element_draft_count[$i]} "  . "],";                                               
            ?>
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
    }
</script>

     <div id="columnchart_material" style="width:100%; height: 500px;"></div>
</div>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    
<?php include 'includes/admin_footer.php'?>

