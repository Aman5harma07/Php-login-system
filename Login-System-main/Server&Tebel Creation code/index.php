<?php

// Create DB in you local System Code run this code
require "../includefiles/ServerConnection.php";

$Ssql = "CREATE DATABASE usersInfo";
$Sresult = mysqli_query($conn, $Ssql);

if($Sresult){

    $Tsql = "CREATE TABLE `usersInfo`.`users` (`sno` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) NOT NULL , `password` VARCHAR(200) NOT NULL , `Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`)) ENGINE = InnoDB";
    $Tresult = mysqli_query($conn, $Tsql);
    if($Tresult){
         echo "you table is created";
    }
    else{
        echo "your table is not created try again ".mysqli_error($Tresult);
    }

}
else{
    echo "your server not created please try again";
}

?>

