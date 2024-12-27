<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Ecommerce</a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Acceuil.php">Acceuil</a>
            </li>
        </ul>

        <?php
        $productCount = 0;
        if (isset($_SESSION['user'])) {
            $id_utilisateur = $_SESSION['user']['nom'];
            $productCount = count($_SESSION['panier'][$id_utilisateur] ?? []);
        }

        ?>
        <div>
            <a class="btn" href="/E-COMMERCE/connexion.php"><i class="fa-solid fa-gear" style="color: #000000;"></i></a>

            <a class="btn" href="Panier.php"><i class="fa-solid fa-cart-shopping"></i> Panier(<?php echo $productCount ?>)
            </a>
        </div>

    </div>
</nav>