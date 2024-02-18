<?php
session_start();

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil ou autre page de déconnexion
header("Location: /Commerce/4-Connexion/Login_create_user.php");
exit();
?>