<?php
// Démarrez la session 
session_start();

// Vérifiez si l'utilisateur est connecté en vérifiant la présence de certaines informations dans la session
if (isset($_SESSION['utilisateur_id'])) {
    // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    $utilisateur_id = $_SESSION['utilisateur_id'];
    $utilisateur_nom = $_SESSION['utilisateur_nom'];
    $href_connexion = "Logout.php";
}
else{
    $utilisateur_id = 'Non';
    $utilisateur_nom='SE CONNECTER';
    $href_connexion = "Login_user.html";
    
}
// Vous pouvez maintenant accéder aux informations de l'utilisateur via $_SESSION
?>
