<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Liste commande</title>
</head>
<body>


    <?php include '../e-commerce/nav.php' ?>

    <?php include '../e-commerce/data.php';
    $id = $_GET['id'];

    $SqlState = $pdo->prepare("SELECT detail_commande.*, produit.libelle as 'Produit' ,produit.image as 'Image' FROM detail_commande INNER JOIN produit ON produit.id = detail_commande.id_produit WHERE id_commande = ?");
    $SqlState->execute([$id]);
    $detail_commande = $SqlState->fetchAll(PDO::FETCH_ASSOC);


    ?>


    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <h1> Detail Commande</h1>
        <table class="table table-striped">
            <tr>

                <th>Produit</th>
                <th>Image</th>
                <th>Qantité</th>
                <th>Prix</th>
                <th>Total</th>


            </tr>
            <?php foreach ($detail_commande as $value) { ?>
                <tr>

                    <td><?php echo $value['Produit'] ?></td>
                    <td> <img width="80px" src="../e-commerce/frontend/telechargement/<?php echo $value['Image'] ?>" alt=""></td>
                    <td><?php echo $value['qty'] ?></td>
                    <td><?php echo $value['prix'] ?>DH</td>
                    <td><?php echo $value['total'] ?></td>

                </tr>
            <?php

            } ?>

        </table>



    </div>

</body>

</html>