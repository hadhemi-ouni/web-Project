<?php
session_start();
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

                    <div id="main-carousel" class="carousel slide hero-slide" data-ride="carousel">
                       
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            
                            <div class="item active">
                                <img src="img/slider/slide-2.jpg" alt="Hero Slide">
                                <!--Slide Image-->

                                <div class="container">
                                    <div class="carousel-caption">

                                        <h1 class="animated bounceIn">Protégez-vous et vos proches</h1>

                                        <p class="lead animated bounceIn">Créez un environnement sécuritaire, suivez les modes d'emploi et 
											protégez-vous des dangers en sachant les reconnaître. .</p>
                                        <a class="btn btn-warning" href="https://www.who.int/health-topics/coronavirus">En Savoir Plus sur le COVID-19</a>
                                    </div>
                                    <!--.carousel-caption-->
                                </div>
                                <!--.container-->
                            </div>
                            <!--.item-->
                        </div>
                        <!--.carousel-inner-->

                        
                    </div>

					<section class="service-home service-home2 section-padding">
			            <div class="container">
			              <div class="row">
			                <div class="col-xs-12 text-center">
			                  <h2 class="section-title">Méthodes de prévention</h2>
							  <span class="section-sub">Protégez-vous et protégez les autres en étant informé des éléments<br>
								 essentiels et en prenant les précautions adaptées. <br>
								 Suivez les conseils de l’organisme de santé publique du lieu où vous vivez.<br> 
			                </div>
			              </div> <!-- /.row -->

			              <div class="row content-row">
			              	<div class="col-sm-4">
			              		<div class="service">
				              		<div class="service-thumb-home thumb-grid">
				              			<a href="#"><img src="img/service/laver.jpg" alt=""></a>
				              		</div>
				              		
				              		<h3>Lavez les mains</h3>
									  <p>Se laver souvent les mains. <br> 
										Utiliser du savon et de l’eau, <br> ou une solution hydroalcoolique.<br> ou un gel antycéptique  </p>
			              		</div>
			              	</div><!-- /.col-sm-4 -->

			              	<div class="col-sm-4">
			              		<div class="service">
				              		<div class="service-thumb-home thumb-grid">
				              			<a href="#"><img src="img/service/masque.jpg" alt=""></a>
				              		</div>
				              		<h3> Portez une bavette </h3>
				              		<p>Rester à distance de toute personne <br> qui tousse ou éternue. <br> Et portez les masques de protection   </p>
			              		</div>

			              	</div><!-- /.col-sm-4 -->

			              	<div class="col-sm-4">
			              		<div class="service">
				              		<div class="service-thumb-home thumb-grid">
				              			<a href="#"><img src="img/service/stayhome.jpg" alt=""></a>
				              		</div>
				              		<h3>Restez chez-Vous</h3>
				              		<p>Respectez les procédures prises <br> par le gouvernorat et <br> restez en confinement. <br> Ne sortez qu'en cas d'urgences. </p>
			              	   </div>
			              	</div><!-- /.col-sm-4 -->
			              </div> <!-- /.row -->
			            </div><!-- /.container -->
			        </section>
			        
			        <section class="feature-section section-padding">
				        <div class="container">
				        	<div class="row">
				        		<div class="col-sm-7 col-xs-12">
				        			<h2>Mesures de protection essentielles contre le nouveau coronavirus</h2>

									<p>Tenez-vous au courant des dernières informations sur la flambée de COVID-19, disponibles sur le site Web de l’OMS et auprès des autorités de santé publique nationales et locales. La COVID-19 continue de toucher surtout la population de la Chine, même si des flambées sévissent dans d’autres pays. La plupart des personnes infectées présentent des symptômes bénins et guérissent, mais d’autres peuvent avoir une forme plus grave. Prenez soin de votre santé et protégez les autres en suivant les conseils</p> 
									<a href="https://www.who.int/fr/emergencies/diseases/novel-coronavirus-2019/advice-for-public" class="btn btn-primary">Mesures de protection détaillés</a>
				        		</div>
				        
				        	</div>
				        </div>
			        </section>

			       
			        <section class="cta-section">
			        	<div class="container text-center">
			        		<a data-toggle="modal" data-target="#quoteModal" href="https://www.worldometers.info/coronavirus/" class="btn btn-primary quote-btn">Dérniers statistiques</a>

			        	</div><!-- /.container -->
			        </section>

			        <!-- copyright-section start -->
			        <footer class="copyright-section">
			        	<div class="container text-center">
			        		<div class="copyright-info">
			        			<span>Copyright © 2022 COVIDO. All Rights Reserved.<br> Designed by Hadhami El Ouni and Sabeur Ben Ali</span>
			        		</div>
			        	</div><!-- /.container -->
			        </footer>

			        <!-- copyright-section end -->
	    		</div> <!-- .st-content -->
		    </div> <!-- .st-pusher -->
		

	    
	    <script src="owl.carousel/owl.carousel.min.js"></script>
	    
	</body>
</html>
