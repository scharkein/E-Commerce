
<html lang="en"><head>
  <meta charset="UTF-8">
  <title>client page </title>   
<link rel="stylesheet" href="/Commerce/4-Connexion/Login_create_user.css">
</head>

<body>
<?php 
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

$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); //Connexion a la base de donnée avec la valeur $link
mysqli_set_charset($link, "utf8");  // Il y a des problèmes si ont le met pas CAR C POURRI MYSQLI

if (mysqli_connect_errno()) {   // test la connexion
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

$user_id=$_SESSION['utilisateur_id'];
$execut_select = "SELECT * FROM `compte_client` where `Id_client`=$user_id ";    // A faire la requete SQL avec $valeur_prix de choix article pour trie uniquement avec type d'objet
$resultat = $link->query($execut_select);                         // Join la requete a la bdd
if (!$resultat) {
  printf("Erreur SQL : %s\n", mysqli_error($link));
  exit();
}


$row=$resultat->fetch_assoc();


?>
  
    <div class="content"><!--creer la partie noir et blanc -->
        <section class="left">
            <div class="img"><img src="/Commerce/img/Site/codeHex.svg"></div> 
            

        </section>


        <section class="right"> <!--===========CONTENUE A DROITE===================-->
        <a href="../6-panier/panier.php" ><button>Accès au panier </button></a>
        <a href="../6-panier/commande.php" ><button>Vos commandes passées </button></a>
        <form action="Mon_compte_.php" method="POST">
        
            <h1>Mon espace client  : <?php echo $row['Nom']; echo"     "; echo $row['Prenom'];?></h1>

            <span>Ici vous pouvez modifié les paramètres de votre compte </span>
            <input type="hidden" name="ID" value=<?php echo $user_id; ?>>
            Nom :<input type="text" name="nom" placeholder="Nom" value=<?php echo $_SESSION['utilisateur_nom'] ; ?> >
            Prenom :<input type="text" name="prenom" placeholder="Prenom" value=<?php echo $_SESSION['utilisateur_prenom'] ; ?>>
            Adresse de livraison :<input type="text" name="adresse" placeholder="Adresse" value=<?php echo $_SESSION['utilisateur_adresse'] ; ?>>
            Code postal :<input type="int" name="code_postal" placeholder="Code postal" value=<?php echo $_SESSION['utilisateur_code_postal']; ?>>
            Email :<input type="email" name="mail" placeholder="Email"  value=<?php echo $_SESSION['utilisateur_email']; ?>>
            Mot de passe :<input type="password" name="psw" placeholder="Mot de passe" value=<?php echo $_SESSION['utilisateur_mdp']; ?>>
            Solde : <input type="int" name="solde" placeholder="Nouvelle solde, Nombre entier uniquement !" value=<?php echo $_SESSION['utilisateur_solde']; ?> ?>
            <button>Modifier mon compte </button>
</form>

    </section>
    </div>
    <script src="Login_create_user.js"></script>
</body>
</html>