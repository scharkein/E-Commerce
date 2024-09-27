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
    <title>Produits page</title>   
  <link rel="stylesheet" href="paiement.css">
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
?>  <body>
        <div class="wrapper">
          <div class="content">
              <section class="left">
              </section>
              <section class="right">
                
              </section>
            </div>
        </div>
      <script src="paiment.js"></script>
    </body>
</html>