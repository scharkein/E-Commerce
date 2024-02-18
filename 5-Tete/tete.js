window.addEventListener("load", event => {

  function productHeading() {
    ////////////////
    // Variables
    ////////////////

    const product = {

      value: 700,
      images: [{
        img: '/Commerce/img/GeForce_RTX_4070.png'
      }, //Commerce/img 1

      {
        img: '/Commerce/img/GeForce_RTX_4070.png'
      },//Commerce/img 2

      {
        img: '/Commerce/img/GeForce_RTX_4070.png'
      },//Commerce/img 3

      {
        img: '/Commerce/img/GeForce_RTX_4070.png'
      },//Commerce/img 4

      {
        img: '/Commerce/img/GeForce_RTX_4070.png'
      },//Commerce/img 5

      {
        img: '/Commerce/img/GeForce_RTX_4070.png'
      }]
    };//Commerce/img 6


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


    shoppingIcon.addEventListener("click", openShoppingCart);

    emptyCart.addEventListener("click", cleanCart);



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


    var nav = document.querySelector('.wrapper nav');
    var iconMenu = document.getElementById('iconMenu');

    iconMenu.addEventListener('click', function () {
      nav.classList.toggle('menu-open');
    });





    // Change button position on mobile


    function initializeParallaxAfterImageLoad(imgElement) {
      imgElement.addEventListener('load', function () {
        parallax();
      });
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
  }
  productHeading();
});