var articleID; // Variable globale pour stocker l'ID de l'article

document.addEventListener("DOMContentLoaded", function() {
    var removeButtons = document.getElementsByClassName('remove-product');

    for (var i = 0; i < removeButtons.length; i++) {
        var button = removeButtons[i];
        button.addEventListener('click', function(event) {
            articleID = event.target.dataset.id; // Stocker l'ID de l'article dans la variable globale
            console.log("ID de l'article : " + articleID);
            removeCartItem(event); // Appeler la fonction pour retirer l'article du panier
            updateCartTotal(); // Mettre à jour le total du panier après avoir retiré l'article
        });
    }

    var quantityInputs = document.querySelectorAll('.product-quantity input');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    updateCartTotal(); // Appeler la fonction pour mettre à jour le total du panier au chargement de la page
});

function removeCartItem(event) {
    var buttonClicked = event.target;
    var productRow = buttonClicked.parentElement.parentElement;
    productRow.style.transition = "opacity 0.8s ease"; // Animation de transition d'opacité
    productRow.style.opacity = 0; // Réduit progressivement l'opacité à 0
    setTimeout(function() {
        productRow.remove(); // Supprime l'élément après l'animation
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
    console.log("Début de la fonction updateCartTotal");
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

    console.log("Sous-total calculé : " + subtotal);

    var tax = subtotal * 0.05; // 5% tax
    var shipping = 15.00; // Fixed shipping cost
    var total = subtotal + tax + shipping;

    console.log("Total calculé : " + total);

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
        
        console.log("Total du panier : " + subtotal);

        // Créer une nouvelle instance de XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurer la requête
        xhr.open('POST', 'remove_from_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Envoyer la requête uniquement si l'ID de l'article est défini
        if (articleID) {
            xhr.send('userID=' + userId + '&ID=' + articleID);
            console.log("Requête AJAX envoyée avec l'ID de l'article : " + articleID);
        } else {
            console.log("L'ID de l'article n'est pas défini.");
        }

        xhr.onload = function() {
            if (xhr.status == 200) {
                console.log("Réponse reçue du serveur : " + xhr.responseText);
            } else {
                console.log("Erreur lors de la réception de la réponse du serveur : " + xhr.status);
            }
        };
 
    }
    console.log("Fin de la fonction updateCartTotal");
}
