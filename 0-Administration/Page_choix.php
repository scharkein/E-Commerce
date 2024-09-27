<html lang="en"><head>
  <meta charset="UTF-8">
  <title>Client page </title>   
<link rel="stylesheet" href="/Commerce/4-Connexion/Login_create_user.css">
</head>

<body>
<?php 
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; 

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");  


chdir('..');
$nouveauRepertoireActif = getcwd();
$sousRepertoireTete = $nouveauRepertoireActif . '/5-Tete';
//echo $sousRepertoireTete;
if (is_dir($sousRepertoireTete)) {
    // echo "Le sous-répertoire login marche  existe.\n";
    include("$sousRepertoireTete/tete.php"); 
} else {
    echo "sssLe sous-répertoire n'existe pas.\n";
}




$query_c= "SELECT * FROM `compte_client` where `Id_client`=-1";    
$resultat_c = $link->query($query_c);  
$row_c=$resultat_c->fetch_assoc();
$A_entreprise=$row_c['Solde'];
?>
  
        <div class="content"><!--creer la partie noir et blanc -->
            <section class="left">
            <div class="img"><img src="/Commerce/img/Site/codeHex.svg"></div>    
            </section>

            <section class="right">
              
            <h1>Bénéfices : <?php echo $A_entreprise."€"; ?></h1><br><br>
            <h1><a href="../0-Administration/Creer_article/Choix_article.php">Création d'un article</a></h1><br><br>
            <h1><a href="../0-Administration/Affichage/Table_article.php">Affichage de la table Articles</a></h1><br><br>
            <h1><a href="../0-Administration/Affichage/Table_client.php">Affichage de la table Compte client</a></h1><br><br>
            <h1><a href="../0-Administration/Affichage/Refill.php">Réaprovisionnement</a></h1><br><br>
            <h1><a href="../6-Panier/historique_commandes.php">Historique de commandes</a></h1>

          </section>
        </div>
    </div>
</body>
</html>