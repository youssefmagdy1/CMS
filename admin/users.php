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
                           welcome to Usesrs
                            <small>Youssef</small>
                        </h1> 
                        <?php
                            if(isset($_GET['source']))$source=$_GET['source'];
                            // if(isset($_GET['post']))$post_id=$_GET['post'];
                            else{ $source=""; $post_id ="" ;}
                            switch($source){

                                case 'add' :
                                    include 'includes/add_user.php';   
                                    break ; 

                                case 'delete':
                                    $user_id=$_GET['user'];
                                    delete_user($user_id);
                                    break ;  

                                case 'edit':
                                    include 'includes/edit_user.php';
                                    break ; 

                                case 'publish' :
                                    $user_id=$_GET['user'];
                                    user_admin( $user_id);
                                    break ; 
    
                                case 'unpuplish' :
                                    $user_id=$_GET['user'];
                                    user_subscribe($user_id);
                                    break ; 
                                    
                                default :   
                                    include 'includes/displaying_user.php';
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
