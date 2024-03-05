<?php

/**
 * @file SALAMATY/register.php.
 * Déconnection de l'utilisateur.
 * 
 *  Ce script représente la page d'inscription de l'utilisateur.
 *
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */

?>


<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>S'inscrire</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/components.css">

</head>
<body>


   
<section class="form-container">

   <form action="includes/userRegister.php" enctype="multipart/form-data" method="POST">
      <h3>Inscription</h3>
  
      
      <label for="name">Nom :</label>
      <input type="text" name="name" id="name" class="box" placeholder="Votre nom.." required>
  
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" class="box" placeholder="Votre prénom.." required>

      <label for="email">email :</label>
      <input type="email" name="email" id="email" class="box" placeholder="Votre mail.." required>
  
      <label for="telephone">Numéro de téléphone :</label>
      <input type="tel" name="telephone" id="telephone" class="box" placeholder="Votre numéro de téléphone" pattern="[05|06|07]{2}[0-9]{8}" maxlength="10" required>
  
    
      <label for="pass">Mot de passe :</label>
      <input type="password" name="pass" id="pass" class="box" placeholder="Mot de passe..." required>
  
  
      <input type="submit" value="S'inscrire" class="btn btn-send" name="submit">
  
     
      <p>Vous êtes déjà inscrit ? <a href="login.html">Se connecter</a></p>
  </form>
  
</section>


</body>
</html>