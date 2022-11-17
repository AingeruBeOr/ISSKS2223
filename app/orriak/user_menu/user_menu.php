<?php 

    session_start();

    $erabiltzaile = $_SESSION['username'];

    //saioa ez badago irekita, ez zaie utziko user_menu.php orrira sartzea
    if(!isset($erabiltzaile)){
        header("location: ../../index.php");
    }

    //Token bat sortu SHA-256 hash algoritmoa erabiliz:
    $ordua = date('H:i');
    $id = $_SESSION['ID_USER'];
    $token = hash('sha256', $ordua.$id);
    $_SESSION['token'] = $token;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/user_menu/user_menu.css">
        <link rel="shortcut icon" href="../../irudiak/book.png" />
    </head>
    <body>
        <?php include '../../templates/header.php'; ?>
        <div class="menua">
            <div class="botoi_panel">
                <button><a href="./datuen_aldaketa.php">Nire datuak aldatu</a></button>
                <button><a href="./liburu_zerrenda.php">Liburuen zerrenda ikusi</a></button>
                <button><a href="./liburu_gehitu.php">Liburua gehitu</a></button>
                <button><a href="../../config_php/logout.php">Saioa itxi</a></button>
            </div>
        </div>
        <script>
            //Aktibitaterik ez egotekotan 2 minutuz log-out egingo du (arratoia ez bada mugitzen):
            n=120
            var id = window.setInterval(() => {
                document.onmousemove= function(){
                    n=120
                };
                n--;
                if(n <= -1){
                    location.href = "../../config_php/logout.php";
                }
            }, 1200);
        </script>
    </body>
</html>
