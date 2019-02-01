<?php
    class kunde
    {
        public $personnummer;
        public $fornavn;
        public $etternavn;
        public $adresse;
        public $postnr;
        public $poststed; 
        public $telefonnr;
        public $passord;
    }
    class konto
    {
        public $personnummer;
        public $kontonummer;
        public $saldo;
        public $type;
        public $valuta;
        public $transaksjoner = array(); // av transaksjon
    }        
    class transaksjon
    {
        //lagt til TxID (TIL RAPPORT!)
        public $txId;
        public $fraTilKontonummer;
        public $transaksjonBelop;
        public $belop;
        public $dato;
        public $melding;
        //lagt til kontonummer
        public $kontonummer;
        public $avventer;
    }
    
  

