<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="CSS/profile.css">
    <link rel="icon" href="Images/icon.png">

</head>
<body>    
    <?php
        include "DBsettings.php";
        include "navbar_profile.php";
        include "logcontrol.php";
        $id_u = $_SESSION["id_u"];
    ?>
        <br>
        <div class="container-fluid container-modified">
            <?php
            $dati_utente = mysqli_fetch_assoc($conn -> query("SELECT * FROM utente WHERE id_u=".$id_u.";"));
            echo("<div class='title'><h4>Ciao ".$dati_utente["nome"].",<br> controlla o modifica i dati del tuo account</h4></div>");
            echo("<br>");
            echo("<div class='semi-title'><h6 class='semi-title-h6'>Profilo</h6></div>");
            echo("<hr>");
            echo("<table class='user-data-table'>");
            echo("<tr><td class='title-td'>Username:</td><td class='data-td'>".$dati_utente["username"]."</td></tr>");
            echo("<tr><td class='title-td'>Email:</td><td class='data-td'>".$dati_utente["email"]."</td><td class='link-td'><a data-toggle='modal' data-target='#modifica_email' href='#'>Modifica email</a></td></tr>");
            echo("<tr><td class='title-td'>Password:</td><td class='data-td'>**********</td><td class='link-td'><a data-toggle='modal' data-target='#modifica_password' href='#'>Modifica password</a></td></tr>");
            echo("<tr><td class='title-td'>Indirizzo:</td><td class='data-td'>".$dati_utente["via"]." ".$dati_utente["civico"].", ".$dati_utente["citta"]." (".$dati_utente["provincia"]."), CAP: ".$dati_utente["cap"]."</td><td class='link-td'><a data-toggle='modal' data-target='#modifica_indirizzo' href='#'>Modifica indirizzo</a></td></tr>");
            echo("</table>");
            echo("<br>");
            //abbonamento
            echo("<div class='semi-title'><h6 class='semi-title-h6'>Abbonamento</h6></div>");
            echo("<hr>");
            $abbonamento_query_result = $conn -> query("SELECT * FROM abbonamento WHERE scadenza".">="."'".date("Y-m-d")."' and id_u=".$id_u.";");
            $abbonamento = mysqli_fetch_assoc($abbonamento_query_result);

            $scadenza_date = strtotime($abbonamento["scadenza"]);
        
            if($abbonamento["scadenza"]!=""){
                echo("<table class='user-data-table'>");
                echo("<tr><td class='abbonamento-title-td'>L'abbonamento scade il giorno </td><td class='data-td'>".date('d', $scadenza_date)." ".num_to_month(date('m', $scadenza_date))." ".date('Y', $scadenza_date)."</td><td class='link-td'><a href='acquista_abbonamento.php'>Prolunga abbonamento</a></td></tr>");
                echo("</table>");
            }
            else{
                echo("<table class='user-data-table'>");
                echo("<tr><td class='abbonamento-title-td'>Il tuo abbonamento è scaduto</td><td class='link-td'><a href='acquista_abbonamento.php'>Rinnova abbonamento</a></td></tr>");
                echo("</table>");
            }
            
            function num_to_month($mese){
                if($mese == 1){
                    return "Gennaio";
                }
                if($mese == 2){
                    return "Febbraio";
                }
                if($mese == 3){
                    return "Marzo";
                }
                if($mese == 4){
                    return "Aprile";
                }
                if($mese == 5){
                    return "Maggio";
                }
                if($mese == 6){
                    return "Giugno";
                }
                if($mese == 7){
                    return "Luglio";
                }
                if($mese == 8){
                    return "Agosto";
                }
                if($mese == 9){
                    return "Settembre";
                }
                if($mese == 10){
                    return "Ottobre";
                }
                if($mese == 11){
                    return "Novembre";
                }
                if($mese == 12){
                    return "Dicembre";
                }
            }
            
            ?>
        </div>

        <?php
        include "modifica_email.php";
        include "modifica_password.php";
        include "modifica_indirizzo.php";


        ?>
        <script src="Scripts/password_toggler.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>     
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="smooth-scroll-master/dist/smooth-scroll.polyfills.min.js"></script>
        <script>
            var scroll = new SmoothScroll('a[href*="#"]');
        </script>
</body>
</html>