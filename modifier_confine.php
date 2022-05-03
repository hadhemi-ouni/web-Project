<?php 
ob_start();
session_start();
 if(!isset($_SESSION["name"])){
    header('Location: index.php');
}
error_reporting(0);
if(!isset($_GET['id'])){
    header('Location: gestion_confines.php');
}
else{
    extract($_GET);
    $_Post['id'] = strip_tags($id);
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
		<?php
			include('config/functions.php');
         $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
				if(isset($_POST["c_symptomes"]) and isset($_POST["c_remarques"])){
					
						 $req= "update projetphp.confines set symptome_c = '".$_POST["c_symptomes"]."' , remarques_c = '".$_POST["c_remarques"]."' , etat_c = '".$_POST["c_etat"]."'  where id_c =". $_POST["id"]." ;";
                    echo $req;
					$conn->query($req);		
				
            }
			
		?>
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
									   		<h1>Modifier un confiné</h1>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</section>
					
					<!--corps de la page-->

<section class="container" >
<br>
                        <div class="row">       
                            <form action="modifier_confine.php" method="POST">
                                <input name="id" type="hidden" value="<?=$id?>">

                                <div class="form-group">
                                    <label for="c_symptomes"> Symptômes </label>
                                    <textarea id="c_symptomes" name="c_symptomes" class="form-control" required="" placeholder=""></textarea>
								</div>

                                <div class="form-group">
                                    <label for="c_etat"> Etat critique </label>
                                    <ul class="listview">
                                        <li>
                                            <label>
                                                <input name="c_etat" value="oui" checked=''  type="radio">
                                                <span>Oui</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input name="c_etat" value="non"   type="radio">
                                                <span>Non</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="c_remarques"> Remarques </label>
                                    <textarea id="c_remarques" name="c_remarques" class="form-control" required="" placeholder=""></textarea>
								</div>
                                <br>
                                <button type="submit" name="ajouter" class="btn btn-primary">Modifier</button>
                                
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
