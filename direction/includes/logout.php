<?php
/**
 * 
 * @file direction/includes/logout.php
 * Déconnection de l'utilisateur spécialiste.
 * 
 * Ce bout de code permet de déconnecter un utilisateur direction en détruisant la session et en redirigeant cet utlisateur vers la page de connexion.
 * @author FEGHOUL Celina.
 */

// une fois la direction se déconnecte, sa session va etre détruite
session_start();
session_destroy();
header("Location: login.php");
exit();// terminer le script ici

?>