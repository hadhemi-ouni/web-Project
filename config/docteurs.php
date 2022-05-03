<?php
ob_start();
session_start();
error_reporting(0);
include('config/functions.php');
if(!isset($_SESSION["admin_name"])){
    header("location: loginAdmin.php");
}


?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Covido - Admin</title>

    <link
      href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic"
      rel="stylesheet"
      type="text/css"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="fonts/flaticon/flaticon.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <link href="css/animate.css" rel="stylesheet" />
    <link href="owl.carousel/assets/owl.carousel.css" rel="stylesheet" />

    <link href="css/menu.css" rel="stylesheet" />
    <link href="css/template.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />

    <script
      src="https://kit.fontawesome.com/c805bcc5d6.js"
      crossorigin="anonymous"
    ></script>

    <link href="admin.css" rel="stylesheet" type="text/css" />
    <script language="">
      function accept(id) {
        var elm = document.getElementById(id);
        var elms = elm.getElementsByTagName("td");
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.open(
          "GET",
          "config/accept.php?id=" + elms[4].innerHTML + "&accept=yes",
          true
        );
        xhttp.send();
        elm.parentNode.removeChild(elm);
      }
      function refus(id) {
        var elm = document.getElementById(id);
        var elms = elm.getElementsByTagName("td");
        elms.innerHTML = "";
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.open(
          "GET",
          "config/accept.php?id=" + elms[4].innerHTML + "&accept=no",
          true
        );
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
                          <li><i class="fa fa-phone"></i> 58 927 676</li>
                          <li>
                            <i class="fa fa-envelope"> </i
                            >Hadhami.ouni@etudiant-fst.utm.tn
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="col-sm-6 hidden-xs">
                      <div class="topbar-right">
                        <ul class="social-links list-inline pull-right">
                          <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                          </li>
                          <li>
                            <a href="#"><i class="fa fa-tumblr"></i></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.container -->
              </div>
              <!-- /.overlay-bg -->
            </nav>
            <!-- /.top-bar -->

            <nav class="navbar navbar-default" role="navigation">
              <div class="container mainnav">
                <div class="navbar-header">
                  <h1 class="logo">
                    <a class="navbar-brand" href="index.php"
                      ><img
                        src="img/logo.png"
                        width="190px"
                        height="40px"
                        alt=""
                    /></a>
                  </h1>
                </div>

                <div class="collapse navbar-collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                      <a href="docteurs.php">Covido Admin </a>
                    </li>

                    <li class="dropdown">
                      <a href="#"
                        >Admin
                        <?=$_SESSION["admin_name"]?>
                        <span class="fa fa-angle-down"></span
                      ></a>
                      <div class="submenu-wrapper">
                        <div class="submenu-inner">
                          <ul class="dropdown-menu">
                            <li>
                              <a href="deconnecter.php">Se déconnecter</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
              </div>
              <!-- /.container -->
            </nav>
          </header>

          <section>
            <h1>Docteurs en attente</h1>
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                  <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Hôpital</th>
                    <th>Service</th>
                    <th>ID Médecin</th>
                    <th>Accepter</th>
                    <th>Refuser</th>
                  </tr>
                </thead>
              </table>
            </div>

            <div class="tbl-content">
              <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $conn = new mysqli($servername, $username, $password);
                if ($conn->connect_error) { die("Connection failed: " .
                          $conn->connect_error); } $req= "SELECT * FROM projetphp.doctor
                          where accepted = 'en attente';"; $result = $conn->query($req);
                          $id=0; while($row = $result->fetch_assoc()): $id++; 
              ?>
              <table cellpadding="0" cellspacing="0"  border="0">
                <tbody>
                  <tr id=<?= $id ?>>
                    
                    <td><?= $row["nom"]?></td>
                    <td><?= $row["prenom"]?></td>
                    <td><?= $row["Hopital"]?></td>
                    <td><?= $row["service"]?></td>
                    <td><?= $row["ID_med"]?></td>
                    <td>
                      <a class="greenButton" onclick="accept(<?= $id?>)">✔</a>
                    </td>
                    <td>
                      <a class="redButton" onclick="refus(<?= $id?>)">✘</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              <?php endwhile;?>
            </div>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
