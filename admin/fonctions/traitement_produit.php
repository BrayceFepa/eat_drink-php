<?php
require_once('../../config.php');
session_start(); //permet de demarrer la session

if (isset($_POST['submit'])) {

    //var_dump($_POST['email']);
    if (
        isset($_POST['nom'], $_POST['description']) &&
        !empty($_POST['nom']) && !empty($_POST['description'])
    ) {

        // var_dump($_POST);
        // die();

        $nom = trim($_POST['nom']);
        $description = trim($_POST['description']);
        $idgestionnaire = $_SESSION['id_gestionnaire'];
        $prix = trim($_POST['prix']);
        $actif = trim($_POST['actif']);
        $cat = trim($_POST['cat']);

        if (!empty($_FILES['image'])) {
            $image_name = $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], '../../images/' . $image_name);
        }


        // var_dump($getRow);
        $requete = "insert into produit(nom_produit,description,prix,chemin,actif,id_gestionnaire,id_type_produit) values (:nom,:des,:prix,:chemin,:actif,:id1,:id2)";
        $statement1 = $pdo->prepare($requete);
        $params1 = [
            ":nom" => $nom,
            ":des" => $description,
            ":id" => $idgestionnaire
        ];
        $statement1->execute($params1);
        $success = "Categorie bien cree !!";
    }
}
