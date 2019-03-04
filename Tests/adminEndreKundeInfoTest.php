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
        $kunde->adresse = "Askerveien 22";
        $kunde->telefonnr = "22224444";
        
        $res = $admin->endreKundeInfo($kunde);

        $this->assertEquals("01010110523", $endretKundeinfo->personnummer);
        $this->assertEquals("Lene Jensen", $endreKundeinfo->navn);
        $this->assertEquals("Askerveien 22", $endretKundeinfo->adresse);
        $this->assertEquals("22224444", $endretKundeinfo->telefonnr);
        
    }
    
    function testEndreKundeIntoFeilPersNr()
    {
        $admin = new Admin(new AdminDBStub());
        
        $kunde = new kunde();
        $kunde->personnummer = "35803849503";
        $kunde->navn = "Lene Jensen";
        $kunde->adresse = "Askerveien 22";
        $kunde->telefonnr = "22224444";
        
        $res = $admin->endreKundeInfo($kunde);
        $this->assertEquals("Feil", $res);
    }
    
}
?>

