<?php 
	include '../../config_php/db_link.php';

	session_start();

	$erabiltzaile = $_SESSION['username'];

    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE izen_abizenak = '$erabiltzaile'") or die (mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $DNI = $row['DNI'];
    $IZEN_ABIZENAK = $row['Izen_Abizenak']; 
    $TELEFONOA = $row['Telefonoa'];
    $JAIOTZE_DATA = $row['Jaiotze_Data'];
    $EMAIL = $row['Email'];
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
					<form class="resgister-form" id="formulario" method="post" action="../../config_php/datuak_aldatu.php">
						<div class="formulario__grupo" id="grupo__nan">
							NAN (ezin da aldatu): <input type="text" name="NAN" value="<?php echo $DNI ?>" readonly>
						</div>
						<div class="formulario__grupo" id="grupo__izena"> 
							Izen Abizenak (erabiltzailea): <input type="text" name="Izena" value="<?php echo $IZEN_ABIZENAK ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__telefonoa">
							Telefonoa: <input type="text" name="Telefonoa" value="<?php echo $TELEFONOA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__jaiotzedata">
							Jaiotze data: <input type="date" name="Jaiotze_data" value="<?php echo $JAIOTZE_DATA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							Email: <input type="email" name="email" value="<?php echo $EMAIL ?>" required>
						</div>
						<button type="submit" name="erregistratu">DATUAK ALDATU</button>      
					</form>
				</div>
			</div>
			<script src="../js/erregistro.js"></script>
			<!--<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> ESTO NO SE Q ES EXACTAMENTE-->
		</main>
    </body>
</html>