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
        $kunde->personnummer = "12889167891";
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
    
    function testKundeEksisterer()
    {
        $admin = new Admin(new AdminDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = "01010122344";
        $kunde->fornavn = "Per";
        $kunde->etternavn = "Olsen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "0270";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->passord = "TESTST";
        
        $res = $admin->registrerKunde($kunde);
        
        $this->assertEquals("Feil", $res);

    }
    
}


?>

