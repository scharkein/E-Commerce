<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce';                                                                   /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);                                          //Connexion a la base de donnée avec la valeur $link

if (mysqli_connect_errno()) {   // test la connexion
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création Article</title>

</head>
<body>
  
  <header>
    <h1>Créer article</h1>
  </header>
  <section>
    <h2> Quel est le type d'objet que vous allez ajouter ?</h2>
   
    <br>

    <form action="redirection.php" method="post">
      <select name="type" method="post">  
      <?php              
      $execut_select = "SELECT Id_type,Type FROM type_composant";  //exécution de la requête dans execut_select sous forme de "Tableau"
      $resultat = $link->query($execut_select);                                                           
			while ($row = $resultat->fetch_assoc()) {  //extraire une ligne de $résultat et la stocker dans $row
				echo "<option value='" . $row['Id_type'] . "'>" . $row['Type'] . "</option>";  // on extrait le 'Id_type' (c'est la value) 
			}                                                                                // et affiche 'Type' 
	    ?>
      </select>
      <input type="submit" value="Envoyer">
    </form>
    </section>
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