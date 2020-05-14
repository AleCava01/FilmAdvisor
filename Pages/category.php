    <?php
    include "DBsettings.php";
    $response="<div class='owl-carousel owl-theme' id='film-cat-carousel'>";
    $movies = $conn -> query("SELECT * FROM film as f, filmgenere as fg, genere as g WHERE f.id_f=fg.id_f AND fg.id_g = g.id_g AND g.nome LIKE '".$_POST["genere"]."'");
    $film = mysqli_fetch_assoc($movies);
    while($film){
        $response=$response."<div class='item'><div class='locandina_div'><a href='"."video_buffer.php?id_f=".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></a></div></div>";
        $film = mysqli_fetch_assoc($movies);
    }
    $response=$response."</div>";
    echo($response);
    exit();
    ?>
