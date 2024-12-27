<?php
session_start();
$conecte = false;
if (isset($_SESSION['user'])) {
    $conecte = true;
}


?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-COMMERECE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                $pageactuel = $_SERVER['PHP_SELF']; // donne le lien de la page ouvert
                ?>

                <li class="nav-item">
                    <a class="nav-link <?php if ($pageactuel == "/e-commerce/Ajouter.php") echo 'active' ?>" href="Ajouter.php">Ajouter utilisateur</a>
                </li>
                <?php


                if ($conecte) {

                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($pageactuel == "/e-commerce/Affichercategorie.php") echo 'active' ?>" href="Affichercategorie.php">Affichier categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($pageactuel == "/e-commerce/Afficherproduit.php") echo 'active' ?>" href="Afficherproduit.php">Affichier produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($pageactuel == "/e-commerce/Ajoutercategorie.php") echo 'active' ?>" href="Ajoutercategorie.php">Ajouter categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($pageactuel == "/e-commerce/Ajouterproduit.php") echo 'active' ?>" href="Ajouterproduit.php">Ajouter produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($pageactuel == "/e-commerce/commande.php") echo 'active' ?>" href="commande.php">Commande</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="deconexion.php">Deconexion</a>
                        <i class="fas fa-home"></i>
                    </li>


                <?php

                } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">connexion</a>
                    </li>
                    <li class="nav-item">

                        <a class="btn" href="/E-COMMERCE/frontend/Acceuil.php"><i class="fas fa-home" style="color: #000000;"></i></a>
                    </li>
                <?php

                }

                ?>


                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>