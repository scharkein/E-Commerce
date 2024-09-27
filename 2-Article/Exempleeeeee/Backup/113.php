





<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article Page</title>
    <link rel="stylesheet" href="exemple.css">
    <script>
        window.console = window.console || function (t) { }; //??????
    </script>
</head>

<body>
<?php

$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';
$dbname = 'commerce';

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");

if (mysqli_connect_errno()) {
    printf("Echec de la connexion : ", mysqli_connect_error());
    exit();
}else{
    //echo "babababa marche ";
}



chdir('..');
$nouveauRepertoireActif = getcwd();
$sousRepertoireTete = $nouveauRepertoireActif . '/5-Tete';
//echo $sousRepertoireTete;
if (is_dir($sousRepertoireTete)) {
    //echo "Le sous-répertoire login marche  existe.";
    include("$sousRepertoireTete/tete.php"); 
} else {
    echo "sssLe sous-répertoire n'existe pas.";
}



$quer="SELECT * FROM article where Id_article=113"; // Trie par ordre décroissant et prend QUE la première valeur 
$result = mysqli_query($link, $quer);


$row=$result->fetch_assoc();
$Id_article=$row['Id_article'];
$type=$row['Type'];
$Nom=$row['Name'];
$desc=$row['Description'];
$marque=$row['Marque'];
$Gamme=$row['Gamme'];
$quantite=$row['Quantité'];
$P_vente=$row['Prix_vente'];
$P_revient=$row['Prix_revient'];
$Critere_1=$row['Critere_1'];
$Critere_2=$row['Critere_2'];
$Critere_3=$row['Critere_3'];
$Critere_4=$row['Critere_4'];
$Critere_5=$row['Critere_5'];
//echo "$desc";
?>

        <div class="content">
            <section class="left"> <!--===============================================================================
                                        ============================= Gauche ======================================
                                    ==================================================================================-->
                <div class="swiper-container galleryMain swiper-container-coverflow swiper-container-3d swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper"
                        style="transform: translate3d(-5778px, 0px, 0px); perspective-origin: 6109.5px 50%; transition-duration: 0ms;">
                        
                        <?php
$test = true;
$i = 0;
while ($test) {
    $imagePath ="Commerce/img/Article/{$Id_article}_{$i}.png";
    if (file_exists($imagePath)) {
        //echo "babababbababab";
        echo "<div class='swiper-slide swiper-slide-active' data-swiper-slide-index='1'
            style='width: 663px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); z-index: 1; transition-duration: 0ms; margin-right: 300px;'>
            <div class='scene' data-hover-only='false'
                style='transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;'>
                <img src='/Commerce/img/Article/{$Id_article}_{$i}.png' data-depth='0.5'
                    style='transform: translate3d(0.6px, -14.5px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;'>
                <img src='/Commerce/img/Article/{$Id_article}_{$i}.png' data-depth='1' class='shadow'
                    style='transform: translate3d(1.1px, -29px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;'>
            </div>
        </div>";
        $i++;
    } else {
        // Si l'image n'existe pas, sortir de la boucle
        $test = false;
    }
}
//echo "zzzzzzzzz,$i";
?>
 
                    </div>
			 <!-- les fleches et les bulles du carousel -->
                    <!--La fleche gauche-->
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                 <!--Les bulles--->
                <div class="sliderNavigation">
                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                        <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span>
                    </div><!--La fleche droites-->
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                </div>
            </section>

            <section class="right">
                <div class="rightContent">
                    <div class="model">
                        <p class="modelTitle"><?php echo $Nom; ?></p>
                        <p class="modelDesc"><?php echo $desc; ?></p>
                    </div>


                    <div class="price">
                        <p class="priceFinal">87.5€</p>
                        <p class="priceOriginal"><?php// echo $p_vente; ?></p>
                    </div>
                    <div class="specs">
                        <div class="size">
                            <h3 class="subtitle">Caractéristiques</h3>
                            <div class="dropdown">
                                <div class="form dropContent">
<?php if ($type==1): ?>

    <ul>
        <li>Vram: <?php echo $Critere_1; ?></li>
        <li>Fréquence de core: <?php echo $Critere_2; ?></li>
        <li>Consommation: <?php echo $Critere_3; ?></li>
        <li>RGB: <?php echo $Critere_4; ?></li>
    </ul>
