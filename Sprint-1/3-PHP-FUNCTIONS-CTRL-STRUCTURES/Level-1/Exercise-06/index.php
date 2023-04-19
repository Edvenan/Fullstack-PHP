<html>

<head>
    <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-1 / Exercise-06</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    Escriu La funció isBitten () que retorna TRUE amb un 50% de probabilitat i FALSE en cas contrari.
    */
    function isBitten(){
        $result = (rand(0,1))? "TRUE" : "FALSE";
        return $result;
    }

    // Call to function
    echo isBitten();
    ?>
</body>

</html>