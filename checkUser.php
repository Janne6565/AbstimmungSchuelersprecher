<?php
    $querry = $_POST['querry'];
    $active = $_POST['Id'];

    $db_benutzer = '';
    $db_passwort = '';
    $db_name = '';
    $db_server = '';

    $conn = new mysqli($db_server, $db_benutzer, $db_passwort, $db_name);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Name, Stimmen, Klasse, Id FROM WahlKandidaten WHERE Name LIKE '%".$querry."%' LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          if ($row['Id']==$active) {
              echo "
        <span class='person' active='true' onclick='select(".$row['Id'].")' id='select".$row['Id']."' selected='true'>
        <h1>" . $row['Name'] . "</h1>
        <h1>" . $row['Klasse'] . "</h1>
        <div class='hidden'>" . $row['Id'] . "</div>
        </span>
        ";
          }else{
              echo "
        <span class='person' active='false' onclick='select(".$row['Id'].")' id='select".$row['Id']."' selected='false'>
        <h1>" . $row['Name'] . "</h1>
        <h1>" . $row['Klasse'] . "</h1>
        <div class='hidden'>" . $row['Id'] . "</div>
        </span>
        ";
          }
      }
    } else {
        echo "Keine Ergebnisse";
    }
    $conn->close();
?>