<?php
$sqlHost = 'localhost';
$sqlUser = 'root';
$sqlPass = 'root';      
$dbname = 'commerce'; 

$link = mysqli_connect($sqlHost, $sqlUser, $sqlPass, $dbname);
mysqli_set_charset($link, "utf8");  


$execut_select = "SELECT * FROM `article` ORDER BY Type ASC";    
$resultat = $link->query($execut_select);  


function Creer_critere($link, $Id_type, $nb_critere){
  $crit = 'Critere_' . $nb_critere;
  $query="SELECT DISTINCT $crit FROM `article` WHERE `Type`=$Id_type ORDER BY $crit ASC ";
  $result=$link->query($query);
  while($row=$result->fetch_assoc()){ 
    $critere=$row[$crit];
    echo '                          
    <div class="filter-option">
        <label for="'.$critere.'">'.$critere.'</label><input type="checkbox"  id="'.$critere.'" name="Vram">
    </div>';
  }
}



?>

<html lang="en"><head>
    <meta charset="UTF-8">
    <title>Produits page</title>   
  <link rel="stylesheet" href="Page_tri.css">
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
?>
        <div class="wrapper">
          <div class="content">
              <section class="left">
                <!-- PRIX & TYPE -->
                <aside id="filter-aside-general" class="filter-aside-general">
                  <!-- type -->
                  <div class="filter-category select-menu" id="type">
                    <div class="filter-title select-btn" id="select-btn"><span id="text">Type</span>
                    <img class="incon-arrow rotate"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options ">
                      <div class="filter-option ">
                        <label for="Carte Graphique">Carte Graphique</label><input type="checkbox"  id="1" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="Processeur">Processeur</label><input type="checkbox"  id="2" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="RAM">RAM</label><input type="checkbox"  id="3" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="Carte mere">Carte mere</label><input type="checkbox"  id="4" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="Stockage">Stockage</label><input type="checkbox"  id="5" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="Boitier">Boitier</label><input type="checkbox"  id="6" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="Alimentation">Alimentation</label><input type="checkbox"  id="7" name="type">
                      </div>
                      <div class="filter-option ">
                        <label for="Refroidissement">Refroidissement</label><input type="checkbox"  id="8" name="type">
                      </div>
                    </div>
                  </div>
                  <!--Le Prix-->
                  <div class="filter-category" id="Prix">
                  <div class="filter-title select-btn" id="select-btn"><span id="text">Prix</span>
                    <img class="incon-arrow rotate"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <div class="double-slider-box">
                        <div class="range-slider">
                          <span class="slider-track"></span>
                          <input type="range" id="min-val" name="min-val" class="min-val" min="0" max="0" value="0" oninput="slideMin()">
                          <input type="range" id="max-val" name="max-val" class="max-val" min="0" max="0" value="10000" oninput="slideMax()">
                          <div class="tooltip min-tooltip"></div>
                          <div class="tooltip max-tooltip"></div>
                        </div>
                        <div class="input-box">
                          <div class="min-box">
                            <div class="input-wrap">
                              <input type="text" name="min_input" class="input-field min-input" onchange="setMinInput()">
                              <span class="input-addon">€</span>
                            </div>
                          </div>
                          <div class="max-box">
                            <div class="input-wrap">
                              <input type="text" name="max_input" class="input-field max-input" onchange="setMaxInput()">
                              <span class="input-addon">€</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </aside>
                <aside id="filter-aside-carte-graphique" class="filter-aside-carte-graphique">
                  <!--====================================
                                CARTE GRAPHIQUE 
                  =====================================-->

                  
                  <div class="filter-category" id="carte-graphique">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Carte Graphique</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--Vram-->
                      <div class="filter-category" id="Vram">
                        <div class="filter-title select-btn" id="select-btn"><span id="text">Vram</span>
                          <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline">
                        </div>
                        
                        <div class="filter-options">
                          <?php
                            $query_1_1="SELECT DISTINCT `Critere_1` FROM `article` WHERE `Type`=1 ORDER BY Critere_1  ASC"; 
                            $result_1_1=$link->query($query_1_1); 
                            while($row11=$result_1_1->fetch_assoc()){
                              $crit1=$row11['Critere_1'];
                              echo '                          
                              <div class="filter-option">
                                  <label for="'.$crit1.'">'.$crit1.'</label><input type="checkbox"  id="'.$crit1.'" name="Vram">
                              </div>';
                            }
                            ?>
                          
                          <!-- <div class="filter-option">
                            <label for="12">12 GB</label><input type="checkbox"  id="12" name="Vram">
                          </div>
                          <div class="filter-option">
                            <label for="16">16 GB</label><input type="checkbox"  id="16" name="Vram">
                          </div>
                          <div class="filter-option">
                            <label for="24">24 GB</label><input type="checkbox"  id="24" name="Vram">
                        </div>   -->
                      </div>
                      </div>
                      <!-- Fréquence du core -->
                      <div class="filter-category" id="Core">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Fréquence de core</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <?php Creer_critere($link, 1, 2); //=======================================================================================================?>
                          <!-- <div class="filter-option">
                            <label for="2475">2475 MHz</label><input type="checkbox"  id="2475" name="Core">
                          </div>
                          <div class="filter-option">
                            <label for="2520">2520 MHz</label><input type="checkbox"  id="2520" name="Core">
                          </div>
                          <div class="filter-option">
                            <label for="2581">2581 MHz</label><input type="checkbox"  id="2581" name="Core">
                          </div>
                          <div class="filter-option">
                            <label for="2250">2250 MHz</label><input type="checkbox"  id="2250" name="Core">
                          </div> -->
                          </div>
                        </div>
                      <!-- Consommation -->
                      <div class="filter-category" id="C_carte_graphique">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Consommation</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="200">200 Watt</label><input type="checkbox"  id="200" name="C_carte_graphique">
                          </div>
                          <div class="filter-option">
                            <label for="450">450 Watt</label><input type="checkbox"  id="450" name="C_carte_graphique">
                          </div>
                          <div class="filter-option">
                            <label for="300">300 Watt</label><input type="checkbox"  id="300" name="C_carte_graphique">
                          </div>
                          <div class="filter-option">
                            <label for="230">230 Watt</label><input type="checkbox"  id="230" name="C_carte_graphique">
                          </div>
                          </div>
                      </div>
                      <!--RGB-->
                      <div class="filter-category" id="rgb">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">RGB</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="oui">Oui</label><input type="checkbox"  id="Oui" name="rgb">
                          </div>
                          <div class="filter-option">
                            <label for="non">Non</label><input type="checkbox"  id="Non" name="rgb">
                          </div>
                          </div>
                      </div>
                </aside>
                <aside id="filter-aside-processeur" class="filter-aside-processeur">
                  <!--====================================
                                Processeur
                  =====================================-->
                  <div class="filter-category" id="processeur">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Processeur</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--Coeurs-->
                      <div class="filter-category" id="Coeurs">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Coeurs</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="8">8 Coeurs</label><input type="checkbox"  id="8" name="Coeurs">
                          </div>
                          <div class="filter-option">
                            <label for="12">12 Coeurs</label><input type="checkbox"  id="12" name="Coeurs">
                          </div>
                          <div class="filter-option">
                            <label for="16">16 Coeurs</label><input type="checkbox"  id="16" name="Coeurs">
                          </div>
                          <div class="filter-option">
                            <label for="24">24 Coeurs</label><input type="checkbox"  id="24" name="Coeurs">
                          </div>
                        </div>
                        </div>

                      <!-- Fréquence de base -->
                      <div class="filter-category" id="f_processeur">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Fréquence de base</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                        <div class="filter-option">
                            <label for="5.80">5.80 GHz</label><input type="checkbox"  id="5.80" name="f_processeur">
                          </div>
                          <div class="filter-option">
                            <label for="5.40">5.40 Ghz</label><input type="checkbox"  id="5.40" name="f_processeur">
                          </div>
                          <div class="filter-option">
                            <label for="5.60">5.60 GHz</label><input type="checkbox"  id="5.60" name="f_processeur">
                          </div>
                      
                        </div>
                      </div>
                      <!-- Consommation -->
                      <div class="filter-category" id="C_processeurs">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Consommation</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                        <div class="filter-option">
                            <label for="253">253 Watt</label><input type="checkbox"  id="253" name="C_processeurs">
                          </div>
                          <div class="filter-option">
                            <label for="170">170 Watt</label><input type="checkbox"  id="170" name="C_processeurs">
                          </div>
                          <div class="filter-option">
                            <label for="105">105 Watt</label><input type="checkbox"  id="105" name="C_processeurs">
                          </div>
                          </div>
                      </div>
                </aside>
                <aside id="filter-aside-RAM" class="filter-aside-RAM">
                  <!--====================================
                                RAM
                  =====================================-->
                  <div class="filter-category" id="RAM">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">RAM</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--type-->
                      <div class="filter-category" id="R_type">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Type</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="DDR4">DDR4</label><input type="checkbox"  id="DDR4" name="R_type">
                          </div>
                          <div class="filter-option">
                            <label for="DDR5">DDR5</label><input type="checkbox"  id="DDR5" name="R_type">
                          </div>
                          </div>
                      </div>
                      <!-- Fréquence -->
                      <div class="filter-category" id="f_RAM">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Fréquence</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                        <div class="filter-option">
                            <label for="7600">7600 MHz</label><input type="checkbox"  id="7600" name="f_RAM">
                          </div>
                          <div class="filter-option">
                            <label for="6400">6400 MHz</label><input type="checkbox"  id="6400" name="f_RAM">
                          </div>
                          <div class="filter-option">
                            <label for="6000">6000 MHz</label><input type="checkbox"  id="6000" name="f_RAM">
                          </div>
                          <div class="filter-option">
                            <label for="8000">8000 MHz</label><input type="checkbox"  id="8000" name="f_RAM">
                          </div>
                          </div>
                      </div>
                      <!-- Stockage -->
                      <div class="filter-category" id="R_stockage">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">stockage</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="2x8GB">2x8GB</label><input type="checkbox"  id="2x8GB" name="R_stockage">
                          </div>
                          <div class="filter-option">
                            <label for="2x16GB">2x16GB</label><input type="checkbox"  id="2x16GB" name="R_stockage">
                          </div>
                      </div>
                      </div>
                </aside>
                <aside id="filter-aside-carte-mere" class="filter-aside-carte-mere">
                  <!--====================================
                                Carte Mere
                  =====================================-->
                  <div class="filter-category" id="carte-mere">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Carte Mere</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--type de ram-->
                      <div class="filter-category" id="C_type">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Type de RAM</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="DDR4">DDR4</label><input type="checkbox"  id="DDR4" name="C_type">
                          </div>
                          <div class="filter-option">
                            <label for="DDR5">DDR5</label><input type="checkbox"  id="DDR5" name="C_type">
                          </div>
                          </div>
                      </div>
                      <!-- Vitesse de RAM Max -->
                      <div class="filter-category" id="f_carte_mere">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Vitesse de RAM max</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                        <div class="filter-option">
                            <label for="7800">7800 +MT/s</label><input type="checkbox"  id="7800" name="f_carte_mere">
                          </div>
                          <div class="filter-option">
                            <label for="7200">7200 +MT/s</label><input type="checkbox"  id="7200" name="f_carte_mere">
                          </div>
                          <div class="filter-option">
                            <label for="7000">7000 +MT/s</label><input type="checkbox"  id="7000" name="f_carte_mere">
                          </div>
                          <div class="filter-option">
                            <label for="5333">5333 +MT/s</label><input type="checkbox"  id="5333" name="f_carte_mere">
                          </div>
                          </div>
                      </div>
                      <!--Format-->
                      <div class="filter-category" id="C_format">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Format</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="ATX">ATX</label><input type="checkbox"  id="ATX" name="C_format">
                          </div>
                          <div class="filter-option">
                            <label for="Mini-ITX">Mini-ITX</label><input type="checkbox"  id="Mini-ITX" name="C_format">
                          </div>
                          </div>
                      </div>
                </aside>
                <aside id="filter-aside-stockage" class="filter-aside-stockage">
                  <!--====================================
                                Stockage
                  =====================================-->
                  <div class="filter-category" id="stockage">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Stockage</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--Taille-->
                      <div class="filter-category" id="S_Taille">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Taille</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="1To">1To</label><input type="checkbox"  id="1To" name="S_Taille">
                          </div>
                          <div class="filter-option">
                            <label for="2To">2To</label><input type="checkbox"  id="2To" name="S_Taille">
                          </div>
                          </div>
                      </div>
                      <!-- Vitesse de transfert -->
                      <div class="filter-category" id="f_stockage">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Vitesse de transfert</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="7000">7800 Mo/s</label><input type="checkbox"  id="7000" name="f_stockage">
                          </div>
                          <div class="filter-option">
                            <label for="3500">3500 Mo/s</label><input type="checkbox"  id="3500" name="f_stockage">
                          </div>
                          </div>
                      </div>
                      <!--Type-->
                      <div class="filter-category" id="S_type">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Type</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="SSD">SSD</label><input type="checkbox"  id="SSD" name="S_type">
                          </div>
                          <div class="filter-option">
                            <label for="disque-dur">Disque dur</label><input type="checkbox"  id="disque-dur" name="S_type">
                          </div>
                      </div>
                      </div>
                </aside>
                <aside id="filter-aside-boitier" class="filter-aside-boitier">
                  <!--====================================
                                Boitier
                  =====================================-->
                  <div class="filter-category" id="boitier">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Boitier</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--Dimension-->
                      <div class="filter-category" id="B_dimension">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Dimension</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="200/430/377">200/430/377</label><input type="checkbox"  id="200/430/377" name="B_dimension">
                          </div>
                          <div class="filter-option">
                            <label for="210/457/407">210/457/407</label><input type="checkbox"  id="210/457/407" name="B_dimension">
                          </div>
                          <div class="filter-option">
                            <label for="210/499/421">210/499/421</label><input type="checkbox"  id="210/499/421" name="B_dimension">
                          </div>
                          <div class="filter-option">
                            <label for="230/466/453">230/466/453</label><input type="checkbox"  id="230/466/453" name="B_dimension">
                          </div>
                          </div>
                      </div>
                      <!--Format Carte mere-->
                      <div class="filter-category" id="taille_carte_mere">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Format carte mere</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="ATX">ATX</label><input type="checkbox"  id="ATX" name="taille_carte_mere">
                          </div>
                          <div class="filter-option">
                            <label for="Mini-ITX">Mini-ITX</label><input type="checkbox"  id="Mini-ITX" name="taille_carte_mere">
                          </div>
                        </div>
                      </div>
                      <!--Format Alim-->
                      <div class="filter-category" id="taille_alimentation">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Format Alimentation</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="ATX">ATX</label><input type="checkbox"  id="ATX" name="taille_alimentation">
                          </div>
                          <div class="filter-option">
                            <label for="Mini-ITX">Mini-ITX</label><input type="checkbox"  id="Mini-ITX" name="taille_alimentation">
                          </div>
                          </div>
                      </div>
                      <!--taille carte graphique-->
                      <div class="filter-category" id="taille_carte_graphique">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Format Alimentation</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="280">280 mm</label><input type="checkbox"  id="280" name="taille_carte_graphique">
                          </div>
                          <div class="filter-option">
                            <label for="330">330 mm</label><input type="checkbox"  id="330" name="taille_carte_graphique">
                          </div>
                          <div class="filter-option">
                            <label for="360">360 mm</label><input type="checkbox"  id="360" name="taille_carte_graphique">
                          </div>
                          </div>
                      </div>
                </aside>
                <aside id="filter-aside-alimentation" class="filter-aside-alimentation">
                  <!--====================================
                                 Alimentation
                  =====================================-->
                  <div class="filter-category" id="alimentation">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Alimentation</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--Dimension-->
                      <div class="filter-category" id="A_dimension">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Dimension</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="16/15/8,6">16/15/8,6</label><input type="checkbox"  id="16/15/8,6" name="A_dimension">
                          </div>
                          <div class="filter-option">
                            <label for="15/20/8,6">15/20/8,6</label><input type="checkbox"  id="15/20/8,6" name="A_dimension">
                          </div>
                          <div class="filter-option">
                            <label for="14/15/8,6">14/15/8,6</label><input type="checkbox"  id="14/15/8,6" name="A_dimension">
                          </div>
                          <div class="filter-option">
                            <label for="17/15,2/8,2">17/15,2/8,2</label><input type="checkbox"  id="17/15,2/8,2" name="B_dimension">
                          </div>
                          </div>
                      </div>
                      <!--consommation-->
                      <div class="filter-category" id="C_alimentation">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Consommation</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="650 W">650 W</label><input type="checkbox"  id="650 W" name="C_alimentation">
                          </div>
                          <div class="filter-option">
                            <label for="850 W">850 W</label><input type="checkbox"  id="850 W" name="C_alimentation">
                          </div>
                          <div class="filter-option">
                            <label for="1000 W">1000 W</label><input type="checkbox"  id="1000 W" name="C_alimentation">
                          </div>
                          <div class="filter-option">
                            <label for="1200 W">1200 W</label><input type="checkbox"  id="1200 W" name="C_alimentation">
                          </div>
                          </div>
                      </div>
                      <!--Format-->
                      <div class="filter-category" id="A_type">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Format</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="ATX">ATX</label><input type="checkbox"  id="ATX" name="A_type">
                          </div>
                          <div class="filter-option">
                            <label for="Mini-ITX">Mini-ITX</label><input type="checkbox"  id="Mini-ITX" name="A_type">
                          </div>
                        </div>
                      </div>
                </aside>
                <aside id="filter-aside-refroidissement" class="filter-aside-refroidissement">
                  <!--====================================
                                 Refroidissement
                  =====================================-->
                  <div class="filter-category" id="refroidissement">
                  <div class="filter-title select-btn" id="select-btn" style=" margin-bottom : 40px"><span id="text">Refroidissement</span>
                    <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                    <div class="filter-options">
                      <!--Type-->
                      <div class="filter-category" id="Ref_type">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Type</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="Air">Air</label><input type="checkbox"  id="Air" name="Ref_type">
                          </div>
                          <div class="filter-option">
                            <label for="Watercooling">Watercooling</label><input type="checkbox"  id="Watercooling" name="Ref_type">
                          </div>
                          </div>
                        </div>
                      
                      <!--Débit d'Air -->
                      <div class="filter-category" id="Debit_dair">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Débit d'Air</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="62 CFM">62 CFM</label><input type="checkbox"  id="62 CFM" name="Debit_dair">
                          </div>
                          <div class="filter-option">
                            <label for="56.3 CFM">56.3 CFM</label><input type="checkbox"  id="56.3 CFM" name="Debit_dair">
                          </div>
                          <div class="filter-option">
                            <label for="98.17 CFM">98.17 CFM</label><input type="checkbox"  id="98.17 CFM" name="Debit_dair">
                          </div>
                        </div>
                      </div>
                      <!--Socket-->
                      <div class="filter-category" id="socket">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Socket</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="LGA1700">LGA1700</label><input type="checkbox"  id="LGA1700" name="socket">
                          </div>
                          <div class="filter-option">
                            <label for="Multi-socket">Multi-socket</label><input type="checkbox"  id="Multi-socket" name="socket">
                          </div>
                        </div>
                      </div>
                      <!--ventilateur-->
                      <div class="filter-category" id="ventilateur">
                      <div class="filter-title select-btn" id="select-btn"><span id="text">Ventilateur</span>
                        <img class="incon-arrow"src="../img/Site/chevron-down-outline.svg" alt="down-outline"></div>
                        <div class="filter-options">
                          <div class="filter-option">
                            <label for="158mm">158 mm</label><input type="checkbox"  id="158mm" name="socket">
                          </div>
                          <div class="filter-option">
                            <label for="165mm">165 mm</label><input type="checkbox"  id="165mm" name="socket">
                          </div>
                          <div class="filter-option">
                            <label for="397mm">397 mm</label><input type="checkbox"  id="397mm" name="socket">
                          </div>
                          <div class="filter-option">
                            <label for="400mm">400 mm</label><input type="checkbox"  id="400mm" name="socket">
                          </div>
                        </div>
                      </div>
                </aside>
              </section>
              <section class="right">
                <!-- SVG DES ÉTOILES-->
                <svg style="width: 0; height: 0;"  viewBox="0 0 32 32">
                  <defs>
                    <mask id="half">
                      <rect x="0" y="0" width="32" height="32" fill="white" />
                      <rect x="50%" y="0" width="32" height="32" fill="#999999" />
                    </mask>
              
                    <mask id="quarter">
                      <rect x="0" y="0" width="32" height="32" fill="white" />
                      <rect x="25%" y="0" width="32" height="32" fill="#999999" />
                    </mask>
              
                    <symbol  viewBox="0 0 32 32" id="star">
                      <path d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z" />
                    </symbol>
                  </defs>
                </svg>
                <main class="main">
                <!--================================ARTICLES================================================================-->
                <?php
                  while($row=$resultat->fetch_assoc()){
                    if ($row['Actif'] !== null) {
                      //echo $row['Actif'];  // Cas ou il ne faut pas afficher l'article
                  }
                  else{
                   
                    $Id_article=$row['Id_article'];$Type=$row['Type'];$Name=$row['Name'];$Desc=$row['Description'];
                    $Marque=$row['Marque'];$Gamme=$row['Gamme'];$Quandtite=$row['Quantité'];$Prix_revient=$row['Prix_revient'];$Prix_vente=$row['Prix_vente'];
                    $Crit1=$row['Critere_1'];$Crit2=$row['Critere_2'];$Crit3=$row['Critere_3'];
                    $Crit4=$row['Critere_4'];$Crit5=$row['Critere_5'];
                    
                    echo '
                    <article class="card card--1" data-type = '.$Type.' data-Prix = '.$Prix_vente.' data-Crit1 = '.$Crit1.' data-Crit2 = '.$Crit2.' data-Crit3 = '.$Crit3.' data-Crit4 = '.$Crit4.' data-Crit5 = '.$Crit5.'>
                      <div class="card__img-wrap">
                        <img src="../img/Article/'.$Id_article.'_0.png" alt="" class=" card__img"> 
                      </div>
                      <div class="card__content">
                        <h3 class="card__title">'.$Name.'</h3>
                        <div class="card__row">
                          <p class="card__price">'.$Prix_vente.'€</p>
                          <div class="card__rating">
                            <p class="card__rating--number">3.3/5</p>
                            <ul class="card__rating--stars" aria-label="3.3 stars out of 5">
                              <li class="rating">
                                <svg class="rating__star rating__star--full">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star rating__star--full">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star rating__star--full">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star rating__star--half">
                                  <use xlink:href="#star" mask=url("#quarter")></use>
                                </svg>
                              </li>
                              <li class="rating">
                                <svg class="rating__star">
                                  <use xlink:href="#star"></use>
                                </svg>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <a href="../2-Article/'.$Id_article.'.php"><button class="card__button"><span class="card__button--front">en savoir plus</span></button></a>
                      </div>
                    </article>';
                  }
                }
                ?> 

                  <!--======================================================EXEMPLE d'article=================================================================-->
                  <article class="card card--1" data-type="1">
                    <div class="card__img-wrap">
                      <img src="../img/Article/GeForce_RTX_4070.png" alt="" class=" card__img">
                    </div>
                    <div class="card__content">
                      <h3 class="card__title">test ( pas dans la boucle de la table )</h3>
                      <div class="card__row">
                        <p class="card__price">700€</p>
                        <div class="card__rating">
                          <p class="card__rating--number">3.3/5</p>
                          <ul class="card__rating--stars" aria-label="3.3 stars out of 5">
                            <li class="rating">
                              <svg class="rating__star rating__star--full">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star rating__star--full">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star rating__star--full">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star rating__star--half">
                                <use xlink:href="#star" mask=url("#quarter")></use>
                              </svg>
                            </li>
                            <li class="rating">
                              <svg class="rating__star">
                                <use xlink:href="#star"></use>
                              </svg>
                            </li>
                          </ul>
                        </div>
                      </div>
                     <a href="../2-Article/<?php echo $Id_article;?>.php"><button class="card__button"><span class="card__button--front">en savoir plus</span></button></a>
                    </div>
                  </article>
                  </main>
              </section>
              <!-- Swiper -->
          </div>
      </div>
      <script src="Page_de_tri.js"></script>
  </body>
  </html>