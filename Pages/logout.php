<?php
session_start();
unset($_SESSION['id_u']);
session_destroy();
header("Location: login.html");
exit();
?>