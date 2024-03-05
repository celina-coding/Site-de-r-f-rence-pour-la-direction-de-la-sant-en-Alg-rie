<?php
/**
 * @file tests/gestionEtudeTest.php
 * class GestionEtudeTest.
 * Cette classe permet de tester l'ajout de l'étude éffectuée par le spécialiste.
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */



use PHPUnit\Framework\TestCase; //on importe le testCase de phpunit
require_once __DIR__ . '/../specialiste/includes/gestionEtude.php'; //on inclus le fichier gestionEtude.php pour pouvoir tester la méthode verifierExistanceId
//On va tester dans ce code la methode qui verfie l'existance de l'id du produit dans la base de donnée pour pouvoir lui faire une étude
class GestionEtudeTest extends TestCase {

    /**
     * La méthode testverifierExistanceIdValidInputs, permet de tester la méthode verifierExistanceId avec des inputs valides.
     * La méthode testverifierExistanceIdInValidInputs, permet de tester la méthode verifierExistanceId avec des inputs invalides.
     * La méthode testAjoutEtudeValidInputs, permet de tester la méthdoe AjoutEtude avec des inputs valides.
     * La méthode testAjoutEtudeInvalidInputs, permet de tester la méthdoe AjoutEtude avec des inputs invalides.
     */



    public function testverifierExistanceIdValidInputs(){
        $GestionEtude = new GestionEtude(); // Création d'une instance de la classe GestionEtude
        $id_produit = 'PROD001';
        $result = $GestionEtude->verifierExistanceId($id_produit);
        $this->assertTrue($result);
        // Test validé
    }

    public function testverifierExistanceIdInValidInputs(){
        $GestionEtude = new GestionEtude(); // Création d'une instance de la classe GestionEtude
        $id_produit = 'PROD002';
        $result = $GestionEtude->verifierExistanceId($id_produit);
        $this->assertFalse($result);
    }

    //Test de la méthode ajoutEtude
    public function testAjoutEtudeValidInputs(){
        $GestionEtude = new GestionEtude(); // Création d'une instance de la classe GestionEtude
        $id_produit ='PROD001';
        $titre_etude = 'Titre';
        $description_etude = 'Description';
        $conclusion_etude = 'Conclusion';
        $id_specialiste = '1';

        $result = $GestionEtude->ajoutEtude($id_produit,$titre_etude,$description_etude,$conclusion_etude,$id_specialiste);

        //Vérification de la methode 
        $this->assertTrue($result);
        // Test validé
    }

    public function testAjoutEtudeInvalidInputs(){
        $GestionEtude = new GestionEtude(); // Création d'une instance de la classe GestionEtude
        $result = $GestionEtude->ajoutEtude('PROD001','','','','');
        //Vérification de la methode 
        $this->assertTrue($result);
        // Test validé
    }
}

?>