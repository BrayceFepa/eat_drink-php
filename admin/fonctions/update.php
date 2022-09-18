<?php
session_start();
require("../../config.php");
if (isset($_POST['submit'])) {
    $nomProd = $_POST['nprod'];
    $description = $_POST['description'];
    $price = $_POST['priprod'];
    $quantity = $_POST['quantity'];
    $idProd = $_POST['id_prod'];

    $sql = "UPDATE `produit` SET nom_produit=:nomprod, description=:descr, prix=:price, quantity=:qty WHERE id_produit=:idprod";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        'nomprod' => $nomProd,
        'descr' => $description,
        'price' => $price,
        'qty' => $quantity,
        'idprod' => $idProd
    ]);
}
