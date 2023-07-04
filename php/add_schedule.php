<?php
include 'db_connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $venue_id = $_POST['venue_id'];
    $date = $_POST['date'];
    $training_id = $_POST['training_id'];

    // SQL-запрос для добавления тренировки
    $sql = "INSERT INTO schedule (venue_id, training_id, date) 
            VALUES ('$venue_id', '$training_id', '$date')";

    // Выполнение запроса
    if (mysqli_query($conn, $sql)) {
        // Тренировка успешно добавлена
        echo '<script>alert("Тренировка успешно добавлена!"); window.location.href = "admin.php";</script>';
    } else {
        // Ошибка при добавлении тренировки
        echo "Ошибка при добавлении тренировки: " . mysqli_error($conn);
    }
}

// SQL-запрос для получения типов тренировок из таблицы "trainings"
$sqlTrainings = "SELECT * FROM trainings";
$resultTrainings = mysqli_query($conn, $sqlTrainings);
$trainings = mysqli_fetch_all($resultTrainings, MYSQLI_ASSOC);

// SQL-запрос для получения мест проведения из таблицы "venues"
$sqlVenues = "SELECT * FROM venues";
$resultVenues = mysqli_query($conn, $sqlVenues);
$venues = mysqli_fetch_all($resultVenues, MYSQLI_ASSOC);
?>
