<?php
    include 'db_link.php';

    //sesio berri bat sortzen da:
    session_start();

    //index.html orritik "POST" bidez lortu ditugun aldagaik:
<<<<<<< HEAD
    $erabiltzaile = $_POST["erabiltzailea"];
    $pasahitza = $_POST["pasahitza"];

    $query = mysqli_query($conn, "SELECT Izen_Abizenak FROM usuarios WHERE Izen_Abizenak = '".$erabiltzaile."' and Pasahitza = '".$pasahitza."'") or die (mysqli_error($conn));
    $num_rows = mysqli_num_rows($query);

    if($num_rows >= 1){
        //erabiltzailea eta pasahitza ondo sartu badira, "user_menu.html" orrira joango gara.
        $_SESSION['username'] = $erabiltzaile;
=======
    $email = $_POST["email"];
    $pasahitza = $_POST["pasahitza"];

    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '".$email."' and Pasahitza = '".$pasahitza."'") or die (mysqli_error($conn));
    $num_rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);

    if($num_rows >= 1){
        //erabiltzailea eta pasahitza ondo sartu badira, "user_menu.html" orrira joango gara.
        $_SESSION['username'] = $row['Izen_Abizenak'];
        $_SESSION['email'] = $email;
        $_SESSION['ID_USER'] = $row['ID'];
>>>>>>> entrega_1
        header("Location: ../orriak/user_menu/user_menu.php"); 
    }
    else{
        header("Location: ../index.php?txarto=1"); 
    }

    mysqli_close($conn);
?>