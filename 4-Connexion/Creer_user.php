
<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);

if (mysqli_connect_errno()) {
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

echo "la connexion à la base est établie. <br/>";

if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['nom'], $_POST['prenom'],$_POST['adresse'], $_POST['code_postal'],$_POST['mail'], $_POST['psw'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $mail = $_POST['mail'];
        $psw = $_POST['psw'];

        // Utilisation de requête préparée pour éviter les injections SQL et pour les caracteres spéciaux pour enlever 
        
        $query = "INSERT INTO `compte_client` (`Id_client`, `Nom`,`Prenom`, `Email`, `Adresse`,`Code_postal`, `Mdp`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);

        // Vérification de la préparation de la requête
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssss", 
            $nom, $prenom, $mail, $adresse, $code_postal, $psw);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                //echo "Ca marche";
                header("Location: /Commerce/1-Acceuil/index.php");
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
}

$query = "INSERT INTO `compte_client` (`Id_client`, `Nom`, `Prenom`, `Email`, `Adresse`, `Code_postal`, `Mdp`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $query);

mysqli_close($link);

?>