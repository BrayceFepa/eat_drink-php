<?php

if (isset($_GET['minus'])) {
    // var_dump($_GET['minus']);
    $id_prod = $_GET['minus']; //here we get parameter from url which is the product_id
    $sql1 = "SELECT * FROM `shoppingbag` WHERE id_produit=:idprod";
    $statement1 = $pdo->prepare($sql1);
    $statement1->execute(['idprod' => $id_prod]);
    $getproduct = $statement1->fetch(); //We put in an array all informations related to the product

    $sql2 = "UPDATE `shoppingbag` SET quantity=:qty WHERE id_produit=$id_prod"; //We modify the current quantity of the product in the database
    $statement2 = $pdo->prepare($sql2);
    $minusqty = ($getproduct['quantity'] - 1);
    $statement2->execute(['qty' => $minusqty]);
}


if (isset($_GET['plus'])) {
    $id_prod = $_GET['plus'];
    $sql1 = "SELECT * FROM `shoppingbag` WHERE id_produit=:idprod";
    $statement1 = $pdo->prepare($sql1);
    $statement1->execute(['idprod' => $id_prod]);
    $getproduct = $statement1->fetch(); //We put in an array all informations related to the product

    $sql2 = "UPDATE `shoppingbag` SET quantity=:qty WHERE id_produit=$id_prod"; //We modify the current quantity of the product in the database
    $statement2 = $pdo->prepare($sql2);
    $statement2->execute(['qty' => ($getproduct['quantity'] + 1)]);
}


if (isset($_GET['close'])) {
    // var_dump($_GET['close']);
    $id_prod = $_GET['close'];
    $sql1 = "DELETE FROM `shoppingbag` WHERE id_produit=:idprod";
    $statement1 = $pdo->prepare($sql1);
    $statement1->execute(['idprod' => $id_prod]);
}


$request = "SELECT * FROM `shoppingbag`";
$statement = $pdo->prepare($request);
$statement->execute();
$bag = $statement->fetchAll();

// var_dump($bag[14]['quantity']);