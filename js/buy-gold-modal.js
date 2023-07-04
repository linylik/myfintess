// Функция для открытия окна
function openModalbuygold() {
    document.getElementById("buyGoldModal").style.display = "block";
}

// Закрываем окно при клике за его пределами
window.onclick = function(event) {
    var modal = document.getElementById("buyGoldModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}