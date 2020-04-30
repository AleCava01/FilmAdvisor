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
    include "logcontrol.php";

    $search_title = $_POST["title"];
    ?>
    <div class="container-fluid">

        <?php
        $movies = $conn -> query("SELECT * FROM film WHERE titolo LIKE '%".$search_title."%'");
        $film = mysqli_fetch_assoc($movies);
        while($film){
            echo("<div class='locandina_div'><a href='"."video_buffer.php?id_f=".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></a></div>");
            $film = mysqli_fetch_assoc($movies);
        }
        ?>
    <div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>