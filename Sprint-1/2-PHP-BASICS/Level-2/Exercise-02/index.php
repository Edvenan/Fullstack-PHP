<html>
    <head>
        <title>Sprint 1 / PHP / Level-2 / Exercise-2</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 
            // Escriu un programa PHP per intercanviar el primer i últim caràcter d'una cadena donada i imprimeix la nova cadena.

            function intercanvi($cadena){
                // Check string has at least two chars
                if (strlen($cadena) <= 1){
                    echo "La cadena ha de tenir un mínim de 2 caracters.";
                }
                else {
                    // Swap first and last chars
                    echo "La cadena original és: ".$cadena."<br>";
                    $first_char = $cadena[0]; 
                    $last_char = $cadena[strlen($cadena)-1];
                    $cadena[0] = $last_char;
                    $cadena[strlen($cadena)-1] = $first_char;
                    echo "La cadena resultant és: ".$cadena."<br>";
                }
            }

            // Call to function
            $text = "Hello, World!";
            $text = "H";
            $text = "";
            $text = 223232323;
            intercanvi($text);
            
        ?>
    </body>
</html>