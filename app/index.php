<?php

    session_start();

    $erabiltzaile = $_SESSION['username'];

    //saioa irekita badago, ez zaie utziko index.php orrira sartzea
    if(isset($erabiltzaile)){
        header("location: orriak/user_menu/user_menu.php");
    }
    
    if(empty($_GET['txarto'])) $error = 0;
    else $error = 1;

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Web Sistema</title>
        <link rel="stylesheet" type="text/css" href="estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="estiloak/index.css">
        <link rel="shortcut icon" href="irudiak/book.png" />
    </head>

    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" action="config_php/login.php">
                    EMAIL: <input type="email" name="email" placeholder="Zura email-a sartu" required><br>
                    PASAHITZA: <input type="password" name="pasahitza" placeholder="Zure pasahitza sartu" required><br>
                    <button>Sartu</button>
                    <p class="message">Ez zaude erregistratuta? <a href="orriak/erregistratu.php">Erregistratu</a></p>
                    <?php 
                        if($error == 1) echo "<p class='error_message'>Ez da erabiltzailerik ezagutzen email eta pasahitza horrekin.</p>" 
                    ?> 
                </form> 
            </div>
        </div>
    </body>
    
</html>
