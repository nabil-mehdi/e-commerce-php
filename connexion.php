<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>

    <?php include '../e-commerce/nav.php' ?>
    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <?php


        if (isset($_POST['connexion'])) {
            $login = $_POST['login'];
            $motpass = $_POST['motpass'];
            if (!empty($login) && !empty($motpass)) {

                require_once '../e-commerce/data.php';

                $SqlState = $pdo->prepare("SELECT * FROM utilisateur WHERE nom=? AND motpass=?");
                $SqlState->execute([$login, $motpass]);
                if ($SqlState->rowCount() >= 1) {

                    $_SESSION['user'] = $SqlState->fetch(); // fetch renvoi les donnés
                    header("location:Admin.php");
                } else { ?> <div class="alert alert-danger" role="alert">
                        nom ou le mot passe incorrect
                    </div> <?php
                        }
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
                <input type="text" name="login" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="motpass" class="form-control">
            </div>

            <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        </form>


    </div>


</body>

</html>