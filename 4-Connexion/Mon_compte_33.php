<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; /* nom de la base de donné dans Php_my_admin*/

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname); //Connexion a la base de donnée avec la valeur $link
mysqli_set_charset($link, "utf8");  // Il y a des problèmes si ont le met pas CAR C POURRI MYSQLI

if (mysqli_connect_errno()) {   // test la connexion
    //printf("Echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}else{
    //echo 'connexione établie';
}


if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['nom'], $_POST['prenom'],$_POST['adresse'], $_POST['code_postal'],$_POST['mail'], $_POST['psw'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $mail = $_POST['mail'];
        $psw = $_POST['psw'];
        $ID_client=$_POST['ID'];
        $solde=$_POST['solde'];
        //echo $solde;

        $query = "UPDATE `compte_client` SET `Nom`=?, `Prenom`=?, `Email`=?, `Adresse`=?, `Code_postal`=?, `Mdp`=?, `Solde`=? WHERE `id_client`=$ID_client /* condition pour identifier le compte client à mettre à jour */";
        $stmt = mysqli_prepare($link, $query);
        $_SESSION['utilisateur_solde']=$solde;
        if ($stmt){
            mysqli_stmt_bind_param($stmt, "ssssisd", 
            $nom, $prenom, $mail, $adresse, $code_postal, $psw ,$solde);
            $result = mysqli_stmt_execute($stmt);
            
            if ($result) {
                echo "<h1>Votre compte a bien été modifié </h1>";   // Il faut modifier les variables de session uniquement si la bdd a bien été modifiée également
                
                //header("Location: /Commerce/1-Accueil/home_page.php");
                session_start();
                session_unset();
                session_destroy();
                session_start();
                $_SESSION['utilisateur_id'] = $ID_client;
                $_SESSION['utilisateur_nom'] = $nom;
                $_SESSION['utilisateur_prenom'] = $prenom;
                $_SESSION['utilisateur_email'] = $mail;
                $_SESSION['utilisateur_adresse'] = $adresse;
                $_SESSION['utilisateur_code_postal'] = $code_postal;
                $_SESSION['utilisateur_mdp'] = $psw;
                $_SESSION['utilisateur_solde']=$solde;


            } else {
                echo "Erreur lors de l'insertion : " . mysqli_error($link);
            }        
        }
    }else {
        echo "Tous les champs du formulaire ne sont pas définis.";
    }

}


mysqli_close($link);
?>