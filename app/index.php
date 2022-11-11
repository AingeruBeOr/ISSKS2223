<?php

    session_start();

    $erabiltzaile = $_SESSION['username'];

    //saioa irekita badago, ez zaie utziko index.php orrira sartzea
    if(isset($erabiltzaile)){
        header("location: orriak/user_menu/user_menu.php");
    }
    
    if(empty($_GET['txarto'])) $error = 0;
    else $error = 1;

    //Token bat sortu SHA-256 hash algoritmoa erabiliz:      
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        

    //Anti clickJacking header (php-ren azkenengo lerroak izan behar dute)
    header( 'X-Content-Type-Options: nosniff' );
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-XSS-Protection: 1;mode=block' );( 'X-XSS-Protection: 1;mode=block' );
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Log-in</title>
        <link rel="stylesheet" type="text/css" href="estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="estiloak/index.css">
        <link rel="shortcut icon" href="irudiak/book.png" />
    </head>
    <body>
        <div class="login-page">
            <h1 class="h1">MUBASA LIBURUTEGIA</h1>
            <div class="form">
                <meta http-equiv="Content-Security-Policy" content="default-src 'none' ;" >
                <form class="login-form" method="post" action="config_php/login.php">
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                    EMAIL: <input type="email" name="email" placeholder="Zure email-a sartu" required><br>
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
