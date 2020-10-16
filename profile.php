<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


// Update Password Logics

if(isset($_POST['insert'])){
	$old = $_POST['old'];
  //Encrypt Password
  $old = base64_encode(strrev(md5($old)));
	$password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

	$sql = "SELECT * from employee where empid = '$_SESSION[empid]'";
	$res = mysqli_query($db,$sql);
  $row = mysqli_fetch_assoc($res);
  $pass = $row['password'];
  if($old == $pass){
	if($password==$cpassword){
    //Encrypt Password
    $password = base64_encode(strrev(md5($password)));
		$select = "UPDATE employee set password='$password' where empid = '$_SESSION[empid]'";
		$result = mysqli_query($db,$select);
		if ($result) {

			$msg = "Password was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";

		}
		else {
			$msg = "Failed to update Password";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
		}
	}
  else {
    $msg = "Mismatch in password";
    echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
  }
}
	else {
		$msg = "Invalid old password, check again";
		echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
	}
}
// End of Update Password

// Profile Update Logics
if(isset($_POST['profile'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $desgination = $_POST['desgination'];
  $department = $_POST['department'];
  $query = "UPDATE employee set name='".$name."', email='".$email."', contact='".$contact."', desgination='".$desgination."', department='".$department."' where empid = '$_SESSION[empid]'";
	$result = mysqli_query($db,$query);
  if ($result) {
			$msg = "Profile was updated successfully";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
		}
		else {
			$msg = "Failed to update Profile";
			echo "<script type='text/javascript'>alert('$msg');window.location.href='profile.php';</script>";
		}
}
// End of Profile Update logic


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
          <h1 class="h3 mb-2 text-gray-800">Profile</h1><br>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            <div class="row">
                <div class="col-md-7">
                <div class="card">
                        <div class="card-header py-3">
                            <h3 class="h3 mb-2 text-gray-800">Update Profile</h3>
                        </div>
                        <div class="card-body">
                          <?php
                      $sql = "select * from employee where empid = '$empid'";
                      $res = mysqli_query($db,$sql);
                      while($row = mysqli_fetch_assoc($res)){
                          $name = $row['name'];
                          $email = $row['email'];
                          $contact = $row['contact'];
                          $desgination = $row['desgination'];
                          $department = $row['department'];
                        }
                    ?>
                            <form method="post" action="profile.php">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Employee Id</label>
                          <input type="text" class="form-control" value="<?php echo $empid ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact</label>
                          <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Designation</label>
                          <input type="text" class="form-control" name="desgination" value="<?php echo $desgination; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                          <input type="text" class="form-control" name="department" value="<?php echo $department; ?>">
                        </div>
                      </div>
                    </div>
                   
                    <button type="submit" name="profile" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                
                        </div>
                    </div></div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header py-3">
                            <h3 class="h3 mb-2 text-gray-800">Update Password</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="profile.php">
                      <div class="form-group">
                        <label for="opass" >Old Password</label>
                        <input type="password" name="old" class="form-control" id="opass">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                      </div>
                      <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="cpassword">
                      </div>
                      <button type="submit" name="insert" class="btn btn-primary btn-round mt-3">Update Password</bu>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
         
          
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