<?php 

	//datu basearen konexioa ahalbidetzen dituzten aldagaiak:
    $hostname = "db";
    $username = "admin";
    $password = "test";
    $db = "database";


    //DB-arekin konexioa:
	$conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
    	die("Database connection failed: " . $conn->connect_error);
  	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Web Sistema</title>
		<link rel="stylesheet" type="text/css" href="../../estiloak/general.css">
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
	</head>
	<body>

		<br>
		<div class="form">
			<table border="1">
				<tr>
					<th></th>
					<th style="font-family: Arial; font-size: 20px;">Izenburua</th>
					<th style="font-family: Arial; font-size: 20px">Idazlea</th>	
				</tr>

				<?php 
					$query = mysqli_query($conn, "SELECT ISBN, IZENBURUA, IDAZLEA FROM liburua") or die (mysqli_error($conn));
					$lerro=0;

					while ($row = mysqli_fetch_array($query)) {
						$lerro=$lerro+1;
						echo 
							"<tr>
								<td> ".$lerro." </td>
								<td>{$row['IZENBURUA']}</td> 
								<td>{$row['IDAZLEA']}</td>
								<td><button onclick='editatu({$row['ISBN']})'><img src=../../irudiak/lapiz.png width=30></button></td>
								<td><button onclick='ezabatu()'><img src=../../irudiak/papelera.png width=30></button></td>
							</tr>";
					}
					echo "<script type='text/javascript' src='../../js/liburu_zerrenda.js'></script>";
					mysqli_close($conn);
				?>				
			</table>
		</div>
	</body>
</html>
