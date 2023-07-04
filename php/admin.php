<?php
include 'db_connect.php';
include 'header.php';
$isLoggedIn = isset($_SESSION['username']);

if (!$isLoggedIn) {
    // Пользователь не авторизован
    echo '<style>
        .main-admin-block {
            display: none;
            background-color: #000;
            height: 100vh;
            color: #fff;
            font-size: 24px;
            text-align: center;
        }
        .notexit {
            font-family: "Montserrat-Medium";
            text-align: center;
            font-size: 30px;
            margin-bottom: 280px;
        }
        .dostup-none {
            margin-top: 200px;
            font-family: "Montserrat-Medium";
            font-weight: 100;
            font-size: 50px;
        }
    </style>';
    echo '<div class="notexit">
        <p class="dostup-none">Доступ ограничен</p>
        <a href="main.php" style="color: #fff; text-decoration: none;">Вернуться на главную страницу</a>
    </div>';
} else {
    // Пользователь авторизован
    $userId = $_SESSION['username'];

    // SQL-запрос для получения статуса пользователя из таблицы "users"
    $query = "SELECT status FROM users WHERE username = '$userId'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['status'];

        if ($status == 1) {
            // Пользователь имеет статус 1, доступ в админку разрешен
            // Ваш код для админки
        } else {
            // Пользователь имеет статус 0, доступ в админку запрещен
            echo '<style>
                .main-admin-block {
                    display: none;
                    background-color: #000;
                    height: 100vh;
                    color: #fff;
                    font-size: 24px;
                    text-align: center;
                }
                .notexit {
                    font-family: "Montserrat-Medium";
                    text-align: center;
                    font-size: 30px;
                    margin-bottom: 280px;
                }
                .dostup-none {
                    margin-top: 200px;
                    font-family: "Montserrat-Medium";
                    font-weight: 100;
                    font-size: 50px;
                }
            </style>';
            echo '<div class="notexit">
                <p class="dostup-none">Доступ ограничен</p>
                <a href="main.php" style="color: #fff; text-decoration: none;">Вернуться на главную страницу</a>
            </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/reg.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>myfitness - админ панель</title>
</head>

<body>
    <div class="main-admin-block">
        <div class="container">
            <h2 class="title">Админ панель</h2>
            <div class="admin-btn-block">
                <div class="admin-btn-item">
                    <button class="admin-btn-style" onclick="showScheduleBlock()">Расписание</button>
                </div>
                <div class="admin-btn-item">
                    <button class="admin-btn-style" onclick="showNewsBlock()">Новости</button>
                </div>
                <div class="admin-btn-item">
                    <button class="admin-btn-style">Тренера</button>
                </div>
                <div class="admin-btn-item">
                    <button class="admin-btn-style">В разработке</button>
                </div>
                <div class="admin-btn-item">
                    <button class="admin-btn-style">В разработке</button>
                </div>
            </div>
            <div id="scheduleBlock" style="display: none;">
                <h3>Управление расписанием</h3>

                <div class="schedule-actions">
                    <button class="edit-btn-admin" onclick="showAddForm()">Добавить</button>
                    <button class="edit-btn-admin" onclick="showDeleteForm()">Удалить</button>
                    <button class="edit-btn-admin" onclick="showEditForm()">Изменить</button>
                </div>


                <div id="addForm" style="display: none;">
                    <h3>Добавить тренировку</h3>
                    <form class="add-sc-form" action="add_schedule.php" method="POST">
                        <select class="add-sc-form-input" name="venue_id" required>
                            <option value="">Выберите место проведения</option>
                            <?php
                            // Подключение к базе данных

                            // Выполнение запроса к базе данных для получения мест проведения
                            $query = "SELECT * FROM venues";
                            $result = mysqli_query($conn, $query);

                            // Проверка наличия данных
                            if (mysqli_num_rows($result) > 0) {
                                // Вывод каждого места проведения в виде опции выпадающего списка
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['venue_id'] . '">' . $row['venue_name'] . '</option>';
                                }
                            }
                            ?>
                        </select><br>
                        <input class="add-sc-form-input" type="date" name="date" required><br>
                        <input class="add-sc-form-input" type="time" name="time" required><br>
                        <select class="add-sc-form-input" name="training_id" required>
                            <option value="">Выберите тип тренировки</option>
                            <?php
                            // Подключение к базе данных

                            // Выполнение запроса к базе данных для получения типов тренировок
                            $query = "SELECT * FROM trainings";
                            $result = mysqli_query($conn, $query);

                            // Проверка наличия данных
                            if (mysqli_num_rows($result) > 0) {
                                // Вывод каждого типа тренировки в виде опции выпадающего списка
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['training_id'] . '">' . $row['training_type'] . '</option>';
                                }
                            }
                            ?>
                        </select><br>
                        <input class="add-sc-form-input" type="text" name="training_time" placeholder="Время тренировки" required><br>
                        <br>
                        <button class="add-sc-form-btn" type="submit">Добавить</button>
                    </form>
                </div>

                <div id="deleteForm" style="display: none;">
                    <h3>Удаление тренировки</h3>
                    <?php
                    // SQL-запрос для получения тренировок из таблицы "schedule"
                    $sql = "SELECT s.schedule_id, v.venue_name, s.date, t.training_type 
                        FROM schedule s 
                        INNER JOIN venues v ON s.venue_id = v.venue_id 
                        INNER JOIN trainings t ON s.training_id = t.training_id";
                    $result = mysqli_query($conn, $sql);

                    // Проверка наличия данных
                    if (mysqli_num_rows($result) > 0) {
                        // Вывод каждой тренировки и кнопки "Удалить"
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="schedule-item">' . $row['venue_name'] . ' - ' . $row['date'] . ' - ' . $row['training_type'] . '
                        <form action="delete_schedule.php" method="POST">
                            <input type="hidden" name="schedule_id" value="' . $row['schedule_id'] . '">
                            <button class="del-btn-tr" type="submit">Удалить</button>
                        </form>
                    </div>';
                        }
                    } else {
                        // Сообщение о отсутствии тренировок
                        echo '<p>Нет доступных тренировок.</p>';
                    }
                    ?>
                </div>

                <div id="editForm" style="display: none;">
                    <!-- Форма редактирования тренировки -->
                </div>

            </div>

            <div id="newsBlock" style="display: none;">
                <h3>Управление новостями</h3>
                <div class="news-actions">
                    <button class="edit-btn-admin" onclick="showAddNewsForm()">Добавить</button>
                    <button class="edit-btn-admin" onclick="showDeleteNewsForm()">Удалить</button>
                    <button class="edit-btn-admin" onclick="showEditNewsForm()">Изменить</button>
                </div>

                <!-- Формы добавления, удаления и изменения новостей -->
                <div id="addNewsForm" style="display: none;">
                    <h3>Добавление новости</h3>
                    <div class="form-add-news-block">
                        <form action="add_news.php" method="POST" enctype="multipart/form-data">
                            <input class="add-sc-form-input" type="text" name="title" placeholder="Заголовок новости" required> <br>
                            <textarea class="add-sc-form-input-text" name="content" placeholder="Текст новости" required></textarea> <br>
                            <input class="photo-enter-news" type="file" name="image" required> <br>
                            <button class="add-sc-form-btn" type="submit">Добавить</button>
                        </form>
                    </div>

                </div>


                <div id="deleteNewsForm" style="display: none;">
                    <!-- Форма удаления новости -->
                    <?php
                    // SQL-запрос для получения списка новостей из таблицы "news"
                    $query = "SELECT news_id, title FROM news";
                    $result = mysqli_query($conn, $query);

                    // Проверка наличия данных
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $newsId = $row['news_id'];
                            $newsTitle = $row['title'];

                            echo '<div class="news-item"><h2 class="newstitledel">' . $newsTitle . '</h2>
            <form action="delete_news.php" method="POST">
                <input type="hidden" name="news_id" value="' . $newsId . '">
                <div class="newsbtndel-block">
                <button class="newsbtndel" type="submit">Удалить</button>
                </div>
            </form>
        </div>';
                        }
                    } else {
                        echo '<p>Нет доступных новостей.</p>';
                    }
                    ?>
                </div>

                <div id="editNewsForm" style="display: none;">
                    <!-- Форма изменения новости -->
                    <?php
                    // SQL-запрос для получения списка новостей из таблицы "news"
                    $query = "SELECT news_id, title, content FROM news";
                    $result = mysqli_query($conn, $query);

                    // Проверка наличия данных
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $newsId = $row['news_id'];
                            $newsTitle = $row['title'];
                            $newsText = $row['content'];

                            echo '<div class="news-item"><h2 class="newstitledel">' . $newsTitle . '</h2>
                <div id="editForm_' . $newsId . '" style="display: none;">
                    <form class="edit-news-block" action="edit_news.php" method="POST">
                        <input type="hidden" name="news_id" value="' . $newsId . '">
                        <input class="add-sc-form-input" type="text" name="title" value="' . $newsTitle . '">
                        <textarea class="add-sc-form-input-text" name="content">' . $newsText . '</textarea> <br>

                        <button class="newsbtndel" type="submit">Сохранить</button>
                    </form>
                </div>
                <div class="newsbtndel-block">
                    <button class="newsbtndel" onclick="showEditForm(' . $newsId . ')">Изменить</button>
                </div>
            </div>';
                        }
                    } else {
                        echo '<p>Нет доступных новостей.</p>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>


    <script src="../js/modalauth.js"></script>
    <script src="../js/admin-show-block.js"></script>

</body>

</html>