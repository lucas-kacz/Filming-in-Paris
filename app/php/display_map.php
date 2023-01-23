<link rel="stylesheet" href="../style.css">

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
    <input class="search" type="text" name="id" placeholder="Film Id">
    <input class="search" type="submit" value="Submit">
</form>

<?php  

    //define PDO - tell about the databse file
    $db = new PDO('sqlite:../tournages.db');

    try{
    //write SQL
    $statement = "SELECT \"Coordonnée en X\",\"Coordonnée en Y\" FROM movies WHERE id=:movieId";

    $statement = $db->prepare($statement);

    $id = filter_input(INPUT_GET, "id");
    // var_dump($id);
    $statement->bindValue('movieId', $id, PDO::PARAM_STR);

    //execute the query
    $statement->execute();

    $r=$statement->fetchAll();


    if(!$r){
        echo "Wrong Id";
        exit();
    }

    else{
        $longitude=floatval($r[0][0]);
        $latitude=floatval($r[0][1]);
    
        var_dump($longitude, $latitude);
    }
    
    }catch (PDOException $e) {
        print "We had an error: " . $e->getMessage()  . "<br/>";
        die();
    }

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournages à Paris</title>


    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
    crossorigin=""></script>

    <script type="text/javascript">var longitude = "<?= $longitude ?>";</script>
    <script type="text/javascript">var latitude = "<?= $latitude ?>";</script>
    <script type="text/javascript" src="../scripts/geolocation.js"></script>

</head>

<body onload="init()">
    <div id="mapid"></div>
</body>
