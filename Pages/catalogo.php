<html>
    <head>
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
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">

        <style>
            .not-reg-h2{

            }
            .not-reg-a{
                font-size:25px;
            }
            @media only screen and (max-width: 1280px) {
                .not-reg-h2{
                    font-size:20px;

                }
                .not-reg-a{
                    font-size:15px;
                } 
            }
            @media only screen and (max-width: 900px) and (orientation:portrait) { /*mobile*/
                .not-reg-h2{
                    font-size:20px;
                    width:90%;
                }
                .not-reg-a{
                    font-size:15px;
                    width:70%;
                } 
            }
        </style>
    </head>
    <div class="loader-wrapper">
        <div style="position:absolute;top: 50%;left:50%;transform: translate(-50%,-50%);">
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

    <div id="allMovies" class="container-fluid scrollme second-div">
                
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
                    echo("<h1 class='film-info-title'>".$film["titolo"]."");
                    echo("<br>");
                    echo("<button type='button' class='btn play' data-toggle='modal' data-target='#modal-".$film["id_f"]."'>Play</button>");
                    echo("</h1>");
                    echo("<hr class='separator'>");
                    echo("</div>");

                    echo("<div class='row'>");
                    echo("<div class='col-md-6 col-sm-12'>");
                    echo("<h4 class='film-info-semi-title-top'>Descrizione <button style='background-color:transparent; border:none; outline:none; color:white' onclick='toggle_info_".$film["id_f"]."();'><i id='desc-icon-".$film["id_f"]."' class='fas fa-angle-up'></i></button></h4>");
                    echo("<script>
                    
                    function toggle_info_".$film["id_f"]."() {
                        console.log('toggled');
                        var x = document.getElementById('desc-".$film["id_f"]."');
                        if (x.style.display === 'none') {
                        x.style.display = 'block';
                        document.getElementById('desc-icon-".$film["id_f"]."').className = 'fas fa-angle-up';
                        } else {
                        x.style.display = 'none';
                        document.getElementById('desc-icon-".$film["id_f"]."').className = 'fas fa-angle-down';

                    }
                    
                    }</script>");
                    echo("<p id='desc-".$film["id_f"]."' class='film-info-desc-p'>".$film["descrizione"]."</p>"); 
                    echo("
                    <script>
                        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
                            console.log('device-detected-toggled');
                            toggle_info_".$film["id_f"]."();
                        }
                    </script>
                    ");
                    echo("<h4 class='film-info-semi-title'>Durata</h4>");
                    echo("<p class='film-info-desc-p'>".(int)((int)$film["durata"]/60)." ore e ".((int)$film["durata"]%60)." minuti</p>");
                    echo("<h4 class='film-info-semi-title'>Valutazione media</h4>");
                    $rating=round((mysqli_fetch_assoc($conn -> query("SELECT AVG(valutazione) as av FROM feedback WHERE id_f=".$film["id_f"]))["av"]),1);
                    if($rating==0){
                        echo("<p class='film-info-desc-p'>Nessuno ha ancora valutato il film, <br> fallo tu per primo!</p>");
                    }
                    echo("<div class='valutazione-div'>");
                    if($rating==0.5){
                        echo("
                        <span class='fas fa-star-half checked'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==1){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==1.5){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star-half checked'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==2){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==2.5){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star-half checked'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==3){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==3.5){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star-half checked'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==4){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star'></span>"
                        );
                    }
                    if($rating==4){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star-half checked'></span>"
                        );
                    }
                    if($rating==5){
                        echo("
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>
                        <span class='fas fa-star checked'></span>"
                        );
                    }
                    echo("</div>");
                    echo("</div>");
                    echo("<div class='col-md-3 col-sm-12'>");
                    echo("<div class='regista-div'>");
                    echo("<h4 class='film-info-semi-title regista-title'>Regista</h4>");
                    $registi = $conn -> query("SELECT a.id_ar,a.nome,a.cognome FROM artista as a, filmartista as fa WHERE a.id_ar=fa.id_ar AND fa.id_f=".$film["id_f"]." AND ruolo LIKE 'regista';");
                    $regista = mysqli_fetch_assoc($registi);
                    while($regista){
                        echo("<a class='film-info-desc-p regista' style='margin-top:0;margin-bottom:0;color:white;' >".$regista["nome"]." ".$regista["cognome"]."</a><br>");
                        $regista = mysqli_fetch_assoc($registi);
                    }
                    echo("</div><div class='attori-div'>");
                    echo("<h4 class='film-info-semi-title attori-title'>Attori principali</h4>");
                    $attori = $conn -> query("SELECT a.id_ar,a.nome,a.cognome FROM artista as a, filmartista as fa WHERE a.id_ar=fa.id_ar AND fa.id_f=".$film["id_f"]." AND ruolo LIKE 'attore';");
                    $attore = mysqli_fetch_assoc($attori);
                    while($attore){
                        echo("<a class='film-info-desc-p attori' style='margin-top:0;margin-bottom:0;color:white;'>".$attore["nome"]." ".$attore["cognome"]."</a><br>");
                        $attore = mysqli_fetch_assoc($attori);
                    }
                    echo("</div>");
                    echo("</div>");
                    echo("<div class='col-md-3 hidden-sm'>");
                    echo("<div class='locandina-info-wrapper'>");
                    echo("<img class='film-info-img align-middle' src='".$film["locandina"]."'>");
                    echo("</div>");
                    echo("</div>");
                    echo("</div>");
                    echo("</div>");
                    echo("<div id='modal-".$film["id_f"]."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-xl' id='trailer-modal-dialog'>
                      <div class='modal-content h-100 id='trailer-modal-content' style='background-color:rgba(0, 0, 0, 0.8); text-align:center'>
                        <h2 style='color:white;' class='not-reg-h2 centered'>Devi essere registrato per poter guardare il film <br> <a class='btn not-reg-a' href='register.html' style='width:auto;'>Clicca qui per registrarti</a></h2>
                      </div>
                    </div>
                  </div>");
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
                document.getElementById("selected-category").innerHTML="<div style='text-align:center;'><div class='lds-1'><div></div><div></div><div></div></div></div>";
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