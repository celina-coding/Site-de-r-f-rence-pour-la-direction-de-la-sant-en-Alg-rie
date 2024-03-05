<?php

/**
 * @file SALAMATY/includes/signalement.php
 * 
 * class Signalement
 * Cette classe permet à l'utilisateur d'ajouter un signalement à la base de données.Ces signalements seront ensuite affichés pour le spécialiste et la direction de la santé algérienne. 
 * @author FEGHOUL Celina.
 */


include_once('db.php');

class Signalement extends DataBase{

    /**
     * Ajouter un signalment
     * La méthode addSignalement éxecute une requete SQL d'insertion.
     * @param string $id_produit l'identifiant du produit a signaler.
     * @param string $wilaya la wilaya de l'utilisateur qui a signalé le produit.
     * @param int $degre le degré de sévérité.
     * @param string $date la date ou ce signalement à été effectué.
     * @param string $details les détails qui permetteront de comprendre pourquoi l'utilisateur a signalé ce produit.
     * @param int $id_user l'identifiant de l'utilisateur qui a signalé.
     * 
     * @return bool true dans le cas du succés de l'ajout du signalement, sinon false.
     * 
     * Vérifier l'existance du produit qui a été signalé.
     * La méthode idProdExiste éxecute une requete SQL simple de sélection.
     * @param string $id_produit l'identifiant du produit signalé.
     * @return int $produitExist si le produit existe alors 1 sera retourné sinon 0.
     */


    public function addSignalement($id_produit,$wilaya,$degre,$date,$details,$id_user){
        if($this->idProdExiste($id_produit)){
            $requete = "INSERT INTO signalements (id_produit,wilaya_signalement,degré_de_sévérité, date_signalement,details,id_user) VALUES(?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($requete);
        $stmt->bind_param('ssissi',$id_produit,$wilaya,$degre,$date,$details,$id_user);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }

    }else{
        return false;
    }

        }
        
    //Vérifier l'existance de l'identifiant du produit entré par l'utilisateur
    public function idProdExiste($id_produit){
        $requete = "SELECT * FROM produits WHERE id_produit = ?";
        $stmt = $this->conn->prepare($requete);
        $stmt->bind_param('s',$id_produit);
        $stmt->execute();
        $result = $stmt->get_result();
        $produitExist = $result->num_rows >0;
        $stmt->close();
        
      return $produitExist;
    }
}



?>