<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Modifier categorie</title>
</head>

<body>

    <?php include '../e-commerce/nav.php' ?>
    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <?php
        include '../e-commerce/data.php';
        $SqlState = $pdo->prepare("SELECT *from categorie where id=?");
        $id = $_GET['id'];
        $SqlState->execute([$id]);
        $categorie = $SqlState->fetch(PDO::FETCH_ASSOC);




        if (isset($_POST['Modifiercat'])) {
            $libelle = $_POST['libelle'];
            $desc = $_POST['desc'];
            $icone = $_POST['icone'];

            if (!empty($libelle) && !empty($desc)) {
                $sqlState = $pdo->prepare('UPDATE categorie SET libelle = ?, description= ?,icone=? WHERE id = ? ');
                $sqlState->execute([$libelle, $desc, $icone, $id]);
                header('location:Affichercategorie.php');
            } else echo "erreur";
        }
        ?>




        <form method="post">
            <div class="mb-3">
                <!--input   type="text" name="id" class="form-control" value="<?php //echo $categorie['id'] 
                                                                                ?>"-->
                <label for="exampleInputEmail1" class="form-label">Libelle</label>
                <input type="text" name="libelle" class="form-control" value="<?php echo $categorie['libelle'] ?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea name="desc" class="form-control" cols="30" rows="10"><?php echo $categorie['description'] ?></textarea>
            </div>
            <div class="mb-3">
              
                <label for="exampleInputEmail1" class="form-label">Icone</label>
               <input type="text" name="icone" class="form-control" value="<?php echo $categorie['icone'] ?>">
    </div>
               <button type="submit" name="Modifiercat" class="btn btn-primary">Modifier categorie</button>
        </form>


    </div>


</body>

</html>