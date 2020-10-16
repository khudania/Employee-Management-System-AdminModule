<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];
// $date = $_SESSION["date"];

?>


<!DOCTYPE html>
<html lang="en">

<?php include('./components/head.php'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('./components/sidebar.php'); ?>
    <!-- end Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('./components/topbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">EOD</h1>
            </div>

            <div class="row">

             <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <?php
                         if(isset($_GET['view']))
                        {
                            $date=$_GET['view'];
                            // echo $empid1;
                            $sql = "SELECT date from eod where date = '$date' group by date";
                            $res = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($res)){
                                $date = $row['date'];
                                // echo $name;
                        ?>
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo $date; ?></h6>
                        <?php }} ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Task/Project</th>
                                            <th>Description</th>
                                            <!-- <th>Time</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        if(isset($_GET['view']))
                                        {
                                            $date=$_GET['view'];
                                            $sql = "SELECT * from eod where date = '$date' order by empid desc";
                                            $res = mysqli_query($db,$sql);
                                            $i = 1;
                                            while($row = mysqli_fetch_assoc($res)){
                                                $task = $row['task'];
                                                $description = $row['description'];
                                                $empid2 = $row['empid'];
                                                $sql1 = "SELECT name from employee where empid = '$empid2'";
                                                $res1 = mysqli_query($db,$sql1);
                                                while($row = mysqli_fetch_assoc($res1)){
                                                    $name = $row['name'];
                                                    
                                    ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $task; ?></td>
                                            <td><?php echo $description; ?></td>
                                            
                                        </tr>
                                    <?php } } }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     <?php include('./components/footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

  <?php include('./components/bottom.php'); ?>