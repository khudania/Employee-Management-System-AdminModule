<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];




if(isset($_POST['submit'])){
    $empid = mysqli_real_escape_string($db, $_POST['empid']);
    $empname = mysqli_real_escape_string($db, $_POST['empname']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password = base64_encode(strrev(md5($password)));
    $desig = mysqli_real_escape_string($db, $_POST['desig']);
    $dept = mysqli_real_escape_string($db, $_POST['dept']);

    // Check for same Category
   $query = "SELECT * FROM employee WHERE empid = '$empid'";
    $result = mysqli_query($db,$query);

// if Category already exists
if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Employee Already exists!')</script>";
            echo "<script>window.location.href='employee.php'</script>";
        }
        else{
            $sql = "INSERT INTO employee(empid,name,email,contact,desgination,department,password) VALUES('$empid','$empname','$email','$contact','$desig','$dept','$password')";
            $sql1="INSERT INTO priorities (id_admin, companies) VALUES(LAST_INSERT_ID(), 2)";
            $res=mysqli_query($db,$sql);
            $res=mysqli_query($db,$sql1);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                // $msg = "Employee Added successfully";
                // echo "<script type='text/javascript'>alert('$msg');window.location.href='employee.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
             $query='delete * from employee where id=LAST_INSERT_ID()';
        $res=mysqli_query($db,$query);
        $msg = "Failed to add Employee";
        echo "<script type='text/javascript'>alert('$msg');window.location.href='employee.php';</script>";
        }
}
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from priorities where id_admin='$id'";
$delete1="delete from employee where id='$id'";
mysqli_query($db,$delete);
mysqli_query($db,$delete1);
header("location: employee.php");
}


//Give Admin Access
if(isset($_GET['admin'])){
  $sql="UPDATE employee set status='1' where id='$_GET[admin]'";
  $res=mysqli_query($db,$sql);
}


//Remove Admin Access
if(isset($_GET['noadmin'])){
  $sql="UPDATE employee set status='0' where id='$_GET[noadmin]'";
  $res=mysqli_query($db,$sql);
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
            <h1 class="h3 mb-0 text-gray-800">Employees 
               
                </h1>
            
          </div>

          <div class="row">

          <div class="col-xl-6 col-md-6 mb-4">
              <div class="row">
                   <?php
                        $sql = "SELECT * from employee order by empid asc";
                        $res = mysqli_query($db,$sql);
                      
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                                          
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $row['empid']; ?>
                                <span class="float-right">
                                     <a href="viewemployee.php?view=<?php echo $row['id'];?>" class="btn btn-success btn-circle btn-sm"> <i class="fas fa-eye"></i></a>
                                      <?php 
                            $status =  $row['status'];
                            $empid1 = $row['empid'];

                            if($empid1 !== $empid){
                          ?>
                    
                          <a href="employee.php?delete=<?php echo $row['id'];?>" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></a>
                          <?php } else{ ?>
                          <a href="#" class="btn btn-danger btn-circle btn-sm disabled"> <i class="fas fa-trash"></i></a>
                           <?php } ?>
                                </span>
                    </div>
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $row['name']; ?>
                    </div>
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $row['desgination']; ?>
                    </div>
                   <hr>
                   <div class="text-center">
                       <?php if($status == 0){ ?>
                                 <a href="employee.php?admin=<?php echo $row['id'];?>" class="text-success">Make Admin</a>
                           <?php } elseif($status == 1 && $empid1 == $empid){ ?>
                            <a href="#" class="text-primary" style="pointer-events: none;">Admin Access</a>
                                 <?php   }else{ ?>
                                <a href="employee.php?noadmin=<?php echo $row['id'];?>" class="text-danger">Remove Admin Access</a>
                           <?php    } ?>
                                 </div>
                     
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
             <?php } ?>
              </div>
          </div>

          <div class="col-xl-6 col-md-6 mb-4">
              <div class="card p-4">
                     <div class="p-5">
                  <div class="text-center">
                    <!-- <h5 class="h4 text-gray-900 mb-4">Employee Admin Portal</h1> -->
                    <h1 class="h4 text-gray-900 mb-4">Add New Employee</h1>
                    
                  </div>
                  <form class="user" method="post" action="employee.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="empid" name="empid"  placeholder="New Employee ID">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="empname" name="empname"  placeholder="New Employee Name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="contact" name="contact"  placeholder="Contact number">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email"  placeholder="Email Id">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="password" name="password"  placeholder="Password">
                    </div>
                     <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="desig" name="desig"  placeholder="Designation">
                    </div>
                    <div class="form-group">
                           <select class="form-control text-dark" id="dept" name="dept">
                                <?php
                                    $sql = "SELECT * from department order by dept asc";
                                    $res = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($res)){
                                ?>
                                    <option class="text-dark" value="<?php echo $row['dept']; ?>"><?php echo $row['dept']; ?></option>
                                <?php } ?>
                               
                            </select>
                        </div>

                   
                    
                    <button name="submit" id="submit" type="submit" class="btn btn-primary btn-user btn-block text-light">
                      Add Employee
                    </b>
                  
                   
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