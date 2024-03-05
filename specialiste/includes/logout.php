<?php
/**
 * @file specialiste/includes/logout.php
 * Déconnection de l'utilisateur spécialiste.
 * 
 * Ce bout de code permet de déconnecter un utilisateur spécialiste en détruisant la session et en redirigeant cet utlisateur vers la page de connexion.
 * @author FEGHOUL Celina.
 */
session_start();
session_destroy();
header("Location: ../login.php");
exit();// terminer le script ici

?>