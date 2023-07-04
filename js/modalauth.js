var modal = document.getElementById("myModal");
var authBlock = document.querySelector(".auth-block");
var regBlock = document.querySelector(".reg-block");
// функция открытия окна
function openModal(mode) {
  if (mode === "auth") {
    authBlock.style.display = "block";
    regBlock.style.display = "none";
  } else if (mode === "reg") {
    authBlock.style.display = "none";
    regBlock.style.display = "block";
  }
  modal.style.display = "block";
}
// функция закрытия окна
function closeModal() {
  authBlock.classList.add('modal-close-animation');
  regBlock.classList.add('modal-close-animation');
  setTimeout(function () {
    modal.style.display = "none";
    authBlock.classList.remove('modal-close-animation');
    regBlock.classList.remove('modal-close-animation');
  }, 600);
}

window.onclick = function (event) {
  if (event.target == modal) {
    closeModal();
  }
}