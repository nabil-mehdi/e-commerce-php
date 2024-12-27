<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Modifier Produit</title>
</head>

<body>
    <div class="container py-2"><!-- py-2 py pour padding est -2 la valeur-->
        <?php include '../e-commerce/nav.php' ?>
        <?php

        include '../e-commerce/data.php';
        $SqlState = $pdo->prepare("SELECT *from produit where id=?");
        $id = $_GET['id'];
        $SqlState->execute([$id]);
        $produit = $SqlState->fetch(PDO::FETCH_ASSOC);




        if (isset($_POST['Modifierpro'])) {

            $libelle = $_POST['libelle'];
            $categorie = $_POST['categorie'];
            $prix = $_POST['prix'];
            $desc = $_POST['desc'];
            $filename = 'produit.png';
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image; // uniqid() donne un valeur au nom du fichier par default
                move_uploaded_file($_FILES['image']['tmp_name'], '../e-commerce/frontend/telechargement/' . $filename); //pour deplacer le fichier ver un dossier
            }
            if (!empty($libelle) && $categorie != 0 && !empty($prix)) {
                if (!empty($filename)) {
                    $SqlState = $pdo->prepare("UPDATE produit SET libelle = ?, id_categorie= ?,prix=?,image=?,description=? WHERE id = ?");
                    $SqlState->execute([$libelle, $categorie, $prix, $filename, $desc, $id]);
                    header('location:afficherproduit.php');
                } else {
                    $SqlState = $pdo->prepare("UPDATE produit SET libelle = ?, id_categorie= ?,prix=?,description=? WHERE id = ?");
                    $SqlState->execute([$libelle, $categorie, $prix,  $desc, $id]);
                    header('location:afficherproduit.php');
                }
            }
        }

        ?>



        <?php require_once '../e-commerce/data.php' ?>

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Libelle</label>
                <input type="text" name="libelle" class="form-control" value="<?php echo $produit['libelle'] ?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix</label>
                <input type="number" name="prix" class="form-control" value="<?php echo $produit['prix'] ?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" value="<?php echo $produit['image'] ?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="desc" class="form-control" cols="30" rows="10"><?php echo $produit['description'] ?></textarea>
            </div>

            <div class=" mb-3">
                <?php
                $SqlState = $pdo->prepare("SELECT * FROM categorie");
                $SqlState->execute();
                $categorie = $SqlState->fetchAll(PDO::FETCH_ASSOC);



                ?>

                <select name="categorie" id="" class="form-control">
                    <option value="0">Choisir categorie</option>


                    <?php
                    foreach ($categorie as $categories) {
                        if ($produit['id_categorie'] == $categories['id']) {
                            echo " <option selected value= " . $categories['id'] . ">" . $categories['libelle'] . "</option>";
                        } else {
                            echo " <option  value= " . $categories['id'] . ">" . $categories['libelle'] . "</option>";
                        }
                    }


                    ?>
                </select>


            </div>

            <button type="submit" name="Modifierpro" class="btn btn-primary">Modifier produit</button>
        </form>


    </div>
</body>

</html>