<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/allfilm.css">


    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="70">
    <div id="suggested" class="container-fluid"></div>

    <?php
        include "DBsettings.php";
        include "logcontrol.php";
        include "navbar_homepage.php";

        //get suggested Film IDs for the user via py script (?)
        $IDs = array(8,9,7);
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

                        <div class="carousel-caption d-none d-md-block w-100" style="left:0; bottom:0">
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
                    echo("<div class='carousel-caption d-none d-md-block w-100' style='left:0; bottom:0'>");
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
        <div id="allMovies" class="container-fluid" style="height: calc(100% - 55px);">
                <br>
                <h5 style="text-align:center;">Tutti i film</h5>
                <?php
                $movies = $conn -> query("SELECT * FROM film");
                $film = mysqli_fetch_assoc($movies);
                while($film){
                    echo("<div class='locandina_div'><a href='"."video_buffer.php?id_f=".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></a></div>");
                    $film = mysqli_fetch_assoc($movies);
                }
                ?>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>

    </body>
</html>