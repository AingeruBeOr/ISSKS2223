<?php
    //datu basearen konexioa ahalbidetzen dituzten aldagaiak:
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";

    //index.html orritik "POST" bidez lortu ditugun aldagaik:
    $erabiltzaile = $_POST["erabiltzailea"];
    $pasahitza = $_POST["pasahitza"];

    //DB-arekin konexioa:
    $conn = mysqli_connect($hostname,$username,$password,$db);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $query = mysqli_query($conn, "SELECT Izen_Abizenak FROM usuarios WHERE Izen_Abizenak = '".$erabiltzaile."'") or die (mysqli_error($conn));
    $num_rows = mysqli_num_rows($query);

    if($num_rows == 1){
        echo "Ongi etorri " .$erabiltzaile;
    }
    else{
        header("Location: ../index.html"); //erabiltzailea ez bada existitzen, "../index.html" orrialdera bueltatuko gara.
    }
?>