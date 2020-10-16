<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


// Add Announcement
if(isset($_POST['submit-notice'])){
    $notice = mysqli_real_escape_string($db, $_POST['notice']);
  

    // Check for same Category
  
            $sql = "INSERT INTO announcement(notice,empid) 
            VALUES('$notice','$empid')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                // $msg = "Event Added successfully";
                // echo "<script type='text/javascript'>alert('$msg');window.location.href='index.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
            echo "<script type='text/javascript'>
            alert('Could not Add! Try again')</script>";
            echo "<script>window.location.href='index.php'</script>";
            }
        }


// End of Add Announcement



//Update Quotes
if(isset($_POST['update-quote'])){
  
  $quote = $_POST['quote'];
  $writer = $_POST['by'];
 
  $query = "UPDATE quote set quote='".$quote."', writer='".$writer."' where id = 1";
	$result = mysqli_query($db,$query);
  if ($result) {

			$msg = "Quote was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='index.php;</script>";

		}
		else {
			$msg = "Failed to update Quote";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='index.php';</script>";
		}
}
//Update Quotes


// Delete Announcement


if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from announcement where id='$id'";
mysqli_query($db,$delete);
header("location: index.php");
}


// End of Delete Announcement


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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Speakers</div>
                       <?php
                            $sql = "SELECT count(*) as total from speaker";
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Companies</div>
                      <?php
                        $sql = "SELECT count(*) as total from companies";
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Events</div>

                        <?php
                        $sql = "SELECT count(*) as total from event";
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
                       <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Employees</div>

                        <?php
                        $sql = "SELECT count(*) as total from employee";
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

<div class="row">
              <div class="col-xl-6 col-md-6 mb-4">
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Event Wise Speaker Count</h1>
            
          </div>


          
                   <div class="row">
            <?php
                $sql = "SELECT count(*) as total, event from speaker group by event order by event asc";
                $res = mysqli_query($db,$sql);
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $row['event']; ?></div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php } ?>
          </div>

              </div>
              <div class="col-xl-6 col-md-6 mb-4">
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Department wise Employee Count</h1>
            
          </div>
             <!-- Content Row -->
          <div class="row">
            <?php
                $sql = "SELECT count(*) as total, department from employee group by department order by department asc";
                $res = mysqli_query($db,$sql);
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $row['department']; ?></div>
                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['total']; ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php } ?>
          </div>
              </div>
          </div>

               <!-- Content Row -->
         

            


          <!-- Content Row -->

          <div class="row">
            <div class="col-lg-6 mb-4">

           

              <!-- Announcements -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Announcements
                     
                  </h6>
                </div>
                <div class="card-body">
                 <div class="table-responsive">
                 <form method="post" action="index.php">
                  <div class="form-group">
                    <input class="form-control" type="text" name="notice" id="notice" placeholder="Enter Announcement">
                  </div>
                  <button type="submit" name="submit-notice" class="btn btn-success float-right">Add New Announcement</button>
                  <br>
                 </form>
                 
                      <table class="table table-bordered" width="100%" cellspacing="0">
                      <br><br>
                         <thead>
                             <th>#</th>
                             <th>By</th>
                             <th>Notice</th>
                             <th>Action</th>
                         </thead>
                         <tbody>
                          <?php
                    $sql = "SELECT * from announcement";
                    $res = mysqli_query($db,$sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                      $empid1 = $row['empid'];
                      $notice = $row['notice'];
                      $id1 = $row['id'];
                      
                    $sql1 = "Select * from employee where empid = '$empid1'";
                    $res1 = mysqli_query($db,$sql1);
                      while($row = mysqli_fetch_assoc($res1)){
                        $name = $row['name'];
                     
                  
                ?>
                             <tr>
                              <td><?php echo $i++; ?></td>
                              
                             
                              <td>
                             <?php echo $name; ?>
                              </td>
                               
                               
                             <td><?php echo $notice; ?></td>
                             <td class="text-center"> 
                             <a href="index.php?delete=<?php echo $id1;?>" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                             </a></td>
                             </tr>
                   <?php } } ?>
                         </tbody>
                     </table>
                 </div>
                  
                </div>
              </div>

            

            </div>

               <div class="col-lg-6 mb-4">

              <!-- Quote For the Day -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Quote For the Day
                      
                  </h6>
                </div>
                <div class="card-body">
                <?php
                $sql = "SELECT *  from quote";
                $res = mysqli_query($db,$sql);
                while($row = mysqli_fetch_assoc($res)){
                 
            ?>
               <form action="index.php" method="post">
              
                  <div class="form-group">
                    <textarea class="form-control" type="text" name="quote" id="quote" placeholder="Quote" style="resize: none;"><?php echo $row['quote']; ?>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="text" name="by" id="by" placeholder="Quote by" value="<?php echo $row['writer']; ?>">
                  </div>
                  <button type="submit" name="update-quote" class="btn btn-success float-right">Update Quote</button>
               </form>
                <?php } ?>
                </div>
              </div>

            

            </div>
            <!-- Area Chart -->
            <!-- <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
               
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Task Assignment</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
               
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div> -->

        
           
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