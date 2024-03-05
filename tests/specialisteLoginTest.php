<?php 

/**
 * @file tests/specialisteLoginTest.php
 * class SpecialisteLoginTest.
 * Cette classe permet de tester la connexion d'un utilisateur spécialiste.
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */



//Tester la methode loginCheck($username,$password)
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../specialiste/includes/specialiste.php';
class SpecialisteLoginTest extends TestCase{
    /**
     * La méthode testLoginCheckValideInputs, permet de tester LoginCheck avec des inputs valides.
     * La méthode testLoginCheckInvalideInputs, permet de tester LoginCheck avec des inputs invalides.
     */



    //On teste la methode qui vérifie les identifiants donnés par le spécialiste
    //On teste avec les bons identifiants 
    public function testLoginCheckValideInputs(){
        $SpecialisteLogin = new SpecialisteLogin();
        //appeler la méthode loginCheck avec les inputs valides
        $resultat = $SpecialisteLogin->loginCheck("specialiste","123");
        //verifier si la connexion est réussie 
        $this->assertTrue($resultat);
        // Test validé
    }
    //On teste avec les mauvais identifiants 
    public function testLoginCheckInvalidInputs(){
        $SpecialisteLogin = new SpecialisteLogin();
        $resulat = $SpecialisteLogin->loginCheck("anonym","123");
        //verifier le resultat de la methode (qui devrais retourner faux dans ce cas)
        $this->assertFalse($resulat);
     // Test validé
    }

}

?>

