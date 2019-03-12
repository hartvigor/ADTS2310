<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit\Framework\TestCase {
    public function testIngenBetalinger() 
    {
        // arrange
        $personnummer = "";
        $bank = new Bank(new BankDBStub());

        //act
        $alleBetalinger = $bank->hentBetalinger($personnummer);
        
        echo count($alleBetalinger);

        $this->assertEquals(0, count($alleBetalinger));
        // assert 
        /*
        $this->assertEquals(1, $alleBetalinger[0]->txId);
        $this->assertEquals('20102012345', $alleBetalinger[0]->fraTilKontonummer);
        $this->assertEquals(-1400.7, $alleBetalinger[0]->belop);
        $this->assertEquals(2015-03-13, $alleBetalinger[0]->dato);
        $this->assertEquals('Husleie', $alleBetalinger[0]->melding);
        $this->assertEquals(123, $alleBetalinger[0]->kontonummer);
        $this->assertEquals(1, $alleBetalinger[0]->avventer);
        $tomtArray = array();
        $this->assertEquals($tomtArray,$alleBetalinger);
         */
    }
    
    public function testHentEnBetaling()
    {
        //arrange
        $personnummer = 01010110523;
        $bank = new Bank(new BankDBStub());

        //act
        $alleBetalinger = $bank->hentBetalinger($personnummer);

        //assert
        $this->assertEquals(1, $alleBetalinger[0]->txId);
        $this->assertEquals('20102012345', $alleBetalinger[0]->fraTilKontonummer);
        $this->assertEquals(-1400.7, $alleBetalinger[0]->belop);
        $this->assertEquals(2015-03-13, $alleBetalinger[0]->dato);
        $this->assertEquals('Husleie', $alleBetalinger[0]->melding);
        $this->assertEquals(123, $alleBetalinger[0]->kontonummer);
        $this->assertEquals(1, $alleBetalinger[0]->avventer);
    }
    public function testToBetalinger()
    {
        //arrange
        $personnummer = 12345678901;
        $bank = new Bank(new BankDBStub());

        //act
        $alleBetalinger = $bank->hentBetalinger($personnummer);
        
        //assert
        $this->assertEquals(1, $alleBetalinger[0]->txId);
        $this->assertEquals('20102012345', $alleBetalinger[0]->fraTilKontonummer);
        $this->assertEquals(-1400.7, $alleBetalinger[0]->belop);
        $this->assertEquals(2015-03-13, $alleBetalinger[0]->dato);
        $this->assertEquals('Husleie', $alleBetalinger[0]->melding);
        $this->assertEquals(123, $alleBetalinger[0]->kontonummer);
        $this->assertEquals(1, $alleBetalinger[0]->avventer);
        
        $this->assertEquals(2, $alleBetalinger[1]->txId);
        $this->assertEquals('20102012345', $alleBetalinger[1]->fraTilKontonummer);
        $this->assertEquals(-345.7, $alleBetalinger[1]->belop);
        $this->assertEquals(2015-03-14, $alleBetalinger[1]->dato);
        $this->assertEquals('Test', $alleBetalinger[1]->melding);
        $this->assertEquals(123, $alleBetalinger[1]->kontonummer);
        $this->assertEquals(1, $alleBetalinger[1]->avventer);
    }
    
    

}   
?>


