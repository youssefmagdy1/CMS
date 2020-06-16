<?php include 'includes/admin_header.php' ?>
    <div id="wrapper">
    
        <!-- Navigation -->
        <?php include 'includes/admin_nav.php' ?>
        <?php  if(isset($_GET['delete'])) delete_catgory() ;?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           welcome to dashbord
                            <small>Youssef</small>
                        </h1>

                        <!--adding new catgory-->
                        <div class="col-xs-6">
                        <?php if (isset($_POST['submit'])) insert_catgory(); ?>
                            <form action="" method="post">
                                <div class="form-group">
                                 <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                 <button type="submit" name="submit" class="btn-primary btn" >Add Catgory</button>
                                </div>
                            </form>
                        </div>
                        <!-- / end adding -->

                        <!-- desplaying catgory  -->
                        <div class="col-xs-6">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>catgory</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  displaying_catgory () ;?> 
                                </tbody>
                            </table>
                        </div>
                        <!--editing catgory-->
                    <?php  include 'includes/edit_catgory.php'?>
                    </div>
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    
<?php include 'includes/admin_footer.php'?>

