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


$execut_select = "SELECT * FROM `compte_client`";    // A faire la requete SQL avec $valeur_prix de choix article pour trie uniquement avec type d'objet
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
  <title>Affichage table client  </title>
</head>
<body>
  <header>
    <h1>Affichage table client <h1><a href="/Commerce/4-Connexion/Login_create_user.php">Retour site</a> </h1></h1>
  </header>
  
  <section>
    <form action="Table_client_envoi.php" method="POST">
        <table>
            <tr>
        <?php 
        $Id_client=$_POST['Id_client'];  // On pourrait juste modifier la requête SQL pour avoir que l'user avec l'id voulut
            while($row=$resultat->fetch_assoc() ){
                if ($row['Id_client']==$Id_client){
                    $ID=$row['Id_client'];$Nom=$row['Nom'];$Prenom=$row['Prenom'];$Email=$row['Email'];$Adresse=$row['Adresse'];$Code_postal=$row['Code_postal'];$Mdp=$row['Mdp'];
                    echo "<th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Adresse</th><th>Code_postal</th><th>Mdp</th></tr><tr>";
                    echo "<th>$ID</th><th>$Nom</th><th>$Prenom</th><th>$Email</th><th>$Adresse</th><th>$Code_postal</th><th>$Mdp</th> </tr>";
                    
                }
            
            }
        ?>
    </table>
    <br>
    <br>
    <h1>NE RIEN ECRIRE SI RIEN A MODIFIER</h1>
    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
    Modifier le nom  :<input type="text" name="Nom" ><br><input type="hidden" name="Nom1" value="<?php echo $Nom; ?>"><br>
    Modifier le Prenom  :<input type="text" name="Prenom" ><br><input type="hidden" name="Prenom1" value="<?php echo $Prenom; ?>"><br>
    Modifier le Email  :<input type="text" name="Email" ><br><input type="hidden" name="Email1" value="<?php echo $Email; ?>"><br>
    Modifier le Adresse  :<input type="text" name="Adresse" ><br><input type="hidden" name="Adresse1" value="<?php echo $Adresse; ?>"><br>
    Modifier le Code_postal  :<input type="int" name="Code_postal" ><br><input type="hidden" name="Code_postal1" value="<?php echo $Code_postal; ?>"><br>
    Modifier le Mdp  :<input type="text" name="Mdp" ><br><input type="hidden" name="Mdp1" value="<?php echo $Mdp; ?>"><br>

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