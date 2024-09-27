window.addEventListener("load", event => {
  
    function productHeading() {
      ////////////////
      // Variables
      ////////////////
  
      const product = {
  
        value: 700,
        images: [{
          img: '/img/GeForce_RTX_4070.png' }, //img 1
  
        {
          img: '/img/GeForce_RTX_4070.png' },//img 2
  
        {
          img: '/img/GeForce_RTX_4070.png' },//img 3
  
        {
          img: '/img/GeForce_RTX_4070.png' },//img 4
  
        {
          img: '/img/GeForce_RTX_4070.png' },//img 5
  
        {
          img: '/img/GeForce_RTX_4070.png' }] };//img 6
  
  
  
  
      const btnAdd = document.querySelector('.btn.add'),
      btnContainer = document.querySelector('.btnContainer'),
      wrapper = document.querySelector('.wrapper'),
      itemNumber = document.querySelector('.itemNumber'),
      shoppingQuantity = document.querySelector('.shoppingQuantity'),
      shoppingTotal = document.querySelector('.shoppingTotal')
      inputQuantity = document.querySelector('.inputQuantity'),
      plus = document.querySelector('.plus'),
      minus = document.querySelector('.minus'),
      nav = document.querySelector('nav'),
      error = document.querySelector('.error'),
      shoppingIcon = document.querySelector('.shoppingIcon'),
      shoppingMenu = document.querySelector('.shoppingMenu'),
      emptyCart = document.querySelector('.emptyCart');
  
      let = priceFinal = document.querySelector('.priceFinal'),
      priceOriginal = document.querySelector('.priceOriginal'),
      discount = null,
      maxQuantity = 10,                                   //quantite du produits
      newMaxQuantity = maxQuantity;
  
      ////////////////
      // Evenement
      ////////////////
  
      btnAdd.addEventListener('click', addItem);
      plus.addEventListener("click", plusQuantity);
      minus.addEventListener("click", minusQuantity);
      shoppingIcon.addEventListener("click", openShoppingCart);
  
      emptyCart.addEventListener("click", cleanCart);
  
      window.addEventListener("resize", resize);
  
  
      ////////////////
      // Fonctions
      //////////////// 
  
      window.onscroll = function () {
        if (window.pageYOffset >= 60) {
          nav.classList.add("fixed");
        } else {
          nav.classList.remove("fixed");
        }
        resize(); // Ajoutez cette ligne pour appeler la fonction resize lors du défilement
      };
      
  
    // Change button position on mobile
  
    function resize() {
        //Button
        if (window.innerHeight > wrapper.offsetHeight) {
            btnContainer.classList.remove('fixedBtn');
        } else {
            btnContainer.classList.add('fixedBtn');
        }
        parallax();
    }
  
      // Parallax
  function parallax() {
    if (window.innerWidth > 800) {
      // Sélectionnez uniquement les images avec la classe '.scene' dans le conteneur '.galleryMain'
      var scene = document.querySelectorAll('.scene');
      scene.forEach(pic => {
        var parallax = new Parallax(pic);
      });
    }
  }
  
      function initializeParallaxAfterImageLoad(imgElement) {
        imgElement.addEventListener('load', function () {
          parallax();
        });
      }
  
  
      // Calcule la remise
  
      function getDisccount() {
        priceOriginal.innerText = product.value + "€";
        discount = product.value - product.value * (30 / 100);
        priceFinal.innerText = discount + "€";
      }
  
      // Calcule les prix avec la réduction
  
      function getPrice() {
  
        priceFinal.innerText = discount * inputQuantity.value + "€";
        priceOriginal.innerText = product.value * inputQuantity.value + "€";
        
  
        setTimeout(() => {
          priceFinal.classList.remove('anime');
        }, 400);
      }
  
      // Mise à jour des prix avec le compteur de quantité
  
      function plusQuantity() {
        if (inputQuantity.value < maxQuantity) {
          inputQuantity.value = ++inputQuantity.value;;
          priceFinal.classList.add('anime');
        }
        getPrice();
      }
  
      function minusQuantity() {
        if (inputQuantity.value > 1) {
          inputQuantity.value = --inputQuantity.value;
          priceFinal.classList.add('anime');
        }
        getPrice();
      }
  
      // Ajoute des articles au panier
  
      function addItem() {
  
        let cenas = parseInt(itemNumber.innerText) + parseInt(inputQuantity.value);
  
        if (cenas <= newMaxQuantity) {
          itemNumber.style.display = "flex";
          itemNumber.innerText = cenas;
          shoppingTotal.innerText = "Total :" + discount * cenas + "€";
          shoppingQuantity.innerText = "x" + cenas;
          itemNumber.classList.add("addItem");
          error.style.display = "none";
        } else {
          error.style.display = "flex";
        }
  
        setTimeout(() => {
          itemNumber.classList.remove("addItem");
        }, 700);
      }
  
      // Ouvrir le panier 
  
      function openShoppingCart() {
        if (itemNumber.innerText != "0") {
          if (shoppingMenu.classList.contains('openShopping')) {
            shoppingMenu.classList.remove('openShopping');
          } else {
            shoppingMenu.classList.add('openShopping');
          }
        }
      }
  
      // Vider le panier
  
      function cleanCart() {
        shoppingMenu.classList.remove('openShopping');
        itemNumber.style.display = "none";
        itemNumber.classList.remove('addItem');
        itemNumber.innerText = "0";
      }
  
      // Remplir les images pour Swiper
  product.images.forEach(function (el) {
    let template = `
      <div class="swiper-slide">
        <div class="scene" data-hover-only="false">
          <img src="${el.img}" data-depth="0.5">
          <img src="${el.img}" data-depth="1" class="shadow">
        </div>
      </div>`;
  
    let template2 = `
      <div class="swiper-slide">
        <img src="${el.img}">
      </div>`;
  
    let newDiv = document.createElement("div");
    newDiv.innerHTML = template;
    let newDiv2 = document.createElement("div");
    newDiv2.innerHTML = template2;
    
  
    document.querySelector('.galleryMain .swiper-wrapper').appendChild(newDiv);
    document.querySelector('.galleryThumbs .swiper-wrapper').appendChild(newDiv2);
  });
  
  // Configuration du parallax pour les images de la galerie principale
  if (window.innerWidth > 800) {
    var scene = document.querySelectorAll('.scene');
    scene.forEach(pic => {
      var parallax = new Parallax(pic);
    });
  }
      // Faire fonctionner le curseur
        // Configuration du carrousel des vignettes
      var galleryThumbs = new Swiper('.galleryThumbs', {
        spaceBetween: 0,
        slidesPerView: 'auto',
        loop: false,
        allowTouchMove: false,
        allowSlidePrev: false,
        allowSlideNext: false });
  
  
        // Configuration du carrousel principal
      var galleryMain = new Swiper('.galleryMain', {
        spaceBetween: 300,
        speed: 500,
        loop: true,
        loopedSlides: 5, //les diapositives en boucle doivent être les mêmes
        effect: "coverflow",
        coverflowEffect: {
          rotate: 50,
          slideShadows: false,
          depth: 200,
          stretch: 50 },
  
  
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev' },
  
        pagination: {
          el: '.swiper-pagination',
          clickable: true },
  
  
        thumbs: {
          swiper: galleryThumbs } });
        // Gestion des événements pour les flèches
        var prevButton = document.querySelector('.swiper-button-prev');
        var nextButton = document.querySelector('.swiper-button-next');
  
        prevButton.addEventListener('click', function () {
        galleryMain.slidePrev();
        });
  
        nextButton.addEventListener('click', function () {
        galleryMain.slideNext();
        });
  
  
  
      // Appel des fonctions
      getDisccount();
      parallax();
      resize();
    }
    productHeading();
  });

