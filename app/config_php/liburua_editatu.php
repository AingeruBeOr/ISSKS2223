<?php 
    include 'db_link.php';  
    session_start();

    if (!empty($_POST['csrf'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
            $Email=$_SESSION['email'];

            $ISBN = $_POST['ISBN'];
            $Izenburua = $_POST['Izenburua'];
            $Idazlea = $_POST['Idazlea'];
            $Argitalpen_dat = $_POST['Argitalpen_dat'];
            $Orri_kop = $_POST['Orri_kop'];
            $Argitaletxe = $_POST['Argitaletxe'];


            $stmt = $conn->prepare("UPDATE liburua SET IZENBURUA = ?, IDAZLEA = ?, ARGITALPENDATA = ?, ORRIALDEKOP = ?, ARGITALETXEA = ? WHERE ISBN = ? and Email = ?");
            $stmt->bind_param("sssisis", $Izenburua, $Idazlea, $Argitalpen_dat, $Orri_kop, $Argitaletxe, $ISBN, $Email);
            $stmt->execute();
            
            header("Location: ../orriak/user_menu/liburu_zerrenda.php");
        }
        else{
            header("location: ../index.php");
        }
    }
    else{
        header("location: ../index.php");
    }

?>