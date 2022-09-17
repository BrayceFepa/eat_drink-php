<?php
require_once('../config.php');
if (isset($_POST['submit'])) {

    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['password']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = trim($_POST['password']);

        // let's cript the user password
        $options = ['cost' => 4];
        $hashpassword = password_hash($password, PASSWORD_BCRYPT, $options);

        //Let's check if the user email is valid or not
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // let's check if user is not already registered
            $sql1 = "SELECT * FROM `client` WHERE email_client=:mail";
            $statement1 = $pdo->prepare($sql1);
            if ($statement1->rowCount() == 0) {
                $getRow = $statement1->fetch(PDO::FETCH_ASSOC);
                //let's fill the client table with user informations
                $sql = "INSERT INTO `client` (nom_client, email_client, telephone, passclient) VALUES (:name, :email, :tel, :pass)";
                $statement = $pdo->prepare($sql);
                $statement->execute([
                    'name' => $name,
                    'email' => $email,
                    'tel' => $phone,
                    'pass' => $hashpassword
                ]);
                $success = "Client bien créé !";
                header("location: login.php");
            } else {
                $errors = "$email already registered !";
            }
        } else {
            $errors = "$email is not a valid email !";
        }
    } else {
        $errors = "All input fields are requireds !";
    }
}
