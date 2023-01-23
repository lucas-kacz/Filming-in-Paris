

<?php  

    //define PDO - tell about the databse file
    $pdo = new PDO('sqlite:tournages.db');

    //write SQL
    $statement = $pdo->query("SELECT \"Coordonnée en X\",\"Coordonnée en Y\" FROM movies");

    //run the SQL
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    //show it on the screen
    echo "<pre>";
    print_r($rows);
    echo "</pre>";
?>

