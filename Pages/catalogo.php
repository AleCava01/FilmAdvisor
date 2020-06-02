<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/allfilm.css">
        <link rel="icon" href="Images/icon.png">
        <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link href='https://vjs.zencdn.net/7.7.6/video-js.css' rel='stylesheet' />
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
        <link href='https://unpkg.com/video.js@7/dist/video-js.min.css'rel='stylesheet'/>
        <link rel="stylesheet" type="text/css" href="CSS/loader.css">


    </head>
    <div class="loader-wrapper">
        <div style="position:absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%,-50%);">
        <div class="lds-1"><div></div><div></div><div></div></div>
        </div>
    </div>
    <?php
        include "DBsettings.php";
        include "navbar_catalogo.php";

        //get suggested Film IDs for the user via py script (?)
        $IDs = array(1,5,9);
        $covers = array();
        $titles = array();
        $descriptions = array();
        for($i=0; $i<count($IDs); $i++){
            $covers_result = $conn -> query("SELECT * FROM film WHERE id_f =".$IDs[$i]);
            $cover_result = mysqli_fetch_assoc($covers_result);
            $covers[] = $cover_result["copertina"];
            $titles[] = $cover_result["titolo"];
            $descriptions[] = $cover_result["descrizione"];
        }
        ?>
    <body style="background-color:black;">

        <div id="moviesContainer" class="container-fluid scrollme" style="height: 95%;display: flex; flex-direction: column;">
                
                <div class="owl-carousel owl-theme" id="category-carousel">
                    <?php
                    $generi = $conn -> query("SELECT * FROM genere WHERE id_g IN (SELECT DISTINCT id_g FROM filmgenere)");
                    $genere = mysqli_fetch_assoc($generi);
                    echo("<div class='item' data-hash='allMovies'>");
                    echo("<a href='#allMovies'>");
                    echo("<div class='category-outer-div' data-position='0'>");
                    echo("<div class='category-div'>");
                    echo("<h5 class='category-title-h5'>Tutti i film</h5>");
                    echo("</div>");
                    echo("</div>");
                    echo("</a>");
                    echo("</div>");
                    $pos=1;
                    while($genere){
                        echo("<div class='item' data-hash='".$genere["nome"]."' id='".$genere["nome"]."'>");
                        echo("<a class='category-a' href='#".$genere["nome"]."'>");
                        echo("<div class='category-outer-div' data-position='".$pos."'>");
                        echo("<div class='category-div'>");
                        echo("<h5 class='category-title-h5'>".$genere["nome"]."</h5>");
                        echo("</div>");
                        echo("</div>");
                        echo("</a>");
                        echo("</div>");
                        $pos=$pos+1;
                        $genere = mysqli_fetch_assoc($generi);
                    }
                    ?>
                </div>
                <div>
                <hr class="selection-indicator-hr">
                <div id="selected-category"></div>
                </div>
                
                <div style="height:100%; maring-top:10px;">
                <?php
                $film_res = $conn -> query("SELECT * FROM film");
                $film = mysqli_fetch_assoc($film_res);
                while($film){
                    echo("<div class='div-".$film["id_f"]."-desc film-info-div' id='div-".$film["id_f"]."-desc' style='background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ), url(".$film["copertina"]."); background-repeat:no-repeat;background-position: center center; background-size:cover;'>");
                    echo("<div style='position: sticky;top: 0px;'>");
                    echo("<h1 class='film-info-title'>".$film["titolo"]."</h1>");
                    echo("<hr class='separator'>");
                    echo("</div>");

                    echo("<div class='row' style='height:85%'>");
                    echo("<div class='col-md-9 col-sm-12'>");
                    echo("<h4 class='film-info-semi-title-top'>Descrizione</h4>");
                    echo("<p class='film-info-desc-p'>".$film["descrizione"]."</p>"); 
                    echo("<h4 class='film-info-semi-title'>Regista</h4>");
                    $registi = $conn -> query("SELECT a.nome,a.cognome FROM artista as a, filmartista as fa WHERE a.id_ar=fa.id_ar AND fa.id_f=".$film["id_f"]." AND ruolo LIKE 'regista';");
                    $regista = mysqli_fetch_assoc($registi);
                    while($regista){
                        echo("<p class='film-info-desc-p' style='margin-top:0;margin-bottom:0;'>".$regista["nome"]." ".$regista["cognome"]."</p>");
                        $regista = mysqli_fetch_assoc($registi);
                    }
                    echo("<h4 class='film-info-semi-title'>Attori principali</h4>");
                    $attori = $conn -> query("SELECT a.nome,a.cognome FROM artista as a, filmartista as fa WHERE a.id_ar=fa.id_ar AND fa.id_f=".$film["id_f"]." AND ruolo LIKE 'attore';");
                    $attore = mysqli_fetch_assoc($attori);
                    while($attore){
                        echo("<p class='film-info-desc-p' style='margin-top:0;margin-bottom:0;'>".$attore["nome"]." ".$attore["cognome"]."</p>");
                        $attore = mysqli_fetch_assoc($attori);
                    }
                    echo("<h4 class='film-info-semi-title'>Durata</h4>");
                    echo("<p class='film-info-desc-p'>".(int)((int)$film["durata"]/60)." ore e ".((int)$film["durata"]%60)." minuti</p>");
                    echo("</div>");
                    echo("<div class='col-md-3 hidden-sm'>");
                    echo("<div class='locandina-info-wrapper'>");
                    echo("<img class='film-info-img align-middle' src='".$film["locandina"]."'>");
                    echo("</div>");
                    echo("</div>");
                    echo("</div>");
                    echo("</div>");
                    
                    $film = mysqli_fetch_assoc($film_res);
                }
                ?>
                </div>

                <!-- <hr class="separator"> -->
               
            </div>
                
        </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
            <script src="jquery-mousewheel/jquery.mousewheel.min.js"></script>
            <script src='https://vjs.zencdn.net/7.7.6/video.js'></script>
            <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
            <script src="Scripts/owl-carousels.js"></script>        
            <script src="Scripts/category-toggler.js"></script>

            <script>
            $(window).on("load", function(){
            $(".loader-wrapper").fadeOut("slow");
            })
            doAll();
            
            window.addEventListener('hashchange', function() {
                document.getElementById("selected-category").innerHTML="<img src='Images/loading.gif' width='70' height='70' style='margin-top:30px'>";
                $('.film-info-div').css('display', 'none');

                var hash = window.location.hash.substring(1);
                if(hash != "1" && hash != "2" && hash != "top" && hash != "suggested"){
                    setTimeout(function(){
                        doAll();
                    }, 400);

                }
            }, false);
            
            if (!sessionStorage.getItem("is_reloaded")){
                if(window.location.hash.substring(1) != "allMovies"){
                    window.location.hash = "";
                }
            }

            


         
            </script>
            
    </body>
</html>