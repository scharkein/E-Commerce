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


$execut_select = "SELECT * FROM `article` where Type=7";// A faire la requete SQL avec $valeur_prix de choix article pour trie uniquement avec type d'objet
$resultat = $link->query($execut_select);  // Join la requete a la bdd
if (!$resultat) {
  printf("Erreur SQL : %s\n", mysqli_error($link));
  exit();
}
// création d'une fonction pour créer un menu déroulant d'info a partir d'une bdd
function afficherOptions($resultat, $nomId, $nomValeur) {// resultat = requete , nomID= ID de chaque critère ,  nomvaleurs= critere de chaque valeur 
  $resultat->data_seek(0);// remet le pointer de la lecture de la requete a 0, obligatoire car on fait plussieurs parcours 
  $valeursDejaAffichees = array();// créer un tableau vide

  while ($row = $resultat->fetch_assoc()) { // Parcour d'un tableau, $resultat est la valeur de chaque ligne du tableau
      $valeur = $row[$nomValeur];// extrait la valeur de la colonne

      if (!in_array($valeur, $valeursDejaAffichees)) {//vérifie qu'lle n'est pas deja dans le tableau pour éviter les valeurs distinctes, elle renvoi TRUE si oui et ! inverse le résultat
          echo "<option value='" . $row[$nomId] . "'>" . $valeur . "</option>";//Créer la balise option pour fire chaque option du menu déroulant 
          $valeursDejaAffichees[] = $valeur;//ajout de la valeur mise dans le menu déroulant
      }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création d'une alimentation : </title>
</head>
<body>
  <header>
    <h1>Création d'une alimentation :</h1>
  </header>
  
  <section>
    <form action="7_.php" method="POST">
    <fieldset >
        <legend>Article</legend>	

	
    Nom de l'article Var 50 <br><input type="text" name="nom"><br>

	  Description Var 1000<br><textarea type="text" name="desc"  rows="5" cols="100"></textarea><br>
		
    Marque<br><select name="marque">   
      <?php afficherOptions($resultat, 'Marque', 'Marque'); // appel de la fonction  ?> 
      </select>
      <input type="text" name="marque1" >
      <br>
    
    Gamme<br><select name="gamme">
      <?php afficherOptions($resultat, 'Gamme', 'Gamme'); ?>
      </select>
      <input type="text" name="gamme1" >
      <br>
      
    Quantité INT 4<br><input type="int" name="quantite" value=""><br>

    Prix vente FLOAT 10<br><input type="int" name="p_vente" value=""><br>

    Prix revient FLOAT 10<br><input type="int" name="p_revient" value=""><br>

		</fieldset>




        Taille<br><select name="Critere_1">
  <?php afficherOptions($resultat, 'Critere_1', 'Critere_1'); ?>
    </select>      <input type="text" name="Crit1" ><br>

    Dimension<br><select name="Critere_2">
  <?php afficherOptions($resultat, 'Critere_2', 'Critere_2'); ?>
    </select><input type="text" name="Crit2" ><br>
    
    Type modulaire OUI/NON<br><select name="Critere_3">
  <?php afficherOptions($resultat, 'Critere_3', 'Critere_3'); ?>
    </select><input type="text" name="Crit3" ><br>

    Consommation <br><select name="Critere_4">
  <?php afficherOptions($resultat, 'Critere_4', 'Critere_4'); ?>
    </select><input type="text" name="Crit4" ><br>

    <input type="submit" value="Envoyer">

</section>
</form>

<style>
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