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
    <a href="homepage.php" style="color:white;" class="nav-link active"><i class="fas fa-arrow-left"></i></a>
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
    </div>
    
</body>
</html>