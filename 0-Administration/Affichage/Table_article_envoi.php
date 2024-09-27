<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); //Connexion a la base de donnée avec la valeur $link
mysqli_set_charset($link, "utf8");  // Il y a des problèmes si ont le met pas CAR C POURRI MYSQLI

if (mysqli_connect_errno()) {   // test la connexion
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}


$ID = $_POST['ID'];
if (empty($_POST['Type'])) {
    $Type = $_POST['Type1'];
} else {
    $Type = $_POST['Type'];
}

if (empty($_POST['Name'])) {
    $Name = $_POST['Name1'];
} else {
    $Name = $_POST['Name'];
}

if (empty($_POST['Description'])) {
    $Description = $_POST['Description1'];
} else {
    $Description = $_POST['Description'];
}

if (empty($_POST['Marque'])) {
    $Marque = $_POST['Marque1'];
} else {
    $Marque = $_POST['Marque'];
}

if (empty($_POST['Gamme'])) {
    $Gamme = $_POST['Gamme1'];
} else {
    $Gamme = $_POST['Gamme'];
}

if (empty($_POST['Quantite'])) {
    $Quantite = $_POST['Quantite1'];
} else {
    $Quantite = $_POST['Quantite'];
}

if (empty($_POST['Prix_vente'])) {
    $Prix_vente = $_POST['Prix_vente1'];
} else {
    $Prix_vente = $_POST['Prix_vente'];
}

$Prix_revient=$Prix_vente*20/100;

if (empty($_POST['Critere_1'])) {
    $Critere_1 = $_POST['Critere_11'];
} else {
    $Critere_1 = $_POST['Critere_1'];
}

if (empty($_POST['Critere_2'])) {
    $Critere_2 = $_POST['Critere_21'];
} else {
    $Critere_2 = $_POST['Critere_2'];
}

if (empty($_POST['Critere_3'])) {
    $Critere_3 = $_POST['Critere_31'];
} else {
    $Critere_3 = $_POST['Critere_3'];
}

if (empty($_POST['Critere_4'])) {
    $Critere_4 = $_POST['Critere_41'];
} else {
    $Critere_4 = $_POST['Critere_4'];
}

if (empty($_POST['Critere_5'])) {
    $Critere_5 = $_POST['Critere_51'];
} else {
    $Critere_5 = $_POST['Critere_5'];
}

if (empty($_POST['Actif2'])){
    if (empty($_POST['Actif'])) {
        $Actif = $_POST['Actif1'];
    } else {
        $Actif = $_POST['Actif'];
    }
}else{
    $Actif=null;
}

// Préparer la requête SQL avec des paramètres de substitution
$execut_select = "UPDATE `article` SET `Type` = ?, `Name` = ?, `Description` = ?, `Marque` = ?, `Gamme` = ?, `Quantité` = ?, `Prix_vente` = ?, `Critere_1` = ?, `Critere_2` = ?, `Critere_3` = ?, `Critere_4` = ?, `Critere_5` = ?, `Actif`=?  WHERE `Id_article` = ?";
$stmt = $link->prepare($execut_select);

if ($stmt) {
    // Lier les paramètres
    $stmt->bind_param("sssssidssssssi", $Type, $Name, $Description, $Marque, $Gamme, $Quantite, $Prix_vente, $Critere_1, $Critere_2, $Critere_3, $Critere_4, $Critere_5,$Actif, $ID);

    // Exécuter la requête préparée
    $stmt->execute();

    // Vérifier si la mise à jour a réussi
    if ($stmt->affected_rows > 0) {
        echo 'La mise à jour a réussi !';
    } else {
        echo 'Aucune mise à jour effectuée ou erreur lors de la mise à jour.';
    }

    // Fermer la déclaration préparée
    $stmt->close();
} else {
    echo 'Erreur de préparation de la requête : ' . $link->error;
}

// Fermer la connexion
$link->close();
?>
