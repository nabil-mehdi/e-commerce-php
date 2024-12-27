<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Ajouter categorie</title>
</head>

<body>

    <?php include '../e-commerce/nav.php' ?>
    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <?php


        if (isset($_POST['Ajoutercat'])) {
            $libelle = $_POST['libelle'];
            $descriptin = $_POST['desc'];
            $icone = $_POST['icone'];
            if (!empty($libelle) && !empty($descriptin)) {

                require_once '../e-commerce/data.php';

                $date = date(format: ('Y-m-d'));
                $SqlState = $pdo->prepare("INSERT INTO categorie VALUES (null,?,?,?,?)");
                $SqlState->execute([$libelle, $descriptin, $date,$icone]);
        ?>
                <div class="alert alert-success" role="alert">
                    la categorie <?php echo $libelle ?> est ajouter avec succes
                </div>
            <?php
            } else { ?>
                <div class="alert alert-danger" role="alert">
                    Veuiller saisir les champs
                </div>
        <?php


            }
        }

        ?>




        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Libelle</label>
                <input type="text" name="libelle" class="form-control">

            </div>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="desc" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Icone</label>
                <input type="text" name="icone" class="form-control">

            </div>

            <button type="submit" name="Ajoutercat" class="btn btn-primary">Ajouter categorie</button>
        </form>


    </div>


</body>

</html>