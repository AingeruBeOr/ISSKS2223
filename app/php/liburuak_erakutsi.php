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
    
    
  function cargardb($conn){
  	$hostname = "db";
  	$username = "admin";
  	$password = "test";
  	$db = "database.liburua";

  	$conn = mysqli_connect($hostname,$username,$password,$db);
  	if ($conn->connect_error) {
   	 die("Database connection failed: " . $conn->connect_error);
  	}
  }
  
  function insert($conn){
	$IZENBURUA = $_POST['IZENBURUA'];
	$IDAZLEA = $_POST['IDAZLEA'];
	$ARGITALPENDATA = $_POST['ARGITALPENDATA'];
	$ORRIALDEKOP = $_POST['ORRIALDEKOP'];
	$ARGITALETXEA = $_POST['ARGITALETXEA'];
	$ISBN = $_POST['ISBN'];
	$query = "INSERT INTO usuarios(IZENBURUA, IDAZLEA, ARGITALPENDATA, ORRIALDEKOP, ARGITALETXEA, ISBN) VALUES ('$IZENBURUA', '$IDAZLEA', '$ARGITALPENDATA', '$ORRIALDEKOP', '$ARGITALETXEA', '$ISBN')";
	mysqli_query($conn, $query);
}

function delete($conn){
	$ISBN = $_POST['ISBN'];
	$query = "DELETE FROM liburua WHERE ISBN='$ISBN'";
	mysqli_query($conn, $query);
	//mysqli_close($conn);
	
}
function cargarTabla($conn){
	cargardb($conn);
	$query = mysqli_query($conn, "SELECT IZENBURUA, IDAZLEA FROM liburua")
   or die (mysqli_error($conn));

	while ($row = mysqli_fetch_array($query)) {
  	echo
  	"<tr>
    	<td>{$row['IZENBURUA']}</td> 
    	<td>{$row['IDAZLEA']}</td>
   	</tr><br>";
   	}
   }

?>
