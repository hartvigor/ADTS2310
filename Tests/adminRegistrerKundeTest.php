<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminRegistrerKundeTest extends PHPUnit\Framework\TestCase
{
    function testRegistrerKunde()
    {
        //assert
        $admin = new Admin(new AdminDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = "12889191";
        $kunde->fornavn = "Melfyn";
        $kunde->etternavn = "Sir Jenkins";
        $kunde->adresse = "Tindergata 1";
        $kunde->postnr = "0842";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12346789";
        $kunde->passord = "TESTST";
        
        //act
        $res = $admin->registrerKunde($kunde);
        
        //assert
        $this->assertEquals("Ok", $res);
        
    }
}


?>

