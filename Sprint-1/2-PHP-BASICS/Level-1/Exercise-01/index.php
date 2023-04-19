
<html>
    <head>
        <title>Sprint 1 / PHP / Level-1 / Exercise-01</title>
    </head>
    <body>
        <?php 

            /*  Defineix una variable de cada tipus: integer,double,string i boolean. 
                Després, imprimeix-les per pantalla.
            */
            $numero = 2;            // integer
            $decimal = 2.6;         // double
            $nombre = 'Eduard';     // string
            $encontrado = true;     // boolean

            echo 'Mi variable "$numero" es igual a '.$numero." y es de tipo ";
            echo gettype($numero)."   [ ";
            var_dump($numero);
            echo "]<br>";

            echo 'Mi variable "$decimal" es igual a '.$decimal." y es de tipo ";
            echo gettype($decimal)."   [ ";
            var_dump($decimal);
            echo "]<br>";
            
            echo 'Mi variable "$nombre" es igual a '.$nombre." y es de tipo ";
            echo gettype($nombre)."   [ ";
            var_dump($nombre);
            echo "]<br>";
            
            echo 'Mi variable "$encontrado" es igual a '.$encontrado." y es de tipo ";
            echo gettype($encontrado)."   [ ";
            var_dump($encontrado);
            echo "]<br>";
            
        ?>
    </body>
</html>
