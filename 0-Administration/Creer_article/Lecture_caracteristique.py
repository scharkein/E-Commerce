import requests
import os
import mysql.connector # Dans pip installer : mysql-connector-python
import csv

from rembg import remove
from PIL import Image


# <================================ Connexion a la BDD =====================>

config = {
    "host": "localhost",
    "user": "root",
    "password": "root",
    "database": "commerce"
}

cnx = mysql.connector.connect(**config)

cursor = cnx.cursor()

query2 = "SELECT Id_article FROM article ORDER BY Id_article DESC LIMIT 1"

# Exécuter la requête
cursor.execute(query2)

# Récupérer le résultat
last_article_id = cursor.fetchone()[0]     # Erreur si rien dans la bdd, ne peux pas marcher

last_article_id+=1
numero_page=last_article_id
print("L'ID du dernier article inséré est :", last_article_id)

# <====================================Création d'une page web ===========================>

chemin_page_web_test="E:\\OneDrive\\Site_web\\UwAmp\\www\\Commerce\\2-Article\\TEST.php"
chemin_page_web="E:\\OneDrive\\Site_web\\UwAmp\\www\\Commerce\\2-Article\\"

def Creation_page_web(Id_article,chemin):
    contenu_html = '''


    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Article Page</title>
            <link rel="stylesheet" href="exemple.css">

        </head>

        <body>
        <?php

        $sqlHost = 'localhost';
        $sqlUser = 'root';
        $sqlPass = 'root';
        $dbname = 'commerce';

        $link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
        mysqli_set_charset($link, "utf8");

        if (mysqli_connect_errno()) {
            printf("Echec de la connexion : ", mysqli_connect_error());
            exit();
        }else{
            //echo "babababa marche ";
        }



        chdir('..');
        $nouveauRepertoireActif = getcwd();
        $sousRepertoireTete = $nouveauRepertoireActif . '/5-Tete';
        //echo $sousRepertoireTete;
        if (is_dir($sousRepertoireTete)) {
            //echo "Le sous-répertoire login marche  existe.";
            include("$sousRepertoireTete/tete.php"); 
        } else {
            echo "sssLe sous-répertoire n'existe pas.";
        }



        $quer="SELECT * FROM article where Id_article='''+str(Id_article)+'''"; // Trie par ordre décroissant et prend QUE la première valeur 
        $result = mysqli_query($link, $quer);


        $row=$result->fetch_assoc();
        $Id_article=$row['Id_article'];
        $type=$row['Type'];
        $Nom=$row['Name'];
        $desc=$row['Description'];
        $marque=$row['Marque'];
        $Gamme=$row['Gamme'];
        $quantite=$row['Quantité'];
        $P_vente=$row['Prix_vente'];
        $P_revient=$row['Prix_revient'];
        $Critere_1=$row['Critere_1'];
        $Critere_2=$row['Critere_2'];
        $Critere_3=$row['Critere_3'];
        $Critere_4=$row['Critere_4'];
        $Critere_5=$row['Critere_5'];
        //echo "$quantite";

        if(isset($_SESSION['utilisateur_nom'])){
            $user_id=$_SESSION['utilisateur_id'];

            $query_a= "SELECT * FROM `panier` WHERE `Id_article` = $Id_article AND `Id_client` =$user_id";    // test si il y a deja un panier pour cette article avec le client 
            $resultat_a= $link->query($query_a);  
            $rowaaaa=$resultat_a->fetch_assoc();
        
            $quantite=$quantite+$rowaaaa['Quantité'];
        }
        

        if ($row['Actif']!==null){
            header("Location: /Commerce/4-Connexion/Login_create_user.php");
            echo "$sousRepertoireTete/Login_create_user.php";
        }

        $Quant=0;




        ?>

    <script>
        let product = {
            value: <?php echo json_encode($P_vente); ?>,
            maxQuantity: <?php echo json_encode($quantite); ?>,
            Id_article: <?php echo json_encode($Id_article); ?>, 
        };
    </script>




        <div class="content">
                    <section class="left"> <!--===============================================================================
                                                ============================= Gauche ======================================
                                            ==================================================================================-->
                        <div class="swiper-container galleryMain swiper-container-coverflow swiper-container-3d swiper-container-initialized swiper-container-horizontal">
                            <div class="swiper-wrapper"
                                style="transform: translate3d(-5778px, 0px, 0px); perspective-origin: 6109.5px 50%; transition-duration: 0ms;">
                                
                                <?php
        $test = true;
        $i = 0;
        while ($test) {
            $imagePath ="Commerce/img/Article/{$Id_article}_{$i}.png";
            if (file_exists($imagePath)) {
                echo "<div class='swiper-slide swiper-slide-active' data-swiper-slide-index='1'
                    style='width: 663px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); z-index: 1; transition-duration: 0ms; margin-right: 300px; '>
                    <div class='scene' data-hover-only='false'
                        style='transform: translate3d(0px, 0px, 0px) rotate(0.0001deg); transform-style: preserve-3d; backface-visibility: hidden; pointer-events: none;'>
                        <img src='/Commerce/img/Article/{$Id_article}_{$i}.png' data-depth='0.5' 
                            style='transform: translate3d(0.6px, -14.5px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;'>
                        <img src='/Commerce/img/Article/{$Id_article}_{$i}.png' data-depth='1' class='shadow'
                            style='transform: translate3d(1.1px, -29px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;'>
                    </div>
                </div>";
                $i++;
            } else {
                // Si l'image n'existe pas, sortir de la boucle
                $test = false;
            }
        }
        ?>
        
                            </div>
                    <!-- les fleches et les bulles du carousel -->
                            <!--La fleche gauche-->
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!--Les bulles--->
                        <div class="sliderNavigation">
                            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2"></span>
                                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
                                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span>
                                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span>
                                <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span>
                            </div><!--La fleche droites-->
                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                        </div>
                    </section>

                    <section class="right">
                        <div class="rightContent">
                            <div class="model">
                                <p class="modelTitle"><?php echo $Nom; ?></p>
                                <p class="modelDesc"><?php echo $desc; ?></p>
                            </div>


                            <div class="price">
                                <p class="priceFinal"><?php echo $P_vente; ?>€</p>
                                <p class="priceOriginal"><?php echo $P_vente; ?>€</p>
                            </div>
                            <div class="specs">
                                <div class="size">
                                    <h3 class="subtitle">Caractéristiques</h3>
                                    <div class="dropdown">
                                        <div class="form dropContent">
        <?php if ($type==1): ?>

            <ul>
                <li>Vram: <?php echo $Critere_1; ?></li>
                <li>Fréquence de core: <?php echo $Critere_2; ?></li>
                <li>Consommation: <?php echo $Critere_3; ?></li>
                <li>RGB: <?php echo $Critere_4; ?></li>
            </ul>
        <?php elseif($type==2): ?>

            <ul>
                <li>Cœurs: <?php echo $Critere_1; ?></li>
                <li>Fréquence de base: <?php echo $Critere_2; ?></li>
                <li>Consommation: <?php echo $Critere_3; ?></li>
            </ul>
        <?php elseif($type==3): ?>

            <ul>
                <li>Type (DDR4 / DDR5): <?php echo $Critere_1; ?></li>
                <li>Fréquence de base: <?php echo $Critere_2; ?></li>
                <li>Gb: <?php echo $Critere_3; ?></li>
                <li>RGB: <?php echo $Critere_4; ?></li>
            </ul>
        <?php elseif($type==4): ?>

            <ul>
                <li>Type de RAM (DDR4 / DDR5): <?php echo $Critere_1; ?></li>
                <li>Vitesse RAM max: <?php echo $Critere_2; ?></li>
                <li>Taille: <?php echo $Critere_3; ?></li>

            </ul>
        <?php elseif($type==5): ?>

            <ul>
                <li>Type (SSD/disque dur): <?php echo $Critere_1; ?></li>
                <li>Vitesse de transfert: <?php echo $Critere_2; ?></li>
                <li>Taille: <?php echo $Critere_3; ?></li>
            </ul>
        <?php elseif($type==6): ?>

            <ul>
                <li>Dimension: <?php echo $Critere_1; ?></li>
                <li>Taille carte mère: <?php echo $Critere_2; ?></li>
                <li>Taille bloc d’alimentation: <?php echo $Critere_3; ?></li>
                <li>Longueur carte graphique max: <?php echo $Critere_4; ?></li>
            </ul>
        <?php elseif($type==7): ?>

            <ul>
                <li>Taille: <?php echo $Critere_1; ?></li>
                <li>Dimension: <?php echo $Critere_2; ?></li>
                <li>Type modulaire OUI/NON: <?php echo $Critere_3; ?></li>
                <li>Consommation: <?php echo $Critere_4; ?></li>
            </ul>
        <?php elseif($type==8): ?>

            <ul>
                <li>Type: <?php echo $Critere_1; ?></li>
                <li>Débit d’air: <?php echo $Critere_2; ?></li>
                <li>Socket: <?php echo $Critere_3; ?></li>
                <li>Hauteur: <?php echo $Critere_4; ?></li>
            </ul>
        <?php endif; ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="quantity">
                                    <h3 class="subtitle"></h3>
                                    <div class="form quantityCounter">
                                        <input class="inputQuantity" onkeydown="return false" type="number" value="1">

                                        <i class="icon btnQuantity minus">
                                            <img src="/Commerce/img/Site/minus.svg" alt="">
                                        </i>
                                        <i class="icon btnQuantity plus">
                                            <img src="/Commerce/img/Site/plus.svg" alt="">
                                        </i>
                                    </div>

                                    <p class="error">Nous n'avons que <?php echo $quantite;?> articles en stock.</p>
                                </div>
                            </div><!--Les carre-->
                            <div class="swiper-container galleryThumbs swiper-container-initialized swiper-container-horizontal swiper-container-thumbs">
                                <div class="swiper-wrapper">
                                    
                                    <?php 
                                    $test = true;
                                    $i = 0;
                                    
                                    while ($test) {
                                        $imagePath ="Commerce/img/Article/{$Id_article}_{$i}.png";
                                        if (file_exists($imagePath)) {
                                            echo "<div class=swiper-slide swiper-slide-next swiper-slide-thumb-active><img src='/Commerce/img/Article/{$Id_article}_{$i}.png'></div>";
                                            $i++;
                                        } else {
                                            // Si l'image n'existe pas, sortir de la boucle
                                            $test = false;
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div><!--Le bouton panier-->
                        <div class="btnContainer fixedBtn">
                            
                        <?php // récupere la valeur depuis le JS ~~ ligne 140
                        if (isset($_POST["quantite"])) {
                            $Quant=$_POST["quantite"];
                            $test=True;
                        } else {
                            $test=False;
                        }



                        if (isset($_SESSION['utilisateur_id'])){
                        
                            $query_c= "SELECT * FROM `article` where `Id_article`=$Id_article";    
                            $resultat_c = $link->query($query_c);  
                            $row_c=$resultat_c->fetch_assoc();

                            //$quantite=$row_c['Quantité'];
                            //$query_modif="UPDATE article SET quantité=$  WHERE Id_article =$Id_article AND Id_client=$user_id";
                            //$result_modif=$link->query($query_modif);


                            echo '<button class="btn add">
                                <img src="/Commerce/img/Site/shopping-cart-w.svg" alt="">
                                Ajouter au panier </button>
                                </div>'; 
                                // Test si article existe déjà dans le panier  
                                
                                $query_a= "SELECT * FROM `panier` WHERE `Id_article` = $Id_article AND `Id_client` =$user_id";    // test si il y a deja un panier pour cette article avec le client 
                                $resultat_a= $link->query($query_a);  
                                $row=$resultat_a->fetch_assoc();


                                //echo var_dump($row['Id_panier']);

                                // Création du panier de l'article pour le client 
                                if ($row['Id_panier']==Null){      // Si c'est Null ca veux dire qu'il y a pas de panier du client et de l'article donc on en créer un la : 
                                    
                                    $query = "INSERT INTO `panier` ( `Id_panier`,`Id_article`,`Id_client`, `Quantité`) VALUES (NULL, ?, ?, ?)";
                                    $stmt = mysqli_prepare($link, $query);
                                    if ($test){
                                        mysqli_stmt_bind_param($stmt, "iii", $Id_article , $_SESSION['utilisateur_id'],$Quant);
                                        $result = mysqli_stmt_execute($stmt);
                                        //echo $Quant;
                                        if ($stmt) {
                                            if ($result) {
                                                $query_modif="UPDATE article SET Quantité=$quantite-$Quant  WHERE Id_article =$Id_article";
                                                $result_modif=$link->query($query_modif);
                                                
                                                //echo "Ca marche";
                                                header("Location: /Commerce/1-Acceuil/home_page.php");
                                            } else {
                                                echo "Erreur lors de l'insertion : " . mysqli_error($link);
                                            }
                                            mysqli_stmt_close($stmt);
                                        } else {
                                            echo "Erreur de préparation de la requête : " . mysqli_error($link);
                                        }
                                    }
                                }
                                // Modification du panier de l'article pour le client 
                                else{     
                                    
                                    // On récupere la quantité initial du panier : 
                                    if (isset($_POST['addItem']) && $_POST['addItem'] == 'true') {

                                        // Récupération de la quantité actuelle dans le panier
                                        $query_b = "SELECT Quantité FROM panier WHERE Id_article = ? AND Id_client = ?";
                                        $stmt_b = $link->prepare($query_b);
                                        $stmt_b->bind_param("ii", $Id_article, $user_id);
                                        $stmt_b->execute();
                                        $resultat_b = $stmt_b->get_result();
                                        $rowb = $resultat_b->fetch_assoc();
                                        $q_panier = $rowb['Quantité'];
                                        $stmt_b->close();

                                        // Définition de la quantité dans le panier
                                        $new_quantite = $Quant; // Assurez-vous que $Quant contient la nouvelle quantité à définir
                                        $query_c = "UPDATE panier SET Quantité = ? WHERE Id_article = ? AND Id_client = ?";
                                        $stmt_c = $link->prepare($query_c);
                                        $stmt_c->bind_param("iii", $new_quantite, $Id_article, $user_id);
                                        $stmt_c->execute();
                                        $stmt_c->close();

                                        // Mise à jour de la quantité totale dans la table article
                                        $query_d = "UPDATE article SET Quantité = Quantité - ? + ? WHERE Id_article = ?";
                                        $stmt_d = $link->prepare($query_d);
                                        $stmt_d->bind_param("iii", $Quant, $q_panier, $Id_article);
                                        $stmt_d->execute();
                                        $stmt_d->close();


                                    }
                                    
                                }
                                
                        } 
                        else
                        {
                            echo '<a href="../4-Connexion/Login_create_user.php" ><button class="btn ">
                            Se connecter pour acheter</button></a>
                            </div>';
                        } 
                                    ?>
                        
                        
                        <?php echo '<button class="btn add" style="display:none">
                                <img src="/Commerce/img/Site/shopping-cart-w.svg" alt="">
                                Ajouter au panier</button>
                                </div>' ?>      <!-- À laisser car sinon problème dans le JS car ça ne charge pas dans le cas où il n’y a pas de compte connecté   -->
                </div>
                </section>
                <!-- Swiper -->
            </div>
            </div>

            <script src="swiper.js"></script>
            <script src="exemple.js"></script>
        </body>
        </html>
        
    
    '''
    with open(chemin, "w",encoding='utf-8') as fichier:
        fichier.write(contenu_html)
    # "E:\\OneDrive\\Site web\\UwAmp\\www\\Commerce\\2-Article\\"+ID+".php"
    print(f"Fichier HTML créé avec succès à l'emplacement : {chemin}")


    #repertoire="C:\\Uwamp\\UwAmp\\www\\Commerce\\2-Article\\"+ID+".php"
    #repertoire="E:\\OneDrive\\Site_web\\UwAmp\\www\\Commerce\\2-Article\\"+ID+".php"
    #print("zz",repertoire,"/2-article")
    #print(repertoire)
    # Créez le fichier et ecrire le contenu HTML


