<?php
session_start();
$pagamento = $_GET["pagamento"];
$tipo = $_GET["tipo"];
$id_u = $_SESSION["id_u"];
if($tipo<1 || $tipo >3){
    header("location: error.html");
    exit();
}
if($pagamento<1 || $pagamento >3){
    header("location: error.html");
    exit();
}

include "DBsettings.php";
$abbonamento_query_result = $conn -> query("SELECT * FROM abbonamento WHERE scadenza".">="."'".date("Y-m-d")."' and id_u=".$id_u.";");
$abbonamento = mysqli_fetch_assoc($abbonamento_query_result);

if($abbonamento["scadenza"]!=""){
    //ancora valido
    $new_scadenza = calcolaScadenza($tipo, $abbonamento["scadenza"]);
    $new_importo=$abbonamento["importo"]+calcolaImporto($tipo);
    $conn -> query("UPDATE abbonamento SET pagamento=".$pagamento.",importo=".$new_importo.",tipo=4,scadenza='".$new_scadenza."' WHERE scadenza".">="."'".date("Y-m-d")."' and id_u=".$id_u.";");
    header("location: success.html");
    exit();
}
else{
    //scaduto
    $inizio = date('Y-m-d');
    $scadenza = calcolaScadenza($tipo,$inizio);
    $conn -> query("INSERT INTO abbonamento(tipo,inzio,scadenza,importo,pagamento,id_u) VALUES (".$tipo.",'".$inizio."','".$scadenza."',".calcolaImporto($tipo).",".$pagamento.",".$id_u.");");
    header("location: success.html");
    exit();
}

function calcolaScadenza($tipo, $inzio) {
    if($tipo==1){
        return date('Y-m-d', strtotime("+1 months", strtotime($inzio)));
    }
    if($tipo==2){
        return date('Y-m-d', strtotime("+3 months", strtotime($inzio)));
    }
    if($tipo==3){
        return date('Y-m-d', strtotime("+1 years", strtotime($inzio)));
    }
}
function calcolaImporto($tipo){
    if($tipo==1){
        return 7.99;
    }
    if($tipo==2){
        return 19.99;
    }
    if($tipo==3){
        return 49.99;
    }
}
?>