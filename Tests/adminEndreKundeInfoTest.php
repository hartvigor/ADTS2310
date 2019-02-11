<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminEndreKundeInfoTest extends PHPUnit\Framework\TestCase{
    public function testAdminEndreKundeInfo(){
        // Arrange
        $personnummer = 01010122344;
        $bank = new Bank(new DBStub());     
        // Act
        // Assert
    }
    
}
?>

