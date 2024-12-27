<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: /e-commerce/connexion.php');
}

$id_produit=$_POST['id'];

$id_utilisateur=$_SESSION['user']['nom'];

unset($_SESSION['panier'][$id_utilisateur][$id_produit]); 
header('location: panier.php');


?>
