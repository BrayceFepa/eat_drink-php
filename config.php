<?php
 $dsn='mysql:dbname=eat_drink;host=localhost';
 $user='root';
 $password='';

 try {
    $pdo=new PDO($dsn,$user,$password);

 } catch (PDOException $e) {
    echo $e->getMessage();
    die();
 }


?>