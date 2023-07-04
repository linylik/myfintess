<?php
include 'db_connect.php';

// Получение значения параметра schedule_id из POST-запроса
$scheduleId = $_POST['schedule_id'];

// SQL-запрос для удаления тренировки
$sql = "DELETE FROM schedule WHERE schedule_id = '$scheduleId'";

// Выполнение запроса
if (mysqli_query($conn, $sql)) {
    // Тренировка успешно удалена
    echo '<script>alert("Тренировка успешно удалена!"); window.location.href = "admin.php";</script>';
} else {
    // Ошибка при удалении тренировки
    echo "Ошибка при удалении тренировки: " . mysqli_error($conn);
}

?>
