<?php 
/**
 * @file direction/includes/direction.php
 * class Direction.
 * class Direction gére la connexion de l'utilisateur direction en vérifiant le nom d'utilisateur et le mot de passe 
 * @author FEGHOUL Celina.
 */
require_once "db.php";

class Direction extends DataBasee{
    /**
     * La méthode loginCheckDirection Vérifie la connexion d'un utilisateur direction.
     * @param string $nom_direction nom de l'utilisateur direction.
     * @param string $mdp_direction mot de passe de l'utilisateur direction.
     * @return bool Retourne true dans le cas ou la connexion est réussie, sinon false.
     */
    public function loginCheckDirection($nom_direction,$mdp_direction){
         //on prépare la requete sql pour eviter toute injection sql
        $requete = $this->conn->prepare("SELECT * FROM direction WHERE nom_direction = ?");
        // on lie les valeurs des parametres a la requete sql 
        $requete->bind_param("s",$nom_direction);
        // on execute la requete 
        $requete->execute();
        // on récupére le resultat
        $result = $requete->get_result();
        if ($result->num_rows > 0) {
            // Récupérer les informations de la direction
            $directionData =  $result->fetch_assoc();
             // Vérifier si le mot de passe fourni correspond au mot de passe haché dans la base de données
             if (password_verify($mdp_direction, $directionData['mdp_direction'])) {
                // Démarrer la session
                session_start();
                //stocker les informations de la direction dans la session
                $_SESSION['id_direction'] = $directionData['id_direction'];
                $_SESSION['nom_direction'] = $directionData['nom_direction'];
                
                return true;
            }else{
                return false;
            }
        } else{
            return false;
        }
        $requete->close(); // On ferme la requête 
        $this->conn->close(); // On ferme la connexion à la BD
    }
}





?>