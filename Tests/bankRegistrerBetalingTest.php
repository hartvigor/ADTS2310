<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class bankRegistrerBetalingTest  extends PHPUnit\Framework\TestCase
{
    function testRegistrerGydligBetaling()
    {
        $kontoNr = "13574542246";
        $trans = new transaksjon();
        $trans->txId = "1235357564743553";
        $trans->fraTilKontonummer = "123424556543";
        $trans->transaksjonBelop = 200;
        $trans->belop = 200;
        $trans->dato = "2016-03-01";
        $trans->melding = "Bursdagspenger";
        //lagt til kontonummer
        $trans->kontonummer = "14467542312";
        $trans->avventer = "1";
        
        $bank = new Bank(new BankDBStub());
        $res = $bank->registrerBetaling($kontoNr, $trans);
        $this->assertEquals("Ok", $res);
        
        
    }
    
    function testRegistrerFeilBetaling()
    {
        //12346787654345678
        $kontoNr = "13574542246";
        $trans = new transaksjon();
        $trans->txId = "12346787654345678";
        $trans->fraTilKontonummer = "123424556543";
        $trans->transaksjonBelop = 200;
        $trans->belop = 200;
        $trans->dato = "2016-03-01";
        $trans->melding = "Bursdagspenger";
        //lagt til kontonummer
        $trans->kontonummer = "14467542312";
        $trans->avventer = "1";
        
        $bank = new Bank(new BankDBStub());
        $res = $bank->registrerBetaling($kontoNr, $trans);
        $this->assertEquals("Feil", $res);
    }
    
    
}