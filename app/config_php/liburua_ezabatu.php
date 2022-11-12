<?php
    include 'db_link.php';

    session_start();
    $Email=$_SESSION['email'];

    $ISBN= $_GET["isbn"];
    
    $delete = "DELETE FROM liburua WHERE ISBN='$ISBN' and Email ='".$Email."'";//TODO

    $query = mysqli_query($conn, $delete) or die (mysqli_error($conn));

    header("Location: ../orriak/user_menu/liburu_zerrenda.php");
?>