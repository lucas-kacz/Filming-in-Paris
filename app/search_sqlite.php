<?php
    $id ="";
    $name = $_POST['Titre'];
    $realisateur = $_POST['Réalisateur'];

    if(isset($_POST['Find']))
    {
        $db = new PDO('sqlite:tournages.db'); 
        
        $id = $_POST['Identifiant du lieu'];

        $pdoQuery = "SELECT * FROM movies WHERE id = :id";

        
    }
?>

<html>
    <head>
        <title>Cherche un Film</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
    </head>

    <body>
        <form action="search_sqlite.php" method="post">
            Id To Search : <input type="text" name="id" value="<?php echo $id;?>"><br><br>
            Film : <input type="text" name="Titre" value="<?php echo $name;?>"><br><br>
            Réalisateur : <input type="text" name="Réalisateur" value="<?php echo $realisateur;?>"><br><br>
            <input type="submit" name="Find" value="Find Data">
        </form>
    </body>
        
</html>