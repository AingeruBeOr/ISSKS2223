<?php 
	include '../../config_php/db_link.php';

	session_start();

	$erabiltzaile = $_SESSION['username'];

    //saioa ez badago irekita, ez zaie utziko user_menu.php orrira sartzea
    if(!isset($erabiltzaile)){
        header("location: ../../index.php");
    }
	

    $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE izen_abizenak = '$erabiltzaile'") or die (mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $DNI = $row['DNI'];
    $IZEN_ABIZENAK = $row['Izen_Abizenak']; 
    $TELEFONOA = $row['Telefonoa'];
    $JAIOTZE_DATA = $row['Jaiotze_Data'];
    $EMAIL = $row['Email'];

	$PASAHITZA = $row['Pasahitza'];

	if(empty($_GET['keyerror'])) $error = 0;
    else $error = $_GET['keyerror']

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Perfil aldaketa</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
		<link rel="shortcut icon" href="../../irudiak/book.png" />
    </head>
    <body>
		<?php include '../../templates/header.php'; ?>
        <main>
			<div class="login-page">
				<div class="form">
					<form class="resgister-form" id="formulario" method="post" action="../../config_php/datuak_aldatu.php">
						<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
						<div class="formulario__grupo" id="grupo__nan">
							NAN: <input type="text" id="NAN" name="NAN" value="<?php echo $DNI ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__izena"> 
							Izen Abizenak (erabiltzailea): <input type="text" id="Izena" name="Izena" value="<?php echo $IZEN_ABIZENAK ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__telefonoa">
							Telefonoa: <input type="text" id="Telefonoa" name="Telefonoa" value="<?php echo $TELEFONOA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__jaiotzedata">
							Jaiotze data: <input type="date" id="Jaiotze_data" name="Jaiotze_data" value="<?php echo $JAIOTZE_DATA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							Email: <input type="email" id="email" name="email" value="<?php echo $EMAIL ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							Pasahitza berria (nahi izatekotan): <input type="password" id="pasahitza" name="pasahitza">
						</div>
						<div class="formulario__grupo" id="grupo__email">
							Konfirmazioa: <input type="password" id="pasahitza2" name="pasahitza2">
						</div>
						<div class="boton_necesario">
							SARTU ZURE PASAHITZA DATUAK ALDATZEKO: <input class="boton_necesario" type="password" id="zurepasahitza" name="zurepasahitza">
						</div>
						<button type="submit" name="erregistratu">DATUAK ALDATU</button>
					</form>
					<button class="home_button" onclick="location.href='user_menu.php'"><img src="../../irudiak/home.png" width="30px"></button>    
					<p id="erroreak" class="error_message">
						<?php 
							if($error==1) {
								echo "Zure oraingoko pasahitza ez da zuzena, saiatu berriro.";
								echo "<script>
										document.getElementById('zurepasahitza').style.border = '2px solid red';
									</script>";
							}	
						?>
					</p>   
				</div>
			</div>
			<script src="../../js/datuen_aldaketa.js"></script>
		</main>
		<script>
			//Aktibitaterik ez egotekotan 2 minutuz log-out egingo du (arratoia ez bada mugitzen):
            n=5
            var id = window.setInterval(() => {
                document.onmousemove= function(){
                    n=5
                };
                n--;
                if(n <= -1){
                    location.href = "../../config_php/logout.php";
                }
            }, 1200);
		</script>
		<script src="../../js/logout.js"></script>
    </body>
</html>