//================================================= Fin header =================================
//================================================= Début Tri ==================================
////////////////////////////////////////////////////////////////////////////////////////////////
//                                   GENERALE                                                  
////////////////////////////////////////////////////////////////////////////////////////////////
// Définir les éléments DOM une seule fois
const minVal = document.querySelector(".min-val");
const maxVal = document.querySelector(".max-val");
const priceInputMin = document.querySelector(".min-input");
const priceInputMax = document.querySelector(".max-input");
const minTooltip = document.querySelector(".min-tooltip");
const maxTooltip = document.querySelector(".max-tooltip");
const range = document.querySelector(".slider-track");
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const prixArticles = document.querySelectorAll('.card');
const sliderMinValue = parseInt(minVal.min);
const sliderMaxValue = parseInt(maxVal.max);
const minGap = 0;

// Initialiser la variable pour stocker le prix le plus élevé et le prix le plus bas
let prixMax = 0;
let prixMin = Infinity; // Initialisé à Infinity pour s'assurer que le premier prix sera toujours plus bas

// Trouver le prix le plus élevé et le prix le plus bas parmi tous les articles
prixArticles.forEach(article => {
    const prixArticle = parseFloat(article.dataset.prix);
    if (prixArticle > prixMax) {
        prixMax = prixArticle;
    }
    if (prixArticle < prixMin) {
        prixMin = prixArticle;
    }
});


// Mettre à jour les valeurs minimales et maximales des curseurs min-val et max-val avec les prix trouvés
minVal.setAttribute('min', prixMin);
minVal.setAttribute('max', prixMax);
minVal.setAttribute('value', prixMin); // Définir la valeur initiale sur le prix le plus bas
maxVal.setAttribute('min', prixMin);
maxVal.setAttribute('max', prixMax);
maxVal.setAttribute('value', prixMax); // Définir la valeur initiale sur le prix le plus élevé

// Ajouter les écouteurs d'événements une seule fois
window.onload = function () {
    slideMin();
    slideMax();
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterCombined);
    });
    minVal.addEventListener('input', filterCombined);
    maxVal.addEventListener('input', filterCombined);
};

// Fonction pour mettre à jour l'apparence des sliders
function setArea() {
    const sliderMaxValue = parseInt(maxVal.getAttribute('max'));
    range.style.left = (minVal.value / sliderMaxValue) * 100 + "%";
    minTooltip.style.left = (minVal.value / sliderMaxValue) * 100 + "%";
    range.style.right = 100 - (maxVal.value / sliderMaxValue) * 100 +"%";
    maxTooltip.style.right = 100 - (maxVal.value / sliderMaxValue) * 100 + "%";
}

// Fonction pour mettre à jour la valeur de prix minimum
function setMinInput() {
    let minPrice = parseInt(priceInputMin.value);
    if (minPrice < sliderMinValue){
        priceInputMin.value = sliderMinValue;
    }
    minVal.value = priceInputMin.value;
    slideMin();
}

// Fonction pour mettre à jour la valeur de prix maximum
function setMaxInput() {
    let maxPrice = parseInt(priceInputMax.value);
    if (maxPrice > sliderMaxValue){
        priceInputMax.value = maxPrice;
    }
    maxVal.value = priceInputMax.value;
    slideMax();
}

// Fonction pour mettre à jour l'apparence lors du changement de prix minimum
function slideMin() {
    let gap = parseInt(maxVal.value) - parseInt(minVal.value);
    if(gap <= minGap){
        minVal.value = parseInt(maxVal.value) - minGap;
    }
    minTooltip.innerHTML = minVal.value + "€";
    priceInputMin.value = minVal.value;
    setArea();
}

