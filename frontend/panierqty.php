<?php

$id_utilisateur = $_SESSION['user']['nom'];
$qty = $_SESSION['panier'][$id_utilisateur][$id_produit] ?? '0';

$bouton = "";
if ($qty == 0) {

    $bouton = '<i class="fa fa-light fa-cart-plus"></i>';
} else {
    $bouton = '<i class="fa-solid fa-pencil"></i>';
}

?>
<div>
    <form class="countere d-flex" method="post" action="ajouter_panier.php">
        <input type="hidden" name="id" value=<?php echo $value['id'] ?>>
        <button onclick="return false" class="btn btn-primary count-plus">+</button>
        <input class="form-control" type="number" value=<?php echo $qty ?> name="qty" id="qty">
        <button onclick="return false" class="btn btn-primary count-moins">-</button>

        <button class="btn btn-success mx-1" name="Ajouter" type="submit"><?php echo $bouton ?></button>

        <?php
        if ($qty != 0) {
        ?>

            <button formaction="supprimer_panier.php" class="btn btn-danger" name="Supprimer" value="Supprimer" type="submit"> <i class="fa-solid fa-trash"></i></button>

        <?php
        }
        ?>

    </form>

</div>