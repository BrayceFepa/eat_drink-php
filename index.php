<?php
session_start();
if (!isset($_SESSION)) {
    header("location:pages/login.php");
}
require_once("config.php");
require_once("functions/display.php");
require_once("functions/product.php");

$request = "SELECT * FROM `produit`";
$statement = $pdo->prepare($request);
$statement->execute();
$products = [];
try {
    if ($statement->rowCount() > 0) {
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        throw new Exception('La table produit est vide');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
// if (isset($_POST['submit'])) {
//     $productname = $_POST['productname'];
//     $productqty = $_POST['productqty'];
//     $producprice = $_POST['producprice'];
//     $producpath = $_POST['producpath'];

//     var_dump($_POST);
// }


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

    <!-- Normalize CSS link -->
    <link rel="stylesheet" href="css/normalize.css" />

    <!-- custom CSS link -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            <img src="images/res-logo.png" alt="" />
            <a href="">eat & drink</a>
        </div>

        <div class="nav-link">
            <a href="">accueil</a>
            <a href="">repas</a>
            <a href="shoppingbag.php">panier</a>
            <a href="">contact</a>
        </div>

        <div class="icons">
            <div class="fa fa-shopping-basket panier">
                <a href="shoppingbag.php">
                    <div id="number">
                        <?php
                        $request1 = "SELECT * FROM `shoppingbag`";
                        $execution = $pdo->prepare($request1);
                        $execution->execute();

                        $quantity = 0;
                        while ($quantityArray = $execution->fetch()) {
                            $quantity += $quantityArray['quantity'];
                        }
                        echo $quantity;
                        ?>
                    </div>
                </a>

            </div>
            <a href="inscription.html" class="fa fa-user"></a>
            <div class="fa fa-bars" id="navBtn"></div>
        </div>
    </nav>



    <header class="inscription-header">
        <h2>Repas</h2>
    </header>
    <div class="container">
        <?php
        if (isset($errors)) {
            echo "<p>$errors</p>";
        }
        if (isset($success)) {
            echo "<p class = 'success'>$success</p>";
        }

        ?>
    </div>

    <section class="popular-foods">

        <div class="foods">

            <div class="food-row" id="food-row">

                <?php

                foreach ($products as $product) {
                    products($product['id_produit'], $product['nom_produit'], $product['prix'], $product['chemin']);
                }

                ?>

            </div>

        </div>

    </section>

</body>

</html>