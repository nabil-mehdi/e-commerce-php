<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: /e-commerce/connexion.php');
}

$id_produit=$_POST['id'];
$qty=$_POST['qty'];
$id_utilisateur=$_SESSION['user']['nom'];
if (!isset($_SESSION['panier'][$id_utilisateur])) {
    $_SESSION['panier'][$id_utilisateur] = [];
}

if($qty == 0){
    unset($_SESSION['panier'][$id_utilisateur][$id_produit]);//efacer la session
    header('location: /e-commerce/frontend/detailproduit.php?id='.$id_produit);
}else{
    $_SESSION['panier'][$id_utilisateur][$id_produit] = $qty;
    header('location: /e-commerce/frontend/detailproduit.php?id='.$id_produit);
}



?>
