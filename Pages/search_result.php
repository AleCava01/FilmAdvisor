

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/lista.css">
        <link rel="stylesheet" href="css/common.css">
        <link rel="icon" href="Images/icon.png">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


    </head>
    <body>
        <?php
        include "DBsettings.php";
        include "navbar_search.php";
        include "logcontrol.php";
        $search_title = $_POST["title"];
        $search_title = strtoupper(str_replace(" ","",$search_title));
        ?>
        <div class="container-fluid" style="margin:0">
            <br>
            <h3 class="h5-title">Risultati ricerca</h3>
            <?php

            if($search_title!=""){
                $movies = $conn -> query("SELECT DISTINCT f.id_f, f.locandina FROM film as f, artista as a, filmartista as fa WHERE (f.id_f=fa.id_f AND a.id_ar=fa.id_ar AND f.titolo LIKE '%".$search_title."%') OR (f.id_f=fa.id_f AND a.id_ar=fa.id_ar AND UPPER(REPLACE(CONCAT(a.Nome,' ',a.Cognome), ' ', '')) LIKE '%".$search_title."%')") or die("<h5 class='h5-title'>Non è stato trovato alcun film corrispondente ai parametri di ricerca</h5>");
               
                $film = mysqli_fetch_assoc($movies);
                if($film["id_f"]==""){
                    echo("<h5 class='h5-title'>Non è stato trovato alcun film corrispondente ai parametri di ricerca</h5>");
                }
                while($film){
                    echo("<div class='locandina_div'><a href='"."video_buffer.php?id_f=".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></a></div>");
                    $film = mysqli_fetch_assoc($movies);
                }
            }
            else{
                echo("<h5 class='h5-title'>Non è stato trovato alcun film corrispondente ai parametri di ricerca</h5>");
            }
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>