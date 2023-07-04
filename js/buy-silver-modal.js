// Функция для открытия окна
function openModalbuy() {
    document.getElementById("buySilverModal").style.display = "block";
}

// Закрываем окно при клике за его пределами
window.onclick = function(event) {
    var modal = document.getElementById("buySilverModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}