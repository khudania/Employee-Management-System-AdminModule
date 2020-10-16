<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


if(isset($_POST['submit'])){
    $award = mysqli_real_escape_string($db, $_POST['award']);

    // Check for same Category
   $query = "SELECT * FROM saarcaward WHERE award = '$award'";
    $result = mysqli_query($db,$query);

// if Category already exists
if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Award Already exists!')</script>";
            echo "<script>window.location.href='saarc.php'</script>";
        }
        else{
            $sql = "INSERT INTO saarcaward(award) VALUES('$award')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                // $msg = "Category Added successfully";
                // echo "<script type='text/javascript'>alert('$msg');window.location.href='categories.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='saarc.php'</script>";
            }
        }
}


//Delete Awards
if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from saarcaward where id='$id'";
mysqli_query($db,$delete);
header("location: saarc.php");
}



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
            <h1 class="h3 mb-0 text-gray-800">SAARC Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <a href="saarcnomination.php" class="text-primary">Total Nomination</a>
                      </div>
                       <?php
                            $sql = "SELECT count(*) as total from saarcnomination";
                            $res = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                        <?php }?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              <a href="saarcdelegate.php" class="text-success">Total Delegate</a>
                      </div>
                      <?php
                        $sql = "SELECT count(*) as total from saarcdelegate";
                        $res = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Awards</div>

                        <?php
                        $sql = "SELECT count(*) as total from saarcaward";
                        $res = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                          <a href="saarccontact.php" class="text-info">Total Contact</a>
                       </div>

                        <?php
                        $sql = "SELECT count(*) as total from saarccontact";
                        $res = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                      <?php } ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                          <h2 class="text-center mt-5">Saarc Awards</h2>
                          <div class="row">
                          
                            <div class="col-md-8">
                              <div class="row">
                               <?php
                                    $sql = "SELECT * from saarcaward";
                                    $res = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <div class="col-md-4 mt-4">
                                  <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Award Name
                                          </div>

                                           
                                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['award']; ?></div>
                                          
                                        </div>
                                        <div class="col-auto">
                                           <a href="saarc.php?delete=<?php echo $row['id'];?>" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>
                              </div>
                           
                            </div>
                            <div class="col-md-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <form action="saarc.php" method="POST">
                                          <div class="form-group">
                                            <input type="text" class="form-control" name="award" placeholder="Enter Awards">
                                          </div>
                                          <button type="submit" class="btn btn-success" name="submit" style="float:right; padding: 8px 40px; border-radius:20px">Add</button>
                                        </form>
                                      </div>
                                     
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