<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ajouter Utilisateur</title>
</head>

<body>

    <?php include '../e-commerce/nav.php' ?>
    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <?php


        if (isset($_POST['ajouter'])) {
            $nom = $_POST['nom'];
            $motpass = $_POST['motpass'];
            if (!empty($nom) && !empty($motpass)) {
                require_once '../e-commerce/data.php';
                $date = date(format: ('Y-m-d'));
                $SqlState = $pdo->prepare("INSERT INTO utilisateur VALUES (null,?,?,?)");
                $SqlState->execute([$nom, $motpass, $date]);
                header("location:connexion.php");
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
                <label for="exampleInputEmail1" class="form-label">Identifiant</label>
                <input type="text" name="nom" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="motpass" class="form-control">
            </div>

            <button type="submit" name="ajouter" class="btn btn-primary">Ajouter Utilisateur</button>
        </form>


    </div>


</body>

</html>