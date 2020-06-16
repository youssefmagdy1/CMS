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
                            else{ $source=""; $comment_id ="" ;}
                            switch($source){

                                case 'aprrove' :
                                    $comment_id=$_GET['comment'];
                                    aprrove_comment( $comment_id);
                                    break ; 

                                case 'unaprrove' :
                                    $comment_id=$_GET['comment'];
                                    unaprrove_comment( $comment_id);
                                    break ; 

                                case 'delete':
                                    $comment_id=$_GET['comment'];
                                    delete_comment($comment_id);
                                    break ; 
   
                                default :   
                                    include 'includes/displaying_comments.php';
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
