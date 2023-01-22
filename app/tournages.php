<?php
    
    $pdo = new PDO('sqlite:tournages.db');
    $statement = $pdo->query("SELECT * FROM movies");
    $tournages = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($movies);
    echo "<ul>";

    foreach($tournages as $row => $tournage){
        echo  "<li>"  .   $tournage['Titre']   .   "</li>"   ;
    }

    echo "</ul>";

?>