<?php

/**
 * @file tests/gestionSignalementsTest.php
 * class GestionSignalementsTest.
 * Cette classe permet de tester la récupération du signalement.
 * @author FEGHOUL Celina.
 * @author HENKOUS Litissia.
 */


use PHPUnit\Framework\TestCase; //on importe le testCase de phpunit
require_once __DIR__ . '/../specialiste/includes/gestionSignalements.php';
 
class GestionSignalementsTest extends TestCase{

  /**
   * La méthode testgetSignalements, permet de tester la méthode getSignalements.
   * 
   */

   public function testgetSignalements(){
        $GestionSignalments = new GestionSignalments();
        $Signalments = $GestionSignalments->getSignalements();

        // Vérification du résultat retourné par la méthode getSignalements s'il n'est pas vide s'il est vide alors il y'a un probléme dans la requete sql
        $this->assertNotEmpty($Signalments);
      // verifier si tous les signalments retournés par la requete sql ont ces clés 
        foreach($Signalments as $Signalment){
            $this->assertArrayHasKey('id_signalement',$Signalment);
            $this->assertArrayHasKey('degré_de_sévérité',$Signalment);
            $this->assertArrayHasKey('wilaya_signalement',$Signalment);
            $this->assertArrayHasKey('date_signalement',$Signalment);
            $this->assertArrayHasKey('details',$Signalment);
            $this->assertArrayHasKey('id_produit',$Signalment);
        }
    }
}




?>