

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
chdir('..');
$nouveauRepertoireActif = getcwd();
$sousRepertoireTete = $nouveauRepertoireActif . '/5-Tete';
//echo $sousRepertoireTete;
if (is_dir($sousRepertoireTete)) {
    //echo "Le sous-répertoire login marche  existe.\n";
    include("$sousRepertoireTete/tete.php"); 
} else {
    echo "sssLe sous-répertoire n'existe pas.\n";
}
?>

        <div class="content">
            <section class="left"> <!--===============================================================================
                                        ============================= Gauche ======================================
                                    ==================================================================================-->
                <div class="swiper-container galleryMain swiper-container-coverflow swiper-container-3d swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper"
                        style="transform: translate3d(-5778px, 0px, 0px); perspective-origin: 6109.5px 50%; transition-duration: 0ms;">
                        <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="0"
                            style="width: 663px; transform: translate3d(72.6244px, 0px, -290.498px) rotateX(0deg) rotateY(72.6244deg); z-index: 0; transition-duration: 0ms; margin-right: 300px;">
                            <div class="scene" data-hover-only="false"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <!--image -->
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="0.5"
                                    style="transform: translate3d(0.4px, -14.8px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                <!--son ombre-->
                                    <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="1" class="shadow"
                                    style="transform: translate3d(0.8px, -29.7px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="1"
                            style="width: 663px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); z-index: 1; transition-duration: 0ms; margin-right: 300px;">
                            <div class="scene" data-hover-only="false"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="0.5"
                                    style="transform: translate3d(0.6px, -14.5px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="1" class="shadow"
                                    style="transform: translate3d(1.1px, -29px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="2"
                            style="width: 663px; transform: translate3d(-72.6244px, 0px, -290.498px) rotateX(0deg) rotateY(-72.6244deg); z-index: 0; transition-duration: 0ms; margin-right: 300px;">
                            <div class="scene" data-hover-only="false"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="0.5"
                                    style="transform: translate3d(0.4px, -14.8px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="1" class="shadow"
                                    style="transform: translate3d(0.8px, -29.7px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-slide-index="3"
                            style="width: 663px; transform: translate3d(-145.249px, 0px, -580.995px) rotateX(0deg) rotateY(-145.249deg); z-index: -2; transition-duration: 0ms; margin-right: 300px;">
                            <div class="scene" data-hover-only="false"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="0.5"
                                    style="transform: translate3d(0.1px, -10.9px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="1" class="shadow"
                                    style="transform: translate3d(0.2px, -21.9px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-slide-index="4"
                            style="width: 663px; transform: translate3d(-217.873px, 0px, -871.493px) rotateX(0deg) rotateY(-217.873deg); z-index: -3; transition-duration: 0ms; margin-right: 300px;">
                            <div class="scene" data-hover-only="false"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="0.5"
                                    style="transform: translate3d(0.5px, -9.3px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="1" class="shadow"
                                    style="transform: translate3d(1px, -18.6px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-slide-index="5"
                            style="width: 663px; transform: translate3d(-290.498px, 0px, -1161.99px) rotateX(0deg) rotateY(-290.498deg); z-index: -5; transition-duration: 0ms; margin-right: 300px;">
                            <div class="scene" data-hover-only="false"
                                style="transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="0.5"
                                    style="transform: translate3d(0.3px, -8.5px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png" data-depth="1" class="shadow"
                                    style="transform: translate3d(0.6px, -17px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                            </div>
                        </div>
                    </div>
			 <!-- les fleches et les bulles du carousel -->
                    <!--La fleche gauche-->
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                 <!--Les bulles--->
                <div class="sliderNavigation">
                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 1"></span>
                        <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                            role="button" aria-label="Go to slide 2"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 3"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 4"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 5"></span>
                        <span class="swiper-pagination-bullet" tabindex="0" role="button"
                            aria-label="Go to slide 6"></span>
                    </div><!--La fleche droites-->
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                </div>
            </section>

            <section class="right">
                <div class="rightContent">
                    <div class="model">
                        <p class="modelTitle">GeForce RTX 4070</p>
                        <p class="modelDesc">HDMI/Tri DisplayPort - DLSS 3 - PCI Express (NVIDIA GeForce RTX 4070)</p>
                    </div>


                    <div class="price">
                        <p class="priceFinal">87.5€</p>
                        <p class="priceOriginal">125€</p>
                    </div>
                    <div class="specs">
                        <div class="size">
                            <h3 class="subtitle">Caractéristiques</h3>
                            <div class="dropdown">
                                <div class="form dropContent">
                                    <ul>
                                        <li>Vram: 12 GB </li>
                                        <li>Fréquence de core: 1770 MHz</li>
                                        <li>Consommation: 200 Watt</li>
                                        <li>RGB: Non</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="quantity">
                            <h3 class="subtitle">Quantité</h3>
                            <div class="form quantityCounter">
                                <input class="inputQuantity" onkeydown="return false" type="number" value="1">

                                <i class="icon btnQuantity minus">
                                    <img src="/Commerce/img/Site/minus.svg" alt="">
                                </i>
                                <i class="icon btnQuantity plus">
                                    <img src="/Commerce/img/Site/plus.svg" alt="">
                                </i>
                            </div>

                            <p class="error">Nous n'avons que 5 articles en stock.</p>
                        </div>
                    </div><!--Les carre-->
                    <div class="swiper-container galleryThumbs swiper-container-initialized swiper-container-horizontal swiper-container-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide swiper-slide-active">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png">
                            </div>
                            <div class="swiper-slide swiper-slide-next swiper-slide-thumb-active">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png">
                            </div>
                            <div class="swiper-slide">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png">
                            </div>
                            <div class="swiper-slide">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png">
                            </div>
                            <div class="swiper-slide">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png">
                            </div>
                            <div class="swiper-slide">
                                <img src="/Commerce/img/Article/GeForce_RTX_4070.png">
                            </div>
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