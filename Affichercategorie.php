<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Afficher Categorie</title>
</head>

<body>


    <?php include '../e-commerce/nav.php' ?>

    <?php include '../e-commerce/data.php';

    $SqlState = $pdo->prepare("SELECT *from categorie");
    $SqlState->execute();
    $categorie = $SqlState->fetchAll(PDO::FETCH_ASSOC);


    ?>


    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <h1> Liste Categorie</h1>
        <table class="table table-striped">
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Icone</th>
                <th>Date</th>
                <th></th>
                <th></th>


            </tr>
            <?php foreach ($categorie as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['libelle'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    <td> <i class="<?php echo $value['icone'] ?>"></i> </td>
                    <td><?php echo $value['datecreation'] ?></td>
                    <td><a href="Modifier_categorie.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">Modifier</a></td>
                    <td><a href="supprimer_categorie.php?id=<?php echo $value['id'] ?>"" class=" btn btn-danger" onclick="return confirm('Vraiment supprimer la categorie <?php echo $value['libelle'] ?>')">Supprimer</a></td>



                </tr>
            <?php

            } ?>

        </table>



    </div>

</body>

</html>