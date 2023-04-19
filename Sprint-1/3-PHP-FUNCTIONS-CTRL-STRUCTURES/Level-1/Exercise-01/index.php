<html>
    <head>
        <title>Sprint 1 / PHP-FUNCTIONS-CTRL-STRUCTURES / Level-1 / Exercise-01</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <?php 
            //Programa una funció que, donat un número qualsevol (per exemple, la teva edat) ens digui
            // si és parell o imparell mitjançant un missatge per pantalla.

            function odd_even($num){
                
                echo "El número '$num' és ";
                
                // use module operator to determine odd or even
                echo ($num%2 == 0) ? "parell" : "senar";
                
                echo ".<br>";
            }
            
            // Call to function
            odd_even( 40 );
            odd_even( 55 );
        ?>
    </body>
</html>