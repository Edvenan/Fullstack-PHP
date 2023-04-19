<html>
    <head>
        <title>Sprint 1 / PHP / Level-1 / Exercise-2</title>
    </head>
    <body>
        <?php 

            // Mensaje de texto
            $mensaje = "Hello, World!";
            
            // Imprimir Mensaje
            echo $mensaje."<br>";
            
            // Imprimir mensaje en mayúsculas
            echo strtoupper($mensaje)."<br>";
            
            // longitud de mensaje
            echo "La longitud del texto '$mensaje' es de ".strlen($mensaje)." caracteres.<br>";

            // Imprimir mensaje al revés
            echo strrev($mensaje)."<br>";

            // Concatenear anterior string con nuevo string
            $mensaje2 = "Aquest és el curs de PHP";
            echo $mensaje." ".$mensaje2

        ?>
    </body>
</html>