<?php 
    include 'db_link.php';

    session_start();

    $NAN = $_POST['NAN'];
    $Izena = $_POST['Izena'];
    $Telefonoa = $_POST['Telefonoa'];
    $Jaiotze_data = $_POST['Jaiotze_data'];
    $Email = $_POST['email'];
    $Pasahitz = $_POST['pasahitza'];

    if(is_null($Pasahitz)) $query = mysqli_query($conn, "UPDATE usuarios SET IZEN_ABIZENAK = '$Izena', TELEFONOA='$Telefonoa', JAIOTZE_DATA='$Jaiotze_data', EMAIL='$Email' WHERE DNI='$NAN'") or die (mysqli_error($conn));
    else $query = mysqli_query($conn, "UPDATE usuarios SET IZEN_ABIZENAK = '$Izena', TELEFONOA='$Telefonoa', JAIOTZE_DATA='$Jaiotze_data', EMAIL='$Email', PASAHITZA='$Pasahitz' WHERE DNI='$NAN'") or die (mysqli_error($conn));

    $_SESSION['username'] = $Izena; 
    
    header("Location: ../orriak/user_menu/user_menu.php");  
?>