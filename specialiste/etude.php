<?php
/**
 *  @file specialiste/etude.php
 * Ce script représente la page qui permet au spécialiste d'ajouter une étude.
 *
 * @author FEGHOUL Celina
 */
session_start();
if(!isset($_SESSION["specialiste_id"])){
  header("Location: login.php");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etude</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&family=Public+Sans:wght@300;400&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="background-color: #E1EBEE;">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" >
  <div class="container-fluid">
  <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#" style="margin-left: 15px;">SALAMATY<span style="color: green;margin-left: 5px ;">!</span></a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">Acceuil</a></li>
        <li class="nav-item"><a class="nav-link active" href="produits.php">Produits</a></li>
        <li class="nav-item"><a class="nav-link active" href="signalement.php">Voir signalements</a></li>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="etude.php">Etude</a></li>
      </ul>
      <div class="d-flex">
        <form method="post" action="includes/logout.php">
          <button type='submit' class='btn btn-outline-dark shadow-none me-lg-2 me-3'>Se déconnecter</button>
        </form>
        </div>
       </div>
     </div>
   </nav>
<h2 class="mt-5 text-center mb-4 fw-bold h-font">Faites votre étude</h2>
<div class="container mt-5 d-flex align-items-center justify-content-center">
    <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 30rem;">
    <div class="card-body">
        <form method="post" action="includes/gestionEtude.php">
        <div class="form-group">
            <label for="titre">Titre de l'étude</label>
            <input type="text" class="form-control mb-3 shadow-none" id="titre" name="titre" placeholder="Entrer le titre ..." required="required">
        </div>
        <div class="form-group">
            <label for="identifiant">Identifiant du produit</label>
            <input type="text" class="form-control mb-3 shadow-none" id="identifiant" name="identifiant" placeholder="Entrer l'identifiant du produit ..." required="required">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control mb-3 shadow-none" id="description" name="description"rows="6" placeholder="Entrer votre description ..."></textarea>
            </div>
        <div class="form-group">
            <label for="conclusion">Conclusion</label>
            <textarea class="form-control mb-3 shadow-none" id="conclusion" name="conclusion" rows="4" placeholder="Entrer votre conclusion ..."></textarea>
            </div>
        <button type="submit" class="btn mt-3 w-100" style="background-color: #27ae60; color:white;">Ajouter l'étude</button>
        </form>
    </div>
    </div>

</div>




<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<footer class="bg-light">
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-lg-4 p-4">
        <h3 class="h-font fw-bold fs-3 mb-3">Liens</h3>
        <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3" > <i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Acceuil</a><br>
        <a href="produits.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"><i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Produits</a><br>
        <a href="signalement.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"><i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Voir signalements</a><br>
        <a href="etude.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"><i class="bi bi-chevron-compact-right"style="color: #27ae60;"></i> Etude</a><br>
      </div>

      <div class="col-lg-4 p-4">
      <h3>Infos contact</h3>
         <p> <i class="bi bi-telephone" style="color: #27ae60;"></i> +213-771-127-516 </p>
         <p> <i class="bi bi-telephone" style="color: #27ae60;"></i> +213-659-167-307 </p>
         <p> <i class="bi bi-envelope-fill" style="color: #27ae60;"></i> salamaty@gmail.gov.dz </p>
         <p> <i class="bi bi-geo-alt-fill" style="color: #27ae60;"></i> Algerie - 15000 </p>
      </div>

      <div class="col-lg-4 p-4">
      <h3>Suivez nous</h3>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-facebook" style="color: #27ae60;"></i> facebook </a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-twitter" style="color: #27ae60;"></i> twitter </a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-instagram" style="color: #27ae60;"></i> instagram </a><br>
         <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3"> <i class="bi bi-linkedin" style="color: #27ae60;"></i> linkedin </a><br>
      </div>


    </div>

  </div>

</footer>   

</body>
</html>

