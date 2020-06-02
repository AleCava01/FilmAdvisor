<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="icon" href="Images/icon.png">
<link rel="stylesheet" href="fontawesome/css/all.css">

<?php
include "DBsettings.php";
include "logcontrol.php";

$id_f = $_GET["id_f"];
echo("<script>var id_f = ".$id_f.";</script>");
$id_u = $_SESSION["id_u"];

$abbonamento_query_result = $conn -> query("SELECT * FROM abbonamento WHERE scadenza".">="."'".date("Y-m-d")."' and id_u=".$id_u.";");
$abbonamento = mysqli_fetch_assoc($abbonamento_query_result);

if($abbonamento["scadenza"]==""){    
    echo("<a class='nav-link navbar-brand' href='#' onclick='history.back();return false;' style='width:100%; text-align:left; color:white; text-decoration:none; margin-top:15px; margin-left:15px;'><i class='fas fa-arrow-left'></i></a>");
    echo("<body style='background-color:black; text-align:center; color:white;'>");
    echo("<br>");
    echo("<h1>:(</h1>");
    echo("<h2>Il tuo abbonamento è scaduto,</h2>");
    echo("<a href='acquista_abbonamento.php'><h4>Clicca qui per rinnovarlo</h4></a>");    
    echo("</body>");
}
else{
    include "video_buffer_ok.php";
}
