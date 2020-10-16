<?php

//Local Connection

$db = mysqli_connect('localhost', 'root', '');
if (!$db){
    die("Database Connection Failed".mysqli_error($db));
}
$select_db = mysqli_select_db($db, 'dms');
if (!$select_db){
    die("Database Selection Failed".mysqli_error($db));
}


//Server Connection

// $db=mysqli_connect('localhost','dms','fame123','dms0705');


?>