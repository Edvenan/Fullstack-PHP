<html>

<head>
    <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-2 / Exercise-01</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    Ens han demanat un llistat de cada any on es van produir jocs olímpics des de 1960 inclòs fins al 2016.
    Programa un bucle que calculi i mostri per pantalla els anys olímpics dins de l'interval esmentat.
    */
    function olympic_years($year1, $year2){
        echo "Olympic years between $year1 and $year2:<br>";
        for ($i=$year1; $i <= $year2 ; $i+=4) { 
            echo "$i<br>";
        }
    }

    // Call to function
    olympic_years(1960, 2016);
    ?>
</body>

</html>