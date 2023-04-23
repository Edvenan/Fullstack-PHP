<html>

<head>
    <title>Sprint 1 / PHP-OOP / Level-1 / Exercise-01</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    /* 
    Escriu un programa que defineixi una classe Shape amb un constructor
    que rebi com a paràmetres l'ample i alt. Defineix dues subclasses;
    Triangle i Rectangle que heretin de Shape i que calculin respectivament 
    l'àrea de la forma area().

    A l'arxiu main defineix dos objectes, un triangle i un rectangle i truca al
    mètode area de cadascun.
    */

    class Shape{
        // Class attributes
        protected $ample;
        protected $alt;

        // Constructor function
        public function __construct($ample, $alt){
            $this->ample = $ample;
            $this->alt = $alt;
        }
    }

    class Triangle extends Shape {

        // Print message function
        public function area(){
            $area = ($this->ample * $this->alt/2);
            echo "L'area del Triangle és $area.<br>";
        }
    }

    class Rectangle extends Shape {

        // Print message function
        public function area(){
            $area = ($this->ample * $this->alt);
            echo "L'area del Rectangle és $area.<br>";
        }
    }
    ?>
</body>
</html>