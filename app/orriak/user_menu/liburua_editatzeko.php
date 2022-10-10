<?php 
	include '../../config_php/db_link.php';
	session_start();


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
		<?php include '../../templates/header.php'; ?>
		<main>
			<div class="login-page">
				<div class="form">
					<form class="resgister-form" id="formulario" method="post" action="../../config_php/liburua_editatu.php">
                        <div class="formulario__grupo" id="grupo__pasahitza">
                            ISBN (ezin da aldatu): <input type= "text" name="ISBN" value="<?php echo $ISBN ?>" readonly>
                        </div>
						<div class="formulario__grupo" id="grupo__izena"> 
							IZENBURUA <input type="text" name="Izenburua" value="<?php echo $IZENBURUA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__nan">
							IDAZLEA: <input type="text" name="Idazlea" value="<?php echo $IDAZLEA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__telefonoa">
							ARGITALPEN DATA: <input type="date" name="Argitalpen_dat" value="<?php echo $ARGITALPEN_DAT ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__jaiotzedata">
							ORRIALDE KOPURUA: <input type="text" name="Orri_kop" value="<?php echo $ORRI_KOP ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							ARGITALETXEA: <input type="text" name="Argitaletxe" value="<?php echo $ARGITALTXE ?>" required>
						</div>
							
						<button name="erregistratu">Aldatu</button>      
					</form>
				</div>
			</div>
		</main>
    </body>
</html>