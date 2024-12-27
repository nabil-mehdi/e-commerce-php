<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <?php include '../e-commerce/nav.php';


    if (!isset($_SESSION['user'])) { //si utilisateur n'est pas cree va pas ouvrir la page

        header("location:connexion.php");
    }

    ?>
    <div class="container py-2">
        <h1> <?php echo $_SESSION['user']['nom'] // Affichier le nom ou un attribut  de la session 
                ?></h1>

    </div>
</body>

</html>