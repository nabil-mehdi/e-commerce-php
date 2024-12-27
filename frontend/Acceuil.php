<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/e-commerce/css/quantite.css">
    <title>Acceuil</title>
</head>

<body>
    <?php
    session_start();
    include 'C:\xampp\htdocs\e-commerce/data.php';
    include 'C:\xampp\htdocs\e-commerce/frontend/frontnav.php';
    $SqlState = $pdo->prepare("SELECT *from categorie");
    $SqlState->execute();
    $categorie = $SqlState->fetchAll(PDO::FETCH_ASSOC);
    ////
    $SqlState = $pdo->prepare('SELECT * From produit');
    $SqlState->execute();
    $produit = $SqlState->fetchAll(PDO::FETCH_ASSOC);



    ?>

    <div class="container py-1">
        <div class="menu-container">
            <h4 id="toggleMenu"><i class="fa-solid fa-list"></i></h4>
            <div id="menuContent" class="menu-content" style="display: none;">
                <?php foreach ($categorie as $value) { ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <?php if (isset($_SESSION['user'])) { ?>
                                <a href="frontproduit.php?id=<?php echo $value['id']; ?>" class="btn btn-light">
                                    <i class="<?php echo $value['icone'] . " "; ?>"></i>
                                    <?php echo $value['libelle']; ?>
                                </a>

                            <?php } else {
                                header('location: /e-commerce/connexion.php');
                            } ?>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleMenu').addEventListener('click', function() {
            var menuContent = document.getElementById('menuContent');
            if (menuContent.style.display == 'none') {
                menuContent.style.display = 'block';
            } else {
                menuContent.style.display = 'none';

            }
        });
    </script>
    <?php
    foreach (array_chunk($produit, 6) as $row) {

        $timestamp = strtotime($value['datecreation']);
        $dateFormat = "d/m/Y";
        $formattedDate = date($dateFormat, $timestamp);
        $id_produit = $value['id'];
    ?>

        <div class="container mb-3">

            <div class="row ">
                <?php foreach ($row as $value) { ?>
                    <div class="card md-3 col-md-2 mb-3 shadow custom-card">
                        <img width="50px" class="img img-fluid m-5 Auto-max" src="../frontend/telechargement/<?php echo $value['image'] ?>" alt="nn">
                        <a href="detailproduit.php?id=<?php echo $value['id'] ?> " class="">Affichier details</a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $value['libelle'] ?></h5>
                            <p class="card-text"><?php echo $value['prix'] ?> DH</p>
                            <p class="card-text"><small class="text-muted"><?php echo $formattedDate ?></small></p>
                        </div>
                    </div>
                <?php }
                ?>
            </div>

        </div>

    <?php } ?>
    <style>
        .card a {
            display: block;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            background-color: #007bff;
            /* Couleur de fond du lien */
            color: #fff;
            /* Couleur du texte du lien */
            border-radius: 5px;
            /* Coins arrondis du lien */
            transition: background-color 0.3s ease;
            /* Transition d'animation pour la couleur de fond */
        }

        .card a:hover {
            background-color: #0056b3;
            /* Changement de couleur au survol du lien */
        }

        .card {
            margin-right: 10px;
            margin-top: 25px;
        }

        .custom-card {
            border: 1px solid #ddd;
            /* Ajoute une bordure à la carte */
            border-radius: 10px;
            /* Ajoute des coins arrondis à la carte */
            background-color: #fff;
            /* Couleur de fond de la carte */
            transition: transform 0.3s ease;
            /* Ajoute une transition d'animation pour l'échelle au survol */
        }

        .custom-card:hover {
            transform: scale(1.05);
            /* Agrandit légèrement la carte au survol */
        }
    </style>


</body>

</html>