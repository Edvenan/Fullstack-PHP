<html>

<head>
    <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-2 / Exercise-02</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    Escriu una funció que determini la quantitat total a pagar per una trucada telefònica segons
    les següents premisses:
    - Tota trucada que duri menys de 3 minuts té un cost de 10 cèntims.
    - Cada minut addicional a partir dels 3 primers és un pas de comptador i costa 5 cèntims.
    */
    function cost_trucada($mins){
        if ($mins > 0 && $mins <= 3) {
            $cost = 0.10;
        }
        elseif ($mins > 3){
            $cost = (0.10 + ($mins - 3)*0.05);
        }
        else{
            echo "Durada ha de ser major que zero.<br>";
            return;
        }
        
        echo "Durada de la trucada: ".$mins." mins.<br>";
        echo "Cost de la trucada: ";
        if ($cost < 1){
            echo ($cost*100)." cèntims.<br>";
        }
        else{
            echo $cost." euros.<br>";
        }  
    }

    // Call to function
    $durada = 1;
    cost_trucada($durada);
    ?>
</body>
</html>