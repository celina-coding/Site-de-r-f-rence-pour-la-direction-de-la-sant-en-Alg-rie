<?php 

/**
 * @file SALAMATY/home.php.
 * Ce script représente la page d'acceuil dans l'espace utlisateur.
 *
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */


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
   


<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>L'alimentation, un droit fondamental</span>
         <h3>L'alimentation sûre, notre priorité.</h3>
         <p>Nourrir sainement et en toute sécurité, c'est l'engagement du Ministère pour votre bien-être quotidien.</p>
      </div>

   </section>

</div>

<section class="home-category">

   <h1 class="title">Categories</h1>

   <div class="box-container">
   
    <div class="box">
         <img src="images/image6.jpg" alt="">
         <h3>Aliments en conserve</h3>
         <a href="conserve.php?categorie=Conserve" class="btn">Produits laitiers</a>
         <p></p>
         
      </div>

      <div class="box">
         <img src="images/image4.png" alt="">
         <h3>Produits laitiers</h3>
         <p></p>
         <a href="conserve.php?categorie=Produits Laitiers" class="btn">Produits laitiers</a>
      </div>

      <div class="box">
         <img src="images/image5.png" alt="">
         <h3>Boissons</h3>
         <p></p>
         <a href="conserve.php?categorie=Boisson" class="btn">Boissons</a>
      </div>
	  
	  <div class="box">
         <img src="images/image3.png" alt="">
         <h3>Surgeles </h3>
         <p></p>
         <a href="conserve.php?categorie=Surgelés" class="btn">Surgelés </a>
      </div >
	  
	  
	   <div class="box">
         <img src="images/image2.png" alt="">
         <h3>Les pates</h3>
         <p></p>
         <a href="conserve.php?categorie=Pates" class="btn">Les pates </a>
      </div>  

      <div class="box">
         <img src="images/image8.jpg" alt="">
         <h3>Epicerie sale</h3>
         <p></p>
         <a href="conserve.php?categorie=Epicerie salée" class="btn">Epicerie sale</a>
      </div>

      <div class="box">
         <img src="images/image7.jpg" alt="">
         <h3>Epicerie sucree</h3>
         <p></p>
         <a href="conserve.php?categorie=Epicerie Sucrée" class="btn">Epicerie sucree</a>
      </div>
	  
	  
	 
	  
	  
	 
	  
	  
	  
	  
	  
	  <div class="box">
         <img src="images/poulet.png" alt="">
         <h3>Viandes et poissons </h3>
         <p></p>
         <a href="conserve.php?categorie=Poulet et viandes" class="btn">Viandes et poissons</a>
      </div>
	  
	 

   </div>

</section>

<section class="products">

   <h1 class="title"></h1>

   <div class="box-container">
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
         <a href="#"> <i class="fab fa-facebook-f"></i>  facebook </a>
         <a href="#"> <i class="fab fa-twitter"></i>  twitter </a>
         <a href="#"> <i class="fab fa-instagram"></i>  instagram </a>
         <a href="#"> <i class="fab fa-linkedin"></i>  linkedin </a>
      </div>

   </section>

   

</footer>
</html>