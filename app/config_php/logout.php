<?php 

    session_start();

    session_destroy();

    error_log("127.0.0.1 user-identifier user_izena [".date('r')."] 'Erabiltzaileak sesio itxi du.'" .PHP_EOL,3,"/var/log/apache2/logout.log");

    header("Location: ../index.php");

?>