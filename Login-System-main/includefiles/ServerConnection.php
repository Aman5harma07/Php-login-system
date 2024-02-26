<?php 
  $servername = "localhost";
  $username = "root";
  $password = '';
  $database = "usersInfo";

  $conn = mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
    die("Sorry! We can't connect with data base" . mysqli_connect_error());
  }
  // else{
  //   echo 'connected';
  // }


?>