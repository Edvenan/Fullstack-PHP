<?php
        include "Account.php";
        session_start(); // Start the session

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Sprint 1 / PHP-OBJECTS / Level-3 / Exercise-01</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Dancing+Script&family=IM+Fell+Double+Pica&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
        <img src="./images/elephant.png" alt="Banc Arrota SA" height="115">
        <h1>Banc@rrota SL</h1>
    </header>
    <nav>
        <ul>
        <li class="crear"><a href="?option=1">Crear Compte</a></li>
        <li class="ingressar"><a href="?option=2">Ingressar</a></li>
        <li class="retirar"><a href="?option=3">Retirar</a></li>
        <li><a href="?option=4">Sortir</a></li>
        </ul>
    </nav>
    <div id="cos_opcio">
        <?php
            // Barra menú principal
            if(isset($_GET['option'])) {
                $option = $_GET['option'];
                switch($option) {
                    case '1':
                        //Crear account;
                        include "crear.php";
                        break;

                    case '2':
                        // Ingressar;
                        include "ingressar.php";
                        break;

                    case '3':
                        // Retirar;
                        include "retirar.php";
                        break;

                    case '4':
                        //Sortir
                        echo "Tots els comptes han estat el-liminats<br>";
                        echo "Adeu!<br><br><br>";
                        session_unset();
                        session_destroy();
                        break;
                }
            }
        ?>
    </div>
    <?php

    ?>
  </body>
</html>