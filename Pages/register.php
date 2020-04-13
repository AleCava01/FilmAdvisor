<?php
include "DBsettings.php";

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$via = $_POST["via"];
$civico = $_POST["civico"];
$CAP = $_POST["CAP"];
$citta = $_POST["citta"];
$provincia = $_POST["provincia"];
$datanascita = $_POST["datanascita"];
$sesso = $_POST["sesso"];
$immagine = "Images/profile/default.png";

//crittografia della password
$password = password_hash($password, PASSWORD_DEFAULT);
//verifica esistenza profilo
if(strtoupper(mysqli_fetch_array(mysqli_query($conn,"SELECT username FROM utente WHERE username like '".$username."';"))[0])==strtoupper($username)){
    echo("utente già registrato");
    exit();
}
if(strtoupper(mysqli_fetch_array(mysqli_query($conn,"SELECT email FROM utente WHERE email like '".$email."';"))[0])==strtoupper($email)){
    echo("utente già registrato");
    exit();
}
//inserimento nel database
$sql = "INSERT INTO utente(username,password,email,nome,cognome,datanascita,sesso,via,civico,citta,provincia,cap,immagine) VALUES ('".$username."','".$password."','".$email."','".$nome."','".$cognome."','".$datanascita."','".$sesso."','".$via."',".$civico.",'".$citta."','".$provincia."',".$CAP.",'".$immagine."')";
$result = mysqli_query($conn, $sql);
if($result != "1"){
    echo("Si è verificato un errore durante l'inserimento, si prega di contattare l'assistenza");
}
else{
    echo("success");
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['id_u'] = mysqli_fetch_array($conn->query("SELECT id_u FROM utente WHERE username LIKE '".$username."';"))["id_u"];

}
?>