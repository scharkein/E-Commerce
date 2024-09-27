<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; 

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");  


$test=False;
chdir('..'); 
$nouveauRepertoireActif = getcwd();
$sousRepertoireTete = $nouveauRepertoireActif . '/Commerce/4-Connexion';
//echo $sousRepertoireTete;
if (is_dir($sousRepertoireTete)) {
    // echo "Le sous-répertoire login marche  existe.\n";
    include("$sousRepertoireTete/Login.php"); 
} else {
    echo "zzzLe sous-répertoire n'existe pas.\n";
} 
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <title>header page </title>   
  <!-- <link rel="stylesheet" href="tete.css"> -->
    <script>
    window.console = window.console || function(t) {}; //??????
  </script>
  </head>
  
  <body>
   <!--header-->
   <div class="wrapper">
        <nav class="fixed">
            <div class="mainLogo"><img src="../img/Site/codeHex.svg" alt="" style="height: 150% "> CodeHex<br>
            <?php if (isset($_SESSION['utilisateur_id']) && ($_SESSION['utilisateur_id'] == -1) && ($_SESSION['utilisateur_mdp'] == "ADMIN")): ?>
    <?php  echo  $_SESSION['utilisateur_nom']; ?>
<?php endif; ?>

        </div>
            
            <div class="menu">
            <div class="menuLinks">
    <?php if (isset($_SESSION['utilisateur_id']) && ($_SESSION['utilisateur_id'] == -1) && ($_SESSION['utilisateur_mdp'] == "ADMIN")): 
        $test=True;?>  <!-- ADMIN -->
        <a href="../1-Accueil/home_page.php" class="menuLink">Page d'Accueil</a>
        <a href="../3-Tri/Page_de_tri.php" class="menuLink">Articles</a>
        <a href="../0-Administration/Page_choix.php" class="menuLink">Administration</a>   
        <a href="../4-Connexion/Logout.php" class="menuLink">Se deconnecter</a>
        
    <?php elseif (!isset($_SESSION['utilisateur_nom'])):?>  <!-- Client sans compte  -->
        <a href="../1-Accueil/home_page.php" class="menuLink">Page d'Accueil</a>
        <a href="../3-Tri/Page_de_tri.php" class="menuLink">Articles</a>
        <a href="../4-Connexion/Login_create_user.php" class="menuLink">Se connecter</a>
        
    <?php else:
        $test=True;?>
        <a href="../1-Accueil/home_page.php" class="menuLink">Accueil</a>
        <a href="../3-Tri/Page_de_tri.php" class="menuLink">Articles</a>
            <a href="../4-Connexion/Mon_compte.php" class="menuLink">Mon compte <?php //echo $_SESSION['utilisateur_nom'] ; ?> </a>      <!-- Client avec compte  -->
            <a href="../4-Connexion/Logout.php" class="menuLink">Se deconnecter</a>
            
    <?php endif; ?>
</div>


                <div class="shoppingCart">
                    <div class="shoppingIcon">
                        <img src="/Commerce/img/Site/shopping-cart.svg" alt="">
                        <span class="itemNumber">0</span>
                    </div>

                    <div class="shoppingMenu">
                        <p class="shoppingTitle">Votre Panier</p>
                        <div class="productResume">
                            <!--Le produits-->
                            <article>
                            <div class="shoppingCart">
                    <div class="shoppingIcon">
                        <img src="/Commerce/img/Site/shopping-cart.svg" alt="">
                        <span class="itemNumber">0</span>
                    </div>
                    
                    <div class="shoppingMenu">
                        <p class="shoppingTitle">Votre Panier</p>
                        <div class="productResume">
                            <img src="/Commerce/img/Site/GeForce_RTX_4070.png" alt="" class="shoppingThumb">
                            <article>
                                <p class="shoppingProduct">GeForce RTX 4070</p>
                                <p class="shoppingQuantity">0</p>
                                <p class="shoppingTotal">0</p>
                            </article>
                        </div>
                        <div class="shoppingBtn">
                            <a class="link emptyCart"> <img src="/Commerce/img/Site/trash.svg" alt=""> Vider le Panier</a>
                            <a href="../6-panier/panier.php" class="menuLink"><button class="btn">Terminer vos achats </button></a>
                        </div>

                    </div>
                </div>
                            </article>
                        </div>
                        <div class="shoppingBtn">
                            <a class="link emptyCart"> <img src="/Commerce/img/Site/trash.svg" alt=""> Vider le Panier</a>
                            <a href="../6-panier/panier.php" class="menuLink"><button class="btn">Terminer vos achats </button></a>
                        </div>

                    </div>
                </div>

                <!--  -->

                <i class="iconMenu">
                    <img src="/Commerce/img/Site/menu.svg"  alt="">
                </i>
            </div>
        </nav>

<!--Fin header-->
      <!-- <script src="tete.js"></script>-->
  </body>
  </html>