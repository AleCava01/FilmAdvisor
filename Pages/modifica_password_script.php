<?php
include "DBsettings.php";
$old_password = $_POST["old_password"];
$new_password = $_POST["new_password"];
session_start();
$id_u = $_SESSION["id_u"];

if(password_verify($old_password, mysqli_fetch_array($conn->query("SELECT password FROM utente WHERE id_u LIKE '".$id_u."';"))["password"])){
    $password = password_hash($new_password, PASSWORD_DEFAULT);

    $conn->query("UPDATE utente SET password='".$password."' WHERE id_u LIKE '".$id_u."';");
    echo("success");
}
else{
    echo("not_match");
}
$conn->close();
?>
