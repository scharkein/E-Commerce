<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; 

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");  


$execut_select = "SELECT * FROM `article`";    
$resultat = $link->query($execut_select);  

?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <title>Page d'acceuil</title>   
  <link rel="stylesheet" href="home_page.css">
  </head>
  
  <body>
  <?php
chdir('..');
$nouveauRepertoireActif = getcwd();
$sousRepertoireTete = $nouveauRepertoireActif . '/5-Tete';
//echo $sousRepertoireTete;
if (is_dir($sousRepertoireTete)) {
    //echo "Le sous-répertoire login marche  existe.\n";
    include("$sousRepertoireTete/tete.php"); 
} else {
    echo "Le sous-répertoire n'existe pas.\n";
}
?>
    <div class="bloc">
        <video autoplay="autoplay" muted="" loop="" src="../img/Site/Blue Neon Keyboard Keys Background video _ Footage _ Screensaver (1).mp4"></video>
    </div>
    <div class="main">
    <a href="../3-Tri/Page_de_tri.php"><button id="myButton" href="">Nos Produits</button></a>
  </body>
<script src="accueil.js"></script>
