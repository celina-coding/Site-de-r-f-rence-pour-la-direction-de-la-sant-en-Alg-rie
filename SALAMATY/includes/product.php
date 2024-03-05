<?php

/**
 * @file SALAMATY/includes/product.php
 * La classe Product.
 * Cette classe permet de gérer les produits filtré par la catégorie en les récupérant depuis la base de donées. Ces produits filtrés seront ensuite affichés une fois l'utilisateur a cliqué sur le produit de la catégorie qu'il veux visualiser.  
 * Elle permet aussi de recupérer les informations de chacun de ces produits. Ces informations seront ensuite affiché dans la page de détails associé au produit. 
 * @author FEGHOUL Celina
 */


include_once('db.php');

class Product extends DataBase{

    /**
     * Recupérer les produits filtrés par catégorie.
     * 
     * La méthode getProduitParCategorie execute une requete sql simple qui va permettre de récuperer tous les tuples existants dans la table produits et ayant une catégorie spécifique.
     * @param string $categorie: la catégorie des produits qu'on veux afficher. 
     * @return array Un tableau qu'on a appelé products sera retourné, contenant le résultat de la requete
     * 
     * Recupérer les informations des produits 
     * La méthode getInfosProduit execute une requete sql de jointure qui va permettre de récuperer tous les tuples existants dans la table information_produit ainsi que dans la table produits.
     * @param string $id_produit l'identifiant du produit dont je veux récuperer les informations.
     * @return array Un tableau qu'on a appelé details_produit sera retourné, contenant les informations des informations du produit.
     */




    public function getProduitParCategorie($categorie){
        $requete = 'SELECT * FROM produits WHERE categorie_produit = ?';
        $stmt = $this->conn->prepare($requete);
        $stmt->bind_param("s",$categorie);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $products;
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