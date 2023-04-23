<?php
// define variables
$compteErr = $qtyErr = "";

if (isset($_SESSION['bank'])) {
    if (($_SERVER['REQUEST_METHOD'] == 'POST') &&  (!empty($_POST["compte"])) && (!empty($_POST["amount"]))) {
        $compte = clean_input($_POST['compte']);
        $amount = clean_input($_POST['amount']);
        // check if compte and amount only contains numbers
        if (!preg_match("/^[0-9]*$/",$compte) || !preg_match("/^[0-9]*$/",$amount)) {
            $compteErr = "Només es permeten nombres";
            echo "Només es permeten nombres!";
            ?>
            <body id="ingressar"></body>
            <?php
            }
        else {
            $trobat = false;
            foreach ($_SESSION['bank'] as $bnk){
                if($bnk->getCompte() == $compte){
                    $trobat = true;                
                    $bnk->setSaldo($amount); 
                    echo "<br>Ingrés realitzat correctament:<br><br>";
                    echo "Num. Compte: ".$bnk->getCompte();
                    echo "  => Titular: ".$bnk->getNom()." ".$bnk->getCognoms();
                    echo "  => Saldo: ".$bnk->getSaldo()."<br>";
                }
            }
            if (!$trobat){
                echo "El compte seleccionat no existeix!";
                ?>
                <body id="ingressar"></body>
                <?php
            }
        }
    }
    else{
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && ($_POST['compte'] == 0) && (!empty($_POST["amount"]))){
            echo "El compte seleccionat no existeix!";
            ?>
            <body id="ingressar">
            <?php
        } else{
            echo "Llistat de comptes oberts:<br><br>";

            foreach ($_SESSION['bank'] as $bnk){
                echo "Num. Compte: ".$bnk->getCompte();
                echo "  => Titular: ".$bnk->getNom()." ".$bnk->getCognoms();
                echo "  => Saldo: ".$bnk->getSaldo()."<br>";
            }
            echo "<br>---------------------------------------------------<br>";
            echo "<br>Selecciona número de compte i quantitat a ingressar:<br><br>";
            ?>
            <body id="ingressar">
                <form method="POST">
                    <label for="compte">Num. de Compte:</label>
                    <input type="text" name="compte"  style="width: 75px;">
                    <span class="error">* </span>
                    <span class="hide">camp requerit.<?php echo $compteErr;?></span>
                    <br>    
                    <label for="amount">Quantitat:</label>
                    <input type="text" name="amount"  style="width: 75px;">
                    <span class="error">* </span>
                    <span class="hide">camp requerit.<?php echo $qtyErr;?></span>
                    <br><br>
                    <input type="submit" value="Desar">
                </form>
            </body>
            <?php
        }
    }

} else {
    echo "Primer has de crear un compte!";
    ?>
    <body id="ingressar"></body>
    <?php
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>