<?php
    //datu basearen konexioa ahalbidetzen dituzten aldagaiak:
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    //DB-arekin konexioa:
    $conn = mysqli_connect($hostname,$username,$password,$db);

    if ($conn->connect_error) {
        die("Database connection failed: " .$conn->connect_error);
    }
    // Hay que tener cuidado de no escribir un espacio despúes de la siguiente linea, la de cierre de php.
?>