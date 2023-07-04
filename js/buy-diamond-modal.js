// Функция для открытия окна
function openModalbuydiamond() {
    document.getElementById("buyDiamondModal").style.display = "block";
}

// Закрываем окно при клике за его пределами
window.onclick = function(event) {
    var modal = document.getElementById("buyDiamondModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}