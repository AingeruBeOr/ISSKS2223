<?php

    session_start();

    $erabiltzaile = $_SESSION['username'];

    //saioa irekita badago, ez zaie utziko erregistratu.php orrira sartzea
    if(isset($erabiltzaile)){
        header("location: user_menu/user_menu.php");
    }

	if(empty($_GET['keyerror'])) $error = 0;
    else $error = $_GET['keyerror'];

	//Token bat sortu SHA-256 hash algoritmoa erabiliz:
    if(empty($_SESSION['token'])){
        $ordua = date('H:i');
        $id = $_SESSION['ID_USER'];
        $token = hash('sha256', $ordua.$id);
        $_SESSION['token'] = $token;

    }

	//Anti clickJacking header (php-ren azkenengo lerroak izan behar dute)
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'X-XSS-Protection: 1;mode=block' );
	header_remove("X-Powered-By");
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Erregistro</title>
		<link rel="stylesheet" type="text/css" href="../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../estiloak/index.css">
		<link rel="shortcut icon" href="../irudiak/book.png" />
    </head>
    <body>
		<main>
			<div class="login-page">
				<div class="form">
					<form class="resgister-form" id="formulario" method="post" action="../config_php/erregistratu.php">
						<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
						<div class="formulario__grupo" id="grupo__izena"> 
							Izen Abizenak (erabiltzailea): <input type="text" id="Izena" name="Izena" placeholder="Zure erabiltzailea sartu" required>
						</div>
						<div class="formulario__grupo" id="grupo__nan">
							NAN: <input type="text" id="NAN" name="NAN" placeholder="11111111-Z" required>
						</div>
						<div class="formulario__grupo" id="grupo__telefonoa">
							Telefonoa: <input type="text" id="Telefonoa" name="Telefonoa" placeholder="123456789" required>
						</div>
						<div class="formulario__grupo" id="grupo__jaiotzedata">
							Jaiotze data: <input type="date" id="Jaiotze_data" name="Jaiotze_data" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							Email: <input type="email" id="email" name="email" placeholder="adibidea@zerbitzaria.luzapen" required>
						</div>
						<div class="formulario__grupo" id="grupo__pasahitza">
							Pasahitza: <input type= "password" id="Pasahitza" name="Pasahitza" placeholder="Sartu zure pasahitza" required>
						</div>
						<div class="formulario__grupo" id="grupo__pasahitza2">
							Konfirmazioa: <input type="password" id="Konfirmazioa" name="Konfirmazioa" placeholder="Sartu zure pasahitza berriz ere" required>
						</div>
							
						<button type="submit" name="erregistratu">Erregistratu</button>
						<p class="message">Jadanik erregistratuta? <a href="../index.php">Identifikatu</a></p>
						<p id="erroreak" class="error_message">
							<?php 
								if($error==1) echo "Jadanik existitzen da erabiltzaile bat email horrekin.";
								if($error==2) echo "Jadanik existitzen da erabiltzaile bat NAN horrekin." ;
							?>
						</p> 
						<meta http-equiv="Content-Security-Policy" content="default-src 'none' ;" >      
					</form>
				</div>
			</div>
			<script src="../js/erregistro.js"></script>
		</main>
    </body>
</html>
