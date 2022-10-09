<?php
    include 'db_link.php';

    $delete = "";//TODO

    $query = mysqli_query($conn, $delete) or die (mysqli_error($conn));

    header("Location: ../orriak/user_menu/liburu_zerrenda.php");
?>