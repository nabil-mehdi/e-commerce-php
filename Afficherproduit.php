<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Afficher Produit</title>
</head>

<body>


    <?php include '../e-commerce/nav.php' ?>

    <?php include '../e-commerce/data.php';

    $SqlState = $pdo->prepare("SELECT produit.*,categorie.libelle as 'libeler'  from produit inner join categorie on produit.id_categorie=categorie.id");
    $SqlState->execute();
    $produit = $SqlState->fetchAll(PDO::FETCH_ASSOC);
   

    ?>


    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <h1> Liste Produit</h1>
        <table class="table table-striped">
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Image</th>
                <th>Description</th>
                <th>Date</th>
                <th></th>
                <th></th>



            </tr>
            <?php 
            foreach ($produit as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['libelle'] ?></td>
                    <td><?php echo $value['prix'] ?>DH</td>
                    <td><?php echo $value['libeler'] ?></td>
                    <td><img width="80px" src="../e-commerce/frontend/telechargement/<?php echo $value['image'] ?>" alt=""> </td>
                    <td><?php echo $value['description'] ?></td>
                    <td><?php echo $value['datecreation'] ?></td>
                    <td><a href="Modifier_produit.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">Modifier</a></td>
                    <td><a href="supprimer_produit.php?id=<?php echo $value['id'] ?>" class=" btn btn-danger" onclick="return confirm('Vraiment supprimer le produit <?php echo $value['libelle'] ?>')">Supprimer</a></td>

                </tr>
            <?php

            } ?>

        </table>



    </div>

</body>

</html>