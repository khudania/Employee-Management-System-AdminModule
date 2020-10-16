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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">EOD</h1>
            </div>

            <div class="row">
               
                <?php
                     if(isset($_GET['view']))
                        {
                            $date=$_GET['view'];
                            $sql = "SELECT * from eod where date = '$date' group by empid";
                            $res = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($res)){
                               $empid1 = $row['empid'];
                                $_SESSION["date"] = $date;
                                $sql1 = "SELECT name from employee where empid = '$empid1'";
                                $res1 = mysqli_query($db,$sql1);
                                while($row = mysqli_fetch_assoc($res1)){
                                
                ?>
                <div class="col-md-3 mt-3">
                    <div class="card border-left-success shadow h-100 py-2">
                       <div class="card-body">
                            <div class="row no-gutters align-items-center text-info">
                                <p><?php echo $row['name']; ?>  &nbsp;&nbsp;
                                    <span class="float-right">
                                        <a href="vieweoddetail.php?view=<?php echo $empid1;?>" class="btn btn-success btn-circle btn-sm"> 
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } }?>
                
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