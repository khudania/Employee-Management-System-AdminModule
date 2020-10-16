<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];




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

        <div class="container-fluid">

         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employee Details</h1>
          </div>


  <?php
                            if(isset($_GET['view']))
                            {
                            $id=$_GET['view'];
                            $sql = "SELECT * from employee where id = '$id'";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                                    $empid1 = $row['empid'];
                        
                        ?>
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card p-3">
                       
                        <h1><?php echo $row['empid']; ?></h1>
                        <h3><?php echo $row['name']; ?></h3>
                        <label><?php echo $row['desgination']; ?></label>
                        <label><?php echo $row['department']; ?></label>
                        <label><?php echo $row['email']; ?></label>
                        <label><?php echo $row['contact']; ?></label>
                               
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card p-3">
                        <p>EOD Report</p>
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>

                        <?php
                            $sql = "SELECT * from eod where empid = '$empid1' order by date desc";
                                $res = mysqli_query($db,$sql);
                                $i =1;
                                while($row = mysqli_fetch_assoc($res)){
                                    
                        ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['task']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                        </tr>
                         <?php } ?>
                       </table>
                      
                               
                    </div>
                </div>
            </div>
             <?php }} ?>
        </div>


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