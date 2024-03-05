<?php

/**
 * @file SALAMATY/includes/userRegister.php.
 * class userRegister.
 * Cette classe permet d'ajouter un utilisateur à la base de données.
 * @author FEGHOUL Celina.
 */



include_once('db.php');

class userRegister extends DataBase{

    /**
     * Vérifier l'existance de l'email de l'utilisateur.
     * La méthode emailExist execute une requete SQL simple qui permet de retourner le nombre de fois ou l'email fournis par l'utilisateur a été figuré dans la base de données.
     * @param string $email l'email entré par l'utilisateur.
     * @return int $count le nombre de fois ou il a été figuré (0 si aucun utilisateur ne s'est inscit avec ce mail, sinon 1).
     * 
     * Ajouter l'utilisateur à la base de données.
     * La méthode ajoutUser éxecute une requete SQL d'insertion dans le cas ou la méthode emailExist a retourné 0.
     * @param string $name le nom de l'utilisateur.
     * @param string $prenom le prenom de l'utilisateur.
     * @param string $email l'email de l'utilisateur.
     * @param string $telephone le téléphone de l'utilisateur.
     * @param string $pass le mot de passe de l'utilisateur.
     */


       //Avant d'ahouter un utilisateur a la base de données, on vérifie si un utilisateur s'est déja inscrit avec le meme mail
       public function emailExist($email){
        $requete = "SELECT COUNT(*) FROM user WHERE email = ?";//On sélectionne tout les utilisateurs ayant le mail entré par le nouvel utilisateur 
        $stmt = $this->conn->prepare($requete);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->fetch_row()[0];
        $stmt->close();
        return $count;
    }
    public function ajoutUser($name,$prenom,$email,$telephone,$pass){
        // si $count >0 alors on ne doit pas l'ajouter a la base de données
        if($this->emailExist($email)>0){
            echo "<script>alert('Email déja existant.')</script>";
            exit;
        }
        $requete = "INSERT INTO user(nom,prenom,email,telephone,mdp_user)VALUES(?,?,?,?,?)";
        //On prépare la requete pour éviter toute injection SQL
        $stmt = $this->conn->prepare($requete);
        if(!$stmt){
            die("Erreur de préparation de la requête : " . $this->conn->error);
        }
        //On va utiliser htmlspecialchars pour s'assurer de la sécurité et éviter toute injection SQL non voulue
        $name = htmlspecialchars($name);
        $prenom = htmlspecialchars($prenom);
        $email =htmlspecialchars($email);
        $telephone = htmlspecialchars($telephone);
        $pass = password_hash(htmlspecialchars($pass),PASSWORD_DEFAULT);

        // On lie les paramétres
        $stmt->bind_param("sssss",$name,$prenom,$email,$telephone,$pass);
        
        // Exécution de la requete
        if($stmt->execute()){
            echo "Utilisateur ajouté avec succès";
            header("Location: ../home.php");
            exit();
        }else{
                echo "Erreur lors de l'ajout de l'utilisateur : " . $stmt->error;
        }
        //Fermeture de la requete préparée
        $stmt->close();
}
 

}
// Vérification si le bouton submit a été cliqué ou non
if(isset($_POST['submit'])){
    $userRegister = new userRegister();
    $userRegister->ajoutUser($_POST['name'],$_POST['prenom'],$_POST['email'],$_POST['telephone'],$_POST['pass']);
    
}


?>