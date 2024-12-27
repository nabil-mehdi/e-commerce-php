// Récupération des éléments avec la classe "count-plus"
var countPlusButtons = document.querySelectorAll('.count-plus');
var countmoinButtons = document.querySelectorAll('.count-moins');
// Ajout d'un gestionnaire de clic à chaque bouton
countPlusButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
        var qty = e.currentTarget.nextElementSibling;
        var qtyValue = parseInt(qty.value) + 1;
        qty.value = qtyValue;
    });
});
countmoinButtons.forEach(function (button) {
    button.addEventListener('click', function (e) {
        var qty = e.currentTarget.previousElementSibling;
        var qtyValue = parseInt(qty.value) - 1;

        if (qtyValue >= 0) {
            qty.value = qtyValue;
        }
    });
});