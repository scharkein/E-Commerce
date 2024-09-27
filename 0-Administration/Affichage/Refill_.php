<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce';

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); 
mysqli_set_charset($link, "utf8");  

if (mysqli_connect_errno()) {   
    printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}


$execut_select = "SELECT * FROM `article`";    
$resultat = $link->query($execut_select);                         
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
  <title>Réaprovisionnement </title>
</head>
<body>
  <header>
    <h1>Envoi réaprovisionnement<h1><a href="/Commerce/4-Connexion/Login_create_user.php">Retour site</a> </h1></h1>
  </header>
    
  
    <br><br>
    <section>

    <?php 
    
    
    $query= "SELECT * FROM `article` where `Quantité`<10";    
    $resultat = $link->query($query);  
    
    $min=$_POST['min'];
    $max=$_POST['max'];

    echo "Min : ".$min." Max : ".$max."<br>";

    if($min>$max){
        echo "<br>Probleme : il faut que min soit inférieur a max ";
    }
    
    while ($row=$resultat->fetch_assoc()){
        $nombreAleatoire = rand(); // Crée un nombre entier aléatoire
        $nombreAleatoire = rand($min, $max); // Crée un nombre entier aléatoire entre $min et $max

        echo "<br>ID article : ".$row['Id_article']."Quantité : ".$row['Quantité'];
        echo "<br>".$nombreAleatoire;

        $Id_article=$row['Id_article'];

        $query_modif="UPDATE article SET Quantité=$nombreAleatoire  WHERE Id_article =$Id_article";
        $result_modif=$link->query($query_modif);
               
    }
    ?>
    


    </section>
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