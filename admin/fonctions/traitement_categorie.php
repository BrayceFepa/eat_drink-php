<?php
require_once('../../config.php');
session_start(); //permet de demarrer la session

if(isset($_POST['submit'])){

//var_dump($_POST['email']);
if(isset($_POST['nom'],$_POST['description']) && 
!empty($_POST['nom']) && !empty($_POST['description']))
{

    $nom=trim($_POST['nom']);
    $description=trim($_POST['description']);
    $idgestionnaire=$_SESSION['id_gestionnaire'];
    
           // var_dump($getRow);
        $requete="insert into categorieproduit(nom_type_produit,description_type_produit_1,id_gestionnaire) values (:nom,:des,:id)";
        $statement1=$pdo->prepare($requete);
        $params1=[
            ":nom"=>$nom,
            ":des"=>$description,
            ":id"=>$idgestionnaire
        ];
        $statement1->execute($params1);
        $success="Categorie bien cree !!";
       
}

}




?>