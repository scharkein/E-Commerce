
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
                                   <!-- // CREER COMPTE ////////////////////////////////////////// -->
        <form action="verif_mdp.php" method="POST">
            <h1>Mot de passe oublié ?</h1>
            <input type="email" name="mail" placeholder="Email">
            <button>Envoyer</button>
        </form>
    </div>
          </section>
        </div>
    </div>
    <script src="Login_create_user.js"></script>
</body>
</html>
<?php
if(isset($_POST['Email'])){
    $password = uniqid();
}