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
    $type =$_POST['Type'];
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
    
    
    $p_vente = $_POST['p_vente'];
    $p_revient = $p_vente*20/100;
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

    if (isset($_POST['Critere_3'])){
        if (empty($_POST['Crit3'])){ 
            $Critere_3 = $_POST['Critere_3']; 
        } 
        else{ $Critere_3 = $_POST['Crit3']; }
    }else{
            $Critere_3="NULL";
        }
    

    if (isset($_POST['Critere_4'])){
        if (empty($_POST['Crit4'])){
            $Critere_4 = $_POST['Critere_4'];
        }
        else{
            $Critere_4 = $_POST['Crit4'];
        }
    }else{
            $Critere_4="NULL";
        }
    

    if (isset($_POST['Critere_5'])){
        if (empty($_POST['Crit5'])){
            $Critere_5 = $_POST['Critere_5'];
        }
        else{
            $Critere_5 = $_POST['Crit5'];
        }
    }else{ 
            $Critere_5="NULL";
        }
        
        
        
    
    
    $query = "INSERT INTO `article` (`Id_article`, `Type`, `Name`, `Description`, `Marque`,`Gamme`, `Quantité`, `Prix_revient`, `Prix_vente`, `Critere_1`, `Critere_2`, `Critere_3`, `Critere_4`, `Critere_5`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isssssddsssss", $type, $nom, $desc, $marque, $gamme, $quantite, $p_revient, $p_vente, $Critere_1, $Critere_2, $Critere_3, $Critere_4, $Critere_5);
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
//===============================Python===========================================//
$quer = "SELECT Id_article FROM article ORDER BY Id_article DESC LIMIT 1";
$result = mysqli_query($link, $quer);

if ($result) {
    $resultat = mysqli_fetch_assoc($result);
    $ID_article = $resultat['Id_article'];
} else {
    echo "Erreur lors de la récupération du dernier Id_article : " . mysqli_error($link);
}

chdir('..');
chdir('..'); 

$nouveauRepertoireActif = getcwd();
$sousRepertoireTete = $nouveauRepertoireActif . '\\0-Administration\\Creer_article'; // Utilisation de \\ pour les barres obliques inverses

echo "\nsssss$sousRepertoireTete<br>";


$repertoirezzzzz="E:\\OneDrive\\Site_web\\UwAmp\\www\\Commerce\\0-Administration\\Creer_article\\Envoi_csv.py";
// Préparer la commande 
$commande = "$repertoirezzzzz $ID_article $type $nom $desc $marque $gamme $quantite $p_revient $p_vente $Critere_1 $Critere_2 $Critere_3 $Critere_4 $Critere_5 2>&1";



// Exécuter la commande
$output = shell_exec($commande);
echo $sousRepertoireTete . "Envoi_csv.py"; // Utilisation de \\ pour les barres obliques inverses
// Afficher la sortie
echo "<br>Output:<br><br><br> $output <br><br><br>";


//================================PAS Python===========================================//
//================================LES IMAGES===========================================//
chdir('..'); 
$repertoire=getcwd();
echo "zzzzzzzzzz,$repertoire";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['images']) && isset($ID_article)) {
    $images = $_FILES['images'];
    if (!empty($images['name'][0])){   // Avoir la premiere image choisis 
        echo '<li>';
        echo 'Nom du fichier: ' . $images['name'][0] . '<br>';
        echo 'Type du fichier: ' . $images['type'][0] . '<br>';
        echo 'Taille du fichier: ' . $images['size'][0] . ' octets<br>';
        echo 'Chemin temporaire: ' . $images['tmp_name'][0] . '<br>';
        echo '</li><br>';

        // Définir les chemins complets des fichiers d'origine et de destination
        $old_file = $images['tmp_name'][0];
        $new_file = $repertoire . "/Commerce/img/Article/" . "$ID_article"."_0.png";

        // Renommer le fichier d'origine
        if (rename($old_file, $new_file)) {
            echo 'Le fichier a été renommé avec succès.';
        } else {
            echo 'Une erreur s\'est produite lors du renommage du fichier.';
        }
    }
    if (!empty($images['name'][1])) {
        echo '<ul>';
        // Parcourir chaque fichier téléchargé
        for ($i = 1; $i < count($images['name']); $i++) {
            // Afficher les informations sur le fichier
            echo '<li>';
            echo 'Nom du fichier: ' . $images['name'][$i] . '<br>';
            echo 'Type du fichier: ' . $images['type'][$i] . '<br>';
            echo 'Taille du fichier: ' . $images['size'][$i] . ' octets<br>';
            echo 'Chemin temporaire: ' . $images['tmp_name'][$i] . '<br>';
            echo '</li><br>';

            // Définir les chemins complets des fichiers d'origine et de destination
            $old_file = $images['tmp_name'][$i];
            $new_file = $repertoire . "/Commerce/img/Article/" . "$ID_article"."_$i.png";

            // Renommer le fichier d'origine
            if (rename($old_file, $new_file)) {
                echo 'Le fichier a été renommé avec succès.';
            } else {
                echo 'Une erreur s\'est produite lors du renommage du fichier.';
            }
        }
        echo '</ul>';
    } else {
        echo 'Aucun fichier téléchargé.';
    }
}


//================================PAS IMAGES===========================================//

mysqli_close($link);
?>
