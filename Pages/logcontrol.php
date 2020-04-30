<?php
session_start();
if(!isset($_SESSION["id_u"])){
    header("Location: login.html");
    exit();
}

?>