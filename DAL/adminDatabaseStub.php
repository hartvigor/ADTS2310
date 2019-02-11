<?php
//include once
include_once '../Model/domeneModell.php';

class DBStub
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
    
    // Usikker på om dette er riktig
    function TestEndreKundeInfo($personnummer, $navn, $adresse, $telefonnr){
            $enKunde = new kunde();
            $enKunde-> personnummer = $personnummer;
            $enKunde->navn = $navn;
            $enKunde->adresse = $adresse;
            $enKunde->telefonnr = $telefonnr;
            return $enKunde;    
    }
}