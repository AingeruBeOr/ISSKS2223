<?php 

	include '../../config_php/db_link.php'; 
	session_start();

	$erabiltzaile = $_SESSION['username'];

    //saioa ez badago irekita, ez zaie utziko user_menu.php orrira sartzea
    if(!isset($erabiltzaile)){
        header("location: ../../index.php");
    }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Liburutegia</title>
		<link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
		<link rel="stylesheet" type="text/css" href="../../estiloak/user_menu/liburu_zerrenda.css">
		<link rel="shortcut icon" href="../../irudiak/book.png" />
	</head>
	<body>
		<?php include("../../templates/header.php"); ?>
		<br>
		<div class="laukia">
			<table border="1">
				<tr>
					<th></th>
					<th>Izenburua</th>
					<th>Idazlea</th>	
				</tr>

				<?php 
					$query = mysqli_query($conn, "SELECT ISBN, IZENBURUA, IDAZLEA FROM liburua") or die (mysqli_error($conn));
					$lerro=0;

					while ($row = mysqli_fetch_array($query)) {
						$lerro=$lerro+1;
						$izenburua = $row['IZENBURUA'];
						$idazle = $row['IDAZLEA'];
						$isbn = $row['ISBN'];
						echo 
							'<tr>
								<td>'.$lerro.'</td>
								<td>'.$izenburua.'</td> 
								<td>'.$idazle.'</td>
								<td><button onclick="editatu('.$isbn.')"><img src=../../irudiak/lapiz.png width=30></button></td>
								<td><button onclick="ezabatu('.$isbn.')"><img src=../../irudiak/papelera.png width=30></button></td>
							</tr>';
					}
					echo "<script type='text/javascript' src='../../js/liburu_zerrenda.js'></script>";
					mysqli_close($conn);
				?>				
			</table>
			<button class="home_button" onclick="location.href='user_menu.php'"><img src="../../irudiak/home.png" width="30px"></button>    
		</div>
	</body>
</html>
