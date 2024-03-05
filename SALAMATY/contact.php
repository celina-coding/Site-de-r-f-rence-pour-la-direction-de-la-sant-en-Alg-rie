<?php

/**
 * @file SALAMATY/contact.php.
 * Ce script représente la page d'ajout du siganlement dans l'espace utilisateur.
 *
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */

session_start();
require_once('includes/signalement.php');

$SignalementObj = new Signalement();
//Vérifier si le bouton envoyer à été cliqué
if(isset($_SESSION['id_user'])){
    if(isset($_POST['send'])){
        $id_produit = $_POST['id_produit'];
        $wilaya = $_POST['wilaya'];
        $degre = $_POST['degre_severite'];
        $date = $_POST['date'];
        $details = $_POST['msg'];
        $id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user']: null;
        //On appel la méthode qui ajoute le signalement
        if($SignalementObj->addSignalement($id_produit,$wilaya,$degre,$date,$details,$id_user)){
            echo 'Signalement ajouté avec succés';
        }else{
            echo 'Un probléme s\'est produit lors de l\'ajout du signalement';
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>	Signalement</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   

<section class="contact">

   <h1 class="title">Signalement</h1>

   <form action="" method="POST">
    <input type="text" name="id_produit" id="id_produit" class="box" required placeholder="L'identifiant du produit à signaler....">
    <input type="text" name="wilaya" id="wilaya" class="box" required placeholder="Votre wilaya....">

    <div>
        <label for="degre_severite">Degré de sévérité</label>
        <select name="degre_severite" id="degre_severite" class="box">
            <option value="1">Faible</option>
            <option value="2">Moyen</option>
            <option value="3">Élevé</option>
        </select>
    </div>

    <div>
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="box" required>
    </div>

    <textarea name="msg" class="box" required placeholder="Plus de détails ..." cols="30" rows="10"></textarea>

    <input type="submit" value="Envoyer" class="btn btn-send" name="send">
</form>


</section>

<script src="js/script.js"></script>

</body>
</html>