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
  <link rel="stylesheet" href="Page_de_tri.css">
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
                <!-- SVG DES ÉTOILES-->
                <svg style="width: 0; height: 0;"  viewBox="0 0 32 32">
                  <defs>
                    <mask id="half">
                      <rect x="0" y="0" width="32" height="32" fill="white" />
                      <rect x="50%" y="0" width="32" height="32" fill="#999999" />
                    </mask>
              
                    <mask id="quarter">
                      <rect x="0" y="0" width="32" height="32" fill="white" />
                      <rect x="25%" y="0" width="32" height="32" fill="#999999" />
                    </mask>
              
                    <symbol  viewBox="0 0 32 32" id="star">
                      <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z" />
                    </symbol>
                  </defs>
                </svg>
                <main class="main">
                <!--================================ARTICLES================================================================-->
                <?php
                  while($row=$resultat->fetch_assoc()){
                    $Id_article=$row['Id_article'];$Type=$row['Type'];$Name=$row['Name'];$Desc=$row['Description'];
                    $Marque=$row['Marque'];$Gamme=$row['Gamme'];$Quandtite=$row['Quantité'];$Prix_revient=$row['Prix_revient'];$Prix_vente=$row['Prix_vente'];
                    $Crit1=$row['Critere_1'];$Crit=$row['Critere_2'];$Crit3=$row['Critere_3'];
                    $Crit4=$row['Critere_4'];$Crit5=$row['Critere_5'];
                    echo '
                    <article class="card card--1">
                      <div class="card__img-wrap">
                        <img src="../img/Article/GeForce_RTX_4070.png" alt="" class=" card__img">
                      </div>
                      <div class="card__content">
                        <h3 class="card__title">'.$Name.'</h3>
                        <div class="card__row">
                          <p class="card__price">'.$Prix_vente.'€</p>
                          <div class="card__rating">
                            <p class="card__rating--number">3.3/5</p>
                            <ul class="card__rating--stars" aria-label="3.3 stars out of 5">
                              <li class="rating">
                                <svg class="rating__star rating__star--full">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star rating__star--full">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star rating__star--full">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star rating__star--half">
                                  <use xlink:href="#star" mask=url("#quarter")></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <button class="card__button"><span class="card__button--front">en savoir plus</span></button>
                      </div>
                    </article>';
                  }
                ?> 

                  <!--=======================================================================================================================-->
                  <article class="card card--1">
                    <div class="card__img-wrap">
                      <img src="../img/Article/GeForce_RTX_4070.png" alt="" class=" card__img">
                    </div>
                    <div class="card__content">
                      <h3 class="card__title">test</h3>
                      <div class="card__row">
                        <p class="card__price">700€</p>
                        <div class="card__rating">
                          <p class="card__rating--number">3.3/5</p>
                          <ul class="card__rating--stars" aria-label="3.3 stars out of 5">
                            <li class="rating">
                              <svg class="rating__star rating__star--full">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star rating__star--full">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star rating__star--full">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star rating__star--half">
                                <use xlink:href="#star" mask=url("#quarter")></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <button class="card__button"><span class="card__button--front">en savoir plus</span></button>
                    </div>
                  </article>
                  <!--=======================================================================================================================-->
                 

                  </main>
              </section>
              <!-- Swiper -->
          </div>
      </div>
      <script src="Page_de_tri.js"></script>
  </body>
  </html>