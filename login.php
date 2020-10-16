<?php
include('./config/config.php');
session_start();
if (isset($_SESSION['admin'])) {
  header('location:index.php');
}
if (isset($_POST['log-btn'])) {
  $empid = mysqli_real_escape_string($db, $_POST['empid']);
  $pass = mysqli_real_escape_string($db, $_POST['password']);
  $pass = base64_encode(strrev(md5($pass)));
  $query="select * from employee where empid='$empid' and password='$pass' and status= 1";
  $res=mysqli_query($db,$query);
  if (mysqli_num_rows($res)==1) {
    $row=mysqli_fetch_array($res);
    $_SESSION['admin']=$row['status'];
    $_SESSION['id_admin']=$row['id'];
    $_SESSION['empid']=$row['empid'];
   
    $query1="select * from priorities where id_admin='$row[id]'";
    $result=mysqli_query($db,$query1);
    $_SESSION['priorities']=mysqli_fetch_array($result);
    header('location:index.php');
  }else {
    echo "<script>alert('invalid credentials');</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include('./components/head.php'); ?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h5 class="h4 text-gray-900 mb-4">Employee Admin Portal</h1>
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    
                  </div>
                  <form class="user" method="post" action="login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="empid" name="empid" placeholder="Enter Employee Id">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    
                    <button name="log-btn" id="submit" type="submit" class="btn btn-primary btn-user btn-block text-light">
                      Login
                    </bu>
                  
                   
                  </form>
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <?php include('./components/bottom.php'); ?>