// Fonction pour mettre à jour l'apparence lors du changement de prix maximum
function slideMax() {
    let gap = parseInt(maxVal.value) - parseInt(minVal.value);
    if(gap <= minGap){
        maxVal.value = parseInt(minVal.value) + minGap;
    }
    maxTooltip.innerHTML = maxVal.value + "€";
    priceInputMax.value = maxVal.value;
    setArea();
}
// Mettre à jour le prix minimum en fonction des articles affichés dans les catégories sélectionnées
function updateMinPrice() {
  let checkedCheckboxestype = document.querySelectorAll('input[name="type"]:checked');
  let prixMinCategory = sliderMaxValue; // Prix minimum dans les catégories sélectionnées, initialisé à la valeur maximale possible

  // Si aucune catégorie n'est cochée, le prix minimum est le prix minimum global
  if (checkedCheckboxestype.length === 0) {
      prixMinCategory = sliderMinValue;
  } else {
      // Parcourir toutes les catégories sélectionnées pour trouver le prix minimum
      let prixArticles = document.querySelectorAll('.card');
      prixArticles.forEach(article => {
          const prixArticle = parseFloat(article.dataset.prix);
          checkedCheckboxestype.forEach(checkbox => {
              const type = article.dataset.type;
              if (type === checkbox.id) {
                  if (prixArticle < prixMinCategory) {
                      prixMinCategory = Math.floor(prixArticle);
                  }
              }
          });
      });

  }
  // Mettre à jour la valeur minimale du curseur minVal avec le prix minimum des catégories sélectionnées
  minVal.setAttribute('min', prixMinCategory);
  minVal.setAttribute('value', prixMinCategory); // Mettre à jour la valeur actuelle du curseur minVal
  maxVal.setAttribute('min', prixMinCategory); // Mettre à jour le minimum de maxVal pour empêcher les valeurs invalides
}

// Mettre à jour le prix maximum en fonction des articles affichés dans les catégories sélectionnées
function updateMaxPrice() {
  let checkedCheckboxestype = document.querySelectorAll('input[name="type"]:checked');
  let prixMaxCategory = 0; // Prix maximum dans les catégories sélectionnées

  // Si aucune catégorie n'est cochée, le prix maximum est le prix maximum global
  if (checkedCheckboxestype.length === 0) {
      prixMaxCategory = prixMax
  } else {
      // Parcourir toutes les catégories sélectionnées pour trouver le prix maximum
      let prixArticles = document.querySelectorAll('.card');
      prixArticles.forEach(article => {
          const prixArticle = parseFloat(article.dataset.prix);
          checkedCheckboxestype.forEach(checkbox => {
              const type = article.dataset.type;
              if (type === checkbox.id) {
                  if (prixArticle > prixMaxCategory) {
                      prixMaxCategory = Math.ceil(prixArticle);
                  }
              }
          });
      });

  }
  // Mettre à jour la valeur maximale du curseur maxVal avec le prix maximum des catégories sélectionnées
  minVal.setAttribute('max', prixMaxCategory);
  maxVal.setAttribute('max', prixMaxCategory);
  maxVal.setAttribute('value', prixMaxCategory); // Mettre à jour la valeur actuelle du curseur maxVal
  updateMinPrice();
}
////////////////////////////////////////////////////////////////////////////////////////////////
//                                   COMBINAISON DES FILTRES                                                  
////////////////////////////////////////////////////////////////////////////////////////////////
// // Fonction de filtrage combinant catégorie et prix
// function filterCombined() {
//   // prix
//   const minPrice = parseFloat(minVal.value);
//   const maxPrice = parseFloat(maxVal.value);
//   // type
//   const checkedCheckboxestype = document.querySelectorAll('input[name="type"]:checked');
//   // carte graphique
//   const checkedCheckboxesVram = document.querySelectorAll('input[name ="Vram"]:checked');
//   const checkedCheckboxesCore = document.querySelectorAll('input[name ="Core"]:checked');
//   const checkedCheckboxesC_carte_graphique = document.querySelectorAll('input[name ="C_carte_graphique"]:checked');
//   const checkedCheckboxesRGB = document.querySelectorAll('input[name ="rgb"]:checked');
//   // processeur
//   const checkedCheckboxesCoeurs = document.querySelectorAll('input[name ="Coeurs"]:checked');
//   const checkedCheckboxesf_processeur = document.querySelectorAll('input[name ="f_processeur"]:checked');
//   const checkedCheckboxesC_processeur = document.querySelectorAll('input[name ="C_processeurs"]:checked');
//   // RAM
//   const checkedCheckboxesR_type = document.querySelectorAll('input[name ="R_type"]:checked');
//   const checkedCheckboxesR_stockage = document.querySelectorAll('input[name ="R_stockage"]:checked');
//   const checkedCheckboxesf_RAM = document.querySelectorAll('input[name ="f_RAM"]:checked');
//   // carte mere 
//   const checkedCheckboxesC_type = document.querySelectorAll('input[name ="C_type"]:checked');
//   const checkedCheckboxesf_carte_mere = document.querySelectorAll('input[name ="f_carte_mere"]:checked');
//   const checkedCheckboxesC_format = document.querySelectorAll('input[name ="C_format"]:checked'); // a tester
//   //stockage 
//   const checkedCheckboxesS_taille = document.querySelectorAll('input[name ="S_Taille"]:checked'); // a tester
//   const checkedCheckboxesf_stockage = document.querySelectorAll('input[name ="f_stockage"]:checked');
//   const checkedCheckboxesS_type = document.querySelectorAll('input[name ="S_type"]:checked'); // a tester
//   // boitier 
//   const checkedCheckboxesB_dimension = document.querySelectorAll('input[name ="B_dimension"]:checked');
//   const checkedCheckboxestaille_carte_mere = document.querySelectorAll('input[name ="taille_carte_mere"]:checked');
//   const checkedCheckboxestaille_alimentation = document.querySelectorAll('input[name ="taille_alimentation"]:checked');
//   const checkedCheckboxestaille_carte_graphique = document.querySelectorAll('input[name ="taille_carte_graphique"]:checked');
//   // alimentation
//   const checkedCheckboxesA_dimension = document.querySelectorAll('input[name ="A_dimension"]:checked');
//   const checkedCheckboxesC_alimentation = document.querySelectorAll('input[name ="C_alimentation"]:checked');
//   const checkedCheckboxesA_type = document.querySelectorAll('input[name ="A_type"]:checked');
//   // refroidissement
//   const checkedCheckboxesRef_type = document.querySelectorAll('input[name ="Ref_type"]:checked');
//   const checkedCheckboxesDebit_dair = document.querySelectorAll('input[name ="Debit_dair"]:checked');
//   const checkedCheckboxessocket = document.querySelectorAll('input[name ="socket"]:checked');
//   const checkedCheckboxesventilateur = document.querySelectorAll('input[name ="ventilateur"]:checked');



