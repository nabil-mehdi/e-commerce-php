<?php
include '../e-commerce/data.php';
$id = $_GET['id'];
$SqlState = $pdo->prepare('DELETE From categorie where id=?');
$SqlState->execute([$id]);
header("location:Affichercategorie.php");
