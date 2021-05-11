<?php
    $code = $_POST['code'];
    $id = $_POST['id'];

    $db_benutzer = '';
    $db_passwort = '';
    $db_name = '';
    $db_server = '';

    $conn = new mysqli($db_server, $db_benutzer, $db_passwort, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Codes WHERE Code = '".$code."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['Used'] == "0") {
                $sql = "UPDATE Codes Set Used = '1' WHERE Code = '" . $code . "'";
                $conn->query($sql);
                $sql = "SELECT * FROM WahlKandidaten WHERE ID = '".$id."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $stimmen = $row['Stimmen'] + 1;
                        $sql = "UPDATE `WahlKandidaten` SET `Stimmen` = '".$stimmen."' WHERE `WahlKandidaten`.`ID` = ".$id;
                        $conn->query($sql);
                        echo "Sie haben erfolgreich abgestimmt";
                    }
                }
            } else {
                echo "Dieser Code wurde bereits genutzt";
            }
        }
    }else{
        echo "Dieser Code existiert nicht";
    }

?>