<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminEndreKundeInfoTest extends PHPUnit\Framework\TestCase{
    function testAdminEndreKundeInfo(){
        // Arrange
        $admin = new Admin(new AdminDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = "01010110523";
        $kunde->navn = "Lene Jensen";
        $kunde->adresse = "Persbråten 4";
        $kunde->telefonnr = "347654334";
        
        $res = $admin->endreKundeInfo($kunde);
        $this->assertEquals("Ok", $res);
        
    }
    
    function testEndreKundeIntoFeilPersNr()
    {
        $admin = new Admin(new AdminDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = "35803849503";
        $kunde->navn = "Lene Jensen";
        $kunde->adresse = "Persbråten 4";
        $kunde->telefonnr = "347654334";
        
        $res = $admin->endreKundeInfo($kunde);
        $this->assertEquals("Feil", $res);
    }
    
}
?>

