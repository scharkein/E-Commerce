<?php
// Remontez d'un répertoire
//chdir('..');

//echo "zzzzzzzzzzzzzzzzzzzzzzzzzzzz$sousRepertoireTete";

// Avoir le répertoir actuel 
chdir('..');
$nouveauRepertoireActif = getcwd();

$sousRepertoireTete = $nouveauRepertoireActif . '/Connexion';
if (is_dir($sousRepertoireTete)) {
    //echo "Le sous-répertoire 'Tete' existe.\n";
    include("$sousRepertoireTete/Login.php"); 

} else {
    echo "Le sous-répertoire n'existe pas.\n";
}
?>

<html lang="en"><head>
  <meta charset="UTF-8">
  <title>client page </title>   
<link rel="stylesheet" href="Creer_user.css">
<!-- "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" -->
</head>

<body>
  <!--header-->
<div class="wrapper">
        <nav class="fixed">
            <div class="mainLogo">CodeHex</div>
            <div class="menu">
                <div class="menuLinks">
                    <a href="" class="menuLink">Promotion</a>
                    <a href="" class="menuLink">Produits</a>
                    <a href="" class="menuLink">Connexion</a>
                </div>

                <div class="shoppingCart">
                    <div class="shoppingIcon">
                        <img src="/img/shopping-cart.svg" alt="">
                        <span class="itemNumber">0</span>
                    </div>
                    
                    <div class="shoppingMenu">
                        <p class="shoppingTitle">Votre Panier</p>
                        <div class="productResume">
                            <img src="/img/GeForce_RTX_4070.png" alt="" class="shoppingThumb"><!--Le produits-->
                            <article>
                                <p class="shoppingProduct">GeForce RTX 4070</p>
                                <p class="shoppingQuantity">0</p>
                                <p class="shoppingTotal">0</p>
                            </article>
                        </div>
                        <div class="shoppingBtn">
                            <a class="link emptyCart"> <img src="/img/trash.svg" alt=""> Vider le Panier</a>
                            <button class="btn">Terminer vos achats <?php echo $utilisateur_nom; ?></button>
                        </div>

                    </div>
                </div>

                <i class="iconMenu">
                    <img src="/img/menu.svg"  alt="">
                </i>
            </div>
        </nav>
<!--Fin header-->
        <div class="content"><!--creer la partie noir et blanc -->
            <section class="left">
                <!--==========================================================
                ===========================CONTENUE A GAUCHE================================
            ==================================================================-->
            <div class="img"></div> <div class="cache"></div>
                    
            </section>


            <section class="right">
              <!--==========================================================
                ===========================CONTENUE A DROITE================================
            ==================================================================-->
            <div class="container" id="container">
              <div class="form-container sign-up-container">
                  <form action="#">
                      <h1>Créer un compte</h1>
                      <div class="social-container">
                          <a href="#" class="social"><i></i><img src="/img/facebook-f.svg" alt=""></a>
                          <a href="#" class="social"><i></i><img src="/img/google-plus-g.svg" alt=""></a>
                          <a href="#" class="social"><i></i><img src="/img/discord.svg" alt=""></a>
                      </div>
                      <span>ou utilisez votre email pour vous inscrire</span>
                      <input type="text" placeholder="Name">
                      <input type="email" placeholder="Email">
                      <input type="password" placeholder="Password">
                      <button>Sign Up</button>
                  </form>
              </div>
              <div class="form-container sign-in-container">
                  <form action="Creer_user_envoi.php">
                      <h1>Se connecter</h1>
                      <div class="social-container">
                          <a href="#" class="social"><i></i><img src="/img/facebook-f.svg" alt=""></a>
                          <a href="#" class="social"><i></i><img src="/img/google-plus-g.svg" alt=""></a>
                          <a href="#" class="social"><i></i><img src="/img/discord.svg" alt=""></a>
                      </div>
                      <span>ou utilisez votre compte</span>
                      <input type="email" placeholder="Email">
                      <input type="password" placeholder="Password">
                      <a href="#">Mot de passe oublié?</a>
                      <button>Se connecter</button>
                  </form>
              </div>
              <div class="overlay-container">
                  <div class="overlay">
                      <div class="overlay-panel overlay-left">
                          <h1>Content de te revoir!</h1>
                          <p>Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
                          <button class="ghost" id="signIn">Se connecter</button>
                      </div>
                      <div class="overlay-panel overlay-right">
                          <h1>Bonjour mon ami!<?php echo $utilisateur_nom; ?></h1>
                          <p>Entrez vos informations personnelles et commencez vos achats avec nous</p>
                          <button class="ghost" id="signUp">S'inscrire</button>
                      </div>
                  </div>
              </div>
          </div>
          </section>
        </div>
    </div>
    <script src="Creer_user.js"></script>
</body>
</html>