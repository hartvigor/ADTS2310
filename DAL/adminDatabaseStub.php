<?php
//include once
include_once '../Model/domeneModell.php';

class AdminDBStub
{
    private $db;
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
    }
    
    function TestHentAlleKunder()
    {
        $kunder= $this->db->hentAlleKunder();
        return $kunder;
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
}