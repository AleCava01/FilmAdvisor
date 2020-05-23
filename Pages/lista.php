<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/lista.css">
        <link rel="stylesheet" href="css/common.css">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="icon" href="Images/icon.png">


    </head>
    <body>
        <?php
        include "DBsettings.php";
        include "navbar_list.php";
        include "logcontrol.php";

        $id_u = $_SESSION["id_u"];
        ?>
        <div class="container-fluid" style="margin:0">
            <br>
            <h4 class="h5-title">La mia lista</h4>
            <div class="wrapper">
            <?php
            $movies = $conn -> query("SELECT * FROM film AS f, lista AS l WHERE f.id_f=l.id_f AND id_u=".$id_u.";");
            $film = mysqli_fetch_assoc($movies);
            while($film){
                echo("<div class='locandina_div'><a href='"."video_buffer.php?id_f=".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></a></div>");
                $film = mysqli_fetch_assoc($movies);
            }
            ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>