<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Получаем информацию о загруженном файле
    $image = $_FILES['image']['tmp_name'];
    $imageType = $_FILES['image']['type'];

    // Проверяем, что файл является изображением
    if (strpos($imageType, 'image') !== false) {
        // Открываем файл в бинарном режиме и читаем его содержимое
        $imageFile = fopen($image, 'rb');
        $imageContent = fread($imageFile, filesize($image));
        fclose($imageFile);
        
        // Подготавливаем и выполняем SQL-запрос для вставки данных в базу данных
        $stmt = $conn->prepare("INSERT INTO news (title, date, image, content) VALUES (?, CURRENT_DATE(), ?, ?)");
        $stmt->bind_param("sss", $title, $imageContent, $content);
        $stmt->execute();

        echo '<script>alert("Новость успешно добавлена!"); window.location.href = "admin.php";</script>';
    } else {
        echo "Пожалуйста, выберите изображение.";
    }
}
?>
