<?php
/**
 * @file specialiste\includes\gestionProduits.php
 * La classe GestionProduits.
 * Cette classe permet de gérer les produits en les récupérant depuis la base de donées. Ces produits seront ensuite affichés dans la page principale avec une limitation de 3 produits, et dans la page dédié aux produits.  
 * Elle permet aussi de recupérer les informations de chacun de ces produits. Ces informations seront ensuite affiché dans la page de détails associé au produit. 
 * @author FEGHOUL Celina
 */
include_once "db.php";
//Création d'une classe produits 
class GestionProduits extends DataBase{
    /**
     * Recupérer les 3 premiers produits.
     * La méthode getProduit execute une requete sql simple qui va permettre de récuperer que les 3 premiers tuples existants dans la table produits.
     * @return array Un tableau qu'on a appelé produits sera retourné, contenant les information sur les 3 premiers produits 
     * 
     * Recupérer tous les produits.
     * La méthode getToutProduits execute une requete sql simple qui va permettre de récuperer tous les tuples existants dans la table produits.
     * @return array Un tableau qu'on a appelé produits sera retourné, contenant les information sur tous les produits 
     * 
     * Recupérer les informations des produits 
     * La méthode getInfosProduit execute une requete sql de jointure qui va permettre de récuperer tous les tuples existants dans la table information_produit ainsi que dans la table produits.
     * @param string $id_produit l'identifiant du produit dont je veux récuperer les informations.
     * @return array Un tableau qu'on a appelé details_produit sera retourné, contenant les informations des informations du produit.
     */
    public function getProduit(){
        $produits = array();
        
        $requete_produit = $this->conn->prepare("SELECT * FROM produits LIMIT 3");//preparer la requete
        $requete_produit->execute();// executer la requete
        $requete_produit->bind_result($id_produit,$nom_produit,$img_produit,$prix_produit,$categorie_produit,$id_information);

        while($requete_produit->fetch()){
            $produits[] = array(
                'id_produit'=>$id_produit,
                'nom_produit'=>$nom_produit,
                'img_produit'=>$img_produit,
                'prix_produit'=>$prix_produit,
                'categorie_produit'=>$categorie_produit,
                'id_information'=>$id_information,
            );
        }
        $requete_produit->close();
        return $produits;

    }

    //La méthode getToutLesProduits va nous permettre d'afficher tous les produits qui existent dans la base de données
    public function getToutProduits(){
        $requete_tout_produit = $this->conn->prepare("SELECT * FROM produits");
        $requete_tout_produit->execute();
        $resutat_requete_tout_produit = $requete_tout_produit->get_result();
        
        $produits = array();
        while($resultat = $resutat_requete_tout_produit->fetch_assoc()){
            $produits[] = $resultat;
        }
        $requete_tout_produit->close();
        return $produits;
    }

    //Création d'une méthode qui va nous permettre de retourner les informations du produit
    public function getInfosProduit($id_produit){
        $requete_infos_produit = $this->conn->prepare("SELECT p.*,i.* FROM produits p JOIN information_produit i ON p.id_information = i.id_information WHERE p.id_produit = ?");
        $requete_infos_produit->bind_param("s",$id_produit);
        $requete_infos_produit->execute();
        $resultat_infos_produit = $requete_infos_produit->get_result();
        $details_produit = $resultat_infos_produit->fetch_assoc();
        $requete_infos_produit->close();
        return $details_produit;
    }
}

?>