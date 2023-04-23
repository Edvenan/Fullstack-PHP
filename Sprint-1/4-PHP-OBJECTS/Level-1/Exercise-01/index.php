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
    Crea una classe Employee, defineix com a atributs el seu nom i sou. 
    Definir un mètode initialize que rebi com a paràmetres el nom i sou.
    Plantejar un segon mètode print que imprimeixi el nom i un missatge si
    ha de pagar o no impostos (si el sou supera 6000, paga impostos).
    */

    class Employee{
        // Class attributes
        private $nom;
        private $sou;

        // Initialization function
        public function initialize($nom, $sou){
            $this->nom = $nom;
            $this->sou = $sou;
        }

        // Print message function
        public function print(){
            echo "$this->nom ";
            if ($this->sou > 6000){
                echo "ha de pagar impostos.<br>";
            }
            else {
                echo "no ha de pagar impostos.<br>";
            }
        }
    }

    // Class instantiation
    $emp1 = new Employee();
    // Call to functions
    $emp1->initialize("Eduard", 5000);
    $emp1->print();

    ?>
</body>
</html>