<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class HentKontiTest extends PHPUnit\Framework\TestCase 
{
    function testhentKonti(){
        $personnummer = "12345678901";
        $konti = array();
        $bank = new Bank(new BankDBStub());
        
        $res = $bank->hentKonti($personnummer);
        
        $this->assertEquals(105010123456 ,$res[0]);
        $this->assertEquals(105010123457 ,$res[1]);
        $this->assertEquals(105010123458 ,$res[2]);
    }
    
    function testTestFeilet(){
        $personnummer = "12345678909";
        $konti = array();
        $bank = new Bank(new BankDBStub());
        
        $res = $bank->hentKonti($personnummer);
        
        $this->assertEquals("feil", $res);
    }
}
?>