//   // Si toutes les cases sont cochées, afficher tous les articles et appliquer le filtrage par prix (peut etre améliorer)  
//   if (checkedCheckboxestype.length === 8 || checkedCheckboxesVram.length === 3 || checkedCheckboxesRGB.length === 2 || checkedCheckboxesCoeurs.length === 4 || checkedCheckboxesR_type.length === 2 ||
//      checkedCheckboxesR_stockage.length === 2 || checkedCheckboxesC_type.length === 2 || checkedCheckboxesC_format.length === 2 || checkedCheckboxesS_taille.length === 2 || checkedCheckboxesS_type.length === 2 
//     || checkedCheckboxesB_dimension.length === 4 || checkedCheckboxestaille_carte_mere.length === 2 || checkedCheckboxestaille_alimentation.length === 2 || checkedCheckboxestaille_carte_graphique.length === 3 ||
//     checkedCheckboxesA_dimension.length === 4 || checkedCheckboxesC_alimentation.length === 4 || checkedCheckboxesA_type.length === 2 || checkedCheckboxesRef_type.length === 2 || checkedCheckboxesDebit_dair.length === 3
//     || checkedCheckboxessocket.length === 2 || checkedCheckboxesventilateur.length === 4 || checkedCheckboxesCore.length == 4 || checkedCheckboxesC_carte_graphique.length == 4 || checkedCheckboxesf_processeur.length == 3 || 
//     checkedCheckboxesC_processeur.length == 3 || checkedCheckboxesf_RAM.length == 4 || checkedCheckboxesf_carte_mere.length == 4 || checkedCheckboxesf_stockage.length == 2) {
//     document.querySelectorAll('.card').forEach(article => {
//       article.style.display = 'block';
//     });
//     filterArticlesByPrice();
//     return;
//   }

//   // Vérifier si au moins une catégorie est cochée
//   const isTypeChecked = checkedCheckboxestype.length > 0;
//   const isVramCheckboxChecked = checkedCheckboxesVram.length > 0;
//   const isRgbCheckboxChecked = checkedCheckboxesRGB.length > 0;
//   const isCoeursCheckboxChecked = checkedCheckboxesCoeurs.length > 0;
//   const isR_typeCheckboxChecked = checkedCheckboxesR_type.length > 0;
//   const isR_stockageCheckboxChecked = checkedCheckboxesR_stockage.length > 0;
//   const isC_typeCheckboxChecked = checkedCheckboxesC_type.length > 0;
//   const isC_formatCheckboxChecked = checkedCheckboxesC_format.length > 0;
//   const isS_tailleCheckboxChecked = checkedCheckboxesS_taille.length > 0;
//   const isS_typeCheckboxChecked = checkedCheckboxesS_type.length > 0;
//   const isB_dimensionCheckboxChecked = checkedCheckboxesB_dimension.length > 0;
//   const istaille_carte_mereCheckboxChecked = checkedCheckboxestaille_carte_mere.length > 0;
//   const istaille_alimentationCheckboxChecked = checkedCheckboxestaille_alimentation.length > 0;
//   const istaille_carte_graphiqueCheckboxChecked = checkedCheckboxestaille_carte_graphique.length > 0;
//   const isA_dimensionCheckboxChecked = checkedCheckboxesA_dimension.length > 0;
//   const isC_alimentationCheckboxChecked = checkedCheckboxesC_alimentation.length > 0;
//   const isA_typeCheckboxChecked = checkedCheckboxesA_type.length > 0;
//   const isRef_typeCheckboxChecked = checkedCheckboxesRef_type.length > 0;
//   const isDebit_dairCheckboxChecked = checkedCheckboxesDebit_dair.length > 0;
//   const issocketCheckboxChecked = checkedCheckboxessocket.length > 0;
//   const isventilateurCheckboxChecked = checkedCheckboxesventilateur.length > 0;
//   const isCoreCheckboxChecked = checkedCheckboxesCore.length > 0;
//   const isC_carte_graphiqueCheckboxChecked = checkedCheckboxesC_carte_graphique.length > 0;
//   const isf_processeurCheckboxChecked = checkedCheckboxesf_processeur.length > 0;
//   const isC_processeurCheckboxChecked = checkedCheckboxesC_processeur.length > 0;
//   const isf_RAMCheckboxChecked = checkedCheckboxesf_RAM.length > 0;
//   const isf_carte_mereCheckboxChecked = checkedCheckboxesf_carte_mere.length > 0;
//   const isf_stockageCheckboxChecked = checkedCheckboxesf_stockage.length > 0;


