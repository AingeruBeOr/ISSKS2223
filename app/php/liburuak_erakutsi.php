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
    
   
	$query = mysqli_query($conn, "SELECT IZENBURUA, IDAZLEA FROM liburua")
   or die (mysqli_error($conn));

	while ($row = mysqli_fetch_array($query)) {
  	echo
  	"<tr>
    	<td>{$row['IZENBURUA']}</td> 
    	<td>{$row['IDAZLEA']}</td>
   	</tr><br>";
   	}
 

?>
