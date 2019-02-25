<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminHentAlleKontitest extends PHPUnit\Framework\TestCase
{
    function testHentAlleKonti()
    {
        $admin = new Admin(new AdminDBStub());
        $a = $admin->hentAlleKonti();
        $this->assertEquals("105010123456", $a[0]->kontonummer);
        $this->assertEquals("01010110523", $a[0]->personnummer);
        $this->assertEquals("720", $a[0]->saldo);
        $this->assertEquals("Lønnskonto", $a[0]->type);
        $this->assertEquals("NOK", $a[0]->valuta);
        
        $this->assertEquals("105020123456", $a[1]->kontonummer);
        $this->assertEquals("01010110523", $a[1]->personnummer);
        $this->assertEquals("100500", $a[1]->saldo);
        $this->assertEquals("Sparekonto", $a[1]->type);
        $this->assertEquals("NOK", $a[1]->valuta);
        
        $this->assertEquals("22334412345", $a[2]->kontonummer);
        $this->assertEquals("01010110523", $a[2]->personnummer);
        $this->assertEquals("10234.5", $a[2]->saldo);
        $this->assertEquals("Brukskonto", $a[2]->type);
        $this->assertEquals("NOK", $a[2]->valuta);
        
    }
}
?>

