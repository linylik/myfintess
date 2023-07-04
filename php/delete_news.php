<?php
include 'db_connect.php';

// Проверка, был ли отправлен идентификатор новости для удаления
if (isset($_POST['news_id'])) {
    $newsId = $_POST['news_id'];

    // SQL-запрос для удаления новости из таблицы "news"
    $query = "DELETE FROM news WHERE news_id = '$newsId'";
    $result = mysqli_query($conn, $query);

    // Проверка успешности выполнения запроса
    if ($result) {
        echo '<script>alert("Новость успешно удалена!"); window.location.href = "admin.php";</script>';
    } else {
        echo "Ошибка при удалении новости: " . mysqli_error($conn);
    }
} else {
    echo "Идентификатор новости не был передан.";
}
?>
