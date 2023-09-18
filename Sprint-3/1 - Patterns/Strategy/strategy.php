<?php
/**
 * STRATEGY PATTERN
 * Pensa en la següent funció simple amb el nom couponGenerator que genera diferents cupons per
 * a diferents tipus d'automòbils. Per a aquells que estan interessats a comprar un BMW ofereix
 * un cupó diferent del d'aquells que estiguin interessats a comprar un Mercedes.
 */

 /* El cupó té en compte els següents factors per ponderar la taxa de descompte:

    És possible que desitgem oferir un descompte durant una recessió en la compra d'automòbils. En el nostre codi se li denomina a aquest atribut com isHighSeason.
    És possible que desitgem oferir un descompte quan l'estoc d'automòbils a la venda sigui massa gran. En el nostre codi se li denomina a aquest atribut com bigStock.
    function cupounGenerator($car) {

        $discount = 0;
        $isHighSeason = false;
        $bigStock = true;

        if($car == "bmw"){
            if(!$isHighSeason) {$discount += 5;}
            if($bigStock) {$discount += 7;}
        } else if($car == "mercedes") {
            if(!$isHighSeason) {$discount += 4;}
            if($bigStock) {$discount += 10;}
        
        }
        return $cupoun = "Get {$discount}% off the price of your new car.";
    }
    echo cupounGenerator("bmw");

    Segons les consideracions anteriors necessitem utilitzar el patró strategy perquè donada la marca d'un automòbil, el nostre programa calculi el descompte.

    Assegura't de tenir en compte el següent:

    Cal crear una funció anomenada addSeasonDiscount que afegeix un descompte quan les vendes baixen.
    Cal crear una funció anomenada addStockDiscount que afegeix un descompte quan l'inventari és massa gran.
    Ja que els cupons varien segons cada tipus d'automòbil, l'ideal seria convocar aquestes funcions en classes separades. Pel que serà necessari implementar les classes bmwCuoponGenerator i mercedesCuoponGenerator.

    De fet, com els mètodes anteriors per a cada cupó tenen el mateix nom; és necessari crear la interfície carCouponGenerator que obligui a totes les classes que la implementin a usar-los, incloses les que acabem d'escriure i les que ens agradaria afegir en el futur.

    Imprimeix per pantalla el resultat del cupó per a les dues marques de cotxe (BMW i Mercedes). 
*/



/**
 * The Context defines the interface of interest to clients.
 */
class CupounGenerator
{
    /**
     * @var carCouponGenerator (Strategy). The Context (CupounGenerator) maintains a reference
     * to one of the Strategy objects. The Context does not know the concrete class of a strategy.
     * It should work with all strategies via the Strategy interface.
     */
    private $carCouponGenerator;
    private $discount = 0;

    /**
     * Usually, the Context accepts a strategy through the constructor, but also
     * provides a setter to change it at runtime.
     */
    public function __construct(carCouponGenerator $strategy)
    {
        $this->carCouponGenerator = $strategy;
    }

    /**
     * Usually, the Context allows replacing a Strategy object at runtime.
     */
    public function setCarCouponGenerator(carCouponGenerator $strategy)
    {
        $this->discount = 0;
        $this->carCouponGenerator = $strategy;
    }

    /**
     * The Context delegates some work to the Strategy object instead of
     * implementing multiple versions of the algorithm on its own.
     */
    public function addSeasonDiscount(bool $isHighSeason): void
    {

        $this->discount += $this->carCouponGenerator->addSeasonDiscount($isHighSeason);

    }

    public function addStockDiscount(bool $bigStock): void
    {

        $this->discount += $this->carCouponGenerator->addStockDiscount($bigStock);
  
    }

    public function printCouponDiscount(bool $isHighSeason, bool $bigStock): void
    {

        $this->addSeasonDiscount($isHighSeason);
        $this->addStockDiscount($bigStock);

        echo "Get {$this->discount}% off the price of your new car.";

    }
}

/**
 * The Strategy interface declares operations common to all supported versions
 * of some algorithm.
 *
 * The Context uses this interface to call the algorithm defined by Concrete
 * Strategies.
 */
interface carCouponGenerator
{
    public function addSeasonDiscount(bool $isHighSeason): int;
    public function addStockDiscount(bool $bigStock): int;
}

/**
 * Concrete Strategies implement the algorithm while following the base Strategy
 * interface. The interface makes them interchangeable in the Context.
 */
class bmwCuoponGenerator  implements carCouponGenerator
{

    public function addSeasonDiscount(bool $isHighSeason): int
    {
        return $isHighSeason? 0 : 5;
    }

    public function addStockDiscount(bool $bigStock): int
    {
        return $bigStock? 7 : 0;

    }
}

class mercedesCuoponGenerator implements carCouponGenerator
{
    public function addSeasonDiscount(bool $isHighSeason): int
    {
        return $isHighSeason? 0 : 4;
    }

    public function addStockDiscount(bool $bigStock): int
    {
        return $bigStock? 10 : 0;
    }
}

/**
 * The client code picks a concrete strategy and passes it to the context. The
 * client should be aware of the differences between strategies in order to make
 * the right choice.
 */

$isHighSeason = true;
$bigStock = true;

$coupon = new CupounGenerator(new bmwCuoponGenerator());
echo "Client: Strategy is set to BMW.\n";
$coupon->printCouponDiscount($isHighSeason, $bigStock);

echo "\n";

echo "Client: Strategy is set to MERCEDES.\n";
$coupon->setCarCouponGenerator(new mercedesCuoponGenerator());
$coupon->printCouponDiscount($isHighSeason, $bigStock);