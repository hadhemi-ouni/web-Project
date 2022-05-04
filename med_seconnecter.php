<?php 
ob_start();
session_start();
 if(isset($_SESSION["name"])){
   header('Location: index.php');
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>COVIDO</title>
	   	<!-- Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="fonts/flaticon/flaticon.css" rel="stylesheet">
	    <link href="css/font-awesome.min.css" rel="stylesheet">
	    
	    <link href="css/animate.css" rel="stylesheet">
	    <link href="owl.carousel/assets/owl.carousel.css" rel="stylesheet">
		
    	<link href="css/menu.css" rel="stylesheet">
    	<link href="css/template.css" rel="stylesheet">
	    <link href="css/style.css" rel="stylesheet">
	    <link href="css/responsive.css" rel="stylesheet">
	    <link href="alert_msg.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/c805bcc5d6.js" crossorigin="anonymous"></script>

	    
	</head>

	

	<body id="page-top">
	<script type="text/javascript">
	var alertcin = "";

	function validateForm() {
		let cin = document.forms["myForm"]["med_cin"].value;
		alertcin = "";
		let test = true;
		if ((cin.length != 8) || (cin[0] != '0' && cin[0] != '1')) {

			alertcin = "* ";
			test = false;
			if (cin.length != 8) alertcin += "le chapms cin doit contenir 8 chiffre exacatement  <br> ";
			if ((cin[0] != '0' && cin[0] != '1')) alertcin += "  le chapms cin doit commencer par 0 ou 1   <br> ";
		}



		document.getElementById("erreur_msg").innerHTML = alertcin;

		return test;
	}
	</script>
		<div id="st-container" class="st-container">
    		<div class="st-pusher">
    			<div class="st-content">
				<header class="header">
				  		<nav class="top-bar">
				  			<div class="overlay-bg">
					  			<div class="container">
					  				<div class="row">
					  					
					  					<div class="col-sm-6 col-xs-12">
						  					<div class="call-to-action">
						  						<ul class="list-inline">
						  							<li><i class="fa fa-phone"></i> 58 927 676 </li>
						  							<li><i class="fa fa-envelope"> </i>Hadhami.ouni@etudiant-fst.utm.tn </li>
						  						</ul>
						  					</div>
					  					</div>

					  					<div class="col-sm-6 hidden-xs">
						  					<div class="topbar-right">
							  					
						  						<ul class="social-links list-inline pull-right">
						  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						  							<li><a href="#"><i class="fa fa-tumblr"></i></a></li>
						  						</ul>
						  					</div>
					  					</div>
					  				</div><!-- /.row -->
					  			</div><!-- /.container -->
				  			</div><!-- /.overlay-bg -->
				  		</nav><!-- /.top-bar -->
						
						<nav class="navbar navbar-default" role="navigation">
							
							<div class="container mainnav">
								<div class="navbar-header">
									<h1 class="logo"><a class="navbar-brand" href="index.php"><img src="img/logo.png" width=190px height=40px alt=""></a></h1>
								</div>

							  <div class="collapse navbar-collapse navbar-collapse">

									<ul class="nav navbar-nav navbar-right">
									
                                        <li class="active"><a href="index.php">Acceuil </a>
                                            
                                        </li>
                                        <?php
                                        if(!isset($_SESSION["type"])):
                                        ?>
                                        	<li><a href="espacemedecins.php">Espace Médecin </a></li>
                                        <?php
                                        endif;
                                        if($_SESSION["type"] == "doctor"):
                                        ?>
                                         <li class="dropdown"><a href="#">Dr <?=$_SESSION["name"]?> <span class="fa fa-angle-down"></span></a>
                                            <div class="submenu-wrapper">
                                                <div class="submenu-inner">
                                                    <ul class="dropdown-menu">
                                                    	<li><a href="profile.php">Mon profile </a></li>
                                                        <li><a href="deconnecter.php">Se déconnecter</a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>

                                    
                                        <li class="dropdown"><a href="gestion_confines.php">Gestion des confinés <span class="fa fa-angle-down"></span></a>
                                            <div class="submenu-wrapper">
                                                <div class="submenu-inner">
                                                    <ul class="dropdown-menu">
                                                    	<li><a href="ajouter_confines.php">Ajouter un confiné </a></li>
                                                        <li><a href="consulter_confines.php">Consulter un confiné</a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <?php
                                        endif;
                                        ?>

                                        <li class="dropdown"><a href="guide.php">Guide Covid-19 <span class="fa"></span></a>

									</ul>
								</div><!-- /.navbar-collapse -->				
							</div><!-- /.container -->

							
						</nav>
					</header>
					<section class="page-title-section">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="page-header-wrap">
										<div class="page-header">
									   		<h1>Espace Médecins</h1>
                                        </div>
                                        <ol class="breadcrumb">
                                            <li><a href="index.php">Acceuil</a></h2></li>
                                              <li><a href="espacemedecins.php">Espace Médecins</a></li>
                                              <li class="active"><a href="med_seconnecter.php">Se Connecter</a> </li>
                                        </ol>
                                           
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<!--corps de la page-->
				<section class="single-service-contents">
                    <div class="container">	

						<div class="row">
                            <form method=post action="med_seconnecter.php"  name="myForm" onsubmit=" return validateForm()">
                                <div class="form-group">
                                    <label for="med_cin">CIN</label>
                                  
									<input id="med_cin" name="med_cin" type="text" class="form-control" required="" placeholder="">
									<small id="erreur_msg" style="color: red;"></small>

								</div>
                                <div class="form-group">
                                    <label for="med_password">Mot de passe</label>
                                    <input id="med_password" name="med_password" type="password" class="form-control" required="" placeholder="">
                                </div>

                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            </form>
                                <br><br>
							<?php 
                            if(isset($_POST["med_cin"])){
                                 $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $conn = new mysqli($servername, $username, $password);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                                $req= "SELECT * FROM projetphp.doctor where CIN = ".$_POST["med_cin"]." and password = '".$_POST["med_password"]."';";
                                $result = $conn->query($req);
                                if($result->num_rows == 1){
                                    $row = $result->fetch_assoc();
                                    if($row["accepted"] == "en attente"){
                                        echo "	<div class='red message'><p>votre demande n'est pas encore acceptée</p> </div>";
                                    }
                                   else{ $_SESSION["id"] = $row["CIN"];
                                    $_SESSION["name"] = $row["nom"];
                                    $_SESSION["type"] = "doctor";
                                    $_SESSION["mail"] = $row["E_mail"];
                                    header('Location: index.php');
                                    }
                                } else echo "	<div class='red message'><p>donnés erroné <br> si vous n'avez pas un compte il faut s'inscrire </p> </div> ";
                            }
                             ob_end_flush();
                            ?>
						</div>
					</div>
				</section>
			       
			        
			        <!-- copyright-section start -->
			        <footer class="copyright-section">
			        	<div class="container text-center">
			        		<div class="copyright-info">
			        			<span>Copyright © 2020 COVIDO. All Rights Reserved.<br> Designed by Hadhami El Ouni and Sabeur Ben ALi</span>
			        		</div>
			        	</div><!-- /.container -->
			        </footer>
<!-- copyright-section end -->
			        <!-- copyright-section end -->
				</div> <!-- .st-content -->
    		</div> <!-- .st-pusher -->

			<script src="owl.carousel/owl.carousel.min.js"></script>
	</body>
</html>