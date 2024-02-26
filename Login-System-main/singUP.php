<?php 
  $showAlert = false;
  $showError = false;

if($_SERVER['REQUEST_METHOD']=="POST"){

// ----------- servir connection --------------- //
require "includefiles/ServerConnection.php";

 $username = $_POST['username'];
 $password = $_POST['password'];
 $Cpassword = $_POST['Cpassword'];

$ExisisSql = " SELECT * FROM `users` WHERE `username` = '$username'";
$ExisisResult = mysqli_query($conn, $ExisisSql);

$NumExisisRow = mysqli_num_rows($ExisisResult);
if($NumExisisRow > 0){
       $showError = 'username Already Exists';
}
else{
    if( ($password == $Cpassword)){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $INSql = " INSERT INTO `users` ( `username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp()) ";
      $INResult = mysqli_query($conn, $INSql);
      if($INResult){
          $showAlert = true;
      }
    }
    else{
      $showError = 'password do not match';
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SingUp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!------- navbar ----------->
  <?php require "includefiles/nav.php"; ?>

  <!-----------alert---------- -->
  <?php

    if($showAlert){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> you SingUp successfully Well Done1
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
     }

    if($showError){
      echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry!</strong>' . $showError .'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  ?>
  <!-- -----------form--------------->
  <h1 class='text-center my-3'>SignUp to our website</h1>
  <div class="container">
    <div class="row">
    <form action="/MyPhPProjects/login_System/singUP.php" method="POST">
      <div class="mb-3 ">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" maxlength="20" class="form-control" id="username" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
      </div>
      <div class="mb-3 ">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" maxlength="20" class="form-control" id="password">
      </div>
      <div class="mb-3 ">
        <label for="Confirm Password" class="form-label">Confirm Password</label>
        <input type="password" name="Cpassword" class="form-control" id="Confirm_Password">
      </div>
      <button type="submit" class="btn btn-primary">SingUP</button>
    </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>