<?php

// PokerDice class
class PokerDice{
    // Class attributes
    protected $figures = array('As', 'K', 'Q', 'J', '7', '8');
    protected $tirada;
    public static $throws = 0;

    // Throw function
    public function throw(){
        $this->tirada = $this->figures[array_rand($this->figures)];
        self::$throws++;
    }

    // shapeName function
    public function shapeName(){
       return $this->tirada;
    }

    // getTotalThrows function
    public static function getTotalThrows(){
        return self::$throws;
    }
}
?>