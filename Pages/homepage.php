<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/allfilm.css">
        <link rel="stylesheet" href="CSS/x-scrolling.css">
        <link rel="icon" href="Images/icon.png">



    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="70">
    <div id="suggested" class="container-fluid"></div>

    <?php
        include "DBsettings.php";
        include "logcontrol.php";
        include "navbar_homepage.php";

        //get suggested Film IDs for the user via py script (?)
        $IDs = array(1,2,5);
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

        <div class="container-fluid" style="min-height: 100%;">
                <br>
                <h5 class="semi-title-h5" style="text-align:center;">Tutti i film</h5>
                <?php
                $movies = $conn -> query("SELECT * FROM film");
                $film = mysqli_fetch_assoc($movies);
                while($film){
                    echo("<div class='locandina_div'><a href='"."video_buffer.php?id_f=".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></a></div>");
                    $film = mysqli_fetch_assoc($movies);
                }
                ?>
                <hr class="separator">
                <br>
                <div class="container-categories">
                <div class="hs__wrapper">
                    <div class="hs__header">
                        <h5 class="semi-title-h5 hs__headline">Categorie</h5>
                        <div class="hs__arrows"><a class="arrow disabled arrow-prev"></a><a class="arrow arrow-next"></a></div>
                    </div>
                    <ul class="hs">
                        <?php
                        $generi = $conn -> query("SELECT * FROM genere WHERE id_g IN (SELECT DISTINCT id_g FROM filmgenere)");
                        $genere = mysqli_fetch_assoc($generi);
                        while($genere){
                            echo("<li class='hs__item'>");
                            echo("<div class='hs__item__image__wrapper'>");
                            echo("<div class='category-div'>");
                            echo("<h5 class='category-title-h5'>".$genere["nome"]."</h5>");
                            echo("</div>");
                            echo("</div>");
                            echo("</li>");
                            $genere = mysqli_fetch_assoc($generi);
                        }
                        ?>
                    </ul>
                </div>
                </div>
                    
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
    <script>var scroll = new SmoothScroll('a[href*="#"]');</script>
    <script src="Scripts/scroll.js"></script>


    </body>
</html>