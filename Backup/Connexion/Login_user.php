<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';
$dbname = 'commerce';

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);

if (mysqli_connect_errno()) {
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

$mail = $_POST['mail'];
$psw = $_POST['psw'];

$query = "SELECT `Email`, `Mdp`, `Prenom` FROM `compte_client` WHERE `Email` = '$mail'";
$resultat = $link->query($query);

if ($resultat) {
    $row = $resultat->fetch_assoc();

    if ($row) {
        $mdpBDD = $row['Mdp'];

        if ($mdpBDD == $psw) {
            session_start();
            $_SESSION['utilisateur_id'] = $row['Email'];
            $_SESSION['utilisateur_mdp'] = $row['Mdp'];
            $_SESSION['utilisateur_nom'] = $row['Prenom'];
            echo "Connexion réussie";
            header("Location: /Commerce/Acceuil/index.php");//////////////////////////////////////////////////////////////////////////////A FAIRE 
            exit(); // Ajouté pour terminer l'exécution après la redirection
        } else {
            echo "Echec de la connexion : Mauvais mot de passe";
        }
    } else {
        echo "Echec de la connexion : Email introuvable";
    }

    $resultat->close();
} else {
    echo "Erreur dans la requête : " . $link->error;
}

mysqli_close($link);
?>
