<!DOCTYPE html>
<html>
    <head>
        <title>Web Sistema</title>
        <link rel="stylesheet" type="text/css" href="estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="estiloak/index.css">
    </head>
    <body> 
        <div class="login-page">
            <div class="form">
                <form class="login-form" method="post" action="config_php/login.php">
                    ERABILTZAILEA: <input type="text" name="erabiltzailea" placeholder="Zura erabiltzailea sartu" required><br>
                    PASAHITZA: <input type="password" name="pasahitza" placeholder="Zure pasahitza sartu" required><br>
                    <button>Sartu</button>
                    <p class="message">Ez zaude erregistratuta? <a href="orriak/erregistratu.php">Erregistratu</a></p>
                </form> 
            </div>
        </div>
    </body>
    
</html>