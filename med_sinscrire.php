<?php
ob_start();
session_start();
if (isset($_SESSION["name"])) {
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

	<link href="alert_msg.css" rel="stylesheet">

	<title>COVIDO</title>
</head>


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


<body id="page-top">
	<?php
	include('config/functions.php');
	$correct = "vide";
	if (isset($_POST["med_CIN"])) {
		$erreurS = "";
		if (existDB($_POST["med_CIN"], "doctor", "CIN"))         $erreurS = $erreurS . "CIN existe deja <br>";
		if (existDB($_POST["med_ID"], "doctor", "DoctorID"))     $erreurS = $erreurS . "ID existe deja <br>";
		if (existDB($_POST["med_tel"], "doctor", "tel"))         $erreurS = $erreurS . "ce numero de tel existe deja <br>";
		$correct = "pas correct";

		if ($erreurS === "") {
			$correct = "correct";
			insert("'" . $_POST["med_nom"] . "','" . $_POST["med_prenom"] . "','" . $_POST["med_CIN"] . "','" . $_POST["med_naissance"] . "','" . $_POST["med_ID"] . "','" . $_POST["med_tel"] . "','" . $_POST["med_mail"] . "','" . $_POST["med_hopital"] . "','" . $_POST["med_service"] . "','" . $_POST["med_passe"] . "','en attente'", "doctor");
		}
	}

	?>
	<script type="text/javascript">
		var alertmessage = "";

		function validateForm() {
			let cin = document.forms["myForm"]["med_CIN"].value;
			let tel = document.forms["myForm"]["med_tel"].value;
			let pass = document.forms["myForm"]["med_passe"].value;

			alertcin = "";
			alerttel = "";
			alertpass = "";

			let test = true;
			alertmessage = "";
			if ((cin.length != 8) || (cin[0] != '0' && cin[0] != '1')) {

				alertcin = "* ";
				test = false;
				if (cin.length != 8) alertcin += "le chapms cin doit contenir 8 chiffre exacatement  <br> ";
				if ((cin[0] != '0' && cin[0] != '1')) alertcin += "  le chapms cin doit commencer par 0 ou 1  <br> ";
			}


			if (tel.length != 8) {
				alerttel = "le numero de telephone contenir 8 chiffre exacatement  <br> ";
				test = false;
			}

			if (pass.length < 6) {
				alertpass = "le mot de passe doit contenir au moins 6 caracteres <br> ";
				test = false;
			}
			document.getElementById("erreur_tel").innerHTML = alerttel;
			document.getElementById("erreur_msg").innerHTML = alertcin;

			document.getElementById("erreur_pass").innerHTML = alertpass;
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
									if (!isset($_SESSION["type"])) :
									?>
										<li><a href="espacemedecins.php">Espace Médecin </a></li>
									<?php
									endif;
									if ($_SESSION["type"] == "doctor") :
									?>
										<li class="dropdown"><a href="#">Dr <?= $_SESSION["name"] ?> <span class="fa fa-angle-down"></span></a>
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
										<li><a href="index.php">Acceuil</a></h2>
										</li>
										<li><a href="espacemedecins.php">Espace Médecins</a></li>
										<li class="active"><a href="med_sinscrire.php">S'inscrire</a> </li>
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
							<form method=post action="med_sinscrire.php" onsubmit=" return validateForm()" name="myForm">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="med_nom"> Nom </label>
											<input id="med_nom" name="med_nom" type="text" class="form-control" required="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="med_prenom"> Prénom </label>
											<input id="med_prenom" name="med_prenom" type="text" class="form-control" required="" placeholder="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label name="med_CIN">Numéro de CIN</label>
											<input id="med_CIN" name="med_CIN" type="number" class="form-control" required="" placeholder="">
											<small id="erreur_msg" style="color: red;"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="med_naissance">Date de naissance</label>
											<input id="med_naissance" name="med_naissance" type="date" class="form-control" required="" placeholder="">
										</div>
									</div>
								</div>
								<div class="row"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="med_ID">ID du médecin</label>
										<input id="med_ID" name="med_ID" type="number" class="form-control" required="" placeholder="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="med_tel">Numéro de Téléphone</label>
										<input id="med_tel" name="med_tel" type="number" class="form-control" required="" placeholder="">
										<small id="erreur_tel" style="color: red;"></small>

									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="med_mail">E-mail</label>
										<input id="med_mail" name="med_mail" type="email" class="form-control" required="" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="med_hopital">Hôpital</label>
											<input id="med_hopital" name="med_hopital" type="text" class="form-control" required="" placeholder="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="med_service">Service</label>
											<input id="med_service" name="med_service" type="text" class="form-control" required="" placeholder="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="med_passe">Mot de passe</label>
									<input id="med_passe" name="med_passe" type="password" class="form-control" required="" placeholder="">
									<small id="erreur_pass" style="color: red;"></small>
								</div>

								<button type="submit" class="btn btn-primary">S'inscrire</button>
							</form>
							<br>
						</div>
						<?php
						if ($correct == "correct") :
						?>
							<div class="green message">
								<p>votre inscription a été envoyée au admin </p>
							</div>
						<?php elseif ($correct == "pas correct") :
						?>
							<div class="message red">
								<p><?= $erreurS ?> </p>
							</div>
						<?php endif; ?>
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