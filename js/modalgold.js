document.addEventListener("DOMContentLoaded", function () {
    var modal = document.querySelector(".custom-modal-gold");
    var openButtonGold = document.querySelector(".fitnesscard-btn-gold");
    var closeButton = document.querySelector(".modal-close-custom");

    function openModal() {
        modal.classList.add("show");
        document.addEventListener("click", closeModalOutside);
    }

    function closeModal() {
        modal.classList.remove("show");
        document.removeEventListener("click", closeModalOutside);
    }

    function closeModalOutside(event) {
        if (!modal.contains(event.target) && event.target !== openButtonGold) {
            closeModal();
        }
    }

    openButtonGold.addEventListener("click", openModal);
    closeButton.addEventListener("click", closeModal);
});
