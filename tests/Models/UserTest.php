<?php

require '/var/www/html/back/mvc-tp/vendor/autoload.php';

use Guirod\MvcTp\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testMaFonction(){
        $this->assertEquals(true,true);
    }

    public function testAfficheNom()
    {
        $user1 = new User();
        $user1->nom = "Nom1";
        $user1->prenom = "Prenom 1";
        
        $this->assertEquals("Nom1 Prenom 1", $user1->afficheNom());
    }


    /**
     * @dataProvider afficheNomProvider
     */
    public function testAfficheNomProvider($nom,$prenom,$expected)
    {
        $user1 = new User();
        $user1->nom = $nom;
        $user1->prenom = $prenom;
        
        $this->assertEquals($expected, $user1->afficheNom());
    }

    public static function afficheNomProvider()
    {
        return [
            ["Nom1","Prenom 1","Nom1 Prenom 1"],
            ["Nom2","Prenom 1","Nom2 Prenom 1"],
            ["Nom3","Prenom 3","Nom3 Prenom 3"]
        ];
    }
}