<html>

<head>
    <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-1 / Exercise-05</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    Escriure una funció per verificar el grau d'un/a estudiant d'acord amb la nota.
    */
    function grau($nota){
        
        if ($nota < 33){
            echo "L'estudiant ha de reprovar.<br>";
        }
        else if ($nota <= 44){
            echo "L'estudiant pertany a Tercera Divisió.<br>";
        }
        else if ($nota <= 59){
            echo "L'estudiant pertany a Segona Divisió.<br>";
        }
        else {
            echo "L'estudiant pertany a Primera Divisió.<br>";
        }
    }

    // Grade declaration
    $nota = '60%';
    
    // Convert string to integer
    $nota = (int) $nota;
    // Call to function
    grau($nota);
    ?>
</body>

</html>