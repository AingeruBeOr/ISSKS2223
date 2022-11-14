<?php 

    session_start();
    
    date_default_timezone_set('Europe/Madrid');
    error_log("127.0.0.1 " .$_SESSION['username'].  " [".date('r')."]' ".$_SESSION['username']." (ID: ".$_SESSION['ID_USER'].") erabiltzaileak sesioa itxi du.'" .PHP_EOL,3,"/var/log/apache2/logout.log"); 

    session_destroy();

    header("Location: ../index.php");

?>