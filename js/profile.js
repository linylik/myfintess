document.addEventListener('DOMContentLoaded', function() {
    var photoUpload = document.getElementById('photo-upload');
    var profileTextImg = document.querySelector('.profile-text-img');
    var profileImage = document.getElementById('profile-photo');
    var modal = document.getElementById('myModal2');
    var closeButton = document.getElementsByClassName('close')[0];
    var uploadForm = document.getElementById('upload-form');

    profileTextImg.addEventListener('click', function(e) {
        e.preventDefault(); // Предотвращаем отправку формы по умолчанию
        modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    photoUpload.addEventListener('change', function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            profileImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });

    uploadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(uploadForm);

        fetch('profile.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Обработка ответа сервера после загрузки фотографии
            console.log(data);
            modal.style.display = 'none';
        })
        .catch(error => {
            console.error('Ошибка:', error);
            modal.style.display = 'none';
        });
    });

    // Применение стилей к блоку и изображению
    var profileImageContainer = document.querySelector('.profile-image');
    profileImageContainer.style.width = '465px';
    profileImageContainer.style.height = '607px';
    profileImageContainer.style.borderRadius = '20px';
});
