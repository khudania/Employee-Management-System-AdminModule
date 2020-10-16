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
                <h1 class="h3 mb-0 text-gray-800">Jobs Application Form</h1>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="jobapp.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name   ">
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
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