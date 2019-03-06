<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {
        function endreKundeInfo($kunde){
            switch ($kunde->personnummer) {
                case "12345678":
                    $enKunde = new kunde();
                    $enKunde->personnummer = "12345678";
                    $enKunde->fornavn = "Per";
                    $enKunde->etternavn = "Olsen";
                    $enKunde->adresse = "Oslovei 3";
                    $enKunde->postnr = "0101";
                    $enKunde->poststed = "Oslo";
                    $enKunde->telefonnr = "98877665";
                    $enKunde->passord = "HeiHei";
                    return "OK";
               default:
                    return "Feil";
            }                           
        }
        
        function hentKundeInfo($personnummer)
        {
            switch ($personnummer) {
                case 010101223444: //ikke riktig 
                    return "Feil personnummer";
                case 01010122344:
                    $enKunde = new kunde();
                    $enKunde->personnummer =$personnummer;
                    $enKunde->fornavn = "Per";
                    $enKunde->etternavn = "Olsen";
                    $enKunde->adresse = "Osloveien 82";
                    $enKunde->postnr = "1234";
                    $enKunde->poststed = "Oslo";
                    $enKunde->telefonnr = "12345678";
                    $enKunde->passord = "HeiHei";
                    return $enKunde;                    
                case 010101223444:
                    return "Feil postnummer";
                default:
                    break;
            }
           
        }
        
        function hentEnKunde($personnummer)
        {
           $enKunde = new kunde();
           $enKunde->personnummer =$personnummer;
           $enKunde->fornavn = "Per";
           $enKunde->etternavn = "Olsen";
           $enKunde->adresse = "Osloveien 82";
           $enKunde->postnr = 0270;
           $enKunde->poststed = "Oslo";
           $enKunde->telefonnr = "12345678";
           $enKunde->passord = "HeiHei";
           return $enKunde;
        }
        
        
        function hentBetalinger($personnummer){
            // hent alle betalinger for kontonummer som avventer betaling (lik 1)
            switch ($personnummer) {
                case 01010110523:
                    $alleBetalinger = Array();
                    $betaling1 = new transaksjon();
                    $betaling1-> txId = 1;
                    $betaling1-> fraTilKontonummer = '20102012345';
                    $betaling1-> belop = -1400.7;
                    $betaling1-> dato = 2015-03-13;
                    $betaling1-> melding = 'Husleie';
                    $betaling1-> kontonummer = 123;
                    $betaling1-> avventer = 1;
                    $alleBetalinger[] = $betaling1;
                    return $alleBetalinger;
                    break;
                
                case 12345678901:
                    $alleBetalinger = Array();
                    $betaling1 = new transaksjon();
                    $betaling1-> txId = 1;
                    $betaling1-> fraTilKontonummer = '20102012345';
                    $betaling1-> belop = -1400.7;
                    $betaling1-> dato = 2015-03-13;
                    $betaling1-> melding = 'Husleie';
                    $betaling1-> kontonummer = 123;
                    $betaling1-> avventer = 1;
                    $alleBetalinger[] = $betaling1;
                    
                    $betaling2 = new transaksjon();
                    $betaling2-> txId = 2;
                    $betaling2-> fraTilKontonummer = '20102012345';
                    $betaling2-> belop = -345.7;
                    $betaling2-> dato = 2015-03-14;
                    $betaling2-> melding = 'Test';
                    $betaling2-> kontonummer = 123;
                    $betaling2-> avventer = 1;
                    $alleBetalinger[] = $betaling2;  
                    return $alleBetalinger;
                    break;

                default:
                    $alleBetalinger = Array();
                    $betaling = new transaksjon();
                    $alleBetalinger[] = $betaling;
                    return $alleBetalinger;
                    break;
            }
        }
        
        function hentTransaksjoner($kontoNr,$fraDato,$tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            //FEIL I DATO HUSK I RAPPORT (RETTE?). OMVENDT I DATO!
            if($fraDato>$tilDato)
            {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer="010101234567";
            $konto->kontonummer=$kontoNr;
            $konto->type="Sparekonto";
            $konto->saldo =2300.34;
            $konto->valuta="NOK";
            if($tilDato < strtotime('2015-03-26'))
            {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato<=$tilDato)
            {
                switch($dato)
                {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato='2015-03-26';
                        $transaksjon1->transaksjonBelop=134.4;
                        $transaksjon1->fraTilKontonummer="22342344556";
                        $transaksjon1->melding="Meny Holtet";
                        $konto->transaksjoner[]=$transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato='2015-03-27';
                        $transaksjon2->transaksjonBelop=-2056.45;
                        $transaksjon2->fraTilKontonummer="114342344556";
                        $transaksjon2->melding="Husleie";
                        $konto->transaksjoner[]=$transaksjon2; 
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop=1454.45;
                        $transaksjon3->fraTilKontonummer="114342344511";
                        $transaksjon3->melding="Lekeland";
                        $konto->transaksjoner[]=$transaksjon3;
                        break;
                }
                $dato +=(60*60*24); // en dag i tillegg i sekunder
            }
            return $konto;
        }
    }