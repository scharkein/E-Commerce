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
<div class="wrapper">
    
    <div class="content">
       
         <section class="left">

         </section>
        <section class="right">

        </section>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <div class="parallax-item">
                <div class="p-item p-item4">
                    <img src="../img/Article/pc-blanc-1.png" style="margin-right: 650px;" alt="pc-blanc-1">
                    <img src="../img/Article/pc-noir-1.png" alt="pc-noir-1">
                </div>
                <div class="p-item p-item3">
                    <img src="../img/Article/pc-blanc-1.png" style="margin-right: 450px;" alt="pc-blanc-1">
                    <img src="../img/Article/pc-noir-1.png" alt="pc-noir-1">
                </div>
                <div class="p-item p-item2">
                    <img src="../img/Article/pc-blanc-1.png" style="margin-right: 250px;" alt="pc-blanc-1">
                    <img src="../img/Article/pc-noir-1.png" alt="pc-noir-1">
                </div>
                <div class="p-item p-item1">
                    <img src="../img/Article/pc-blanc-1.png"alt="pc-blanc-1">
                    <img src="../img/Article/pc-noir-1.png" alt="pc-noir-1">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="content-header">
                <h1>CodeHex</h1>
                <h2>"gros caca"</h2>
            </div>
            <div class="contente">
                <img src="../img/Article/kitsune-pc-removebg-preview.png" alt="pipou">
            </div>
        </div>
    </div>
</div>