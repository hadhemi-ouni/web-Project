<?php
ob_start();
session_start();
error_reporting(0);
if(!isset($_SESSION["name"])){
    header('Location: index.php');
}
$servername = "tp-cloud-mysql.cmuhyjhukgdw.us-east-1.rds.amazonaws.com";
					$username = "admin";
					$password = "newpassword";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$req= "SELECT * FROM projetphp.".$_SESSION["type"]." where E_mail = '".$_SESSION["mail"]."';";
$result = $conn->query($req);
if ($result->num_rows == 1){
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link href="alert_msg.css" rel="stylesheet">

	    <title>COVIDO</title>
	   	
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
									   		<h1>Profile</h1>
									   	</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					
                    <section class="team-service">
						<div class="container">
							<div class="row">
				                <div class="col-xs-12 text-center">
				                  <h2 class="section-title">Consulter vos informations</h2>
                                  <span class="section-sub">Et modifier votre mot de passe</span>

				                </div>
			             	 </div>
							
							<div class="team-service-contents">
								<div class="row">
									<div class="col-sm-4">
										<div class="team-service-testimonial">
											<h2>Modifier votre mot de passe</h2>
                                            <form method=post action="profile.php">
                                                <div>
                                                    <div class="form-group">
                                                        <label for="ancien">Ancien mot de passe</label>
                                                        <input id="ancien" name="ancien" type="password" class="form-control"  required>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="form-group">
                                                        <label for="nouveau">Nouveau mot de passe</label>
                                                        <input id="nouveau" name="nouveau" type="password" class="form-control"  required>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="form-group">
                                                        <label for="repeter">Répétez votre mot de passe</label>
                                                        <input id="repeter" name="repeter" type="password" class="form-control" placeholder="" required>
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <button type="submit" class="btn btn-success">Confirmer</button> 
                                                </div>
                                                
												<?php
                                    $erreur = "";
                                    if(isset($_POST["ancien"]) && isset($_POST["nouveau"]) && isset($_POST["repeter"])){
                                        if($_POST["ancien"] == $row["password"]){
                                            if($_POST["nouveau"] == $_POST["repeter"]){		
												$req = "update projetphp.doctor set password = '".$_POST["nouveau"]."'
												where  E_mail = '".$_SESSION["mail"]."';";
												echo '<div class="message green"><p>Mot de passe modifié avec succès </p></div>';
											}
                                            else
                                            $erreur = "veuillez entrer le même mot de passe 2 fois ";
                                        }
                                        else
                                        $erreur = "le mot de passe que vous avez entré est erroné ";

                                        
                                    }
									if ($erreur!=""){
	                                    echo '<div class="red message"><p>'. $erreur.'</p></div>' ;
									} 
                                ?>
        
                                                
                                            </form>
											
										</div> 
									</div><!--/.col-->
	                                    <div class="col-sm-7 col-lg-offset-1">
                                        <div class="profile">
                                            <h3>
                                                <span class="profile"> Nom et prénom : </span>
                                                <em><span id="nom"> <?= $row["nom"]." ".$row["prenom"] ?> </span></em>
                                                <hr><br>

                                                <span> Numéro de téléphone : </span>
                                                <em><span id="tel"><?= $row["tel"] ?></span></em>
                                                <hr><br>

                                                <span> E-mail : </span>
                                                <em><span id="email"> <?= $row["E_mail"] ?> </span></em>
                                                <hr><br>

                                            </h3>
                                        </div><!--/.career-contents -->

                                    </div>
								</div><!--/.row-->
							</div>
						</div><!-- /.container-->
					</section>
					<!-- /.team-service -->
			       
			        
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
