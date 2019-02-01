<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKundeInfoTest extends PHPUnit\Framework\TestCase {
    public function testHentKundeInfo()
    {
        //arrange
        $personnummer = 01010122344;
        $bank = new Bank(new BankDBStub());       
        //act
        $kunder = $bank->hentKundeInfo($personnummer);
        //assert
        $this->assertEquals($personnummer, $kunder[0]->personnummer);
        $this->assertEquals("Per", $kunder[0]->fornavn);
        $this->assertEquals("Olsen", $kunder[0]->etternavn);
        $this->assertEquals("Osloveien 82", $kunder[0]->adresse);
        $this->assertEquals("1234", $kunder[0]->postnr);
        $this->assertEquals("Oslo", $kunder[0]->poststed);
        $this->assertEquals("12345678", $kunder[0]->telefonnr);
        $this->assertEquals("HeiHei", $kunder[0]->passord);
        
        
    }
}

