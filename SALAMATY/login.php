<?php

/**
 * @file SALAMATY/login.php.
 * Ce script représente la page de connexion de l'utilisateur.
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
   <title>login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/components.css">

</head>
<body>


   
<section class="form-container">

   <form action="includes/userLogin.php" method="POST">
      <h3>Se connecter</h3>
  
     
      <label for="email">Email :</label>
      <input type="email" name="email" id="email" class="box" placeholder="Votre email" required>
  
     
      <label for="pass">Mot de passe :</label>
      <input type="password" name="pass" id="pass" class="box" placeholder="Votre mot de passe" required>
  
     
      <input type="submit" value="Se connecter" class="btn btn-send" name="submit">
  
      
      <p>Vous n'avez pas de compte? <a href="register.php">S'inscrire</a></p>
  </form>
  
</section>


</body>
</html>