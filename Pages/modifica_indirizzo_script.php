<?php
include "DBsettings.php";
$password = $_POST["addr_password"];
$via = $_POST["via"];
$civico = $_POST["civico"];
$citta = $_POST["citta"];
$provincia = $_POST["provincia"];
$cap = $_POST["cap"];

session_start();
$id_u = $_SESSION["id_u"];

if(password_verify($password, mysqli_fetch_array($conn->query("SELECT password FROM utente WHERE id_u LIKE '".$id_u."';"))["password"])){
    $conn->query("UPDATE utente SET via='".$via."',civico='".$civico."', citta='".$citta."',provincia='".$provincia."',cap=".$cap." WHERE id_u LIKE '".$id_u."';");
    echo("success");
}
else{
    echo("not_match");
}
$conn->close();
?>