//   // Filtrer les articles en fonction des catégories, du prix ... (peut erte améliorer par crit1,2 .... mais prefere)
//   document.querySelectorAll('.card').forEach(article => {
//     //generale
//     const type = article.dataset.type;
//     const prixArticle = parseFloat(article.dataset.prix);
//     //carte graphique
//     const Vram = article.dataset.crit1;
//     const Core = article.dataset.crit2
//     const C_carte_graphique = articel.dataset.crit3
//     const RGB = article.dataset.crit4
//     //processeur
//     const Coeurs = article.dataset.crit1
//     const f_processeur = article.dataset.crit2
//     const C_processeurs = article.dataset.crit3
//     //RAM
//     const R_type = article.dataset.crit1
//     const f_RAM = article.dataset.crit2
//     const R_stockage = article.dataset.crit3
//     // carte mere 
//     const C_type = article.dataset.crit1
//     const f_carte_mere = article.dataset.crit2
//     const C_format = article.dataset.crit3
//     // stockage
//     const S_taille = article.dataset.crit1
//     const f_stockage = article.dataset.crit2
//     const S_type = article.dataset.crit3
//     // boitier
//     const B_dimension = article.dataset.crit1
//     const taille_carte_mere = article.dataset.crit2
//     const taille_alimentation = article.dataset.crit3
//     const taille_carte_graphique = article.dataset.crit4
//     // alimentation
//     const A_dimension = article.dataset.crit1
//     const C_alimentation = article.dataset.crit2
//     const A_type = article.dataset.crit3
//     // refroidissement 
//     const Ref_type = article.dataset.crit1
//     const Debit_dair = article.dataset.crit2
//     const socket = article.dataset.crit3
//     const ventilateur = article.dataset.crit4


//     //generale
//     const isCategoryMatched = isTypeChecked ?[...checkedCheckboxestype].some(cb => cb.id === type): true;
//     const isPriceInRange = prixArticle >= minPrice && prixArticle <= maxPrice;
//     //carte graphique
//     const isVramMatched = isVramCheckboxChecked ? [...checkedCheckboxesVram].some(cb => cb.id === Vram) : true;
//     const isCoreMatched = isCoreCheckboxChecked ? [...checkedCheckboxesCore].some(cb => cb.id === Core) : true;
//     const isC_carte_graphiqueMatched = isC_carte_graphiqueCheckboxChecked ? [...checkedCheckboxesC_carte_graphique].some(cb => cb.id === C_carte_graphique) : true;
//     const isRgbMatched = isRgbCheckboxChecked ? [...checkedCheckboxesRGB].some(cb => cb.id === RGB) : true;
//     //processeur
//     const isCoeursMatched = isCoeursCheckboxChecked ? [...checkedCheckboxesCoeurs].some(cb => cb.id === Coeurs) : true;
//     const isf_processeurMatched = isf_processeurCheckboxChecked ? [...checkedCheckboxesf_processeur].some(cb => cb.id === f_processeur) : true;
//     const isC_processeursMatched = isC_processeurCheckboxChecked ? [...checkedCheckboxesC_processeur].some(cb => cb.id === C_processeurs) : true;
//     //RAM 
//     const isR_typeMatched = isR_typeCheckboxChecked ? [...checkedCheckboxesR_type].some(cb => cb.id === R_type) : true;
//     const isf_RAMMatched = isf_RAMCheckboxChecked ? [...checkedCheckboxesf_RAM].some(cb => cb.id === f_RAM) : true;
//     const isR_stockageMatched = isR_stockageCheckboxChecked ? [...checkedCheckboxesR_stockage].some(cb => cb.id === R_stockage) : true;
//     //carte mere 
//     const isC_typeMatched = isC_typeCheckboxChecked ? [...checkedCheckboxesC_type].some(cb => cb.id === C_type) : true;
//     const isf_carte_mereMatched = isf_carte_mereCheckboxChecked ? [...checkedCheckboxesf_carte_mere].some(cb => cb.id === f_carte_mere) : true;
//     const isC_formatMatched = isC_formatCheckboxChecked ? [...checkedCheckboxesC_format].some(cb => cb.id === C_format) : true;
//     // stockage
//     const isS_tailleMatched = isS_tailleCheckboxChecked ? [...checkedCheckboxesS_taille].some(cb => cb.id === S_taille) : true;
//     const isf_stockageMatched = isf_stockageCheckboxChecked ? [...checkedCheckboxesf_stockage].some(cb => cb.id === f_stockage) : true;
//     const isS_typeMatched = isS_typeCheckboxChecked ? [...checkedCheckboxesS_type].some(cb => cb.id === S_type) : true;
//     // boitier
//     const isB_dimensionMatched = isB_dimensionCheckboxChecked ? [...checkedCheckboxesB_dimension].some(cb => cb.id === B_dimension) : true;
//     const istaille_carte_mereMatched = istaille_carte_mereCheckboxChecked ? [...checkedCheckboxestaille_carte_mere].some(cb => cb.id === taille_carte_mere) : true;
//     const istaille_alimentationMatched = istaille_alimentationCheckboxChecked ? [...checkedCheckboxestaille_alimentation].some(cb => cb.id === taille_alimentation) : true;
//     const istaille_carte_graphiqueMatched = istaille_carte_graphiqueCheckboxChecked ? [...checkedCheckboxestaille_carte_graphique].some(cb => cb.id === taille_carte_graphique) : true;
//     // alimentation 
//     const isA_dimentionMatched = isA_dimensionCheckboxChecked ? [...checkedCheckboxesA_dimension].some(cb => cb.id === A_dimension) : true;
//     const isC_alimentationMatched = isC_alimentationCheckboxChecked ? [...checkedCheckboxesC_alimentation].some(cb => cb.id === C_alimentation) : true;
//     const isA_typeMatched = isA_typeCheckboxChecked ? [...checkedCheckboxesA_type].some(cb => cb.id === A_type) : true;
//     // refroidissement 
//     const isRef_typeMatched = isRef_typeCheckboxChecked ? [...checkedCheckboxesRef_type].some(cb => cb.id === Ref_type) : true;
//     const isDebit_dairMatched = isDebit_dairCheckboxChecked ? [...checkedCheckboxesDebit_dair].some(cb => cb.id === Debit_dair) : true;
//     const issocketMatched = issocketCheckboxChecked ? [...checkedCheckboxessocket].some(cb => cb.id === socket) : true;
//     const isventilateurMatched = isventilateurCheckboxChecked ? [...checkedCheckboxesventilateur].some(cb => cb.id === ventilateur) : true;

