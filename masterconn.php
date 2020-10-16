<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];


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
            <h1 class="h3 mb-0 text-gray-800">Master Connects Dashboard</h1>
            
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
                        <a href="masterconnmentors.php" class="text-primary">Total Mentors</a>
                      </div>
                       <?php
                            $sql = "SELECT count(*) as total from masterconnectmentor";
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
                              <a href="masterconnmentee.php" class="text-success">Total Mentee</a>
                      </div>
                      <?php
                        $sql = "SELECT count(*) as total from masterconnectmentee";
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                             <a href="masterconncontact.php" class="text-info">Total Contacted</a>
                      </div>

                        <?php
                        $sql = "SELECT count(*) as total from masterconnectcontact";
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
                          <a href="masterconnsubs.php" class="text-info">Total Subscribed</a>
                       </div>

                        <?php
                        $sql = "SELECT count(*) as total from masterconnectsubs";
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
                          <h2 class="text-center mt-5">Topic Wise Stats</h2>
                          <div class="row">
                          
                            
                            <div class="col-md-12">
                                <div class="card border-left-warning shadow h-100 py-2">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                      </div>
                      <script>
                        // Bar Chart Example
                        var ctx = document.getElementById("myBarChart");
                        var myBarChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: [
                              <?php 
                              $sql = "SELECT profile from masterconnectmentee group by profile order by profile asc";
                              $res = mysqli_query($db,$sql);
                              while($row = mysqli_fetch_assoc($res)){
                                $dept =  $row['profile'];
                              ?>
                                "<?php echo $dept ?>",

                              <?php }?>
                            ],
                            // labels: ["Information Technology", "Demo2", "Demo2", "Demo2", "Demo2", "Demo2"],
                            datasets: [{
                              label: "Mentee Count",
                              backgroundColor: [
                                "#4e73df", 
                                "red", 
                                "green", 
                                "purple", 
                                "teal", 
                                "#fcba03", 
                                "#fc038c", 
                                "#a103fc",
                                "#03dffc",
                                "#03fcb1",
                                "#adfc19",
                                "#f8fc19",
                              ],
                              hoverBackgroundColor: [
                                "#4e73df", 
                                "red", 
                                "green", 
                                "purple", 
                                "teal", 
                                "#fcba03", 
                                "#fc038c", 
                                "#a103fc",
                                "#03dffc",
                                "#03fcb1",
                                "#adfc19",
                                "#f8fc19",
                              ],
                              borderColor: "#4e73df",
                              // data: [4215, 5312, 6251, 7841, 9821, 14984],
                              data: [
                                <?php
                                $sql = "SELECT count(*) as total, profile from masterconnectmentee group by profile order by profile asc";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                                  $dept = $row['profile'];
                                  $total =  $row['total'];
                                ?>
                              <?php echo $total; ?>,

                                <?php } ?>
                              ],
                            }],
                          },
                          options: {
                            maintainAspectRatio: false,
                            layout: {
                              padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                              }
                            },
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'month'
                                },
                                gridLines: {
                                  display: false,
                                  drawBorder: false
                                },
                                ticks: {
                                  maxTicksLimit: 6
                                },
                                maxBarThickness: 25,
                              }],
                              yAxes: [{
                                ticks: {
                                  min: 0,
                                  max: 50,
                                  maxTicksLimit: 5,
                                  padding: 10,
                                  // Include a dollar sign in the ticks
                                  
                                },
                                gridLines: {
                                  color: "rgb(234, 236, 244)",
                                  zeroLineColor: "rgb(234, 236, 244)",
                                  drawBorder: false,
                                  borderDash: [2],
                                  zeroLineBorderDash: [2]
                                }
                              }],
                            },
                            legend: {
                              display: false
                            },
                            tooltips: {
                              titleMarginBottom: 10,
                              titleFontColor: '#6e707e',
                              titleFontSize: 14,
                              backgroundColor: "rgb(255,255,255)",
                              bodyFontColor: "#858796",
                              borderColor: '#dddfeb',
                              borderWidth: 1,
                              xPadding: 15,
                              yPadding: 15,
                              displayColors: false,
                              caretPadding: 10,
                             
                            },
                          }
                        });

                      </script>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>


                    <h2 class="text-center mt-5">Level Wise Stats For Mentees</h2>

                    <!-- Start of Level Wise Stats For Mentees -->

                    <div class="row">
                          
                            
                            <div class="col-md-12">
                                <div class="card border-left-warning shadow h-100 py-2">
                                  <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                        <div class="chart-bar">
                        <canvas id="myBarChart1"></canvas>
                      </div>
                      <script>
                        // Bar Chart Example
                        var ctx = document.getElementById("myBarChart1");
                        var myBarChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: [
                              <?php 
                              $sql = "SELECT expertise from masterconnectmentee group by expertise order by expertise asc";
                              $res = mysqli_query($db,$sql);
                              while($row = mysqli_fetch_assoc($res)){
                                $dept =  $row['expertise'];
                              ?>
                                "<?php echo $dept ?>",

                              <?php }?>
                            ],
                            // labels: ["Information Technology", "Demo2", "Demo2", "Demo2", "Demo2", "Demo2"],
                            datasets: [{
                              label: "Mentee Count",
                              backgroundColor: [
                               
                                "purple", 
                                "teal", 
                                "#fcba03", 
                                "#fc038c", 
                                "#a103fc",
                                "#03dffc",
                                "#03fcb1",
                                "#adfc19",
                                "#f8fc19",
                              ],
                              hoverBackgroundColor: [
                                
                                "purple", 
                                "teal", 
                                "#fcba03", 
                                "#fc038c", 
                                "#a103fc",
                                "#03dffc",
                                "#03fcb1",
                                "#adfc19",
                                "#f8fc19",
                              ],
                              borderColor: "#4e73df",
                              // data: [4215, 5312, 6251, 7841, 9821, 14984],
                              data: [
                                <?php
                                $sql = "SELECT count(*) as total, expertise from masterconnectmentee group by expertise order by expertise asc";
                                $res = mysqli_query($db,$sql);
                                while($row = mysqli_fetch_assoc($res)){
                                  $dept = $row['expertise'];
                                  $total =  $row['total'];
                                ?>
                              <?php echo $total; ?>,

                                <?php } ?>
                              ],
                            }],
                          },
                          options: {
                            maintainAspectRatio: false,
                            layout: {
                              padding: {
                                left: 10,
                                right: 25,
                                top: 25,
                                bottom: 0
                              }
                            },
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'month'
                                },
                                gridLines: {
                                  display: false,
                                  drawBorder: false
                                },
                                ticks: {
                                  maxTicksLimit: 6
                                },
                                maxBarThickness: 25,
                              }],
                              yAxes: [{
                                ticks: {
                                  min: 0,
                                  max: 50,
                                  maxTicksLimit: 5,
                                  padding: 10,
                                  // Include a dollar sign in the ticks
                                  
                                },
                                gridLines: {
                                  color: "rgb(234, 236, 244)",
                                  zeroLineColor: "rgb(234, 236, 244)",
                                  drawBorder: false,
                                  borderDash: [2],
                                  zeroLineBorderDash: [2]
                                }
                              }],
                            },
                            legend: {
                              display: false
                            },
                            tooltips: {
                              titleMarginBottom: 10,
                              titleFontColor: '#6e707e',
                              titleFontSize: 14,
                              backgroundColor: "rgb(255,255,255)",
                              bodyFontColor: "#858796",
                              borderColor: '#dddfeb',
                              borderWidth: 1,
                              xPadding: 15,
                              yPadding: 15,
                              displayColors: false,
                              caretPadding: 10,
                             
                            },
                          }
                        });

                      </script>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>


                    <!-- End of Level Wise Stats For Mentees -->

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