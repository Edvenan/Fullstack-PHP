<html>

<head>
    <title>Sprint 1 / PHP-OOP / Level-2 / Exercise-01</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
  
    /* 
    Crea la classe PokerDice. Les cares d'un dau de pòquer tenen les següents figures:
     As, K, Q, J, 7 i 8.
    
    Crea el mètode throw que no fa altra cosa que tirar el dau, és a dir, genera un valor
    aleatori per a l'objecte a què se li aplica el mètode.

    Crea també el mètode shapeName, que digui quina és la figura que ha sortit en l'última
    tirada del dau en qüestió.

    Realitza una aplicació que permeti tirar cinc daus de pòquer alhora.

    A més, programa el mètode getTotalThrows que ha de mostrar el nombre total de tirades entre tots els daus.
    */

    // include class file
    require 'PokerDice.php';
    
    // object instantiation
    $my_dice1 = new PokerDice();
    $my_dice2 = new PokerDice();
    $my_dice3 = new PokerDice();
    $my_dice4 = new PokerDice();
    $my_dice5 = new PokerDice();
    // array of dices
    $dices = [$my_dice1, $my_dice2,  $my_dice3,  $my_dice4,  $my_dice5];

    // Define number of throws of all 5 dices together
    $tiradas = 10;
    
    // throw all 5 dices together amd repeat as many times as $tiradas
    for ($i=1; $i <= $tiradas; $i++) { 
        foreach ($dices as $index=>$dice){
            $dice->throw();
            echo "El dau ".($index+1)." mostra: ".$dice->shapeName()."<br>";
        }
    }

    //Check total throws
    echo "Número total de tirades: ";
    echo PokerDice::getTotalThrows();
    echo "<br>";
    ?>
</body>
</html>