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


    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="70">
    <div id="suggested" class="container-fluid"></div>

    <?php
        include "DBsettings.php";
        include "logcontrol.php";
        include "navbar_homepage.php";

        //get suggested Film IDs for the user via py script (?)
        $IDs = array(1,5,7);
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
        <div id="null" class="container-fluid" style="margin:0; width:100%;height: calc(100% - 55px);">

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>

            
            <div class="carousel-inner mh-100">
                <div class="carousel-item active">
                        <?php
                        echo("<a href='video_buffer.php?id_f=".$IDs[0]."'>");
                        echo("<img src='".$covers[0]."' class='d-block w-100 img-custom' alt='...'>");
                        ?>

                        <div class="carousel-caption w-100" style="left:0; bottom:0">
                            <?php
                            echo("<h5>".$titles[0]."</h5>");
                            echo("<p>".$descriptions[0]."</p>");
                            ?> 
                        </div>
                        </a>
                    </div>
            
                <?php
                for($i=1; $i<count($IDs); $i++){
                    echo("<div class='carousel-item'>");
                    echo("<a href='video_buffer.php?id_f=".$IDs[$i]."'>");
                    echo("<img src=".$covers[$i]." class='d-block w-100 img-custom' alt='...'>");
                    echo("<div class='carousel-caption w-100' style='left:0; bottom:0'>");
                    echo("<h5>".$titles[$i]."</h5>");
                    echo("<p>".$descriptions[$i]."</p></div></a></div>");
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        </div>
        <div id="allMovies" class="container-fluid" style="min-height: 55px;"></div>

        <div id="moviesContainer" class="container-fluid" style="height: 95%;display: flex; flex-direction: column;">
                
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
                
                <div style="height:100%;">
                <?php
                $film_res = $conn -> query("SELECT * FROM film");
                $film = mysqli_fetch_assoc($film_res);
                while($film){
                    echo("<div class='div-".$film["id_f"]."-desc film-info-div' id='div-".$film["id_f"]."-desc' style='background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ), url(".$film["copertina"]."); background-repeat:no-repeat;background-position: center center; background-size:cover;'>");
                    echo("<div>");
                    echo("<h1 class='film-info-title'>".$film["titolo"]."</h1>");
                    echo("<hr class='separator'>");
                    echo("</div>");

                    echo("<div class='row' style='height:85%'>");
                    echo("<div class='col-5'>");
                    echo("<h4 class='film-info-semi-title-top'>Descrizione</h4>");
                    echo("<p class='film-info-desc-p'>".$film["descrizione"]."</p>");
                    echo("<h4 class='film-info-semi-title'>Regista</h4>");
                    echo("<p class='film-info-reg-p'>".$film["regista"]."</p>");
                    echo("<h4 class='film-info-semi-title'>Durata</h4>");
                    echo("<p class='film-info-reg-p'>".(int)((int)$film["durata"]/60)." ore e ".((int)$film["durata"]%60)." minuti</p>");
                    echo("<a href='video_buffer.php?id_f=".$film["id_f"]."' class='btn btn-secondary' style='width:10%; background-color:white; color:black'>Play</a>");
                    echo("</div>");
                    echo("<div class='col-4'>");
                    echo("<h4 class='film-info-semi-title-top'>Trailer</h4>");

                    echo("<video
                    id='my-video'
                    class='video-js vjs-theme-city'
                    controls
                    preload='auto'
                    width='700'
                    height='393'
                    poster='Images/trailer.png'
                    data-setup='{}'
                  >
                    <source src='".$film["trailer_URI"]."' type='video/mp4' />
                    <source src='".$film["trailer_URI"]."' type='video/webm' />
                    <p class='vjs-no-js'>
                      To view this video please enable JavaScript, and consider upgrading to a
                      web browser that
                      <a href='https://videojs.com/html5-video-support/' target='_blank'
                        >supports HTML5 video</a
                      >
                    </p>
                  </video>");
                    echo("</div>");
                    echo("<div class='col-3'>");
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
            <script>var scroll = new SmoothScroll('a[href*="#"]');</script>
            <script src='https://vjs.zencdn.net/7.7.6/video.js'></script>
            <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
            <script src="Scripts/owl-carousels.js"></script>        
            <script src="Scripts/category-toggler.js"></script>
            <script>
            doAll();
            window.addEventListener('hashchange', function() {
                doAll();
            }, false);
            
            if (!sessionStorage.getItem("is_reloaded")) window.location.hash = "";;

            </script>
            
    </body>
</html>