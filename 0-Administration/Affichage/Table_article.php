<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); //Connexion a la base de donnée avec la valeur $link
// Il y a des problèmes si ont le met pas CAR C POURRI MYSQLI
mysqli_set_charset($link, "utf8");
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
    <h1>Affichage table article : </h1> <h1><a href="/Commerce/4-Connexion/Login_create_user.php">Retour site</a> </h1>
  </header>
  
  <section>
    <form action="Table_article_.php" method="POST">
        <table>
            <tr>
            <th>Id_article</th>
            <th>Type</th>    
            <th>Name</th>  
            <th>Description</th>  
            <th>Marque</th>
            <th>Gamme</th>
            <th>Quantité</th>
            <th>Prix_revient</th>
            <th>Prix_vente</th>
            <th>Critere 1</th>
            <th>Critere 2</th>
            <th>Critere 3</th>
            <th>Critere 4</th>
            <th>Critere 5</th>
            <th>Activité</th>     
        </tr>
        <?php 
            while($row=$resultat->fetch_assoc()){
                $ID=$row['Id_article'];$Type=$row['Type'];$Name=$row['Name'];$Desc=$row['Description'];$Marque=$row['Marque'];
                $Gamme=$row['Gamme'];$Quantite=$row['Quantité'];$Prix_revient=$row['Prix_revient'];$Prix_vente=$row['Prix_vente'];
                $Critere_1=$row['Critere_1'];$Critere_2=$row['Critere_2'];$Critere_3=$row['Critere_3'];$Critere_4=$row['Critere_4'];
                $Critere_5=$row['Critere_5'];$Actif=$row['Actif'];
                
                echo "
                <tr>
                <th>$ID</th>
                <th>$Type</th>    
                <th>$Name</th>  
                <th>$Desc</th>  
                <th>$Marque</th>
                <th>$Gamme</th>
                <th>$Quantite</th>
                <th>$Prix_revient</th> 
                <th>$Prix_vente</th> 
                <th>$Critere_1</th> 
                <th>$Critere_2</th> 
                <th>$Critere_3</th> 
                <th>$Critere_4</th> 
                <th>$Critere_5</th>
                <th>$Actif</th> 
            </tr>
                ";
            
            }
        ?>
    </table>
        
    <br>
    Modifier la ligne ayant pour ID :
        <select name='Id_article'>
        <?php afficherOptions($resultat,'Id_article','Id_article')   ?>
    </select>
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