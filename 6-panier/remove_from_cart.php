<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';
$dbname = 'commerce';

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");

if (isset($_POST['ID'])) {
    echo $_POST['ID'];
} else {
    echo "Probleme ID___";
}

if (isset($_POST['userID'])) {
    echo $_POST['userID'];
} else {
    echo "Probleme ID article____";
}

if (isset($_POST['ID']) && isset($_POST['userID'])) {
    $id = $_POST['ID'];
    $user_id = $_POST['userID']; // Correction: Utilisation de $_POST['userID'] au lieu de $_POST['userId']

    if ($link->connect_error) {
        die("Erreur de connexion: " . $link->connect_error);
    }

    $query = "DELETE FROM panier WHERE Id_article = ? AND Id_client = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("ii", $id, $user_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $link->close();
} else {
    echo "____CA MARCHE PAS ";
}
?>
