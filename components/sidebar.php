<?php
// include('../config/config.php');
// include('../config/sessions.php');

?>

<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        
        <img src="http://fametechnologies.in/assests/imgs/fametronix-logo.png" alt="" class="img-fluid" style="height:40px">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
        <?php } 
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Employee</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="task.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Task</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="eod.php">
          <i class="fas fa-fw fa-users"></i>
          <span>EOD</span></a>
      </li>
        <?php } ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Add Details
      </div>
       <?php
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
       <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="categories.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Categories</span></a>
      </li>
        <?php }
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="events.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Event</span></a>
      </li>
        <?php }
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="department.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Department</span></a>
      </li>
        <?php } ?>

<!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Database
      </div>

      <?php
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="companies.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Companies</span></a>
      </li>
        <?php }
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="speakers.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Speakers</span></a>
      </li>
        <?php } ?>
        <!-- Divider -->
      <hr class="sidebar-divider">
  <div class="sidebar-heading">
        Events
      </div>
           <?php
        if($_SESSION['priorities']['index.php']=='2' || $_SESSION['priorities']['index.php']=='1') {
      ?>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="allevent.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>All Event</span></a>
      </li>
        <?php } ?>
      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Interface
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.php">Buttons</a>
            <a class="collapse-item" href="cards.php">Cards</a>
          </div>
        </div>
      </li> -->

      

      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.php">Login</a>
            <a class="collapse-item" href="register.php">Register</a>
            <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.php">404 Page</a>
            <a class="collapse-item" href="blank.php">Blank Page</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->