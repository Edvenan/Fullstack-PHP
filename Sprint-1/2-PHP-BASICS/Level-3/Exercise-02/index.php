<html>
    <head>
        <title>Sprint 1 / PHP / Level-3 / Exercise-02</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 
            //Escriu un programa en PHP que compta el nombre total de vegades que un valor existeix en l'array.

            function count_value($myarray, $value){
                
                // Counter initizlization
                $counter = 0;

                // Go through each array element and check if identical to searched value. If so, increment counter.
                foreach ($myarray as $val){
                    
                    if ($val === $value){
                        $counter++;
                    }
                }
                // Print counter value
                echo "El valor '$value' s'ha trobat $counter vegades al següent array:<br>";
                print_r($myarray);
                echo "<br>";
            }

            // Call to function
            $X = array (10, 20, 30, 40, 20, 50, 90, 20);
            $S = array ('a', 'b', 'a', 'a', 'd', 'c', 'd', 'f', 'a');
            count_value($X, 20 );
            count_value($S, -1 );
        ?>
    </body>
</html>