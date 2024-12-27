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
   

        if (isset($_POST['Ajouterpro'])) {
            $libelle = $_POST['libelle'];
            $categoriee = $_POST['categorie'];
            $prix = $_POST['prix'];
            $desc = $_POST['desc'];

            $filename = 'produit.png';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], '../e-commerce/frontend/telechargement/' . $filename);
        }
           
            if (!empty($libelle) && $categoriee != 0 && !empty($prix) && !empty($desc)) {

                require_once '../e-commerce/data.php';


                $SqlState = $pdo->prepare("INSERT INTO produit(libelle,prix,id_categorie,image,description) VALUES (?,?,?,?,?)");
                $SqlState->execute([$libelle, $prix, $categoriee,$filename,$desc]);
        ?>
                <div class="alert alert-success" role="alert">
                    le produit <?php echo $libelle ?> est ajouter avec succes
                </div>
                
            <?php echo $filename;
            } else { ?>
                <div class="alert alert-danger" role="alert">
                    Veuiller saisir les champs
                </div>
        <?php


            }
        }

        ?>


        <?php require_once '../e-commerce/data.php' ?>

        <form method="post"  enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Libelle</label>
                <input type="text" name="libelle" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix</label>
                <input type="number" name="prix" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
               <textarea name="desc" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <?php
            $SqlState = $pdo->prepare("SELECT * FROM categorie");
            $SqlState->execute();
            $categorie = $SqlState->fetchAll(PDO::FETCH_ASSOC);



            ?>
            <div class="mb-3">

                <select name="categorie" id="" class="form-control">
                    <option value="0">Choisir categorie</option>


                    <?php
                    foreach ($categorie as $categories) {
                        echo " <option value=" . $categories['id'] . ">" . $categories['libelle'] . "</option>";
                    }




                    ?>
                </select>


            </div>

            <button type="submit" name="Ajouterpro" class="btn btn-primary">Ajouter produit</button>
        </form>


    </div>