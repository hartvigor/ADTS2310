<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class bankHentSaldiTest extends PHPUnit\Framework\TestCase
{
    
    function testhentSaldo()
    {
        // Arrange
        $personnummer = "01010122344";
        $bank=new Bank(new BankDBStub());   
        // Act
        $saldo = $bank->hentSaldi($personnummer);
        // Assert
        //$this->assertEquals($personnummer, $kunde->personnummer);
        $this->assertEquals(420.00, $saldo[0]);
        $this->assertEquals(1337.69, $saldo[1]);
        $this->assertEquals(69.00, $saldo[2]);
    }
    
    function testhentSaldoIngenSald()
    {
        $personNr = "383405";
        $bank = new Bank(new BankDBStub());
        
        $saldo = $bank->hentSaldi($personNr);
        $this->assertEquals(0, count($saldo));
    }
    
}

?>