<?php elseif($type==2): ?>

    <ul>
        <li>Cœurs: <?php echo $Critere_1; ?></li>
        <li>Fréquence de base: <?php echo $Critere_2; ?></li>
        <li>Consommation: <?php echo $Critere_3; ?></li>
    </ul>
<?php elseif($type==3): ?>

    <ul>
        <li>Type (DDR4 / DDR5): <?php echo $Critere_1; ?></li>
        <li>Fréquence de base: <?php echo $Critere_2; ?></li>
        <li>Gb: <?php echo $Critere_3; ?></li>
        <li>RGB: <?php echo $Critere_4; ?></li>
    </ul>
<?php elseif($type==4): ?>

    <ul>
        <li>Type de RAM (DDR4 / DDR5): <?php echo $Critere_1; ?></li>
        <li>Vitesse RAM max: <?php echo $Critere_2; ?></li>
        <li>Taille: <?php echo $Critere_3; ?></li>
    </ul>
<?php elseif($type==5): ?>

    <ul>
        <li>Type (SSD/disque dur): <?php echo $Critere_1; ?></li>
        <li>Vitesse de transfert: <?php echo $Critere_2; ?></li>
        <li>Taille: <?php echo $Critere_3; ?></li>
    </ul>
<?php elseif($type==6): ?>

    <ul>
        <li>Dimension: <?php echo $Critere_1; ?></li>
        <li>Taille carte mère: <?php echo $Critere_2; ?></li>
        <li>Taille bloc d’alimentation: <?php echo $Critere_3; ?></li>
        <li>Longueur carte graphique max: <?php echo $Critere_4; ?></li>
    </ul>
<?php elseif($type==7): ?>

    <ul>
        <li>Taille: <?php echo $Critere_1; ?></li>
        <li>Dimension: <?php echo $Critere_2; ?></li>
        <li>Type modulaire OUI/NON: <?php echo $Critere_3; ?></li>
        <li>Consommation: <?php echo $Critere_4; ?></li>
    </ul>
<?php elseif($type==8): ?>

    <ul>
        <li>Type: <?php echo $Critere_1; ?></li>
        <li>Débit d’air: <?php echo $Critere_2; ?></li>
        <li>Socket: <?php echo $Critere_3; ?></li>
        <li>Hauteur: <?php echo $Critere_4; ?></li>
    </ul>
<?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="quantity">
                            <h3 class="subtitle"></h3>
                            <div class="form quantityCounter">
                                <input class="inputQuantity" onkeydown="return false" type="number" value="1">

                                <i class="icon btnQuantity minus">
                                    <img src="/Commerce/img/Site/minus.svg" alt="">
                                </i>
                                <i class="icon btnQuantity plus">
                                    <img src="/Commerce/img/Site/plus.svg" alt="">
                                </i>
                            </div>

                            <p class="error">Nous n'avons que 1 articles en stock.</p>
                        </div>
                    </div><!--Les carre-->
                    <div class="swiper-container galleryThumbs swiper-container-initialized swiper-container-horizontal swiper-container-thumbs">
                        <div class="swiper-wrapper">
                            <?php 
                            $test = true;
                            $i = 0;
                            while ($test) {
                                $imagePath ="Commerce/img/Article/{$Id_article}_{$i}.png";
                                if (file_exists($imagePath)) {
                                    echo "<div class=swiper-slide swiper-slide-next swiper-slide-thumb-active><img src='/Commerce/img/Article/{$Id_article}_{$i}.png'></div>";
                                    $i++;
                                } else {
                                    // Si l'image n'existe pas, sortir de la boucle
                                    $test = false;
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div><!--Le bouton panier-->
                <div class="btnContainer fixedBtn">
                    <button class="btn add">
                        <img src="/Commerce/img/Site/shopping-cart-w.svg" alt="">
                        Ajouter au panier</button>
                </div>

        </div>
        </section>
        <!-- Swiper -->
    </div>
    </div>

    <script src="swiper.js"></script>
    <script src="exemple.js"></script>
</body>

</html>



