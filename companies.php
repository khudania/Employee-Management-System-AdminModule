<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];




if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from companies where id='$id'";
mysqli_query($db,$delete);
header("location: companies.php");
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
          <h1 class="h3 mb-2 text-gray-800">Companies</h1><br>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company</th>
                      <th>Name</th>
                      <th>Designation</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Social Media</th>
                      <th>Category</th>
                      <th>Address</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <?php
                    $sql = "SELECT * from companies";
                    $res = mysqli_query($db,$sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['cname']; ?></a></td>
                        <td><a href="<?php echo $row['linkedin']; ?>" target="_blank"><?php echo $row['name']; ?></a></td>
                        <td><?php echo $row['designation']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td class="text-center">
                             <a href="<?php echo $row['fb']; ?>" class="text-primary text-center" target="_blank"><i
                                    class="fab fa-facebook-f float-center" aria-hidden="true"></i></a>
                            <hr>
                            <a href="<?php echo $row['twitter']; ?>" class="text-success btn-sm"  target="_blank"> <i class="fab fa-twitter float-center"></i></a>
                           <hr>
                            <a href="<?php echo $row['github']; ?>" class="text-dark btn-sm"  target="_blank"> <i class="fab fa-github float-center"></i></a>
                        </td>
                        <td><?php echo $row['category']; ?> <hr>
                        <?php echo $row['ctype']; ?></td>
                          <td><bold>Office: </bold><?php echo $row['officeadd']; ?> <hr>
                       <bold>Home: </bold> <?php echo $row['homeadd']; ?></td>
                        <td class="text-center">
                          
                            <a href="companies.php?delete=<?php echo $row['id'];?>" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash float-center"></i></a>
                            
                        </td>
                    </tr>
                <?php } ?>
                    
                  </tbody>
                </table>
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