<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/allfilm.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


    </head>
    <body>
        <?php
        include "DBsettings.php";
        include "navbar2.php";
        ?>
        <div class="container">
            <?php
            $movies = $conn -> query("SELECT * FROM film");
            $film = mysqli_fetch_assoc($movies);
            while($film){
                echo("<div class='copertina_div'><a href='"."film.php?id=x"."'><img class='copertina_img' src='".$film["copertina"]."'></a></div>");
                $film = mysqli_fetch_assoc($movies);
            }
            ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>