<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="/e-commerce/css/quantite.css">
    <title>Produit</title>
</head>

<body>
    <?php
    session_start();
    include 'C:\xampp\htdocs\e-commerce/data.php';
    include 'C:\xampp\htdocs\e-commerce/frontend/frontnav.php';
    $id = $_GET['id'];
    $SqlState = $pdo->prepare('SELECT * From categorie where id=?');
    $SqlState->execute([$id]);
    $categorie = $SqlState->fetchAll(PDO::FETCH_ASSOC);

    $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id_categorie=?");
    $sqlState->execute([$id]);
    $produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);


    ?>



    <div class="container py-4">
        <h4><?php
       
        foreach ($categorie as $cat) {?>
             <?php   echo $cat['libelle'];?>
           <i class=" <?php   echo $cat['icone'];?>"></i>
           
           
                <?php } ?> 
            
            </h4>
        <div class="container">
            <div class="row">

                <?php foreach ($produits as $value) { 
                    $timestamp = strtotime($value['datecreation']) ;
                    $dateFormat = "d/m/Y";
                     $formattedDate = date($dateFormat, $timestamp);
                    $id_produit= $value['id'];
                  ?> 
                  
                  
                    <div class="card md-3 col-md-3">
                    <img class="img img-fluid m-5 Auto-max" src="../frontend/telechargement/<?php  echo $value['image']?>" alt="nn"> 
                      <a href="detailproduit.php?id=<?php echo $value['id']?> "class="">Affichier details</a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $value['libelle']?></h5>
                        <p class="card-text"><?php echo $value['prix']?> DH</p>
                        <p class="card-text"><small class="text-muted"><?php echo $formattedDate?></small></p>
                      </div>
                      <div class="card-footer">
             
<?php  include 'C:\xampp\htdocs\e-commerce\frontend/panierqty.php'?>
             
               </div>
                  </div>
 

             

  
            
  











                <?php
                
                }
                if(empty($produits)){?>
<div class="alert alert-primary" role="alert">
                   Produit non disponible
                </div>
                <?php   }
                ?>

            </div>

        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/e-commerce/javascript/quantite.js"></script>
</body>

</html>