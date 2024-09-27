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
if (empty($_POST['Nom'])) {
    $nom = $_POST['Nom1'];
} else {
    $nom = $_POST['Nom'];
}

if (empty($_POST['Prenom'])) {
    $prenom = $_POST['Prenom1'];
} else {
    $prenom = $_POST['Prenom'];
}

if (empty($_POST['Email'])) {
    $email = $_POST['Email1'];
} else {
    $email = $_POST['Email'];
}

if (empty($_POST['Adresse'])) {
    $adresse = $_POST['Adresse1'];
} else {
    $adresse = $_POST['Adresse'];
}

if (empty($_POST['Code_postal'])) {
    $code_postal = $_POST['Code_postal1'];
} else {
    $code_postal = $_POST['Code_postal'];
}

if (empty($_POST['Mdp'])) {
    $mdp = $_POST['Mdp1'];
} else {
    $mdp = $_POST['Mdp'];
}
// Préparer la requête SQL avec des paramètres de substitution
$execut_select = "UPDATE `compte_client` SET `Nom` = ?, `Prenom` = ?, `Email` = ?, `Adresse` = ?, `Code_postal` = ?, `Mdp` = ? WHERE `Id_client` = ?";
$stmt = $link->prepare($execut_select);

echo "$nom, $prenom, $email, $adresse, $code_postal, $mdp, $ID <br>";
if ($stmt) {
    // Lier les paramètres
    $stmt->bind_param("ssssisi", $nom, $prenom, $email, $adresse, $code_postal, $mdp, $ID);

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
