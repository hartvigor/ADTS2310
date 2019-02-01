<?php
//include once

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
}