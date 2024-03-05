<?php
/**
 * @file specialiste/includes/db.php
 * Classe DataBase.
 * Cette classe permet de gérer la connexion à la base de données.
 */
class DataBase{
    private $servername = "localhost";
    private $dBUsername = "root";
    private $dBPassword = "";
    private $dbName = "nutritionapp";
    protected $conn; 
  /**
     * Constructeur de la classe.
     * Établit la connexion à la base de données lorsqu'une instance de la classe est créée.
     */
    public function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->dBUsername,$this->dBPassword,$this->dbName);
        
        if($this->conn->connect_error){
            echo('erreur a la connection '.$this->conn->connect_error);
        }
    }
}


?>