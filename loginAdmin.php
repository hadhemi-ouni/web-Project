<?php
ob_start();
session_start();
error_reporting(0);
include('config/functions.php');
if(isset($_SESSION["admin_name"])){
    header("location: docteurs.php");
}


?><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin </title>
    <link href="alert_msg.css" rel="stylesheet">
     	
    <link href="design.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">


</head>
    <body>
	
        <div id="div-1">
            <form id="admin" method=post action="loginAdmin.php">
                <h2 style="font-size:30px; text-align:center;"> Admins </h2><br>

                <input type="text" placeholder="Enter Name" name="username" id="userName"><br>
                <input type="password" placeholder="Enter Password" name="mdp"id="password"><br>
                <input type="submit" value="Submit" id="submit">

            <?php
                    $conn = connect();
                    $req= "SELECT * FROM projetphp.admin where username = '".$_POST["username"]."' and password = '".$_POST["mdp"]."';";
                    $result = $conn->query($req);
                    if ($result->num_rows == 1){
                        $row = $result->fetch_assoc();
                        $_SESSION["admin_name"] = $row["username"];
                        header("location: docteurs.php");
                    }
                    else $er =  "username or password not found";
                    if(isset($_POST["username"])){
                        echo '<div class="red message"><p>'.$er.' </p></div>';;
                         
                    }
            ?>      

            </form>
            
        </div>
       
</body>

</html>