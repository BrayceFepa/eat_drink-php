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
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        
        $sql="select *from gestionnaires where email=:var";
        $statement=$pdo->prepare($sql);
        $params=["var"=>$email];
        $statement->execute($params);
        if($statement->rowCount()>0){
            $getRow=$statement->fetch();
           //var_dump($getRow);
           if(password_verify($password,$getRow['password']))
           {
            unset($getRow['password']);
            $_SESSION=$getRow;
            header('location:../index.php');
            exit();

               
           }else{

            $errors='Email ou mot de passe incorrect';
           }
        }

    }else{
        
    }

    

}

}
