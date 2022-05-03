<?php
ob_start();
session_start();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['nouveau'])){
        header('Location: index.php');
    }
    else{
        extract($_GET);
        $nouveau = strip_tags($nouveau);
    }
$req = "update projetphp.".$_SESSION["type"]." set password = '".$nouveau."'
where  E_mail = '".$_SESSION["mail"]."';";
$conn->query($req);


?>