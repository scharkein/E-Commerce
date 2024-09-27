window.addEventListener("load", event => {



  function productHeading() {
    ////////////////
    // Variables
    ////////////////


    let = priceFinal = document.querySelector('.priceFinal'),
      priceOriginal = document.querySelector('.priceOriginal'),
      discount = null,
      maxQuantity = product.maxQuantity,                                   //quantite du produits<================================ récuperer via php 
      newMaxQuantity = maxQuantity;

    // Calcule la remise

    function getDisccount() {
      priceOriginal.innerText = product.value + "€";
      discount = product.value - product.value * (30 / 100);
      priceFinal.innerText = discount + "€";
    }



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

    //let = priceFinal = document.querySelector('.priceFinal'),
    //priceOriginal = document.querySelector('.priceOriginal'),
    //discount = null,
    //maxQuantity = 10,                                   //quantite du produits<================================ A Modifier
    //newMaxQuantity = maxQuantity;

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
    // EN CONSTRUCTION Automatisation du swiper
    // Remplir les images pour Swiper
    // product.images.forEach(function (el) {
    //   let template = `
    // <div class="swiper-slide">
    //   <div class="scene" data-hover-only="false">
    //     <img src="${el.img}" data-depth="0.5">
    //     <img src="${el.img}" data-depth="1" class="shadow">
    //   </div>
    // </div>`;

    //   let template2 = `
    // <div class="swiper-slide">
    //   <img src="${el.img}">
    // </div>`;

    //   let newDiv = document.createElement("div");
    //   newDiv.innerHTML = template;
    //   let newDiv2 = document.createElement("div");
    //   newDiv2.innerHTML = template2;


    //   document.querySelector('.galleryMain .swiper-wrapper').appendChild(newDiv);
    //   document.querySelector('.galleryThumbs .swiper-wrapper').appendChild(newDiv2);
    // });

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
      allowSlideNext: false
    });


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
        stretch: 50
      },


      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },

      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },


      thumbs: {
        swiper: galleryThumbs
      }
    });
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
//==========================================================================================================================================
//============================PARALLAX========================PARALLAX====================PARALLAX================PARALLAX==================
//=================================PARALLAX===================================PARALLAX======================================================
//========PARALLAX==============================PARALLAX=======PARALLAX=========================================PARALLAX====================
//========================================================================PARALLAX==========================================================
//==========PARALLAX===============PARALLAX=============================PARALLAX========================PARALLAX============================
//==========================================================================================================================================
//========================PARALLAX=====================PARALLAX==========================================================================PAR
(function (f) {
  if (typeof exports === "object" && typeof module !== "undefined") {
    module.exports = f();
  } else if (typeof define === "function" && define.amd) {
    define([], f);
  } else {
    var g;
    if (typeof window !== "undefined") {
      g = window;
    } else if (typeof global !== "undefined") {
      g = global;
    } else if (typeof self !== "undefined") {
      g = self;
    } else {
      g = this;
    }
    g.Parallax = f();
  }
})(function () {
  return (function e(t, n, r) {
    function s(o, u) {
      if (!n[o]) {
        if (!t[o]) {
          var a = typeof require == "function" && require;
          if (!u && a) return a(o, !0);
          if (i) return i(o, !0);
          var f = new Error("Cannot find module '" + o + "'");
          throw ((f.code = "MODULE_NOT_FOUND"), f);
        }
        var l = (n[o] = { exports: {} });
        t[o][0].call(l.exports, function (e) {
          var n = t[o][1][e];
          return s(n ? n : e);
        }, l, l.exports, e, t, n, r);
      }
      return n[o].exports;
    }

    var i = typeof require == "function" && require;
    for (var o = 0; o < r.length; o++) s(r[o]);
    return s;
  })({
    1: [
      function (require, module, exports) {


        function shouldUseNative() {
          try {
            var test2 = {};
            for (var i = 0; i < 10; i++) {
              test2['_' + String.fromCharCode(i)] = i;
            }
            var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
              return test2[n];
            });
            if (order2.join('') !== '0123456789') {
              return false;
            }
            var test3 = {};
            'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
              test3[letter] = letter;
            });
            if (Object.keys(Object.assign({}, test3)).join('') !==
              'abcdefghijklmnopqrst') {
              return false;
            }

            return true;
          } catch (err) {
            return false;
          }
        }

        module.exports = shouldUseNative() ? Object.assign : function (target, source) {
          var from;
          var to = toObject(target);
          var symbols;

          for (var s = 1; s < arguments.length; s++) {
            from = Object(arguments[s]);

            for (var key in from) {
              if (hasOwnProperty.call(from, key)) {
                to[key] = from[key];
              }
            }

            if (getOwnPropertySymbols) {
              symbols = getOwnPropertySymbols(from);
              for (var i = 0; i < symbols.length; i++) {
                if (propIsEnumerable.call(from, symbols[i])) {
                  to[symbols[i]] = from[symbols[i]];
                }
              }
            }
          }

          return to;
        };

      }, {}], 2: [function (require, module, exports) {
        (function (process) {
          // Generated by CoffeeScript 1.12.2
          (function () {
            var getNanoSeconds, hrtime, loadTime, moduleLoadTime, nodeLoadTime, upTime;

            if ((typeof performance !== "undefined" && performance !== null) && performance.now) {
              module.exports = function () {
                return performance.now();
              };
            } else if ((typeof process !== "undefined" && process !== null) && process.hrtime) {
              module.exports = function () {
                return (getNanoSeconds() - nodeLoadTime) / 1e6;
              };
              hrtime = process.hrtime;
              getNanoSeconds = function () {
                var hr;
                hr = hrtime();
                return hr[0] * 1e9 + hr[1];
              };
              moduleLoadTime = getNanoSeconds();
              upTime = process.uptime() * 1e9;
              nodeLoadTime = moduleLoadTime - upTime;
            } else if (Date.now) {
              module.exports = function () {
                return Date.now() - loadTime;
              };
              loadTime = Date.now();
            } else {
              module.exports = function () {
                return new Date().getTime() - loadTime;
              };
              loadTime = new Date().getTime();
            }

          }).call(this);



        }).call(this, require('_process'))

      }, { "_process": 3 }], 3: [function (require, module, exports) {
        // shim for using process in browser
        var process = module.exports = {};

        // cached from whatever global is present so that test runners that stub it
        // don't break things.  But we need to wrap it in a try catch in case it is
        // wrapped in strict mode code which doesn't define any globals.  It's inside a
        // function because try/catches deoptimize in certain engines.

        var cachedSetTimeout;
        var cachedClearTimeout;

        function defaultSetTimout() {
          throw new Error('setTimeout has not been defined');
        }
        function defaultClearTimeout() {
          throw new Error('clearTimeout has not been defined');
        }
        (function () {
          try {
            if (typeof setTimeout === 'function') {
              cachedSetTimeout = setTimeout;
            } else {
              cachedSetTimeout = defaultSetTimout;
            }
          } catch (e) {
            cachedSetTimeout = defaultSetTimout;
          }
          try {
            if (typeof clearTimeout === 'function') {
              cachedClearTimeout = clearTimeout;
            } else {
              cachedClearTimeout = defaultClearTimeout;
            }
          } catch (e) {
            cachedClearTimeout = defaultClearTimeout;
          }
        }())
        function runTimeout(fun) {
          if (cachedSetTimeout === setTimeout) {
            //normal enviroments in sane situations
            return setTimeout(fun, 0);
          }
          // if setTimeout wasn't available but was latter defined
          if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
            cachedSetTimeout = setTimeout;
            return setTimeout(fun, 0);
          }
          try {
            // when when somebody has screwed with setTimeout but no I.E. maddness
            return cachedSetTimeout(fun, 0);
          } catch (e) {
            try {
              // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
              return cachedSetTimeout.call(null, fun, 0);
            } catch (e) {
              // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
              return cachedSetTimeout.call(this, fun, 0);
            }
          }


        }
        function runClearTimeout(marker) {
          if (cachedClearTimeout === clearTimeout) {
            //normal enviroments in sane situations
            return clearTimeout(marker);
          }
          // if clearTimeout wasn't available but was latter defined
          if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
            cachedClearTimeout = clearTimeout;
            return clearTimeout(marker);
          }
          try {
            // when when somebody has screwed with setTimeout but no I.E. maddness
            return cachedClearTimeout(marker);
          } catch (e) {
            try {
              // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
              return cachedClearTimeout.call(null, marker);
            } catch (e) {
              // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
              // Some versions of I.E. have different rules for clearTimeout vs setTimeout
              return cachedClearTimeout.call(this, marker);
            }
          }



        }

      }, {}], 4: [function (require, module, exports) {
        (function (global) {
          var root = typeof window === 'undefined' ? global : window
            , suffix = 'AnimationFrame'
            , raf = root['request' + suffix]
          module.exports = function (fn) {
            return raf.call(root, fn)
          }

        }).call(this, typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})

      }, { "performance-now": 2 }], 5: [function (require, module, exports) {
        'use strict';

        var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

        function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

        /*
         Parallax.js
        */

        var rqAnFr = require('raf');
        var objectAssign = require('object-assign');

        var helpers = {
          propertyCache: {},
          vendors: [null, ['-webkit-', 'webkit'], ['-moz-', 'Moz'], ['-o-', 'O'], ['-ms-', 'ms']],

          clamp: function clamp(value, min, max) {
            return min < max ? value < min ? min : value > max ? max : value : value < max ? max : value > min ? min : value;
          },
          data: function data(element, name) {
            return helpers.deserialize(element.getAttribute('data-' + name));
          },
          deserialize: function deserialize(value) {
            if (value === 'true') {
              return true;
            } else if (value === 'false') {
              return false;
            } else if (value === 'null') {
              return null;
            } else if (!isNaN(parseFloat(value)) && isFinite(value)) {
              return parseFloat(value);
            } else {
              return value;
            }
          },
          camelCase: function camelCase(value) {
            return value.replace(/-+(.)?/g, function (match, character) {
              return character ? character.toUpperCase() : '';
            });
          },
          accelerate: function accelerate(element) {
            helpers.css(element, 'transform', 'translate3d(0,0,0) rotate(0.0001deg)');
            helpers.css(element, 'transform-style', 'preserve-3d');
            helpers.css(element, 'backface-visibility', 'hidden');
          },
          transformSupport: function transformSupport(value) {
            var element = document.createElement('div'),
              propertySupport = false,
              propertyValue = null,
              featureSupport = false,
              cssProperty = null,
              jsProperty = null;
            for (var i = 0, l = helpers.vendors.length; i < l; i++) {
              if (helpers.vendors[i] !== null) {
                cssProperty = helpers.vendors[i][0] + 'transform';
                jsProperty = helpers.vendors[i][1] + 'Transform';
              } else {
                cssProperty = 'transform';
                jsProperty = 'transform';
              }
              if (element.style[jsProperty] !== undefined) {
                propertySupport = true;
                break;
              }
            }
            switch (value) {
              case '2D':
                featureSupport = propertySupport;
                break;
              case '3D':
                if (propertySupport) {
                  var body = document.body || document.createElement('body'),
                    documentElement = document.documentElement,
                    documentOverflow = documentElement.style.overflow,
                    isCreatedBody = false;

                  if (!document.body) {
                    isCreatedBody = true;
                    documentElement.style.overflow = 'hidden';
                    documentElement.appendChild(body);
                    body.style.overflow = 'hidden';
                    body.style.background = '';
                  }

                  body.appendChild(element);
                  element.style[jsProperty] = 'translate3d(1px,1px,1px)';
                  propertyValue = window.getComputedStyle(element).getPropertyValue(cssProperty);
                  featureSupport = propertyValue !== undefined && propertyValue.length > 0 && propertyValue !== 'none';
                  documentElement.style.overflow = documentOverflow;
                  body.removeChild(element);

                  if (isCreatedBody) {
                    body.removeAttribute('style');
                    body.parentNode.removeChild(body);
                  }
                }
                break;
            }
            return featureSupport;
          },
          css: function css(element, property, value) {
            var jsProperty = helpers.propertyCache[property];
            if (!jsProperty) {
              for (var i = 0, l = helpers.vendors.length; i < l; i++) {
                if (helpers.vendors[i] !== null) {
                  jsProperty = helpers.camelCase(helpers.vendors[i][1] + '-' + property);
                } else {
                  jsProperty = property;
                }
                if (element.style[jsProperty] !== undefined) {
                  helpers.propertyCache[property] = jsProperty;
                  break;
                }
              }
            }
            element.style[jsProperty] = value;
          }
        };

        var MAGIC_NUMBER = 30,
          DEFAULTS = {
            relativeInput: false,
            clipRelativeInput: false,
            inputElement: null,
            hoverOnly: false,
            calibrationThreshold: 100,
            calibrationDelay: 500,
            supportDelay: 500,
            calibrateX: false,
            calibrateY: true,
            invertX: true,
            invertY: true,
            limitX: false,
            limitY: false,
            scalarX: 10.0,
            scalarY: 10.0,
            frictionX: 0.1,
            frictionY: 0.1,
            originX: 0.5,
            originY: 0.5,
            pointerEvents: false,
            precision: 1,
            onReady: null,
            selector: null
          };

        var Parallax = function () {
          function Parallax(element, options) {
            _classCallCheck(this, Parallax);

            this.element = element;

            var data = {
              calibrateX: helpers.data(this.element, 'calibrate-x'),
              calibrateY: helpers.data(this.element, 'calibrate-y'),
              invertX: helpers.data(this.element, 'invert-x'),
              invertY: helpers.data(this.element, 'invert-y'),
              limitX: helpers.data(this.element, 'limit-x'),
              limitY: helpers.data(this.element, 'limit-y'),
              scalarX: helpers.data(this.element, 'scalar-x'),
              scalarY: helpers.data(this.element, 'scalar-y'),
              frictionX: helpers.data(this.element, 'friction-x'),
              frictionY: helpers.data(this.element, 'friction-y'),
              originX: helpers.data(this.element, 'origin-x'),
              originY: helpers.data(this.element, 'origin-y'),
              pointerEvents: helpers.data(this.element, 'pointer-events'),
              precision: helpers.data(this.element, 'precision'),
              relativeInput: helpers.data(this.element, 'relative-input'),
              clipRelativeInput: helpers.data(this.element, 'clip-relative-input'),
              hoverOnly: helpers.data(this.element, 'hover-only'),
              inputElement: document.querySelector(helpers.data(this.element, 'input-element')),
              selector: helpers.data(this.element, 'selector')
            };

            for (var key in data) {
              if (data[key] === null) {
                delete data[key];
              }
            }

            objectAssign(this, DEFAULTS, data, options);

            if (!this.inputElement) {
              this.inputElement = this.element;
            }

            this.calibrationTimer = null;
            this.calibrationFlag = true;
            this.enabled = false;
            this.depthsX = [];
            this.depthsY = [];
            this.raf = null;

            this.bounds = null;
            this.elementPositionX = 0;
            this.elementPositionY = 0;
            this.elementWidth = 0;
            this.elementHeight = 0;

            this.elementCenterX = 0;
            this.elementCenterY = 0;

            this.elementRangeX = 0;
            this.elementRangeY = 0;

            this.calibrationX = 0;
            this.calibrationY = 0;

            this.inputX = 0;
            this.inputY = 0;

            this.motionX = 0;
            this.motionY = 0;

            this.velocityX = 0;
            this.velocityY = 0;

            this.onMouseMove = this.onMouseMove.bind(this);
            this.onDeviceOrientation = this.onDeviceOrientation.bind(this);
            this.onDeviceMotion = this.onDeviceMotion.bind(this);
            this.onOrientationTimer = this.onOrientationTimer.bind(this);
            this.onMotionTimer = this.onMotionTimer.bind(this);
            this.onCalibrationTimer = this.onCalibrationTimer.bind(this);
            this.onAnimationFrame = this.onAnimationFrame.bind(this);
            this.onWindowResize = this.onWindowResize.bind(this);

            this.windowWidth = null;
            this.windowHeight = null;
            this.windowCenterX = null;
            this.windowCenterY = null;
            this.windowRadiusX = null;
            this.windowRadiusY = null;
            this.portrait = false;
            this.desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i);
            this.motionSupport = !!window.DeviceMotionEvent && !this.desktop;
            this.orientationSupport = !!window.DeviceOrientationEvent && !this.desktop;
            this.orientationStatus = 0;
            this.motionStatus = 0;

            this.initialise();
          }

          _createClass(Parallax, [{
            key: 'initialise',
            value: function initialise() {
              if (this.transform2DSupport === undefined) {
                this.transform2DSupport = helpers.transformSupport('2D');
                this.transform3DSupport = helpers.transformSupport('3D');
              }

              // Configure Context Styles
              if (this.transform3DSupport) {
                helpers.accelerate(this.element);
              }

              var style = window.getComputedStyle(this.element);
              if (style.getPropertyValue('position') === 'static') {
                this.element.style.position = 'relative';
              }

              // Pointer events
              if (!this.pointerEvents) {
                this.element.style.pointerEvents = 'none';
              }

              // Setup
              this.updateLayers();
              this.updateDimensions();
              this.enable();
              this.queueCalibration(this.calibrationDelay);
            }
          }, {
            key: 'doReadyCallback',
            value: function doReadyCallback() {
              if (this.onReady) {
                this.onReady();
              }
            }
          }, {
            key: 'updateLayers',
            value: function updateLayers() {
              if (this.selector) {
                this.layers = this.element.querySelectorAll(this.selector);
              } else {
                this.layers = this.element.children;
              }

              if (!this.layers.length) {
                console.warn('ParallaxJS: Your scene does not have any layers.');
              }

              this.depthsX = [];
              this.depthsY = [];

              for (var index = 0; index < this.layers.length; index++) {
                var layer = this.layers[index];

                if (this.transform3DSupport) {
                  helpers.accelerate(layer);
                }

                layer.style.position = index ? 'absolute' : 'relative';
                layer.style.display = 'block';
                layer.style.left = 0;
                layer.style.top = 0;

                var depth = helpers.data(layer, 'depth') || 0;
                this.depthsX.push(helpers.data(layer, 'depth-x') || depth);
                this.depthsY.push(helpers.data(layer, 'depth-y') || depth);
              }
            }
          }, {
            key: 'updateDimensions',
            value: function updateDimensions() {
              this.windowWidth = window.innerWidth;
              this.windowHeight = window.innerHeight;
              this.windowCenterX = this.windowWidth * this.originX;
              this.windowCenterY = this.windowHeight * this.originY;
              this.windowRadiusX = Math.max(this.windowCenterX, this.windowWidth - this.windowCenterX);
              this.windowRadiusY = Math.max(this.windowCenterY, this.windowHeight - this.windowCenterY);
            }
          }, {
            key: 'updateBounds',
            value: function updateBounds() {
              this.bounds = this.inputElement.getBoundingClientRect();
              this.elementPositionX = this.bounds.left;
              this.elementPositionY = this.bounds.top;
              this.elementWidth = this.bounds.width;
              this.elementHeight = this.bounds.height;
              this.elementCenterX = this.elementWidth * this.originX;
              this.elementCenterY = this.elementHeight * this.originY;
              this.elementRangeX = Math.max(this.elementCenterX, this.elementWidth - this.elementCenterX);
              this.elementRangeY = Math.max(this.elementCenterY, this.elementHeight - this.elementCenterY);
            }
          }, {
            key: 'queueCalibration',
            value: function queueCalibration(delay) {
              clearTimeout(this.calibrationTimer);
              this.calibrationTimer = setTimeout(this.onCalibrationTimer, delay);
            }
          }, {
            key: 'enable',
            value: function enable() {
              if (this.enabled) {
                return;
              }
              this.enabled = true;

              if (this.orientationSupport) {
                this.portrait = false;
                window.addEventListener('deviceorientation', this.onDeviceOrientation);
                this.detectionTimer = setTimeout(this.onOrientationTimer, this.supportDelay);
              } else if (this.motionSupport) {
                this.portrait = false;
                window.addEventListener('devicemotion', this.onDeviceMotion);
                this.detectionTimer = setTimeout(this.onMotionTimer, this.supportDelay);
              } else {
                this.calibrationX = 0;
                this.calibrationY = 0;
                this.portrait = false;
                window.addEventListener('mousemove', this.onMouseMove);
                this.doReadyCallback();
              }

              window.addEventListener('resize', this.onWindowResize);
              this.raf = rqAnFr(this.onAnimationFrame);
            }
          }, {
            key: 'disable',
            value: function disable() {
              if (!this.enabled) {
                return;
              }
              this.enabled = false;

              if (this.orientationSupport) {
                window.removeEventListener('deviceorientation', this.onDeviceOrientation);
              } else if (this.motionSupport) {
                window.removeEventListener('devicemotion', this.onDeviceMotion);
              } else {
                window.removeEventListener('mousemove', this.onMouseMove);
              }

              window.removeEventListener('resize', this.onWindowResize);
              rqAnFr.cancel(this.raf);
            }
          }, {
            key: 'calibrate',
            value: function calibrate(x, y) {
              this.calibrateX = x === undefined ? this.calibrateX : x;
              this.calibrateY = y === undefined ? this.calibrateY : y;
            }
          }, {
            key: 'invert',
            value: function invert(x, y) {
              this.invertX = x === undefined ? this.invertX : x;
              this.invertY = y === undefined ? this.invertY : y;
            }
          }, {
            key: 'friction',
            value: function friction(x, y) {
              this.frictionX = x === undefined ? this.frictionX : x;
              this.frictionY = y === undefined ? this.frictionY : y;
            }
          }, {
            key: 'scalar',
            value: function scalar(x, y) {
              this.scalarX = x === undefined ? this.scalarX : x;
              this.scalarY = y === undefined ? this.scalarY : y;
            }
          }, {
            key: 'limit',
            value: function limit(x, y) {
              this.limitX = x === undefined ? this.limitX : x;
              this.limitY = y === undefined ? this.limitY : y;
            }
          }, {
            key: 'origin',
            value: function origin(x, y) {
              this.originX = x === undefined ? this.originX : x;
              this.originY = y === undefined ? this.originY : y;
            }
          }, {
            key: 'setInputElement',
            value: function setInputElement(element) {
              this.inputElement = element;
              this.updateDimensions();
            }
          }, {
            key: 'setPosition',
            value: function setPosition(element, x, y) {
              x = x.toFixed(this.precision) + 'px';
              y = y.toFixed(this.precision) + 'px';
              if (this.transform3DSupport) {
                helpers.css(element, 'transform', 'translate3d(' + x + ',' + y + ',0)');
              } else if (this.transform2DSupport) {
                helpers.css(element, 'transform', 'translate(' + x + ',' + y + ')');
              } else {
                element.style.left = x;
                element.style.top = y;
              }
            }
          }, {
            key: 'onOrientationTimer',
            value: function onOrientationTimer() {
              if (this.orientationSupport && this.orientationStatus === 0) {
                this.disable();
                this.orientationSupport = false;
                this.enable();
              } else {
                this.doReadyCallback();
              }
            }
          }, {
            key: 'onMotionTimer',
            value: function onMotionTimer() {
              if (this.motionSupport && this.motionStatus === 0) {
                this.disable();
                this.motionSupport = false;
                this.enable();
              } else {
                this.doReadyCallback();
              }
            }
          }, {
            key: 'onCalibrationTimer',
            value: function onCalibrationTimer() {
              this.calibrationFlag = true;
            }
          }, {
            key: 'onWindowResize',
            value: function onWindowResize() {
              this.updateDimensions();
            }
          }, {
            key: 'onAnimationFrame',
            value: function onAnimationFrame() {
              this.updateBounds();
              var calibratedInputX = this.inputX - this.calibrationX,
                calibratedInputY = this.inputY - this.calibrationY;
              if (Math.abs(calibratedInputX) > this.calibrationThreshold || Math.abs(calibratedInputY) > this.calibrationThreshold) {
                this.queueCalibration(0);
              }
              if (this.portrait) {
                this.motionX = this.calibrateX ? calibratedInputY : this.inputY;
                this.motionY = this.calibrateY ? calibratedInputX : this.inputX;
              } else {
                this.motionX = this.calibrateX ? calibratedInputX : this.inputX;
                this.motionY = this.calibrateY ? calibratedInputY : this.inputY;
              }
              this.motionX *= this.elementWidth * (this.scalarX / 100);
              this.motionY *= this.elementHeight * (this.scalarY / 100);
              if (!isNaN(parseFloat(this.limitX))) {
                this.motionX = helpers.clamp(this.motionX, -this.limitX, this.limitX);
              }
              if (!isNaN(parseFloat(this.limitY))) {
                this.motionY = helpers.clamp(this.motionY, -this.limitY, this.limitY);
              }
              this.velocityX += (this.motionX - this.velocityX) * this.frictionX;
              this.velocityY += (this.motionY - this.velocityY) * this.frictionY;
              for (var index = 0; index < this.layers.length; index++) {
                var layer = this.layers[index],
                  depthX = this.depthsX[index],
                  depthY = this.depthsY[index],
                  xOffset = this.velocityX * (depthX * (this.invertX ? -1 : 1)),
                  yOffset = this.velocityY * (depthY * (this.invertY ? -1 : 1));
                this.setPosition(layer, xOffset, yOffset);
              }
              this.raf = rqAnFr(this.onAnimationFrame);
            }
          }, {
            key: 'rotate',
            value: function rotate(beta, gamma) {
              // Extract Rotation
              var x = (beta || 0) / MAGIC_NUMBER,
                //  -90 :: 90
                y = (gamma || 0) / MAGIC_NUMBER; // -180 :: 180

              // Detect Orientation Change
              var portrait = this.windowHeight > this.windowWidth;
              if (this.portrait !== portrait) {
                this.portrait = portrait;
                this.calibrationFlag = true;
              }

              if (this.calibrationFlag) {
                this.calibrationFlag = false;
                this.calibrationX = x;
                this.calibrationY = y;
              }

              this.inputX = x;
              this.inputY = y;
            }
          }, {
            key: 'onDeviceOrientation',
            value: function onDeviceOrientation(event) {
              var beta = event.beta;
              var gamma = event.gamma;
              if (beta !== null && gamma !== null) {
                this.orientationStatus = 1;
                this.rotate(beta, gamma);
              }
            }
          }, {
            key: 'onDeviceMotion',
            value: function onDeviceMotion(event) {
              var beta = event.rotationRate.beta;
              var gamma = event.rotationRate.gamma;
              if (beta !== null && gamma !== null) {
                this.motionStatus = 1;
                this.rotate(beta, gamma);
              }
            }
          }, {
            key: 'onMouseMove',
            value: function onMouseMove(event) {
              var clientX = event.clientX,
                clientY = event.clientY;

              // reset input to center if hoverOnly is set and we're not hovering the element
              if (this.hoverOnly && (clientX < this.elementPositionX || clientX > this.elementPositionX + this.elementWidth || clientY < this.elementPositionY || clientY > this.elementPositionY + this.elementHeight)) {
                this.inputX = 0;
                this.inputY = 0;
                return;
              }

              if (this.relativeInput) {
                // Clip mouse coordinates inside element bounds.
                if (this.clipRelativeInput) {
                  clientX = Math.max(clientX, this.elementPositionX);
                  clientX = Math.min(clientX, this.elementPositionX + this.elementWidth);
                  clientY = Math.max(clientY, this.elementPositionY);
                  clientY = Math.min(clientY, this.elementPositionY + this.elementHeight);
                }
                // Calculate input relative to the element.
                if (this.elementRangeX && this.elementRangeY) {
                  this.inputX = (clientX - this.elementPositionX - this.elementCenterX) / this.elementRangeX;
                  this.inputY = (clientY - this.elementPositionY - this.elementCenterY) / this.elementRangeY;
                }
              } else {
                // Calculate input relative to the window.
                if (this.windowRadiusX && this.windowRadiusY) {
                  this.inputX = (clientX - this.windowCenterX) / this.windowRadiusX;
                  this.inputY = (clientY - this.windowCenterY) / this.windowRadiusY;
                }
              }
            }
          }, {
          },]);

          return Parallax;
        }();

        module.exports = Parallax;
      }, { "object-assign": 1, "raf": 4 }]
  }, {}, [5])(5)
});
