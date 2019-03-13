<?php

class UtforBetalingTest extends PHPUnit\Framework\TestCase {
   
    public function testUtforBetaling()
    {
        $bank = new Bank(new BankDBStub());
        $res = $bank->utforBetaling(1);

        $this->assertEquals("OK", $res);

    }
   
    function testUtforBetalingIngen()
    {
        $bank = new Bank(new BankDBStub());
        $res = $bank->utforBetaling(6);

        $this->assertEquals("Feil", $res);
    }
   
    /*
    public function testUtforBetaling(){
            //arrange
            $bank = new Bank(new BankDBStub());       
            // act
            $res = $bank->utforBetaling(1); 
            // assert
            $this->assertEquals("Betaling vellykket", $res);
     
        
    }
    * 
    */
    /*
    public function testUtforBetalingFeilet(){
        // Ikke nok på konto
    }
    */
}

?>

