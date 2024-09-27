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
              
            <?php
$mail = $_POST['mail'];
$psw = $_POST['psw'];

$query = "SELECT * FROM `compte_client` WHERE `Email` = '$mail'";
$resultat = $link->query($query);

if ($resultat) {
    $row = $resultat->fetch_assoc();

    if ($row) {
        $mdpBDD = $row['Mdp'];

        if ($mdpBDD == $psw) {
            session_unset();

            session_destroy();
            
            session_start();
            $_SESSION['utilisateur_id'] = $row['Id_client'];
            $_SESSION['utilisateur_nom'] = $row['Nom'];
            $_SESSION['utilisateur_prenom'] = $row['Prenom'];
            $_SESSION['utilisateur_email'] = $row['Email'];
            $_SESSION['utilisateur_adresse'] = $row['Adresse'];
            $_SESSION['utilisateur_code_postal'] = $row['Code_postal'];
            $_SESSION['utilisateur_mdp'] = $row['Mdp'];
            $_SESSION['utilisateur_solde']=$row['Solde'];



            if (isset($_SESSION['utilisateur_nom'])&& isset($_SESSION['utilisateur_email']) && isset($_SESSION['utilisateur_mdp'])&& isset($_SESSION['utilisateur_nom'])){
                header("Location: /Commerce/1-Accueil/home_page.php"); 
            }
            else{
                echo "<h1>Connexion raté<h1>";
            }
            
            
            exit(); // Ajouté pour terminer l'exécution après la redirection
        } else {
            echo "<h1>Echec de la connexion : Mauvais mot de passe</h1>";
        }
    } else {
        echo "<h1>Echec de la connexion : Email introuvable</h1>";
    }

    $resultat->close();
} else {
    echo "<h1>Erreur dans la requête : " . $link->error."</h1>";
}

mysqli_close($link);
            ?>

          </section>
        </div>
    </div>
</body>
</html>