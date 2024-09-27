document.addEventListener("DOMContentLoaded", function() {
    var removeCartItemButtons = document.getElementsByClassName('remove-product');
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    var quantityInputs = document.querySelectorAll('.product-quantity input');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }
    
    updateCartTotal();
});

function removeCartItem(event) {
    var buttonClicked = event.target;
    var productRow = buttonClicked.parentElement.parentElement;
    productRow.style.transition = "transform 0.5s ease"; // Animation de transition
    productRow.style.transform = "translateY(500%)"; // Déplace l'élément vers le bas
    setTimeout(function() {
        productRow.remove(); // Supprime l'élément après l'animation
        updateCartTotal();
    }, 500); // Temps de l'animation (en millisecondes)
}


function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateCartTotal();
}

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('shopping-cart')[0];
    var cartRows = cartItemContainer.getElementsByClassName('product');
    var subtotal = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('product-price')[0];
        var quantityElement = cartRow.getElementsByClassName('product-quantity')[0].getElementsByTagName('input')[0];
        var price = parseFloat(priceElement.innerText);
        var quantity = quantityElement.value;
        var linePrice = price * quantity;
        cartRow.getElementsByClassName('product-line-price')[0].innerText = linePrice;
        subtotal += linePrice;
    }

    var tax = subtotal * 0.05; // 5% tax
    var shipping = 15.00; // Fixed shipping cost
    var total = subtotal + tax + shipping;

    var totalsContainer = document.querySelector('.totals-container');

    if (cartRows.length === 0) {
        // Animation de translation vers le bas pour masquer les éléments de total et le bouton de validation
        totalsContainer.style.transition = "opacity 0.5s";
        totalsContainer.style.opacity = 0;
        setTimeout(function() {
            totalsContainer.style.display = 'none'; // Masque les éléments de total et le bouton de validation
        }, 500); // Temps de l'animation (en millisecondes)
    } else {
        // Si le panier n'est pas vide, afficher les éléments normalement
        totalsContainer.style.transition = ""; // Réinitialiser les transitions
        totalsContainer.style.transform = "";
        totalsContainer.style.display = 'block'; // Affiche les éléments de total et le bouton de validation
        document.getElementById('cart-subtotal').innerText = subtotal.toFixed(2);
        document.getElementById('cart-tax').innerText = tax.toFixed(2);
        document.getElementById('cart-shipping').innerText = shipping.toFixed(2);
        document.getElementById('cart-total').innerText = total.toFixed(2);
    }
}


