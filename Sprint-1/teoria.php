
<html>
    <head>
        <title>Apuntes PHP</title>
    </head>
    <body>
        <?php 
            // PHP INFO
            #echo phpinfo();
            # variable
            // esto también es un comentario
            /*  Esto
                tambien 
                Shift+Alt+A ---> permite comentar un bloque de lineas
            */
            $nombre = 'Eduard'; // string
            $n = true;          // boolean
            $nn = 2;            // integer
            $nnn = 2.6;         // Float

            // printf  - incluye salto de linea
            printf("Mi nombre es %s", $nombre);
            
            //longitud de una cadena
            echo "<br>La longitud de la cadena $nombre es ".strlen($nombre)."<br>";
            
            // trim(), rtrim(), ltrim() - elimar leading, trailing spaces
            $text = "       Hola como estas?     ";
            echo ltrim($text) ."<br>";
            $text = "       Hola como estas?     ";
            echo rtrim($text) ."<br>";
            $text = "       Hola como estas?     ";
            echo trim($text) ."<br>";
            
            // strtoupper() / strtolower()  // strlen()  // strrev() //str_word_count()
            // strpos(strign, word)     //  str_replace(<w_2b_replaced>, <new_w>, str)
            
            // explode(separator, string) -> convierte string en array
            $mensaje = "Hola amigo mio";
            print_r( explode(' ', $mensaje));
            echo "<br>";
            
            /* constante */
            define("PI", 123456);
            echo "El valor de Pi es " . PI."<br>";
            
            
            // Referencias o Punteros
            $numero = 10;
            $ref = &$numero;
            $numero = 20;
            echo 'El valor de $ref es '.$ref."<br>"; // nos dará 20
            
            /* identificar tipo de dato */
            echo gettype($nnn).'<br>';
            var_dump($nn);
            $suma = $nn + $nnn;
            
            /* comillas simples vs dobles */
            echo "La suma de $nn + $nnn es: $suma".'<br>';
            echo 'La suma de $nn + $nnn es: $suma'.'<br>';
            
            /* concatenar strings con '.' */
            $nombre = "Eduard";
            $nombre_completo = $nombre." Vendrell";
            echo $nombre_completo.'<br>';
            
            // Arrays
            $my_array = [1,2,3,4];
            echo $my_array[3].'<br>';
            $numeros = array(1,2,3,4,5);
            echo $numeros[2].'<br>';
            
            // arrays asociativos (Dictionaries) (clave => valor)
            $edad = array(
                'juan' => 11,
                'pedro' => 20,
                'david' => 35
            );
            echo $edad['david'].'<br>';

            // imprimir contenido array
            echo "<pre>";
            var_dump($edad);
            echo "</pre>";
            echo '<br>Imprimimos contenido de array $edad:<br>';
            print_r($edad);
            echo "<br>";
            

            // ARRAYS:  
            //array_sum(array)       // array_splice(array, index)      // shuffle(array)       // count(array)
            // array_search(value, array) -> index      // array_merge(array1, array2)  //str_split(str)-> array

            // sumar contenido de un array
            $suma = array_sum($numeros);
            echo $suma.'<br>';
            
            // añadir elemento al final del array / array asociativo
            $numeros[] = 100;
            $edad['Eduard'] = 48;
            
            // eliminar elemento de un array
            $color = array("rojo", "verde", "azul");
            array_splice($color,2); // azul
            echo "<pre>";
            var_dump($color);
            echo "</pre>";
            
            // contar elementos array (len)
            echo count($color).'<br>';
            echo count($numeros).'<br>';
            
            // buscar posicion de elementos en array
            echo array_search(4, $numeros).'<br>'; // elemento  -devuelve posicion
            
            // combinar arrays
            $string1 = ["Ho"]; $string2 = ["la"];
            $final = array_merge($string1, $string2);
            
            // ordenar arrays
            asort($final);
            
            // reverse sorting
            rsort($final);
            
            //ordenar en reverso sin perder posicion
            arsort($final);
            
            // igualdad
            $a = 5 === 5.0; // no identico
            var_dump($a);
            $a = 5 === 5; // identico
            var_dump($a);
            $a = 5 == 5.0; // igual
            var_dump($a);
            
            // spaceship <=>:  0: iguales 1: a>b -1: a<b
            $a = 5 <=> 7; // devuelve -1
            $a = 5 <=> 5.0; // devuelve 0
            
            // !:not  &&:and  ||:or
            
            // estructuras de control
            // IF ELSE
            $n1 = 8;
            $n2 = 8;
            if ($n1 > $n2) {
                echo "$n1 es mayor que $n2".'<br>';
            }
            elseif ( $n1 == $n2 && $n1 === $n2) {
                echo "$n1 es igual que $n2".'<br>';
            }
            else {
                echo "$n1 es menor que $n2".'<br>';
            }
            
            // Operador Ternario
            $miNumero = 20;
            $resultado = ($miNumero < 40) ? "Menor<br>" : "Mayor<br>";
            echo $resultado;
            
            // SWITCH - CASE - BREAK
            $curso = "python";
            switch($curso) {
                case 'java':
                    echo "Java desde cero".'<br>';
                    break;
                case 'python':
                    echo "Python desde cero".'<br>';
                    break;
                
                default:
                    echo "No disponible".'<br>';
                    break;
            }
            
            // FOR
            for ($i=0; $i <= 10; $i++) {
                $resultado = 4 * $i;
                echo "4 x $i = $resultado <br>";
            }
            
            // FOREACH
            echo gettype($numeros).'<br>'; // array
            
            foreach ($numeros as $num) {    
                echo gettype($num).'<br>'; // $num es un int
                echo $num.'<br>';
            }
            foreach($edad as $clave => $valor) {
                echo "<br>El valor de la clave $clave es $valor.<br>";
            }
            foreach ($edad as $key => $value) {
                echo $key.' tiene '.$value.' años'.'<br>';
            }
            
            // WHILE
            $i = 0;
            while ($i <= 10) {
                echo "Numero $i<br>";
                $i++;
            }
            
            // DO WHILE (se ejecuta almenos una vez)
            do {
                echo "Numero $i<br>";
                $i++;
            } while ($i <= 10);
            
            // BREAK - interrumpe un bucle
            // CONTINUE - salta un loop (parte de codigo) en un bucle
            
            // FUNCIONES
            function miFuncion(){
                return "Eduard";
            }
            function Suma($a, $b){
                return $a+$b;
            }
            echo "<br>";
            echo "mi nombre es ".miFuncion();
            echo "<br>";
            $a = 4;
            $b = 5;
            printf("La suma de %d más %d es igual a %d",$a,$b,Suma($a, $b));
        ?>
    </body>


</html>
