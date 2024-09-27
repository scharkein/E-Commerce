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
            if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['nom'], $_POST['prenom'],$_POST['adresse'], $_POST['code_postal'],$_POST['mail'], $_POST['psw'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $mail = $_POST['mail'];
        $psw = $_POST['psw'];
        $ID_client=$_POST['ID'];
        $solde=$_POST['solde'];
        //echo $solde;

        $query = "UPDATE `compte_client` SET `Nom`=?, `Prenom`=?, `Email`=?, `Adresse`=?, `Code_postal`=?, `Mdp`=?, `Solde`=? WHERE `id_client`=$ID_client /* condition pour identifier le compte client à mettre à jour */";
        $stmt = mysqli_prepare($link, $query);
        $_SESSION['utilisateur_solde']=$solde;
        if ($stmt){
            mysqli_stmt_bind_param($stmt, "ssssisd", 
            $nom, $prenom, $mail, $adresse, $code_postal, $psw ,$solde);
            $result = mysqli_stmt_execute($stmt);
            
            if ($result) {
                echo "<h1>Votre compte a bien été modifié </h1>";   // Il faut modifier les variables de session uniquement si la bdd a bien été modifiée également
                
                //header("Location: /Commerce/1-Accueil/home_page.php");
                $_SESSION['utilisateur_id'] = $ID_client;
                $_SESSION['utilisateur_nom'] = $nom;
                $_SESSION['utilisateur_prenom'] = $prenom;
                $_SESSION['utilisateur_email'] = $mail;
                $_SESSION['utilisateur_adresse'] = $adresse;
                $_SESSION['utilisateur_code_postal'] = $code_postal;
                $_SESSION['utilisateur_mdp'] = $psw;
                $_SESSION['utilisateur_solde']=$solde;


            } else {
                echo "Erreur lors de l'insertion : " . mysqli_error($link);
            }        
        }
    }else {
        echo "Tous les champs du formulaire ne sont pas définis.";
    }

}


mysqli_close($link);?>

          </section>
        </div>
    </div>
</body>
</html>