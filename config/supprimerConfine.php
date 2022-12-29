<?php
$mysqli = new mysqli("tp-cloud-mysql.cmuhyjhukgdw.us-east-1.rds.amazonaws.com", "admin", "newpassword");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "delete from projetphp.confines where id_c = ?;";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$stmt->close();

?>