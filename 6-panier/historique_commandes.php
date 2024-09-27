<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; 

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");  
?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <title>Historique de commandes</title>   
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


$user_id=$_SESSION['utilisateur_id'];

?>  

<script>
    var userId = "<?php echo $user_id; ?>";
</script>
<body>
        <div class="wrapper">
          <div class="content">
              <section class="left">
              </section>
              <section class="right">
                <h1>Commande passées</h1>
                <div class="shopping-cart">
                    <div class="column-labels">
                        <label class="product-image">Image</label>
                        <label class="product-details">Produits</label>
                        <label class="product-price">Prix</label>
                        <label class="product-quantity">Quantité</label>
                        <label class="product-date">Date</label>
                        <label class="product-clients">Clients</label>
                        <label class="product-line-price">Total</label>
                    </div>
                    
                <!--le debut du produit-->
                <!-- EXEMPLE
                    <div class="product">
                        <div class="product-image">
                            <img src="../img/Article/GeForce_RTX_4070.png">
                        </div>
                        <div class="product-details">
                            <div class="product-title">GeForce_RTX_4070</div>
                                <p class="product-description">la carte graphique Gigabyte GeForce RTX 4070 WINDFORCE OC 12G vous permet d'obtenir une qualité graphique exceptionnelle pour jouer dans les meilleures conditions. Immersion totale garantie.</p>
                            </div>
                            <div class="product-price">700</div>
                            <div class="product-quantity">
                                <input type="number" value="2" min="1">
                            </div>
                            <div class="product-removal">
                                <button class="remove-product">retirer</button> 
                            </div>
                        <div class="product-line-price">1400</div>
                    </div>
                -->
                    <!--la fin du produit-->
                    
                    <?php 
                    $query_panier= "SELECT * FROM `commande` JOIN `compte_client` ON commande.Id_client=compte_client.Id_client ORDER BY Date DESC";    
                    $resultat_panier = $link->query($query_panier); 

                    while($row=$resultat_panier->fetch_assoc()){
                        $Id_article=$row['Id_article'];

                        $query_article= "SELECT * FROM `article` where `Id_article`=$Id_article";    
                        $resultat_article = $link->query($query_article);  
                    
                        $row_a=$resultat_article->fetch_assoc();
                    
                        $ID=$row_a['Id_article'];
                        $nom=$row_a['Name'];
                        $desc=$row_a['Description'];
                        $prix=$row_a['Prix_vente'];
                        $quantité=$row['Quantité'];
                        $date=$row['Date'];
                        $nom_client=$row['Nom'];
                        $prenom=$row['Prenom'];
    
                        echo "
                        <div class='product'>
                            <div class='product-image'>
                                <img src='../img/Article/".$ID."_0.png'>
                            </div>
                            <div class='product-details'>
                                <div class='product-title'><strong>".$nom."</strong></div>
                                <p class='product-description'>".$desc."</p>
                            </div>
                            <div class='product-price'>".$prix."</div>
                            <div class='product-quantity'>
                                <input type='number' value='".$quantité."' min='1' readonly>
                            </div>
                            <div class='product-date'>".$date."
                            </div>
                            <div class='product-clients'>".$nom_client."\n".$prenom."
                            </div>
                            <div class='product-line-price'>1400</div>
                        </div>
                        ";
                    }
                
                    ?>

                    <div class="totals-container">
                        <div class="totals">
                            <div class="totals-item">
                                <label>Total</label>
                                <div class="totals-value" id="cart-subtotal">0</div> <!--calculer en js-->
                            </div>

                        <form method="post" action="../6-panier/paiement.php">
                            <!-- Champ de formulaire pour le tableau encodé en JSON -->

                        </form>

                        
                            <!-- <a href="../6-panier/paiement.php"><button class="checkout">valider</button></a> -->
                        </div>
                    </div>
                </div>
              </section>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="panier.js"></script>
    </body>
</html>