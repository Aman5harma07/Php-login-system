<?php

session_start();
if(!isset($_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
  header('location: /MyPhPProjects/login_System/login.php');
  exit();
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome
    <?php $_SESSION['username'] ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!------- navbar ----------->
  <?php require "includefiles/nav.php"; ?>

  <div class="container mt-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading"> <?php echo $_SESSION['username'] ?></h4>
      <p>Het whats are you donin? welcome to iSecure you are logged in successfully in our website
      <?php echo $_SESSION['username'] ?> and if you want to logout you can click to logout button
      </p>
    
      <hr>
      <p class="mb-0">Whenever you need to, be sure logout <a href="/MyPhPProjects/login_System/login.php" class="btn btn-danger">Logout</a></p>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>