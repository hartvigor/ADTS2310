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
        $this->assertEquals($personnummer, $kunder->personnummer);
        $this->assertEquals("Per", $kunder->fornavn);
        $this->assertEquals("Olsen", $kunder->etternavn);
        $this->assertEquals("Osloveien 82", $kunder->adresse);
        $this->assertEquals("1234", $kunder->postnr);
        $this->assertEquals("Oslo", $kunder->poststed);
        $this->assertEquals("12345678", $kunder->telefonnr);
        $this->assertEquals("HeiHei", $kunder->passord);
        
        
    }
    
    public function testFeilPersonnummerKundeInfo()
    {
        //arange
        $personnummer = 010101223444;
        $bank = new Bank(new BankDBStub()); 
        //act
        $kunder = $bank->hentKundeInfo($personnummer);
        //assert
        $this->assertEquals("Feil personnummer", $kunder);
    }
    
    public function testFeilPostnrHentKundeInfo() 
    {
        //arange
        $personnummer = 01010122344;
        $bank = new Bank(new BankDBStub()); 
        //act
        $kunder = $bank->hentKundeInfo($personnummer);
        //assert
        $this->assertEquals("Feil postnummer", $kunder);
    }
}

