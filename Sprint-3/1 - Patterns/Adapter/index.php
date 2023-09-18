<?php

/**
 * ADAPTER PATTERN
 * /

/*     El següent problema va ser adaptat de [FREEMAN] pàgs. 238-240.

       Suposa que tens les següents dues classes de PHP.

       Arxiu: poultry.php

       class Duck {

              public function quack() {
                     echo "Quack \n";
              }

              public function fly() {
                     echo "I'm flying \n";
              }
       }

       class Turkey {

              public function gobble() {
                     echo "Gobble gobble \n";
              }

              public function fly() {
              echo "I'm flying a short distance \n";
              }
       }

       Vols que els seus galls d'indi es comportin com ànecs, de manera que has d'aplicar el adapter 
       pattern. En el mateix arxiu, escriu una classe anomenada TurkeyAdapter i assegura't que tingui
       en compte el següent:

       La traducció de l'quack entre classes és fàcil: simplement crida al mètode Gobble quan sigui
       apropiat.

       Encara que ambdues classes tenen un mètode fly, els galls dindis només poden volar a ratxes
       curtes, no poden volar llargues distàncies com els ànecs. Per mapejar entre el mètode fly 
       d'un ànec i el mètode del gall dindi, s'ha de trucar al mètode fly del gall dindi cinc 
       vegades per compensar-ho.

       Prova la teva classe amb el següent codi:

       Arxiu: index.php

       function duck_interaction($duck) {
              $duck->quack();
              $duck->fly();
       }

       $duck = new Duck;
       $turkey = new Turkey;
       $turkey_adapter = new TurkeyAdapter($turkey);
       echo "The Turkey says...\n";
       $turkey->gobble();
       $turkey->fly();
       echo "The Duck says...\n";
       duck_interaction($duck);
       echo "The TurkeyAdapter says...\n";
       duck_interaction($turkey_adapter);

       Output
       The expected output is as follows:
       The Turkey says...
       Gobble gobble
       I'm flying a short distance
       The Duck says...
       Quack
       I'm flying
       The TurkeyAdapter says...
       Gobble gobble
       I'm flying a short distance
       I'm flying a short distance
       I'm flying a short distance
       I'm flying a short distance
       I'm flying a short distance
*/

require "poultry.php";

function duck_interaction($duck) {
       $duck->quack();
       $duck->fly();
}

$duck = new Duck;
$turkey = new Turkey;
$turkey_adapter = new TurkeyAdapter($turkey);
echo "The Turkey says...\n";
$turkey->gobble();
$turkey->fly();
echo "The Duck says...\n";
duck_interaction($duck);
echo "The TurkeyAdapter says...\n";
duck_interaction($turkey_adapter);

?>