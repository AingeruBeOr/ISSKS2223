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

    $Izena = $_POST["Izena"];
    $NAN = $_POST["NAN"];
    $Telefonoa = $_POST["Telefonoa"];
    $Jaiotze_data = $_POST["Jaiotze_data"];
    $email = $_POST["email"];
    $Pasahitza = $_POST["Pasahitza"];
    $Konfirmazioa = $_POST["Konfirmazioa"];

    //TODO NAN aldatu ahal bada
    //TODO pasahitza eta konfirmazioa berdinak diren konfirmatu
    
    $query = mysqli_query($conn, "UPDATE usuarios SET DNI = '$NAN', Izen_Abizenak='$Izena',Telefonoa='$Telefonoa',Jaiotze_Data='$Jaiotze_Data',Email='$email',Pasahitza='$Pasahitza' WHERE DNI='$NAN'") or die (mysqli_error($conn));
    
    header("Location: ../orriak/user_menu/liburu_zerrenda.php"); 
?>