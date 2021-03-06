<html>
    
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/allfilm.css">
        <link rel="icon" href="Images/icon.png">
        <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link href='https://vjs.zencdn.net/7.7.6/video-js.css' rel='stylesheet'/>
        <script src='https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js'></script>
        <link href='https://unpkg.com/video.js@7/dist/video-js.min.css'rel='stylesheet'/>
        <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
        <link rel="stylesheet" type="text/css" href="CSS/loader.css">


    </head>
   
    <?php
        include "DBsettings.php";
        include "navbar_homepage.php";
        
        //get suggested Film IDs for the user via py script (?)
        $IDs = array(10,5,9);
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
    <div class="loader-wrapper">
        <div style="position:absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%,-50%);">
        <div class="lds-1"><div></div><div></div><div></div></div>
        </div>
    </div>
    <body data-spy="scroll" data-target=".navbar" data-offset="70" style="background-color:black;">
    
        <div id="suggested" class="container-fluid scrollme" style="margin:0; width:100%;height: 100%;">
            <div style="height: calc(100% - 55px);">
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
        </div>

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
                function num_to_month($mese){if($mese == 1){return "Gennaio";}if($mese == 2){return "Febbraio";}if($mese == 3){return "Marzo";}if($mese == 4){return "Aprile";}if($mese == 5){return "Maggio";}if($mese == 6){return "Giugno";}if($mese == 7){return "Luglio";}if($mese == 8){return "Agosto";}if($mese == 9){return "Settembre";}if($mese == 10){return "Ottobre";}if($mese == 11){return "Novembre";}if($mese == 12){return "Dicembre";}
                }
                $film_res = $conn -> query("SELECT * FROM film");
                $film = mysqli_fetch_assoc($film_res);
                while($film){
                    echo("<div class='div-".$film["id_f"]."-desc film-info-div' id='div-".$film["id_f"]."-desc' style='background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8) ), url(".$film["copertina"]."); background-repeat:no-repeat;background-position: center center; background-size:cover;'>");
                    echo("<div style='position: sticky;top: 0px;'>");
                    echo("<h1 class='film-info-title'>".$film["titolo"]."");
                    echo("<br>");
                    echo("<a href='coming_soon.html' class='btn' style='margin-right:10px; font-weight: 400; width:80px;'>Critica</a>");
                    echo("<a href='video_buffer.php?id_f=".$film["id_f"]."' class='btn play'>Play</a>");
                    echo("<button onclick='load_trailer(".$film["id_f"].")' type='button' class='btn' style='margin-right:10px; font-weight: 400; width:80px;' data-toggle='modal' data-target='#modal-".$film["id_f"]."'>Trailer</button>");
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
                    </script>");
                    echo("<div class='durata-uscita-div'>");
                    echo("<div class='durata-div'>");
                    echo("<h4 class='film-info-semi-title'>Durata</h4>");
                    echo("<p class='film-info-desc-p'>".(int)((int)$film["durata"]/60)." ore e ".((int)$film["durata"]%60)." minuti</p>");
                    echo("</div>");
                    echo("<div class='uscita-div'>");
                    echo("<h4 class='film-info-semi-title'>Data di uscita</h4>");
                    $data_uscita = strtotime($film["dataUscita"]);
                    echo("<p class='film-info-desc-p' style='margin-left:5px;'>".date('d', $data_uscita)." ".num_to_month(date('m', $data_uscita))." ".date('Y', $data_uscita)."</p>");
                    echo("</div>");
                    echo("</div>");
                    echo("<div class='all-valutazione-div'>");
                    echo("<h4 class='film-info-semi-title valutazione-h4'>Valutazione media</h4>");
                    $rating=round((mysqli_fetch_assoc($conn -> query("SELECT AVG(valutazione) as av FROM feedback WHERE id_f=".$film["id_f"]))["av"]),1);
                    if($rating==0){
                        echo("<p class='film-info-desc-p'>Nessuno ha ancora valutato il film, <br> fallo tu per primo!</p>");
                    }
                    echo("<div class='valutazione-div'>");
                    if($rating==0.5){echo("<span class='fas fa-star-half checked'></span><span class='fas fa-star'></span><span class='fas fa-star'></span><span class='fas fa-star'></span><span class='fas fa-star'></span>");}
                    elseif($rating==1){echo("<span class='fas fa-star checked'></span><span class='fas fa-star'></span><span class='fas fa-star'></span><span class='fas fa-star'></span><span class='fas fa-star'></span>");}
                    elseif($rating==1.5){echo("<span class='fas fa-star checked'></span><span class='fas fa-star-half checked'></span><span class='fas fa-star'></span><span class='fas fa-star'></span><span class='fas fa-star'></span>");}
                    elseif($rating==2){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star'></span><span class='fas fa-star'></span><span class='fas fa-star'></span>");}
                    elseif($rating==2.5){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star-half checked'></span><span class='fas fa-star'></span><span class='fas fa-star'></span>");}
                    elseif($rating==3){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star'></span><span class='fas fa-star'></span>");}
                    elseif($rating==3.5){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star-half checked'></span><span class='fas fa-star'></span>");}
                    elseif($rating==4){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star'></span>");}
                    elseif($rating==4.5){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star-half checked'></span>");}
                    elseif($rating==5){echo("<span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span><span class='fas fa-star checked'></span>");}
                    echo("</div>");
                    echo("</div>");
                    echo("</div>");
                    echo("<div class='col-md-3 col-sm-12'>");
                    echo("<div class='regista-div'>");
                    echo("<h4 class='film-info-semi-title regista-title'>Regista</h4>");
                    $registi = $conn -> query("SELECT a.id_ar,a.nome,a.cognome FROM artista as a, filmartista as fa WHERE a.id_ar=fa.id_ar AND fa.id_f=".$film["id_f"]." AND ruolo LIKE 'regista';");
                    $regista = mysqli_fetch_assoc($registi);
                    while($regista){
                        echo("<a class='regista' style='margin-top:0;margin-bottom:0;' href='artista.php?id_ar=".$regista["id_ar"]."'>".$regista["nome"]." ".$regista["cognome"]."</a><br>");
                        $regista = mysqli_fetch_assoc($registi);
                    }
                    echo("</div><div class='attori-div'>");
                    echo("<h4 class='film-info-semi-title attori-title'>Attori principali</h4>");
                    $attori = $conn -> query("SELECT a.id_ar,a.nome,a.cognome FROM artista as a, filmartista as fa WHERE a.id_ar=fa.id_ar AND fa.id_f=".$film["id_f"]." AND ruolo LIKE 'attore';");
                    $attore = mysqli_fetch_assoc($attori);
                    while($attore){
                        echo("<a class=' attori' style='margin-top:0;margin-bottom:0;' href='artista.php?id_ar=".$attore["id_ar"]."'>".$attore["nome"]." ".$attore["cognome"]."</a><br>");
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
                      <div class='modal-content' id='trailer-modal-content' style='background-color:black; text-align:center'>
                        <div id='selectedtrailer-".$film["id_f"]."' style='text-align:center; width:100%;'></div>
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
            <script src="Scrollify/jquery.scrollify.js" type="text/javascript"></script>
            <script>
            $(function() {
                $.scrollify({
                section : ".scrollme",
                scrollbars: true,
                standardScrollElements: ".owl-carousel",
                offset:-45,
                setHeights: true,
                overflowScroll: true,
                updateHash: false,
                touchScroll: true,
                });
            });
            </script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
            <script src="jquery-mousewheel/jquery.mousewheel.min.js"></script>
            <script>var scroll = new SmoothScroll('a[href*="#"]');</script>
            <script src='https://vjs.zencdn.net/7.7.6/video.js'></script>
            <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
            <script src="Scripts/owl-carousels.js"></script>        
            <script src="Scripts/category-toggler.js"></script>
            <script>
            $('.nav-link').on('click', function(){
                $('.navbar-collapse').collapse('hide');
            });
            </script>
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

            

            function handleTrailerData(data,mex){
                console.log(data);
                console.log("worked");
                document.getElementById("selectedtrailer-"+mex).innerHTML = data;
                var vw = Math.max(window.innerWidth)/1.347;
                var vh = Math.max(window.innerHeight)/2;
                if(vw>1140){
                    vw=1140;
                }
                console.log(vw);
                console.log(vh);
                document.getElementById("my-video").setAttribute("width",vw);
                document.getElementById("my-video").setAttribute("height",""+vh);
                document.getElementById("my-video").style.width = vw;
                document.getElementById("my-video").style.height = vh;
                document.getElementById("selectedtrailer-"+mex).style.width = vw;
                document.getElementById("selectedtrailer-"+mex).style.height = vh;

                $('.modal').on('hidden.bs.modal', function () {                
                    document.getElementById("selectedtrailer-"+mex).innerHTML = "";
                });

                
            }
            function sendAjaxTrailer(mex, handleTrailerData) {  
                console.log("sent");
                $.ajax({
                    url: 'trailer.php',
                    type: 'POST',
                    data: {
                        id_f: mex,
                    },  
                    success:function(data1) {
                        handleTrailerData(data1,mex); 
                    }
                });
            }

            function load_trailer(id){                
                sendAjaxTrailer(id,handleTrailerData);
            }
            
            </script>
            
    </body>
</html>