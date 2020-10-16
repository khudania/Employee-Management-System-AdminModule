<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


if(isset($_POST['submit'])){
    $addcategory = mysqli_real_escape_string($db, $_POST['addcategory']);

    // Check for same Category
   $query = "SELECT * FROM category WHERE category = '$addcategory'";
    $result = mysqli_query($db,$query);

// if Category already exists
if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Category Already exists!')</script>";
            echo "<script>window.location.href='categories.php'</script>";
        }
        else{
            $sql = "INSERT INTO category(category) VALUES('$addcategory')";
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
            echo "<script>window.location.href='categories.php'</script>";
            }
        }
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from category where id='$id'";
mysqli_query($db,$delete);
header("location: categories.php");
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
            <h1 class="h3 mb-0 text-gray-800">Categories 
               
                </h1>
            
          </div>

          <div class="row">

          <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
              <div class="row">
                   <?php
                            $sql = "SELECT * from category";
                            $res = mysqli_query($db,$sql);
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      

                      
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo $row['category']; ?>
                                <span class="float-right">
                                     <a href="categories.php?delete=<?php echo $row['id'];?>" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></a>
                                     
                                </span>
                    </div>
                     
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
             <?php } ?>
              </div>
          </div>

          <div class="col-xl-6 col-lg-6 col-md-6 mb-4">
              <div class="card p-4">
                     <div class="p-5">
                  <div class="text-center">
                    <!-- <h5 class="h4 text-gray-900 mb-4">Employee Admin Portal</h1> -->
                    <h1 class="h4 text-gray-900 mb-4">Add New Category</h1>
                    
                  </div>
                  <form class="user" method="post" action="categories.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="addcategory" name="addcategory"  placeholder="Category">
                    </div>
                   
                    
                    <button name="submit" id="submit" type="submit" class="btn btn-primary btn-user btn-block text-light">
                      Add Category
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