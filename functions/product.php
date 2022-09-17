<?php
// require_once("../config.php");
if (isset($_POST['submit'])) {
    $productname = $_POST['productname'];
    $productqty = $_POST['productqty'];
    $producprice = $_POST['producprice'];
    $producpath = $_POST['producpath'];
    $productid = $_POST['productid'];

    $sqli = "SELECT * FROM `produit` WHERE id_produit=:prodid";
    $statementi = $pdo->prepare($sqli);
    $statementi->execute(['prodid' => $productid]);
    $rowprodi = $statementi->fetch();
    $currentQty = $rowprodi['quantity'];
    if ($currentQty > 0) { //if the remaining quantity is greater than 0 then we'll be able to add product.

        $requestbag = "SELECT * FROM `shoppingbag` WHERE nom_produit =:productname"; //Her we get the the
        $statementbag = $pdo->prepare($requestbag);
        $statementbag->execute(['productname' => $productname]);
        $rowbag = $statementbag->fetch();
        if ($statementbag->rowCount() > 0) { //we check if the product is already in the database
            $errors = "Product already added to cart";
        } else {
            try {
                $sql = "INSERT INTO `shoppingbag` (nom_produit, prix, quantity, chemin) VALUES (:prdname, :price, :qty, :path)";
                $statement = $pdo->prepare($sql);
                $statement->execute([
                    'prdname' => $productname,
                    'price' => $producprice,
                    'qty' => $productqty,
                    'path' => $producpath
                ]);
                $success = "Product added to cart !";
            } catch (PDOException $e) {
                $errors = $e->getMessage();
                echo $errors  . " " . $e->getLine() . " " . $e->getFile();
            }



            try { // here we'll try to store the quantity of a product inside the $qty variable
                $sql2 = "SELECT * FROM `produit` WHERE id_produit=:prodid";
                $statement1 = $pdo->prepare($sql2);
                $statement1->execute(['prodid' => $productid]);
                $rowProd = $statement1->fetch();
                // var_dump($rowProd);
                // echo ($rowProd['quantity'] - $productqty);
                $qty = $rowProd['quantity'];
            } catch (PDOException $e) {
                echo $e->getMessage() . " " . $e->getFile() . " " . $e->getLine();
            }

            try { //Here we update the qty of a product when adding it in bag
                $sql3 = "UPDATE `produit` SET quantity=:qty WHERE id_produit=:prodid";
                $statement2 = $pdo->prepare($sql3);
                $statement2->execute([
                    'qty' => $qty - $productqty,
                    'prodid' => $productid
                ]);
            } catch (PDOException $e) {
                echo $e->getMessage() . " " . $e->getFile() . " " . $e->getLine();
            }
        }
    } else {
        $errors = "Produit en rupture de stock !";
    }
}
