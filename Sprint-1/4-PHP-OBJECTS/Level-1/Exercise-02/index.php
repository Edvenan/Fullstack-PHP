<html>

<head>
    <title>Sprint 1 / PHP-OOP / Level-1 / Exercise-02</title>
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

    require 'Classes.php';

    // Class instantiation
    $triangle1 = new Triangle(10,5);
    $rectangle1 = new Rectangle(10,5);

    // Call to object methods
    $triangle1->area();
    $rectangle1->area();
    ?>
</body>
</html>
