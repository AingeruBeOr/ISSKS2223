<?php 

    session_start();

    $erabiltzaile = $_SESSION['username'];

    //saioa ez badago irekita, ez zaie utziko user_menu.php orrira sartzea
    if(!isset($erabiltzaile)){
        header("location: ../../index.php");
    }

    if(empty($_GET['keyerror'])) $error = 0;
    else $error = 1;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Liburua sartu</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
        <link rel="shortcut icon" href="../../irudiak/book.png" />
    </head>
    <body>
        <?php include '../../templates/header.php'; ?>
        <main>
            <div class="login-page">
                <div class="form">
                    <form class="resgister-form" id="liburuDatu" method="post" action="../../config_php/liburuak_sartu.php">
                        Izenburua: <input type="text" id="izenburua" name="izenburua" required>
                        Idazlea: <input type="text" id="idazlea" name="idazlea" required>
                        Argitalpen data: <input type="date"  id="ArgitalpenData" name="ArgitalpenData"  required>
                        Orrialde kopurua: <input type="text" id="OrrialdeKop" name="OrrialdeKop" required>
                        Argitaletxea: <input type="text" id="argitaletxea" name="argitaletxea" required>
                        ISBN: <input type="text" id="ISBN" name="ISBN" required>
                        <button type="submit" name="ados">Ados</button>
                        <p id="erroreak" class="error_message"><?php if($error==1) echo "Jadanik exisititzen da liburu bat ISBN horrekin." ?></p>
                    </form>
                </div>
            </div>
            <script src="../../js/liburu_gehitu.js"></script>
        </main>
    </body>
</html>
