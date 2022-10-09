<?php
    include 'db_link.php';

    //erregistratu.html orritik "POST" bidez lortu ditugun aldagaiak:
    $Izena = $_POST["Izena"];
    $NAN = $_POST["NAN"];
    $Telefonoa = $_POST["Telefonoa"];
    $Jaiotze_data = $_POST["Jaiotze_data"];
    $email = $_POST["email"];
    $Pasahitza = $_POST["Pasahitza"];
    $Konfirmazioa = $_POST["Konfirmazioa"];

    $insert = "INSERT INTO usuarios (`DNI`,`Izen_Abizenak`,`Telefonoa`,`Jaiotze_Data`,`Email`,`Pasahitza`) 
               VALUES ('$NAN','$Izena', '$Telefonoa' ,'$Jaiotze_data','$email','$Pasahitza')" ;
    $query = mysqli_query($conn, $insert) or die (mysqli_error($conn));

    header("Location: ../orriak/user_menu/user_menu.html"); //erabiltzailea eta pasahitza ondo sartu badira, "user_menu.html" orrira joango gara.
    
    mysqli_close($conn);
?>