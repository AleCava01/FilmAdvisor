    <?php
    include "DBsettings.php";
    $response="<div class='owl-carousel owl-theme' id='film-cat-carousel'>";
    $response2="!SCRIPT!";
    $genere=$_POST["genere"];
    if($genere=="allMovies"){
        $movies = $conn -> query("SELECT * FROM film");
    }
    else{
        $movies = $conn -> query("SELECT * FROM film as f, filmgenere as fg, genere as g WHERE f.id_f=fg.id_f AND fg.id_g = g.id_g AND g.nome LIKE '".$genere."'");
    }
    $film = mysqli_fetch_assoc($movies);
    while($film){
        $response=$response."<div class='item'><div class='locandina_div div-".$film["id_f"]."' id='div-".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></div></div>";
        $response2=$response2."
            $('div.div-".$film["id_f"]."').hover(function(){
                $('#div-".$film["id_f"]."-desc').css('display', 'block');
                $(this).css('transform','scale(1.1)');
            }, function(){
                $(this).css('transform','scale(1)');
                $('#div-".$film["id_f"]."-desc').css('display', 'none');
            });
            $('div.div-".$film["id_f"]."-desc').hover(function(){
                $('#div-".$film["id_f"]."-desc').css('display', 'block');
            }, function(){
                $('#div-".$film["id_f"]."-desc').css('display', 'none');
            });
            $('#category-carousel').hover(function(){
                $('.film-info-div').css('display', 'none');
            });
            ";
        $film = mysqli_fetch_assoc($movies);
    }
    $response=$response."</div>".$response2;
    echo($response);
    exit();
    ?>
    