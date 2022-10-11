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
        <title>Web Sistema</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
    </head>
    <body>
        <?php include '../../templates/header.php'; ?>
        <main>
            <div class="login-page">
                <div class="form">
                    <form class="resgister-form" id="liburuDatu" method="post" action="../../config_php/liburuak_sartu.php">
                        Izenburua: <input type="text" name="izenburua" required>
                        Idazlea: <input type="text" name="idazlea" required>
                        Argitalpen data: <input type="date" name="ArgitalpenData"  required>
                        Orrialde kopurua: <input type="text" name="OrrialdeKop" required>
                        Argitaletxea: <input type="text" name="argitaletxea" required>
                        ISBN: <input type="text" name="ISBN" required>
                        <button type="submit" name="ados">Ados</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
