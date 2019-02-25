<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';

class adminHentAlleKunderTest extends PHPUnit\Framework\TestCase
{
    function testHentAlleKunder()
    {
        $admin = new Admin(new AdminDBStub());
        $a = $admin->hentAlleKunder();
        
        $this->assertEquals("01010122344", $a[0]->personnummer);
        $this->assertEquals("Per Olsen", $a[0]->navn);
        $this->assertEquals("Osloveien 82 0270 Oslo", $a[0]->adresse);
        $this->assertEquals("12345678", $a[0]->telefonnr);
        
        $this->assertEquals("01010122344", $a[1]->personnummer);
        $this->assertEquals("Line Jensen", $a[1]->navn);
        $this->assertEquals("Askerveien 100, 1379 Asker", $a[1]->adresse);
        $this->assertEquals("92876789", $a[1]->telefonnr);
        
        $this->assertEquals("02020233455", $a[2]->personnummer);
        $this->assertEquals("Ole Olsen", $a[2]->navn);
        $this->assertEquals("Bærumsveien 23, 1234 Bærum", $a[2]->adresse);
        $this->assertEquals("99889988", $a[2]->telefonnr);
    }
}

?>

