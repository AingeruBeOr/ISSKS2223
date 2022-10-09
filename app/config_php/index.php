<?php
    include 'db_link.php';

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
