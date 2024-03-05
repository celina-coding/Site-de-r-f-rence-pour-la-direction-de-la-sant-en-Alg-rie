<?php
/**
 * @file direction/includes/login.php
 * Ce script représente la page de connexion de l'espace de la direction de la santé Algérienne.
 *
 * @author FEGHOUL Celina
 */
include_once "direction.php";
// on vérifie si le formulaire a été bien soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom_direction = $_POST["username"];
    $mdp_direction= $_POST["password"];
    
    $Direction = new Direction();// instancier la classe SpecialisteLogin
    $Direction->loginCheckDirection($nom_direction,$mdp_direction);// on fait appel a la methode loginCheckDirection
    if($Direction){
        header("Location: ../index.php");
        exit();
    }else{
        "<script>alert('identifiants incorrects')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&family=Public+Sans:wght@300;400&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="background-color: #E8F6F3 ;">
<h2 class="mt-5 text-center">Esapce de la direction de la santé Algérienne.</h2>
<div class="container mt-5 d-flex align-items-center justify-content-center">
    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">
        <i class="bi bi-person-circle me-2"></i> Se connecter
        </h5>
        <form method="post" action="login.php">
        <div class="form-group">
            <label for="username">Nom</label>
            <input type="text" class="form-control mb-2 shadow-none" id="username" name="username" placeholder="Entrer votre nom" required="required">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control mb-3 shadow-none" id="password" name="password" placeholder="Entrer votre mot de passe" required="required">
        </div>
        <button type="submit" class="btn mt-3 w-100" style="background-color:#0E6251 ; color:white;">Se connecter</button>
        </form>
    </div>
    </div>

</div>
    
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> 
</body>
</html>