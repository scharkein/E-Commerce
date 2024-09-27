<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); //Connexion a la base de donnée avec la valeur $link
mysqli_set_charset($link, "utf8");  // Il y a des problèmes si ont le met pas CAR C POURRI MYSQLI

if (mysqli_connect_errno()) {   // test la connexion
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}


$execut_select = "SELECT * FROM `article`";    // A faire la requete SQL avec $valeur_prix de choix article pour trie uniquement avec type d'objet
$resultat = $link->query($execut_select);                         // Join la requete a la bdd
if (!$resultat) {
  printf("Erreur SQL : %s\n", mysqli_error($link));
  exit();
}
function afficherOptions($resultat, $nomId, $nomValeur) {                            
  $resultat->data_seek(0);                                                           
  $valeursDejaAffichees = array();                                                  

  while ($row = $resultat->fetch_assoc()) {                                         
      $valeur = $row[$nomValeur];                                                   
      if (!in_array($valeur, $valeursDejaAffichees)) {                              
          echo "<option value='" . $row[$nomId] . "'>" . $valeur . "</option>";
          $valeursDejaAffichees[] = $valeur;                                        
      }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affichage table article : </title>
</head>
<body>
  <header>
    <h1>Affichage table article :</h1>
  </header>
  
  <section>
    <form action="Table_article_envoi.php" method="POST">
        <table>
            <tr>
        <?php 
        $Id_article=$_POST['Id_article'];  
            while($row=$resultat->fetch_assoc() ){
                if ($row['Id_article']==$Id_article){
                    $ID=$row['Id_article'];$Type=$row['Type'];$Name=$row['Name'];$Desc=$row['Description'];$Marque=$row['Marque'];$Gamme=$row['Gamme'];
                    $Quantite=$row['Quantité'];$Prix_revient=$row['Prix_revient'];$Prix_vente=$row['Prix_vente'];$Critere_1=$row['Critere_1'];
                    $Critere_2=$row['Critere_2'];$Critere_3=$row['Critere_3'];$Critere_4=$row['Critere_4'];$Critere_5=$row['Critere_5'];$Actif=$row['Actif'];
                    echo "<th>Id_article</th><th>Type</th><th>Name</th><th>Description</th><th>Marque</th><th>Gamme</th><th>Quantité</th><th>Prix_revient</th><th>Prix_vente</th><th>Critere 1</th><th>Critere 2</th><th>Critere 3</th><th>Critere 4</th><th>Critere 5</th><th>Actif</th></tr><tr>";
                    echo "<th>$ID</th><th>$Type</th><th>$Name</th><th>$Desc</th><th>$Marque</th><th>$Gamme</th><th>$Quantite</th><th>$Prix_revient</th><th>$Prix_vente</th><th>$Critere_1</th><th>$Critere_2</th><th>$Critere_3</th><th>$Critere_4</th><th>$Critere_5</th><th>$Actif</th> </tr>";   
                }
            }
        ?>
    </table>
    <br>
    <br>
    <h1>NE RIEN ECRIRE SI RIEN A MODIFIER</h1>
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    Modifier le type  :<input type="int" name="Type" ><br><input type="hidden" name="Type1" value="<?php echo $Type; ?>"><br>
    Modifier le nom  :<input type="text" name="Name" ><br><input type="hidden" name="Name1" value="<?php echo $Name; ?>"><br>
    Modifier la Description:<input type="text" name="Description" ><br><input type="hidden" name="Description1" value="<?php echo $Desc; ?>"><br>
    Modifier la marque  :<input type="text" name="Marque" ><br><input type="hidden" name="Marque1" value="<?php echo $Marque; ?>"><br>
    Modifier la gamme  :<input type="text" name="Gamme" ><br><input type="hidden" name="Gamme1" value="<?php echo $Gamme; ?>"><br>
    Modifier la quantité  :<input type="text" name="Quantite" ><br><input type="hidden" name="Quantite1" value="<?php echo $Quantite; ?>"><br>
    Modifier la Prix vente  :<input type="text" name="Prix_vente" ><br><input type="hidden" name="Prix_vente1" value="<?php echo $Prix_vente; ?>"><br>
    Modifier le Critere 1  :<input type="text" name="Critere_1" ><br><input type="hidden" name="Critere_11" value="<?php echo $Critere_1; ?>"><br>
    Modifier le Critere 2  :<input type="text" name="Critere_2" ><br><input type="hidden" name="Critere_21" value="<?php echo $Critere_2; ?>"><br>
    Modifier le Critere 3  :<input type="text" name="Critere_3" ><br><input type="hidden" name="Critere_31" value="<?php echo $Critere_3; ?>"><br>
    Modifier le Critere 4  :<input type="text" name="Critere_4" ><br><input type="hidden" name="Critere_41" value="<?php echo $Critere_4; ?>"><br>
    Modifier le Critere 5  :<input type="text" name="Critere_5" ><br><input type="hidden" name="Critere_51" value="<?php echo $Critere_5; ?>"><br>
    Rendre inactif avec motif si besoin  :<input type="text" name="Actif" ><br><input type="hidden" name="Actif1" value="<?php echo $Actif; ?>"><br>
    Remettre l'activité :<input type="hidden" name="Actif2" value="0" /><input type="checkbox" name="Actif2" value="1" <?php if(!empty($_POST['Actif2'])) echo 'checked'; ?> />
<br><br>

    <input type="submit" value="Envoyer">

</section>
</form>

<style>
    table, th, td {
        border: 2px solid white;
        border-collapse: collapse;
    }

    body {
      background-color: #1a1a1a; /* Noir */
      color: #ffffff; /* Blanc pour le texte */
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #47166b; /* Violet foncé */
      padding: 10px;
      text-align: center;
    }

    section {
      padding: 20px;
    }

    footer {
      background-color: #47166b; /* Violet foncé */
      padding: 10px;
      text-align: center;
      position: absolute;
      bottom: 0;
      width: 100%;
    }
  </style>
</body>
</html>
<?php 
mysqli_close($link);
?>