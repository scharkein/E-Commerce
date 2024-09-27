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
  <link rel="stylesheet" href="paiement.css">
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
                <?php 

                  date_default_timezone_set('Europe/Paris');
                  $date = new DateTime();
                  $heure_formattee = $date->format('Y-m-d H:i:s');

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $data = $_POST["data"];
                    $tableau = json_decode($data, true);
                    //print_r($tableau);
                }             
                $prix_revient_total=0;
                $prix_vente_total=0;
                
              foreach ($tableau as $i) {
                  
                  $id_article=$i[0];

                  $query_a= "SELECT * FROM `article` WHERE `Id_article` = $id_article "; 
                  $resultat_a= $link->query($query_a);  
                  $row=$resultat_a->fetch_assoc();
                  
                  $prix_revient=$row['Prix_revient'];
                  $prix_revient_total=$prix_revient_total+$prix_revient*$i[1];

                  $prix_vente=$row['Prix_vente'];
                  $prix_vente_total=$prix_vente_total+$prix_vente*$i[1];
              }  
              $prix_vente_total=$prix_vente_total+$prix_vente_total*0.05+15;

              $solde=$_SESSION['utilisateur_solde'];

              //echo "<br>P vente tot : ".$prix_vente_total."<br>P revient tot : ".$prix_revient_total."<br>";

              if($solde>=$prix_vente_total){
                $test=True;
              }
              else{
                $test=False;
              }

              // Créer la ligne dans commande avec l'heure en suprimant celle dans panier
              if ($test){
                if (!empty($tableau)) {
                    foreach ($tableau as $i) {
                        $Id_article = $i[0];  
                        $Id_client=$_SESSION['utilisateur_id'];
                        $query = "INSERT INTO `commande` (`Id_article`, `Id_client`, 
                                  `Quantité`, `Date`) VALUES (?, ?, ?, ?)";
                        $stmt = mysqli_prepare($link, $query);
                
                        if ($stmt) {
                            $quant = $i[1]; 
                            $heure_formattee = date('Y-m-d H:i:s'); 
                

                            mysqli_stmt_bind_param($stmt, "iiis", $Id_article, $_SESSION['utilisateur_id'], $quant, $heure_formattee);
                            $result = mysqli_stmt_execute($stmt);
                
                            if ($result) {
                                //echo "Commande passée avec succès";
                                
                                $query_d= "DELETE FROM panier WHERE Id_article=$Id_article AND Id_client=$Id_client";    
                                $resultat_d = $link->query($query_d);  

                                // Argent de l'entreprise 
                                $query_c= "SELECT * FROM `compte_client` where `Id_client`=-1";    
                                $resultat_c = $link->query($query_c);  
                                $row_c=$resultat_c->fetch_assoc();
                                
                                $A_entreprise=$row_c['Solde'];

                                $A_entreprise=$A_entreprise+$prix_revient_total;

                                $query_modif="UPDATE compte_client SET Solde=$A_entreprise  WHERE Id_client =-1";
                                $result_modif=$link->query($query_modif);

                                // Argent du client 

                                $query_client= "SELECT * FROM `compte_client` where `Id_client`=$Id_client";    
                                $resultat_client = $link->query($query_client);  
                                $row_client=$resultat_client->fetch_assoc();
                                
                                $A_client=$row_client['Solde'];

                                $A_client=$A_client-$prix_vente_total;

                                $query_modif_c="UPDATE compte_client SET Solde=$A_client  WHERE Id_client =$Id_client";
                                $result_modif_c=$link->query($query_modif_c);                                


                                $_SESSION['utilisateur_solde']=$A_client;
                            } else {
                                echo "Erreur lors de l'insertion : " . mysqli_error($link);
                            }
                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Erreur de préparation de la requête : " . mysqli_error($link);
                        }
                    }
                } else {
                    echo "Le tableau est vide.";
                }
                echo "<br><br><h1>Commande passée avec succès</h1>";
              }
              else{
                echo "<br><br><h2>Solde trop petite pour acheter ce panier. <br><br>Allez dans votre espace client pour vous ajouter une plus grande solde.</h2>";
              }
                ?>
              </section>
            </div>
        </div>
      <script src="paiment.js"></script>
    </body>
</html>