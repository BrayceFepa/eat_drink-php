<?php
//session_start();
require_once('../../config.php');
$sql = "select *from gestionnaires";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$nombre = $stmt->rowCount();


$sql1 = "select *from categorieproduit";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$categories = $stmt1->fetchAll();

var_dump($categories);
