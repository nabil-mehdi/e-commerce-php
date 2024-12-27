<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/e-commerce/css/quantite.css">
   
 

    <title>Details Produit</title>
</head>

<body>
<?php 
session_start();
include 'C:\xampp\htdocs\e-commerce/data.php';
    include 'C:\xampp\htdocs\e-commerce/frontend/frontnav.php';
    $id = $_GET['id'];
    $SqlState = $pdo->prepare('SELECT * From produit where id=?');
    $SqlState->execute([$id]);
    $produit = $SqlState->fetchAll(PDO::FETCH_ASSOC);

   

    ?>


    <div class="container py-1">
        <div class="row">
        <div class="col-md-6">
        <?php foreach ($produit as $value) { ?>
        <img class="img img-fluid w-75" src="../frontend/telechargement/<?php  echo $value['image']?>" alt="<?php  echo $value['libelle']?>"> 



        </div>
        <div class="col-md-6 " style=" padding:7px">
        
            <h1><?php  echo $value['libelle']?></h1>
           <hr>
       
        <p><?php  echo $value['description']?></p>
        <hr>
        <?php  
        
        $id_produit=$value['id'];
        include 'C:\xampp\htdocs\e-commerce\frontend/panierqty.php'?>

<hr>
      
    </div>
      
        </div>
       
    </div>
<?php }


?>
<script src="/e-commerce/javascript/quantite.js"></script>
</body>

</html>