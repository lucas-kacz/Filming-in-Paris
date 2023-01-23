<?php
    
    $pdo = new PDO('sqlite:tournages.db');
    $statement = $pdo->query("SELECT * FROM movies");
    $tournages = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($movies);
    echo "<table border=1>";

    echo "<tr>";
        echo "<td>Title</td>";
        echo "<td>Réalisateur</td>";
    echo "</tr>";

    foreach($tournages as $row => $tournage){
        echo "<tr>";
            echo  "<td>"  .   $tournage['Titre']   .   "</td>"   ;
            echo  "<td>"  .   $tournage['Réalisateur']   .   "</td>"   ;
        echo "</tr>";
    }

    echo "</table>";

?>