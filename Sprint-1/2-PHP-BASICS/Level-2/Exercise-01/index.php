<html>
    <head>
        <title>Sprint 1 / PHP / Level-2 / Exercise-1</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 
            // Funció per fer la suma especial
            function suma_especial($num1, $num2){
                //Imprimir el valor de cada variable
                
                // if both values are equal, torna el doble de la seva suma. Else, torna la seva suma
                if ($num1 == $num2){
                    echo (($num1 + $num2) * 2)."<br>";
                }
                else{
                    echo ($num1 + $num2)."<br>";
                }
            }

            // Crida a funcions 
            suma_especial(1,2);
            suma_especial(3,2);
            suma_especial(2,2);

        ?>
    </body>
</html>