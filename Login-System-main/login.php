<?php 
  $login = false;
  $showError = false;

if($_SERVER['REQUEST_METHOD']=="POST"){

// ----------- servir connection --------------- //
require "includefiles/ServerConnection.php";

 $username = $_POST['username'];
 $password = $_POST['password'];

    //  $Sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $Sql = "SELECT * FROM `users` WHERE `username` = '$username'";
     $Result = mysqli_query($conn,$Sql);

     $num = mysqli_num_rows($Result);
     if($num == 1){
         while($row = mysqli_fetch_assoc($Result)){
          if(password_verify($password,$row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            
            header('location: /MyPhPProjects/login_System/welcome.php');  
          }
          else{
            $showError = 'invalid credentials';
           }
         }
       }
    else{
        $showError = 'invalid credentials';
     }

}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!------- navbar ----------->
  <?php require "includefiles/nav.php"; ?>

  <!-----------alert---------- -->
  <?php

    if($login){
          echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> you are logged in
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
  <h1 class='text-center my-3'>Login to our website</h1>
  <div class="container">
    <div class="row">
    <form action="/MyPhPProjects/login_System/login.php" method="POST">
      <div class="mb-3 ">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
      </div>
      <div class="mb-3 ">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <button type="submit" class="btn btn-primary">login</button>
    </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>