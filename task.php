<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'h:i:s', time () );
$currentDate = date('Y-m-d', time());


if(isset($_POST['assign'])){
    $empid1 = mysqli_real_escape_string($db, $_POST['employee']);
    $task = mysqli_real_escape_string($db, $_POST['task']);

   
            $sql = "INSERT INTO tasks(empid,assignedby,task,date,time) VALUES('$empid1','$empid','$task','$currentDate','$currentTime')";
            $res=mysqli_query($db,$sql);
            if($res)
            {
                //if the values are successfully inserted, then move the images to respective folders
                // $msg = "Employee Added successfully";
                // echo "<script type='text/javascript'>alert('$msg');window.location.href='employee.php';</script>";


            }
            //if values are not inserted, show an alert
            else{
        $msg = "Failed to add Task";
        echo "<script type='text/javascript'>alert('$msg');window.location.href='tasks.php';</script>";
        }
}


//To Progress
if(isset($_GET['progress'])){
  $sql="UPDATE tasks set status='1' where id='$_GET[progress]'";
  $res=mysqli_query($db,$sql);
}

//To Review
if(isset($_GET['review'])){
  $sql="UPDATE tasks set status='2' where id='$_GET[review]'";
  $res=mysqli_query($db,$sql);
}

//Delete
if(isset($_GET['delete']))
{
$id=$_GET['delete'];
$delete="delete from tasks where id='$id'";
mysqli_query($db,$delete);
header("location: task.php");
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
          <h1 class="h3 mb-2 text-gray-800">Task Assignment</h1><br>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h5>Todo list<span class="float-right"><a type="submit" class="btn btn-circle btn-success text-white btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i></a></span></h5>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                 <?php
                                        $sql = "SELECT * from tasks where status = 0";
                                        $res = mysqli_query($db,$sql);
                                        // $i =1;
                                        while($row = mysqli_fetch_assoc($res)){
                                            $id1 = $row['id'];
                                            $empid2 = $row['empid'];
                                            $task = $row['task'];
                                            $date = $row['date'];
                                            $assignedby = $row['assignedby'];
                                            $sql1 = "SELECT * from employee where empid = '$empid2'";
                                            $res1 = mysqli_query($db,$sql1);
                                            while($row = mysqli_fetch_assoc($res1)){
                                                $name = $row['name'];
                                          
                                    ?>
                                    <div class="col-md-12 mb-3">
                                        <div class="card p-3">
                                            <p style="font-size:12px"><span><?php echo $date; ?></span><span class="float-right">To: <?php echo $name; ?></span></p>
                                            <p>Task: <?php echo $task; ?></p>
                                                 <?php if($assignedby == $empid || $empid2 == $empid) { ?>
                                            <a href="task.php?progress=<?php echo $id1; ?>" class="btn btn-success">In Progress</a>
                                                 <?php } ?>
                                        </div>
                                    </div>
                                        <?php } }?>
                                </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h5>In Progress</h5>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <?php
                                        $sql = "SELECT * from tasks where status = 1";
                                        $res = mysqli_query($db,$sql);
                                        // $i =1;
                                        while($row = mysqli_fetch_assoc($res)){
                                            $id1 = $row['id'];
                                            $empid2 = $row['empid'];
                                            $task = $row['task'];
                                            $date = $row['date'];
                                            $assignedby = $row['assignedby'];
                                            $sql1 = "SELECT * from employee where empid = '$empid2'";
                                            $res1 = mysqli_query($db,$sql1);
                                            while($row = mysqli_fetch_assoc($res1)){
                                                $name = $row['name'];
                                          
                                    ?>
                                    <div class="col-md-12 mb-3">
                                        <div class="card p-3">
                                            <p style="font-size:12px"><span><?php echo $date; ?></span><span class="float-right">To: <?php echo $name; ?></span></p>
                                            <p>Task: <?php echo $task; ?></p>
                                            
                                              <?php if($assignedby == $empid || $empid2 == $empid) { ?>
                                            <a href="task.php?review=<?php echo $id1; ?>" class="btn btn-warning">Review</a>
                                              <?php } ?>
                                        </div>
                                    </div>
                                        <?php } }?>
                                </div>
                        </div> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h5>Review</h5>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <?php
                                        $sql = "SELECT * from tasks where status = 2";
                                        $res = mysqli_query($db,$sql);
                                        // $i =1;
                                        while($row = mysqli_fetch_assoc($res)){
                                            $id1 = $row['id'];
                                            $empid2 = $row['empid'];
                                            $task = $row['task'];
                                            $date = $row['date'];
                                            $assignedby = $row['assignedby'];
                                            $sql1 = "SELECT * from employee where empid = '$empid2'";
                                            $res1 = mysqli_query($db,$sql1);
                                            while($row = mysqli_fetch_assoc($res1)){
                                                $name = $row['name'];
                                          
                                    ?>
                                    <div class="col-md-12 mb-3">
                                        <div class="card p-3">
                                            <p style="font-size:12px"><span><?php echo $date; ?></span><span class="float-right">To: <?php echo $name; ?></span></p>
                                            <p>Task: <?php echo $task; ?></p>
                                            
                                              <?php if($assignedby == $empid) { ?>
                                            <a href="task.php?delete=<?php echo $id1; ?>" class="btn btn-danger">Done</a>
                                              <?php } ?>
                                        </div>
                                    </div>
                                        <?php } }?>
                                           
                                </div>
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

  

  
 



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="task.php">
            <div class="form-group">
                <input type="text" class="form-control" name="task" placeholder="Task Description"/>
            </div>
            <div class="form-group">
                <select type="text" class="form-control" name="employee">
                <?php
                        $sql = "SELECT * from employee where empid != '$empid' order by name asc";
                        $res = mysqli_query($db,$sql);
                      
                        while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option value="<?php echo $row['empid'] ?>"><?php echo $row['name'] ?></option>
                        <?php } ?>
                  
                </select>
            </div>
            <button name="assign" type="submit" class="btn btn-success btn-sm">Assign</button>
        </form>
      </div>
     
    </div>
  </div>
</div>


     <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>


  <?php include('./components/bottom.php'); ?>