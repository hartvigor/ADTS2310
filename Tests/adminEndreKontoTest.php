<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminEndreKontoTest extends PHPUnit\Framework\TestCase
{
    function testEndreLonnsKonto()
    {
        //arrange 
        $admin = new Admin(new AdminDBStub());
        
        $konto = new Konto();
        $konto->personnummer = 01010110523;
        $konto->kontonummer = 105010123456;
        $konto->type = "Morrokonto";
        $konto->valuta = "ETH";
        $konto->saldo = 20;
        
        //act 
        $endretKonto = $admin->endreKonto($konto); 
        
        //assert
        $this->assertEquals(01010110523, $endretKonto->personnummer);
        $this->assertEquals(105010123456, $endretKonto->kontonummer);
        $this->assertEquals("Morrokonto", $endretKonto->type);
        $this->assertEquals("ETH", $endretKonto->valuta);
        $this->assertEquals(20, $endretKonto->saldo);
    }
    
    function testEndreSpareKonto()
    {
        //assert
        $admin = new Admin(new AdminDBStub());
        
        $konto = new Konto();
        $konto->personnummer = 01010110523;
        $konto->kontonummer = 105020123456;
        $konto->type = "Brukskonto";
        $konto->valuta = "EUR";
        $konto->saldo = 30;
        
        //act 
        $endretKonto = $admin->endreKonto($konto); 
        
        //assert
        $this->assertEquals(01010110523, $endretKonto->personnummer);
        $this->assertEquals(105020123456, $endretKonto->kontonummer);
        $this->assertEquals("Brukskonto", $endretKonto->type);
        $this->assertEquals("EUR", $endretKonto->valuta);
        $this->assertEquals(30, $endretKonto->saldo);
    }
    
    function testEndreBruksKonto()
    {
        //22334412345
         //assert
        $admin = new Admin(new AdminDBStub());
        
        $konto = new Konto();
        $konto->personnummer = 01010110523;
        $konto->kontonummer = 22334412345;
        $konto->type = "Lønnskonto";
        $konto->valuta = "USD";
        $konto->saldo = 8030;
        
        //act 
        $endretKonto = $admin->endreKonto($konto); 
        
        //assert
        $this->assertEquals(01010110523, $endretKonto->personnummer);
        $this->assertEquals(22334412345, $endretKonto->kontonummer);
        $this->assertEquals("Lønnskonto", $endretKonto->type);
        $this->assertEquals("USD", $endretKonto->valuta);
        $this->assertEquals(8030, $endretKonto->saldo);
    }
    
    function testEndreKontoIngenKonto()
    {
        $admin = new Admin(new AdminDBStub());
        
        $konto = new Konto();
        $konto->personnummer = 01010110523;
        $konto->kontonummer = 223343453445;
        $konto->type = "Lønnskonto";
        $konto->valuta = "USD";
        $konto->saldo = 8030;
        
        //act 
        $endretKonto = $admin->endreKonto($konto); 
        
        //assert
        $this->assertEquals("Feil i kontonummer", $endretKonto);
    }
    
    function testEndreKontoFeilPers()
    {
        $admin = new Admin(new AdminDBStub());
        
        $konto = new Konto();
        $konto->personnummer = 01235235210523;
        $konto->kontonummer = 223343453445;
        $konto->type = "Lønnskonto";
        $konto->valuta = "USD";
        $konto->saldo = 8030;
        
        //act 
        $endretKonto = $admin->endreKonto($konto); 
        
        //assert
        $this->assertEquals("Feil i personnummer", $endretKonto);
    }
    
}


?>