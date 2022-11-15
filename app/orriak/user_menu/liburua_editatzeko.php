<?php 
	include '../../config_php/db_link.php';
	session_start();

	$erabiltzaile = $_SESSION['username'];

    //saioa ez badago irekita, ez zaie utziko user_menu.php orrira sartzea
    if(!isset($erabiltzaile)){
        header("location: ../../index.php");
    }

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
        <title>Editatu liburuak</title>
        <link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
		<link rel="shortcut icon" href="../../irudiak/book.png" />
    </head>
    <body>
		<?php include '../../templates/header.php'; ?>
		<main>
			<div class="login-page">
				<div class="form">
					<form class="resgister-form" id="formulario" method="post" action="../../config_php/liburua_editatu.php">
						<input type="hidden" name="csrf" value="<?php echo $_SESSION['token']; ?>">
                        <div class="formulario__grupo" id="grupo__pasahitza">
                            ISBN (ezin da aldatu): <input type= "text" name="ISBN" value="<?php echo $ISBN ?>" readonly>
                        </div>
						<div class="formulario__grupo" id="grupo__izena"> 
							IZENBURUA: <input type="text" id="izenburua" name="Izenburua" value="<?php echo $IZENBURUA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__nan">
							IDAZLEA: <input type="text" id="idazlea" name="Idazlea" value="<?php echo $IDAZLEA ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__telefonoa">
							ARGITALPEN DATA: <input type="date" id="ArgitalpenData" name="Argitalpen_dat" value="<?php echo $ARGITALPEN_DAT ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__jaiotzedata">
							ORRIALDE KOPURUA: <input type="text" id="OrrialdeKop" name="Orri_kop" value="<?php echo $ORRI_KOP ?>" required>
						</div>
						<div class="formulario__grupo" id="grupo__email">
							ARGITALETXEA: <input type="text" id="argitaletxea" name="Argitaletxe" value="<?php echo $ARGITALTXE ?>" required>
						</div>
							
						<button name="erregistratu">Aldatu</button> 
					</form>
					<button class="home_button" onclick="location.href='liburu_zerrenda.php'"><img src="../../irudiak/home.png" width="30px"></button>    
					<p id="erroreak" class="error_message"></p>     
				</div>
			</div>
			<script src="../../js/liburua_editatzeko.js"></script>
		</main>
		<script scr="../../js/logout.js"></script>
    </body>
</html>