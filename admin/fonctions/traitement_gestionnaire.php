<?php
require_once('../../config.php');
session_start(); //permet de demarrer la session

if(isset($_POST['submit'])){

//var_dump($_POST['email']);
if(isset($_POST['email'],$_POST['password']) && 
!empty($_POST['email']) && !empty($_POST['password']))
{

    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $nom=trim($_POST['nom']);
    $prenom=trim($_POST['prenom']);

    //cryptage du mot de passe
    $options=array("cost"=>4);
    $hashpass=password_hash($password,PASSWORD_BCRYPT,$options);
    // var_dump($nom);
    // die();
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        
        $sql="select *from gestionnaires where email=:var";
        $statement=$pdo->prepare($sql);
        $params=["var"=>$email];
        $statement->execute($params);
        if($statement->rowCount()==0){
            $getRow=$statement->fetch();
           // var_dump($getRow);
         $requete="insert into gestionnaires(nom_gestionnaire,prenom_gestionnaire,email,password) values (:nom,:prenom,:email,:pass)";
        $statement1=$pdo->prepare($requete);
        $params1=[
            ":nom"=>$nom,
            ":prenom"=>$prenom,
            ":email"=>$email,
            ":pass"=>$hashpass
        ];
        $statement1->execute($params1);
        $success="Gestionnaire bien cree !!";
        }else{
             $errors='Email deja existant ';
        }

    }else{
        
    }

    

}

}




?>