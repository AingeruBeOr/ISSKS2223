<?php 
	include '../../config_php/db_link.php';

    $ISBN = $_GET['isbn'];

    $query = mysqli_query($conn, "SELECT * FROM liburua WHERE ISBN = '$ISBN'") or die (mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $IZENBURUA = $row['IZENBURUA']; 
    $IDAZLEA = $row['IDAZLEA'];
    $ARGITALPEN_DAT = $row['ARGITALPENDATA'];
    $ORRI_KOP = $row['ORRIALDEKOP'];
    $ARGITALTXE = $row['ARGITALETXEA'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Web Sistema</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
    </head>
    <body>
        <main>
			<div class="login-page">
				<div class="form">
					<form class="resgister-form" id="formulario" method="post" action="../php/erregistratu.php">
						<div class="formulario__grupo" id="grupo__izena"> 
							Izen Abizenak (erabiltzailea): <input type="text" name="Izena" placeholder="Zure erabiltzailea sartu" required>
						</div>
						<div class="formulario__grupo" id="grupo__nan">
							NAN: <input type="text" name="NAN" placeholder="11111111-Z" required>
						</div>
						<div class="formulario__grupo" id="grupo__telefonoa">
							Telefonoa: <input type="text" name="Telefonoa" placeholder="123456789" required>
						</div>
						<div class="formulario__grupo" id="grupo__jaiotzedata">
							Jaiotze data: <input type="date" name="Jaiotze_data" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							Email: <input type="email" name="email" placeholder="adibidea@enpresa.luzapen" required>
						</div>
						<div class="formulario__grupo" id="grupo__pasahitza">
							Pasahitza: <input type= "password" name="Pasahitza" placeholder="Sartu zure pasahitza" required>
						</div>
						<div class="formulario__grupo" id="grupo__pasahitza2">
							Konfirmazioa: <input type="password" name="Konfirmazioa" placeholder="Sartu zure pasahitza berriz ere" required>
						</div>
							
						<button type="submit" name="erregistratu">Erregistratu</button>
						<p class="message">Jadanik erregistratuta? <a href="../index.php">Identifikatu</a></p>       
					</form>
				</div>
			</div>
			<script src="../js/erregistro.js"></script>
			<!--<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> ESTO NO SE Q ES EXACTAMENTE-->
		</main>
    </body>
</html>