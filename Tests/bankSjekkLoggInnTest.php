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
        $this->assertEquals("Feil i personnummer", $res);
        
    }
    
   function testFeilDbPassord(){
        //arange
        $personnummer = "010101105233";
        $passord = "abc";
        
        $bank = new Bank(new BankDBStub());
        
        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Feil i passord" ,$res);
        
    }
    
    function testFeilLogikkPassord()
    {
        $persNr = "01010110522";
        $pass = "php";
        
        $bank = new Bank(new BankDBStub());
        $res = $bank->sjekkLoggInn($persNr, $pass);
        
        $this->assertEquals($res, "Feil i passord");
    }
    
    function testFeilPersnummerBankLogikk()
    {
        /*Hvis man tester med fler enn 11 sifferet, vil ikke testen få returnert
          "Feil i personnummer". Dette er fordi regEx'en er feil. Så lenge man har
          med 11 siffer, kan man skrive hva man vil etter dette. Det gjør at
          systemet er sårbart med tanke på SQL-injection.        */
        
        //arange
    
        $personnummer = "1234";
        $passord = "HeiHei";
        
        $bank = new Bank(new BankDBStub());
        
         //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i personnummer");
    }
    function testFeilPersnummerErBokstaverrBankLogikk()
    {
        //arange
        $personnummer = "efesfsefsfe";
        $passord = "HeiHei";
        
        $bank = new Bank(new BankDBStub());

        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i personnummer");
    }
    
    function testFeilPassordLengdeBankLogikk()
    {
        //arange
        $personnummer = "010101105233";
        //$passord = "HeiHei";
        $passord = "Meh";
        $bank = new Bank(new BankDBStub());

        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals($res, "Feil i passord");
    }
    
    function testTestFeilet()
    {
         //arange
        $personnummer = "Meh";
        $passord = "a";
        
        
        $bank = new Bank(new BankDBStub());

        //act
        $res = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("feil", $res);
    }
    
}
?>

