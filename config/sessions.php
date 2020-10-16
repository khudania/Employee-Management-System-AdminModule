<?php
session_start();

if (!isset($_SESSION['admin'])){
  echo "<script>alert('Please login!');
          window.location.replace('login.php');
        </script>";
}else {
  $flag=0;
  $Priority=$_SESSION['priorities'];
  // echo $var;
  // echo $Priority[$var];
  if ($Priority[$var]==0) {
    echo "<script>alert('Access denied!');
            window.location.replace('index.php');
          </script>";
  }elseif ($Priority[$var]==1) {
    $flag=1;
  }
}
?>
