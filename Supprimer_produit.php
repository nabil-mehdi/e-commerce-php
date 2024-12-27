<?php
include '../e-commerce/data.php';
$id = $_GET['id'];
$SqlState = $pdo->prepare('DELETE From produit where produit.id=?');
$SqlState->execute([$id]);
header("location:Afficherproduit.php");
