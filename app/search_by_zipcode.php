<link rel="stylesheet" href="style.css">

<header>
    <div class="logo">Filming In Paris</div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    </div>
    <nav class="nav-bar">
    <ul>
        <li>
            <a href="/index.html">Accueil</a>
        </li>
        <li>
            <a href="/search_home.html">Search</a>
        </li>
    </ul>
    </nav>
</header>

<form method="get">
    <input class="search" type="text" name="id" placeholder="Enter the Zipcode">
    <input class="search" type="submit" value="Submit">
</form>

<?php
    $db = new PDO('sqlite:tournages.db');

    try{
        $statement = "SELECT * FROM movies WHERE \"Code_Postal\"=:movieZipcode";

        $statement = $db->prepare($statement);

        $id = filter_input(INPUT_GET, "id");
        // var_dump($id);
        $statement->bindValue('movieZipcode', $id, PDO::PARAM_STR);

        //execute the query
        $statement->execute();

        $r=$statement->fetchAll();
        // var_dump($r);

        //check contents of array
        // if(!$id == ""){
        //     echo "Please make an input";
        //     exit();
        // }
        if(!$r){
            echo "No film found";
            exit();
        }
        
        }catch (PDOException $e) {
            print "We had an error: " . $e->getMessage()  . "<br/>";
            die();
        }

?>


    <table class="tab">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Réalisateur</th>
                <th>Producteur</th>
                <th>Adresse</th>
                <th>Code Postal</th>
            </tr>
        </thead>
        

        <tbody>
        <?php foreach($r as $row){?>
            <tr>
                <td><?php echo htmlspecialchars($row['Titre']); ?></td>
                <td><?php echo htmlspecialchars($row['Réalisateur']); ?></td>
                <td><?php echo htmlspecialchars($row['Producteur']); ?></td>
                <td><?php echo htmlspecialchars($row['Localisation de la scène']); ?></td>
                <td><?php echo htmlspecialchars($row['Code_Postal']); ?></td>
            <tr>
        <?php }?>
        </tbody>
    </table>


