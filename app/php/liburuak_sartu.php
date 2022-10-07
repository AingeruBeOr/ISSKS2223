<?php

    //datu basearen konexioa ahalbidetzen dituzten aldagaiak:
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";
    
    //erregistratu.html orritik "POST" bidez lortu ditugun aldagaiak:
	$IZENBURUA = $_POST["izenburua"];
	$IDAZLEA = $_POST["idazlea"];
	$ARGITALPENDATA = $_POST["ArgitalpenData"];
	$ORRIALDEKOP = $_POST["OrrialdeKop"];
	$ARGITALETXEA = $_POST["argitaletxea"];
	$ISBN = $_POST["ISBN"];
	
	
    //DB-arekin konexioa:
    $conn = mysqli_connect($hostname,$username,$password,$db);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }
    
    
    $insert = "INSERT INTO liburua (`IZENBURUA`,`IDAZLEA`,`ARGITALPENDATA`,`ORRIALDEKOP`,`ARGITALETXEA`,`ISBN`) VALUES ('$IZENBURUA', '$IDAZLEA', '$ARGITALPENDATA', '$ORRIALDEKOP', '$ARGITALETXEA', '$ISBN')";
	
    $query = mysqli_query($conn, $insert) or die (mysqli_error($conn));

    header("Location: ../orriak/user_menu/user_menu.html"); //liburuaren datuak ondo sartzen badira menura bueltatuko da.
    
    mysqli_close($conn);

?>
