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
                            <small>Youssef</small>
                        </h1> 
                        <?php
                            if(isset($_GET['source']))$source=$_GET['source'];
                            // if(isset($_GET['post']))$post_id=$_GET['post'];
                            else{ $source=""; $post_id ="" ;}
                            switch($source){

                                case 'add_post' :
                                    include 'includes/add_post.php';   
                                    break ; 

                                case 'delete':
                                    $post_id=$_GET['post'];
                                    delete_post($post_id);
                                    break ; 

                                case 'edit':
                                    include 'includes/edit_post.php';
                                    break ; 

                                case 'publish' :
                                    $post_id=$_GET['post'];
                                    publish_post( $post_id);
                                    break ; 
    
                                case 'unpuplish' :
                                    $post_id=$_GET['post'];
                                    unpublish_post($post_id);
                                    break ; 
                                    
                                default :   
                                    include 'includes/displaying_posts.php';
                            }
                        ?>
                        <?php ?>
                    </div>    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    
<?php include 'includes/admin_footer.php'?>
