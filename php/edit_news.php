<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "", "myfitness");

// Проверка соединения
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Проверка, была ли отправлена форма редактирования новости
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $newsId = $_POST["news_id"];
    $newsTitle = $_POST["title"];
    $newsContent = $_POST["content"];

    // Обновление новости в базе данных
    $query = "UPDATE news SET title='$newsTitle', content='$newsContent' WHERE news_id='$newsId'";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Новость успешно обновлена!"); window.location.href = "admin.php";</script>';
    } else {
        echo "Ошибка при обновлении новости: " . mysqli_error($conn);
    }
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>
