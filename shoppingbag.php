<?php
session_start();
require_once("config.php");
require_once("functions/getproduct.php");
require_once("functions/display.php");
if (!isset($_SESSION)) {
    header("location:pages/login.php");
}



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repas</title>
    <!-- Font awesome link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- custom CSS link -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body style="background-color: #eee;">
    <div class="container bg-light rounded-top mt-5" id="zero-pad">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12 pt-3 bg-light">
                <div class="d-flex">
                    <div class="pt-1">
                        <h4>EAT & DRINK SHOP</h4>
                    </div>

                    <div class="ml-auto p-2">'
                        <a href="pages/login.php" class="text-dark text-decoration-none" id="mobile-font">LOGIN</a>
                    </div>
                    <div class="p-2">
                        <a href="pages/register.php" class="text-dark text-decoration-none a" id="mobile-font">REGISTER</a>
                    </div>

                </div>
                <div class="d-flex flex-column pt-4">
                    <div>
                        <h5 class="text-uppercase font-weight-normal">shopping bag</h5>
                    </div>
                    <div class="font-weight-normal"><?php echo sizeof($bag) . ' items' ?></div>
                </div>
                <div class="d-flex flex-row px-lg-5 mx-lg-5 mobile" id="heading">
                    <div class="px-lg-5 mr-lg-5" id="produc">PRODUCTS</div>
                    <div class="px-lg-5 ml-lg-5" id="prc">PRICE</div>
                    <div class="px-lg-5 ml-lg-1" id="quantity">QUANTITY</div>
                    <div class="px-lg-5 ml-lg-3" id="total">TOTAL</div>
                </div>

                <?php

                foreach ($bag as $product) {
                    getProduct($product['chemin'], $product['nom_produit'], $product['id_produit'], $product['prix'], $product['quantity']);
                }

                ?>

            </div>
        </div>
    </div>




    <div class="container bg-light rounded-bottom py-4" id="zero-pad">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <button class="btn btn-sm bg-light border border-dark">GO BACK</button>
                    </div>
                    <div class="px-md-0 px-1" id="footer-font">
                        <b class="pl-md-4">SUBTOTAL<span class="pl-md-4">8000 XAF</span></b>
                    </div>
                    <div>
                        <button class="btn btn-sm bg-dark text-white px-lg-5 px-3" type="submit">CONTINUE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script src="js/script.js"></script> -->
</body>


</html>