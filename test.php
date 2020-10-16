 <?php
                $chars = "0123456789";
                $text = substr( str_shuffle( $chars ), 0, 4 );
            ?>
            <p>INT<?php echo $text; ?></p>



<?php
$var='index.php';
include('./config/config.php');
include('./config/sessions.php');

$empid = $_SESSION["empid"];




if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $contact = mysqli_real_escape_string($db, $_POST['contact']);
    $designation = mysqli_real_escape_string($db, $_POST['designation']);
    

    // Check for same Category
   $query = "SELECT * FROM applicant WHERE mail = '$mail'";
    $result = mysqli_query($db,$query);

// if Category already exists
if(mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>
            alert('Employee Already exists!')</script>";
            echo "<script>window.location.href='test.php'</script>";
        }
        else{
            $sql = "INSERT INTO applicant(name,mail,contact,designation) VALUES('$name','$mail','$contact','$designation')";
            $res=mysqli_query($db,$sql);
          
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
        echo "<script type='text/javascript'>alert('$msg');window.location.href='test.php';</script>";
        }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>
<div class="row">
 <div class="col-md-2"></div>
 <div class="col-md-7">
    <form method="post" action="test.php">
 <div class="form-group">
    <input type="text" name="name" id="name" class="form-control" placeholder="name">
     </div>
      <div class="form-group">
    <input type="text" name="mail" id="mail" class="form-control" placeholder="mail">
      </div>
      <div class="form-group">
    <input type="text" name="contact" id="contact" class="form-control" placeholder="contact">
      </div>
      <div class="form-group">
    <input type="text" name="designation" id="designation" class="form-control" placeholder="designation">
</div>
<button class="btn btn-success btn-sm" name="submit" type="submit">Save</button>
</form>

 </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>