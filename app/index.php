<?php
  echo '<h1>Yeah, it works!<h1>';
  // phpinfo();
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
//**********************AÑADIDO MAITANE****************
function insert($conn){
	$DNI = $_POST['DNI'];
	$IzenAbizen = $_POST['Izen Abizenak'];
	$Telefonoa = $_POST['Telefonoa'];
	$JaiotzeData = $_POST['Jaiotze data'];
	$Email = $_POST['Emaila'];
	$query = "INSERT INTO usuarios(DNI, Izen Abizenak, Telefonoa, Jaiotze Data, Email) VALUES ('$DNI', '$IzenAbizen', '$Telefonoa', '$JaiotzeData', '$Email')";
	mysqli_query($conn, $query);
}

function delete($conn){
	$DNI = $_POST['DNI'];
	$query = "DELETE FROM usuarios WHERE DNI='$DNI'";
	mysqli_query($conn, $query);
	//mysqli_close($conn);
	
}
function cargarTabla($conn){
	$query = mysqli_query($conn, "SELECT * FROM usuarios")
   or die (mysqli_error($conn));

	while ($row = mysqli_fetch_array($query)) {
  	echo
  	"<tr>
    	<td>{$row['DNI']}</td> 
    	<td>{$row['Izen Abizenak']}</td>
   	 <td>{$row['Telefonoa']}</td>
    	<td>{$row['Jaiotze Data']}</td>
    	<td>{$row['Email']}</td>
   	</tr><br>";
}
//*********************************************************
$query = mysqli_query($conn, "SELECT * FROM usuarios")
   or die (mysqli_error($conn));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['DNI']}</td> 
    <td>{$row['Izen Abizenak']}</td>
    <td>{$row['Telefonoa']}</td>
    <td>{$row['Jaiotze Data']}</td>
    <td>{$row['Email']}</td>
   </tr><br>";
   

}

?>
