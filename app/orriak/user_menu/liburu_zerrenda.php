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
        <link rel="stylesheet" type="text/css" href="../../estiloak/index.css">
</head>
<body>

<br>
	
	<table border="1" style="background-color: white">
		<tr>
			<th></th>
			<th style="font-family: Arial; font-size: 20px;">Izenburua</th>
            <th style="font-family: Arial; font-size: 20px">Idazlea</th>	
		</tr>

		<?php 
	$query = mysqli_query($conn, "SELECT IZENBURUA, IDAZLEA FROM liburua")
   or die (mysqli_error($conn));
	$lerro=0;

	while ($row = mysqli_fetch_array($query)) {
		$lerro=$lerro+1;
	  echo
	   "<tr class=".$lerro.">
	   		<td> ".$lerro." </td>
	    	<td>{$row['IZENBURUA']}</td> 
	    	<td>{$row['IDAZLEA']}</td>
			<td> <a href=../../index.html><img src=lapiz.png width=30></a></td>
			<td> <a href=> <img src=papelera.png width=30></td>
		
	   </tr>";
   

	}
		

	mysqli_close($conn);
	 ?>
	</table>

</body>
</html>
