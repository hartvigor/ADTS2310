<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class sjekkLoggInnTest extends PHPUnit\Framework\TestCase 
{
    function testLoggInn(){
        //arange
        $personnummer = "010101105233";
        $passord = "HeiHei";
        
        $bank = new Bank(new BankDBStub());
        
        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Logget inn");
        
    }
    
    function testFeilPersonnummer(){
        //arange
        $personnummer = "010101105232";
        $passord = "HeiHei";
        
        $bank = new Bank(new BankDBStub());
        
        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i personnummer");
        
    }
    
    function testFeilPassord(){
        //arange
        $personnummer = "010101105233";
        $passord = "loljeglikerboller";
        
        $bank = new Bank(new BankDBStub());
        
        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i passord");
        
    }
    
    function testFeilDbPOassord()
    {
        $persNr = "01010110523";
        $pass = "phperjalla";
        
        $bank = new Bank(new BankDBStub());
        $res = $bank->sjekkLoggInn($persNr, $pass);
        
        $this->assertEquals($res, "Feil i passord");
    }
    
    function testFeilPersnummerErBokstaverrBankLogikk()
    {
        //arange
        $personnummer = "efesfsefsfe";
        //$passord = "HeiHei";
        $passord = "";
        $bank = new Bank(new BankDBStub());

        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i personnummer");
    }
    
    function testFeilPassordLengdeBankLogikk()
    {
        //arange
        $personnummer = "01010110523";
        //$passord = "HeiHei";
        $passord = "Meh";
        $bank = new Bank(new BankDBStub());

        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i personnummer");
    }
    
}
?>

