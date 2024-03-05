<?php 
/**
 * @file direction/includes/gestionEtude.php
 * class GestionEtude (qui se situ le dossier direction)..
 * Cette classe permet de gérer les études effectuées par le spécialiste en les récupérant de la base de données, puis ensuite les afficher à la direction.
 * @author FEGHOUL Celina.
 */
include_once("db.php");
class GestionEtude extends DataBasee{
    /**
     * La méthode afficherEtude execute une requet SQL simple qui permet de récuperer tous les tuples existants dans la table etude
     * @return array Un tableau sera retourné, et qui va contenir les information sur l'étude.
     */

    // Création d'une méthode qui va nous permettre d'afficher l'étude 
    public function afficherEtude(){
        $requete_get_etude = $this->conn->prepare("SELECT * FROM etude");
        $requete_get_etude->execute();
        $resultat_requete_get_etude = $requete_get_etude->get_result();
        $etudes = array();
        while($etude = $resultat_requete_get_etude->fetch_assoc()){
            $etudes[] = $etude;
        }
        $requete_get_etude->close();
        return $etudes;
    }

}

?>