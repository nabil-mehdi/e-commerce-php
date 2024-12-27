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
    $SqlState = null;

    if (isset($_GET['search'])) {
        // Search query is provided
        $search = '%' . $_GET['search'] . '%';



        // Prepare and execute the SQL query with search
        $SqlState = $pdo->prepare("SELECT * FROM commande WHERE id like?");
        $SqlState->execute([$search]);
        $commande = $SqlState->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // No search query provided, display all orders
        $SqlState = $pdo->prepare("SELECT * FROM commande");
        $SqlState->execute();
        $commande = $SqlState->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>



    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <h1> Liste Commande</h1>
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Tapez le ID" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Recherche</button>
            </div>
        </form>
        <table class="table table-striped">
            <tr>
                <th>#ID</th>
                <th>Total</th>
                <th>Date</th>
                <th></th>


            </tr>
            <?php foreach ($commande as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['total'] ?> DH</td>
                    <td><?php echo $value['date'] ?></td>
                    <td><a class="btn btn-primary btn-sm" href="Afficher_commande.php?id=<?php echo $value['id'] ?>">Afficher Commande</a></td>
                </tr>
            <?php

            } ?>

        </table>



    </div>

</body>

</html>