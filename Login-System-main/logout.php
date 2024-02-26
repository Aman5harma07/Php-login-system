<?php
session_start();

session_unset();
session_destroy();

header('location: /MyPhPProjects/login_System/login.php' );

exit();


?>