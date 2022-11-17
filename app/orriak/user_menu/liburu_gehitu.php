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
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
                        Izenburua: <input type="text" id="izenburua" name="izenburua" placeholder="Harry Potter 2" required>
                        Idazlea: <input type="text" id="idazlea" name="idazlea" placeholder="J K Rowling" required>
                        Argitalpen data: <input type="date"  id="ArgitalpenData" name="ArgitalpenData" required>
                        Orrialde kopurua: <input type="text" id="OrrialdeKop" name="OrrialdeKop" required>
                        Argitaletxea: <input type="text" id="argitaletxea" name="argitaletxea" placeholder="Bloomsbury" required>
                        ISBN: <input type="text" id="ISBN" name="ISBN" placeholder="1234567890123" required>
                        <button type="submit" name="ados">Ados</button>
                    </form>
                    <button class="home_button" onclick="location.href='user_menu.php'"><img src="../../irudiak/home.png" width="30px"></button>    
                    <p id="erroreak" class="error_message"><?php if($error==1) echo "Jadanik exisititzen da liburu bat ISBN horrekin." ?></p>
                </div>
            </div>
            <script src="../../js/liburu_gehitu.js"></script>
        </main>
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
