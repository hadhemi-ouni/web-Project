<?php
$mysqli = new mysqli("localhost", "root", "");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "delete from projetphp.forum_sujets where id = ? ;";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['id']);
$stmt->execute();
$stmt->close();
?>