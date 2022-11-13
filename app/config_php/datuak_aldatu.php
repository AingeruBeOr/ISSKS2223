<?php 
    include 'db_link.php';

    session_start();

    if (!empty($_POST['csrf'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
            $id=$_SESSION['ID_USER'];

            $NAN = $_POST['NAN'];
            $Izena = $_POST['Izena'];
            $Telefonoa = $_POST['Telefonoa'];
            $Jaiotze_data = $_POST['Jaiotze_data'];
            $Email = $_POST['email'];
            $Pasahitz = $_POST['pasahitza'];

            $Zure_pasahitza= $_POST['zurepasahitza'];

            $query = mysqli_query($conn, "SELECT Pasahitza FROM usuarios WHERE ID = '$id'") or die (mysqli_error($conn));
            $row = mysqli_fetch_array($query);
            $NirePasahitza = $row['Pasahitza'];

            if($NirePasahitza==$Zure_pasahitza){
                if(empty($Pasahitz)){
                    $query = mysqli_query($conn, "UPDATE usuarios SET DNI='$NAN', IZEN_ABIZENAK = '$Izena', TELEFONOA='$Telefonoa', JAIOTZE_DATA='$Jaiotze_data', EMAIL='$Email' WHERE ID='$id'") or die (mysqli_error($conn));
                } else {
                    $query = mysqli_query($conn, "UPDATE usuarios SET DNI='$NAN', IZEN_ABIZENAK = '$Izena', TELEFONOA='$Telefonoa', JAIOTZE_DATA='$Jaiotze_data', EMAIL='$Email', PASAHITZA='$Pasahitz' WHERE ID='$id'") or die (mysqli_error($conn));
                }
                $_SESSION['username'] = $Izena; 
                header("Location: ../orriak/user_menu/user_menu.php");  
            }else{
                header("Location: ../orriak/user_menu/datuen_aldaketa.php?keyerror=1");
            }
        }else{
            header("location: ../index.php");
        }
    }else{
        header("location: ../index.php");
    }    

?>