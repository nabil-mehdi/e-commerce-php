<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Panier</title>
</head>
<body>

    <?php 
     session_start();
     include 'C:\xampp\htdocs\e-commerce/data.php';
   
  
    include 'C:\xampp\htdocs\e-commerce/frontend/frontnav.php';
  
    $panier =array();
    if (isset($_SESSION['panier'])) {
       
        $panier = $_SESSION['panier'][$id_utilisateur];
        
    }
    $id_utilisateur = $_SESSION['user']['nom']; 
$idProduits = array_keys($panier);
$idProduits = implode(',', $idProduits);
if (!empty($idProduits)) {
    $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
} else {
    $produits = array(); 
}?>
<div class="container">
  <table class="table">
   
                 <thead>
                   
                    <tr>
                        
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>

   <?php 
   $total=0;
   foreach ($produits as $value) { 
    $qty=$panier[$value['id']];
    $prix=$value['prix'] ;
    $totalproduit=$prix*$qty;
    $total+=$totalproduit;
    ?>

                    
                    <td><?php echo $value['id'] ?></td>
                            <td><img width="50px" src="/e-commerce/frontend/telechargement/<?php echo $value['image'] ?>" alt=""></td>
                            <td><?php echo $value['libelle'] ?></td>
                            <td>x<?php echo $qty ?></td>
                            <td><?php echo $prix?> <i class="fa fa-solid "></i>DH</td>
                            <td> <?php echo $totalproduit?> <i class="fa fa-solid "></i>DH</td>
                        </tr>
                    
     </div>

   <?php  }
   
   if(isset($_POST['vider'])){
     $_SESSION['panier'][$id_utilisateur]=[];
     header("location:Panier.php");

   }

   if(isset($_POST['valider'])){
    if($total==0){
        echo "<script>alert('Veuillez remplir le panier');</script>";

    }else{
    $prix_pro=[];
  foreach($produits as $produit){
$idpro=$produit['id'];
$qty=$panier[$idpro];
$prix=$produit['prix'];

$prix_pro[$idpro]=['id'=>$idpro,'prix'=>$prix,'qty'=>$qty,'total'=>$prix*$qty];
}
 
        
       $sqlStateCommande = $pdo->prepare('INSERT INTO commande(total) VALUES(?)');
        $sqlStateCommande->execute([ $total]);
        $id_commande=$pdo->LastInsertId();
   
        foreach ($prix_pro as $produit) { 
            var_dump($produit['prix']);
$sqlStatecm = $pdo->prepare('INSERT INTO detail_commande(id_commande,id_produit,prix,qty,total) VALUES(?,?,?,?,?)');
       $sqlStatecm->execute([$id_commande,$produit['id'],$produit['prix'],$produit['qty'],$produit['total']]);
        }

       
        $_SESSION['panier'][$id_utilisateur]=[];
        header("location:Panier.php");
        
    }
    
   }
  
   
   
   ?>
   <tfoot>
                    <tr>
                        <td colspan="6" align="right"><strong>Total</strong></td>
                        <td><?php ?> <i class="fa fa-solid "></i> <?php echo $total ?> DH</td>
                    </tr>  
                    <tr>
                        <td colspan="7" align="right">
                            <form method="post">
                            <input type="submit" value="Valider la commande" name="valider" class="btn btn-success">
                                <input name="vider" onclick="return confirm('Vous voullez vraiment supprimer le panier')" type="submit" value="Vider"  class="btn btn-danger">
                                
                            </form>
                        </td>
                        
                    </tr>  
   </tfoot>  
    
    <div class="container py-1">
    <h4> Panier(<?php  echo $productCount?>)</h4>
    <?php if(empty($panier)){?>
        <div class="alert alert-primary" role="alert">
                  votre panier est vide
                </div>
                <?php  }
                ?>
</div>
</body>
</html>