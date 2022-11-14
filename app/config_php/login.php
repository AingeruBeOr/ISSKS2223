<?php
    include 'db_link.php';

    //sesio berri bat sortzen da:
    session_start();

    //TOKEN KONPROBAKETA FALTA DA BAINA ERRORE EMATEN DU HEADER-AK DEFINITUTA DAUDELAKO LOG-EN BIDEZ
    if (!empty($_POST['csrf'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrf'])) {
            //index.html orritik "POST" bidez lortu ditugun aldagaik:
            $email = $_POST["email"];
            $pasahitza = $_POST["pasahitza"];
        
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email); //"s" emaila String motakoak dela adierazten du
            $stmt->execute();
            $result = $stmt->get_result();
            $num_rows = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            
            $pasahitza_zuzen = password_verify($pasahitza, $row['Pasahitza']);
        
            if($num_rows == 1 and $pasahitza_zuzen){
                //erabiltzailea eta pasahitza ondo sartu badira, "user_menu.html" orrira joango gara.
                $_SESSION['username'] = $row['Izen_Abizenak'];
                $_SESSION['email'] = $email;
                $_SESSION['ID_USER'] = $row['ID'];
                loga_erregistratu(true);
                header("Location: ../orriak/user_menu/user_menu.php");
            }
            else {
                loga_erregistratu(false);
                header("Location: ../index.php?txarto=1");
            }    
        } 
        else {
            loga_erregistratu(false);
            header("Location: ../index.php?txarto=1");
        }
    }
    else {
        loga_erregistratu(false);
        header("Location: ../index.php?txarto=1");
    }

    function loga_erregistratu($egoera){
        date_default_timezone_set('Europe/Madrid');
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) $IP = $_SERVER['HTTP_CLIENT_IP'];
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else $lag = $_SERVER['REMOTE_ADDR'];
        if($egoera){
            error_log($lag." [".date('r')."] 'Login OK'".PHP_EOL,3,"/var/log/apache2/login.log");
        }
        else{
            error_log($lag." [".date('r')."] 'Login Txarto'" .PHP_EOL,3,"/var/log/apache2/login.log");       
        }
    }
    mysqli_close($conn);
?>