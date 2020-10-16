<!-- stop the session-->
<?php
include('./config/sessions.php');
session_unset();
session_destroy();
header("location:login.php");

?>
