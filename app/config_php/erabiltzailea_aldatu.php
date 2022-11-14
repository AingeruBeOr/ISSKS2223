<?php 

    //************************************** CREO QUE NO SE USA **************************************************

    include 'db_link.php';
    if (!empty($_POST['csrf'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
            $Izena = $_POST["Izena"];
            $NAN = $_POST["NAN"];
            $Telefonoa = $_POST["Telefonoa"];
            $Jaiotze_data = $_POST["Jaiotze_data"];
            $email = $_POST["email"];
            $Pasahitza = $_POST["Pasahitza"];
            $Konfirmazioa = $_POST["Konfirmazioa"];

            $stmt = $conn->prepare("UPDATE usuarios SET DNI = ?, Izen_Abizenak = ?,Telefonoa = ?, Jaiotze_Data = ?, Email = ?, Pasahitza = ? WHERE DNI = ?");
            $stmt->bind_param("ssissss");
            $query = mysqli_query($conn, "UPDATE usuarios SET DNI = '$NAN', Izen_Abizenak='$Izena',Telefonoa='$Telefonoa',Jaiotze_Data='$Jaiotze_Data',Email='$email',Pasahitza='$Pasahitza' WHERE DNI='$NAN'") or die (mysqli_error($conn));
            
            header("Location: ../orriak/user_menu/liburu_zerrenda.php"); 
        } 
        else {
            error_log("127.0.0.1 user-identifier user_izena [".date('r')."] 'Erabiltzaile Erregistratua'" .PHP_EOL,3,"/var/log/apache2/register.log");
            header("Location: ../orriak/user_menu/user_menu.php");
        }
    }
    else{
        error_log("127.0.0.1 user-identifier user_izena [".date('r')."] 'Erabiltzaile Erregistratua'" .PHP_EOL,3,"/var/log/apache2/register.log");
        header("Location: ../orriak/user_menu/user_menu.php");
    }
    
?>