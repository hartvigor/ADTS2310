<?php
//include once
include_once '../Model/domeneModell.php';

class AdminDBStub
{
    /*private $db;
    function __construct($innDb=null)
    {
        if($innDb==null)
        {
            $this->db=new AdminDB(); 
        }
        else
        {
            $this->db=$innDb;
        }
    }*/
    
    // Usikker på om dette er riktig
    function endreKundeinfo($kunde)
    {
            $enKunde = new kunde();
            $enKunde-> personnummer = "01010110523";
            $enKunde->navn = "Lene Jensen";
            $enKunde->adresse = "Askerveien 22";
            $enKunde->telefonnr = "22224444";
            
            if ($enKunde->personnummer == $kunde->personnummer)
            {
                $enKunde->navn = $kunde->navn;
                $enKunde->adresse = $kunde->adresse;
                $enKunde->telefonnr = $kunde->telefonnr;
                return "Ok";
            }
            else
            {
                return "Feil";
            }
    }

    function hentAlleKunder()
    {
       $alleKunder = array();
       $kunde1 = new kunde();
       $kunde1->personnummer ="01010122344";
       $kunde1->navn = "Per Olsen";
       $kunde1->adresse = "Osloveien 82 0270 Oslo";
       $kunde1->telefonnr="12345678";
       array_push($alleKunder, $kunde1);
       //$alleKunder[]=$kunde1;
       $kunde2 = new kunde();
       $kunde2->personnummer ="01010122344";
       $kunde2->navn = "Line Jensen";
       $kunde2->adresse = "Askerveien 100, 1379 Asker";
       $kunde2->telefonnr="92876789";
       array_push($alleKunder, $kunde2);
       //$alleKunder[]=$kunde2;
       $kunde3 = new kunde();
       $kunde3->personnummer ="02020233455";
       $kunde3->navn = "Ole Olsen";
       $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
       $kunde3->telefonnr="99889988";
       array_push($alleKunder, $kunde3);
       //$alleKunder[]=$kunde3;
       return $alleKunder;
    }
    
    function slettKunde($persNr)
    {
        $eksPersNr = "01010110523";
        if ($persNr == $eksPersNr)
        {
            return "Ok";
        }
        else
        {
            return "Feil";
        }
        //sjekk om bruker eksister
            //returner ok hvis ekisterer
        //returner feil
    }


    function registrerKunde($kunde)
    {
        $persNr = array("01010122344", "12345678901");
        
        if (in_array($kunde->personnummer, $persNr))
        {
            return "Feil";
        }
        else
        {
            return "Ok";
        }
        
        return "Feil";
    }
    
    function registerKonto($konto)
    {
        $persNr = "01010122344";
        $eksKonto = "120302010113";
        
        if ($konto->personnummer != $persNr)
        {
            return "Feil";
        }
        if ($konto->kontonummer == $eksKonto)
        {
            return "Feil";
        }
        return "Ok";        
    }
    
    
    
    function endreKonto($konto)
    {
        $k = new konto();
        $k->personnummer = $konto->personnummer;
        if ($konto->personnummer != 01010110523)
        {
            return "Feil i personnummer";
        }
        
        switch ($konto->kontonummer) {
                case 105010123456:
                    $k->kontonummer = 105010123456;
                    $k->saldo = 720;
                    $k->type = "Lønnskonto";
                    $k->valuta = "NOK";
                    //return $k;
                    break;
                
                case 105020123456:
                    $k->kontonummer = 105020123456;
                    $k->saldo = 100500;
                    $k->type = "Sparekonto";
                    $k->valuta = "NOK";
                    //return $k;
                    break;

                case 22334412345:
                    $k->kontonummer = 22334412345;
                    $k->saldo = 10234.5;
                    $k->type = "Brukskonto";
                    $k->valuta = "NOK";
                    //return $k;
                    break;
                
                default:
                    //return $k;
                    
                    break;
            }
            
        if ($k->kontonummer != null)
        {
            $k->personnummer = $konto->personnummer;
            $k->kontonummer = $konto->kontonummer;
            $k->saldo = $konto->saldo;
            $k->type = $konto->type;
            $k->valuta = $konto->valuta;
            return $k;
        }
        
        return "Feil i kontonummer";
    }
    
    function hentAlleKonti()
    {
        $konti = array();
        $k1 = new konto();
        $k1->kontonummer = "105010123456";
        $k1->personnummer = "01010110523";
        $k1->saldo = "720";
        $k1->type = "Lønnskonto";
        $k1->valuta = "NOK";
        array_push($konti, $k1);
        
        $k1 = new konto();
        $k1->kontonummer = "105020123456";
        $k1->personnummer = "01010110523";
        $k1->saldo = "100500";
        $k1->type = "Sparekonto";
        $k1->valuta = "NOK";
        array_push($konti, $k1);
        
        $k1 = new konto();
        $k1->kontonummer = "22334412345";
        $k1->personnummer = "01010110523";
        $k1->saldo = "10234.5";
        $k1->type = "Brukskonto";
        $k1->valuta = "NOK";
        array_push($konti, $k1);
        return $konti;
    }
    
    function slettKonto($kontonummer)
    {
        $eksKnr = "010101234567";
        if ($eksKnr != $kontonummer)
        {
            return "Feil";
        }
        //sjekk om kontonr eksisterer
            // ret feil hvis ikke eksisterer
        
        return "Ok";
        
    }
    
}
