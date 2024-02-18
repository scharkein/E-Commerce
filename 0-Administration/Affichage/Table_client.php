<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); //Connexion a la base de donnée avec la valeur $link
mysqli_set_charset($link, "utf8");// Il y a des problèmes si ont le met pas CAR C POURRI MYSQLI

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
// création d'une fonction pour créer un menu déroulant d'info a partir d'une bdd

function afficherOptions($resultat, $nomId, $nomValeur) {                           // resultat = requete , nomID= ID de chaque critère ,  nomvaleurs= critere de chaque valeur 
  $resultat->data_seek(0);                                                          // remet le pointer de la lecture de la requete a 0, obligatoire car on fait plussieurs parcours 
  $valeursDejaAffichees = array();                                                  // créer un tableau vide

  while ($row = $resultat->fetch_assoc()) {                                         // Parcour d'un tableau, $resultat est la valeur de chaque ligne du tableau
      $valeur = $row[$nomValeur];                                                   // extrait la valeur de la colonne

      if (!in_array($valeur, $valeursDejaAffichees)) {                              //vérifie qu'lle n'est pas deja dans le tableau pour éviter les valeurs distinctes, elle renvoi TRUE si oui et ! inverse le résultat
          echo "<option value='" . $row[$nomId] . "'>" . $valeur . "</option>";     //Créer la balise option pour fire chaque option du menu déroulant 
          $valeursDejaAffichees[] = $valeur;                                        //ajout de la valeur mise dans le menu déroulant
      }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affichage table client : </title>
</head>
<body>
  <header>
    <h1>Affichage table client :</h1>
  </header>
  
  <section>
    <form action="Table_client_.php" method="POST">
        <table>
            <tr>
            <th>Id_client</th>
            <th>Nom</th>    
            <th>Prenom</th>  
            <th>Email</th>  
            <th>Adresse</th>
            <th>Code_postal</th>
            <th>Mdp</th>      
        </tr>
        <?php 
            while($row=$resultat->fetch_assoc()){
                $ID=$row['Id_client'];$Nom=$row['Nom'];$Prenom=$row['Prenom'];$Email=$row['Email'];$Adresse=$row['Adresse'];$Code_postal=$row['Code_postal'];$Mdp=$row['Mdp'];
                
                echo "
                <tr>
                <th>$ID</th>
                <th>$Nom</th>    
                <th>$Prenom</th>  
                <th>$Email</th>  
                <th>$Adresse</th>
                <th>$Code_postal</th>
                <th>$Mdp</th>      
            </tr>
                ";
            
            }
        ?>
    </table>
        
    <br>
    Modifier la ligne ayant pour ID :
        <select name='Id_client'>
        <?php afficherOptions($resultat,'Id_client','Id_client')   ?>
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