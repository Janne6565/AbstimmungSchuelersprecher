<?php
    $code = $_POST['code'];

    # Zugangsdaten
    $db_benutzer = '';
    $db_passwort = '';
    $db_name = '';
    $db_server = '';

    $conn = new mysqli($db_server, $db_benutzer, $db_passwort, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (strlen($code) == 5){
        $sql = "SELECT * FROM Codes WHERE Code = '$code'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            echo "true";
        }else{
            echo "false";
        }
    }else{
        echo "false";
    }
    $conn->close();
?>