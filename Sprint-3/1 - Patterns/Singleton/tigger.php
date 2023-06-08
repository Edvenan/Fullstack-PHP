<?php

/*
    Tens la següent definició de classe que pretén modelar al famós personatge de Tigger dels llibres "Winnie The Pooh" d'A A. Milne:
        class Tigger {
            private function __construct() {
                    echo "Building character..." . PHP_EOL;
            }
            public function roar() {
                    echo "Grrr!" . PHP_EOL;
            }
        }
    Sembla raonable esperar que només hi hagi un objecte Tigger (després de tot, ell és l'únic!), però la implementació actual permet 
    tenir múltiples objectes Tigger diferents:

    Refactoritzar la classe Tigger en un Singleton considerant els següents punts:
    - Defineix el mètode getInstance () que no tingui arguments. Aquesta funció és responsable de crear una instància de la classe Tigger
      només una vegada i tornar aquesta única instància cada vegada que es crida.
    - Imprimeix en pantalla múltiples vegades el rugit de Tigger.
    - Afegeix un mètode getCounter () que retorni el nombre de vegades que Tigger
*/

/*
 * The Singleton class defines the `GetInstance` method that serves as an
 * alternative to constructor and lets clients access the same instance of this
 * class over and over.
 */
class Tigger {

    /*
     * The Singleton's instance is stored in a static field.
     */
    private static $instance;
    private static $roar_counter = 0;

    /*
     * The Singleton's constructor should always be private to prevent direct
     * construction calls with the `new` operator.
     */
    private function __construct() {
            echo "Building character..." . PHP_EOL;
    }

        /**
     * Singletons should not be cloneable.
     */
    private function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /*
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance() {
        
        if (!isset(self::$instance)) {
            self::$instance = new static();         //<- same as 'self::$instance = new Tigger();
        }

        return self::$instance;
        
    }

    /*
     * Business logic.
     */
    public function roar() {
        echo "Grrr!" . PHP_EOL;
        self::$roar_counter ++;
}

    public function getCounter() {
        echo self::$roar_counter."\n";
    }
    
}




/*
 * The client code.
 */
function clientCode()
{
    // Create two Tigger instances
    $tigger1 = Tigger::getInstance();
    $tigger2 = Tigger::getInstance();
    if ($tigger1 === $tigger2) {
        echo "Singleton works, both variables contain the same instance.\n";
    } else {
        echo "Singleton failed, variables contain different instances.\n";
    }

    // Make both Tiggers roar
    $tigger1->roar();
    $tigger1->roar();
    $tigger1->roar();

    $tigger2->roar();                   //<- will increae the counter of a unique instance ($tigger1 === $tigger2)
    $tigger2->roar();

    // Imprimeix en pantalla múltiples vegades el rugit de Tigger.
    $tigger1->getCounter();             //<- will return the total roars of $tigger1 and $tigger2 since both are the same instance
    $tigger2->getCounter();             //<- will return the total roars of $tigger1 and $tigger2 since both are the same instance

}

clientCode();

?>