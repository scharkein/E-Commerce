

// Redirection vers une autre page

<?php
$ID_type = $_POST['type'];                  //récuperer la valeur de la page Choix article pour savoir qu'elle page choisir 
header("Location: $ID_type.php");           //Redirige vers une autre page web
exit();
?>

    