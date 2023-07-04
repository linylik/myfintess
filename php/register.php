<?php
session_start();

include 'db_connect.php';

if (isset($_POST['reg-login']) && isset($_POST['reg-password']) && isset($_POST['email'])) {
    $username = $_POST['reg-login'];
    $password = $_POST['reg-password'];
    $email = $_POST['email'];

    // Путь к желаемой фотографии
    $desiredPhoto = '../profile_photos/not.png';

    // Проверка существования файла
    if (file_exists($desiredPhoto)) {
        // Сохранение фотографии на сервере
        $uploadDirectory = '../profile_photos/';
        $newFileName = uniqid() . '.png'; // Уникальное имя файла
        $destination = $uploadDirectory . $newFileName;
        copy($desiredPhoto, $destination);

        // Сохранение пути к фотографии в базе данных
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, profile_photo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $email, $destination);

        if ($stmt->execute()) {
            // Регистрация успешна, сохраняем уведомление в сессионной переменной
            $_SESSION['success_message'] = "Аккаунт успешно зарегистрирован!";
            header("Location: main.php");
            exit();
        } else {
            echo '<script>alert("Ошибка при регистрации. Попробуйте снова!"); window.location.href = "main.php";</script>';
        }

        $stmt->close();
    } else {
        echo "Желаемая фотография не найдена.";
    }
}
