<?php 

/**
 * @file SALAMATY/detail.php.
 * Ce script représente la page de détails des produits.
 *
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */



session_start();
require_once('includes/product.php');
//Création d'une instance de la calsse GestionProduits
$ProductObj = new Product();
//récupérer l'id du produit avec la methode GET
$id_produit = $_GET['id_produit'];
//On fait appel à la méthode getInfosPorduit($id_produit)
$detailsProduit = $ProductObj->getInfosProduit($id_produit);
// Vérifier si le produit existe

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="header">

<div class="flex">

   <a href="home.php" class="logo">SALAMATY<span>!</span></a>

   <nav class="navbar">
      <a href="home.php">Acceuil</a>
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
  <h1 class="title">Détails</h1>
  <div class="box-container">
    <div class="box">
    <img src="images/<?php echo $detailsProduit['img_produit'];?>" alt="#">
    <h3><?php echo $detailsProduit['nom_produit'];?></h3>
    <h3>prix: <?php echo $detailsProduit['prix_produit'];?> DA</h3>
    <h4>Calories: <?php echo $detailsProduit['calories'];?>g</h4>
    <h4>Sucre: <?php echo $detailsProduit['sucre'];?> g</h4>
    <h4>Protéines: <?php echo $detailsProduit['protéines'];?></h4>
    <h4>Glucides: <?php echo $detailsProduit['glucides'];?></h4>
    <h4>Lipides: <?php echo $detailsProduit['lipides'];?></h4>
    <h4>Graisse saturés: <?php echo $detailsProduit['graisse_saturés'];?></h4>
    <h4>Sel: <?php echo $detailsProduit['sel'];?></h4>

    </div>

  </div>

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