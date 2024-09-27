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
    <title>Panier</title>   
  <link rel="stylesheet" href="panier.css">
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
?>  <body>
        <div class="wrapper">
          <div class="content">
              <section class="left">
              </section>
              <section class="right">
                <h1>Panier</h1><img class="img-cart" src="../img/Site/shopping-cart.svg" alt="panier" >
                <div class="shopping-cart">
                    <div class="column-labels">
                        <label class="product-image">Image</label>
                        <label class="product-details">Produits</label>
                        <label class="product-price">Prix</label>
                        <label class="product-quantity">Quantité</label>
                        <label class="product-removal">enlever</label>
                        <label class="product-line-price">Total</label>
                    </div>
                    <!--le debut du produit-->
                    <div class="product">
                        <div class="product-image">
                            <img src="../img/Article/GeForce_RTX_4070.png">
                        </div>
                        <div class="product-details">
                            <div class="product-title">GeForce_RTX_4070</div><!--mettre produits en php-->
                                <p class="product-description">la carte graphique Gigabyte GeForce RTX 4070 WINDFORCE OC 12G vous permet d'obtenir une qualité graphique exceptionnelle pour jouer dans les meilleures conditions. Immersion totale garantie.</p><!--mettre description en php-->
                            </div>
                            <div class="product-price">700</div><!--mettre prix en php-->
                            <div class="product-quantity">
                                <input type="number" value="2" min="1"><!--mettre valeur en php-->
                            </div>
                            <div class="product-removal">
                                <button class="remove-product">retirer</button> <!--enleve le produit-->
                            </div>
                        <div class="product-line-price">1400</div><!--calculer en js-->
                    </div>
                    <!--la fin du produit-->
                    <!--le debut du produit-->
                    <div class="product">
                        <div class="product-image">
                            <img src="../img/Article/GeForce_RTX_4070.png">
                        </div>
                        <div class="product-details">
                            <div class="product-title">GeForce_RTX_4070</div><!--mettre produits en php-->
                                <p class="product-description">la carte graphique Gigabyte GeForce RTX 4070 WINDFORCE OC 12G vous permet d'obtenir une qualité graphique exceptionnelle pour jouer dans les meilleures conditions. Immersion totale garantie.</p><!--mettre description en php-->
                            </div>
                            <div class="product-price">700</div><!--mettre prix en php-->
                            <div class="product-quantity">
                                <input type="number" value="2" min="1"><!--mettre valeur en php-->
                            </div>
                            <div class="product-removal">
                                <button class="remove-product">retirer</button> <!--enleve le produit-->
                            </div>
                        <div class="product-line-price">1400</div><!--calculer en js-->
                    </div>
                    <!--la fin du produit-->
                    <div class="totals-container">
                        <div class="totals">
                            <div class="totals-item">
                                <label>total</label>
                                <div class="totals-value" id="cart-subtotal">0</div> <!--calculer en js-->
                            </div>
                            <div class="totals-item">
                                <label>Taxe (5%)</label>
                                <div class="totals-value" id="cart-tax">0</div> <!--calculer en js-->
                            </div>
                            <div class="totals-item">
                                <label>livraison</label>
                                <div class="totals-value" id="cart-shipping">15.00</div> <!--Prix fixe ?-->
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Total final</label>
                                <div class="totals-value" id="cart-total">0</div> <!--calculer en js-->
                            </div>
                        </div>
                            <button class="checkout">valider</button>
                        </div>
                    </div>
                </div>
              </section>
            </div>
        </div>
      <script src="panier.js"></script>
    </body>
</html>