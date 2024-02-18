<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';
$dbname = 'commerce';

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");

if (mysqli_connect_errno()) {
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = 5;
    $nom = $_POST['nom'];
    $desc = $_POST['desc'];
    
    if (empty($_POST['marque1'])){
        $marque = $_POST['marque'];
    }
    else{
        $marque = $_POST['marque1'];
    }

    if (empty($_POST['gamme1'])){
        $gamme = $_POST['gamme'];
    }
    else{
        $gamme = $_POST['gamme1'];
    }
    
    $p_revient = $_POST['p_revient'];
    $p_vente = $_POST['p_vente'];
    $quantite = $_POST['quantite'];
    
    if (empty($_POST['Crit1'])){ // regarde si POST crit 1 est vide 
        $Critere_1 = $_POST['Critere_1'];// SI oui Critere_1 prend la valeur du menu déroulant
    }
    else{
        $Critere_1 = $_POST['Crit1'];// Sinon prend la valeur dans le truc de texte
    }

    if (empty($_POST['Crit2'])){
        $Critere_2 = $_POST['Critere_2'];
    }
    else{
        $Critere_2 = $_POST['Crit2'];
    }

    if (empty($_POST['Crit3'])){
        $Critere_3 = $_POST['Critere_3'];
    }
    else{
        $Critere_3 = $_POST['Crit3'];
    }
    
    $query = "INSERT INTO `article` (`Id_article`, `Type`, `Name`, `Description`, `Marque`,`Gamme`, `Quantité`, `Prix_revient`, `Prix_vente`, `Critere_1`, `Critere_2`, `Critere_3`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isssssddsss", $type, $nom, $desc, $marque, $gamme, $quantite, $p_revient, $p_vente, $Critere_1, $Critere_2, $Critere_3);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "L'insertion a réussi."; // Il faut mettre la page de présentation 
        } else {
            echo "Erreur lors de l'insertion : " . mysqli_error($link);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête : " . mysqli_error($link);
    }
} else {
    echo "Tous les champs du formulaire ne sont pas définis.";
}

mysqli_close($link);
?>
