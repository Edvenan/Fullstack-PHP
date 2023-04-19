<html>

<head>
    <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-2 / Exercise-03</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    La criba d'Eratòstenes és un algoritme pensat per a trobar nombres primers
    dins d'un interval donat. Basant-te en la informació de l'enllaç adjunt, 
    implementa la criba d'Eratòstenes dins d'una funció, de tal forma que 
    puguem invocar la funció per a un número concret.
    */


    function criba_Eratostenes($num){
        // Guardamos todos los números naturales desde 2 hasta $num en un array
        $taula = range(2, $num);

        // Creamos 2 arraya adicionales que nos serviran para guardar números 
        // marcados ($marcats) y los números no marcados o primos ($primers)
        $marcats = [];
        $primers = [];

        // Para $i desde 2 hasta raiz cuadrada de $num
        for ($i=2; $i <= floor(sqrt($num)); $i++) { 
            // si $i no ha sido marcado entonces:
            if (!in_array($i, $marcats)){
                // Para $j desde $i hasta $num/$i hacemos lo siguiente:
                for ($j=$i; $j <= $num/$i ; $j++) { 
                    // Añadimos a $marcats $i x $j
                    $marcats[] = $i * $j;
                }
            }
        }
        // El resultado es todos los  números sin marca.
        // Para determinarlos, comprobamos si cada elemento de $taula está
        // en $marcats. En caso afirmativo, pasamos al siguiente elemento.
        // En caso negativo, añadimos dicho elemento a $primers
        for ($i=0; $i < $num-1 ; $i++) { 
            if (!in_array($taula[$i], $marcats)){
                $primers[] = $taula[$i];
            }
        }
        // Retornamos el array $primers con el resultado
        return $primers;
    }

    // Call to function
    $num = 25;
    echo "Nombres primers entre 0 i $num: <br>";
    echo '<pre>'; print_r(criba_Eratostenes($num)); echo '</pre>';
    ?>
</body>
</html>