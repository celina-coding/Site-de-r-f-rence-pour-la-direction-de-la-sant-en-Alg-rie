<?php

/**
 * @file SALAMATY/icludes/userLogin.php.
 * class userLogin gére la connexion des utilisateurs en vérifiant l'email de l'utilisateur et son mot de passe.
 * @author FEGHOUL Celina
 */



include_once('db.php');

class userLogin extends DataBase{

    /**
     * Vérifie la connexion d'un utilisateur.
     * @param string $email Le mail de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     * @return bool Retourne true si la connexion est réussi sinon elle retoune false.
     */



    public function userLog($email,$password){
        $requete = 'SELECT * FROM user WHERE email =?';//On récupére le tuple ayant le meme mail que celui entré
        $stmt = $this->conn->prepare($requete);//On prépare la requete
        $stmt->bind_param('s',$email);//On lie le résulat de la requete a la variable email
        $stmt->execute();// On éxecute la requte 
        $result = $stmt->get_result();// On récupére le résultat de la requete

        if($result->num_rows > 0){
            //utilisateur trouvé, vérifier le mot de passe
            $utilisateur = $result->fetch_assoc();
            if(password_verify($password,$utilisateur['mdp_user'])){
                //alors mot de passe correcte. On démarre les sessions 
                session_start();
                $_SESSION['id_user'] = $utilisateur['id_user'];
                $_SESSION['user_email']=$utilisateur['email']; 
                header('Location: ../home.php');
            }else{
                echo 'Identifiants incorrects';
            }
        }else{
            echo 'Identifiants incorrects';
        }
        $stmt->close();

    }
}

if(isset($_POST['submit'])){
    $userLogin = new userLogin();
    $userLogin->userLog($_POST['email'],$_POST['pass']);
}

?>