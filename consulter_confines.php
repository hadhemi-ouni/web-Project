<?php 
ob_start();
session_start();
 if($_SESSION["type"] !=  "doctor"){
    header('Location: index.php');
}

error_reporting(0);

?><!DOCTYPE html>
<html lang="en">

<head>
		<title>COVIDO </title>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

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

		<script src="https://kit.fontawesome.com/c805bcc5d6.js" crossorigin="anonymous"></script>

		
	    <script language="javascript">
		function supprimer(id){
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.open("GET", "config/supprimerConfine.php?id="+id, true);
        xhttp.send();
		setTimeout(() => {   window.location.href = "gestion_confines.php"; }, 500);
		}
		</script>
	    
	</head>

	

	<body id="page-top">
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
									   		<h1>Consulter un confiné</h1>
												<ol class="breadcrumb">
													<li><a href="index.php">Acceuil</a></h2></li>
													<li><a href="gestion_confines.php.php">Gestion des confinés</a></li>
													<li class="active"><a href="consulter_confines.php.php">Consulter un confiné</a> </li>
												</ol>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<!--corps de la page-->

<section class="container" >
    <br>
		
	<form class="newsletter-form" action="consulter_confines.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name ="id_search" id="id_search" placeholder="Checher avec ID du confiné">
            <button type="submit" class="btn">Chercher &nbsp;<i class="fa fa-angle-right"></i></button>
        </div>
    </form>
	<br><br>

    <div class="tbl-content">
				<?php
					
					$servername = "localhost";
					$username = "root";
					$password = "";
					$conn = new mysqli($servername, $username, $password);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					if (isset( $_POST["id_search"] )):
						$req= "SELECT * FROM projetphp.confines WHERE id_c=".$_POST["id_search"].";";
						$result = $conn->query($req);
						$id=0;
						while($row = $result->fetch_assoc()):
						$id++;
					
				?>
        
        <h3>
            <span class="profile"> ID : </span>
            <em><span id="id"> <?= $row["id_c"]?> </span></em>
            <hr><br>

            <span> Nom : </span>
            <em><span id="nom"> <?= $row["nom_c"]?> </span></em>
            <hr><br>

            <span> Prénom : </span>
            <em><span id="prenom"> <?= $row["prenom_c"]?> </span></em>
            <hr><br>

            <span> CIN : </span>
            <em><span id="cin"> <?= $row["cin_c"]?> </span></em>
            <hr><br>

            <span> Date de naissance : </span>
            <em><span id="date"> <?= $row["date_naissance_c"]?></span></em>
            <hr><br>

			<span> Date du test : </span>
            <em><span id="date"><?= $row["date_test_c"]?></span></em>
            <hr><br>

            <span> Symptômes : </span>
            <em><span id="symptome"> <?= $row["symptome_c"]?> </span></em>
            <hr><br>

            <span> Etat critique : </span>
            <em><span id="etat"> <?= $row["etat_c"]?> </span></em>
            <hr><br>

            <span> Remarques : </span>
            <em><span id="remarques"><?= $row["remarques_c"]?></span></em>
            <hr><br>

            <span> Localisation : </span>
            <em><a><?= $row["localisation"]?>   </a></em>
            <hr><br>
						

        </h3>
        <a href="" class="btn btn-danger" onclick="supprimer( <?= $row["id_c"]?> )"> Supprimer le confiné </a>
		<a href="modifier_confine.php?id=<?= $row["id_c"] ?>" class="btn btn-success"> Modifier la fiche </a>

		<?php
			endwhile;
			endif;
		?>
		
    </div>
	<br>
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
				</div> <!-- .st-content -->
    		</div> <!-- .st-pusher -->
			<script src="owl.carousel/owl.carousel.min.js"></script>
	</body>
</html>
