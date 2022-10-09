<?php 

	//datu basearen konexioa ahalbidetzen dituzten aldagaiak:
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";


    //DB-arekin konexioa:
	$conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
    	die("Database connection failed: " . $conn->connect_error);
  	}

    $ISBN = $_POST['ISBN'];
    $Izenburua = $_POST['Izenburua'];
    $Idazlea = $_POST['Idazlea'];
    $Argitalpen_dat = $_POST['Argitalpen_dat'];
    $Orri_kop = $_POST['Orri_kop'];
    $Argitaletxe = $_POST['Argitaletxe'];

    $query = mysqli_query($conn, "UPDATE liburua SET IZENBURUA = '$Izenburua', IDAZLEA='$Idazlea',ARGITALPENDATA='$Argitalpen_dat',ORRIALDEKOP='$Orri_kop',ARGITALETXEA='$Argitaletxe' WHERE ISBN='$ISBN'") or die (mysqli_error($conn));
    
    header("Location: ../orriak/user_menu/liburu_zerrenda.php"); 
?>