<?php 
ob_start();
session_start();
 if($_SESSION["type"] != "doctor"){
    header('Location: index.php');
}

error_reporting(0);
?>
<!DOCTYPE html>
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
		<link href="css/tableau.css" rel="stylesheet">

	    <link href="css/style.css" rel="stylesheet">
	    <link href="css/responsive.css" rel="stylesheet">

		<script src="https://kit.fontawesome.com/c805bcc5d6.js" crossorigin="anonymous"></script>
		<script language="javascript">
		function Supprimer_confine(id){
        var elm = document.getElementById(id);
        var elms = elm.getElementsByTagName("td");
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.open("GET", "config/supprimerConfine.php?id="+elms[0].innerHTML, true);
        xhttp.send();
        elm.parentNode.removeChild(elm);
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
									   		<h1>Gestion des confinés</h1>
											
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<!--corps de la page-->

<section class="container" >
    <br>
    <span class="haut">
        <a class="btn btn-primary" href="ajouter_confines.php">+ Ajouter un confiné </a> &nbsp 
        <a class="btn btn-primary" href="consulter_confines.php">Consulter un confiné </a>    
    </span>


    <div class="tbl-content">
        <table class="confines">
			<thead class="tbl-header">
				<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>CIN</th>
				<th>Etat critique</th>
				<th>Date de naissance </th>
				<th>Date du test </th>
				<th>Sysmptômes</th>
				<th>Remarques </th>
				<th>Localisation</th>
				<th></th>
				<th></th>

				</tr>
			</thead>
				<?php 
					$servername = "tp-cloud-mysql.cmuhyjhukgdw.us-east-1.rds.amazonaws.com";
					$username = "admin";
					$password = "newpassword";
					$conn = new mysqli($servername, $username, $password);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					$req= "SELECT * FROM projetphp.confines;";
					$result = $conn->query($req);
					$id=0;
					while($row = $result->fetch_assoc()):
					$id++;
				?>
			<tbody>
				<tr id="<?=$id?>">
				<td><?= $row["id_c"]?></td>
				<td><?= $row["nom_c"]?> </td>
				<td><?= $row["prenom_c"]?></td>
				<td><?= $row["cin_c"]?></td>
				<td><?= $row["etat_c"]?></td>
				<td><?= $row["date_naissance_c"]?></td>
				<td><?= $row["date_test_c"]?></td>
				<td><?= $row["symptome_c"]?></td>
				<td><?= $row["remarques_c"]?></td>
				<td> <a href="<?= $row["localisation"]?>" class="goto">↪</a> </td>
				<td> <a class="greenButton" href="modifier_confine.php?id=<?= $row["id_c"]?>">✎</a> </td>
				<td> <a class="redButton"  onclick="Supprimer_confine(<?=$id?>)">✘</a> </td>

				</tr>
				
			</tbody>
				<?php endwhile;?>

        </table>
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
				</div> <!-- .st-content -->
    		</div> <!-- .st-pusher -->

	    	
			<script src="owl.carousel/owl.carousel.min.js"></script>
	</body>
</html>
