document.addEventListener("DOMContentLoaded", function() {
  var slides = document.querySelectorAll(".slide");
  var dots = document.querySelectorAll(".dot");
  var currentSlide = 0;
  var slideInterval = setInterval(nextSlide, 5000); // Интервал в 5 секунд (5000 миллисекунд)

  function showSlide(index) {
    if (index < 0) {
      currentSlide = slides.length - 1;
    } else if (index >= slides.length) {
      currentSlide = 0;
    }

    for (var i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    for (var i = 0; i < dots.length; i++) {
      dots[i].classList.remove("active");
    }

    slides[currentSlide].style.display = "block";
    dots[currentSlide].classList.add("active");
  }

  function nextSlide() {
    currentSlide++;
    if (currentSlide >= slides.length) {
      currentSlide = 0;
    }
    showSlide(currentSlide);
  }

  function previousSlide() {
    currentSlide--;
    if (currentSlide < 0) {
      currentSlide = slides.length - 1;
    }
    showSlide(currentSlide);
  }

  function selectSlide(index) {
    currentSlide = index;
    showSlide(currentSlide);
    clearInterval(slideInterval); // Очищаем интервал при клике на кружочек
    slideInterval = setInterval(nextSlide, 5000); // Запускаем интервал снова после клика
  }

  for (var i = 0; i < dots.length; i++) {
    (function(index) {
      dots[i].addEventListener("click", function() {
        selectSlide(index);
      });
    })(i);
  }

  showSlide(currentSlide);
});
