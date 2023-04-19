<html>

<head>
    <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-1 / Exercise-04</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    Per jugar a l'"amagatall" se'ns ha demanat un programa que compti fins a 10.
    Però la persona que comptarà és una mica tramposa i ho farà comptant de dos en dos.
    Crea una funció que compti fins a 10, de 2 en 2, mostrant cada número del compte per pantalla.
    Imagina't que volem que compti fins a un nombre diferent de 10. Programa la funció perquè el final
    del compte estigui parametritzat.
    Per prevenir oblits en utilitzar la nostra meravellosa opció "amagatall" establirem un paràmetre 
    per defecte igual a 10 a la funció que s'encarrega de fer aquest compte.
    */
    function compta($top=10){
        for ($i = 2; $i <= $top; $i += 2) {
            echo "$i<br>";
        }
    }

    // Call to function
    compta();
    ?>
</body>

</html>