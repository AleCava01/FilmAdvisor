<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/profile.css">

</head>
<body>
    <?php
        include "DBsettings.php";
        include "navbar_profile.php";
        session_start();
        $id_u = $_SESSION["id_u"];
    ?>
        <br>
        <?php
        $dati_utente = mysqli_fetch_assoc($conn -> query("SELECT * FROM utente WHERE id_u=".$id_u.";"));
        echo("<div class='title'><h5>Ciao ".$dati_utente["nome"].",<br> controlla o modifica i dati del tuo account</h5></div><brh6");
        echo("<div class='semi-title'><h5>Profilo</h5></div><brh6");

        echo("<div class='data'><h6>Username: ".$dati_utente["username"]."</h6>");
        echo("<h6>Email: ".$dati_utente["email"]."</h6>");
        echo("<h6>Indirizzo: ".$dati_utente["citta"]."(".$dati_utente["provincia"]."), via ".$dati_utente["via"]." ".$dati_utente["civico"]."</h6>");
        echo("<h6>Data Nascita: ".$dati_utente["datanascita"]."</h6>");

        echo("<div class='semi-title'><h5>Abbonamento</h5></div><brh6");

        echo("</div>");
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
        <script>
            var scroll = new SmoothScroll('a[href*="#"]');
        </script>
</body>
</html>