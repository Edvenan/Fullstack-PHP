<html>
    <head>
        <title>Sprint 1 / PHP / Level-3 / Exercise-01</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 
            //Escriu un programa en PHP per convertir una cadena en un array (retallant cada caràcter i eliminant les línies buides).

            function string2array($cadena){
                // Add each char in $cadena (different to " ") into $myarray
                echo "La cadena original és: ".$cadena."<br>";
                for ($i=0; $i < strlen($cadena); $i++) { 
                    if ($cadena[$i] !=" "){
                        $myarray[] = $cadena[$i];
                    }
                }
                // Print resulting array
                echo "L'array resultant és:<br>";
                var_dump($myarray);
            }

            // Call to function
            $text = "Hello world";
            string2array($text);
            
        ?>
    </body>
</html>