//     // Appliquer le style 'block' ou 'none' en fonction de la condition
//     article.style.display = (isCategoryMatched && isPriceInRange && isVramMatched && isRgbMatched && isCoeursMatched && isR_typeMatched && isR_stockageMatched && isC_typeMatched && isC_formatMatched
//     && isS_tailleMatched && isS_typeMatched && isB_dimensionMatched && istaille_carte_mereMatched && istaille_alimentationMatched && istaille_carte_graphiqueMatched && isA_dimentionMatched 
//     && isC_alimentationMatched && isA_typeMatched && isRef_typeMatched && isDebit_dairMatched && issocketMatched && isventilateurMatched && isCoreMatched && isC_carte_graphiqueMatched && isf_processeurMatched && isC_processeursMatched
//     && isf_RAMMatched && isf_carte_mereMatched && isf_stockageMatched) ? 'block' : 'none';
//   });
// }
// Fonction de filtrage combinant catégorie et prix
function filterCombined() {
  // prix
  const minPrice = parseFloat(minVal.value);
  const maxPrice = parseFloat(maxVal.value);
  // type
  const checkedCheckboxestype = document.querySelectorAll('input[name="type"]:checked');
  // carte graphique
  const checkedCheckboxesVram = document.querySelectorAll('input[name ="Vram"]:checked');
  const checkedCheckboxesRGB = document.querySelectorAll('input[name ="rgb"]:checked');
  // processeur
  const checkedCheckboxesCoeurs = document.querySelectorAll('input[name ="Coeurs"]:checked');
  // RAM
  const checkedCheckboxesR_type = document.querySelectorAll('input[name ="R_type"]:checked');
  const checkedCheckboxesR_stockage = document.querySelectorAll('input[name ="R_stockage"]:checked');
  // carte mere 
  const checkedCheckboxesC_type = document.querySelectorAll('input[name ="C_type"]:checked');
  const checkedCheckboxesC_format = document.querySelectorAll('input[name ="C_format"]:checked'); // a tester
  //stockage 
  const checkedCheckboxesS_taille = document.querySelectorAll('input[name ="S_Taille"]:checked'); // a tester
  const checkedCheckboxesS_type = document.querySelectorAll('input[name ="S_type"]:checked'); // a tester
  // boitier 
  const checkedCheckboxesB_dimension = document.querySelectorAll('input[name ="B_dimension"]:checked');
  const checkedCheckboxestaille_carte_mere = document.querySelectorAll('input[name ="taille_carte_mere"]:checked');
  const checkedCheckboxestaille_alimentation = document.querySelectorAll('input[name ="taille_alimentation"]:checked');
  const checkedCheckboxestaille_carte_graphique = document.querySelectorAll('input[name ="taille_carte_graphique"]:checked');
  // alimentation
  const checkedCheckboxesA_dimension = document.querySelectorAll('input[name ="A_dimension"]:checked');
  const checkedCheckboxesC_alimentation = document.querySelectorAll('input[name ="C_alimentation"]:checked');
  const checkedCheckboxesA_type = document.querySelectorAll('input[name ="A_type"]:checked');
  // refroidissement
  const checkedCheckboxesRef_type = document.querySelectorAll('input[name ="Ref_type"]:checked');
  const checkedCheckboxesDebit_dair = document.querySelectorAll('input[name ="Debit_dair"]:checked');
  const checkedCheckboxessocket = document.querySelectorAll('input[name ="socket"]:checked');
  const checkedCheckboxesventilateur = document.querySelectorAll('input[name ="ventilateur"]:checked');



  if (
    checkedCheckboxestype.length !== 8 ||
    checkedCheckboxesVram.length !== 3 ||
    checkedCheckboxesRGB.length !== 2 ||
    checkedCheckboxesCoeurs.length !== 4 ||
    checkedCheckboxesR_type.length !== 2 ||
    checkedCheckboxesR_stockage.length !== 2 ||
    checkedCheckboxesC_type.length !== 2 ||
    checkedCheckboxesC_format.length !== 2 ||
    checkedCheckboxesS_taille.length !== 2 ||
    checkedCheckboxesS_type.length !== 2 ||
    checkedCheckboxesB_dimension.length !== 4 ||
    checkedCheckboxestaille_carte_mere.length !== 2 ||
    checkedCheckboxestaille_alimentation.length !== 2 ||
    checkedCheckboxestaille_carte_graphique.length !== 3 ||
    checkedCheckboxesA_dimension.length !== 4 ||
    checkedCheckboxesC_alimentation.length !== 4 ||
    checkedCheckboxesA_type.length !== 2 ||
    checkedCheckboxesRef_type.length !== 2 ||
    checkedCheckboxesDebit_dair.length !== 3 ||
    checkedCheckboxessocket.length !== 2 ||
    checkedCheckboxesventilateur.length !== 4
) {
    // Si au moins un filtre est appliqué, parcourir chaque carte et les filtrer
    document.querySelectorAll('.card').forEach(article => {
        // Mettre ici toutes les conditions de filtrage que vous avez déjà mises

        // Afficher la carte si elle répond aux critères des filtres
        article.style.display = 'block';
    });
} else {
    // Si aucun filtre n'est appliqué, afficher toutes les cartes
    document.querySelectorAll('.card').forEach(article => {
        article.style.display = 'block';
    });
}

  // Vérifier si au moins une catégorie est cochée
  const isTypeChecked = checkedCheckboxestype.length > 0;
  const isVramCheckboxChecked = checkedCheckboxesVram.length > 0;
  const isRgbCheckboxChecked = checkedCheckboxesRGB.length > 0;
  const isCoeursCheckboxChecked = checkedCheckboxesCoeurs.length > 0;
  const isR_typeCheckboxChecked = checkedCheckboxesR_type.length > 0;
  const isR_stockageCheckboxChecked = checkedCheckboxesR_stockage.length > 0;
  const isC_typeCheckboxChecked = checkedCheckboxesC_type.length > 0;
  const isC_formatCheckboxChecked = checkedCheckboxesC_format.length > 0;
  const isS_tailleCheckboxChecked = checkedCheckboxesS_taille.length > 0;
  const isS_typeCheckboxChecked = checkedCheckboxesS_type.length > 0;
  const isB_dimensionCheckboxChecked = checkedCheckboxesB_dimension.length > 0;
  const istaille_carte_mereCheckboxChecked = checkedCheckboxestaille_carte_mere.length > 0;
  const istaille_alimentationCheckboxChecked = checkedCheckboxestaille_alimentation.length > 0;
  const istaille_carte_graphiqueCheckboxChecked = checkedCheckboxestaille_carte_graphique.length > 0;
  const isA_dimensionCheckboxChecked = checkedCheckboxesA_dimension.length > 0;
  const isC_alimentationCheckboxChecked = checkedCheckboxesC_alimentation.length > 0;
  const isA_typeCheckboxChecked = checkedCheckboxesA_type.length > 0;
  const isRef_typeCheckboxChecked = checkedCheckboxesRef_type.length > 0;
  const isDebit_dairCheckboxChecked = checkedCheckboxesDebit_dair.length > 0;
  const issocketCheckboxChecked = checkedCheckboxessocket.length > 0;
  const isventilateurCheckboxChecked = checkedCheckboxesventilateur.length > 0;


  // Filtrer les articles en fonction des catégories, du prix ... (peut erte améliorer par crit1,2 .... mais prefere)
  document.querySelectorAll('.card').forEach(article => {
    //generale
    const type = article.dataset.type;
    const prixArticle = parseFloat(article.dataset.prix);
    //carte graphique
    const Vram = article.dataset.crit1;
    const RGB = article.dataset.crit4
    //processeur
    const Coeurs = article.dataset.crit1
    //RAM
    const R_type = article.dataset.crit1
    const R_stockage = article.dataset.crit3
    // carte mere 
    const C_type = article.dataset.crit1
    const C_format = article.dataset.crit3
    // stockage
    const S_taille = article.dataset.crit1
    const S_type = article.dataset.crit3
    // boitier
    const B_dimension = article.dataset.crit1
    const taille_carte_mere = article.dataset.crit2
    const taille_alimentation = article.dataset.crit3
    const taille_carte_graphique = article.dataset.crit4
    // alimentation
    const A_dimension = article.dataset.crit1
    const C_alimentation = article.dataset.crit2
    const A_type = article.dataset.crit3
    // refroidissement 
    const Ref_type = article.dataset.crit1
    const Debit_dair = article.dataset.crit2
    const socket = article.dataset.crit3
    const ventilateur = article.dataset.crit4


    //generale
    const isCategoryMatched = isTypeChecked ?[...checkedCheckboxestype].some(cb => cb.id === type): true;
    const isPriceInRange = prixArticle >= minPrice && prixArticle <= maxPrice;
    //carte graphique
    const isVramMatched = isVramCheckboxChecked ? [...checkedCheckboxesVram].some(cb => cb.id === Vram) : true;
    const isRgbMatched = isRgbCheckboxChecked ? [...checkedCheckboxesRGB].some(cb => cb.id === RGB) : true;
    //processeur
    const isCoeursMatched = isCoeursCheckboxChecked ? [...checkedCheckboxesCoeurs].some(cb => cb.id === Coeurs) : true;
    //RAM 
    const isR_typeMatched = isR_typeCheckboxChecked ? [...checkedCheckboxesR_type].some(cb => cb.id === R_type) : true;
    const isR_stockageMatched = isR_stockageCheckboxChecked ? [...checkedCheckboxesR_stockage].some(cb => cb.id === R_stockage) : true;
    //carte mere 
    const isC_typeMatched = isC_typeCheckboxChecked ? [...checkedCheckboxesC_type].some(cb => cb.id === C_type) : true;
    const isC_formatMatched = isC_formatCheckboxChecked ? [...checkedCheckboxesC_format].some(cb => cb.id === C_format) : true;
    // stockage
    const isS_tailleMatched = isS_tailleCheckboxChecked ? [...checkedCheckboxesS_taille].some(cb => cb.id === S_taille) : true;
    const isS_typeMatched = isS_typeCheckboxChecked ? [...checkedCheckboxesS_type].some(cb => cb.id === S_type) : true;
    // boitier
    const isB_dimensionMatched = isB_dimensionCheckboxChecked ? [...checkedCheckboxesB_dimension].some(cb => cb.id === B_dimension) : true;
    const istaille_carte_mereMatched = istaille_carte_mereCheckboxChecked ? [...checkedCheckboxestaille_carte_mere].some(cb => cb.id === taille_carte_mere) : true;
    const istaille_alimentationMatched = istaille_alimentationCheckboxChecked ? [...checkedCheckboxestaille_alimentation].some(cb => cb.id === taille_alimentation) : true;
    const istaille_carte_graphiqueMatched = istaille_carte_graphiqueCheckboxChecked ? [...checkedCheckboxestaille_carte_graphique].some(cb => cb.id === taille_carte_graphique) : true;
    // alimentation 
    const isA_dimentionMatched = isA_dimensionCheckboxChecked ? [...checkedCheckboxesA_dimension].some(cb => cb.id === A_dimension) : true;
    const isC_alimentationMatched = isC_alimentationCheckboxChecked ? [...checkedCheckboxesC_alimentation].some(cb => cb.id === C_alimentation) : true;
    const isA_typeMatched = isA_typeCheckboxChecked ? [...checkedCheckboxesA_type].some(cb => cb.id === A_type) : true;
    // refroidissement 
    const isRef_typeMatched = isRef_typeCheckboxChecked ? [...checkedCheckboxesRef_type].some(cb => cb.id === Ref_type) : true;
    const isDebit_dairMatched = isDebit_dairCheckboxChecked ? [...checkedCheckboxesDebit_dair].some(cb => cb.id === Debit_dair) : true;
    const issocketMatched = issocketCheckboxChecked ? [...checkedCheckboxessocket].some(cb => cb.id === socket) : true;
    const isventilateurMatched = isventilateurCheckboxChecked ? [...checkedCheckboxesventilateur].some(cb => cb.id === ventilateur) : true;

    // Appliquer le style 'block' ou 'none' en fonction de la condition
    article.style.display = (isCategoryMatched && isPriceInRange && isVramMatched && isRgbMatched && isCoeursMatched && isR_typeMatched && isR_stockageMatched && isC_typeMatched && isC_formatMatched
    && isS_tailleMatched && isS_typeMatched && isB_dimensionMatched && istaille_carte_mereMatched && istaille_alimentationMatched && istaille_carte_graphiqueMatched && isA_dimentionMatched 
    && isC_alimentationMatched && isA_typeMatched && isRef_typeMatched && isDebit_dairMatched && issocketMatched && isventilateurMatched) ? 'block' : 'none';
  });

  // Mettre à jour les valeurs minimales et maximales des curseurs minVal et maxVal après le filtrage
  updateMinPrice();
  updateMaxPrice();
}


