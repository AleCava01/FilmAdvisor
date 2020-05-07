<?php
include "DBsettings.php";
$email_new = $_POST["email_new"];
$password = $_POST["password"];
session_start();
$id_u = $_SESSION["id_u"];

if(password_verify($password, mysqli_fetch_array($conn->query("SELECT password FROM utente WHERE id_u LIKE '".$id_u."';"))["password"])){
    $conn->query("UPDATE utente SET email='".$email_new."' WHERE id_u LIKE '".$id_u."';");
    echo("success");
}
else{
    echo("not_match");
}
$conn->close();
?>
