<?php
$mysqli = new mysqli("tp-cloud-mysql.cmuhyjhukgdw.us-east-1.rds.amazonaws.com", "admin", "newpassword");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "update projetphp.doctor set accepted = ? where ID_med = ?;";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss",$_GET['accept'], $_GET['id']);
$stmt->execute();
$stmt->close();

?>