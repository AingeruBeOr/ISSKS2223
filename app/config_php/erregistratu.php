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

    $select = "SELECT * FROM usuarios WHERE email = '$email'";
    $query = mysqli_query($conn, $select);
    $num_rows = mysqli_num_rows($query);
    if($num_rows>=1) header("Location: ../orriak/erregistratu.php?keyerror=1");
    else{
        $insert = "INSERT INTO usuarios (`DNI`,`Izen_Abizenak`,`Telefonoa`,`Jaiotze_Data`,`Email`,`Pasahitza`) 
               VALUES ('$NAN','$Izena', '$Telefonoa' ,'$Jaiotze_data','$email','$Pasahitza')" ;
        
        $query = mysqli_query($conn, $insert); //or die (mysqli_error($conn));
        
        if(mysqli_errno($conn) == 1062){ //Adierazitako NAN jadanik datu basean badago (1062 error: Duplicate primary entry)
            header("Location: ../orriak/erregistratu.php?keyerror=2");
        }
        else{
            header("Location: ../orriak/user_menu/user_menu.php");
        }
    } 
    
    mysqli_close($conn);
?>