<?php
session_start();
require_once("../config.php");
if (isset($_POST['submit'])) {
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT * FROM `client` WHERE email_client=:mail";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'mail' => $email
            ]);
            if ($statement->rowCount() > 0) {
                $row = $statement->fetch();
                // var_dump($row);
                if (password_verify($password, $row['passclient'])) {
                    unset($row['passclient']);
                    $_SESSION = $row;
                    header("location:../index.php");
                    $success = "Loged in successfully !";
                } else {
                    $errors = "Invalid password !";
                }
            }
        } else {
            $errors = "$email is an ivalid email !";
        }
    } else {
        $errors = "All inputs fileds are required !";
    }
}
