<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class bankEndreKundeInfoTest extends PHPUnit\Framework\TestCase {
    public function testEndreKundeInfo() 
    {
        // arrange
        $personnummer = 12345678;
        $bank = new Bank(new BankDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = $personnummer;
        $kunde->fornavn = "Per";
        $kunde->etternavn = "Olsen";
        $kunde->adresse = "Oslovei 3";
        $kunde->postnr = "0101";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "98877665";
        $kunde->passord = "HeiHei";
        
        //act
        $endretKunde = $bank->endreKundeInfo($kunde);
        
        // assert 
        $this->assertEquals("OK", $endretKunde);
//        $this->assertEquals("Per", $endretKunde->fornavn);
//        $this->assertEquals("Olsen", $endretKunde->etternavn);
//        $this->assertEquals("Oslovei 3", $endretKunde->adresse);
//        $this->assertEquals("0101", $endretKunde->postnr);
//        $this->assertEquals("Oslo", $endretKunde->poststed);
//        $this->assertEquals("98877665", $endretKunde->telefonnr);
//        $this->assertEquals("Hei", $endretKunde->passord);
    }
    public function testEndreKundeInfoFeil() 
    {
        // arrange
        $personnummer = 123456789;
        $bank = new Bank(new BankDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = $personnummer;
        $kunde->fornavn = "Per";
        $kunde->etternavn = "Olsen";
        $kunde->adresse = "Oslovei 3";
        $kunde->postnr = "0101";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "98877665";
        $kunde->passord = "HeiHei";
        
        //act
        $endretKunde = $bank->endreKundeInfo($kunde);
        
        // assert 
        $this->assertEquals("Feil", $endretKunde);
}
}

