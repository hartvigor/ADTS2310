<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {
        function endreKundeInfo($kunde){
            switch ($kunde->personnummer) {
                case 12345678:
                    $enKunde = new kunde();
                    $enKunde->personnummer = "12345678";
                    $enKunde->fornavn = "Per";
                    $enKunde->etternavn = "Olsen";
                    $enKunde->adresse = "Osloveien 82";
                    $enKunde->postnr = "1234";
                    $enKunde->poststed = "Oslo";
                    $enKunde->telefonnr = "12345678";
                    $enKunde->passord = "HeiHei";
                    return "OK";
               default:
                    return "Feil";
            }                           
        }
        
        function hentKundeInfo($personnummer)
        {
            switch ($personnummer) {                    
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
                default:
                    return "Feil personnummer";
                    break;
            }
           
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

        function registrerBetaling($kontoNr, $transaksjon)
        {
            $regBet = array();
            $trans = new transaksjon();
            $trans->txId = 12346787654345678;
            $trans->fraTilKontonummer = "123424556543";
            $trans->transaksjonBelop = 200;
            $trans->belop = 200;
            $trans->dato = "2016-03-01";
            $trans->melding = "Bursdagspenger";
            //lagt til kontonummer
            $trans->kontonummer = "14467542312";
            $trans->avventer = "nei";
            array_push($regBet, $trans);
            
            $trans = new transaksjon();
            $trans->txId = 78876545678987654456;
            $trans->fraTilKontonummer = "548753982374";
            $trans->transaksjonBelop = 400;
            $trans->belop = 400;
            $trans->dato = "2016-07-01";
            $trans->melding = "Lønning";
            //lagt til kontonummer
            $trans->kontonummer = "14467542312";
            $trans->avventer = "nei";
            array_push($regBet, $trans);
            
            for ($i = 0; $i < count($regBet); $i++)
            {
                $t = $regBet[$i];
                if ($t->txId == $transaksjon->txId)
                {
                    return "Feil";
                }
            }
            return "Ok";
            
        }

        function hentSaldi($personnummer){
            $saldi = array();
            
            $persNr = "01010122344";
            if ($persNr == $personnummer)
            {
                array_push($saldi, 420.00);
                array_push($saldi, 1337.69);
                array_push($saldi, 69.00);
            }
           
            return $saldi; 
        }


        function sjekkLoggInn($personnummer, $passord){
            
            
            if ($personnummer == "010101105233" && $passord == "HeiHei"){
                return "Logget inn";
            }
            
            elseif ($personnummer == "010101105233" && $passord != "HeiHei"){
                return "Feil i passord";
            }
            
            elseif ($personnummer != "01010110523" && $passord == "HeiHei") {
                return "Feil i personnummer";
            }
            
                return "feil";
        }
        
        function hentKonti($personnummer){
            $konto = new Konto();
            $konto->personnummer = $personnummer;
            $konti = array();
            $konti[0] = 105010123456;
            $konti[1] = 105010123457;
            $konti[2] = 105010123458;
            if ($personnummer == "12345678901"){
                return $konti; 
            }
            return "feil";
        }
        
        function utforBetaling($TxID){
            $feil = true;
            $transaksjoner = array();

            $transaksjon = new transaksjon();
            $transaksjon->txId = 1;
            $transaksjon->fraTilKontonummer = 20102012345;
            $transaksjon->transaksjonBelop = -100.5;
            $transaksjon->belop = -100.5;
            $transaksjon->dato = "2015-03-15";
            $transaksjon->melding = "Meny Storo";
            $transaksjon->kontonummer = 105010123456;
            $transaksjon->avventer = 0;
            array_push($transaksjoner, $transaksjon);

            $transaksjon = new transaksjon();
            $transaksjon->txId = 2;
            $transaksjon->fraTilKontonummer = 20102012345;
            $transaksjon->transaksjonBelop = 400.4;
            $transaksjon->belop = 400.4;
            $transaksjon->dato = "2015-03-20";
            $transaksjon->melding = "Innbetaling";
            $transaksjon->kontonummer = 105010123456;
            $transaksjon->avventer = 0;
            array_push($transaksjoner, $transaksjon);

            $transaksjon = new transaksjon();
            $transaksjon->txId = 3;
            $transaksjon->fraTilKontonummer = 20102012345;
            $transaksjon->transaksjonBelop = -1400.7;
            $transaksjon->belop = -1400.7;
            $transaksjon->dato = "2015-03-13";
            $transaksjon->melding = "Husleie";
            $transaksjon->kontonummer = 55551166677;
            $transaksjon->avventer = 1;
            array_push($transaksjoner, $transaksjon);

            $transaksjon = new transaksjon();
            $transaksjon->txId = 6;
            $transaksjon->fraTilKontonummer = 12312345;
            $transaksjon->transaksjonBelop = 1234;
            $transaksjon->belop = 1234;
            $transaksjon->dato = "2012-12-12";
            $transaksjon->melding = "Melding";
            $transaksjon->kontonummer = 234567;
            $transaksjon->avventer = 1;
            array_push($transaksjoner, $transaksjon);

            $kontoNr = null;
            for ($i = 0; $i < count($transaksjoner); $i++)
            {
                if ($transaksjoner[$i]->txId == $TxID)
                {
                    $feil = false;
                    $kontoNr = $transaksjoner[$i]->fraTilKontonummer;
                    break;
                }
            }

            $kontoer = array();

            $konto = new konto();
            $konto->personnummer = 01010110523;
            $konto->kontonummer = 20102012345;
            $konto->saldo = 10234.5;
            $konto->type = "Brukskonto";
            $konto->valuta = "NOK";
            array_push($kontoer, $konto);

            $kontoEksisterer = false;
            for ($i = 0; $i < count($kontoer); $i++)
            {
                if ($kontoer[$i]->kontonummer == $kontoNr)
                {
                    $kontoEksisterer = true;
                    break;
                }
            }
            
            if ($kontoEksisterer == false)
            {
                $feil = true;
            }

            if ($feil == false)
            {
                return "OK";
            }
            else
            {
                return "Feil";
            }

        }
    }  
    ?>
