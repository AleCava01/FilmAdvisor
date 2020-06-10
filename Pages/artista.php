<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="CSS/artista.css">
    <link rel="icon" href="Images/icon.png">
    <title>FilmAdvisor</title>
</head>
<body style="background-color:black;">
<nav class="navbar navbar-expand-lg navbar-dark sticky-top w-100">
    <a href="#" onclick="history.back();return false;" style="color:white;" class="nav-link active"><i class="fas fa-arrow-left"></i></a>
</nav>
    <div class="container-fluid">
    <?php
    include "DBsettings.php";
    $id_ar = $_GET["id_ar"];
    $artista_res = $conn -> query("SELECT * FROM artista WHERE id_ar=".$id_ar);
    $artista = mysqli_fetch_assoc($artista_res);
    while($artista){
        echo("<div class='row'>");
        echo("<div class='col-md-4 col-sm-12'>");
        echo("<img class='artist-img' src='".$artista["immagine"]."'>");
        echo("</div>");
        echo("<div class='col-md-8 col-sm-12'>");
        echo("<h2>".$artista["nome"]." ".$artista["cognome"]."</h2>");
        echo("<h4>Ruolo: ".$artista["ruolo"]."</h4>");
        echo("<p>".$artista["biografia"]."</p>");
        echo("</div>");
        echo("</div>");
        $artista = mysqli_fetch_assoc($artista_res);
    }
    ?>
    <row>
        <?php
        $response="<div class='owl-carousel owl-theme' id='film-cat-carousel'>";
        $movies = $conn -> query("SELECT f.id_f, f.locandina FROM film as f, artista as a, filmartista as fa WHERE f.id_f = fa.id_f AND a.id_ar = fa.id_ar AND a.id_ar=".$id_ar);
        $film = mysqli_fetch_assoc($movies);
        while($film){
            $response=$response."<div class='item'><div class='locandina_div div-".$film["id_f"]."' id='div-".$film["id_f"]."'><img class='locandina_img' src='".$film["locandina"]."'></div></div>";
            $film = mysqli_fetch_assoc($movies);
        }
        $response=$response."</div>";
        echo($response);
        ?>
    </row>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
            <script src="jquery-mousewheel/jquery.mousewheel.min.js"></script>
            <script>var scroll = new SmoothScroll('a[href*="#"]');</script>
            <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
<script>
    var categoryOwl = $('#category-carousel');
var allMoviesOwl = $('#allMovies-carousel');
$('#category-carousel').children().each( function( index ) {
    $(this).attr( 'data-position', index ); // NB: .attr() instead of .data()
    });

  
categoryOwl.owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    center:true,
    dots: false,
    URLhashListener:true,

    responsive:{
        0:{
            nav:false,
            items:1
        },
        600:{
            items:5
        },
        1000:{
            items:7
        }
    }
})
$(document).on('click', '.owl-item>div', function() {
    $('#category-carousel').trigger('to.owl.carousel', $(this).data( 'position' ) ); 
});
allMoviesOwl.owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    responsive:{
        0:{
            nav:false,
            items:5
        },
        600:{
            items:5,
            stagePadding: 100
        },
        900:{
            stagePadding: 100,
            items:8
        },
        1300:{
            stagePadding: 100,
            items:9
        },
        2000:{
            stagePadding: 100,
            items:10
        }
    }
})

categoryOwl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        categoryOwl.trigger('next.owl');
    } else {
        categoryOwl.trigger('prev.owl');
    }
    e.preventDefault();
});

allMoviesOwl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        allMoviesOwl.trigger('next.owl');
    } else {
        allMoviesOwl.trigger('prev.owl');
    }
    e.preventDefault();
});



    </script>
</body>
</html>