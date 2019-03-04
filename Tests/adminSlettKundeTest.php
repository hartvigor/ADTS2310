<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminSlettKundeTest extends PHPUnit\Framework\TestCase
{
    function testSlettKunde()
    {
        $admin = new Admin(new AdminDBStub());
        
        $res = $admin->slettKunde("01010110523");
        
        $this->assertEquals("Ok", $res);
    }
    
    function testSlettKundeFeilPerSnr()
    {
        $admin = new Admin(new AdminDBStub());
        
        $res = $admin->slettKunde("4925890845");
        
        $this->assertEquals("Feil", $res);
    }
}

?>