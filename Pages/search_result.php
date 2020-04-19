<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/search_result.css">

</head>
<body>
    <?php
    include "DBsettings.php";
    include "navbar2.php";
    $search_title = $_POST["title"];
    ?>
    <div class="container-fluid">

        <?php
        $movies = $conn -> query("SELECT * FROM film WHERE titolo LIKE '%".$search_title."%'");
        $film = mysqli_fetch_assoc($movies);
        while($film){
            echo("<div class='copertina_div'><a href='"."film.php?id=x"."'><img class='copertina_img' src='".$film["copertina"]."'></a></div>");
            $film = mysqli_fetch_assoc($movies);
        }
        ?>
    <div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>