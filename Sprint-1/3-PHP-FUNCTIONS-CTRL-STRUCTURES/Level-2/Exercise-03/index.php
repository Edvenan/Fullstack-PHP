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
    Imagina que som a una botiga on es ven:
    - Xocolata: 1 euro
    - Xiclets: 0,50 euros
    - Caramels: 1,50 euros
    Implementa un programa que permeti afegir càlculs a un total de compres d'aquest tipus.
    Per exemple, que si comprem:
        2 xocolates, 1 de xiclets i 1 de caramels
    tinguem un programa que permeti anar afegint els subtotals a un total, tal que així:

        funció(2 xocolates) + funció(1 de xiclets) + funció(1 de carmels) = 2 + 0.5 + 1.5
    */


    function funcio($compra){
        $articles = ['xocolat'=>1.0, 'xiclet'=>0.50, 'caramel'=>1.50];
        
        $xocolata = 1.50;
        $xiclets = 0.50;
        $caramels = 1.50;
        
        // comprobem quin article compra dels 3 disponibles
        foreach ($articles as $key=>$val){
            // Cerquem al paràmetre $compra si existeix un dels articles disponibles
            $result = strpos(strtolower($compra), $key);
            if ($result != false){
                // Existeix article. Trobem qty i calculem preu
                // recollim el numero del string (qty) i convertim a int
                // Ho fem recollint la part esquerra de l'string fins el primer " "
                $qty = (int) strstr($compra," ",true);
                // calculem cost (qty * preu) i el retornem
                return ($qty * $val);
            }
        }
    }

    // Call to function
    echo "Total compra: ";
    echo funcio("2 xocolates") + funcio("1 de xiclets") + funcio("1 de caramels");
    ?>
</body>
</html>