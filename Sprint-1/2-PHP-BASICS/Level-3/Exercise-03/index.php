<html>
    <head>
        <title>Sprint 1 / PHP / Level-3 / Exercise-03</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 
            //Elimina un element de l’array. Després d'eliminar l'element, les claus senceres han de ser normalitzades.

            function remove_value($myarray, $value){
                
                // Print original array                
                var_dump($myarray);
                echo "<br>";

                // Go through each array element and check if identical to the value to be removed. If so, remove it.
                for ($i=0; $i < count($myarray); $i++) { 

                    if ($myarray[$i] === $value){
                        // array element identical to chosen value
                        // remove element and decrement counter to analyze next element
                        array_splice($myarray, $i, 1);
                        $i--;
                    }
                }
                // Print resulting array after removing chosen value
                var_dump($myarray);
                echo "<br>";
            }

            // Call to function
            $X = array (10, 20, 30, 40, 20, 50, 90, 20);
            $S = array ('a', 'b', 'a', 'a', 'd', 'c', 'd', 'f', 'a');
            remove_value($X, 40 );
            remove_value($S, 'a' );
        ?>
    </body>
</html>