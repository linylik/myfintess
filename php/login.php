<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login'];
    $password = $_POST['password'];
    
    // Проверка логина и пароля в базе данных
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        // Авторизация успешна
        // Выполните необходимые действия после успешной авторизации
        
        // Пример: Установка сессии или установка cookie
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['profile_photo'] = $row['profile_photo'];
        
        // Перенаправление на другую страницу после успешной авторизации
        header("Location: main.php");
        exit();
    } else {
        // Неверный логин или пароль
        echo '<script>alert("Неверный логин или пароль!"); window.location.href = "main.php";</script>';
    }
}
?>
