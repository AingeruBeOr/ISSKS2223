<?php 

    session_start();

    $erabiltzaile = $_SESSION['username'];

    //saioa ez badago irekita, ez zaie utziko user_menu.php orrira sartzea
    if(!isset($erabiltzaile)){
        header("location: ../../index.php");
    }

?>

<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
        <title>Web Sistema</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/user_menu/user_menu.css">
=======
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/user_menu/user_menu.css">
        <link rel="shortcut icon" href="../../irudiak/book.png" />
>>>>>>> entrega_1
    </head>
    <body>
        <?php include '../../templates/header.php'; ?>
        <div class="menua">
            <div class="botoi_panel">
                <button><a href="./datuen_aldaketa.php">Nire datuak aldatu</a></button>
<<<<<<< HEAD
                <button><a href="./liburu_zerrenda.php">Liburuen zerrenda ikusi</button>
=======
                <button><a href="./liburu_zerrenda.php">Liburuen zerrenda ikusi</a></button>
>>>>>>> entrega_1
                <button><a href="./liburu_gehitu.php">Liburua gehitu</a></button>
                <button><a href="../../config_php/logout.php">Saioa itxi</a></button>
            </div>
        </div>
        <!-- <a href="datuen_aldaketa.html">Nire datuak aldatu</a> -->
        <!-- <a href="liburu_zerrenda.html">Liburuen zerrenda ikusi</a>
        <a href="liburu_gehitu.html">Liburua gehitu</a>
        <a href="../index.html"></a> -->
    </body>
</html>
