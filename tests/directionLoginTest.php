<?php

/**
 * @file tests/directionLoginTest.php.
 * Class DirectionLoginTest.
 * Cette classe permet de tester la connxion de la direction de santé.
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../direction/includes/direction.php';

class DirectionLoginTest extends TestCase{

    /**
     * La méthode testLoginCheckDirectionValidInputs teste avec des inputs valides la méthode loginCheck qui permet de vérifier les identifiants de la direction de la santé.
     * 
     * La méthode testLoginCheckDirectionInvalidInputs teste avec des inputs non valides la méthode loginCheck.
     */

    //1. On teste avec des inputs valides
    public function testLoginCheckDirectionValidInputs(){
        $Direction = new Direction();// instancier la classe SpecialisteLogin
        $nom_direction = 'direction';
        $mdp_direction = '123';
        $result = $Direction->loginCheckDirection($nom_direction,$mdp_direction);
        $this->assertTrue($result);
    }
    
    //2. On teste avec des inputs invalides
    public function testLoginCheckDirectionInvalidInputs(){
        $Direction = new Direction();// instancier la classe SpecialisteLogin
        $nom_direction = 'anonym';
        $mdp_direction = '123';
        $result = $Direction->loginCheckDirection($nom_direction,$mdp_direction);
        $this->assertFalse($result);

    }
}





?>