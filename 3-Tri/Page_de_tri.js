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