# <==================== Récupération de l'image et envoie vers le bon fichier ===================>

def telecharger_image(url, chemin_image, nom_fichier):
    # Effectuer une requête GET pour obtenir le contenu de l'image
    reponse = requests.get(url)
    if reponse.status_code == 200:
        # Créer le chemin complet du fichier en combinant le chemin et le nom du fichier
        chemin_complet = os.path.join(chemin_image, nom_fichier)
        # Ouvrir un fichier en mode écriture binaire et écrire le contenu de l'image
        with open(chemin_complet, 'wb') as f:
            f.write(reponse.content)
        print("L'image a été téléchargée avec succès sous le nom :", nom_fichier)
    else:
        print("Erreur lors du téléchargement de l'image.")

url_image = "https://media.ldlc.com/r1600/ld/products/00/06/03/26/LD0006032604.png"  # <============================================ Vas changer tout le temps

chemin_image_test = r"E:\OneDrive\Site_web\UwAmp\www\Commerce\test\test_image"   # r sert a dire a python que c'est un chemin d'acces
chemin_image = r"E:\OneDrive\Site_web\UwAmp\www\Commerce\img\Article"
nom_fichier = "Test____qdqdblabla.png"    # <============================================ Vas changer tout le temps

#telecharger_image(url_image, chemin_image_test, nom_fichier)

