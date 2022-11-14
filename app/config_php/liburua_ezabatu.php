<?php
    include 'db_link.php';

    session_start();
    $Email=$_SESSION['email'];

    $ISBN= $_GET["isbn"];
    
    $stmt = $conn->prepare("DELETE FROM liburua WHERE ISBN = ? and Email = ?");
    $stmt->bind_param("is", $ISBN, $Email);
    $stmt->execute();

    header("Location: ../orriak/user_menu/liburu_zerrenda.php");
?>