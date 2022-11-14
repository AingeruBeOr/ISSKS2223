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

            $stmt = $conn->prepare("SELECT Pasahitza FROM usuarios WHERE ID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();            
            $row = mysqli_fetch_array($result);

            $pasahitza_zuzen = password_verify($Zure_pasahitza, $row['Pasahitza']);

            if($pasahitza_zuzen){
                if(empty($Pasahitz)){
                    $stmt->prepare("UPDATE usuarios SET DNI = ?, IZEN_ABIZENAK = ?, TELEFONOA = ?, JAIOTZE_DATA = ?, EMAIL = ? WHERE ID = ?");
                    $stmt->bind_param("ssissi",$NAN, $Izena, $Telefonoa, $Jaiotze_data, $Email, $id);
                    $stmt->execute();
                } 
                else {
                     // Pasahitzari gatza gehitu eta hasheatu:
                    $hash = password_hash($Pasahitz, PASSWORD_DEFAULT, [15]);
                    $stmt->prepare("UPDATE usuarios SET DNI = ?, IZEN_ABIZENAK = ?, TELEFONOA = ?, JAIOTZE_DATA = ?, EMAIL = ?, PASAHITZA = ? WHERE ID = ?");
                    $stmt->bind_param("ssisssi",$NAN, $Izena, $Telefonoa, $Jaiotze_data, $Email, $hash, $id);
                    $stmt->execute();
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