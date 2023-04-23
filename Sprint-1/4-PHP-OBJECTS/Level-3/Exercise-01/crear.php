<?php
// define variables and set to empty values
$nomErr = $cognomsErr = "";

if (($_SERVER['REQUEST_METHOD'] == 'POST') &&  (!empty($_POST["nom"])) && (!empty($_POST["cognoms"]))) {
                            
    $nom = clean_input($_POST['nom']);
    $cognoms = clean_input($_POST['cognoms']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nom) || !preg_match("/^[a-zA-Z ]*$/",$cognoms)) {
        echo "Només es permeten lletres i espais!";
        ?>
        <body id="crear"></body>
        <?php
    } else {
        $_SESSION['bank'][] = new Account($nom, $cognoms);
        if (isset($_SESSION['bank'])) {

            if (!isset($_SESSION['num_compte'])){
                $_SESSION['num_compte'] = 1;
            }
            end($_SESSION['bank'])->setCompte($_SESSION['num_compte']);
            $_SESSION['num_compte']++;
            $bnk = end($_SESSION['bank']);
            echo "<br>Compte creat correctament:<br><br>";
            echo "Num. Compte: ".$bnk->getCompte();
            echo "  => Titular: ".$bnk->getNom()." ".$bnk->getCognoms();
            echo "  => Saldo: ".$bnk->getSaldo()."<br>";
        }
    }
}
else{
    echo "Crear nou compte:<br><br>";
    ?>
    <body id="crear">
    <form method="POST">
    <label for="nom">Nom:</label>
    <input type="text" name="nom">
    <span class="error">* <?php echo $nomErr;?></span>
    <span class="hide">camp requerit.</span>
    <br>
    <label for="cognoms">Cognoms:</label>
    <input type="text" name="cognoms">
    <span class="error">* </span>
    <span class="hide">camp requerit.<?php echo $cognomsErr;?></span>
    <br><br>
    <input type="submit" value="Desar">
    </form>
    </body>
    <?php
}

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>