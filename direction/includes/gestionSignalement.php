<?php 
/**
 * @file direction/includes/gestionSignalements.php
 * Class GestionSignalements 
 * 
 * La classe GestionSignalements gère les signalements effectués par les utilisateurs, permettant leur récupération depuis la base de données. Ces signalements sont ensuite disponibles pour affichage aux utilisateurs spécialiste et à la direction.
 * @author FEGHOUL Celina.
 */
include_once 'db.php';

class GestionSignalments extends DataBasee{
     /**
     * Récupérer les signalements des produits.
     * 
     * La méthode getSignalements éxecute une requete de joiture SQL qui va permettre de retourner tous les champs de la table signalements et produits.
     *  
     * @return array Un tableau qu'on a appelé signalements sera retourné, contenant les information sur les signalements ainsi que sur les produits signalés
     */
   public function getSignalements(){
    $requete_signalement = $this->conn->prepare('SELECT s.*,p.*,u.* FROM signalements s 
    JOIN produits p ON p.id_produit = s.id_produit 
    JOIN user u ON s.id_user = u.id_user');
    $requete_signalement->execute();
    $resultat_requete_signalement = $requete_signalement->get_result();
    
    $signalements = array(); // declarer un tableau qui va contenir les resulat de la requete SELECT 
    while($result=$resultat_requete_signalement->fetch_assoc()){
        $signalements[]=$result; // ici le resultat est mis dans un tableau associatif 
    }
    $requete_signalement->close();

    return $signalements;

   }
}

// Créer une instance de la classe Signalement
$GestionSignalments = new GestionSignalments();
// recuperation des signalements en utilisant la methode qu'on a définie getSignalement
$Signalments = $GestionSignalments->getSignalements();

?>