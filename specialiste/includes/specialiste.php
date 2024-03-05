<?php
/**
 * @file specialiste/includes/specialiste.php
 * class SpecialisteLogin gére la connexion des spécialistes en vérifiant le nom d'utilisateur et le mot de passe 
 * @author FEGHOUL Celina.
 */
require_once "db.php";

class SpecialisteLogin extends DataBase{
    /**
     * Vérifie la connexion d'un utilisateur spécialiste.
     * @param string $username Le nom de l'utilisateur spécialiste.
     * @param string $password Le mot de passe de l'utilisateur spécialiste.
     * @return bool Retourne true si la connexion est réussi sinon elle retoune false.
     */

    public function loginCheck($username,$password){
        //on prépare la requete sql pour eviter toute injection sql
        $requete = $this->conn->prepare("SELECT * FROM specialiste WHERE nom_specialiste = ?");
        // on lie les valeurs des parametres a la requete sql 
        $requete->bind_param("s",$username);
        // on execute la requete 
        $requete->execute();
        // on récupére le resultat
        $result = $requete->get_result();
        if ($result->num_rows > 0) {
            // Récupérer les informations du spécialiste
            $specialisteData = $result->fetch_assoc();
            // Vérifier si le mot de passe fourni correspond au mot de passe haché dans la base de données
            if (password_verify($password, $specialisteData['mdp_specialiste'])) {
                // Démarrer la session
                session_start();

                // Stoker les informations du spécialiste dans la session
                $_SESSION['specialiste_id'] = $specialisteData['specialiste_id'];
                $_SESSION['nom_specialiste'] = $specialisteData['nom_specialiste'];

                // Connection réussie dans le cas où la requête SQL retourne un résultat
                return true;
            }else{
                // Dans le cas où au moins un identifiant ne correspondent pas la methode retourne false
                return false;
            }
        } else {
            // Dans le cas où le nom d'utilisateur n'est pas trouvé la methode doit retourner false
            return false;
        }
        $requete->close(); // On ferme la requête 
        $this->conn->close(); // On ferme la connexion à la BD
        //connection echouée
        return false;
    }
}

?>