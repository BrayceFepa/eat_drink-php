<?php
// require_once('fonctions/count.php');

session_start();
if (isset($_SESSION) && $_SESSION['type'] == 'admin') {
} else {
  header('location:pages/login.php');
  exit();
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>EAT & DRINK SHOP</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

  <div class="container bg-white rounded-top mt-5" id="zero-pad">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-10 col-12 pt-3">
        <div class="d-flex">
          <div class="pt-1">
            <h4>EAT & DRINK SHOP</h4>
          </div>

          <div class="ml-auto p-2"><a href="#" class="text-dark text-decoration-none" id="mobile-font"> Bienvenue <?php echo $_SESSION['nom_gestionnaire']; ?></a></div>
          <div class="p-2"><a href="fonctions/logout.php" class="text-dark text-decoration-none a" id="mobile-font">Logout</a></div>


        </div>
        <div class="container bootstrap snippet">
          <div class="row">
            <div class="col-lg-4 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading dark-blue"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content dark-blue">
                  <div class="circle-tile-description text-faded"> Gestionnaires</div>
                  <div class="circle-tile-number text-faded "><?php if (isset($nombre)) echo $nombre; ?> </div>
                  <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading red"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content red">
                  <div class="circle-tile-description text-faded"> Users Online </div>
                  <div class="circle-tile-number text-faded">10</div>
                  <a class="circle-tile-footer" href="#">More Info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading yellow"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content yellow">
                  <div class="circle-tile-description text-faded"> Creer gestionnaire </div>

                  <a class="circle-tile-footer" href="pages/addgestionnaire.php">Creer maintenant<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>


            <div class="col-lg-4 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading orange"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content orange">
                  <div class="circle-tile-description text-faded"> Creer categorie </div>

                  <a class="circle-tile-footer" href="pages/addcategorie.php">Creer maintenant<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6">
              <div class="circle-tile ">
                <a href="#">
                  <div class="circle-tile-heading green"><i class="fa fa-users fa-fw fa-3x"></i></div>
                </a>
                <div class="circle-tile-content green">
                  <div class="circle-tile-description text-faded"> Creer produit </div>

                  <a class="circle-tile-footer" href="pages/addproduit.php">Creer maintenant<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>


      <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="../js/jquery.min.js"></script>
</body>

</html>