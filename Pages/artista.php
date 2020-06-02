<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmAdvisor</title>
</head>
<body>
    <?php
    include "DBsettings.php";
    $id_ar = $_GET["id_ar"];
    $artista_res = $conn -> query("SELECT * FROM artista WHERE id_ar=".$id_ar);
    $artista = mysqli_fetch_assoc($artista_res);
    while($artista){
        echo("<img src='".$artista["immagine"]."'>");
        echo("<h2>".$artista["nome"]."</h2>");
        echo("<h2>".$artista["cognome"]."</h2>");
        echo("<h2>".$artista["ruolo"]."</h2>");
        echo("<p>".$artista["biografia"]."</p>");

        $artista = mysqli_fetch_assoc($artista_res);
    }
    ?>
</body>
</html>