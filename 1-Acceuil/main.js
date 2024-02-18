// ========================================================================header responsive 
const menuHamburger = document.querySelector(".menu-hamburger");
const navLinks = document.querySelector(".nav-links");

menuHamburger.addEventListener('click', () => {
    navLinks.classList.toggle('mobile-menu');
      // Basculer la classe mobile-menu sur le body
      document.body.classList.toggle('mobile-menu');
});

// =========================================================================CAROUSEL 
let span = document.getElementsByTagName('span');
let product = document.getElementsByClassName('product');
let product_page = Math.ceil(product.length / 4);
let l = 0;
let movePer = 25.34;
let maxMove = 203;

// Ajoutez cette partie pour gérer le défilement automatique
let isCursorOverCarousel = true; // Par défaut, le curseur est considéré comme étant sur le carrousel

// Gérez l'événement lorsque le curseur entre dans le carrousel
document.querySelector('main').addEventListener('mouseover', () => {
    isCursorOverCarousel = true;
});

// Gérez l'événement lorsque le curseur sort du carrousel
document.querySelector('main').addEventListener('mouseout', () => {
    isCursorOverCarousel = false;
});

// Défilement automatique toutes les 2 secondes si le curseur n'est pas sur le carrousel
setInterval(() => {
    if (!isCursorOverCarousel) {
        right_mover();
    }
}, 2000);

// mobile_view	
let mob_view = window.matchMedia("(max-width: 768px)");
if (mob_view.matches) {
    movePer = 50.36;
    maxMove = 504;
}

let right_mover = () => {
    l = l + movePer;
    if (l > maxMove) {
        l = 0;
    }
    for (const i of product) {
        if (l > maxMove) { l = l - movePer; }
        i.style.left = '-' + l + '%';
    }
};

let left_mover = () => {
    l = l - movePer;
    if (l <= 0) { l = 0; }
    for (const i of product) {
        if (product_page > 1) {
            i.style.left = '-' + l + '%';
        }
    }
};

span[1].onclick = () => { right_mover(); };
span[0].onclick = () => { left_mover(); };