# <====================================== Détourage image ==============================>
def detourage(chemin):
    input = Image.open(chemin)
    output = remove(input)
    # Modifier le chemin de sortie pour avoir une extension de fichier .png
    output_path = chemin[:-4] + ".png"  # Supprimez l'extension actuelle et ajoutez "_detouré.png"
    output.save(output_path)
    print("L'image a été détourée et sauvegardée à :", output_path)

# <==================== Lecture du fichier CSV contenant toutes les données concernant les articles  ===================>
header = "ID;type;nom;desc;marque;gamme;quantite;p_revient;p_vente;Critere_1;Critere_2;Critere_3;Critere_4;Critere_5;Actif;img1;img2;img3;img4;img5\n"
chemin_fichier="E:\\OneDrive\\Site_web\\UwAmp\\www\\Commerce\\0-Administration\\Creer_Article\\Caracteristique_produits_2.csv"

with open(chemin_fichier, "r", encoding='utf-8-sig') as f:
    # Lire la première ligne (en-tête) pour la sauter
    header = f.readline()
    # Lire les lignes restantes
    for ligne in f:
        # Séparer les valeurs de la ligne
        values = ligne.strip().split(";")
        # Récupérer les valeurs sauf les images
        type, nom, desc, marque, gamme, quantite, p_vente, p_revient, c1, c2, c3, c4, c5, actif,img1,img2,img3,img4,img5, *_ = values

        # Créer la requête SQL pour insérer les valeurs dans la table 'article'
        query = """
            INSERT INTO article (Type, Name, Description, Marque, Gamme, Quantité, Prix_revient, Prix_vente,  Critere_1, Critere_2, Critere_3, Critere_4, Critere_5)
            VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """
        # Exécuter la requête avec les valeurs correspondantes
        cursor.execute(query, (type, nom, desc, marque, gamme, quantite, p_revient, p_vente, c1, c2, c3, c4, c5))
        
        #RAPPEL : 
        #chemin_image = r"E:\OneDrive\Site_web\UwAmp\www\Commerce\img\Article"
        

        Nom_de_image=str(last_article_id)+"_0.png"
        telecharger_image(img1,chemin_image,Nom_de_image)

        

        chemin_img_a_detourer=chemin_image+"\\"+Nom_de_image
        detourage(chemin_img_a_detourer)
        print(chemin_img_a_detourer)


        if img2!="":
            nom_img2=str(last_article_id)+"_1.png"
            telecharger_image(img2,chemin_image,nom_img2)

            chemin_img_a_detourer2=chemin_image+"\\"+nom_img2
            detourage(chemin_img_a_detourer2)

        if img3!="":
            nom_img3=str(last_article_id)+"_2.png"
            telecharger_image(img3,chemin_image,nom_img3)

            chemin_img_a_detourer3=chemin_image+"\\"+nom_img3
            detourage(chemin_img_a_detourer3)

        if img4!="":
            nom_img4=str(last_article_id)+"_3.png"
            telecharger_image(img4,chemin_image,nom_img4)

            chemin_img_a_detourer4=chemin_image+"\\"+nom_img4
            detourage(chemin_img_a_detourer4)

        if img5!="":
            nom_img5=str(last_article_id)+"_4.png"
            telecharger_image(img5,chemin_image,nom_img5)

            chemin_img_a_detourer5=chemin_image+"\\"+nom_img5
            detourage(chemin_img_a_detourer5)

        Chemin_page=chemin_page_web+str(last_article_id)+".php"


        Creation_page_web(last_article_id,Chemin_page)

        last_article_id+=1

'''
while numero_page!=last_article_id-1:
    with open(chemin_page_web, "w") as file:
        file.writelines(contenu_html)

'''
f.close()

cnx.commit()
cursor.close()
cnx.close()