<?php
$db_host = "35.238.68.198";
$db_user = "root";
$db_password = "HITICtioNtro1";
$db_name = "FilmAdvisor";
$conn = new mysqli($db_host, $db_user, $db_password);
if ($conn->connect_errno) {
  echo "Connection failed: ". $conn->connect_error . ".";
  exit();
}
$conn->query("USE ".$db_name.";");
?>
