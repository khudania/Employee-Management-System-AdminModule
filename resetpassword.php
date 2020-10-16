<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];





// Update Password Logics

//Update Quotes
if(isset($_POST['submit'])){
  
  $employee = $_POST['employee'];
  $password = $_POST['password'];
  $password = base64_encode(strrev(md5($password)));
 
  $query = "UPDATE employee set password='".$password."' where empid = '".$employee."'";
	$result = mysqli_query($db,$query);
  if ($result) {

			$msg = "Quote was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='resetpassword.php;</script>";

		}
		else {
			$msg = "Failed to update Quote";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='resetpassword.php';</script>";
		}
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
                <h1 class="h3 mb-0 text-gray-800">Reset Password</h1>
            </div>

            <div class="row">
            <div class="col-md-5">
                <form action="resetpassword.php" method="POST">
        <div class="form-group">
            <select name="employee" id="employee" class="form-control">
                    <?php
                        $sql = "SELECT empid from employee";
                        $res = mysqli_query($db,$sql);
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                <option value="<?php echo $row['empid'] ?>"><?php echo $row['empid'] ?></option>
                        <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="password" class="form-control" id="password"/>
        </div>

        <button class="btn btn-success" name="submit" type="submit" style="padding:8px 30px">Update</button>

    </form>
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



