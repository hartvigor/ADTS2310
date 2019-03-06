<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';

class bankHentSaldiTest extends PHPUnit\Framework\TestCase {
    
    function hentSaldoTest(){
        // Arrange
        $personnummer = 01010122344;
        $bank = new Bank(new BankDBStub());   
        // Act
        $kunde = $bank->hentSaldi($personnummer);
        // Assert
        $this->assertEquals($personnummer, $kunde->personnummer);
        $this->assertEquals(420.00, $kunde->saldo[0]);
        $this->assertEquals(1337.69, $kunde->saldo[1]);
        $this->assertEquals(69.00, $kunde->saldo[2]);
    }
    
}

?>

