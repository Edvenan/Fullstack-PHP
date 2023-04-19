<html>
    <head>
        <title>Sprint 1 / PHP / Level-1 / Exercise-5</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 

            // Creció d'arrays
             $array5 = array(5, 10, 15, 20, 25);        // array 5 integers
             $array3 = array(3, 6, 9);                  // array 3 integers
             

            // Afegeix un valor més a l'array que conté 3 integers.
            $array3[] = 12;

            // Mescla els dos arrays i imprimeix la mida de l'array resultant per pantalla.
            $mescla = array_merge($array5, $array3);
            shuffle($mescla);
            $mida = count($mescla);
            echo "La mida de l'array resultants és $mida <br>";

            // Ara imprimeix per pantalla l'array resultant valor a valor.
            echo "L'array resultant és: <br>";

            // amb for loop
            echo "'For' loop: ";
            for ($i=0; $i < count($mescla); $i++) { 
                echo $mescla[$i];
                if ($i != count($mescla)-1){
                    echo ", ";
                }
            }
                        
            print("<br>");
            
            // amb foreach loop
            echo "'Foreach' loop: ";
            foreach ( $mescla as $index =>$valor){
                echo $valor;
                if ($index != count($mescla)-1){
                    echo ", ";
                }
            }

            print("<br>");

            // amb foreach loop and ternary operator
            echo "'Foreach' loop & Ternary Operator: ";
            foreach ( $mescla as $index =>$valor){
                echo $valor;
                echo ($index != count($mescla)-1) ? ", ":"";
            }
            

           
            /* Pot ser que les funcions var_dump () i / o print_r () et resultin útils per
             a visualitzar el contingut de les teves arrays.*/

        ?>
    </body>
</html>