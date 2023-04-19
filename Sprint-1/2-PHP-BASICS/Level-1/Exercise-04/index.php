<html>
    <head>
        <title>Sprint 1 / PHP / Level-1 / Exercise-4</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 

            // Declaració de variables
             $x = 10;       // int
             $y = 20;       // int
             $n = 5.3;      // double/float
             $m = 1.5;      // double/float

            // Funció per tal d'evitar duplicar codi
             function operaciones($nom1, $nom2, $val1, $val2){
                //Imprimir el valor de cada variable
                echo "$nom1 = ".$val1."<br>";
                echo "$nom2 = ".$val2."<br>";
                //Imprimir operaciones entre nom1 i nom2
                echo "$nom1 + $nom2 = ".$val1 + $val2."<br>";
                echo "$nom1 - $nom2 = ".$val1 - $val2."<br>";
                echo "$nom1 x $nom2 = ".$val1 * $val2."<br>";
                echo "$nom1 % $nom2 = ".$val1 % $val2."<br>";
                echo "------------------<br>";
            }
            
            // Crida a funcions 
            operaciones("X", "Y", $x, $y);
            operaciones("N", "M", $n, $m);

            // Imprimir el valor de cada variable
            echo "Doble de X = ".($x*2)."<br>";
            echo "Doble de Y = ".($y*2)."<br>";
            echo "Doble de N = ".($n*2)."<br>";
            echo "Doble de M = ".($m*2)."<br>";

            // Imprimir suma i producte de totes les variables
            echo "La suma de X + Y + N + M = ".($x+$y+$n+$m)."<br>";
            echo "El Producte de X x Y x N x M = ".($x*$y*$n*$m)."<br>";

        ?>
    </body>
</html>