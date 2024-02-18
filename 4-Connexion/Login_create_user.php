
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
?>
  
        <div class="content"><!--creer la partie noir et blanc -->
            <section class="left">
            <div class="img"><img src="/Commerce/img/Site/codeHex.svg"></div> 
                    
            </section>


            <section class="right">
              <!--==========================================================
                ===========================CONTENUE A DROITE================================
            ==================================================================-->
<div class="container" id="container">
    <div class="form-container sign-up-container">                                <!-- // CREER COMPTE ////////////////////////////////////////// -->
        <form action="Creer_user.php" method="POST">
            <h1>Créer un compte</h1>

            <span>ou utilisez votre email pour vous inscrire</span>
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="adresse" placeholder="Adresse">
            <input type="int" name="code_postal" placeholder="Code postal">
            <input type="email" name="mail" placeholder="Email">
            <input type="password" name="psw" placeholder="Mot de passe">
            <button>S'inscrire</button>
        </form>
    </div>
              
              <div class="form-container sign-in-container">                           <!-- // SE CONNECTER ////////////////////////////////////////// -->
                  <form action="Login_user.php" method="POST">
                      <h1>Se connecter</h1>
                      <div class="social-container">
                          <a href="#" class="social"><i></i><img src="/Commerce/img/Site/facebook-f.svg" alt=""></a>
                          <a href="#" class="social"><i></i><img src="/Commerce/img/Site/google-plus-g.svg" alt=""></a>
                          <a href="#" class="social"><i></i><img src="/Commerce/img/Site/discord.svg" alt=""></a>
                      </div>
                      <span>ou utilisez votre compte</span>
                      <input type="email" name="mail" placeholder="Email">
                      <input type="password" name="psw" placeholder="Mot de passe">
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
                          <h1>Bonjour mon ami!</h1>
                          <p>Entrez vos informations personnelles et commencez vos achats avec nous</p>
                          <button class="ghost" id="signUp">S'inscrire</button>
                      </div>
                  </div>
              </div>
          </div>
          </section>
        </div>
    </div>
    <script src="Login_create_user.js"></script>
</body>
</html>