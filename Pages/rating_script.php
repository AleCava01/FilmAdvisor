<?php
session_start();
include "DBsettings.php";


$id_u = $_SESSION["id_u"];
$rate = $_POST["rate"];
$id_f = $_POST["film"];

$valutazioni_film_utente = $conn -> query("SELECT * FROM feedback WHERE id_u=".$id_u." AND id_f=".$id_f.";");
$old_val = mysqli_fetch_assoc($valutazioni_film_utente);
if($old_val["valutazione"]!=""){
    $conn -> query("UPDATE feedback SET valutazione=".$rate." WHERE id_u=".$id_u." AND id_f=".$id_f.";");
    exit();
}
else{
    $conn -> query("INSERT INTO feedback(id_u, id_f, valutazione) VALUES(".$id_u.",".$id_f.",".$rate.");");

}

?>