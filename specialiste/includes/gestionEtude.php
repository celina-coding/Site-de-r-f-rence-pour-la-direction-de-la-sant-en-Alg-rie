<?php 
/**
 * @file specialiste/includes/gestionEtude.php
 * class GestionEtude
 * Cette classe permet de gérer les études effectuées par le spécialiste en les ajoutants a la base de données dans le cas ou le produit existe.
 */
@session_start();
include_once("db.php");
class GestionEtude extends DataBase{
    /**
     * La methode ajoutEtude execute une requet SQL simple qui permet d'ajouter l'étude a la base de données.
     * @param string $id_produit l'identifiant du produit concérné par l'étude.
     * @param string $titre_etude le titre de l'étude.
     * @param string $description_etude la déscription de l'étude.
     * @param string $conclusion_etude la conclusion de l'étude.
     * @param int $id_specialiste l'identifiant du spécialiste qui va ajouter l'étude.
     * @return bool Retourne true si l'étude est ajoutée, sinon flase.
     * 
     * La méthode verifierExistanceId execute une requete SQL simple qui permet de selectionner l'identifiant du produit concérné par l'étude.
     * @param string $id_produit l'identifiant du produit concérné par l'étude.
     * @return bool Retourne true si l'identifiant éxiste, sinon false.
     */

    //Création d'une methode pour l'ajout dynamique a la base de données de l'etude faite par le spécialiste 
    public function ajoutEtude($id_produit,$titre_etude,$description_etude,$conclusion_etude,$id_specialiste){
        $requete_ajout_etude = $this->conn->prepare("INSERT INTO etude (id_produit, titre_etude, description_etude, conclusion_etude,specialiste_id) VALUES(?,?,?,?,?)");// Préparation de la requete d'insertion
        $requete_ajout_etude->bind_param("ssssi",$id_produit,$titre_etude,$description_etude,$conclusion_etude,$id_specialiste);// on associe a chacune des variable le resultat de requete
        if($requete_ajout_etude->execute()){
            $requete_ajout_etude->close();
            return true;
        }else{
            return false;
        }
    
    } 

    // methode qui verifie l'existance de l'identifiant dans la base de donnée(on ne peux pas faire une étude d'un produit qui n'existe pas dans la base de données)    
    public function verifierExistanceId($id_produit){
        $requete_verification = $this->conn->prepare("SELECT id_produit FROM produits where id_produit=? ");//preparer la requte
        $requete_verification->bind_param("s",$id_produit);//relier le resulat a la variable id_produit
        $requete_verification->execute();//execution de la requete 
        $resultat_requete_verification = $requete_verification->get_result();
        //si le resulat nous retourne une ligne ou plus alors le produit exite dans la base de donnée sinon il n'existe pas 
        if($resultat_requete_verification->num_rows>0){
            $requete_verification->close();// fermer l'execution de la requete
            return true;
        }else{
            $requete_verification->close();// fermer l'execution de la requete
            return false;
        }
    }

}

// verifier si le formulaire a été bien soumis par le spécialiste
if($_SERVER["REQUEST_METHOD"]="POST"){
    $id_produit = $_POST["identifiant"];
    $titre_etude = $_POST["titre"];
    $description_etude = $_POST["description"];
    $conclusion_etude = $_POST["conclusion"];
    $id_specialiste = isset($_SESSION['specialiste_id']) ? $_SESSION['specialiste_id']: null;

    //Création d'une instance de la classe GestionEtude
    $GestionEtude = new GestionEtude();
    //On fait appel a la methode verifierExistanceId pour voir si le produit existe s'il existe dans ce cas alors on ajoute le produit sinon on informe le spécialiste qu'il n'existe pas
    if($GestionEtude->verifierExistanceId($id_produit)){
        if($GestionEtude->ajoutEtude($id_produit,$titre_etude,$description_etude,$conclusion_etude,$id_specialiste)){
            echo "<script>alert('Votre étude a été enregistrée .')</script>";
            header("Location: ../etude.php");
            exit;
        }else{
            echo "<script>alert('Une erreur s''est produite lors de l''ajout de l''etude .')</script>";
            header("Location: ../etude.php");
            exit;
        }

    }else{
        echo "<script>alert(\"L'identifiant que vous avez inséré n'existe pas.\");</script>";
        header("Location: ../etude.php");
        exit;


    }

}



?>