// Fonction de filtrage par prix
function filterArticlesByPrice() {
    const minPrice = parseFloat(minVal.value);
    const maxPrice = parseFloat(maxVal.value);

    // Filtrer les articles en fonction du prix seulement
    document.querySelectorAll('.card').forEach(article => {
        const prixArticle = parseFloat(article.dataset.prix);
        article.style.display = (prixArticle >= minPrice && prixArticle <= maxPrice) ? 'block' : 'none';
    });
}
// Ajouter un écouteur d'événements à chaque case à cocher
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        filterCombined(); // Appeler la fonction de filtrage combiné
        updateMinPrice();
        updateMaxPrice(); // Mettre à jour le prix maximum après le filtrage
        slideMin();
        slideMax();
    });
});
//================================================= Fin tri ==================================
// ================================================ dropdown menu ============================
document.addEventListener("DOMContentLoaded", function() {
  const filterCategories = document.querySelectorAll(".filter-category");
  const generalAside = document.getElementById("filter-aside-general");
  const autreAside = document.getElementById("filter-aside-carte-graphique");

  // Stocker la hauteur originale de chaque aside
  let originalGeneralAsideHeight = generalAside.clientHeight;
  let originalAutreAsideHeight = autreAside.clientHeight;

  // Fonction pour calculer la hauteur des options de filtre visibles pour chaque aside
  function calculateVisibleOptionsHeight(aside) {
    let totalFilterHeight = 0;
    aside.querySelectorAll(".filter-options").forEach(filterOptions => {
      if (filterOptions.classList.contains("list")) {
        totalFilterHeight += filterOptions.clientHeight;
      }
    });
    return totalFilterHeight;
  }

  // Gestionnaire d'événement pour le clic sur le bouton de filtre pour chaque aside
  filterCategories.forEach(filterCategory => {
    const selectBtn = filterCategory.querySelector(".select-btn");
    const filterOptions = filterCategory.querySelector(".filter-options");

    selectBtn.addEventListener("click", function() {
      filterOptions.classList.toggle("list");

      // Ajuster la hauteur de l'aside en fonction des options de filtre visibles pour cet aside
      const aside = selectBtn.closest("aside");
      const originalHeight = aside === generalAside ? originalGeneralAsideHeight : originalAutreAsideHeight;
      aside.style.height = originalHeight + calculateVisibleOptionsHeight(aside) + "px";

      // Rotation de la flèche
      const iconArrow = filterCategory.querySelector(".incon-arrow"); // Modifier cette ligne
      if (iconArrow) {
        iconArrow.classList.toggle("rotate");
      }

      // Retourner automatiquement au début si le menu "general" est déjà ouvert
      if (aside === generalAside && !filterOptions.classList.contains("list")) {
        generalAside.style.height = originalGeneralAsideHeight + "px";
      }
    });
  });

  // Ouvrir automatiquement les menus déroulants au chargement de la page pour chaque aside
  const typeFilter = document.getElementById("type");
  const priceFilter = document.getElementById("Prix");
  typeFilter.querySelector(".filter-options").classList.add("list");
  priceFilter.querySelector(".filter-options").classList.add("list");

  // Ajuster la hauteur de l'aside en dessous lorsque les menus des pages "Type" et "Prix" sont ouverts par défaut
  generalAside.style.height = originalGeneralAsideHeight + calculateVisibleOptionsHeight(generalAside) + "px";
  autreAside.style.height = originalAutreAsideHeight + calculateVisibleOptionsHeight(autreAside) + "px";

  // Appel de la fonction pour afficher/masquer les aside au chargement de la page et à chaque changement de case à cocher
  toggleAsideDisplay();
  document.querySelectorAll('input[name="type"]').forEach(checkbox => {
    checkbox.addEventListener("change", toggleAsideDisplay);
  });
});

// Fonction pour afficher/masquer les aside en fonction de l'état des cases à cocher
function toggleAsideDisplay() {
  const typeCheckboxes = document.querySelectorAll('input[name="type"]');
  const asideIds = ["filter-aside-carte-graphique", "filter-aside-processeur", "filter-aside-RAM", "filter-aside-carte-mere", "filter-aside-stockage", "filter-aside-boitier", "filter-aside-alimentation", "filter-aside-refroidissement"];

  // Parcourir toutes les cases cochées
  typeCheckboxes.forEach((checkbox, index) => {
    const asideId = asideIds[index];
    const aside = document.getElementById(asideId);

    // Afficher ou masquer l'aside en fonction de l'état de la case à cocher
    if (checkbox.checked) {
      aside.style.display = "block";
      aside.style.height = "auto"; // Réinitialiser la hauteur à "auto"
      
    } else {
      aside.style.display = "none";
    }
  });
}
