<?php
    include 'db_link.php';
    
    //erregistratu.html orritik "POST" bidez lortu ditugun aldagaiak:
	$IZENBURUA = $_POST["izenburua"];
	$IDAZLEA = $_POST["idazlea"];
	$ARGITALPENDATA = $_POST["ArgitalpenData"];
	$ORRIALDEKOP = $_POST["OrrialdeKop"];
	$ARGITALETXEA = $_POST["argitaletxea"];
	$ISBN = $_POST["ISBN"];
	  
    $insert = "INSERT INTO liburua (`IZENBURUA`,`IDAZLEA`,`ARGITALPENDATA`,`ORRIALDEKOP`,`ARGITALETXEA`,`ISBN`) VALUES ('$IZENBURUA', '$IDAZLEA', '$ARGITALPENDATA', '$ORRIALDEKOP', '$ARGITALETXEA', '$ISBN')";
	
    $query = mysqli_query($conn, $insert); //or die (mysqli_error($conn));

    if(mysqli_errno($conn) == 1062){ //Adierazitako ISBN jadanik datu basean badago (1062 error: Duplicate primary entry)
        header("Location: ../orriak/user_menu/liburu_gehitu.php?keyerror=1");
    }
    else{
        header("Location: ../orriak/user_menu/user_menu.php"); //liburuaren datuak ondo sartzen badira menura bueltatuko da.
    }

    
    mysqli_close($conn);
?>