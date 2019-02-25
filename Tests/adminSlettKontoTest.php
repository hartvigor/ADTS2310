<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminSlettKontoTest extends PHPUnit\Framework\TestCase
{
    function testSlettKonto()
    {
        $admin = new Admin(new AdminDBStub());
        $kontoNr = "010101234567";
        
        $res = $admin->slettKonto($kontoNr);
        $this->assertEquals("Ok", $res);
    }
    
    function testSlettKontoFeilkonto()
    {
        $admin = new Admin(new AdminDBStub());
        $kontoNr = "120304058293";
        
        $res = $admin->slettKonto($kontoNr);
        $this->assertEquals("Feil", $res);
    }
}



?>




