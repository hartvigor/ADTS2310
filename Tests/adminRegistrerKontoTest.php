<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminRegistrerKontoTest extends PHPUnit\Framework\TestCase
{
    function testRegistrerKonto()
    {
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = "01010122344";
        $konto->kontonummer = "1203030302202";
        $konto->saldo = "0";
        $konto->type = "Brukskonto";
        $konto->valuta = "NOK";
        
        $res = $admin->registrerKonto($konto);
        $this->assertEquals("Ok", $res);
    }
    
    function testRegistrerKontoEksisterer()
    {
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = "01010122344";
        $konto->kontonummer = "120302010113";
        $konto->saldo = "0";
        $konto->type = "Brukskonto";
        $konto->valuta = "NOK";
        
        $res = $admin->registrerKonto($konto);
        $this->assertEquals("Feil", $res);
    }
    
    function testRegistererKontoFeilPersNR()
    {
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        $konto->personnummer = "2345678765";
        $konto->kontonummer = "120302010113";
        $konto->saldo = "0";
        $konto->type = "Brukskonto";
        $konto->valuta = "NOK";
        
        $res = $admin->registrerKonto($konto);
        $this->assertEquals("Feil", $res);
    }
    
    
    
}


?>