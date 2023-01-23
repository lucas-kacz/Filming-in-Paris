<?php
    $db = new SQLite3('tournages.db');

    if (!$db) {
        echo $db->lastErrorMsg();
    } 
    else {
        if(isset($_POST['selectBox'])) {
            $zipcode = $_POST['selectBox'];

            $command = "SELECT * FROM movies WHERE 'Code Postal'= '75016'";

            $db-exec($command);
            $db->close();
        }
    }
?>