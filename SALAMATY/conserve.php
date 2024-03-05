<?php 
/**
 * @file SALAMATY/conserve.php.
 * Ce script représente la page des produits filtrés par la catégorie que l'on va afficher à l'utilisateur.
 *
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */
require_once('includes/product.php');
$ProductObj = new Product();
//Vérifier si la categorie est définie dans l'url 
if(isset($_GET['categorie'])){
   $categorie = $_GET['categorie'];
   $produits = $ProductObj->getProduitParCategorie($categorie);
}else{
   //Si la catégorie n'est pas specifiée alors une errur
   echo 'Catégorie non trouvée';
   exit();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SALAMATY</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   

</head>
<body>

<header class="header">

   <div class="flex">

      <a href="#" class="logo">SALAMATY<span>!</span></a>

      <nav class="navbar">
         <a href="#">Acceuil</a>
         <a href="contact.php">Signalements</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
     
         
        

      <div class="profile">
        

     
       
         <div class="flex-btn">
         <?php 
            //Si l'utilisateur est connécté alors on affiche le boutton se déconnecter
            session_start();
            if(isset($_SESSION['id_user'])){
               //L'utilisateur est connécté
               echo '<a href="logout.php" class="option-btn">Se déconnecter</a>';
            }else{
               echo '<a href="login.php" class="option-btn">Se connecter</a>
                     <a href="register.php" class="option-btn">S\'inscrire</a>';
            }

             ?>
            
         </div>
      </div>

   </div>

</header>
   



<section class="home-category">

   <h1 class="title"><?php echo $categorie; ?></h1>

   <div class="box-container">
<!-- Affichage des produits triés par catégorie dynamiquements -->
      <?php
      foreach($produits as $produit){
         echo '<div class="box">';
         echo '<img src="images/' . $produit['img_produit'] . '" alt="#">';
         echo ' <h3>'.$produit['nom_produit'].'</h3>';
         echo '<h5>'.$produit['id_produit'].'</h5>';
         echo '<p>Prix '.$produit['prix_produit'].' DA</p>';
         echo ' <a href="detail.php?id_produit='.$produit['id_produit'].'" class="btn">Voir plus...</a>';
         echo '</div>';
      }
      ?>

</section>

<script src="js/script.js"></script>

</body>

<footer class="footer">

   <section class="box-container">

      <div class="box">
         <h3> Liens</h3>
         <a href="home.php"> <i class="fas fa-angle-right"></i>Acceuil</a>
         <a href="contact.php"> <i class="fas fa-angle-right"></i> Signalements</a>
       
      </div>

      <div class="box">
         <h3>Extra Liens</h3>
         <a href="login.php"> <i class="fas fa-angle-right"></i> Se connecter</a>
         <a href="register.php"> <i class="fas fa-angle-right"></i>S'inscrire</a>
      </div>

      <div class="box">
         <h3>Infos contact</h3>
         <p> <i class="fas fa-phone"></i> +213-771-127-516 </p>
         <p> <i class="fas fa-phone"></i> +213-659-167-307 </p>
         <p> <i class="fas fa-envelope"></i> salamaty@gmail.gov.dz </p>
         <p> <i class="fas fa-map-marker-alt"></i> Algerie - 15000 </p>
      </div>

      <div class="box">
         <h3>Suivez nous</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
      </div>

   </section>

   

</footer>
</html>