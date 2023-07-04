<?php
include 'db_connect.php';

// Проверка авторизации пользователя
$username = $_POST['username'];
if ($username) {
    // Проверка наличия фитнес-карты у пользователя
    $query = "SELECT fitness_card_name FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $fitnessCardName = $row['fitness_card_name'];

        if (!empty($fitnessCardName)) {
            echo '<script>alert("У вас уже есть фитнес-карта!"); window.location.href = "main.php";</script>';
            exit; // Прекратить выполнение скрипта
        }
    }
}

if ($username) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Проверка, на какую кнопку покупки было нажато
        if (isset($_POST['buy_7_days'])) {
            $fitnessCard = "Silver";
            $duration = 7;
            $endDate = date('Y-m-d', strtotime("+$duration days"));

            // Добавление названия, длительности и даты окончания фитнес-карты в базу данных
            $query = "UPDATE users SET fitness_card_name = '$fitnessCard', duration = '$duration', end_date = '$endDate' WHERE username = '$username'";
            if (mysqli_query($conn, $query)) {
                echo '<script>alert("Фитнес карта куплена!"); window.location.href = "main.php";</script>';
            } else {
                echo "Ошибка добавления фитнес-карты: " . mysqli_error($conn);
            }
        } elseif (isset($_POST['buy_30_days'])) {
            $fitnessCard = "Silver";
            $duration = 30;
            $endDate = date('Y-m-d', strtotime("+$duration days"));

            // Добавление названия, длительности и даты окончания фитнес-карты в базу данных
            $query = "UPDATE users SET fitness_card_name = '$fitnessCard', duration = '$duration', end_date = '$endDate' WHERE username = '$username'";
            if (mysqli_query($conn, $query)) {
                echo '<script>alert("Фитнес карта куплена!"); window.location.href = "main.php";</script>';
            } else {
                echo "Ошибка добавления фитнес-карты: " . mysqli_error($conn);
            }
        } elseif (isset($_POST['buy_1_year'])) {
            $fitnessCard = "Silver";
            $duration = 365;
            $endDate = date('Y-m-d', strtotime("+$duration days"));

            // Добавление названия, длительности и даты окончания фитнес-карты в базу данных
            $query = "UPDATE users SET fitness_card_name = '$fitnessCard', duration = '$duration', end_date = '$endDate' WHERE username = '$username'";
            if (mysqli_query($conn, $query)) {
                echo '<script>alert("Фитнес карта куплена!"); window.location.href = "main.php";</script>';
            } else {
                echo "Ошибка добавления фитнес-карты: " . mysqli_error($conn);
            }
        }
    }
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>
