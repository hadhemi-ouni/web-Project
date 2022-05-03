<?php
ob_start();
session_start();
if ($_SESSION["type"] != "doctor") {
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
	<link href="alert_msg.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/template.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

	<script src="https://kit.fontawesome.com/c805bcc5d6.js" crossorigin="anonymous"></script>


</head>


<body id="page-top">
	<?php
	include('config/functions.php');
	$ready = false;
	if (isset($_POST)) {
		if (!existDB($_POST["c_cin"], "confines", "cin_c")) {
			if (!existDB($_POST["c_id"], "confines", "id_c")) {
				$ready = true;
			}
		}
		if ($ready)
			insert("'" . $_POST["c_id"] . "','" . $_POST["c_nom"] . "','" . $_POST["c_prenom"] .
				"','" . $_POST["c_cin"] . "','" . $_POST["c_date_naissance"] . "','" . $_POST["c_date_test"] .
				"','" . $_POST["c_symptomes"] . "','" . $_POST["c_etat"] . "','" . $_POST["localistion"] .
				"','" . $_POST["c_remarques"] . "'", "confines");
	}
	?>
	<script type="text/javascript">
	var alertcin = "";

	function validateForm() {
		let cin = document.forms["myForm"]["c_cin"].value;
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
										<h1>Ajouter un confiné</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!--corps de la page-->

				<section class="container">
					<br>
					<div class="row">

						<form action="ajouter_confines.php" method="POST" name="myForm" onsubmit=" return validateForm()">
							<div class="form-group">
								<label for="c_id"> ID </label>
								<input id="c_id" name="c_id" type="text" class="form-control" required="" placeholder="">
							</div>
							<div class="form-group">
								<label for="c_nom"> Nom </label>
								<input id="c_nom" name="c_nom" type="text" class="form-control" required="" placeholder="">
							</div>
							<div class="form-group">
								<label for="c_prenom"> Prénom </label>
								<input id="c_prenom" name="c_prenom" type="text" class="form-control" required="" placeholder="">
							</div>
							<div class="form-group">
								<label for="c_cin"> CIN </label>
								<input id="c_cin" name="c_cin" type="text" class="form-control" required="" placeholder="">
								<small id="erreur_msg" style="color: red;"></small>

							</div>
							<div class="form-group">
								<label for="c_date_naissance"> Date de naissance </label>
								<input id="c_date_naissance" name="c_date_naissance" type="date" class="form-control" required="" placeholder="">
							</div>
							<div class="form-group">
								<label for="c_date_test"> Date du test </label>
								<input id="c_date_test" name="c_date_test" type="date" class="form-control" required="" placeholder="">
							</div>
							<div class="form-group">
								<label for="c_symptomes"> Symptômes </label>
								<textarea id="c_symptomes" name="c_symptomes" class="form-control" required="" placeholder=""></textarea>
							</div>

							<div class="form-group">
								<label for="c_etat"> Etat critique </label>
								<ul class="listview">
									<li>
										<label>
											<input name="c_etat" value="oui" checked="" type="radio">
											<span>Oui</span>
										</label>
									</li>
									<li>
										<label>
											<input name="c_etat" value="non" type="radio">
											<span>Non</span>
										</label>
									</li>
								</ul>
							</div>
							<div class="form-group">
								<label for="c_remarques"> Remarques </label>
								<textarea id="c_remarques" name="c_remarques" class="form-control" required="" placeholder=""></textarea>
							</div>
							<div class="form-group">
								<label for="c_localisation"> Localisation </label>
								<input id="c_localisation" name="c_localisation" type="text" class="form-control" required="" placeholder="">
							</div>
							<br>
							<button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>

						</form>
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