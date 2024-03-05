<?php 
/**
 * @file SALAMATY/logout.php.
 * Déconnection de l'utilisateur.
 * 
 * Ce bout de code permet de déconnecter un utilisateur en détruisant la session et en redirigeant cet utlisateur vers la page d'acceuil.
 *
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */
session_start();
session_destroy();
header('Location: home.php');
exit();

?>