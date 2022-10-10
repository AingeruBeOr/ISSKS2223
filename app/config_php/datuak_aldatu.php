<?php 
    include 'db_link.php';

    $NAN = $_POST['NAN'];
    $Izena = $_POST['Izena'];
    $Telefonoa = $_POST['Telefonoa'];
    $Jaiotze_data = $_POST['Jaiotze_data'];
    $Email = $_POST['email'];

    $query = mysqli_query($conn, "UPDATE usuarios SET IZEN_ABIZENAK = '$Izena', TELEFONOA='$Telefonoa', JAIOTZE_DATA='$Jaiotze_data', EMAIL='$Email' WHERE DNI='$NAN'") or die (mysqli_error($conn));
    
    header("Location: ../orriak/user_menu/user_menu.php");  
?>